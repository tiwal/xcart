<?php /* Smarty version 2.6.26, created on 2015-12-02 19:01:20
         compiled from customer/cart_checkout_links.tpl */ ?>
<div class="cart-checkout-links">
<?php if ($this->_tpl_vars['active_modules']['Wishlist'] != "" || $this->_tpl_vars['minicart_total_items'] > 0): ?>
<hr class="minicart" />
<?php endif; ?>
<?php if ($this->_tpl_vars['minicart_total_items'] > 0): ?>
  <ul>
    <li><a href="cart.php"><?php echo $this->_tpl_vars['lng']['lbl_view_cart']; ?>
</a></li>

    <?php if ($this->_tpl_vars['active_modules']['Google_Checkout'] == ""): ?>
      <li><a href="cart.php?mode=checkout"><?php echo $this->_tpl_vars['lng']['lbl_checkout']; ?>
</a></li>
    <?php endif; ?>
  </ul>
<?php endif; ?>
</div>