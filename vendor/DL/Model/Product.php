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


class Product extends \DL\Mapper\Product
{
    public function __construct($sku, RecognitionStrategy $recognitionStrategy) {
        parent::__construct($sku, $recognitionStrategy);
    }

    public static function newWordProcessor($sku) {
        return new self($sku, new CompleteRecognitionStrategy()); // különböző stratégiák alapján példányosítjuk a termékünket
    }
    public static function newSpreadSheet($sku) {
        return new self($sku, new ThreeWayRecognitionStrategy(60,90));
    }
    public static function newDatabase($sku) {
        return new self($sku, new ThreeWayRecognitionStrategy(30,60));
    }

    public function calculateRevenueRecognitions(Contract $contract)  { // az adott termékre vonatkozó bevételeket számolja ki
        $this->strategy->calculateRevenueRecognitions($contract);
    }
}