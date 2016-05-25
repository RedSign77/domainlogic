<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 25.
 * Time: 12:11
 */

namespace DL\DTO;


interface DTOInterface
{
    public static function deserialize($jsonString);

    public function serialize();
    
}