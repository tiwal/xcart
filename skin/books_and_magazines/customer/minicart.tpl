{*
$Id: minicart.tpl,v 1.1.2.1 2012/04/05 11:53:48 ferz Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
<div class="minicart-box">
<div class="minicart-box2">
	<div class="minicart-total-num">{$minicart_total_items} {$lng.lbl_items}</div>

  <form action="{$xcart_web_dir}/cart.php" method="post" name="minicartform">
    <input type="hidden" name="action" value="update" />

    <ul class="cart-items">

      {foreach from=$products item=product name=products}

        {if $product.hidden eq ''}

        <li{interline index=$smarty.foreach.products.index total=$list_length}>

          <a href="{$xcart_web_dir}/product.php?productid={$product.productid}" class="minicart-lnk">{$product.product}</a>
	<br />

          {if $active_modules.Product_Configurator and $product.product_type eq "C"}
            {assign var="price" value=$product.pconf_display_price}
          {else}
            {assign var="price" value=$product.display_price}
          {/if}

          <div class="price-row">

            {if $active_modules.Subscriptions and $product.sub_plan and $product.product_type ne "C"}

              {if $product.sub_onedayprice gt 0 and $product.sub_days_remain gt 0}

                (<span class="price">{include file="currency.tpl" value=$product.catalogprice}</span>
                +
                <span class="price">{include file="currency.tpl" value=$product.sub_onedayprice}</span>
                x
                {$product.sub_days_remain})
                x
                <input type="text" name="productindexes[{$product.cartid}]" value="{$product.amount}" class="quantity" />
                =
                <span class="total">{assign var=unformatted value=$product.sub_days_remain|multi:$product.sub_days_remain|inc:$product.catalogprice|multi:$product.amount}{include file="currency.tpl" value=$unformatted}</span>

              {else}

                <span class="price">{include file="currency.tpl" value=$product.catalogprice}</span>
                x
                <input type="text" name="productindexes[{$product.cartid}]" value="{$product.amount}" class="quantity" />
                =
                <span class="total">{multi x=$price y=$product.amount format="%.2f" assign=unformatted}{include file="currency.tpl" value=$unformatted}</span>

              {/if}
            
            {else}

              {if $active_modules.Egoods and $product.distribution}

                <span class="quantity">
                  1
                  <input type="hidden" name="productindexes[{$product.cartid}]" value="1" />
                </span>

              {else}

                <input type="text" name="productindexes[{$product.cartid}]" value="{$product.amount}" class="quantity" />
              {/if}
              x
              <span class="price">{include file="currency.tpl" value=$price}</span>
              =
              <span class="total">{multi x=$price y=$product.amount assign=unformatted}{include file="currency.tpl" value=$unformatted}</span>

            {/if}

            <a href="{$xcart_web_dir}/cart.php?mode=delete&amp;productindex={$product.cartid}" class="delete" title="{$lng.lbl_delete_item|escape}"><img src="{$ImagesDir}/spacer.gif" alt="" /></a>
          </div>

        </li>

        {/if}

      {/foreach}

      {foreach from=$giftcerts item=gc key=gcindex name=giftcerts}

        <li{interline index=$smarty.foreach.giftcerts.index total=$list_length}>
          <a href="{$xcart_web_dir}/giftcert.php?gcindex={$gcindex}">{$lng.lbl_gift_certificate}</a>
          <a href="{$xcart_web_dir}/giftcert.php?mode=delgc&amp;gcindex={$gcindex}" class="delete" title="{$lng.lbl_delete_item|escape}"><img src="{$ImagesDir}/spacer.gif" alt="" /></a>
          <br />
          <table cellspacing="1" cellpadding="2">
            <tr>
              <td>{$lng.lbl_recipient}:</td>
              <td>{$gc.recipient}</td>
            </tr>
            <tr>
              <td>{$lng.lbl_amount}:</td>
              <td>{include file="currency.tpl" value=$gc.amount}</td>
            </tr>
          </table>
        </li>    

      {/foreach}

      {if $cart_not_full}
        <li class="dots">&hellip;</li>
        <li><a href="{$xcart_web_dir}/cart.php">{$lng.lbl_other_products_in_cart}</a></li>
      {/if}

    </ul>

    <div class="left-buttons-row buttons-row hidden">
      {include file="customer/buttons/update.tpl" type="input" additional_button_class="update-cart light-button"}
      <div class="button-separator"></div>
      {include file="customer/buttons/button.tpl" button_title=$lng.lbl_clear_cart href="`$xcart_web_dir`/cart.php?mode=clear_cart" additional_button_class="clear-cart light-button"}
    </div>

  </form>

	<div class="buttons-row">
		{include file="customer/buttons/button.tpl" button_title=$lng.lbl_view_cart href="`$xcart_web_dir`/cart.php"}
		<div class="button-separator"></div>

		{if $gcheckout_enabled or $paypal_express_active}
 	           {if $paypal_express_active}
			<div class="button-separator"></div>
	              {include file="payments/ps_paypal_pro_express_checkout.tpl" paypal_express_link="button"}
        	    {/if}

	            {if $gcheckout_enabled}
			<div class="button-separator"></div>
	              {include file="modules/Google_Checkout/gcheckout_button.tpl"}
        	    {/if}
		{else}
			{include file="customer/buttons/button.tpl" button_title=$lng.lbl_checkout href="`$xcart_web_dir`/cart.php?mode=checkout" additional_button_class="main-button"}
		{/if}
	</div>
</div>
</div>