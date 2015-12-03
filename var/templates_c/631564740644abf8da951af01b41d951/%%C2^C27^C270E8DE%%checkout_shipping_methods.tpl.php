<?php /* Smarty version 2.6.26, created on 2015-12-02 19:10:03
         compiled from customer/main/checkout_shipping_methods.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'currency', 'customer/main/checkout_shipping_methods.tpl', 19, false),)), $this); ?>

<?php if ($this->_tpl_vars['shipping_calc_error'] != ""): ?>
  <div><?php echo $this->_tpl_vars['shipping_calc_service']; ?>
 <?php echo $this->_tpl_vars['lng']['lbl_err_shipping_calc']; ?>
</div>
  <div class="error-message"><?php echo $this->_tpl_vars['shipping_calc_error']; ?>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['shipping'] == "" && $this->_tpl_vars['need_shipping']): ?>
  <div class="text-block error-message"><?php echo $this->_tpl_vars['lng']['lbl_no_shipping_for_location']; ?>
</div>

<?php elseif ($this->_tpl_vars['userinfo']['address']['S'] != '' && $this->_tpl_vars['shipping'] == '' && $this->_tpl_vars['config']['Shipping']['do_not_require_shipping'] == 'Y' && $this->_tpl_vars['cart']['shipping_cost'] == 0): ?>
  <div class="text-block"><?php echo $this->_tpl_vars['lng']['lbl_free_shipping']; ?>
</div>

<?php elseif ($this->_tpl_vars['shipping'] == "" && $this->_tpl_vars['cart']['shipping_cost'] > 0): ?>
  <div class="text-block"><?php echo $this->_tpl_vars['lng']['lbl_fixed_shipping_cost']; ?>
 (<?php echo smarty_function_currency(array('value' => $this->_tpl_vars['cart']['shipping_cost']), $this);?>
)</div>

<?php elseif ($this->_tpl_vars['shipping'] == '' && $this->_tpl_vars['config']['Shipping']['enable_shipping'] == 'Y'): ?>
  <div class="text-block"><?php echo $this->_tpl_vars['lng']['lbl_shipping_address_empty_warn']; ?>
</div>
<?php endif; ?>


<?php if ($this->_tpl_vars['userinfo'] != "" || $this->_tpl_vars['config']['General']['apply_default_country'] == 'Y' || $this->_tpl_vars['cart']['shipping_cost'] > 0): ?>

  <?php if ($this->_tpl_vars['active_modules']['UPS_OnLine_Tools'] && $this->_tpl_vars['config']['Shipping']['realtime_shipping'] == 'Y' && $this->_tpl_vars['config']['Shipping']['use_intershipper'] != 'Y' && $this->_tpl_vars['show_carriers_selector'] == 'Y' && $this->_tpl_vars['is_ups_carrier_empty'] != 'Y' && $this->_tpl_vars['is_other_carriers_empty'] != 'Y'): ?>
    <label class="form-text">
      <?php echo $this->_tpl_vars['lng']['lbl_shipping_carrier']; ?>
:
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/select_carrier.tpl", 'smarty_include_vars' => array('name' => 'selected_carrier','id' => 'selected_carrier','onchange' => "javascript: self.location='cart.php?mode=".($this->_tpl_vars['main'])."&amp;action=update&amp;selected_carrier='+this.options[this.selectedIndex].value;")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </label>
    <br />
    <br />
  <?php endif; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['shipping'] != "" && $this->_tpl_vars['need_shipping']): ?>

  <?php if ($this->_tpl_vars['arb_account_used']): ?>
      <div><?php echo $this->_tpl_vars['lng']['txt_arb_account_checkout_note']; ?>
</div>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['userinfo'] != '' || $this->_tpl_vars['config']['General']['apply_default_country'] == 'Y' || $this->_tpl_vars['cart']['shipping_cost'] > 0): ?>
    <div class="checkout-shippings">
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/".($this->_tpl_vars['checkout_module'])."/shipping_methods.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
  <?php endif; ?>

<?php else: ?>

  <input type="hidden" name="shippingid" value="0" />

<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/dhl_ext_countries.tpl", 'smarty_include_vars' => array('onchange' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>