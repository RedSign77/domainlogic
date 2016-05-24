<?php
/**
 * Domain Logic simple example
 */

include_once __DIR__ . '/vendor/autoload.php';

$db = \DL\Service\Database::getInstance()->getConnection();

$recognationService = new \DL\Service\RecognitionService($db);



$contracts = $recognationService->recognizedRevenue(10003, '2016-05-24');


