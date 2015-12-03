{if $login eq ''}
  {include file="customer/main/login_link.tpl"}
  <a href="register.php">{$lng.lbl_register}</a>
{else}
  <span>{$fullname|default:$login|escape}</span>
  <a href="{$xcart_web_dir}/login.php?mode=logout">{$lng.lbl_logoff}</a>
  <a href="register.php?mode=update">{$lng.lbl_my_account}</a>
{/if}

{if $active_modules.Wishlist}
	<a href="cart.php?mode=wishlist">{$lng.lbl_wish_list}</a>
{/if}

{if $login}
<a href="orders.php">{$lng.lbl_orders_history}</a>
{/if}
{if $smarty.cookies.store_language eq "en"}
<a href="http://congcewang.com/provider/home.php">Open your shop </a>
{/if}
{if $smarty.cookies.store_language eq "zh"}
<a href="http://congcewang.com/provider/home.php">电商入口 </a>
{/if}