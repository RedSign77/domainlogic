<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 23.
 * Time: 15:03
 */

namespace DL\Service;

use DL\Model\Singleton;
use \PDO;

class DatabaseService extends Singleton
{

    private $db;

    protected function __construct()
    {
        $this->init();
    }

    private function init()
    {
        if ($this->db === null) {
            $this->db = new PDO('mysql:host=127.0.0.1;port=3306;dbname=domainlogic;charset=UTF8;', 'domainlogic', 'n7TJsZu67EmLdx4p', array(PDO::ATTR_PERSISTENT=>true));
            $this->db->query('SET NAMES utf8;');
        }
    }

    public function getConnection()
    {
        return $this->db;
    }

}
