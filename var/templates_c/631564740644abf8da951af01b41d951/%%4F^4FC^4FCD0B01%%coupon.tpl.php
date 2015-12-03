<?php /* Smarty version 2.6.26, created on 2015-12-02 19:10:03
         compiled from modules/One_Page_Checkout/summary/coupon.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'modules/One_Page_Checkout/summary/coupon.tpl', 10, false),)), $this); ?>
<div id="opc_coupon" class="coupon-info">

  <div id="coupon-applied-container"<?php if ($this->_tpl_vars['cart']['coupon'] == ''): ?> style="display:none;"<?php endif; ?>>

    <strong><?php echo $this->_tpl_vars['lng']['lbl_discount_coupon_applied']; ?>
</strong>
    <a class="dotted unset-coupon-link" href="cart.php?mode=unset_coupons" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_unset_coupon'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_unset_coupon'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>

  </div>

  <div id="couponform-container"<?php if ($this->_tpl_vars['cart']['coupon'] != ''): ?> style="display:none;"<?php endif; ?>>

    <h3><?php echo $this->_tpl_vars['lng']['lbl_redeem_discount_coupon']; ?>
</h3>
    <p><?php echo $this->_tpl_vars['lng']['txt_add_coupon_header']; ?>
</p>
    <?php if ($this->_tpl_vars['gcheckout_enabled']): ?>
      <p class="text-block"><?php echo $this->_tpl_vars['lng']['txt_gcheckout_add_coupon_note']; ?>
</p>
    <?php endif; ?>
 
    <form action="cart.php" name="couponform">

      <input type="hidden" name="mode" value="add_coupon" />

      <label for="coupon">
        <?php echo $this->_tpl_vars['lng']['lbl_coupon_code']; ?>
:
        <input type="text" size="20" name="coupon" id="coupon" />
      </label>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('type' => 'input','style' => 'image','onclick' => "return false;")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    </form>

  </div>

  <hr />

</div>