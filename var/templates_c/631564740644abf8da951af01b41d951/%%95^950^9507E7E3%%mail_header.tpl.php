<?php /* Smarty version 2.6.26, created on 2015-12-02 18:07:29
         compiled from mail/html/mail_header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'substitute', 'mail/html/mail_header.tpl', 7, false),)), $this); ?>
<br /><font size="2">
<?php $this->assign('link', "<a href=\"".($this->_tpl_vars['http_location'])."/\" target=\"_blank\">".($this->_tpl_vars['config']['Company']['company_name'])."</a>"); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['eml_mail_header'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'company', $this->_tpl_vars['link']) : smarty_modifier_substitute($_tmp, 'company', $this->_tpl_vars['link'])); ?>

</font>
