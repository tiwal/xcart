<?php /* Smarty version 2.6.26, created on 2015-12-02 18:19:01
         compiled from admin/main/search_products_form.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'regex_replace', 'admin/main/search_products_form.tpl', 48, false),array('modifier', 'strip_tags', 'admin/main/search_products_form.tpl', 74, false),array('modifier', 'escape', 'admin/main/search_products_form.tpl', 74, false),)), $this); ?>
<table cellpadding="3" cellspacing="1" width="100%">

<tr>
  <td>

<form action="configuration.php" method="post">
<input type="hidden" name="option" value="<?php echo $this->_tpl_vars['option']; ?>
" />
<input type="hidden" name="mode" value="update_status" />

<input type="hidden" name="update[manufacturers][exist]" value='Y' />
<input type="hidden" name="update[category][exist]" value='Y' />
<input type="hidden" name="update[price][exist]" value='Y' />
<input type="hidden" name="update[weight][exist]" value='Y' />

<table cellpadding="3" cellspacing="1" width="100%">

<tr class="TableHead">
  <td width="20%" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_field_name']; ?>
</td>
  <td align="center"><?php echo $this->_tpl_vars['lng']['lbl_active']; ?>
</td>
  <td align="center"><?php echo $this->_tpl_vars['lng']['lbl_default_value']; ?>
</td>
</tr>

<?php if ($this->_tpl_vars['active_modules']['Manufacturers'] && $this->_tpl_vars['manufacturers']): ?>
<tr>
  <td><?php echo $this->_tpl_vars['lng']['lbl_manufacturers']; ?>
</td>
  <td align="center"><input type="checkbox" name="update[manufacturers][avail]" value='Y'<?php if ($this->_tpl_vars['config']['Search_products']['search_products_manufacturers'] == 'Y'): ?> checked="checked"<?php endif; ?> /></td>
  <td><select name="update[manufacturers][default][]" multiple="multiple">
  <?php $_from = $this->_tpl_vars['manufacturers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
  <option value='<?php echo $this->_tpl_vars['v']['manufacturerid']; ?>
'<?php if ($this->_tpl_vars['v']['selected'] == 'Y'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['v']['manufacturer']; ?>
</option>
  <?php endforeach; endif; unset($_from); ?>
  </select></td>
</tr>
<?php endif; ?>

<tr>
    <td><?php echo $this->_tpl_vars['lng']['lbl_category']; ?>
</td>
    <td align="center"><input type="checkbox" name="update[category][avail]" value='Y'<?php if ($this->_tpl_vars['config']['Search_products']['search_products_category'] == 'Y'): ?> checked="checked"<?php endif; ?> /></td>
    <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/category_selector.tpl", 'smarty_include_vars' => array('field' => "update[category][default]",'categoryid' => $this->_tpl_vars['config']['Search_products']['search_products_category_d'],'display_empty' => 'E','display_field' => 'category_path')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr> 

<tr> 
    <td><?php echo $this->_tpl_vars['lng']['lbl_price']; ?>
</td> 
    <td align="center"><input type="checkbox" name="update[price][avail]" value='Y'<?php if ($this->_tpl_vars['config']['Search_products']['search_products_price'] == 'Y'): ?> checked="checked"<?php endif; ?> /></td>
    <td><input size="10" type="text" name="update[price][default][begin]" value='<?php echo ((is_array($_tmp=$this->_tpl_vars['config']['Search_products']['search_products_price_d'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/-.*$/", "") : smarty_modifier_regex_replace($_tmp, "/-.*$/", "")); ?>
' />&nbsp;-&nbsp; 
  <input size="10" type="text" name="update[price][default][end]" value='<?php echo ((is_array($_tmp=$this->_tpl_vars['config']['Search_products']['search_products_price_d'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/^.*-/", "") : smarty_modifier_regex_replace($_tmp, "/^.*-/", "")); ?>
' /></td>
</tr> 

<tr>
    <td><?php echo $this->_tpl_vars['lng']['lbl_weight']; ?>
</td>   
    <td align="center"><input type="checkbox" name="update[weight][avail]" value='Y'<?php if ($this->_tpl_vars['config']['Search_products']['search_products_weight'] == 'Y'): ?> checked="checked"<?php endif; ?> /></td>
    <td><input size="10" type="text" name="update[weight][default][begin]" value='<?php echo ((is_array($_tmp=$this->_tpl_vars['config']['Search_products']['search_products_weight_d'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/-.*$/", "") : smarty_modifier_regex_replace($_tmp, "/-.*$/", "")); ?>
' />&nbsp;-&nbsp;
    <input size="10" type="text" name="update[weight][default][end]" value='<?php echo ((is_array($_tmp=$this->_tpl_vars['config']['Search_products']['search_products_weight_d'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/^.*-/", "") : smarty_modifier_regex_replace($_tmp, "/^.*-/", "")); ?>
' /></td>
</tr>

<?php if ($this->_tpl_vars['active_modules']['Extra_Fields'] && $this->_tpl_vars['extra_fields'] != ''): ?>
<tr>
  <td colspan="3"><br /><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/subheader.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_extra_fields'],'class' => 'grey')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>

<?php $_from = $this->_tpl_vars['extra_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
<tr>
    <td><?php echo $this->_tpl_vars['v']['field']; ?>
</td>
    <td><input type="checkbox" name="extra_fields[<?php echo $this->_tpl_vars['v']['fieldid']; ?>
]" value='Y'<?php if ($this->_tpl_vars['v']['selected'] == 'Y'): ?> checked="checked"<?php endif; ?> /></td>
</tr>

<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

<tr>
  <td colspan="3"><br /><input type="submit" value=" <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_save'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 " /></td>
</tr>

</table>
</form>

</td>
</tr>
</table>
