{*
$Id: menu_cart.tpl,v 1.4.2.1 2012/02/20 09:04:22 aim Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
{if $config.General.ajax_add2cart eq 'Y' and $main ne 'cart' and $main ne 'checkout'}
  {include file="customer/ajax.minicart.tpl" _include_once=1}
{/if}

{capture name=menu}

{include file="customer/minicart_total.tpl"}

{include file="customer/cart_checkout_links.tpl"}

<ul>
  {if $active_modules.Wishlist and $wlid ne ""}
    <li><a href="cart.php?mode=friend_wl&amp;wlid={$wlid|escape}">{$lng.lbl_friends_wish_list}</a></li>
  {/if}

  {if $active_modules.Wishlist}
    <li><a href="cart.php?mode=wishlist">{$lng.lbl_wish_list}</a></li>

    {if $active_modules.Gift_Registry}
      <li><a href="giftreg_manage.php">{$lng.lbl_gift_registry}</a></li>
    {/if}
  
  {/if}

</ul>
{/capture}
{if $config.General.ajax_add2cart eq 'Y' and $main ne 'cart' and $main ne 'checkout' and $minicart_total_items gt 0}
  {assign var=additional_class value="menu-minicart ajax-minicart"}
{else}
  {assign var=additional_class value="menu-minicart"}
{/if}
{if $minicart_total_items gt 0}
  {assign var=additional_class value="`$additional_class` full-mini-cart"}
{/if}
{include file="customer/menu_dialog.tpl" title=$lng.lbl_your_cart content=$smarty.capture.menu}