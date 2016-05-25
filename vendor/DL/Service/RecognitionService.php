<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 23.
 * Time: 13:14
 */

namespace DL\Service;


class RecognitionService
{

    private static $findRecognitionStatement = 'SELECT amount FROM revenue_recognitions WHERE contract = :contract AND recognizedOn <= :date';


    public function recognizedRevenue($contractNumber, $asOf)
    {
        $result = $this->findRecognitionsFor($contractNumber, $asOf); // Use the Proxy pattern
        $amount = 0;
        foreach ($result as $record) {
            $amount += $record['amount']; // Business logic
        }
        return $amount;
    }

    public function findRecognitionsFor($contractNumber, $asOf)
    {
        $db = Database::getInstance()->getConnection(); // Get the database connection object (PDO)
        $statement = $db->prepare(self::$findRecognitionStatement);
        $statement->execute(array(
            'contract' => $contractNumber, 'date' => $asOf
        ));
        $result = $statement->fetchAll();
        return $result; // Return filtered result
    }


}