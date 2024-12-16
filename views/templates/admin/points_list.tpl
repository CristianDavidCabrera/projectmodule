{extends file="layout.tpl"}
{*
{block name="content"}
    <div class="panel">
        <div class="panel-heading">
            <h3>{l s='Points List'}</h3>
        </div>
        <div class="panel-body">
            {if $records}
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>{l s='ID Cliente'}</th>
                        <th>{l s='Puntos'}</th>
                        <th>{l s='Acciones'}</th>
                    </tr>
                    </thead>
                    <tbody>
                    {foreach from=$records item=record}
                        <tr>
                            <td>{$record.id_costumer}</td>
                            <td>{$record.points}</td>
                           *}{* <td>
                                <a href="{$link->getAdminLink('AdminProjectModule', true, [], ['id_customer' => $record.id_customer, 'action' => 'edit'])}" class="btn btn-default">Editar</a>
                                <a href="{$link->getAdminLink('AdminProjectModule', true, [], ['id_customer' => $record.id_customer, 'action' => 'delete'])}" class="btn btn-danger">Eliminar</a>
                            </td>*}{*
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
            {else}
                <p>{l s='No records found.'}</p>
            {/if}
        </div>
    </div>
{/block}*}

{block name='content'}
    <h1>Lista de puntos</h1>
    <p>Esta es una plantilla básica de prueba.</p>
{/block}