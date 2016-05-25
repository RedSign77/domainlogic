<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 25.
 * Time: 12:59
 */

namespace DL\Model;

use DL\DTO\MessageDTO;
use DL\DTO\UserDTO;

class MessageAssembler
{

    private $messages;
    private $users;

    public function __construct(Users $users, Messages $messages)
    {
        $this->users = $users;
        $this->messages = $messages;
    }

    public function getMessagesModel()
    {
        return $this->messages;
    }

    public function getUsersModel()
    {
        return $this->users;
    }

    private function getUserDTO($userId)
    {
        $record = $this->getUsersModel()->getUserById($userId);
        return new UserDTO($record['id'], $record['name'], $record['email']); // ez egy nagyon egyszerű DTO
    }

    public function getMessageByUserIdAndLastSyncDate($userId, $lastSyncDate)
    {
        $results = $this->getMessagesModel()->findByUserFromDate($userId, $lastSyncDate); // Get messages - proxy pattern
        $messages = array();
        foreach ($results as $record) {
            $record['sender'] = $this->getUserDTO($record['sender']); // Get joined UserDTO-s
            $record['receiver'] = $this->getUserDTO($record['receiver']);
            $messages[] = new MessageDTO($record); // Add MessageDTO
        }
        return $messages;
    }

}