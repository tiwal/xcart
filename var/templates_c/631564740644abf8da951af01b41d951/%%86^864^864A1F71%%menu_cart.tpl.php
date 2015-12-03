<?php /* Smarty version 2.6.26, created on 2015-12-02 19:15:33
         compiled from customer/menu_cart.tpl */ ?>
<?php if ($this->webmaster_mode) { ?><div id="ideal_comfort0customer0menu_cart.tpl" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?><?php func_load_lang($this, "customer/menu_cart.tpl","lbl_your_cart"); ?><?php if ($this->_tpl_vars['config']['General']['ajax_add2cart'] == 'Y' && $this->_tpl_vars['main'] != 'cart' && $this->_tpl_vars['main'] != 'checkout'): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/ajax.minicart.tpl", 'smarty_include_vars' => array('_include_once' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php ob_start(); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/minicart_total.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<?php $this->_smarty_vars['capture']['menu'] = ob_get_contents(); ob_end_clean(); ?>
<?php if ($this->_tpl_vars['config']['General']['ajax_add2cart'] == 'Y' && $this->_tpl_vars['main'] != 'cart' && $this->_tpl_vars['main'] != 'checkout' && $this->_tpl_vars['minicart_total_items'] > 0): ?>
  <?php $this->assign('additional_class', "menu-minicart ajax-minicart"); ?>
<?php else: ?>
  <?php $this->assign('additional_class', "menu-minicart"); ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['minicart_total_items'] > 0): ?>
  <?php $this->assign('additional_class', ($this->_tpl_vars['additional_class'])." full-mini-cart"); ?>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/menu_dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_your_cart'],'content' => $this->_smarty_vars['capture']['menu'],'minicart' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php if ($this->webmaster_mode) { ?></div><?php } ?>