<?php

namespace App\Models\Traits;

use DateTime;
use App\Models\Traits\Relationships;
use Illuminate\Support\Facades\Cache;

/**
 * Provides easier implementation for caching models and their relationships.
 * @Sgy157
 */
trait Cacheable{
    
    use Relationships;

    /**
     * Listens for model changes on boot and wipes cache if so.
     */
    public static function bootCacheable(string|array $relations = null){
        if (is_null($relations)){
            $relations = static::relationships();
        }
        
        static::creating(function ($relations){
            $this->wipeCache($relations);
        });

        static::saving(function ($relations){
            $this->wipeCache($relations);
        });

        static::deleting(function ($relations) {
            $this->wipeCache($relations);
        });

        static::updating(function ($relations) {
            $this->wipeCache($relations);
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
    private static function generateCacheKey($input){
        return static::getTableName().'_'.$input;
    }

    /**
     * Return/create a cached version of the model.
     * @param DateTime|null $time Time before the cache updates to match database. (Default - 120s)
     *
     */
    public static function getAllCached(DateTime $time = null){
        $time = $time ?? now()->addSeconds(60)->toDateTime();
        return Cache::remember(static::getTableName(), $time, function() {
            return static::all();
        });
    }

    /**
    * Return/create a cached version of a model instance.
    * @param int $id Return/create a cached version of a model instance.
    * @param DateTime|null $time Time before the cache updates to match database. (Default - 30s)
    */
    public static function getCached(int $id, DateTime $time = null){
        $time = $time ?? now()->addSeconds(30)->toDateTime();
        return Cache::remember(static::generateCacheKey($id), $time, function() use ($id) {
            return static::findOrFail($id);
        });
    }

    /**
     * Returns the cache key of a model instance.
    */
    public function cacheKey()
    {
        return static::generateCacheKey($this->id);
    }

    /**
     * Returns/creates a cached version of a relationship as an Eloquent Collection.
     * @param string $relation Name of a function that returns an Eloquent relation (For example: `product->categories()`)
     * @param DateTime|null $time [optional] Time before the cache updates to match database. (Default - 30s)
    */
    public function getCachedRelation(string $relation, DateTime $time = null){
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
    public function wipeCache(array|string $relations = null){
        if(isset($relations)){
            if(is_array($relations)){
                $this->wipeCachedRelations($relations);
            }

            else{
                $this->wipeCachedRelation($relations);
            }
        }

        Cache::forget($this->cacheKey());
        return true;
    }

    public function wipeCachedRelation(string $relation){
        Cache::forget($this->cacheKey().':'.$relation);
    }

    public function wipeCachedRelations(array $relations){
        foreach($relations as $relation){
            Cache::forget($this->cacheKey().':'.$relation);
        }
    }
}