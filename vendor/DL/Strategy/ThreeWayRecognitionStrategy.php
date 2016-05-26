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
        $allocation = $contract->allocate($contract->getProduct()->getAmount(), 3);
        $contract->addRevenueRecognition(new RevenueRecognition($allocation[0], $contract->getWhenSigned()));
        $contract->addRevenueRecognition(new RevenueRecognition($allocation[1], $this->getNextDate($contract->getWhenSigned(), $this->firstRecognitionOffset)));
        $contract->addRevenueRecognition(new RevenueRecognition($allocation[2], $this->getNextDate($contract->getWhenSigned(), $this->secondRecognitionOffset)));
    }

    private function getNextDate($signed, $offset) {
        return date('Y-m-d H:i:s', strtotime($signed) + 86400 * $offset);
    }

}