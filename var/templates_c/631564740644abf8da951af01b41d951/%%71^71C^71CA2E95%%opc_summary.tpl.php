<?php /* Smarty version 2.6.26, created on 2015-12-02 19:10:03
         compiled from modules/One_Page_Checkout/opc_summary.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'modules/One_Page_Checkout/opc_summary.tpl', 21, false),array('modifier', 'escape', 'modules/One_Page_Checkout/opc_summary.tpl', 26, false),array('modifier', 'substitute', 'modules/One_Page_Checkout/opc_summary.tpl', 51, false),)), $this); ?>
<div id="opc_summary">

  <h2><?php echo $this->_tpl_vars['lng']['lbl_order_summary']; ?>
</h2>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/One_Page_Checkout/summary/cart_totals.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  
  <?php if ($this->_tpl_vars['active_modules']['TaxCloud']): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/TaxCloud/cart_totals.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php endif; ?>
 
  <?php if ($this->_tpl_vars['active_modules']['Discount_Coupons']): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/One_Page_Checkout/summary/coupon.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php endif; ?>

</div>

<form action="<?php echo ((is_array($_tmp=@$this->_tpl_vars['payment_script_url'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['payment_data']['payment_script_url']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['payment_data']['payment_script_url'])); ?>
" method="post" name="checkout_form" id="checkout_form">

  <input type="hidden" name="paymentid" id="paymentid" value="<?php echo $this->_tpl_vars['cart']['paymentid']; ?>
" />
  <input type="hidden" name="action" value="place_order" />
  <input type="hidden" name="<?php echo $this->_tpl_vars['XCARTSESSNAME']; ?>
" value="<?php echo $this->_tpl_vars['XCARTSESSID']; ?>
" />
  <input type="hidden" name="payment_method" id="payment_method" value="<?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['payment_method'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['payment_data']['payment_method_orig']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['payment_data']['payment_method_orig'])))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />

  <div class="checkout-customer-notes">
    <label for="customer_notes"><?php echo $this->_tpl_vars['lng']['lbl_customer_notes']; ?>
:</label>
    <textarea cols="70" rows="3" id="customer_notes" name="Customer_Notes"></textarea>
  </div>

  <?php if ($this->_tpl_vars['active_modules']['XAffiliate'] == 'Y' && $this->_tpl_vars['partner'] == '' && $this->_tpl_vars['config']['XAffiliate']['ask_partnerid_on_checkout'] == 'Y'): ?>
    <div class="checkout-partner">
      <label for="partner_id"><?php echo $this->_tpl_vars['lng']['lbl_partner_id']; ?>
: <input type="text" name="partner_id" id="partner_id" /></label>
    </div>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['active_modules']['Mailchimp_Subscription'] != ''): ?> 
    <div class="terms_n_conditions">
      <label for="mailchimp_subscription">
        <input type="checkbox" id="mailchimp_subscription" name="mailchimp_subscription" value="Y" />
        <?php echo $this->_tpl_vars['lng']['lbl_mailchimp_subscription']; ?>

      </label>
    </div>
  <?php endif; ?>

  <div class="terms_n_conditions">
    <label for="accept_terms">
      <input type="checkbox" name="accept_terms" id="accept_terms" value="Y" />
      <?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['txt_terms_and_conditions_note'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'terms_url', ($this->_tpl_vars['xcart_web_dir'])."/pages.php?alias=conditions", 'privacy_url', ($this->_tpl_vars['xcart_web_dir'])."/pages.php?alias=business") : smarty_modifier_substitute($_tmp, 'terms_url', ($this->_tpl_vars['xcart_web_dir'])."/pages.php?alias=conditions", 'privacy_url', ($this->_tpl_vars['xcart_web_dir'])."/pages.php?alias=business")); ?>

    </label>
  </div>

  <div class="button-row center" id="btn_box">
    <div class="halign-center place-order-button">
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_submit_order'],'href' => $this->_tpl_vars['button_href'],'type' => 'input','additional_button_class' => "main-button place-order-button")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
  </div>

</form>