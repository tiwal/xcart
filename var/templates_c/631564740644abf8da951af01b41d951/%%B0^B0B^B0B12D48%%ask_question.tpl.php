<?php /* Smarty version 2.6.26, created on 2015-12-02 18:07:29
         compiled from mail/html/ask_question.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'substitute', 'mail/html/ask_question.tpl', 7, false),array('modifier', 'escape', 'mail/html/ask_question.tpl', 18, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "mail/html/mail_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<br /><br /><?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['eml_someone_ask_question'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'STOREFRONT', $this->_tpl_vars['current_location'], 'productid', $this->_tpl_vars['productid'], 'product_name', $this->_tpl_vars['product']) : smarty_modifier_substitute($_tmp, 'STOREFRONT', $this->_tpl_vars['current_location'], 'productid', $this->_tpl_vars['productid'], 'product_name', $this->_tpl_vars['product'])); ?>
:

<br /><b><?php echo $this->_tpl_vars['lng']['lbl_customer_info']; ?>
:</b>

<hr size="1" noshade="noshade" />

<table cellpadding="2" cellspacing="0">

<tr>
<td><b><?php echo $this->_tpl_vars['lng']['lbl_username']; ?>
:</b></td>
<td>&nbsp;</td>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['uname'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>

<tr>
<td><b><?php echo $this->_tpl_vars['lng']['lbl_email']; ?>
:</b></td>
<td>&nbsp;</td>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>

<?php if ($this->_tpl_vars['phone']): ?>
<tr>
<td><b><?php echo $this->_tpl_vars['lng']['lbl_phone']; ?>
:</b></td>
<td>&nbsp;</td>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['phone'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<?php endif; ?>

<tr>
<td colspan="3"><b><?php echo $this->_tpl_vars['lng']['lbl_message']; ?>
:</b><br /><hr size="1" noshade="noshade" color="#DDDDDD" align="left" /></td>
</tr>
<tr>
<td colspan="3"><?php echo ((is_array($_tmp=$this->_tpl_vars['question'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "mail/html/signature.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>