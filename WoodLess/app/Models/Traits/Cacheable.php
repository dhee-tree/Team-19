<?php

namespace App\Models\Traits;

use DateTime;
use Exception;
use ErrorException;
use ReflectionClass;
use ReflectionMethod;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Relations\Relation;

/**
 * Provides easier implementation for caching models and their relationships.
 * @Sgy157
 */
trait Cacheable{
    /**
     * Listens for model changes on boot and wipes cache if so.
    */
    protected static function bootCacheable(){

        static::created(function ($instance){
            $instance->wipeRelatedCaches($instance->relationships());
        });

        static::saving(function ($instance){
            $instance->wipeRelatedCaches($instance->relationships());
        });

        static::deleting(function ($instance){
            $instance->wipeRelatedCaches($instance->relationships());
        });

        static::updated(function ($instance) {
            $instance->wipeRelatedCaches($instance->relationships());
        });
    }

    private static function getTableName()
    {
        return (new self())->getTable();
    }

    /**
     * Returns a special string appended with the parameter, intended to be used as a cache key.
     * @param mixed $input The value to be appended.
     * @return string
    */
    private static function generateCacheKey($input = null){
        $key = static::getTableName();

        if(isset($input)){
            $key = $key.'_'.$input;
        }

        return $key;
    }

    /**
     * Returns the cache key of a model instance.
    */
    public function cacheKey($input = null)
    {   
        $key = static::generateCacheKey($this->id);

        if(isset($input)){
            $key = $key.':'.$input;
        }

        return $key;
    }

    /**
     * Return/create a cached version of the model.
     * @param DateTime|null $time Time before the cache updates to match database. (Default - 30m)
     *
     */
    public static function getAllCached(DateTime $time = null){

        $time = $time ?? now()->addMinutes(30)->toDateTime();

        return Cache::remember(static::generateCacheKey(), $time, function () {
            return static::all();
        });
    }

    /**
    * Return/create a cached version of a model instance.
    * @param int $id Return/create a cached version of a model instance.
    * @param DateTime|null $time Time before the cache updates to match database. (Default - 30m)
    */
    public static function getCached(int $id, DateTime $time = null){
        $time = $time ?? now()->addMinutes(30)->toDateTime();
        return Cache::remember(static::generateCacheKey($id), $time, function() use ($id) {
            return static::findOrFail($id);
        });
    }

    /**
     * Returns/creates a cached version of a relationship as an Eloquent Collection.
     * @param string $relation Name of a function that returns an Eloquent relation (For example: `product->categories()`)
     * @param DateTime|null $time [optional] Time before the cache updates to match database. (Default - 30m)
    */
    public function getCachedRelation(string $relation, DateTime $time = null){
        $time = $time ?? now()->addMinutes(30)->toDateTime();
        $cachedRelation = Cache::get($this->cacheKey().':'.$relation);

        if (is_null($cachedRelation) || isset($time)){
            $cachedRelation = call_user_func([$this, $relation])->getCached($time);
        }

        return $cachedRelation;
    }

    /**
     * Delete the cached instance.
     * @param string|array $relations Name of relation(s) to delete.
    */
    public function wipeCache(array|string $relations = null, bool $deleteAllRelations = false){
        if(isset($relations)){
            if(is_array($relations)){
                $this->wipeCachedRelations($relations);
            }

            else{
                $this->wipeCachedRelation($relations);
            }
        }
        
        else if ($deleteAllRelations){
            $this->wipeCachedRelations();
        }

        Cache::forget($this->cacheKey());
        return true;
    }

    /**
     * Forget the cached relation of a model instance.
     * @param string $relation The relation to forget.
     */
    public function wipeCachedRelation(string $relation){
        Cache::forget($this->cacheKey($relation));
    }

    /**
     * Forget multiple cached relations of a model instance.
     * @param array $relations The relations to forget.
     */
    public function wipeCachedRelations(array $relations = null){
        if (is_null($relations)){
            $relations = $this->relationships();
        }

        foreach($relations as $relation){
            $this->wipeCachedRelation($relation);
        }

        return true;
    }
    
    /**
     * Forget the cached relation of this model in a related model.
     * @param string $relation The relation to forget.
     */
    public function wipeRelatedCache(string $relation){
        $cachedModel = call_user_func([$this, $relation])->getCached()[0];

        $cachedModel->wipeCachedRelation(lcfirst(class_basename($this)));
        $cachedModel->wipeCachedRelation($this->getTableName());
    }

    /**
     * Forget the cached relations of this model in a related model.
     * @param array|string $relation The relations to forget.
     */
    public function wipeRelatedCaches(array|string $relations = null){
        foreach ($relations as $relation){
            $this->wipeRelatedCache($relation);
        }
    }

    /**
     * Returns the names of model relationship methods that are cacheable.
     */
    public function relationships()
    {
        $model = $this;

        $relationships = [];

        foreach ((new ReflectionClass($model))->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
            if ($method->class != get_class($model) ||
                !empty($method->getParameters()) ||
                $method->getName() == __FUNCTION__) {
                continue;
            }

            try {
                $return = $method->invoke($model);

                if ($return instanceof Relation) {
                    $relatedModelClass = get_class($return->getRelated());
                    
                    if (in_array(Cacheable::class, class_uses($relatedModelClass))) {
                        array_push($relationships, $method->getName());
                    }
                }
            } catch (ErrorException $e) {
            }
        }

        return $relationships;
    }
}