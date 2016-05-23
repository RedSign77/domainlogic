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

class CompleteRecognitionStrategy
{
    public function calculateRevenueRecognitions(Contract $contract) {
        $contract->addRevenueRecognition(new RevenueRecognition($contract->getRevenue(), $contract->getWhenSigned()));
    }
}