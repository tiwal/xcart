<?php /* Smarty version 2.6.26, created on 2015-12-02 19:10:03
         compiled from modules/One_Page_Checkout/opc_shipping.tpl */ ?>
<div id="opc_shipping">
  <h2><?php echo $this->_tpl_vars['lng']['lbl_shipping_method']; ?>
</h2>
  <script type="text/javascript">
  //<![CDATA[
  // Used to update global $need_shipping var to work isCheckoutReady():ajax.checkout.js function properly
  var need_shipping = <?php if ($this->_tpl_vars['need_shipping']): ?>true<?php else: ?>false<?php endif; ?>;

  // Used to update global shippingsCOD defined in skin/common_files/customer/main/checkout_payment_methods.tpl on shipping load 
  var shippingsCOD = [<?php echo ''; ?><?php $_from = $this->_tpl_vars['shipping']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['s']):
?><?php echo ''; ?><?php if ($this->_tpl_vars['s']['is_cod'] == 'Y'): ?><?php echo '\''; ?><?php echo $this->_tpl_vars['s']['shippingid']; ?><?php echo '\','; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?>
];

  //]]>
  </script>

  <form action="cart.php" method="post" name="shippingsform">

    <input type="hidden" name="mode" value="checkout" />
    <input type="hidden" name="cart_operation" value="cart_operation" />
    <input type="hidden" name="action" value="update" />

    <div class="opc-section-container opc-shipping-options">
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/checkout_shipping_methods.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <div class="clearing"></div>
    </div>

    <?php if ($this->_tpl_vars['display_ups_trademarks'] && $this->_tpl_vars['current_carrier'] == 'UPS'): ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/UPS_OnLine_Tools/ups_notice.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>

  </form>
</div>