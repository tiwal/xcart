{*
$Id: minicart_total.tpl,v 1.1.2.3 2011/11/10 09:53:44 aim Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
<span class="minicart">
  {if $minicart_total_items gt 0}
    {capture name=tt assign=val}
      {currency value=$minicart_total_cost}
    {/capture}
    <strong>{$minicart_total_items}</strong> {$lng.lbl_cart_items|lower} / <strong class="help-link">{include file="main/tooltip_js.tpl" class="help-link" title=$val text=$lng.txt_minicart_total_note}</strong>
  {else}
    <strong>{$lng.lbl_cart_is_empty}</strong>
  {/if}
{if $minicart_total_standalone}
{load_defer_code type="css"}
{load_defer_code type="js"}
{/if}
</span>
