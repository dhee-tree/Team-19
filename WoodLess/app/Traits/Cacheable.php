<?php

namespace App\Traits;

use DateTime;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Relations\Relation as Relation;

/**
 * Provides faster implementation for caching models and their relationships.
 * @Sgy157
 */
trait Cacheable{

    private static function getTableName()
    {
        return (new self())->getTable();
    }

    /**
     * Return/create a cached version of the model.
     * @param DateTime $time Time before the cache updates to match database. (Default - 120 Sec)
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
    * @param DateTime $time Time before the cache updates to match database. (Default - 30 Sec)
    */
    public static function getCached(int $id, DateTime $time = null){
        $time = $time ?? now()->addSeconds(30)->toDateTime();
        return Cache::remember(static::find($id)->cacheKey(), $time, function() use ($id) {
            return static::findOrFail($id);
        });
    }

    /**
     * Returns the cache key of a model instance.
    */
    public function cacheKey()
    {
        return static::getTableName().'_'.$this->id;
    }

    /**
     * Returns/creates a cached version of a relationship.
     * @param string $relation Name of a function that returns an Eloquent relation (For example: `product->categories()`)
     * @param DateTime $time Time before the cache updates to match database. (Default - 30 Sec)

    */
    public function getCachedRelation(string $relation, DateTime $time = null){
        $cachedRelation = Cache::get($this->cacheKey().':'.$relation);

        if (is_null($cachedRelation) || isset($time)){
            $cachedRelation = call_user_func([$this, $relation])->cache($time);
        }

        return $cachedRelation;
    }
}