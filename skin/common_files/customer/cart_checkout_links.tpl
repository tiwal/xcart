{*
$Id: cart_checkout_links.tpl,v 1.2.2.1 2012/02/20 09:04:22 aim Exp $ 
vim: set ts=2 sw=2 sts=2 et:
*}
<div class="cart-checkout-links">
{if $active_modules.Wishlist ne "" or $minicart_total_items gt 0}
<hr class="minicart" />
{/if}
{if $minicart_total_items gt 0}
  <ul>
    <li><a href="cart.php">{$lng.lbl_view_cart}</a></li>

    {if $active_modules.Google_Checkout eq ""}
      <li><a href="cart.php?mode=checkout">{$lng.lbl_checkout}</a></li>
    {/if}
  </ul>
{/if}
</div>
