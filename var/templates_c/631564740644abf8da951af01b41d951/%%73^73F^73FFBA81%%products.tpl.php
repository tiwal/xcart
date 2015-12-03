<?php /* Smarty version 2.6.26, created on 2015-12-02 18:05:46
         compiled from main/products.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'wm_remove', 'main/products.tpl', 11, false),array('modifier', 'escape', 'main/products.tpl', 11, false),array('modifier', 'amp', 'main/products.tpl', 36, false),array('modifier', 'formatprice', 'main/products.tpl', 61, false),array('function', 'cycle', 'main/products.tpl', 47, false),)), $this); ?>
<?php if ($this->_tpl_vars['products'] != ""): ?>
<br />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/check_all_row.tpl", 'smarty_include_vars' => array('style' => "line-height: 170%;",'form' => 'processproductform','prefix' => 'productids')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<br />
<script type="text/javascript">
//<![CDATA[
var txt_pvariant_edit_note_list = "<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['txt_pvariant_edit_note_list'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";

<?php echo '
function pvAlert(obj) {
  if (obj.pvAlertFlag)
    return false;

  alert(txt_pvariant_edit_note_list);
  obj.pvAlertFlag = true;
  return true;
}
'; ?>

//]]>
</script>

<table cellpadding="2" cellspacing="1" width="100%">

<?php if ($this->_tpl_vars['main'] == 'category_products'): ?>
<?php $this->assign('url_to', "category_products.php?cat=".($this->_tpl_vars['cat'])."&amp;page=".($this->_tpl_vars['navpage'])); ?>
<?php else: ?>
<?php $this->assign('url_to', "search.php?mode=search&amp;page=".($this->_tpl_vars['navpage'])); ?>
<?php endif; ?>

<tr class="TableHead">
  <td width="5">&nbsp;</td>
  <td nowrap="nowrap"><?php if ($this->_tpl_vars['search_prefilled']['sort_field'] == 'productcode'): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/sort_pointer.tpl", 'smarty_include_vars' => array('dir' => $this->_tpl_vars['search_prefilled']['sort_direction'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>&nbsp;<?php endif; ?><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['url_to'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
&amp;sort=productcode&amp;sort_direction=<?php if ($this->_tpl_vars['search_prefilled']['sort_field'] == 'productcode'): ?><?php if ($this->_tpl_vars['search_prefilled']['sort_direction'] == 1): ?>0<?php else: ?>1<?php endif; ?><?php else: ?><?php echo $this->_tpl_vars['search_prefilled']['sort_direction']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['lng']['lbl_sku']; ?>
</a></td>
  <td width="100%" nowrap="nowrap"><?php if ($this->_tpl_vars['search_prefilled']['sort_field'] == 'title'): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/sort_pointer.tpl", 'smarty_include_vars' => array('dir' => $this->_tpl_vars['search_prefilled']['sort_direction'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>&nbsp;<?php endif; ?><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['url_to'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
&amp;sort=title&amp;sort_direction=<?php if ($this->_tpl_vars['search_prefilled']['sort_field'] == 'title'): ?><?php if ($this->_tpl_vars['search_prefilled']['sort_direction'] == 1): ?>0<?php else: ?>1<?php endif; ?><?php else: ?><?php echo $this->_tpl_vars['search_prefilled']['sort_direction']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['lng']['lbl_product']; ?>
</a></td>
<?php if ($this->_tpl_vars['main'] == 'category_products'): ?>
  <td nowrap="nowrap"><?php if ($this->_tpl_vars['search_prefilled']['sort_field'] == 'orderby'): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/sort_pointer.tpl", 'smarty_include_vars' => array('dir' => $this->_tpl_vars['search_prefilled']['sort_direction'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>&nbsp;<?php endif; ?><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['url_to'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
&amp;sort=orderby&amp;sort_direction=<?php if ($this->_tpl_vars['search_prefilled']['sort_field'] == 'orderby'): ?><?php if ($this->_tpl_vars['search_prefilled']['sort_direction'] == 1): ?>0<?php else: ?>1<?php endif; ?><?php else: ?><?php echo $this->_tpl_vars['search_prefilled']['sort_direction']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['lng']['lbl_pos']; ?>
</a></td>
<?php endif; ?>
  <td nowrap="nowrap"><?php if ($this->_tpl_vars['search_prefilled']['sort_field'] == 'quantity'): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/sort_pointer.tpl", 'smarty_include_vars' => array('dir' => $this->_tpl_vars['search_prefilled']['sort_direction'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>&nbsp;<?php endif; ?><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['url_to'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
&amp;sort=quantity&amp;sort_direction=<?php if ($this->_tpl_vars['search_prefilled']['sort_field'] == 'quantity'): ?><?php if ($this->_tpl_vars['search_prefilled']['sort_direction'] == 1): ?>0<?php else: ?>1<?php endif; ?><?php else: ?><?php echo $this->_tpl_vars['search_prefilled']['sort_direction']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['lng']['lbl_in_stock']; ?>
</a></td>
  <td nowrap="nowrap"><?php if ($this->_tpl_vars['search_prefilled']['sort_field'] == 'price'): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/sort_pointer.tpl", 'smarty_include_vars' => array('dir' => $this->_tpl_vars['search_prefilled']['sort_direction'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>&nbsp;<?php endif; ?><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['url_to'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
&amp;sort=price&amp;sort_direction=<?php if ($this->_tpl_vars['search_prefilled']['sort_field'] == 'price'): ?><?php if ($this->_tpl_vars['search_prefilled']['sort_direction'] == 1): ?>0<?php else: ?>1<?php endif; ?><?php else: ?><?php echo $this->_tpl_vars['search_prefilled']['sort_direction']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['lng']['lbl_price']; ?>
 (<?php echo $this->_tpl_vars['config']['General']['currency_symbol']; ?>
)</a></td>
</tr>

<?php unset($this->_sections['prod']);
$this->_sections['prod']['name'] = 'prod';
$this->_sections['prod']['loop'] = is_array($_loop=$this->_tpl_vars['products']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['prod']['show'] = true;
$this->_sections['prod']['max'] = $this->_sections['prod']['loop'];
$this->_sections['prod']['step'] = 1;
$this->_sections['prod']['start'] = $this->_sections['prod']['step'] > 0 ? 0 : $this->_sections['prod']['loop']-1;
if ($this->_sections['prod']['show']) {
    $this->_sections['prod']['total'] = $this->_sections['prod']['loop'];
    if ($this->_sections['prod']['total'] == 0)
        $this->_sections['prod']['show'] = false;
} else
    $this->_sections['prod']['total'] = 0;
if ($this->_sections['prod']['show']):

            for ($this->_sections['prod']['index'] = $this->_sections['prod']['start'], $this->_sections['prod']['iteration'] = 1;
                 $this->_sections['prod']['iteration'] <= $this->_sections['prod']['total'];
                 $this->_sections['prod']['index'] += $this->_sections['prod']['step'], $this->_sections['prod']['iteration']++):
$this->_sections['prod']['rownum'] = $this->_sections['prod']['iteration'];
$this->_sections['prod']['index_prev'] = $this->_sections['prod']['index'] - $this->_sections['prod']['step'];
$this->_sections['prod']['index_next'] = $this->_sections['prod']['index'] + $this->_sections['prod']['step'];
$this->_sections['prod']['first']      = ($this->_sections['prod']['iteration'] == 1);
$this->_sections['prod']['last']       = ($this->_sections['prod']['iteration'] == $this->_sections['prod']['total']);
?>

<tr<?php echo smarty_function_cycle(array('values' => ', class="TableSubHead"'), $this);?>
>
  <td width="5"><input type="checkbox" name="productids[<?php echo $this->_tpl_vars['products'][$this->_sections['prod']['index']]['productid']; ?>
]" /></td>
  <td><a href="product_modify.php?productid=<?php echo $this->_tpl_vars['products'][$this->_sections['prod']['index']]['productid']; ?>
<?php if ($this->_tpl_vars['navpage']): ?>&amp;page=<?php echo $this->_tpl_vars['navpage']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['products'][$this->_sections['prod']['index']]['productcode']; ?>
</a></td>
  <td width="100%"><?php if ($this->_tpl_vars['products'][$this->_sections['prod']['index']]['main'] == 'Y' || $this->_tpl_vars['main'] != 'category_products'): ?><b><?php endif; ?><a href="product_modify.php?productid=<?php echo $this->_tpl_vars['products'][$this->_sections['prod']['index']]['productid']; ?>
<?php if ($this->_tpl_vars['navpage']): ?>&amp;page=<?php echo $this->_tpl_vars['navpage']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['products'][$this->_sections['prod']['index']]['product']; ?>
</a><?php if ($this->_tpl_vars['products'][$this->_sections['prod']['index']]['main'] == 'Y' || $this->_tpl_vars['main'] != 'category_products'): ?></b><?php endif; ?></td>
<?php if ($this->_tpl_vars['main'] == 'category_products'): ?>
  <td><input type="text" size="9" maxlength="10" name="posted_data[<?php echo $this->_tpl_vars['products'][$this->_sections['prod']['index']]['productid']; ?>
][orderby]" value="<?php echo $this->_tpl_vars['products'][$this->_sections['prod']['index']]['orderby']; ?>
" /></td>
<?php endif; ?>
  <td align="center">
<?php if ($this->_tpl_vars['products'][$this->_sections['prod']['index']]['product_type'] != 'C'): ?>
<input type="text" size="9" maxlength="10" name="posted_data[<?php echo $this->_tpl_vars['products'][$this->_sections['prod']['index']]['productid']; ?>
][avail]" value="<?php echo $this->_tpl_vars['products'][$this->_sections['prod']['index']]['avail']; ?>
"<?php if ($this->_tpl_vars['products'][$this->_sections['prod']['index']]['is_variants'] == 'Y'): ?> readonly="readonly" onclick="javascript: pvAlert(this);"<?php endif; ?> />
<?php endif; ?>
  </td>
  <td>
<?php if ($this->_tpl_vars['products'][$this->_sections['prod']['index']]['product_type'] != 'C'): ?>
<input type="text" size="9" maxlength="15" name="posted_data[<?php echo $this->_tpl_vars['products'][$this->_sections['prod']['index']]['productid']; ?>
][price]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['products'][$this->_sections['prod']['index']]['price'])) ? $this->_run_mod_handler('formatprice', true, $_tmp) : smarty_modifier_formatprice($_tmp)); ?>
"<?php if ($this->_tpl_vars['products'][$this->_sections['prod']['index']]['is_variants'] == 'Y'): ?> readonly="readonly" onclick="javascript: pvAlert(this);"<?php endif; ?> />
<?php endif; ?>
  </td>

</tr>

<?php endfor; endif; ?>

</table>
<?php endif; ?>