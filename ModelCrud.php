<?php


if (!defined('_PS_VERSION_')) {
    exit;
}

class ModelCrud extends ObjectModel
{

    public $id_costumer;
    public $points;

    public static $definition = [
        'table' => 'fidelity_table',
        'primary' => 'id_costumer',
        'fields' => [
            'id_costumer' => [
                'type' => self::TYPE_INT,
                'validate' => 'isUnsignedId',
                'required' => true,
            ],
            'points' => [
                'type' => self::TYPE_INT,
                'validate' => 'isInt',
                'required' => true,
            ],

        ],
    ];


    public static function createRecord($id_costumer, $points)
    {
        $sql = 'INSERT INTO `' . _DB_PREFIX_ . self::$definition['table'] . '` (`id_costumer`, `points`) VALUES (' . (int)$id_costumer . ', ' . (int)$points . ')';
        return Db::getInstance()->execute($sql);

    }

    public static function readAllRecords()
    {
        $sql = 'SELECT * FROM `' . _DB_PREFIX_ . self::$definition['table'] . '`';
        return Db::getInstance()->executeS($sql);
    }


    public static function readRecordById($id_costumer)
    {
        $sql = 'SELECT * FROM `' . _DB_PREFIX_ . self::$definition['table'] . '` WHERE `id_costumer` = ' . (int)$id_costumer;
        return Db::getInstance()->getRow($sql);
    }


    public static function updateRecord($id_costumer, $points)
    {
        $sql = 'UPDATE `' . _DB_PREFIX_ . self::$definition['table'] . '` SET `points` = "' . (int)$points . '" WHERE `id_costumer` = ' . (int)$id_costumer;
        return Db::getInstance()->execute($sql);
    }


    public static function deleteRecord($id_costumer)
    {
        $sql = 'DELETE FROM `' . _DB_PREFIX_ . self::$definition['table'] . '` WHERE `id_costumer` = ' . (int)$id_costumer;
        return Db::getInstance()->execute($sql);

    }

}

