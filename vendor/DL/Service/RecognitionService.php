<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 23.
 * Time: 13:14
 */

namespace DL\Service;

use DL\Service\Database;

class RecognitionService
{

    private static $findRecognitionStatement = 'SELECT amount FROM revenue_recognitions WHERE contract = :contract AND recognizedOn <= :date';


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
        $db = Database::getInstance()->getConnection();
        $statement = $db->prepare(self::$findRecognitionStatement);
        $statement->execute(array(
            'contract' => $contractNumber, 'date' => $asOf
        ));
        $result = $statement->fetchAll();
        return $result; // visszatérünk a leszűrt result settel
    }


}