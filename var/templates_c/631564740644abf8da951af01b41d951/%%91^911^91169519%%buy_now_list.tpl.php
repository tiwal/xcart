<?php /* Smarty version 2.6.26, created on 2015-12-02 18:06:58
         compiled from customer/buttons/buy_now_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'customer/buttons/buy_now_list.tpl', 5, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_add_to_cart'],'additional_button_class' => ((is_array($_tmp=$this->_tpl_vars['additional_button_class'])) ? $this->_run_mod_handler('cat', true, $_tmp, ' list-button add-to-cart-button') : smarty_modifier_cat($_tmp, ' list-button add-to-cart-button')))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>