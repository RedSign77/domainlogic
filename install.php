<?php
/**
 * Simple PHP installer
 */
$db = new PDO('mysql:host=127.0.0.1;port=3306;dbname=domainlogic;charset=UTF8;', 'domainlogic', 'n7TJsZu67EmLdx4p', array(PDO::ATTR_PERSISTENT=>true));
$db->query('SET NAMES utf8;');

$db->query('CREATE TABLE IF NOT EXISTS revenue_recognitions (contract int, amount decimal, recognizedOn date, PRIMARY KEY (contract, recognizedOn))');
