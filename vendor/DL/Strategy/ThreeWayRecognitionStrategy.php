<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 23.
 * Time: 13:27
 */

namespace DL\Strategy;

use DL\Model\RevenueRecognition;
use DL\Model\Contract;

class ThreeWayRecognitionStrategy extends RecognitionStrategy
{
    private $firstRecognitionOffset, $secondRecognitionOffset;

    public function __construct($firstRecognitionOffset, $secondRecognitionOffset)
    {
        $this->firstRecognitionOffset = $firstRecognitionOffset;
        $this->secondRecognitionOffset = $secondRecognitionOffset;
    }

    public function calculateRevenueRecognitions(Contract $contract)
    {
        $allocation = $contract->getRevenue()->allocate(3);
        $contract->addRevenueRecognition(new RevenueRecognition($allocation[0], $contract->getWhenSigned()));
        $contract->addRevenueRecognition(new RevenueRecognition($allocation[1], $contract->getWhenSigned()->add($this->firstRecognitionOffset)));
        $contract->addRevenueRecognition(new RevenueRecognition($allocation[2], $contract->getWhenSigned()->add($this->secondRecognitionOffset)));
    }

    public function __toString()
    {
        $ret = '<br>'.get_class($this);
        $ret .= '<br> - First offset: '.$this->firstRecognitionOffset;
        $ret .= '<br> - Second offset: '.$this->secondRecognitionOffset;
        return $ret;
    }

}