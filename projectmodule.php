<?php

require_once __DIR__ . '/ModelCrud.php';


if(!defined('_PS_VERSION_')){
    exit;
}
class ProjectModule extends Module {
    public function __construct() {
        $this->name = 'projectmodule';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Cristian Cabrera';
        $this->need_instance = 0;
        $this->bootstrap = true;

        $this->displayName = 'Module project';
        $this->description ='Module project';
        $this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => _PS_VERSION_);

        parent::__construct();
    }

    public function install()
    {
        if (!parent::install() ||
            !Configuration::updateValue('NEW_MODULE_CONFIG', 'value') ||
            !$this->installDb() ||
            !$this->registerTab() ||
            !$this->registerHook('actionValidateOrder') ||
            !$this->registerHook('displayCustomerAccount') ||
            !$this->registerHook('displayOrderConfirmation')) {
            return false;
        }
        return true;
    }

   private function registerTab()
    {
        $tab = new Tab();
        $tab->class_name = 'Points'; // Nombre del controlador
        $tab->module = $this->name;
        $tab->id_parent = (int)Tab::getIdFromClassName('AdminParentCustomer');
      /*  $tab->name='Puntos de fidelidad';*/
       $tab->name = [];
        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = 'Puntos de Fidelidad';
        }

        return $tab->save();
    }

    private function installDb()
    {

        $sql = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'fidelity_table` (
            `id_customer` INT(11) NOT NULL AUTO_INCREMENT,
            `points` INT NOT NULL,
            PRIMARY KEY (`id_customer`)
        ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';

        try {
            if (!Db::getInstance()->execute($sql)) {
                throw new Exception('Table creation failed');
            }
            return true;
        } catch (Exception $e) {
            PrestaShopLogger::addLog(
                'Failed to create table `' . _DB_PREFIX_ . 'custom_table`. Error: ' . $e->getMessage(),
                3,
                null,
                'ModuleCrud',
                (int)$this->id
            );
            return false;
        }
    }

    public function uninstall()
    {
        if (!$this->uninstallDb() ||
            !Configuration::deleteByName('NEW_MODULE_CONFIG') ||
            !parent::uninstall()) {
            return false;
        }
        return true;
    }

    private function uninstallDb()
    {
        $sql = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'fidelity_table`;';
        return Db::getInstance()->execute($sql);
    }

    public function hookActionValidateOrder($params){

        $id_customer = $params['customer']->id;
        $id_order = (float)$params['order']->total_paid;
        $points = floor($id_order*0.5);


        $sql = 'INSERT INTO ' . _DB_PREFIX_ . 'fidelity_table (id_customer, points)
                VALUES (' . $id_customer . ', ' . $points . ')
                ON DUPLICATE KEY UPDATE points = points + ' . $points . ';';

            return Db::getInstance()->execute($sql);

    }

    public function hookDisplayCustomerAccount($params)    {
        $link = Context::getContext()->link->getModuleLink('projectmodule', 'Points');
        return '<a class="col-lg-4 col-md-6 col-sm-6 col-xs-12"  href="'.$link.'">
                  <span class="link-item">
                    <i class="material-icons">star</i>
                        Mi lista de puntos
                  </span>
                </a>';
    }



        public function getPoints($id_customer)
        {
            $sql = 'SELECT points FROM ' . _DB_PREFIX_ . 'fidelity_table WHERE id_customer = ' . (int)$id_customer;
            $result = Db::getInstance()->getRow($sql);
            return $result ? $result['points'] : 0;
        }

    
    public function hookDisplayOrderConfirmation($params)
    {
        
        $customer = $this->context->customer->id;
        $points = $this->getPoints($customer);

        return '<h3 class="h1 card-title">
                <i class="material-icons rtl-no-flip done"></i>You earned '.$points.' points
              </h3>';
    }

}

