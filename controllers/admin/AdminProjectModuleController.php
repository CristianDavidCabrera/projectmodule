<?php

require_once _PS_MODULE_DIR_ . 'projectmodule/ModelCrud.php';

class AdminProjectModuleController extends ModuleAdminController
{
    public function __construct()
    {
        $this->table = 'fidelity_table';
        $this->className = 'mymodulecrud';
        $this->lang = false;
        $this->addRowAction('edit');
        $this->addRowAction('delete'); // Opcional: Agregar acción de eliminación en cada fila
        parent::__construct();
    }

    public function renderList()
    {
        // Llamamos a nuestro modelo para obtener todos los registros
        $records = ModelCrud::readAllRecords();

        // Le pasamos los datos al template
        $this->context->smarty->assign('records', $records);

        // Devuelve la vista
        return $this->context->smarty->fetch($this->module->getPathUri() . 'views/templates/admin/points_list.tpl');
    }
}

