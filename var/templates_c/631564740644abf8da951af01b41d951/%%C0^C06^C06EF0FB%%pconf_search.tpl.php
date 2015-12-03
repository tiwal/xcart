<?php /* Smarty version 2.6.26, created on 2015-12-02 19:16:19
         compiled from modules/Product_Configurator/pconf_search.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'wm_remove', 'modules/Product_Configurator/pconf_search.tpl', 8, false),array('modifier', 'escape', 'modules/Product_Configurator/pconf_search.tpl', 8, false),array('modifier', 'strip_tags', 'modules/Product_Configurator/pconf_search.tpl', 141, false),array('modifier', 'substitute', 'modules/Product_Configurator/pconf_search.tpl', 151, false),array('modifier', 'truncate', 'modules/Product_Configurator/pconf_search.tpl', 175, false),array('modifier', 'amp', 'modules/Product_Configurator/pconf_search.tpl', 175, false),array('function', 'getvar', 'modules/Product_Configurator/pconf_search.tpl', 62, false),array('function', 'cycle', 'modules/Product_Configurator/pconf_search.tpl', 172, false),)), $this); ?>
<?php if ($this->webmaster_mode) { ?><div id="common_files0modules0Product_Configurator0pconf_search.tpl" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?><?php func_load_lang($this, "modules/Product_Configurator/pconf_search.tpl","txt_pconf_search_delete_alert,txt_pconf_search_title,lbl_product,lbl_product_title,lbl_provider,lbl_all,lbl_pconf_search_status,lbl_pconf_search_allproducts,lbl_pconf_search_configurable_only,lbl_pconf_search_bundled_only,lbl_in_category,lbl_pconf_search_subcats,lbl_pconf_search_no_types,lbl_pconf_search_types,lbl_pconf_search_note_ctrl_types,lbl_search,lbl_search_products,lbl_products_found,lbl_pconf_search_status,lbl_pconf_search_assigned_types,lbl_configure,lbl_pconf_search_configurable,lbl_modify,lbl_pconf_search_bundled,lbl_modify,lbl_pconf_search_disabled,lbl_modify,lbl_hidden,lbl_pconf_search_notavail,lbl_details,lbl_clone,lbl_delete_selected,lbl_modify_selected,lbl_export_selected,lbl_search_results"); ?><script type="text/javascript" language="JavaScript 1.2">
//<![CDATA[
var txt_pconf_search_delete_alert = "<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['txt_pconf_search_delete_alert'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";
var product_type, no_product_type;
<?php echo '
function toggle_status(obj) {
  if (!product_type)
    product_type = document.getElementById(\'product_type\');
  if (!no_product_type)
    no_product_type = document.getElementById(\'no_product_type\');
  if (!product_type || !no_product_type)
    return false;

  if (obj.options[obj.selectedIndex].value == \'C\') {
    product_type.disabled = true;
    no_product_type.disabled = true;
  } else {
    no_product_type.disabled = false;
    if (no_product_type.onclick)
      no_product_type.onclick();
  }
}

function toggle_no_product_type(obj) {
  if (!product_type)
    product_type = document.getElementById(\'product_type\');
  if (!product_type)
    return false;
  product_type.disabled = (obj.checked);
}

'; ?>

//]]>
</script>

<?php echo $this->_tpl_vars['lng']['txt_pconf_search_title']; ?>

<br /><br />
<?php ob_start(); ?>
<form action="pconf.php" method="post" name="pconfsearchform">
<input type="hidden" name="mode" value="search" />

<table cellpadding="3" cellspacing="1" width="100%">

<tr>
  <td height="10" width="30%" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_product']; ?>
 #:</td>
  <td width="10" height="10">&nbsp;</td>
  <td height="10" width="70%"><input type="text" name="post_data[productid]" size="6" maxlength="11" value="<?php echo $this->_tpl_vars['search_data']['productid']; ?>
" /></td>
</tr>

<tr>
  <td height="10" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_product_title']; ?>
:</td>
  <td width="10" height="10">&nbsp;</td>
  <td height="10"><input type="text" name="post_data[substring]" size="30" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_data']['substring'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
</tr>

<?php if ($this->_tpl_vars['usertype'] == 'A'): ?>
<?php echo smarty_function_getvar(array('var' => 'providers','func' => 'func_get_providers'), $this);?>

<?php if ($this->_tpl_vars['providers']): ?>
<tr>
  <td height="10" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_provider']; ?>
:</td>
  <td width="10" height="10">&nbsp;</td>
  <td height="10">
  <select name="post_data[provider]">
    <option value=""><?php echo $this->_tpl_vars['lng']['lbl_all']; ?>
</option>
  <?php unset($this->_sections['prov']);
$this->_sections['prov']['name'] = 'prov';
$this->_sections['prov']['loop'] = is_array($_loop=$this->_tpl_vars['providers']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['prov']['show'] = true;
$this->_sections['prov']['max'] = $this->_sections['prov']['loop'];
$this->_sections['prov']['step'] = 1;
$this->_sections['prov']['start'] = $this->_sections['prov']['step'] > 0 ? 0 : $this->_sections['prov']['loop']-1;
if ($this->_sections['prov']['show']) {
    $this->_sections['prov']['total'] = $this->_sections['prov']['loop'];
    if ($this->_sections['prov']['total'] == 0)
        $this->_sections['prov']['show'] = false;
} else
    $this->_sections['prov']['total'] = 0;
if ($this->_sections['prov']['show']):

            for ($this->_sections['prov']['index'] = $this->_sections['prov']['start'], $this->_sections['prov']['iteration'] = 1;
                 $this->_sections['prov']['iteration'] <= $this->_sections['prov']['total'];
                 $this->_sections['prov']['index'] += $this->_sections['prov']['step'], $this->_sections['prov']['iteration']++):
$this->_sections['prov']['rownum'] = $this->_sections['prov']['iteration'];
$this->_sections['prov']['index_prev'] = $this->_sections['prov']['index'] - $this->_sections['prov']['step'];
$this->_sections['prov']['index_next'] = $this->_sections['prov']['index'] + $this->_sections['prov']['step'];
$this->_sections['prov']['first']      = ($this->_sections['prov']['iteration'] == 1);
$this->_sections['prov']['last']       = ($this->_sections['prov']['iteration'] == $this->_sections['prov']['total']);
?>
    <option value="<?php echo $this->_tpl_vars['providers'][$this->_sections['prov']['index']]['id']; ?>
" <?php if ($this->_tpl_vars['search_data']['provider'] == $this->_tpl_vars['providers'][$this->_sections['prov']['index']]['id']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['providers'][$this->_sections['prov']['index']]['login']; ?>
 (<?php echo $this->_tpl_vars['providers'][$this->_sections['prov']['index']]['title']; ?>
 <?php echo $this->_tpl_vars['providers'][$this->_sections['prov']['index']]['lastname']; ?>
 <?php echo $this->_tpl_vars['providers'][$this->_sections['prov']['index']]['firstname']; ?>
)</option>
  <?php endfor; endif; ?>
  </select>
  </td>
</tr>
<?php endif; ?>
<?php endif; ?>

<tr>
  <td height="10" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_pconf_search_status']; ?>
:</td>
  <td width="10" height="10">&nbsp;</td>
  <td height="10">
  <select name="post_data[product_status]" onchange="javascript: toggle_status(this);">
    <option value=""<?php if ($this->_tpl_vars['search_data']['product_status'] == ""): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_pconf_search_allproducts']; ?>
</option>
    <option value="C"<?php if ($this->_tpl_vars['search_data']['product_status'] == 'C' || $this->_tpl_vars['search_data'] == ""): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_pconf_search_configurable_only']; ?>
</option>
    <option value="B"<?php if ($this->_tpl_vars['search_data']['product_status'] == 'B'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_pconf_search_bundled_only']; ?>
</option>
  </select>
  </td>
</tr>

<tr>
  <td height="10" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_in_category']; ?>
:</td>
  <td width="10" height="10"><font class="CustomerMessage">*</font></td>
  <td height="10"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/category_selector.tpl", 'smarty_include_vars' => array('field' => "post_data[categoryid]",'display_empty' => 'E','categoryid' => $this->_tpl_vars['search_data']['categoryid'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>

<tr>
  <td height="10">&nbsp;</td>
  <td width="10" height="10">&nbsp;</td>
  <td height="10">
<table cellpadding="0" cellspacing="0">
<tr>
  <td><input type="checkbox" id="post_data_search_in_subcategories" name="post_data[search_in_subcategories]"<?php if ($this->_tpl_vars['search_data']['search_in_subcategories'] != "" || $this->_tpl_vars['search_data'] == ""): ?> checked="checked"<?php endif; ?> /></td>
  <td><label for="post_data_search_in_subcategories"><?php echo $this->_tpl_vars['lng']['lbl_pconf_search_subcats']; ?>
</label></td>
</tr>
</table>
  </td>
</tr>

<tr>
  <td height="10" class="FormButton"><?php echo $this->_tpl_vars['lng']['lbl_pconf_search_no_types']; ?>
:<br /></td>
  <td width="10" height="10">&nbsp;</td>
  <td height="10"><input type="checkbox" id="no_product_type" name="post_data[no_product_type]"<?php if ($this->_tpl_vars['search_data']['no_product_type']): ?> checked="checked"<?php endif; ?><?php if ($this->_tpl_vars['search_data']['product_status'] == 'C'): ?> disabled="disabled"<?php endif; ?> onclick="javascript: toggle_no_product_type(this);" /></td>
</tr>

<tr>
  <td height="10" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_pconf_search_types']; ?>
:<br /></td>
  <td width="10" height="10">&nbsp;</td>
  <td height="10">
  <select id="product_type" name="post_data[product_type][]" multiple="multiple" size="5"<?php if ($this->_tpl_vars['search_data']['no_product_type'] || $this->_tpl_vars['search_data']['product_status'] == 'C'): ?> disabled="disabled"<?php endif; ?>>
<?php $_from = $this->_tpl_vars['product_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pt']):
?>
    <option value="<?php echo $this->_tpl_vars['pt']['ptypeid']; ?>
"<?php if ($this->_tpl_vars['pt']['selected']): ?> selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['pt']['ptype_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
    <option value="">&nbsp;</option>
  </select>
<script type="text/javascript">
//<![CDATA[
var tmp = document.getElementById('product_type');
if (tmp)
  tmp.options[tmp.options.length-1] = null;
//]]>
</script>
<br />
<?php echo $this->_tpl_vars['lng']['lbl_pconf_search_note_ctrl_types']; ?>

  </td>
</tr>

<tr>
  <td width="78" class="FormButton">&nbsp;</td>
  <td width="10">&nbsp;</td>
  <td width="282" class="SubmitBox"><input type="submit" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_search'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
</tr>

</table>
</form>
<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_search_products'],'content' => $this->_smarty_vars['capture']['dialog'],'extra' => 'width="100%"')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<br />
<?php if ($_GET['action'] == 'go'): ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_products_found'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'items', $this->_tpl_vars['total_items']) : smarty_modifier_substitute($_tmp, 'items', $this->_tpl_vars['total_items'])); ?>

<br />
<?php endif; ?>

<?php if ($this->_tpl_vars['total_items'] > 0): ?>
<br />
<?php ob_start(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/navigation.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<form action="process_product.php" method="post" name="processproductform">
<input type="hidden" name="source" value="pconf" />
<table cellpadding="3" cellspacing="1" width="100%">

<tr class="TableHead">
  <th width="10">&nbsp;</th>
  <th width="10" align="left" height="16">ID</th>
  <th align="left">Product</th>
  <th align="left"><?php echo $this->_tpl_vars['lng']['lbl_pconf_search_status']; ?>
</th>
  <th nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_pconf_search_assigned_types']; ?>
</th>
</tr>

<?php $_from = $this->_tpl_vars['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['product']):
?>
<tr<?php echo smarty_function_cycle(array('values' => " , class='TableSubHead'"), $this);?>
>
  <td><input type="checkbox" name="productids[<?php echo $this->_tpl_vars['product']['productid']; ?>
]" value="<?php echo $this->_tpl_vars['product']['productid']; ?>
" /></td>
  <td>#<a href="product_modify.php?productid=<?php echo $this->_tpl_vars['product']['productid']; ?>
"><?php echo $this->_tpl_vars['product']['productid']; ?>
</a></td>
  <td width="99%"><a href="product_modify.php?productid=<?php echo $this->_tpl_vars['product']['productid']; ?>
"><font class="ItemsList"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['product']['product'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 35, "...", false) : smarty_modifier_truncate($_tmp, 35, "...", false)))) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
</font></a>
</td>
  <td>
<?php if ($this->_tpl_vars['product']['product_type'] == 'C'): ?><a href="product_modify.php?productid=<?php echo $this->_tpl_vars['product']['productid']; ?>
&amp;mode=pconf&amp;edit=wizard" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_configure'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><font color="#006600"><b><?php echo $this->_tpl_vars['lng']['lbl_pconf_search_configurable']; ?>
</b></font></a>
<?php elseif ($this->_tpl_vars['product']['forsale'] == 'B'): ?><a href="product_modify.php?productid=<?php echo $this->_tpl_vars['product']['productid']; ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_modify'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><b><?php echo $this->_tpl_vars['lng']['lbl_pconf_search_bundled']; ?>
</b></a>
<?php elseif ($this->_tpl_vars['product']['forsale'] == 'N'): ?><a href="product_modify.php?productid=<?php echo $this->_tpl_vars['product']['productid']; ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_modify'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><font class="ErrorMessage"><?php echo $this->_tpl_vars['lng']['lbl_pconf_search_disabled']; ?>
</b></font></a>
<?php elseif ($this->_tpl_vars['product']['forsale'] == 'H'): ?><a href="product_modify.php?productid=<?php echo $this->_tpl_vars['product']['productid']; ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_modify'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><b><?php echo $this->_tpl_vars['lng']['lbl_hidden']; ?>
</b></a>
<?php else: ?>&nbsp;<?php endif; ?>
  </td>

<?php if ($this->_tpl_vars['product']['product_type'] == 'C'): ?>
  <td>&nbsp;</td>
<?php else: ?>
  <td align="center"><?php if ($this->_tpl_vars['product']['types_count'] > 0): ?><b><?php echo $this->_tpl_vars['product']['types_count']; ?>
</b><?php else: ?><?php echo $this->_tpl_vars['lng']['lbl_pconf_search_notavail']; ?>
<?php endif; ?></td>
<?php endif; ?>

</tr>
<?php endforeach; endif; unset($_from); ?>

</table>
<br />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/navigation.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<br />
<input type="hidden" name="mode" value="" />
<input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_details'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: submitForm(document.processproductform, 'details');" />
&nbsp;&nbsp;&nbsp;
<input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_clone'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: submitForm(document.processproductform, 'clone');" />
&nbsp;&nbsp;&nbsp;
<input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_delete_selected'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: if (confirm(txt_pconf_search_delete_alert) && checkMarks(this.form, new RegExp('productids', 'gi'))) submitForm(document.processproductform, 'delete');" />
&nbsp;&nbsp;&nbsp;
<input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_modify_selected'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: if (checkMarks(this.form, new RegExp('productids', 'gi'))) { document.processproductform.action='product_modify.php'; submitForm(document.processproductform, 'list');}" />
&nbsp;&nbsp;&nbsp;
<input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_export_selected'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: if (checkMarks(this.form, new RegExp('productids', 'gi'))) submitForm(document.processproductform, 'export');" />

</form>
<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_search_results'],'content' => $this->_smarty_vars['capture']['dialog'],'extra' => 'width="100%"')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if ($this->webmaster_mode) { ?></div><?php } ?>