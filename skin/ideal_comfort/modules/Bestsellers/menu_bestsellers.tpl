{*
$Id: menu_bestsellers.tpl,v 1.1.1.1 2012/04/05 10:16:14 ferz Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
{if $config.Bestsellers.bestsellers_menu eq "Y" and $bestsellers}

  {capture name=menu}
    <ul>

      {foreach from=$bestsellers item=b name=bestsellers}
        <li{interline name=bestsellers}>
			<div class="image">
				<a href="product.php?productid={$b.productid}&amp;cat={$cat}&amp;bestseller=Y">
					{include file="product_thumbnail.tpl" src=$b.tmbn_url productid=$b.productid image_x=$b.tmbn_x class="image" product=$b.product}
				</a>
			</div>
			<a href="product.php?productid={$b.productid}&amp;cat={$cat}&amp;bestseller=Y">{$b.product|escape}</a>
			<div class="price-row">
				<span class="price-value">{include file="currency.tpl" value=$b.taxed_price}</span>
				<span class="market-price">{include file="customer/main/alter_currency_value.tpl" alter_currency_value=$b.taxed_price}</span>
			</div>
        </li>
      {/foreach}

    </ul>
  {/capture}
  {include file="customer/menu_dialog.tpl" title=$lng.lbl_bestsellers content=$smarty.capture.menu additional_class="menu-bestsellers"}

{/if}
