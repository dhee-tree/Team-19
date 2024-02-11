<?php
namespace App\Models\Traits;

use ErrorException;
use Illuminate\Database\Eloquent\Relations\Relation;
use ReflectionClass;
use ReflectionMethod;

trait Relationships
{
    /**
     * Returns the names of model relationship methods.
    */
    public static function relationships() {

        $model = new static;

        $relationships = [];

        foreach((new ReflectionClass($model))->getMethods(ReflectionMethod::IS_PUBLIC) as $method)
        {
            if ($method->class != get_class($model) ||
                !empty($method->getParameters()) ||
                $method->getName() == __FUNCTION__) {
                continue;
            }

            try {
                $return = $method->invoke($model);

                if ($return instanceof Relation) {
                    array_push($relationships, $method->getName());
                }
            } catch(ErrorException $e) {}
        }

        return $relationships;
    }
}