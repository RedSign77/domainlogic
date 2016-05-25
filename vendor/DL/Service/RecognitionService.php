<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 23.
 * Time: 13:14
 */

namespace DL\Service;

/**
 * Class RecognitionService
 * @package DL\Service
 *
 * Domain Model: Transaction Script
 *
 */
class RecognitionService
{

    /**
     * @var string  Recognition Statement
     */
    private static $findRecognitionStatement = 'SELECT amount FROM revenue_recognitions WHERE contract = :contract AND recognizedOn <= :date';

    /**
     * Recognize Revenue
     *
     * @param $contractNumber
     * @param $asOf
     * @return int
     */
    public function recognizedRevenue($contractNumber, $asOf)
    {
        $result = $this->findRecognitionsFor($contractNumber, $asOf); // Use the Proxy pattern and fetch data
        $amount = 0;
        foreach ($result as $record) {
            $amount += $record['amount']; // Business logic
        }
        return $amount;
    }

    /**
     * Find recognitions from database
     *
     * @param $contractNumber
     * @param $asOf
     * @return mixed
     */
    public function findRecognitionsFor($contractNumber, $asOf)
    {
        $db = Database::getInstance()->getConnection(); // Get the database connection object (PDO, Singleton)
        $statement = $db->prepare(self::$findRecognitionStatement);
        $statement->execute(array(
            'contract' => $contractNumber, 'date' => $asOf
        ));
        $result = $statement->fetchAll();
        return $result; // Return filtered result
    }


}