<?php /* Smarty version 2.6.26, created on 2015-12-02 19:15:33
         compiled from customer/buttons/buy_now.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'substitute', 'customer/buttons/buy_now.tpl', 5, false),array('modifier', 'cat', 'customer/buttons/buy_now.tpl', 5, false),)), $this); ?>
<?php if ($this->webmaster_mode) { ?><div id="ideal_comfort0customer0buttons0buy_now.tpl3" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?><?php func_load_lang($this, "customer/buttons/buy_now.tpl","lbl_buy_now_img,lbl_buy_now"); ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('button_title' => ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_buy_now_img'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'AltImagesDir', $this->_tpl_vars['AltImagesDir']) : smarty_modifier_substitute($_tmp, 'AltImagesDir', $this->_tpl_vars['AltImagesDir'])),'tips_title' => $this->_tpl_vars['lng']['lbl_buy_now'],'notitle' => true,'additional_button_class' => ((is_array($_tmp=$this->_tpl_vars['additional_button_class'])) ? $this->_run_mod_handler('cat', true, $_tmp, ' add-to-cart-button') : smarty_modifier_cat($_tmp, ' add-to-cart-button')))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php if ($this->webmaster_mode) { ?></div><?php } ?>