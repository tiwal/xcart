{*
$Id: select_currency.tpl,v 1.1.2.1 2011/12/22 06:24:37 ferz Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
<select name="{if $name ne ""}{$name}{else}selected_currency{/if}"{if $id} id="{$id}"{/if}{if $onchange} onchange="{$onchange}"{/if}>
  {foreach from=$currencies item=currency}
  <option value="{if $use_curr_int_code eq "Y"}{$currency.code_int}{else}{$currency.code}{/if}"{if $current_currency eq $currency.code} selected="selected"{/if}>({$currency.code}) {$currency.name}</option>
  {/foreach}
</select>
