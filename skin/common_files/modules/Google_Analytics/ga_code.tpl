{*
$Id: ga_code.tpl,v 1.3.2.1 2011/12/06 08:08:31 aim Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
<script type="text/javascript">
//<![CDATA[[CDATA[
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
//]]>
</script>

<script type="text/javascript">
//<![CDATA[[CDATA[
try{ldelim}
var pageTracker = _gat._getTracker("{$config.Google_Analytics.ganalytics_code}");
pageTracker._trackPageview();
{rdelim} catch(err) {ldelim}{rdelim}
//]]>
</script>

{if $active_modules.Google_Checkout ne ""}
<script src="{if $current_location eq $http_location}http{else}https{/if}://checkout.google.com/files/digital/ga_post.js" type="text/javascript"></script>
{/if}

{* 
* Ecommerce Tracking for order_message page 
*}
{if 
  $config.Google_Analytics.ganalytics_e_commerce_analysis eq "Y" 
  and $ga_track_commerce eq "Y" 
  and $main eq "order_message"
  and $orders
}
<script type="text/javascript">
//<![CDATA[[CDATA[
if (pageTracker && pageTracker._addTrans && pageTracker._trackTrans) {ldelim}
{foreach from=$orders item="order"}
pageTracker._addTrans(
"{$order.order.orderid}", // order ID - required
"{$partner|default:'Main stock'}", // affiliation or store name
"{$order.order.total}", // total - required
"{if $order.order.tax gt 0}{$order.order.tax}{/if}", // tax
"{if $order.order.shipping_cost gt 0}{$order.order.shipping_cost}{/if}", // shipping
"{$order.order.b_city|wm_remove|escape:javascript}", // city
"{$order.order.b_state|wm_remove|escape:javascript}", // state or province
"{$order.order.b_countryname|wm_remove|escape:javascript}" // country
);
{foreach from=$order.products item="product"}
pageTracker._addItem(
"{$order.order.orderid}", // order ID - required
"{$product.productcode|wm_remove|escape:javascript}", // SKU/code
"{$product.product|wm_remove|escape:javascript}{if $active_modules.Product_Options ne "" and $product.product_options_txt} ({$product.product_options_txt|replace:"\n":", "|wm_remove|escape:javascript}){/if}", // product name
"{$product.category|default:'Unknown category'}", // category or variation
"{$product.price}", // unit price - required
"{$product.amount}" // quantity - required
);
{/foreach}
{/foreach}
pageTracker._trackTrans();
{rdelim}
//]]>
</script>
{/if}
