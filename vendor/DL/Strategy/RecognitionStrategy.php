<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 23.
 * Time: 13:26
 */

namespace DL\Strategy;

use DL\Model\Contract;

abstract class RecognitionStrategy
{
    public abstract function calculateRevenueRecognitions(Contract $contract);
}
