<?php
/**
 * Simple PHP installer
 */
$db = new PDO('mysql:host=127.0.0.1;port=3306;dbname=domainlogic;charset=UTF8;', 'domainlogic', 'n7TJsZu67EmLdx4p', array(PDO::ATTR_PERSISTENT=>true));
$db->query('SET NAMES utf8;');

echo ' - Create table revenue_recognitions...';
$db->query('CREATE TABLE IF NOT EXISTS revenue_recognitions (contract int, amount decimal, recognizedOn date, PRIMARY KEY (contract, recognizedOn))');
echo '<br>Table created successfully.';

echo '<br> - Create product table...';
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

echo '<br> - Create users table...';
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

echo '<br> - Create messages table...';
$db->query("CREATE TABLE IF NOT EXISTS messages (
  id int(11) NOT NULL AUTO_INCREMENT,
  sendDate timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  closeDate datetime DEFAULT NULL,
  sender int(11) NOT NULL,
  receiver int(11) NOT NULL,
  subject varchar(255) NOT NULL,
  body mediumtext NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4;");

$db->query("INSERT INTO messages (id, sendDate, closeDate, sender, receiver, subject, body) VALUES
(1, '2016-05-25 11:16:53', '2016-05-25 13:17:10', 1, 2, 'Hello!', 'Hi Dear!\r\n\r\nDo you have a pencil?\r\n\r\nE.\r\n'),
(2, '2016-05-25 11:17:26', NULL, 2, 1, 'Re: Hello!', 'Hi!\r\n\r\nNo. :-(\r\n\r\n>> Original message:\r\nHi Dear!\r\n\r\nDo you have a pencil?\r\n\r\nE.'),
(3, '2016-05-25 11:17:45', NULL, 1, 2, 'Re: Hello!', 'Oh, nooo....');");
echo '<br>Table created and filled successfully.';

