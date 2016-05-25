<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 25.
 * Time: 12:58
 */

namespace DL\Model;


use DL\Service\Database;

class Messages
{

    public function findByUserFromDate($userId, $lastModification)
    {
        $db = Database::getInstance()->getConnection();
        $result = $db->prepare('SELECT * FROM messages WHERE sender=:userid AND sendDate>=:lastmod');
        $result->execute(array(
            ':userid' => $userId,
            ':lastmod' => $lastModification
        ));
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

}