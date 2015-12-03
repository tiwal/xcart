{*
$Id: content.tpl,v 1.1.2.1 2012/04/05 11:53:49 ferz Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
{include file="customer/dialog_message.tpl"}

{if $main eq 'cart'}

<table width="100%" cellspacing="0" cellpadding="0">
<tr>
	<td><h1>{$lng.lbl_your_shopping_cart}</h1></td>

	<td align="right">
  <div class="checkout-buttons">
    {if not $std_checkout_disabled}
      {include file="customer/buttons/button.tpl" button_title=$lng.lbl_checkout style="div_button" href="cart.php?mode=checkout" additional_button_class="checkout-3-button main-button"}
    {/if}
    {include file="customer/buttons/button.tpl" button_title=$lng.lbl_continue_shopping style="div_button" href=$stored_navigation_script additional_button_class="checkout-1-button"}
  </div>
  <div class="clearing"></div>
	</td>
</tr>
</table>

  {include file="customer/main/cart.tpl"}

{else}

  {include file="modules/One_Page_Checkout/opc_main.tpl"}

{/if}
