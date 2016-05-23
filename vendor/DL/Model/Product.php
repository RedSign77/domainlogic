<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 23.
 * Time: 13:18
 */

namespace DL\Model;

use DL\Strategy\RecognitionStrategy;
use DL\Strategy\CompleteRecognitionStrategy;
use DL\Strategy\ThreeWayRecognitionStrategy;

class Product
{
    private $name, $recognitionStrategy;

    public function __construct($name, RecognitionStrategy $recognitionStrategy)
    {
        $this->name = $name;
        $this->recognitionStrategy = $recognitionStrategy;
    }

    public static function newWordProcessor($name)
    {
        return new self($name, new CompleteRecognitionStrategy()); // különböző stratégiák alapján példányosítjuk a termékünket
    }

    public static function newSpreadSheet($name)
    {
        return new self($name, new ThreeWayRecognitionStrategy(60, 90));
    }

    public static function newDatabase($name)
    {
        return new self($name, new ThreeWayRecognitionStrategy(30, 60));
    }

    public function calculateRevenueRecognitions(Contract $contract)
    { // az adott termékre vonatkozó bevételeket számolja ki
        $this->recognitionStrategy->calculateRevenueRecognitions($contract);
    }
}