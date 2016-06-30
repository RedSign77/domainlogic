<?php
/**
 * Domain Logic simple example
 */
include_once __DIR__ . '/vendor/autoload.php';
if (!array_key_exists('contractId', $_GET)) {
    die('Please give a valid <a href="?contractId=10000">Contract number</a>!');
}
$contractId = (int)$_GET['contractId'];

/**
 * Transaction Script example
 */
$today = date('Y-m-d', time());
echo 'Contract #' . $contractId . ' recoginitions<br> - to ' . $today . '<br> - ';

$service = new \DL\Service\RecognitionService(); // Transaction Script

$recognitions = $service->findRecognitionsFor($contractId, $today);

$result = $service->recognizedRevenue($contractId, $today);
echo '<strong>' . number_format($result, 2) . '</strong> HUF<br>';

foreach ($recognitions as $key => $recognition) {
    echo '<br>' . ($key + 1) . '. recognition: ' . number_format($recognition['amount'], 2) . ' HUF';
}

