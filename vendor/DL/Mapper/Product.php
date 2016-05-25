<?php
/**
 * Data Mapper
 */
namespace DL\Mapper;
use DL\Service\Database;
use \PDO;

/**
 * Class Contract
 * @package DL\Mapper
 */
class Product{

    protected $sku;
    protected $name;
    protected $strategy;

    public function __construct($sku, $strategy)
    {
        $this->strategy = $strategy;
        $this->load($sku);
    }

    private function load($sku)
    {
        $db = Database::getInstance()->getConnection();
        $result = $db->prepare('SELECT * FROM product WHERE sku="'.$sku.'"');
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        $this->sku = $sku;
        foreach ($data as $key => $value) {
            if (method_exists($this, 'set'.ucfirst($key))) {
                $this->{'set'.ucfirst($key)}($value);
            }
        }
    }

    private function setName($name) {
        $this->name = $name;
    }

    public function getSKU()
    {
        return $this->sku;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getStrategy()
    {
        return $this->strategy;
    }


    public function __toString()
    {
        $ret = '<br>Product [SKU: '.$this->getSKU().']';
        $ret .= '<br> - name: '.$this->getName();
        $ret .= '<br> - strategy: '.$this->getStrategy();
        return $ret;
    }

}