<?php /* Smarty version 2.6.26, created on 2015-12-02 17:58:12
         compiled from modules/Extra_Fields/extra_fields.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'modules/Extra_Fields/extra_fields.tpl', 48, false),array('modifier', 'escape', 'modules/Extra_Fields/extra_fields.tpl', 50, false),array('modifier', 'strip_tags', 'modules/Extra_Fields/extra_fields.tpl', 61, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page_title.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_extra_fields_title'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo $this->_tpl_vars['lng']['txt_extra_fields_desc']; ?>


<br /><br />

<?php ob_start(); ?>

<?php if ($this->_tpl_vars['extra_fields']): ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/language_selector.tpl", 'smarty_include_vars' => array('script' => "extra_fields.php?")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript" language="JavaScript 1.2">
//<![CDATA[
checkboxes_form = 'extrafieldsform';
checkboxes = new Array(<?php $_from = $this->_tpl_vars['extra_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>'posted_data[<?php echo $this->_tpl_vars['k']; ?>
][to_delete]',<?php endforeach; endif; unset($_from); ?>'');
 
//]]>
</script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['SkinDir']; ?>
/js/change_all_checkboxes.js"></script>

<div style="line-height:170%"><a href="javascript:change_all(true);"><?php echo $this->_tpl_vars['lng']['lbl_check_all']; ?>
</a> / <a href="javascript:change_all(false);"><?php echo $this->_tpl_vars['lng']['lbl_uncheck_all']; ?>
</a></div>

<?php endif; ?>

<form action="extra_fields.php" method="post" name="extrafieldsform">
<input type="hidden" name="mode" value="update" />

<table cellpadding="3" cellspacing="1">

<tr class="TableHead">
  <td>&nbsp;</td>
  <td><?php echo $this->_tpl_vars['lng']['lbl_extra_fields_name']; ?>
</td>
  <td><?php echo $this->_tpl_vars['lng']['lbl_service_name']; ?>
</td>
  <td><?php echo $this->_tpl_vars['lng']['lbl_extra_fields_default_value']; ?>
</td>
  <td align="center"><?php echo $this->_tpl_vars['lng']['lbl_extra_fields_show']; ?>
</td>
  <td align="center"><?php echo $this->_tpl_vars['lng']['lbl_orderby']; ?>
</td>
</tr>

<?php if ($this->_tpl_vars['extra_fields']): ?>

<?php $_from = $this->_tpl_vars['extra_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['field']):
?>

<tr<?php echo smarty_function_cycle(array('values' => ", class='TableSubHead'"), $this);?>
>
  <td><input type="checkbox" name="posted_data[<?php echo $this->_tpl_vars['id']; ?>
][to_delete]" /></td>
  <td><input type="text" name="posted_data[<?php echo $this->_tpl_vars['id']; ?>
][field]" size="35" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['field']['field'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" /></td>
  <td><input type="text" name="posted_data[<?php echo $this->_tpl_vars['id']; ?>
][service_name]" maxlength="128" size="15" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['field']['service_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  <td><input type="text" name="posted_data[<?php echo $this->_tpl_vars['id']; ?>
][value]" size="20" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['field']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" /></td>
  <td align="center"><input type="checkbox" name="posted_data[<?php echo $this->_tpl_vars['id']; ?>
][active]" value="Y"<?php if ($this->_tpl_vars['field']['active'] == 'Y'): ?> checked="checked"<?php endif; ?> /></td>
  <td><input type="text" name="posted_data[<?php echo $this->_tpl_vars['id']; ?>
][orderby]" size="3" value="<?php echo $this->_tpl_vars['field']['orderby']; ?>
" /></td>
</tr>

<?php endforeach; endif; unset($_from); ?>

<tr>
  <td colspan="4" class="SubmitBox">
  <input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_delete_selected'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: if (checkMarks(this.form, new RegExp('posted_data\\[[0-9]+\\]\\[to_delete\\]', 'gi'))) submitForm(this, 'delete');" />
  <input type="submit" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_update'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
  </td>
</tr>

<?php else: ?>

<tr>
  <td colspan="4" align="center"><?php echo $this->_tpl_vars['lng']['lbl_extra_fields_not_defined']; ?>
</td>
</tr>

<?php endif; ?>

<?php if ($this->_tpl_vars['single_mode'] != "" || $this->_tpl_vars['count_extra_fields'] < $this->_tpl_vars['config']['Extra_Fields']['extra_fields_limit']): ?>

<tr>
  <td colspan="6"><br /><br /><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/subheader.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_add_extra_field'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>

<tr>
  <td>&nbsp;</td>
  <td><input type="text" name="new[field]" size="35" /></td>
  <td><input type="text" name="new[service_name]" maxlength="128" size="15" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['max_service_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  <td><input type="text" name="new[value]" size="20" /></td>
  <td align="center"><input type="checkbox" name="new[active]" value="Y" checked="checked" /></td>
  <td><input type="text" name="new[orderby]" size="3" value="" /></td>
</tr>

<tr>
  <td colspan="4" class="SubmitBox"><input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_add_new'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: submitForm(this, 'add');" /></td>
</tr>

<?php endif; ?>

</table>
</form>

<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_extra_fields_title'],'content' => $this->_smarty_vars['capture']['dialog'],'extra' => 'width="100%"')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>