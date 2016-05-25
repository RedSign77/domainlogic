<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 25.
 * Time: 12:26
 */

namespace DL\Model;


use DL\Service\Database;

class Users
{

    public function getUserById($userId)
    {
        $db = Database::getInstance()->getConnection();
        $result = $db->query('SELECT * FROM users WHERE id=' . $userId);
        return $result->fetch(\PDO::FETCH_ASSOC);
    }
}