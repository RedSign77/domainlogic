<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 25.
 * Time: 12:12
 */

namespace DL\DTO;


abstract class DTOModel implements DTOInterface
{
    private static $properties;

    public static function deserialize($jsonString){
        if ($json = json_decode($jsonString) !== null) {
            $obj = new static();
            $objectProperties = get_object_vars($obj);
            foreach (get_objects_vars($json) as $field) {
                if (array_key_exists($field, $objectProperties))
                    $obj->$field = $json->$field;
            }
            return $obj;
        }
        return false;
    }

    public function serialize(){
        if (self::$properties === null) {
            $ref = new \ReflectionClass($this);
            self::$properties = $ref->getProperties(\ReflectionProperty::IS_PRIVATE);
        }
        $json = new \stdClass();
        foreach (self::$properties as $prop) {
            $name = $prop->getName();
            $json->$name = $prop->getValue();
        }
        return json_encode($json);
    }

}