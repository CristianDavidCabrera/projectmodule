<?php
class PointsController extends ModuleAdminController
{
    public function __construct()
    {
        $this->table = 'fidelity_table'; // Tabla que manejarás
        $this->className = 'Points';
        $this->lang = false; // Si no hay traducciones
        $this->bootstrap = true;

        parent::__construct();
    }
    public function initContent()
    {
        parent::initContent();

        $this->context->smarty->assign(array('points'=>$this->getPoints()));
        $this->setTemplate('points_list.tpl');
    }

    public function getPoints(){
          /*  $sql = 'SELECT * FROM '._DB_PREFIX_.'fidelity_table';
            return Db::getInstance()->executeS($sql);*/

        $sql = 'SELECT f.id_customer, f.points, c.firstname, c.lastname 
                FROM `' . _DB_PREFIX_ . 'fidelity_table` f
                LEFT JOIN `' . _DB_PREFIX_ . 'customer` c 
                ON f.id_customer = c.id_customer';

        return Db::getInstance()->executeS($sql);
    }

}



