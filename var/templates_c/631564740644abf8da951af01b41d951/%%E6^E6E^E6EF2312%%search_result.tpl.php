<?php /* Smarty version 2.6.26, created on 2015-12-02 18:05:42
         compiled from main/search_result.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'main/search_result.tpl', 9, false),array('modifier', 'wm_remove', 'main/search_result.tpl', 9, false),array('modifier', 'escape', 'main/search_result.tpl', 9, false),array('modifier', 'formatprice', 'main/search_result.tpl', 256, false),array('modifier', 'substitute', 'main/search_result.tpl', 433, false),array('function', 'getvar', 'main/search_result.tpl', 235, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page_title.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_products_management'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript">
//<![CDATA[
var txt_delete_products_warning = "<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['txt_delete_products_warning'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";
//]]>
</script>

<br />

<?php if ($this->_tpl_vars['mode'] != 'search' || $this->_tpl_vars['products'] == ""): ?>

<script type="text/javascript" src="<?php echo $this->_tpl_vars['SkinDir']; ?>
/js/reset.js"></script>
<script type="text/javascript">
//<![CDATA[
var searchform_def = [
  ['posted_data[categoryid]', ''],
  ['posted_data[category_main]', true],
  ['posted_data[category_extra]', true],
  ['posted_data[search_in_subcategories]', true],
  ['posted_data[by_title]', true],
  ['posted_data[by_shortdescr]', true],
  ['posted_data[by_fulldescr]', true],
  ['posted_data[by_keywords]', true],
  ['posted_data[price_min]', '<?php echo $this->_tpl_vars['zero']; ?>
'],
  ['posted_data[price_max]', ''],
  ['posted_data[avail_min]', '0'],
  ['posted_data[avail_max]', ''],
  ['posted_data[weight_min]', '<?php echo $this->_tpl_vars['zero']; ?>
'],
  ['posted_data[weight_max]', ''],
  ['posted_data[productcode]', ''],
  ['posted_data[including]', 'all'],
  ['posted_data[is_export]', false],
  ['posted_data[is_modify]', false],
  ['posted_data[productid]', ''],
  ['posted_data[provider]', ''],
  ['posted_data[forsale]', ''],
<?php if ($this->_tpl_vars['usertype'] != 'C' && $this->_tpl_vars['usertype'] != 'B' && $this->_tpl_vars['active_modules']['Feature_Comparison'] && $this->_tpl_vars['fclasses'] != ''): ?>
  ['posted_data[fclassid]', ''],
<?php endif; ?>
  ['posted_data[flag_free_ship]', ''],
  ['posted_data[flag_ship_freight]', ''],
  ['posted_data[flag_global_disc]', ''],
  ['posted_data[flag_free_tax]', ''],
  ['posted_data[flag_min_amount]', ''],
  ['posted_data[flag_low_avail_limit]', ''],
  ['posted_data[flag_list_price]', ''],
<?php if ($this->_tpl_vars['active_modules']['Extra_Fields'] && $this->_tpl_vars['extra_fields'] != ''): ?>
<?php $_from = $this->_tpl_vars['extra_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
    ['posted_data[extra_fields][<?php echo $this->_tpl_vars['v']['fieldid']; ?>
]', false],
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['active_modules']['Manufacturers'] && $this->_tpl_vars['manufacturers'] != '' && $this->_tpl_vars['config']['Search_products']['search_products_manufacturers'] == 'Y'): ?>
    ['posted_data[manufacturers][]', ''],
<?php endif; ?>
  ['posted_data[substring]', '']
];
//]]>
</script>

<?php ob_start(); ?>

<br />

<form name="searchform" action="search.php" method="post">
<input type="hidden" name="mode" value="search" />

<table cellpadding="1" cellspacing="5" width="100%">

<tr>
  <td height="10" width="20%" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_search_for_pattern']; ?>
:</td>
  <td height="10" width="80%">
<input type="text" name="posted_data[substring]" size="30" style="width:70%" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['substring'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
&nbsp;
<input type="submit" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_search'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
  </td>
</tr>

<tr>
<td height="10"></td>
<td>
<table cellpadding="0" cellspacing="0">
<tr>
  <td width="5"><input type="radio" id="including_all" name="posted_data[including]" value="all"<?php if ($this->_tpl_vars['search_prefilled'] == "" || $this->_tpl_vars['search_prefilled']['including'] == '' || $this->_tpl_vars['search_prefilled']['including'] == 'all'): ?> checked="checked"<?php endif; ?> /></td>
  <td nowrap="nowrap"><label for="including_all"><?php echo $this->_tpl_vars['lng']['lbl_all_word']; ?>
</label>&nbsp;&nbsp;</td>

  <td width="5"><input type="radio" id="including_any" name="posted_data[including]" value="any"<?php if ($this->_tpl_vars['search_prefilled']['including'] == 'any'): ?> checked="checked"<?php endif; ?> /></td>
  <td nowrap="nowrap"><label for="including_any"><?php echo $this->_tpl_vars['lng']['lbl_any_word']; ?>
</label>&nbsp;&nbsp;</td>

  <td width="5"><input type="radio" id="including_phrase" name="posted_data[including]" value="phrase"<?php if ($this->_tpl_vars['search_prefilled']['including'] == 'phrase'): ?> checked="checked"<?php endif; ?> /></td>
  <td nowrap="nowrap"><label for="including_phrase"><?php echo $this->_tpl_vars['lng']['lbl_exact_phrase']; ?>
</label></td>
</tr>
</table>
</td>
</tr>

<tr>
  <td height="10" width="20%" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_search_in']; ?>
:</td>
  <td>
<table cellpadding="0" cellspacing="0">
<tr>
  <td width="5"><input type="checkbox" id="posted_data_by_title" name="posted_data[by_title]"<?php if ($this->_tpl_vars['search_prefilled'] == "" || $this->_tpl_vars['search_prefilled']['by_title']): ?> checked="checked"<?php endif; ?> /></td>
  <td nowrap="nowrap"><label for="posted_data_by_title"><?php echo $this->_tpl_vars['lng']['lbl_product_title']; ?>
</label>&nbsp;&nbsp;</td>
  <td width="5"><input type="checkbox" id="posted_data_by_shortdescr" name="posted_data[by_shortdescr]"<?php if ($this->_tpl_vars['search_prefilled'] == "" || $this->_tpl_vars['search_prefilled']['by_shortdescr']): ?> checked="checked"<?php endif; ?> /></td>
  <td nowrap="nowrap"><label for="posted_data_by_shortdescr"><?php echo $this->_tpl_vars['lng']['lbl_short_description']; ?>
</label>&nbsp;&nbsp;</td>
  <td width="5"><input type="checkbox" id="posted_data_by_fulldescr" name="posted_data[by_fulldescr]"<?php if ($this->_tpl_vars['search_prefilled'] == "" || $this->_tpl_vars['search_prefilled']['by_fulldescr']): ?> checked="checked"<?php endif; ?> /></td>
  <td nowrap="nowrap"><label for="posted_data_by_fulldescr"><?php echo $this->_tpl_vars['lng']['lbl_det_description']; ?>
</label>&nbsp;&nbsp;</td>
  <td width="5"><input type="checkbox" id="posted_data_by_keywords" name="posted_data[by_keywords]"<?php if ($this->_tpl_vars['search_prefilled'] == "" || $this->_tpl_vars['search_prefilled']['by_keywords']): ?> checked="checked"<?php endif; ?> /></td>
  <td nowrap="nowrap"><label for="posted_data_by_keywords"><?php echo $this->_tpl_vars['lng']['lbl_keywords']; ?>
</label>&nbsp;&nbsp;</td>
</tr>
</table>
  </td>
</tr>

<?php if ($this->_tpl_vars['active_modules']['Extra_Fields'] && $this->_tpl_vars['extra_fields'] != ''): ?>
<tr>
  <td height="10" width="20%" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_search_also_in']; ?>
:</td>
  <td>
<table cellpadding="0" cellspacing="0">
<?php $_from = $this->_tpl_vars['extra_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
<tr>
  <td width="5"><input type="checkbox" id="posted_data_extra_fields_<?php echo $this->_tpl_vars['v']['fieldid']; ?>
" name="posted_data[extra_fields][<?php echo $this->_tpl_vars['v']['fieldid']; ?>
]"<?php if ($this->_tpl_vars['v']['selected'] == 'Y'): ?> checked="checked"<?php endif; ?> /></td>
  <td><label for="posted_data_extra_fields_<?php echo $this->_tpl_vars['v']['fieldid']; ?>
"><?php echo $this->_tpl_vars['v']['field']; ?>
</label></td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>
  </td>
</tr>
<?php endif; ?>

<tr>
  <td></td>
  <td>
  <hr />
<table cellpadding="0" cellspacing="0">
<tr>
  <td><input type="checkbox" value='Y' id="posted_data_is_modify" name="posted_data[is_modify]" /></td>
  <td>&nbsp;</td>
  <td height="10" class="FormButton" nowrap="nowrap"><label for="posted_data_is_modify"><?php echo $this->_tpl_vars['lng']['lbl_search_and_modify']; ?>
</label></td>
</tr>
</table>
  </td>
</tr>

<tr> 
  <td></td>
  <td>
<table cellpadding="0" cellspacing="0">
<tr>
  <td><input type="checkbox" id="posted_data_is_export" name="posted_data[is_export]" value="Y" /></td>
  <td>&nbsp;</td>
  <td class="FormButton" nowrap="nowrap"><label for="posted_data_is_export"><?php echo $this->_tpl_vars['lng']['lbl_search_and_export']; ?>
</label></td>
</tr>
</table>
  </td>
</tr>

</table>

<br />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/visiblebox_link.tpl", 'smarty_include_vars' => array('no_use_class' => 'Y','mark' => '1','title' => $this->_tpl_vars['lng']['lbl_advanced_search_options'],'extra' => ' width="100%"')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<br />

<table cellpadding="0" cellspacing="0" width="100%" style="display: none;" id="box1">
<tr>
  <td>

<table cellpadding="1" cellspacing="5" width="100%">

<tr>
  <td height="10" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_search_in_category']; ?>
:</td>
  <td height="10">
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/category_selector.tpl", 'smarty_include_vars' => array('extra' => ' style="width: 70%;"','field' => "posted_data[categoryid]",'display_empty' => 'E','categoryid' => $this->_tpl_vars['search_prefilled']['categoryid'],'allcategories' => $this->_tpl_vars['search_categories'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </td>
</tr>

<tr>
  <td width="10" height="10">&nbsp;</td>
  <td height="10">
<table cellpadding="0" cellspacing="0">
<tr>
  <td width="5" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_as']; ?>
&nbsp;&nbsp;</td>
  <td width="5"><input type="checkbox" id="posted_data_category_main" name="posted_data[category_main]"<?php if ($this->_tpl_vars['search_prefilled'] == "" || $this->_tpl_vars['search_prefilled']['category_main']): ?> checked="checked"<?php endif; ?> /></td>
  <td nowrap="nowrap"><label for="posted_data_category_main"><?php echo $this->_tpl_vars['lng']['lbl_main_category']; ?>
</label>&nbsp;&nbsp;</td>
  <td width="5"><input type="checkbox" id="posted_data_category_extra" name="posted_data[category_extra]"<?php if ($this->_tpl_vars['search_prefilled'] == "" || $this->_tpl_vars['search_prefilled']['category_extra']): ?> checked="checked"<?php endif; ?> /></td>
  <td nowrap="nowrap"><label for="posted_data_category_extra"><?php echo $this->_tpl_vars['lng']['lbl_additional_category']; ?>
</label></td>
</tr>
</table>
  </td>
</tr>

<tr>
  <td width="10" height="10">&nbsp;</td>
  <td height="10">
<table cellpadding="0" cellspacing="0">
<tr>
  <td width="5"><input type="checkbox" id="posted_data_search_in_subcategories" name="posted_data[search_in_subcategories]"<?php if ($this->_tpl_vars['search_prefilled'] == "" || $this->_tpl_vars['search_prefilled']['search_in_subcategories']): ?> checked="checked"<?php endif; ?> /></td>
  <td nowrap="nowrap"><label for="posted_data_search_in_subcategories"><?php echo $this->_tpl_vars['lng']['lbl_search_in_subcategories']; ?>
</label></td>
</tr>
</table>
  </td>
</tr>

<?php if ($this->_tpl_vars['active_modules']['Manufacturers'] && $this->_tpl_vars['manufacturers'] != ''): ?>
<?php ob_start(); ?>
<?php unset($this->_sections['mnf']);
$this->_sections['mnf']['name'] = 'mnf';
$this->_sections['mnf']['loop'] = is_array($_loop=$this->_tpl_vars['manufacturers']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['mnf']['show'] = true;
$this->_sections['mnf']['max'] = $this->_sections['mnf']['loop'];
$this->_sections['mnf']['step'] = 1;
$this->_sections['mnf']['start'] = $this->_sections['mnf']['step'] > 0 ? 0 : $this->_sections['mnf']['loop']-1;
if ($this->_sections['mnf']['show']) {
    $this->_sections['mnf']['total'] = $this->_sections['mnf']['loop'];
    if ($this->_sections['mnf']['total'] == 0)
        $this->_sections['mnf']['show'] = false;
} else
    $this->_sections['mnf']['total'] = 0;
if ($this->_sections['mnf']['show']):

            for ($this->_sections['mnf']['index'] = $this->_sections['mnf']['start'], $this->_sections['mnf']['iteration'] = 1;
                 $this->_sections['mnf']['iteration'] <= $this->_sections['mnf']['total'];
                 $this->_sections['mnf']['index'] += $this->_sections['mnf']['step'], $this->_sections['mnf']['iteration']++):
$this->_sections['mnf']['rownum'] = $this->_sections['mnf']['iteration'];
$this->_sections['mnf']['index_prev'] = $this->_sections['mnf']['index'] - $this->_sections['mnf']['step'];
$this->_sections['mnf']['index_next'] = $this->_sections['mnf']['index'] + $this->_sections['mnf']['step'];
$this->_sections['mnf']['first']      = ($this->_sections['mnf']['iteration'] == 1);
$this->_sections['mnf']['last']       = ($this->_sections['mnf']['iteration'] == $this->_sections['mnf']['total']);
?>
    <option value="<?php echo $this->_tpl_vars['manufacturers'][$this->_sections['mnf']['index']]['manufacturerid']; ?>
"<?php if ($this->_tpl_vars['manufacturers'][$this->_sections['mnf']['index']]['selected'] == 'Y'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['manufacturers'][$this->_sections['mnf']['index']]['manufacturer']; ?>
</option>
<?php endfor; endif; ?>
<?php $this->_smarty_vars['capture']['manufacturers_items'] = ob_get_contents(); ob_end_clean(); ?>
<tr>
  <td height="10" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_manufacturers']; ?>
:</td>
  <td height="10">
  <select name="posted_data[manufacturers][]" style="width: 70%;" multiple="multiple" size="<?php if ($this->_sections['mnf']['total'] > 5): ?>5<?php else: ?><?php echo $this->_sections['mnf']['total']; ?>
<?php endif; ?>">
<?php echo $this->_smarty_vars['capture']['manufacturers_items']; ?>

  </select>
  </td>
</tr>
<?php endif; ?>

<tr>
  <td height="10" width="20%" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_sku']; ?>
:</td>
  <td height="10" width="80%"><input type="text" maxlength="64" name="posted_data[productcode]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['productcode'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" style="width:70%" /></td>
</tr>

<tr>
  <td height="10" width="20%" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_productid']; ?>
#:</td>
  <td height="10" width="80%"><input type="text" maxlength="64" name="posted_data[productid]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['productid'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" style="width:70%" /></td>
</tr>

<?php if ($this->_tpl_vars['usertype'] == 'A'): ?>
<?php echo smarty_function_getvar(array('var' => 'providers','func' => 'func_get_providers'), $this);?>

<?php if ($this->_tpl_vars['providers']): ?>
<tr>
  <td height="10" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_provider']; ?>
:</td>
  <td height="10">
    <select name="posted_data[provider]" style="width: 70%;">
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
" <?php if ($this->_tpl_vars['search_prefilled']['provider'] == $this->_tpl_vars['providers'][$this->_sections['prov']['index']]['id']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['providers'][$this->_sections['prov']['index']]['login']; ?>
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
  <td height="10" width="20%" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_price']; ?>
 (<?php echo $this->_tpl_vars['config']['General']['currency_symbol']; ?>
):</td>
  <td height="10" width="80%">
<table cellpadding="0" cellspacing="0">
<tr>
  <td><input type="text" size="10" maxlength="15" name="posted_data[price_min]" value="<?php if ($this->_tpl_vars['search_prefilled'] == ""): ?><?php echo $this->_tpl_vars['zero']; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['price_min'])) ? $this->_run_mod_handler('formatprice', true, $_tmp) : smarty_modifier_formatprice($_tmp)); ?>
<?php endif; ?>" /></td>
  <td>&nbsp;-&nbsp;</td>
  <td><input type="text" size="10" maxlength="15" name="posted_data[price_max]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['price_max'])) ? $this->_run_mod_handler('formatprice', true, $_tmp) : smarty_modifier_formatprice($_tmp)); ?>
" /></td>
</tr>
</table>
  </td>
</tr>

<tr>
  <td height="10" width="20%" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_quantity']; ?>
:</td>
  <td height="10" width="80%">
<table cellpadding="0" cellspacing="0">
<tr>
  <td><input type="text" size="10" maxlength="10" name="posted_data[avail_min]" value="<?php if ($this->_tpl_vars['search_prefilled'] == ""): ?>0<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['avail_min'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>" /></td>
  <td>&nbsp;-&nbsp;</td>
  <td><input type="text" size="10" maxlength="10" name="posted_data[avail_max]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['avail_max'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
</tr>
</table>
  </td>
</tr>

<tr>
  <td height="10" width="20%" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_weight']; ?>
 (<?php echo $this->_tpl_vars['config']['General']['weight_symbol']; ?>
):</td>
  <td height="10" width="80%">
<table cellpadding="0" cellspacing="0">
<tr>
  <td><input type="text" size="10" maxlength="10" name="posted_data[weight_min]" value="<?php if ($this->_tpl_vars['search_prefilled'] == ""): ?><?php echo $this->_tpl_vars['zero']; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['weight_min'])) ? $this->_run_mod_handler('formatprice', true, $_tmp) : smarty_modifier_formatprice($_tmp)); ?>
<?php endif; ?>" /></td>
  <td>&nbsp;-&nbsp;</td>
  <td><input type="text" size="10" maxlength="10" name="posted_data[weight_max]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['weight_max'])) ? $this->_run_mod_handler('formatprice', true, $_tmp) : smarty_modifier_formatprice($_tmp)); ?>
" /></td>
</tr>
</table>
  </td>
</tr>

<tr>
  <td height="10" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_availability']; ?>
:</td>
  <td height="10">
  <select name="posted_data[forsale]" style="width:70%">
    <option value="">&nbsp;</option>
    <option value="Y"<?php if ($this->_tpl_vars['search_prefilled']['forsale'] == 'Y'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_avail_for_sale']; ?>
</option>
    <option value="H"<?php if ($this->_tpl_vars['product']['forsale'] == 'H'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_hidden']; ?>
</option>
    <option value="N"<?php if ($this->_tpl_vars['search_prefilled']['forsale'] == 'N'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_disabled']; ?>
</option>
<?php if ($this->_tpl_vars['active_modules']['Product_Configurator']): ?>
    <option value="B"<?php if ($this->_tpl_vars['search_prefilled']['forsale'] == 'B'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_bundled']; ?>
</option>
<?php endif; ?>
  </select>
  </td>
</tr>

<?php if ($this->_tpl_vars['usertype'] != 'C' && $this->_tpl_vars['usertype'] != 'B' && $this->_tpl_vars['active_modules']['Feature_Comparison'] && $this->_tpl_vars['fclasses'] != ''): ?>
<tr>
  <td height="10" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_product_feature_classes']; ?>
:</td>
  <td height="10">
  <select name="posted_data[fclassid]" style="width:70%">
    <option value="">&nbsp;</option>
<?php $_from = $this->_tpl_vars['fclasses']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
    <option value="<?php echo $this->_tpl_vars['v']['fclassid']; ?>
"<?php if ($this->_tpl_vars['search_prefilled']['fclassid'] == $this->_tpl_vars['v']['fclassid']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['v']['class']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
  </select>
  </td>
</tr>
<?php endif; ?>

<tr>
  <td class="FormButton"><?php echo $this->_tpl_vars['lng']['lbl_free_shipping']; ?>
:&nbsp;</td>
  <td>
    <select name="posted_data[flag_free_ship]">
      <option value="">&nbsp;</option>
      <option value="Y"<?php if ($this->_tpl_vars['search_prefilled']['flag_free_ship'] == 'Y'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_assigned']; ?>
</option>
      <option value="N"<?php if ($this->_tpl_vars['search_prefilled']['flag_free_ship'] == 'N'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_not_assigned']; ?>
</option>
    </select>
  </td>
  </tr>
  <tr>
    <td class="FormButton"><?php echo $this->_tpl_vars['lng']['lbl_global_discounts']; ?>
:&nbsp;</td>
    <td>
      <select name="posted_data[flag_global_disc]">
        <option value="">&nbsp;</option>
        <option value="Y"<?php if ($this->_tpl_vars['search_prefilled']['flag_global_disc'] == 'Y'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_assigned']; ?>
</option>
        <option value="N"<?php if ($this->_tpl_vars['search_prefilled']['flag_global_disc'] == 'N'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_not_assigned']; ?>
</option>
      </select>
    </td>
  </tr>
  <tr>
    <td class="FormButton"><?php echo $this->_tpl_vars['lng']['lbl_min_order_amount']; ?>
:&nbsp;</td>
    <td>
      <select name="posted_data[flag_min_amount]">
        <option value="">&nbsp;</option>
        <option value="Y"<?php if ($this->_tpl_vars['search_prefilled']['flag_min_amount'] == 'Y'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_assigned']; ?>
</option>
        <option value="N"<?php if ($this->_tpl_vars['search_prefilled']['flag_min_amount'] == 'N'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_not_assigned']; ?>
</option>
      </select>
    </td>
  </tr>
  <tr>
    <td class="FormButton"><?php echo $this->_tpl_vars['lng']['lbl_list_price']; ?>
:&nbsp;</td>
    <td>
      <select name="posted_data[flag_list_price]">
        <option value="">&nbsp;</option>
        <option value="Y"<?php if ($this->_tpl_vars['search_prefilled']['flag_list_price'] == 'Y'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_assigned']; ?>
</option>
        <option value="N"<?php if ($this->_tpl_vars['search_prefilled']['flag_list_price'] == 'N'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_not_assigned']; ?>
</option>
      </select>
    </td>
  </tr>
  <tr>
    <td class="FormButton"><?php echo $this->_tpl_vars['lng']['lbl_shipping_freight']; ?>
:&nbsp;</td>
    <td>
      <select name="posted_data[flag_ship_freight]">
        <option value="">&nbsp;</option>
        <option value="Y"<?php if ($this->_tpl_vars['search_prefilled']['flag_ship_freight'] == 'Y'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_assigned']; ?>
</option>
        <option value="N"<?php if ($this->_tpl_vars['search_prefilled']['flag_ship_freight'] == 'N'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_not_assigned']; ?>
</option>
      </select>
    </td>
  </tr>
  <tr>
    <td class="FormButton"><?php echo $this->_tpl_vars['lng']['lbl_tax_exempt']; ?>
:&nbsp;</td>
    <td>
      <select name="posted_data[flag_free_tax]">
        <option value="">&nbsp;</option>
        <option value="Y"<?php if ($this->_tpl_vars['search_prefilled']['flag_free_tax'] == 'Y'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_assigned']; ?>
</option>
        <option value="N"<?php if ($this->_tpl_vars['search_prefilled']['flag_free_tax'] == 'N'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_not_assigned']; ?>
</option>
      </select>
    </td>
  </tr>
  <tr>
    <td class="FormButton"><?php echo $this->_tpl_vars['lng']['lbl_lowlimit_in_stock']; ?>
:&nbsp;</td>
    <td>
      <select name="posted_data[flag_low_avail_limit]">
        <option value="">&nbsp;</option>
        <option value="Y"<?php if ($this->_tpl_vars['search_prefilled']['flag_low_avail_limit'] == 'Y'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_assigned']; ?>
</option>
        <option value="N"<?php if ($this->_tpl_vars['search_prefilled']['flag_low_avail_limit'] == 'N'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_not_assigned']; ?>
</option>
      </select>
    </td>
  </tr>

</table>

  </td>
</tr>

</table>

<table cellpadding="1" cellspacing="5" width="100%">
  <tr>
    <td class="FormButton normal" width="20%">
      <a href="javascript:void(0);" onclick="javascript: reset_form('searchform', searchform_def);" class="underline"><?php echo $this->_tpl_vars['lng']['lbl_reset_filter']; ?>
</a>
    </td>
    <td class="main-button">
      <input type="submit" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_search'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
    </td>
  </tr>
</table>

</form>

<?php if ($this->_tpl_vars['search_prefilled']['need_advanced_options']): ?>
<script type="text/javascript" language="JavaScript 1.2">
//<![CDATA[
visibleBox('1');
//]]>
</script>
<?php endif; ?>

<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_search_products'],'content' => $this->_smarty_vars['capture']['dialog'],'extra' => 'width="100%"')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<br />

<!-- SEARCH FORM DIALOG END -->

<?php endif; ?>

<!-- SEARCH RESULTS SUMMARY -->

<a name="results"></a>

<?php if ($this->_tpl_vars['mode'] == 'search'): ?>
<?php if ($this->_tpl_vars['total_items'] > '1'): ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['txt_N_results_found'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'items', $this->_tpl_vars['total_items']) : smarty_modifier_substitute($_tmp, 'items', $this->_tpl_vars['total_items'])); ?>
<br />
<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['txt_displaying_X_Y_results'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'first_item', $this->_tpl_vars['first_item'], 'last_item', $this->_tpl_vars['last_item']) : smarty_modifier_substitute($_tmp, 'first_item', $this->_tpl_vars['first_item'], 'last_item', $this->_tpl_vars['last_item'])); ?>

<?php elseif ($this->_tpl_vars['total_items'] == '0'): ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['txt_N_results_found'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'items', 0) : smarty_modifier_substitute($_tmp, 'items', 0)); ?>

<?php endif; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['mode'] == 'search' && $this->_tpl_vars['products'] != ""): ?>

<!-- SEARCH RESULTS START -->

<br /><br />

<?php ob_start(); ?>

<div align="right"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_search_again'],'href' => "search.php")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>

<?php if ($this->_tpl_vars['total_pages'] > 2): ?>
<?php $this->assign('navpage', $this->_tpl_vars['navigation_page']); ?>
<?php endif; ?>

<form action="process_product.php" method="post" name="processproductform">
<input type="hidden" name="mode" value="update" />
<input type="hidden" name="navpage" value="<?php echo $this->_tpl_vars['navpage']; ?>
" />

<table cellpadding="0" cellspacing="0" width="100%">

<tr>
  <td>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/navigation.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/products.tpl", 'smarty_include_vars' => array('products' => $this->_tpl_vars['products'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<br />

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/navigation.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<br />

<div class="main-button">
  <input type="submit" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_update'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
</div>
<br /><br />
<input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_modify_selected'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: if (checkMarks(this.form, new RegExp('productids\[[0-9]+\]', 'gi'))) { document.processproductform.action='product_modify.php'; submitForm(document.processproductform, 'list'); }" />
&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_delete_selected'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: if (checkMarks(this.form, new RegExp('productids\[[0-9]+\]', 'gi')) &amp;&amp; confirm(txt_delete_products_warning)) submitForm(document.processproductform, 'delete');" />
&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_export_selected'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: if (checkMarks(this.form, new RegExp('productids\[[0-9]+\]', 'gi'))) submitForm(document.processproductform, 'export');" />
&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_export_all_found'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: self.location='search.php?mode=search&amp;export=export_found';" />

<br /><br /><br />

<?php echo $this->_tpl_vars['lng']['txt_operation_for_first_selected_only']; ?>


<br /><br />

<input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_preview_product'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: if (checkMarks(this.form, new RegExp('productids\[[0-9]+\]', 'gi'))) submitForm(document.processproductform, 'details');" />
&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_clone_product'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: if (checkMarks(this.form, new RegExp('productids\[[0-9]+\]', 'gi'))) submitForm(document.processproductform, 'clone');" />
&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_generate_html_links'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: if (checkMarks(this.form, new RegExp('productids\[[0-9]+\]', 'gi'))) submitForm(document.processproductform, 'links');" />

  </td>
</tr>

</table>
</form>

<br />

<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_search_results'],'content' => $this->_smarty_vars['capture']['dialog'],'extra' => 'width="100%"')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php endif; ?>

<br /><br />