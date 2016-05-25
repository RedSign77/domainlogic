<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 25.
 * Time: 13:04
 */

namespace DL\DTO;

class MessageDTO extends DTOModel
{

    private $sender;
    private $receiver;
    private $subject;
    private $body;
    private $sendDate;
    private $closeDate;

    public function __construct($record)
    {
        $this->sender = $record['sender'];
        $this->receiver = $record['receiver'];
        $this->subject = $record['subject'];
        $this->body = $record['body'];
        $this->sendDate = $record['sendDate'];
        $this->closeDate = $record['closeDate'];
    }


}