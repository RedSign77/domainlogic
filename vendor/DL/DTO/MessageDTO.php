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


    /**
     * @return mixed
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param mixed $sender
     */
    public function setSender($sender)
    {
        $this->sender = $sender;
    }

    /**
     * @return mixed
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * @param mixed $receiver
     */
    public function setReceiver($receiver)
    {
        $this->receiver = $receiver;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getSendDate()
    {
        return $this->sendDate;
    }

    /**
     * @param mixed $sendDate
     */
    public function setSendDate($sendDate)
    {
        $this->sendDate = $sendDate;
    }

    /**
     * @return mixed
     */
    public function getCloseDate()
    {
        return $this->closeDate;
    }

    /**
     * @param mixed $closeDate
     */
    public function setCloseDate($closeDate)
    {
        $this->closeDate = $closeDate;
    }

}