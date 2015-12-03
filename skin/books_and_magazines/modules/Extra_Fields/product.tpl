{*
$Id: product.tpl,v 1.1.2.1 2012/04/05 11:53:49 ferz Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
{foreach from=$extra_fields item=v}
  {if $v.active eq "Y" and $v.field_value}
    <tr>
      <td class="property-name property-name2">{$v.field}</td>
      <td class="property-value" colspan="2">{$v.field_value}</td>
    </tr>
  {/if}
{/foreach}
