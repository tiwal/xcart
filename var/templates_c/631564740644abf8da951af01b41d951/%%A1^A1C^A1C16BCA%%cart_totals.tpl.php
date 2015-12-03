<?php /* Smarty version 2.6.26, created on 2015-12-02 19:10:03
         compiled from modules/One_Page_Checkout/summary/cart_totals.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'modules/One_Page_Checkout/summary/cart_totals.tpl', 11, false),array('modifier', 'substitute', 'modules/One_Page_Checkout/summary/cart_totals.tpl', 14, false),array('modifier', 'default', 'modules/One_Page_Checkout/summary/cart_totals.tpl', 137, false),array('function', 'currency', 'modules/One_Page_Checkout/summary/cart_totals.tpl', 15, false),array('function', 'alter_currency', 'modules/One_Page_Checkout/summary/cart_totals.tpl', 127, false),array('function', 'load_defer_code', 'modules/One_Page_Checkout/summary/cart_totals.tpl', 171, false),)), $this); ?>
<div class="cart-totals" id="opc_totals">

  <?php $this->assign('subtotal', $this->_tpl_vars['cart']['subtotal']); ?>
  <?php $this->assign('discounted_subtotal', $this->_tpl_vars['cart']['discounted_subtotal']); ?>
  <?php $this->assign('shipping_cost', $this->_tpl_vars['cart']['display_shipping_cost']); ?>

  <table cellspacing="0" class="totals" summary="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_total'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">

    <tr>
      <td class="total-name"><?php echo $this->_tpl_vars['lng']['lbl_subtotal']; ?>
 ( <a href="javascript:void(0);" class="dotted toggle-link" id="cart-contents-link" title="<?php echo $this->_tpl_vars['lng']['lbl_your_cart']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_x_items'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'X', $this->_tpl_vars['minicart_total_items']) : smarty_modifier_substitute($_tmp, 'X', $this->_tpl_vars['minicart_total_items'])); ?>
</a> ):</td>
      <td class="total-value"><?php echo smarty_function_currency(array('value' => $this->_tpl_vars['cart']['display_subtotal']), $this);?>
</td>
    </tr>

    <tr style="display:none;" id="cart-contents-box">
      <td colspan="3">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/One_Page_Checkout/summary/cart_contents.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </td>
    </tr>

  <?php if ($this->_tpl_vars['cart']['discount'] > 0): ?>
    <tr>
      <td class="total-name"><?php echo $this->_tpl_vars['lng']['lbl_discount']; ?>
:</td>
      <td class="total-value discounted"><?php echo smarty_function_currency(array('value' => $this->_tpl_vars['cart']['discount']), $this);?>
</td>
    </tr>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['cart']['coupon_discount'] != 0 && $this->_tpl_vars['cart']['coupon_type'] != 'free_ship'): ?>
    <tr>
      <td class="total-name dcoupons-clear">
        <?php echo $this->_tpl_vars['lng']['lbl_discount_coupon']; ?>

        <a href="cart.php?mode=unset_coupons" class="unset-coupon-link" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_unset_coupon'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><img src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/spacer.gif" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_unset_coupon'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></a>:
        <br /><span class="small">#<?php echo $this->_tpl_vars['cart']['coupon']; ?>
</span>
      </td>
      <td class="total-value discounted"><?php echo smarty_function_currency(array('value' => $this->_tpl_vars['cart']['coupon_discount']), $this);?>
</td>
    </tr>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['cart']['display_discounted_subtotal'] != $this->_tpl_vars['cart']['subtotal']): ?>
    <tr>
      <td class="total-name"><?php echo $this->_tpl_vars['lng']['lbl_discounted_subtotal']; ?>
:</td>
      <td class="total-value"><?php echo smarty_function_currency(array('value' => $this->_tpl_vars['cart']['display_discounted_subtotal']), $this);?>
</td>
    </tr>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['config']['Shipping']['enable_shipping'] == 'Y'): ?>
    <tr>
      <td class="total-name dcoupons-clear">
        <?php echo $this->_tpl_vars['lng']['lbl_shipping_cost']; ?>
<?php if ($this->_tpl_vars['cart']['coupon_discount'] != 0 && $this->_tpl_vars['cart']['coupon_type'] == 'free_ship'): ?> (<?php echo $this->_tpl_vars['lng']['lbl_discounted']; ?>
 <a href="cart.php?mode=unset_coupons" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_unset_coupon'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class="unset-coupon-link"><img src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/spacer.gif" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_unset_coupon'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></a>)<?php endif; ?>:
      </td>

      <?php if (( $this->_tpl_vars['shipping'] != '' || ! $this->_tpl_vars['need_shipping'] ) && $this->_tpl_vars['userinfo'] != "" || $this->_tpl_vars['config']['General']['apply_default_country'] == 'Y' || $this->_tpl_vars['cart']['shipping_cost'] > 0): ?>
        <td class="total-value"><?php echo smarty_function_currency(array('value' => $this->_tpl_vars['shipping_cost']), $this);?>
</td>
      <?php else: ?>
        <td class="total-value"><?php echo $this->_tpl_vars['lng']['txt_not_available_value']; ?>
</td>
      <?php endif; ?>
    </tr>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['config']['General']['enable_gift_wrapping'] == 'Y' && $this->_tpl_vars['cart']['need_giftwrap'] == 'Y'): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Gift_Registry/gift_wrapping_cart_contents.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['cart']['taxes'] && $this->_tpl_vars['config']['Taxes']['display_taxed_order_totals'] != 'Y'): ?>
    <?php $_from = $this->_tpl_vars['cart']['taxes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tax_name'] => $this->_tpl_vars['tax']):
?>

      <tr>
        <td class="total-name"><?php echo $this->_tpl_vars['tax']['tax_display_name']; ?>
<?php if ($this->_tpl_vars['tax']['rate_type'] == "%"): ?> <?php echo $this->_tpl_vars['tax']['rate_value']; ?>
%<?php endif; ?>:</td>
        <?php if (( $this->_tpl_vars['userinfo'] != '' && ! $this->_tpl_vars['reg_error'] && ! $this->_tpl_vars['force_change_address'] ) || $this->_tpl_vars['config']['General']['apply_default_country'] == 'Y'): ?>
          <td class="total-value"><?php echo smarty_function_currency(array('value' => $this->_tpl_vars['tax']['tax_cost']), $this);?>
</td>
        <?php else: ?>
          <td class="total-value"><?php echo $this->_tpl_vars['lng']['txt_not_available_value']; ?>
</td>
          <?php $this->assign('not_logged_message', '1'); ?>
        <?php endif; ?>
      </tr>

    <?php endforeach; endif; unset($_from); ?>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['cart']['payment_surcharge']): ?>
    <tr>
      <td class="total-name">
        <?php if ($this->_tpl_vars['cart']['payment_surcharge'] > 0): ?>
          <?php echo $this->_tpl_vars['lng']['lbl_payment_method_surcharge']; ?>

        <?php else: ?>
          <?php echo $this->_tpl_vars['lng']['lbl_payment_method_discount']; ?>

        <?php endif; ?>:
      </td>
      <td class="total-value"><?php echo smarty_function_currency(array('value' => $this->_tpl_vars['cart']['payment_surcharge']), $this);?>
</td>
    </tr>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['cart']['applied_giftcerts']): ?>
    <tr>
      <td class="total-name">
        <a href="javascript:void(0);" class="dotted toggle-link" id="applied-giftcerts-link" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_giftcert_discount'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo $this->_tpl_vars['lng']['lbl_giftcert_discount']; ?>
</a>:
        <div id="applied-giftcerts-box" style="display:none;">
          <?php $_from = $this->_tpl_vars['cart']['applied_giftcerts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['gc']):
?>
            <div class="dcoupons-clear">
              <?php echo $this->_tpl_vars['gc']['giftcert_id']; ?>
 : <span class="total-name"><?php echo smarty_function_currency(array('value' => $this->_tpl_vars['gc']['giftcert_cost']), $this);?>
</span>&nbsp;
              <a class="unset-gc-link" href="cart.php?mode=unset_gc&amp;gcid=<?php echo $this->_tpl_vars['gc']['giftcert_id']; ?>
"><img src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/spacer.gif" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_unset_gc'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></a>
            </div>
          <?php endforeach; endif; unset($_from); ?>
        </div>
      </td>
      <td class="total-value discounted"><?php echo smarty_function_currency(array('value' => $this->_tpl_vars['cart']['giftcert_discount']), $this);?>
</td>
    </tr>

  <?php endif; ?>

  </table>

  <?php if ($this->_tpl_vars['active_modules']['Special_Offers'] != ""): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Special_Offers/customer/cart_bonuses.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php endif; ?>

  <table cellspacing="0" class="totals" summary="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_total'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
  <tr class="total">
    <td class="total-name"><?php echo $this->_tpl_vars['lng']['lbl_cart_total']; ?>
:</td>
    <td class="total-value nowrap">
      <?php echo smarty_function_currency(array('value' => $this->_tpl_vars['cart']['total_cost']), $this);?>

    </td>
    <td class="total-value-alt nowrap">
      <?php echo smarty_function_alter_currency(array('value' => $this->_tpl_vars['cart']['total_cost']), $this);?>

    </td>
  </tr>
  </table>

  <?php if ($this->_tpl_vars['paid_amount']): ?>
  <table cellspacing="0" class="totals" summary="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_total'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
    <tr>
      <td class="total"><?php echo $this->_tpl_vars['lng']['lbl_paid_amount']; ?>
:</td>
      <td class="total-value">
        <?php echo smarty_function_currency(array('value' => ((is_array($_tmp=@$this->_tpl_vars['paid_amount'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['zero']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['zero']))), $this);?>

      </td>
      <td class="total-value-alt">
        <?php echo smarty_function_alter_currency(array('value' => $this->_tpl_vars['paid_amount']), $this);?>

      </td>
    </tr>

    <tr>
      <td colspan="3">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/cart_transactions.tpl", 'smarty_include_vars' => array('transactions' => $this->_tpl_vars['transaction_query'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </td>
    </tr>
  </table>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['cart']['taxes'] && $this->_tpl_vars['config']['Taxes']['display_taxed_order_totals'] == 'Y'): ?>
  <table cellspacing="0" class="totals" summary="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_taxes'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
    <tr>
      <td class="total-name">
        <a href="javascript:void(0);" class="dotted toggle-link" id="order-taxes-link"><?php echo $this->_tpl_vars['lng']['lbl_including_taxes']; ?>
</a>:
        <div id="order-taxes-box" style="display:none;">
          <?php $_from = $this->_tpl_vars['cart']['taxes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tax_name'] => $this->_tpl_vars['tax']):
?>
            <?php echo $this->_tpl_vars['tax']['tax_display_name']; ?>
 (<?php echo smarty_function_currency(array('value' => $this->_tpl_vars['tax']['tax_cost']), $this);?>
)<br />
          <?php endforeach; endif; unset($_from); ?>
        </div>
      </td>
      <td class="total-value"><?php echo smarty_function_currency(array('value' => $this->_tpl_vars['cart']['tax_cost']), $this);?>
</td>
    </tr>
  </table>
  <?php endif; ?>

  <hr />

<?php if ($this->_tpl_vars['cart_totals_standalone']): ?>
<?php echo smarty_function_load_defer_code(array('type' => 'css'), $this);?>

<?php echo smarty_function_load_defer_code(array('type' => 'js'), $this);?>

<?php endif; ?>
</div>