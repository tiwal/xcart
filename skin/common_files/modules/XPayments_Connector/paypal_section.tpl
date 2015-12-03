{*
$Id: paypal_section.tpl,v 1.1.4.1 2012/04/10 10:36:55 aim Exp $
vim: set ts=2 sw=2 sts=2 et:
*}

<tr>
  <td>{$lng.txt_xpc_paypal_dp_equals_list}:</td>
  <td>
    {*Cardholder data must be collected in X-Payments: set to Y always*}
    <input type="hidden" name="{$conf_prefix}[use_xpc]" value="Y" />
    <select name="{$conf_prefix}[use_xpc_processor]">
      {if $xpc_data.warning eq 'no processor'}
        <option value="">{$lng.lbl_please_select_one}</option>
      {/if}
      {foreach from=$xpc_data.processors item=p}
        <option value="{$p.param01}"{if $p.selected} selected="selected"{/if}>{$p.module_name}</option>
      {/foreach}
    </select><br />
    <font class="SmallText">{$lng.txt_xpc_paypal_dp_note}</font>
  </td>
</tr>

{if $xpc_data.warning eq 'no configured'}
<tr>
  <td>&nbsp;</td>
  <td><strong>{$lng.lbl_warning}!</strong> {$lng.txt_xpc_paypal_dp_empty_warning}</td>
</tr>

{elseif $xpc_data.warning eq 'no equal'}
<tr>
  <td>&nbsp;</td>
  <td><strong>{$lng.lbl_warning}!</strong> {$lng.txt_xpc_paypal_dp_equal_warning}</td>
</tr>
{/if}
