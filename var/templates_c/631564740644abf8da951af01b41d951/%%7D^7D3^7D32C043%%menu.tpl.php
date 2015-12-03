<?php /* Smarty version 2.6.26, created on 2015-12-02 19:15:33
         compiled from customer/help/menu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'amp', 'customer/help/menu.tpl', 9, false),)), $this); ?>
<?php if ($this->webmaster_mode) { ?><div id="ideal_comfort0customer0help0menu.tpl" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?><?php func_load_lang($this, "customer/help/menu.tpl","lbl_help_zone,lbl_contact_us"); ?><a href="help.php"><?php echo $this->_tpl_vars['lng']['lbl_help_zone']; ?>
</a>
<a href="help.php?section=contactus&amp;mode=update"><?php echo $this->_tpl_vars['lng']['lbl_contact_us']; ?>
</a>
<?php $_from = $this->_tpl_vars['pages_menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
  <?php if ($this->_tpl_vars['p']['show_in_menu'] == 'Y'): ?>
	<a href="pages.php?pageid=<?php echo $this->_tpl_vars['p']['pageid']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['title'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
</a>
  <?php endif; ?>
<?php endforeach; endif; unset($_from); ?><?php if ($this->webmaster_mode) { ?></div><?php } ?>