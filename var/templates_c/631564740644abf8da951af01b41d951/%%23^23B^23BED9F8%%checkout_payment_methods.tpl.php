<?php /* Smarty version 2.6.26, created on 2015-12-02 19:10:03
         compiled from customer/main/checkout_payment_methods.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'wm_remove', 'customer/main/checkout_payment_methods.tpl', 12, false),array('modifier', 'escape', 'customer/main/checkout_payment_methods.tpl', 12, false),)), $this); ?>
<div class="checkout-payments">
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/".($this->_tpl_vars['checkout_module'])."/payment_methods.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>

<script type="text/javascript">
//<![CDATA[

var txt_payments_are_unavailable = '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['txt_payments_are_unavailable'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
';
var shippingsCOD = [<?php echo ''; ?><?php $_from = $this->_tpl_vars['shipping']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['s']):
?><?php echo ''; ?><?php if ($this->_tpl_vars['s']['is_cod'] == 'Y'): ?><?php echo '\''; ?><?php echo $this->_tpl_vars['s']['shippingid']; ?><?php echo '\','; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?>
];

func_display_cod();

<?php echo '
function func_is_current_shipping_cod() {
  // Get current selected method
  var f = $(\'div.checkout-shippings\');
  var current_shippingid = $(\'input:radio[name=shippingid]:checked\', f).eq(0).val();
 
  return $.inArray(current_shippingid, shippingsCOD) != -1; 
}

function func_display_cod() {

  if (shippingsCOD.length > 0)
    var show_cod_payments = func_is_current_shipping_cod();
  else
    var show_cod_payments = false;
  
  var has_cod_payments = false;
  var f = $(\'div.checkout-payments\');
  $(\'tr[id^="cod_tr"]\', f). // Get all COD payments
    each(function() {
      has_cod_payments = true;

      $(this).toggle(show_cod_payments);// Change visibility for the COD payments according show_cod_payments var

      var pmid = ($(this).attr(\'id\').replace("cod_tr",""));
      $(\'#pmbox_\'+pmid, f).toggle(
        show_cod_payments 
        && $(\'#pm\'+pmid, f).is(\':checked\')
      );
    }
   ) 
  
  $(\'#cod_payments_are_unavailable\').detach();
  if (show_cod_payments || !has_cod_payments) {
    var res = parseInt($(\'input:radio[name=paymentid]:checked\', f).eq(0).val(), 10);

  } else {
    var res = parseInt(unselect_hidden_payment_method(), 10);

    // Show message if all payments are hidden
    if (!$(\'input:radio[name=paymentid]\', f).filter(":visible").length) 
      $(f).after("<div id=\'cod_payments_are_unavailable\'>"+txt_payments_are_unavailable+"</div>");

  } 

  return isNaN(res) ? 0 : res;
}


/**
 * Change selected payment method if it is hidden
 */
function unselect_hidden_payment_method() {

  var f = $(\'div.checkout-payments\');
  var current_checked = $(\'input:radio[name=paymentid]:checked\', f).eq(0); // Get selected payment

  if (current_checked.is(\':hidden\')) {
    // If it is hidden change it to nearest visible payment
    $(\'input:radio[name=paymentid]\', f).filter(":visible").eq(0).prop(\'checked\', true);
  } 

  // Return null if all payments are hidden or return selected
  return $(\'input:radio[name=paymentid]:checked\', f).filter(":visible").eq(0).val();
}
'; ?>

//]]>
</script>
