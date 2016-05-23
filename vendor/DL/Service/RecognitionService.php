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

    private static $findRecognitionStatement = 'SELECT amount FROM revenueRecognitions WHERE contract = :contract AND recognizedOn <= :date';

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function recognizedRevenue($contractNumber, $asOf)
    {
        $result = $this->findRecognitionsFor($contractNumber, $asOf); // továbbproxyzzuk a kérést
        $amount = 0;
        foreach ($result as $record) {
            $amount += $record['amount']; // végigiterálunk a sorokon és az értékeket összeadjuk
        }
        return $amount;
    }

    public function findRecognitionsFor($contractNumber, $asOf)
    { // ez fog kapcsolatba lépni az adatbázissal
        $statement = $this->db->createStatement(self::$findRecognitionStatement);
        $result = $statement->execute(array(
            'contract' => $contractNumber, 'date' => $asOf
        ));
        return $result; // visszatérünk a leszűrt result settel
    }

}