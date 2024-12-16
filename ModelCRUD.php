<?php

class ModelCRUDodel extends ObjectModel
{
    private function installDb()
    {

        $sql = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'fifelity_table` (
        `idCustomer` INT(11) NOT NULL AUTO_INCREMENT,
        `fidelityPoints` INT(255) NOT NULL,
        PRIMARY KEY (`idCustomer`)
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