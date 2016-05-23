<?php
/**
 * Domain Logic simple example
 */

include_once __DIR__ . '/vendor/autoload.php';

$words = \DL\Model\Product::newWordProcessor(1);
var_dump($words);