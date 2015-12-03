<?php /* Smarty version 2.6.26, created on 2015-12-02 19:13:39
         compiled from admin/main/editor_mode.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'admin/main/editor_mode.tpl', 24, false),array('modifier', 'escape', 'admin/main/editor_mode.tpl', 24, false),)), $this); ?>
<?php if ($this->webmaster_mode) { ?><div id="common_files0admin0main0editor_mode.tpl" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?><?php func_load_lang($this, "admin/main/editor_mode.tpl","lbl_webmaster_mode,txt_webmaster_mode_top_text,lbl_open_customer_area,txt_to_close_webmaster_mode,lbl_close_webmaster_mode,lbl_warning,txt_no_popup_block_note,txt_webmaster_mode_text,txt_start_webmaster_mode_text,lbl_start_webmaster_mode"); ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page_title.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_webmaster_mode'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['editor_mode_enabled']): ?>

<?php echo $this->_tpl_vars['lng']['txt_webmaster_mode_top_text']; ?>


<br /><br />

<a href="<?php echo $this->_tpl_vars['catalogs']['customer']; ?>
/home.php?shopkey=<?php echo $this->_tpl_vars['config']['General']['shop_closed_key']; ?>
" onclick="javascript: if (_smarty_console) _smarty_console.close();" target="customer"><b><?php echo $this->_tpl_vars['lng']['lbl_open_customer_area']; ?>
</b></a>

<br /><br />

<?php echo $this->_tpl_vars['lng']['txt_to_close_webmaster_mode']; ?>


<br /><br />

<form action="editor_mode.php" method="post">
<input type="hidden" name="mode" value="quit_mode" />
<div class="main-button">
  <input class="big-main-button" type="submit" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_close_webmaster_mode'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
</div>
</form>

<hr size="1" noshade="noshade" align="center" width="80%" />

<?php endif; ?>

<b><?php echo $this->_tpl_vars['lng']['lbl_warning']; ?>
</b> <?php echo $this->_tpl_vars['lng']['txt_no_popup_block_note']; ?>
<br /><br />

<?php echo $this->_tpl_vars['lng']['txt_webmaster_mode_text']; ?>


<?php if ($this->_tpl_vars['editor_mode_enabled'] == ""): ?>

<?php echo $this->_tpl_vars['lng']['txt_start_webmaster_mode_text']; ?>


<br /><br />

<form action="editor_mode.php" method="post">
<input type="hidden" name="mode" value="start_mode" />
<div class="main-button">
  <input class="big-main-button" type="submit" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_start_webmaster_mode'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
</div>
</form>

<?php endif; ?><?php if ($this->webmaster_mode) { ?></div><?php } ?>