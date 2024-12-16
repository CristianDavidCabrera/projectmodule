<?php

/*require_once __DIR__ . '/ModelCrud.php';*/


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
            !$this->installDb()) {
            return false;
        }
        return true;
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

    private function installDb()
    {

        $sql = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'fidelity_table` (
            `id_costumer` INT(11) NOT NULL AUTO_INCREMENT,
            `name` INT(255) NOT NULL,
            PRIMARY KEY (`id_costumer`)
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
                'MyModuleCrud',
                (int)$this->id
            );
            return false;
        }
    }

    private function uninstallDb()
    {
        $sql = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'fidelity_table`;';
        return Db::getInstance()->execute($sql);
    }

}

