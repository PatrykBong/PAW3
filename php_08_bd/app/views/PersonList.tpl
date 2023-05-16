{extends file="main.tpl"}

{block name=content}

<table>
<thead>
	<tr>
		<th>id</th>
		<th>kwota</th>
		<th>oprocentowanie</th>
		<th>lata</th>
		<th>rata</th>
		<th>data</th>
	</tr>
<thead>
<tbody>
{foreach $people as $p}
{strip}
	<tr>
		<td>{$p["id_wynik"]}</td>
		<td>{$p["kwota"]}</td>
		<td>{$p["oprocentowanie"]}</td>
		<td>{$p["lata"]}</td>
		<td>{$p["rata"]}</td>
		<td>{$p["data"]}</td>
		<td>
			<a href="{$conf->action_url}personEdit&id={$p['idperson']}">Edytuj</a>
			&nbsp;
			<a href="{$conf->action_url}personDelete&id={$p['idperson']}">Usuń</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}
