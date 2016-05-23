<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 23.
 * Time: 13:17
 */

namespace DL\Model;

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
        $this->revenueRecognitions[] = $revenueRecognition; // hozzácsapjuk a bevételi kimutatásokat
    }

    public function calculateRecognitions()
    {
        $this->product->calculateRevenueRecognitions($this); // továbbítjuk a kérést a produkt osztály felé
    }

    public function recognizedRevenue($date)
    { // ez számolja ki, hogy mennyi bevételünk származott az adott időpontig
        $result = 0;
        foreach ($this->revenueRecognitions as $r) {
            if ($r->isRecognizableOf($date)) {
                $result += $r->getAmount();
            }
        }
        return $result; // és visszatér az összesített értékkel
    }
}