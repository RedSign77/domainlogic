<?php
/**
 * Simple PHP installer
 */
$db = new PDO('mysql:host=127.0.0.1;port=3306;dbname=domainlogic;charset=UTF8;', 'domainlogic', 'n7TJsZu67EmLdx4p', array(PDO::ATTR_PERSISTENT=>true));
$db->query('SET NAMES utf8;');

echo ' - Create table revenue_recognitions...';
$db->query('CREATE TABLE IF NOT EXISTS revenue_recognitions (contract int, amount decimal, recognizedOn date, PRIMARY KEY (contract, recognizedOn))');
echo '<br>Table created successfully.';

echo '<br> - Create table product...';
$db->query('CREATE TABLE IF NOT EXISTS product (
  sku int(11) NOT NULL AUTO_INCREMENT,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at datetime DEFAULT NULL,
  name varchar(255) NOT NULL,
  PRIMARY KEY (sku)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;');

$db->query("INSERT INTO product (sku, created_at, updated_at, name) VALUES
(1, '2016-05-23 13:16:33', '2016-05-24 07:37:15', '1. product'),
(2, '2016-05-23 13:30:39', '2016-05-24 07:44:16', '2. product'),
(3, '2016-05-23 13:31:00', NULL, '3. product');");
echo '<br>Table created and filled successfully.';

echo '<br> - Create users product...';
$db->query("CREATE TABLE IF NOT EXISTS users (
  id int(11) NOT NULL AUTO_INCREMENT,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  name varchar(200) NOT NULL,
  email varchar(200) NOT NULL,
  status int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;");

$db->query("INSERT INTO user (id, created_at, name, email, status) VALUES
(1, '2016-05-25 10:33:11', 'Teszt Elek', 'teszt.elek@example.com', 1),
(2, '2016-05-25 10:33:24', 'Teszt Elekné', 'elekne.teszt@example.com', 1);");
echo '<br>Table created and filled successfully.';
