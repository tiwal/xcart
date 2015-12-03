<?php /* Smarty version 2.6.26, created on 2015-12-02 18:07:29
         compiled from mail/ask_question.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'mail_truncate', 'mail/ask_question.tpl', 10, false),array('modifier', 'escape', 'mail/ask_question.tpl', 10, false),array('modifier', 'substitute', 'mail/ask_question.tpl', 15, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "mail/mail_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo $this->_tpl_vars['lng']['lbl_customer_info']; ?>
:
---------------------

<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_username'])) ? $this->_run_mod_handler('mail_truncate', true, $_tmp) : smarty_modifier_mail_truncate($_tmp)); ?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['uname'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_email'])) ? $this->_run_mod_handler('mail_truncate', true, $_tmp) : smarty_modifier_mail_truncate($_tmp)); ?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

<?php if ($this->_tpl_vars['phone']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_phone'])) ? $this->_run_mod_handler('mail_truncate', true, $_tmp) : smarty_modifier_mail_truncate($_tmp)); ?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['phone'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>

---------------------
<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['eml_someone_ask_question_at'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'STOREFRONT', $this->_tpl_vars['current_location'], 'productid', $this->_tpl_vars['productid'], 'product_name', $this->_tpl_vars['product']) : smarty_modifier_substitute($_tmp, 'STOREFRONT', $this->_tpl_vars['current_location'], 'productid', $this->_tpl_vars['productid'], 'product_name', $this->_tpl_vars['product'])); ?>
:

<?php echo ((is_array($_tmp=$this->_tpl_vars['question'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "mail/signature.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>