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

class CompleteRecognitionStrategy extends RecognitionStrategy
{
    public function calculateRevenueRecognitions(Contract $contract) {
        $contract->addRevenueRecognition(new RevenueRecognition($contract->getProduct()->getAmount(), $contract->getWhenSigned()));
    }
}