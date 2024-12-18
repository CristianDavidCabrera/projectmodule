<?php
class ProjectmodulePointsModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();

        $id_customer = $this->context->customer->id;
        $pointsData = $this->readRecordById($id_customer);
        if ($pointsData) {
            $points = $pointsData['points'];
        } else {
            $points = 0;
        }
        $this->context->smarty->assign('points', $points);
        $this->setTemplate('module:projectmodule/views/templates/front/fidelity.tpl');
    }

    public static function readRecordById($id_customer)
    {
        $sql = 'SELECT * FROM `' . _DB_PREFIX_ . 'fidelity_table` WHERE `id_customer` = ' . (int)$id_customer;
       return Db::getInstance()->getRow($sql);
    }

}