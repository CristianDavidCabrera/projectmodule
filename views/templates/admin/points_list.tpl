{extends file="layout.tpl"}

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
                        <th>{l s='ID'}</th>
                        <th>{l s='Points'}</th>
                    </tr>
                    </thead>
                    <tbody>
                    {foreach from=$records item=record}
                        <tr>
                            <td>{$record.id_costumer}</td>
                            <td>{$record.points}</td>
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
