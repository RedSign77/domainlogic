<?php
/**
 * Domain Model example
 */
include_once __DIR__ . '/vendor/autoload.php';

$product = new \DL\Model\Product(1, new \DL\Strategy\ThreeWayRecognitionStrategy(30, 100));

$contract = new \DL\Model\Contract($product, date('Y-m-d H:i:s', time()));

echo '<strong>Original Contract</strong>';

var_dump($contract);

echo '<strong>Contract (Three way Recognition)</strong>';

$contract->calculateRecognitions();

var_dump($contract);


$product = new \DL\Model\Product(2, new \DL\Strategy\CompleteRecognitionStrategy());

$contract = new \DL\Model\Contract($product, date('Y-m-d H:i:s', time()));

echo '<hr><strong>Original Contract</strong>';

var_dump($contract);

echo '<strong>Contract (Complete Recognition)</strong>';

$contract->calculateRecognitions();

var_dump($contract);
