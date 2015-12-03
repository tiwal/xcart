<?php /* Smarty version 2.6.26, created on 2015-12-02 18:41:41
         compiled from admin/main/db_backup.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'wm_remove', 'admin/main/db_backup.tpl', 13, false),array('modifier', 'escape', 'admin/main/db_backup.tpl', 13, false),array('modifier', 'nl2br', 'admin/main/db_backup.tpl', 33, false),array('modifier', 'substitute', 'admin/main/db_backup.tpl', 52, false),array('modifier', 'strip_tags', 'admin/main/db_backup.tpl', 57, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page_title.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_database_backup_restore'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo $this->_tpl_vars['lng']['txt_database_backup_restore_top_text']; ?>


<br /><br />

<script type="text/javascript">
//<![CDATA[
var txt_operation_is_irreversible_warning = "<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['txt_operation_is_irreversible_warning'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";
//]]>
</script>

<?php ob_start(); ?>
<form action="db_backup.php" method="post">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/subheader.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_backup_database'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<br />

<?php echo $this->_tpl_vars['lng']['txt_backup_database_text']; ?>


<br /><br />
<?php if ($_GET['err'] == 'sql' && $this->_tpl_vars['backup_errors'] != ''): ?>
<?php echo $this->_tpl_vars['lng']['txt_db_backup_sql_errors']; ?>
:
<br /><br />
<table cellpadding="5" cellspacing="5" width="100%" style="border: solid #ccc 1px;">
<?php $_from = $this->_tpl_vars['backup_errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
<tr>
  <td><?php echo ((is_array($_tmp=$this->_tpl_vars['error'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<br /></br>
<?php endif; ?>

<table cellpadding="0" cellspacing="0">
<?php if ($_GET['err'] == 'sql' && $this->_tpl_vars['backup_errors'] != ''): ?>
<tr>
  <td><input type="checkbox" id="force_db_backup" name="force_db_backup" value="Y" /></td>
  <td><label for="force_db_backup"><?php echo $this->_tpl_vars['lng']['lbl_force_db_backup']; ?>
</label></td>
</tr>
<tr>
  <td colspan="2" class="Star"><?php echo $this->_tpl_vars['lng']['txt_force_db_backup_note']; ?>
<br /><br /></td>
</tr>
<?php endif; ?>
<tr>
  <td><input type="checkbox" id="write_to_file" name="write_to_file" value="Y" /></td>
  <td><label for="write_to_file"><?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['txt_write_sql_dump_to_file'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'file', $this->_tpl_vars['sqldump_file']) : smarty_modifier_substitute($_tmp, 'file', $this->_tpl_vars['sqldump_file'])); ?>
</label></td>
</tr>
</table>
<br />
<div class="main-button">
  <input type="submit" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_generate_sql_file'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
</div>
<br />

<input type="hidden" name="mode" value="backup" />
</form>
<?php echo $this->_tpl_vars['lng']['txt_backup_database_note']; ?>

<br />
<br />
<br />
<form action="db_backup.php" method="post" name="dbrestoreform" enctype="multipart/form-data" onsubmit='javascript: return confirm(txt_operation_is_irreversible_warning)'>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/subheader.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_restore_database'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<br />

<?php echo $this->_tpl_vars['lng']['txt_restore_database_text']; ?>


<br />

<?php if ($this->_tpl_vars['file_exists']): ?>
<input type="hidden" name="local_file" value="" />
<table cellpadding="0" cellspacing="0">
<tr>
  <td valign="top" class="main-button">
    <input type="submit" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_restore'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: document.dbrestoreform.local_file.value = 'on';" />
  </td>
  <td>&nbsp;-&nbsp;</td>
  <td><?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['txt_restore_database_from_file'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'file', $this->_tpl_vars['sqldump_file']) : smarty_modifier_substitute($_tmp, 'file', $this->_tpl_vars['sqldump_file'])); ?>
</td>
</tr>
</table>
<br />
<?php endif; ?>
<div class="main-button">
  <input type="file" name="userfile" />&nbsp;
  <input type="submit" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_restore_from_file'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
  <br /><br />
  <?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['txt_max_file_size_warning'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'size', $this->_tpl_vars['upload_max_filesize']) : smarty_modifier_substitute($_tmp, 'size', $this->_tpl_vars['upload_max_filesize'])); ?>

  <input type="hidden" name="mode" value="restore" />
</div>
</form>
<?php echo $this->_tpl_vars['lng']['txt_restore_database_note']; ?>

<br /><br />
<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_database_backup_restore'],'content' => $this->_smarty_vars['capture']['dialog'],'extra' => 'width="100%"')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>