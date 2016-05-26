<?php
/**
 * Table Module example
 */
include_once __DIR__ . '/vendor/autoload.php';

echo '<h2>Table Module</h2>';

$users = new \DL\Model\Users();
$messages = new \DL\Model\Messages();

$assembler = new \DL\Model\MessageAssembler($users, $messages);

$messages = $assembler->getMessageByUserIdAndLastSyncDate(1, '2016-01-01 00:00:00');

var_dump($messages);
