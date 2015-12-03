{*
$Id: opc_init_js.tpl,v 1.9.2.5 2012/02/14 08:29:59 aim Exp $ 
vim: set ts=2 sw=2 sts=2 et:
*}
{include file="check_email_script.tpl"}
{include file="check_password_script.tpl"}
{include file="check_zipcode_js.tpl"}
{include file="change_states_js.tpl"}

<script type="text/javascript">
//<![CDATA[

var txt_accept_terms_err = '{$lng.txt_accept_terms_err|wm_remove|escape:"javascript"}';
var lbl_warning          = '{$lng.lbl_warning|wm_remove|escape:"javascript"}';
var msg_being_placed     = '{$lng.msg_order_is_being_placed|wm_remove|escape:"javascript"}';

var txt_opc_incomplete_profile    = '{$lng.txt_opc_incomplete_profile|wm_remove|escape:"javascript"}';
var txt_opc_payment_not_selected  = '{$lng.txt_opc_payment_not_selected|wm_remove|escape:"javascript"}';
var txt_opc_shipping_not_selected = '{$lng.txt_opc_shipping_not_selected|wm_remove|escape:"javascript"}';

var shippingid    = {$cart.shippingid|default:0};
var paymentid     = {$cart.paymentid|default:0};
var unique_key    = '{unique_key}';
var av_error      = {if $av_error}true{else}false{/if};
var need_shipping = {if $need_shipping}true{else}false{/if};

var paypal_express_selected = {if $paypal_express_selected}true{else}false{/if};

var payments = [];
{foreach from=$payment_methods item=p name=pt}
payments[{$p.paymentid}] = {ldelim}url: '{$p.payment_script_url}', name: '{$p.payment_method|wm_remove|escape:"javascript"}', surcharge: '{$p.surcharge}{$p.surcharge_type}'{rdelim};
{/foreach}

{literal}

function checkCheckoutForm() {

  // Check if profile filled in: registerform should not exist on the page
  if ($('form[name=registerform]').length > 0) {
    xAlert(txt_opc_incomplete_profile);
    return false;
  }

  if (need_shipping && ($('input[name=shippingid]').val() <= 0 || (undefined === shippingid || shippingid <= 0))) {
    xAlert(txt_opc_shipping_not_selected);
    return false;
  }
  
  if (!paymentid && (undefined === paymentid || paymentid <= 0)) {
    xAlert(txt_opc_shipping_not_selected);
    return false;
  }

  // Check terms accepting
  var termsObj = $('#accept_terms')[0];
  if (termsObj && !termsObj.checked) {
    xAlert(txt_accept_terms_err, lbl_warning);
    return false;
  }

  return true;
}
{/literal}

//]]>
</script>
