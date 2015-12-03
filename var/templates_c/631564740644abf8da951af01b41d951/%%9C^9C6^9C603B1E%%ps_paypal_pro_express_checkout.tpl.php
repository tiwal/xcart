<?php /* Smarty version 2.6.26, created on 2015-12-02 19:10:03
         compiled from payments/ps_paypal_pro_express_checkout.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'payments/ps_paypal_pro_express_checkout.tpl', 7, false),)), $this); ?>
<?php if ($this->_tpl_vars['paypal_express_link'] == 'logo'): ?>

  <a href="javascript:void(0);" onclick="javascript: window.open('https://www.paypal.com/cgi-bin/webscr?cmd=xpt/popup/OLCWhatIsPayPal-outside','olcwhatispaypal','width=400, height=350, toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no');"><img src="https://www.paypal.com/en_US/i/logo/PayPal_mark_37x23.gif" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_paypal_alt_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></a>

<?php elseif ($this->_tpl_vars['paypal_express_link'] == 'text'): ?>

  <?php echo $this->_tpl_vars['lng']['txt_paypal_text2']; ?>


<?php elseif ($this->_tpl_vars['paypal_express_link'] == 'return'): ?>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_modify'],'href' => ($this->_tpl_vars['current_location'])."/payment/ps_paypal_pro.php?mode=express&payment_id=".($_GET['paymentid'])."&do_return=1")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php elseif ($this->_tpl_vars['paypal_express_link'] == 'button'): ?>

  <div class="paypal-cart-button">
    <div>
      <?php if (! $this->_tpl_vars['std_checkout_disabled']): ?>
        <p><?php echo $this->_tpl_vars['lng']['lbl_gcheckout_or_use']; ?>
</p>
      <?php endif; ?>
      <form action="<?php echo $this->_tpl_vars['current_location']; ?>
/payment/ps_paypal_pro.php" method="get" name="paypalexpressbuttonform">
        <input type="hidden" name="mode" value="express" />
        <input type="hidden" name="payment_id" value="<?php echo $this->_tpl_vars['paypal_express_active']; ?>
" />
        <input type="image" src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif" />
      </form>
    </div>
  </div>

<?php else: ?>

  <?php ob_start(); ?>

    <form action="<?php echo $this->_tpl_vars['current_location']; ?>
/payment/ps_paypal_pro.php" method="get" name="paypalexpressform">
      <input type="hidden" name="mode" value="express" />
      <input type="hidden" name="payment_id" value="<?php echo $this->_tpl_vars['paypal_express_active']; ?>
" />
      <input type="image" src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif" class="paypal-cart-icon" />
      <?php echo $this->_tpl_vars['lng']['txt_paypal_text1']; ?>

    </form>

  <?php $this->_smarty_vars['capture']['paypal_express_dialog'] = ob_get_contents(); ob_end_clean(); ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_checkout_with_paypal_express'],'content' => $this->_smarty_vars['capture']['paypal_express_dialog'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php endif; ?>