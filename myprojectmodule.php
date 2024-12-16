<?php

require_once __DIR__ . '/ModelCRUD.php';


if(!defined('_PS_VERSION_')){
    exit;
}
class MyProjectModule extends Module {
    public function __construct() {
        $this->name = 'myprojectmodule';
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

}

