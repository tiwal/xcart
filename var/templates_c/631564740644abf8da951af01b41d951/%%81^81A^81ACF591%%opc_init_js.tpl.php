<?php /* Smarty version 2.6.26, created on 2015-12-02 19:10:03
         compiled from modules/One_Page_Checkout/opc_init_js.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'wm_remove', 'modules/One_Page_Checkout/opc_init_js.tpl', 13, false),array('modifier', 'escape', 'modules/One_Page_Checkout/opc_init_js.tpl', 13, false),array('modifier', 'default', 'modules/One_Page_Checkout/opc_init_js.tpl', 21, false),array('function', 'unique_key', 'modules/One_Page_Checkout/opc_init_js.tpl', 23, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "check_email_script.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "check_password_script.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "check_zipcode_js.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "change_states_js.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript">
//<![CDATA[

var txt_accept_terms_err = '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['txt_accept_terms_err'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
';
var lbl_warning          = '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_warning'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
';
var msg_being_placed     = '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['msg_order_is_being_placed'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
';

var txt_opc_incomplete_profile    = '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['txt_opc_incomplete_profile'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
';
var txt_opc_payment_not_selected  = '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['txt_opc_payment_not_selected'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
';
var txt_opc_shipping_not_selected = '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['txt_opc_shipping_not_selected'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
';

var shippingid    = <?php echo ((is_array($_tmp=@$this->_tpl_vars['cart']['shippingid'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
;
var paymentid     = <?php echo ((is_array($_tmp=@$this->_tpl_vars['cart']['paymentid'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
;
var unique_key    = '<?php echo smarty_function_unique_key(array(), $this);?>
';
var av_error      = <?php if ($this->_tpl_vars['av_error']): ?>true<?php else: ?>false<?php endif; ?>;
var need_shipping = <?php if ($this->_tpl_vars['need_shipping']): ?>true<?php else: ?>false<?php endif; ?>;

var paypal_express_selected = <?php if ($this->_tpl_vars['paypal_express_selected']): ?>true<?php else: ?>false<?php endif; ?>;

var payments = [];
<?php $_from = $this->_tpl_vars['payment_methods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pt'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pt']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['p']):
        $this->_foreach['pt']['iteration']++;
?>
payments[<?php echo $this->_tpl_vars['p']['paymentid']; ?>
] = {url: '<?php echo $this->_tpl_vars['p']['payment_script_url']; ?>
', name: '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['p']['payment_method'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
', surcharge: '<?php echo $this->_tpl_vars['p']['surcharge']; ?>
<?php echo $this->_tpl_vars['p']['surcharge_type']; ?>
'};
<?php endforeach; endif; unset($_from); ?>

<?php echo '

function checkCheckoutForm() {

  // Check if profile filled in: registerform should not exist on the page
  if ($(\'form[name=registerform]\').length > 0) {
    xAlert(txt_opc_incomplete_profile);
    return false;
  }

  if (need_shipping && ($(\'input[name=shippingid]\').val() <= 0 || (undefined === shippingid || shippingid <= 0))) {
    xAlert(txt_opc_shipping_not_selected);
    return false;
  }
  
  if (!paymentid && (undefined === paymentid || paymentid <= 0)) {
    xAlert(txt_opc_shipping_not_selected);
    return false;
  }

  // Check terms accepting
  var termsObj = $(\'#accept_terms\')[0];
  if (termsObj && !termsObj.checked) {
    xAlert(txt_accept_terms_err, lbl_warning);
    return false;
  }

  return true;
}
'; ?>


//]]>
</script>