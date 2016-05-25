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

    public function getMessageByUserIdAndLastSyncDate($userId, $lastSyncDate)
    {
        $results = $this->getMessagesModel()->findByUserFromDate($userId, $lastSyncDate); // Üzenetek lekérdezés - proxy pattern
        $messages = array();
        foreach ($results as $record) {
            $record['sender'] = $this->getUserDTO($record['senderId']); // lekérjük a hozzá tartozó UserDTO-kat
            $record['receiver'] = $this->getUserDTO($record['receiverId']);
            $messages[] = new MessageDTO($record); // példányosítunk egy DTO-t és betoljuk a tömbbe
        }
        return $messages; // visszaadjuk a tömböt
    }

    private function getUserDTO($userId)
    { // szimplán az ID alapján készítünk egy UserDTO objektumot
        $record = $this->getUsersModel()->getUserById($userId);
        return new UserDTO($record['id'], $record['name'], $record['email']); // ez egy nagyon egyszerű DTO
    }
}