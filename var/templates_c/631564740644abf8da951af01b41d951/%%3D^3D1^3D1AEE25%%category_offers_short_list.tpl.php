<?php /* Smarty version 2.6.26, created on 2015-12-02 18:49:16
         compiled from modules/Special_Offers/customer/category_offers_short_list.tpl */ ?>
<?php if ($this->_tpl_vars['category_offers']): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Special_Offers/customer/offers_short_list.tpl", 'smarty_include_vars' => array('offers_list' => $this->_tpl_vars['category_offers'],'generic_message' => $this->_tpl_vars['lng']['lbl_sp_category_generic'],'link_href' => "offers.php?mode=cat&amp;cat=".($this->_tpl_vars['cat']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>