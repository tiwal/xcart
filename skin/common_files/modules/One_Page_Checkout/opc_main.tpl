{*
$Id: opc_main.tpl,v 1.2.4.1 2012/04/06 10:32:28 ferz Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
{include file="modules/One_Page_Checkout/opc_init_js.tpl"}
{load_defer file="modules/One_Page_Checkout/ajax.checkout.js" type="js"}

{if $active_modules.TaxCloud}
  {include file="modules/TaxCloud/exemption_js.tpl"}
{/if}

<h1>{$lng.lbl_checkout}</h1>

{include file="modules/One_Page_Checkout/opc_authbox.tpl"}

<ul id="opc-sections">
  <li class="opc-section">
    {include file="modules/One_Page_Checkout/opc_profile.tpl"}
  </li>

  <li class="opc-section" id="opc_shipping_payment">
      {if $config.Shipping.enable_shipping eq "Y"}
        {include file="modules/One_Page_Checkout/opc_shipping.tpl"}
      {/if}
      {include file="modules/One_Page_Checkout/opc_payment.tpl"}
  </li>

  <li class="opc-section last" id="opc_summary_li">
    {include file="modules/One_Page_Checkout/opc_summary.tpl"}
  </li>

</ul>

{include file="customer/noscript.tpl" content=$lng.txt_opc_noscript_warning}
