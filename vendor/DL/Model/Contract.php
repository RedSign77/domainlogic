<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 23.
 * Time: 13:17
 */

namespace DL\Model;

/**
 * Domain Logic: Domain Model example
 *
 * Class Contract
 * @package DL\Model
 */
class Contract
{
    private $product, $whenSigned;
    private $revenueRecognitions = array();

    public function __construct(Product $product, $whenSigned)
    {
        $this->product = $product;
        $this->whenSigned = $whenSigned;
    }

    public function allocate($amount, $by) {
        $lowResult = round($amount / $by, 0, PHP_ROUND_HALF_DOWN);
        $highResult = $lowResult + 1;
        $remainder = $amount % $by;
        $results = array();
        for ($i = 0; $i < $remainder; $i++) {
            $results[$i] = $highResult;
        }
        for ($i = $remainder; $i < $by; $i++) {
            $results[$i] = $lowResult;
        }
        return $results;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function getWhenSigned()
    {
        return $this->whenSigned;
    }

    public function addRevenueRecognition(RevenueRecognition $revenueRecognition)
    {
        $this->revenueRecognitions[] = $revenueRecognition; // Add Revenue Recognitions
    }

    public function calculateRecognitions()
    {
        $this->product->calculateRevenueRecognitions($this); // Proxy pattern
    }

    public function recognizedRevenue($date)
    { // Recognize Revenue
        $result = 0;
        foreach ($this->revenueRecognitions as $r) {
            if ($r->isRecognizableBy($date)) {
                $result += $r->getAmount();
            }
        }
        return $result;
    }
}