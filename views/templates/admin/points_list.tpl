{block name="content"}
    <div class="panel">
        <div class="panel-heading">
            <h3>{l s='Points List'}</h3>
        </div>
        <div class="panel-body">
            {if $points}
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>{l s='ID Cliente'}</th>
                        <th>{l s='Puntos'}</th>
                        <th>{l s='Nombre'}</th>
                        <th>{l s='Apellidos'}</th>
                    </tr>
                    </thead>
                    <tbody>
                    {foreach from=$points item=record}
                        <tr>
                            <td>{$record.id_customer}</td>
                            <td>{$record.points}</td>
                            <td>{$record.firstname}</td>
                            <td>{$record.lastname}</td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
            {else}
                <p>{l s='No records found.'}</p>
            {/if}
        </div>
    </div>
{/block}


