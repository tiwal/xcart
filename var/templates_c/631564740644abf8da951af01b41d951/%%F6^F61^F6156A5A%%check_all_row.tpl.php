<?php /* Smarty version 2.6.26, created on 2015-12-02 18:51:08
         compiled from main/check_all_row.tpl */ ?>
<?php if ($this->webmaster_mode) { ?><div id="common_files0main0check_all_row.tpl" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?><?php func_load_lang($this, "main/check_all_row.tpl","lbl_check_all,lbl_uncheck_all"); ?><script type="text/javascript" src="<?php echo $this->_tpl_vars['SkinDir']; ?>
/js/change_all_checkboxes.js"></script>
<div<?php if ($this->_tpl_vars['style'] != ''): ?> style="<?php echo $this->_tpl_vars['style']; ?>
"<?php endif; ?>><a href="javascript:checkAll(true,document.<?php echo $this->_tpl_vars['form']; ?>
,'<?php echo $this->_tpl_vars['prefix']; ?>
');"><?php echo $this->_tpl_vars['lng']['lbl_check_all']; ?>
</a> / <a href="javascript:checkAll(false,document.<?php echo $this->_tpl_vars['form']; ?>
,'<?php echo $this->_tpl_vars['prefix']; ?>
');"><?php echo $this->_tpl_vars['lng']['lbl_uncheck_all']; ?>
</a></div><?php if ($this->webmaster_mode) { ?></div><?php } ?>