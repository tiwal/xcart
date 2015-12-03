<?php /* Smarty version 2.6.26, created on 2015-12-02 18:07:29
         compiled from mail/mail_header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'substitute', 'mail/mail_header.tpl', 5, false),)), $this); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['eml_mail_header'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'company', $this->_tpl_vars['config']['Company']['company_name']) : smarty_modifier_substitute($_tmp, 'company', $this->_tpl_vars['config']['Company']['company_name'])); ?>

-------------------------------------------------------------------
