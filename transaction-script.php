<?php
/**
 * Domain Logic simple example
 */
include_once __DIR__ . '/vendor/autoload.php';
if (!isset($_GET['contractId'])) {
    die('Kérem adja meg a szerződés számot!');
}
$contractId = (int)$_GET['contractId'];

/**
 * Transaction Script example
 */
$today = date('Y-m-d', time());
echo 'A(z) ' . $contractId . ' azonosítójú szerződésre vonatkozó bevételi kimutatásaink ' . $today . '-ig: ';

$service = new \DL\Service\RecognitionService(); // Transaction Script

$recognitions = $service->findRecognitionsFor($contractId, $today);

$result = $service->recognizedRevenue($contractId, $today);
echo '<strong>' . number_format($result, 2) . '</strong> Ft.';

foreach ($recognitions as $key => $recognition) {
    echo '<br>' . ($key + 1) . '. tétel: ' . number_format($recognition['amount'], 2) . ' Ft';
}

