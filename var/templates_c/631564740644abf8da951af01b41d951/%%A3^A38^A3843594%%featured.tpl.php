<?php /* Smarty version 2.6.26, created on 2015-12-02 19:15:33
         compiled from customer/main/featured.tpl */ ?>
<?php if ($this->webmaster_mode) { ?><div id="ideal_comfort0customer0main0featured.tpl" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?><?php func_load_lang($this, "customer/main/featured.tpl","lbl_featured_products"); ?><?php if ($this->_tpl_vars['f_products'] != ""): ?>
  <?php ob_start(); ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/products.tpl", 'smarty_include_vars' => array('products' => $this->_tpl_vars['f_products'],'featured' => 'Y')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_featured_products'],'content' => $this->_smarty_vars['capture']['dialog'],'sort' => true,'additional_class' => "products-dialog dialog-featured-list",'row_length' => $this->_tpl_vars['row_length'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?><?php if ($this->webmaster_mode) { ?></div><?php } ?>