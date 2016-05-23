<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 23.
 * Time: 13:26
 */

namespace DL\Model;


class RevenueRecognition
{
    private $amount, $date;

    public function __construct($amount, $date)
    {
        $this->date = $date;
        $this->amount = $amount;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function isRecognizableBy($date)
    {
        return $this->date < $date;
    }
}