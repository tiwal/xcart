<?php /* Smarty version 2.6.26, created on 2015-12-02 19:10:03
         compiled from modules/One_Page_Checkout/payment_methods.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'modules/One_Page_Checkout/payment_methods.tpl', 16, false),array('modifier', 'trim', 'modules/One_Page_Checkout/payment_methods.tpl', 91, false),array('function', 'currency', 'modules/One_Page_Checkout/payment_methods.tpl', 69, false),)), $this); ?>
<?php if ($this->_tpl_vars['paypal_express_selected']): ?>
  <div class="paypal-express-sel-note">
    <?php echo $this->_tpl_vars['lng']['txt_opc_paypal_ex_init_note']; ?>

    <br /><br />
    <div align="right">
      <input type="hidden" name="paymentid" value="<?php echo $this->_tpl_vars['paypal_expressid']; ?>
" />
      <a href="javascript:void(0);" class="paypal-express-remove"><?php echo $this->_tpl_vars['lng']['lbl_change']; ?>
</a>
    </div>
  </div>
<?php endif; ?>

<table cellspacing="0" class="checkout-payments" summary="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_payment_methods'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">

<?php $_from = $this->_tpl_vars['payment_methods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pm'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pm']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['payment']):
        $this->_foreach['pm']['iteration']++;
?>

  <tr<?php if ($this->_tpl_vars['payment']['is_cod'] == 'Y'): ?> id="cod_tr<?php echo $this->_tpl_vars['payment']['paymentid']; ?>
"<?php endif; ?>>
    <td>
      <input type="radio" name="paymentid" id="pm<?php echo $this->_tpl_vars['payment']['paymentid']; ?>
" value="<?php echo $this->_tpl_vars['payment']['paymentid']; ?>
"<?php if ($this->_tpl_vars['payment']['is_default'] == '1' || $this->_tpl_vars['paymentid'] == $this->_tpl_vars['payment']['paymentid']): ?> checked="checked"<?php endif; ?> />
    </td>

    
  <?php if ($this->_tpl_vars['payment']['processor'] == "ps_paypal_pro.php"): ?>
    <td class="checkout-payment-paypal">

      <table cellspacing="0" cellpadding="0">
        <tr>
          <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "payments/ps_paypal_pro_express_checkout.tpl", 'smarty_include_vars' => array('paypal_express_link' => 'logo')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
          <td><label for="pm<?php echo $this->_tpl_vars['payment']['paymentid']; ?>
"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "payments/ps_paypal_pro_express_checkout.tpl", 'smarty_include_vars' => array('paypal_express_link' => 'text')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></label></td>
        </tr>
      </table>

    </td>
  <?php elseif ($this->_tpl_vars['payment']['processor'] == "cc_bean_interaco.php"): ?>
    <td class="checkout-payment-name">

      <table cellspacing="0" cellpadding="0">
        <tr>
          <td style="text-align: center;">
            <img src="https://beanstreamsupport.pbworks.com/f/interac_logo.jpg" alt="INTERAC Online service" height="50" /><br />
            <a href="http://www.interaconline.com/learn/" style="font-size: 9px;"><?php echo $this->_tpl_vars['lng']['lbl_cc_beani_learn_more']; ?>
</a>
          </td>
          <td>
            <label for="pm<?php echo $this->_tpl_vars['payment']['paymentid']; ?>
">INTERACO<sup>&reg;</sup> Online</label>
            <div class="checkout-payment-descr" style="padding-top: 3px;">
              <?php echo $this->_tpl_vars['payment']['payment_details']; ?>

            </div>
          </td>
        </tr>
      </table>
      
      <div class="checkout-payment-descr">
         <span style="font-size: 10px;">
          <sup>&reg;</sup> <?php echo $this->_tpl_vars['lng']['lbl_beani_trademark']; ?>

        </span>
 
        <?php if ($this->_tpl_vars['payment']['background'] == 'I'): ?>
          <noscript><font class="error-message"><?php echo $this->_tpl_vars['lng']['txt_payment_js_required_warn']; ?>
</font></noscript>
        <?php endif; ?>
      </div>
    </td>
  <?php else: ?>
    <td class="checkout-payment-name">
      <label for="pm<?php echo $this->_tpl_vars['payment']['paymentid']; ?>
"><?php echo $this->_tpl_vars['payment']['payment_method']; ?>

        <?php if ($this->_tpl_vars['payment']['paymentid'] == 14 && $this->_tpl_vars['cart']['giftcert_discount'] > 0): ?>
          <span class="applied-gc">(<?php echo smarty_function_currency(array('value' => $this->_tpl_vars['cart']['giftcert_discount']), $this);?>
 <?php echo $this->_tpl_vars['lng']['lbl_applied']; ?>
)</span>
        <?php endif; ?>
      </label>
      <div class="checkout-payment-descr">
        <?php echo $this->_tpl_vars['payment']['payment_details']; ?>

        <?php if ($this->_tpl_vars['payment']['processor'] == "cc_mbookers_wlt.php"): ?>
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "payments/mbookers_checkout_logo.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
  
        <?php if ($this->_tpl_vars['payment']['background'] == 'I'): ?>
          <noscript><font class="error-message"><?php echo $this->_tpl_vars['lng']['txt_payment_js_required_warn']; ?>
</font></noscript>
        <?php endif; ?>
      </div>
    </td>

  <?php endif; ?>
  </tr>

<?php ob_start(); ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['payment']['payment_template'], 'smarty_include_vars' => array('payment_cc_data' => $this->_tpl_vars['payment'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php $this->_smarty_vars['capture']['pt'] = ob_get_contents();  $this->assign('ptpl', ob_get_contents());ob_end_clean(); ?>
<tr class="payment-details<?php if ($this->_tpl_vars['ptpl'] == '' || ( $this->_tpl_vars['payment']['paymentid'] == 14 && $this->_tpl_vars['cart']['total_cost'] == 0 )): ?> hidden<?php endif; ?>" id="pmbox_<?php echo $this->_tpl_vars['payment']['paymentid']; ?>
"<?php if ($this->_tpl_vars['payment']['is_default'] != '1' && $this->_tpl_vars['paymentid'] != $this->_tpl_vars['payment']['paymentid']): ?> style="display:none"<?php endif; ?>>
  <td colspan="3">
    <div class="opc-payment-options">
    <fieldset class="registerform"><?php echo ((is_array($_tmp=$this->_tpl_vars['ptpl'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
</fieldset>
  </div>
  </td>
</tr>

<?php endforeach; endif; unset($_from); ?>
 
</table>