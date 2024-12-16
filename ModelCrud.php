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

/*
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

    }*/


    public static function readAllRecords()
    {
        $sql = 'SELECT * FROM '._DB_PREFIX_.'fidelity_table';
        return Db::getInstance()->executeS($sql);
    }


    public function renderList()
    {
        // Usa el HelperList de PrestaShop
        $helper = new HelperList();
        $helper->shopLinkType = '';
        $helper->simple_header = true;

        $helper->actions = ['edit', 'delete'];
        $helper->listTotal = count(ModelCrud::readAllRecords());

        $helper->identifier = 'id_customer'; // Columna clave primaria
        $helper->table = $this->table;
        $helper->title = $this->l('Lista de Puntos de Fidelización');
        $helper->token = $this->token; // Token de seguridad
        $helper->currentIndex = $this->context->link->getAdminLink($this->controller_name);

        $fields = [
            'id_customer' => ['title' => $this->l('ID Cliente'), 'type' => 'int'],
            'points' => ['title' => $this->l('Puntos'), 'type' => 'int', 'editable' => true]
        ];

        $records = ModelCrud::readAllRecords();

        return $helper->generateList($records, $fields);
    }


    public function processEdit()
    {
        $id_customer = (int)Tools::getValue('id_customer');
        $points = (int)Tools::getValue('points');

        if ($id_customer && Validate::isUnsignedId($id_customer) && Validate::isInt($points)) {
            Db::getInstance()->update('fidelity_table', [
                'points' => $points
            ], 'id_customer = '.$id_customer);
        } else {
            $this->errors[] = $this->l('Error al actualizar los puntos.');
        }

        Tools::redirectAdmin(self::$currentIndex.'&token='.$this->token);
    }


}

