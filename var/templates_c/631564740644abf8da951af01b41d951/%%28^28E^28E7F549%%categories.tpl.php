<?php /* Smarty version 2.6.26, created on 2015-12-02 18:33:47
         compiled from admin/main/categories.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'admin/main/categories.tpl', 22, false),array('modifier', 'strip_tags', 'admin/main/categories.tpl', 31, false),array('modifier', 'escape', 'admin/main/categories.tpl', 31, false),array('function', 'cycle', 'admin/main/categories.tpl', 63, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page_title.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_categories_management'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<br />

<?php echo $this->_tpl_vars['lng']['txt_categories_management_top_text']; ?>


<br /><br />

<?php ob_start(); ?>
<a name="Categories"></a>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/main/location.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['cat']): ?>

<table width="100%">

<tr>
<td align="center" class="TopLabel"><?php echo $this->_tpl_vars['lng']['lbl_current_category']; ?>
: "<?php echo ((is_array($_tmp=@$this->_tpl_vars['current_category']['category'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['lng']['lbl_root_level']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['lng']['lbl_root_level'])); ?>
"
<?php if ($this->_tpl_vars['current_category']['avail'] == 'N'): ?>
<div class="ErrorMessage"><?php echo $this->_tpl_vars['lng']['txt_category_disabled']; ?>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<td align="right" class="SubmitBox">
<input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_modify_category'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: self.location='category_modify.php?cat=<?php echo $this->_tpl_vars['cat']; ?>
'" />
<input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_category_products'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: self.location='category_products.php?cat=<?php echo $this->_tpl_vars['cat']; ?>
'" />
<input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_delete_category'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: self.location='process_category.php?cat=<?php echo $this->_tpl_vars['cat']; ?>
&amp;mode=delete'" />
</td>
</tr>

</table>

<br /><br />

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/subheader.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['txt_list_of_subcategories'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php endif; ?>

<br />

<form action="process_category.php" method="post" name="processcategoryform">
<input type="hidden" name="cat_org" value="<?php echo ((is_array($_tmp=$_GET['cat'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />

<table cellpadding="2" cellspacing="1" width="100%">

<tr class="TableHead">
  <td><?php echo $this->_tpl_vars['lng']['lbl_pos']; ?>
</td>
  <td colspan="2"><?php echo $this->_tpl_vars['lng']['lbl_category_name']; ?>
</td>
  <td align="center"><?php echo $this->_tpl_vars['lng']['lbl_products']; ?>
*</td>
  <td align="center"><?php echo $this->_tpl_vars['lng']['lbl_subcategories']; ?>
</td>
  <td align="center"><?php echo $this->_tpl_vars['lng']['lbl_enabled']; ?>
</td>
</tr>

<?php $this->assign('cat_selected', 0); ?>
<?php $_from = $this->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['catid'] => $this->_tpl_vars['c']):
?>

<tr<?php echo smarty_function_cycle(array('values' => ', class="TableSubHead"'), $this);?>
>
  <td width="1%"><input type="text" size="3" name="posted_data[<?php echo $this->_tpl_vars['catid']; ?>
][order_by]" maxlength="3" value="<?php echo $this->_tpl_vars['c']['order_by']; ?>
" /></td>
  <td width="1%"><input type="radio" name="cat" value="<?php echo $this->_tpl_vars['catid']; ?>
"<?php if ($this->_tpl_vars['cat_selected'] == 0): ?> checked="checked"<?php endif; ?> /></td>
  <td><a href="categories.php?cat=<?php echo $this->_tpl_vars['catid']; ?>
"><font class="<?php if ($this->_tpl_vars['c']['avail'] == 'N'): ?>ItemsListDisabled<?php else: ?>ItemsList<?php endif; ?>"><?php echo $this->_tpl_vars['c']['category']; ?>
</font></a></td>
  <td align="center">
<?php if ($this->_tpl_vars['c']['product_count'] == 0 && $this->_tpl_vars['c']['product_count_global'] == 0): ?>
<?php echo $this->_tpl_vars['lng']['txt_not_available']; ?>

<?php else: ?>
<a href="category_products.php?cat=<?php echo $this->_tpl_vars['catid']; ?>
"><?php echo ((is_array($_tmp=@$this->_tpl_vars['c']['product_count'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['lng']['txt_not_available']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['lng']['txt_not_available'])); ?>
</a> (<?php echo $this->_tpl_vars['c']['product_count_global']; ?>
)
<?php endif; ?>
  </td>
  <td align="center"><a href="categories.php?cat=<?php echo $this->_tpl_vars['catid']; ?>
"><?php echo ((is_array($_tmp=@$this->_tpl_vars['c']['subcategory_count'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['lng']['txt_not_available']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['lng']['txt_not_available'])); ?>
</a></td>
  <td align="center">
  <select name="posted_data[<?php echo $this->_tpl_vars['catid']; ?>
][avail]">
    <option value="Y"<?php if ($this->_tpl_vars['c']['avail'] == 'Y'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_yes']; ?>
</option>
    <option value="N"<?php if ($this->_tpl_vars['c']['avail'] == 'N'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_no']; ?>
</option>
  </select>
  </td>
</tr>

<?php $this->assign('cat_selected', 1); ?>

<?php endforeach; else: ?>

<tr>
  <td colspan="6" align="center"><?php echo $this->_tpl_vars['lng']['txt_no_categories']; ?>
</td>
</tr>

<?php endif; unset($_from); ?>

<?php if ($this->_tpl_vars['categories']): ?>
<tr>
  <td colspan="6">
<b>*<?php echo $this->_tpl_vars['lng']['lbl_note']; ?>
:</b> <?php echo $this->_tpl_vars['lng']['txt_categories_management_note']; ?>

  </td>
</tr>
<tr>
  <td colspan="6" class="SubmitBox">
<input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_update'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: submitForm(this, 'apply');" />
<br /><br />
<input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_modify_selected'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: submitForm(this, 'update');" />
<input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_delete_selected'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: submitForm(this, 'delete');" />
  </td>
</tr>
<?php endif; ?>

<tr>
  <td colspan="6" class="SubmitBox"><input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_add_new_'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="self.location='category_modify.php?mode=add&amp;cat=<?php echo $this->_tpl_vars['cat']; ?>
'" /></td>
</tr>

</table>

<input type="hidden" name="mode" value="apply" />
</form>

<br />

<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_categories'],'content' => $this->_smarty_vars['capture']['dialog'],'extra' => 'width="100%"')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<br /><br />

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/main/featured_products.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
