<?php

namespace App\Models\Traits;

use DateTime;
use Exception;
use ErrorException;
use ReflectionClass;
use ReflectionMethod;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

/**
 * Provides easier implementation for caching models and their relationships. 
 * Cannot listen for pivot table changes.
 * @sgy157
 */
trait Cacheable{
    /**
     * Listens for model changes on boot and wipes cache if so.
    */
    protected static function bootCacheable(){
        if (!(is_subclass_of(static::class, Model::class))) {
            die('Error: Class is not of type Illuminate\Database\Eloquent\Model');
        }

        foreach (['created', 'saved', 'deleted', 'updated'] as $event) {
            static::$event(function ($instance) use ($event) {
                if ($event === 'created' || $event === 'saved' || $event === 'updated') {
                    $instance->wipeRelatedCaches($instance->relationships());
                }
                if ($event === 'deleted') {
                    $instance->wipeRelatedCaches($instance->relationships());
                    $instance->wipeCache();
                }
            });
        }
    }

    /**
     * Returns the model table name.
     */
    private static function getTableName()
    {
        return (new self())->getTable();
    }

    /**
     * Returns the model table name, intended to be used as the cache key.
     * @param mixed $input [optional] A value to be appended, such as an identifier for a model instance.
     * @return string @example `products`, `products_1`
    */
    private static function generateCacheKey(string|int $input = null){
        $key = static::getTableName();

        if(isset($input)){
            $key = $key.'_'.$input;
        }

        return $key;
    }

    /**
     * Returns the cache key of a model instance.
     * @param null|string|int $input [optional] A value to be appended, such as an identifier for a model relationship.
     * @return string @example `reviews_1`, `reviews_1:product`
    */
    public function cacheKey(string|int $input = null)
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
        $model = static::findCached($id);

        if(is_null($model)){
            $model = Cache::remember(static::generateCacheKey($id), $time, function() use ($id) {
                return static::findOrFail($id);
            });
        }

        return $model;
    }

    /**
     * Returns/creates a cached version of a relationship as an Eloquent Collection.
     * @param string $relation Name of a function that returns an Eloquent relation. @example `product->categories()`
     * @param DateTime|null $time [optional] Time before the cache updates to match database. (Default - 30m)
    */
    public function getCachedRelation(string $relation, DateTime $time = null){
        $time = $time ?? now()->addMinutes(30)->toDateTime();
        $cachedRelation = $this->findCachedRelation($relation);

        if (is_null($cachedRelation) || isset($time)){
            $cachedRelation = $this->$relation();

            if(isset($cachedRelation)){
                $cachedRelation = Cache::remember($this->cacheKey($relation), $time, function () use ($cachedRelation){
                    return $cachedRelation->get();
                });
            }

            else{
                return null;
            }
        }

        return $cachedRelation;
    }

    /**
     * Returns a cached version of a relationship as an Model instance if it is present.
     * @param string $id Id of Model instance.
    */
    public static function findCached(int $id){
        return Cache::get(static::generateCacheKey($id));
    }

    /**
     * Returns a cached version of a relationship as an Eloquent Collection if it is present.
     * @param string $relation Name of a function that returns an Eloquent relation (For example: `product->categories()`)
    */
    public function findCachedRelation($relation = null){
        return Cache::get($this->cacheKey($relation));
    }

    /**
     * Delete the cached instance.
     * @param string|array $relations Name of relation(s) to delete.
    */
    public function wipeCache(){
        Cache::forget($this->cacheKey());
        return true;
    }

    /**
     * Forget the cached relation of a model instance.
     * @param string $relation The relation to forget.
     */
    public function wipeCachedRelation(string $relation){
        return Cache::forget($this->cacheKey($relation));
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
     * Forget the cached relation of this model in related models.
     * @param string $relation The relation to forget.
     */
    public function wipeRelatedCache(string $relation){
        $cachedModels = $this->getCachedRelation($relation);

        if (isset($cachedModels)){
            foreach ($cachedModels as $cachedModel) {
                $cachedModel->wipeCachedRelation($this->getTableName());
                $cachedModel->wipeCachedRelation(lcfirst(class_basename($this)));
            }
        }
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