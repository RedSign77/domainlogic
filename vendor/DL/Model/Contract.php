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
    private $product, $revenue, $whenSigned, $id;
    private $revenueRecognitions = array();

    public function __construct(Product $product, $revenue, $whenSigned)
    {
        $this->product = $product;
        $this->revenue = $revenue;
        $this->whenSigned = $whenSigned;
    }

    public function getRevenue()
    {
        return $this->revenue;
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
            if ($r->isRecognizableOf($date)) {
                $result += $r->getAmount();
            }
        }
        return $result;
    }
}