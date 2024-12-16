<?php

require_once _PS_MODULE_DIR_ . 'projectmodule/ModelCrud.php';

class AdminProjectModuleController extends ModuleAdminController
{
    public function __construct()
    {
        $this->table = 'fidelity_table';
        $this->className = 'mymodulecrud';
        $this->lang = false;
        $this->bootstrap = true;
        $this->fields_list = [
            'id_customer' => [
                'title' => $this->trans('ID CLIENTE', [], 'Modules'),
                'align' => 'center',
                'type' => 'int'
            ],
            'points' => [
                'title' => $this->trans('Puntos', [], 'Modules'),
                'align' => 'center',
                'type' => 'int',
                'editable' => true
            ],
        ];

        $this->addRowAction('edit');
        $this->addRowAction('delete');

        if (!$this->translator) {
            $this->translator = $this->getTranslator();
        }

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

    public function renderForm()
    {
        $this->fields_form = [
            'legend' => [
                'title' => $this->trans('Editar Puntos de Fidelidad', [], 'Modules'),
                'icon' => 'icon-cogs',
            ],
            'input' => [
                [
                    'type' => 'text',
                    'label' => $this->trans('ID Cliente', [], 'Modules'),
                    'name' => 'id_customer',
                    'readonly' => true,
                ],
                [
                    'type' => 'text',
                    'label' => $this->trans('Puntos', [], 'Modules'),
                    'name' => 'points',
                    'required' => true,
                ],
            ],
            'submit' => [
                'title' => $this->trans('Guardar', [], 'Modules'),
                'class' => 'btn btn-default pull-right',
            ],
        ];

        return parent::renderForm();
    }


}

