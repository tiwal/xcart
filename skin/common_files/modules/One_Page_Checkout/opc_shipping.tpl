{*
$Id: opc_shipping.tpl,v 1.1.2.2 2011/07/29 13:41:10 aim Exp $ 
vim: set ts=2 sw=2 sts=2 et:
*}
<div id="opc_shipping">
  <h2>{$lng.lbl_shipping_method}</h2>
  <script type="text/javascript">
  //<![CDATA[
  // Used to update global $need_shipping var to work isCheckoutReady():ajax.checkout.js function properly
  var need_shipping = {if $need_shipping}true{else}false{/if};

  // Used to update global shippingsCOD defined in skin/common_files/customer/main/checkout_payment_methods.tpl on shipping load 
  var shippingsCOD = [{strip}
  {foreach from=$shipping item=s}
  {if $s.is_cod eq "Y"}
    '{$s.shippingid}',
  {/if}
  {/foreach}
  {/strip}];

  //]]>
  </script>

  <form action="cart.php" method="post" name="shippingsform">

    <input type="hidden" name="mode" value="checkout" />
    <input type="hidden" name="cart_operation" value="cart_operation" />
    <input type="hidden" name="action" value="update" />

    <div class="opc-section-container opc-shipping-options">
      {include file="customer/main/checkout_shipping_methods.tpl"}
      <div class="clearing"></div>
    </div>

    {if $display_ups_trademarks and $current_carrier eq "UPS"}
      {include file="modules/UPS_OnLine_Tools/ups_notice.tpl"}
    {/if}

  </form>
</div>
