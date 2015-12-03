<?php /* Smarty version 2.6.26, created on 2015-12-02 18:51:08
         compiled from main/orders.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'wm_remove', 'main/orders.tpl', 29, false),array('modifier', 'escape', 'main/orders.tpl', 29, false),array('modifier', 'strip_tags', 'main/orders.tpl', 29, false),array('modifier', 'date_format', 'main/orders.tpl', 32, false),array('modifier', 'default', 'main/orders.tpl', 133, false),array('modifier', 'formatprice', 'main/orders.tpl', 192, false),array('modifier', 'trademark', 'main/orders.tpl', 220, false),array('modifier', 'substitute', 'main/orders.tpl', 473, false),array('function', 'getvar', 'main/orders.tpl', 237, false),)), $this); ?>
<?php if ($this->webmaster_mode) { ?><div id="common_files0main0orders.tpl" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?><?php func_load_lang($this, "main/orders.tpl","lbl_orders_management,txt_adm_search_orders_result_header,txt_search_orders_header,txt_search_orders_header,txt_search_orders_header,txt_delete_orders_warning,txt_search_orders_text,lbl_date_period,lbl_all_dates,lbl_this_month,lbl_this_week,lbl_today,lbl_from,lbl_to,lbl_search_and_export,lbl_advanced_search_options,lbl_order_id,lbl_order_total,lbl_payment_method,lbl_delivery,txt_shipping_methods_is_empty,lbl_order_status,lbl_provider,lbl_all,lbl_order_features,lbl_entirely_or_partially_payed_by_gc,lbl_global_discount_applied,lbl_discount_coupon_applied,lbl_free_shipping,lbl_tax_exempt,lbl_gc_purchased,lbl_orders_with_notes_assigned,lbl_hold_ctrl_key,lbl_search_for_pattern,lbl_search_in,lbl_product_title,lbl_options,lbl_sku,lbl_productid,lbl_price,lbl_customer,lbl_search_in,lbl_username,lbl_first_name,lbl_last_name,lbl_company,lbl_search_by_address,lbl_ignore_address,lbl_billing,lbl_shipping,lbl_both,lbl_city,lbl_state,lbl_country,lbl_please_select_one,lbl_zip_code,lbl_phone,lbl_fax,lbl_email,lbl_one_return_customer,lbl_all,lbl_one_customer,lbl_return_customer,lbl_reset_filter,lbl_search,lbl_search_orders,txt_N_results_found,txt_displaying_X_Y_results,txt_N_results_found,txt_delete_export_all_orders_note_admin,txt_delete_export_all_orders_note_provider,lbl_export_file_format,lbl_standart,lbl_40x_compatible,lbl_with_tab_delimiter,lbl_40x_compatible,lbl_with_semicolon_delimiter,lbl_40x_compatible,lbl_with_comma_delimiter,lbl_export_all,lbl_delete_all_orders,lbl_export_delete_orders,lbl_export_orders"); ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page_title.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_orders_management'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<br />

<?php if ($this->_tpl_vars['orders'] != ""): ?>
<?php if ($this->_tpl_vars['is_admin_user']): ?>
<?php echo $this->_tpl_vars['lng']['txt_adm_search_orders_result_header']; ?>

<?php elseif ($this->_tpl_vars['usertype'] == 'P'): ?>
<?php echo $this->_tpl_vars['lng']['txt_search_orders_header']; ?>

<?php elseif ($this->_tpl_vars['usertype'] == 'C'): ?>
<?php echo $this->_tpl_vars['lng']['txt_search_orders_header']; ?>

<?php endif; ?>
<?php else: ?>
<?php echo $this->_tpl_vars['lng']['txt_search_orders_header']; ?>

<?php endif; ?>
<br />

<?php if ($this->_tpl_vars['mode'] != 'search' || $this->_tpl_vars['orders'] == ""): ?>

<br /><br />

<script type="text/javascript" src="<?php echo $this->_tpl_vars['SkinDir']; ?>
/js/reset.js"></script>
<script type="text/javascript">
//<![CDATA[
var txt_delete_orders_warning = "<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['txt_delete_orders_warning'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
";
var searchform_def = [
  ['posted_data[date_period]', true],
  ['f_start_date', '<?php echo ((is_array($_tmp=XC_TIME)) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['config']['Appearance']['date_format']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['config']['Appearance']['date_format'])); ?>
'],
  ['f_end_date', '<?php echo ((is_array($_tmp=XC_TIME)) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['config']['Appearance']['date_format']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['config']['Appearance']['date_format'])); ?>
'],
  ['StartYear', '<?php echo ((is_array($_tmp=XC_TIME)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
'],
  ['EndDay', '<?php echo ((is_array($_tmp=XC_TIME)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d") : smarty_modifier_date_format($_tmp, "%d")); ?>
'],
  ['EndMonth', '<?php echo ((is_array($_tmp=XC_TIME)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m") : smarty_modifier_date_format($_tmp, "%m")); ?>
'],
  ['EndYear', '<?php echo ((is_array($_tmp=XC_TIME)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
'],
  ['posted_data[total_min]', '<?php echo $this->_tpl_vars['zero']; ?>
'],
  ['posted_data[total_max]', ''],
  ['posted_data[by_title]', true],
  ['posted_data[by_options]', true],
  ['posted_data[price_min]', '<?php echo $this->_tpl_vars['zero']; ?>
'],
  ['posted_data[price_max]', ''],
  ['posted_data[address_type]', ''],
  ['posted_data[is_export]', ''],
  ['posted_data[orderid1]', ''],
  ['posted_data[orderid2]', ''],
  ['posted_data[paymentid]', ''],
  ['posted_data[product_substring]', ''],
  ['posted_data[features][]', ''],
  ['posted_data[provider]', ''],
  ['posted_data[shipping_method]', ''],
  ['posted_data[productcode]', ''],
  ['posted_data[productid]', ''],
  ['posted_data[customer]', ''],
  ['posted_data[by_username]', true],
  ['posted_data[by_firstname]', true],
  ['posted_data[by_lastname]', true],
  ['posted_data[company]', ''],
  ['posted_data[city]', ''],
  ['posted_data[state]', ''],
  ['posted_data[country]', ''],
  ['posted_data[zipcode]', ''],
  ['posted_data[phone]', ''],
  ['posted_data[email]', ''],
  ['posted_data[one_return_customer]', ''],
  ['posted_data[status]', '']
];
<?php echo '
function managedate(type, status) {
  if (type != \'date\')
    var fields = [\'posted_data[city]\',\'posted_data[state]\',\'posted_data[country]\',\'posted_data[zipcode]\',\'posted_data[phone]\'];
  else
    var fields = [\'f_start_date\', \'f_end_date\'];
  
  for (i in fields) {
    if (document.searchform.elements[fields[i]]) {
      if (status) {
        $(document.searchform.elements[fields[i]]).prop("disabled", true).addClass(\'ui-state-disabled\' );
      } else {
        $(document.searchform.elements[fields[i]]).prop("disabled", false).removeClass(\'ui-state-disabled\' );
      }
    }
  }
}
'; ?>

//]]>
</script>

<?php ob_start(); ?>
<a name="SearchOrders"></a>
<form name="searchform" action="orders.php" method="post">
<input type="hidden" name="mode" value="" />

<table cellpadding="1" cellspacing="5" width="100%">

<tr>
  <td colspan="2">
<?php echo $this->_tpl_vars['lng']['txt_search_orders_text']; ?>

<br /><br />
  </td>
</tr>

<tr>
  <td height="10" width="20%" class="FormButton" nowrap="nowrap" valign="top"><?php echo $this->_tpl_vars['lng']['lbl_date_period']; ?>
:</td>
  <td>

<table cellpadding="2" cellspacing="2">

<tr>
  <td width="5"><input type="radio" id="date_period_null" name="posted_data[date_period]" value=""<?php if ($this->_tpl_vars['search_prefilled'] == "" || $this->_tpl_vars['search_prefilled']['date_period'] == ""): ?> checked="checked"<?php endif; ?> onclick="javascript:managedate('date',true)" /></td>
  <td class="OptionLabel" colspan="2"><label for="date_period_null"><?php echo $this->_tpl_vars['lng']['lbl_all_dates']; ?>
</label></td>
</tr>

<tr>
  <td width="5"><input type="radio" id="date_period_M" name="posted_data[date_period]" value="M"<?php if ($this->_tpl_vars['search_prefilled']['date_period'] == 'M'): ?> checked="checked"<?php endif; ?> onclick="javascript:managedate('date',true)" /></td>
  <td class="OptionLabel" colspan="2"><label for="date_period_M"><?php echo $this->_tpl_vars['lng']['lbl_this_month']; ?>
</label></td>
</tr>

<tr>
  <td width="5"><input type="radio" id="date_period_W" name="posted_data[date_period]" value="W"<?php if ($this->_tpl_vars['search_prefilled']['date_period'] == 'W'): ?> checked="checked"<?php endif; ?> onclick="javascript:managedate('date',true)" /></td>
  <td class="OptionLabel" colspan="2"><label for="date_period_W"><?php echo $this->_tpl_vars['lng']['lbl_this_week']; ?>
</label></td>
</tr>

<tr>
  <td width="5"><input type="radio" id="date_period_D" name="posted_data[date_period]" value="D"<?php if ($this->_tpl_vars['search_prefilled']['date_period'] == 'D'): ?> checked="checked"<?php endif; ?> onclick="javascript:managedate('date',true)" /></td>
  <td class="OptionLabel" colspan="2"><label for="date_period_D"><?php echo $this->_tpl_vars['lng']['lbl_today']; ?>
</label></td>
</tr>

<tr>
  <td width="5"><input type="radio" id="date_period_C" name="posted_data[date_period]" value="C"<?php if ($this->_tpl_vars['search_prefilled']['date_period'] == 'C'): ?> checked="checked"<?php endif; ?> onclick="javascript:managedate('date',false)" /></td>
  <td class="OptionLabel" align="right"><label for="date_period_C"><?php echo $this->_tpl_vars['lng']['lbl_from']; ?>
:</label></td>
  <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/datepicker.tpl", 'smarty_include_vars' => array('name' => 'start_date','date' => ((is_array($_tmp=@$this->_tpl_vars['search_prefilled']['start_date'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['start_date']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['start_date'])))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>

<tr> 
  <td width="5">&nbsp;</td>
  <td class="OptionLabel" align="right"><label><?php echo $this->_tpl_vars['lng']['lbl_to']; ?>
:</label></td>
  <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/datepicker.tpl", 'smarty_include_vars' => array('name' => 'end_date','date' => ((is_array($_tmp=@$this->_tpl_vars['search_prefilled']['end_date'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['end_date']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['end_date'])))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>

<?php if (( $this->_tpl_vars['usertype'] == 'A' && $this->_tpl_vars['current_membership_flag'] != 'FS' ) || $this->_tpl_vars['usertype'] == 'P'): ?>
<tr>
  <td width="5" style="padding-top: 9px;"><input type="checkbox" id="posted_data_is_export" name="posted_data[is_export]" value="Y" /></td>
  <td colspan="2" class="FormButton" nowrap="nowrap" style="padding-top: 9px;">&nbsp;<label for="posted_data_is_export"><?php echo $this->_tpl_vars['lng']['lbl_search_and_export']; ?>
</label></td>
</tr>
<?php endif; ?>

</table>

</td>
</tr>

</table>

<?php if ($this->_tpl_vars['search_prefilled']['date_period'] != 'C'): ?>
<script type="text/javascript">
//<![CDATA[
$(document).ready( function(){
  managedate('date',true);
});
//]]>
</script>
<?php endif; ?>

<br />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/visiblebox_link.tpl", 'smarty_include_vars' => array('mark' => '1','title' => $this->_tpl_vars['lng']['lbl_advanced_search_options'],'extra' => ' width="100%"')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<br />

<table cellpadding="0" cellspacing="0" width="100%" style="display: none;" id="box1">
<tr>
  <td>

<table cellpadding="1" cellspacing="5" width="100%">

<tr>
  <td width="20%" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_order_id']; ?>
:</td>
  <td>
<input type="text" name="posted_data[orderid1]" size="10" maxlength="15" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['orderid1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
-
<input type="text" name="posted_data[orderid2]" size="10" maxlength="15" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['orderid2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
  </td>
</tr>

<?php if ($this->_tpl_vars['usertype'] != 'C'): ?>
<tr>
  <td class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_order_total']; ?>
 (<?php echo $this->_tpl_vars['config']['General']['currency_symbol']; ?>
):</td>
  <td>

<table cellpadding="0" cellspacing="0">
<tr>
  <td><input type="text" size="10" maxlength="15" name="posted_data[total_min]" value="<?php if ($this->_tpl_vars['search_prefilled'] == ""): ?><?php echo $this->_tpl_vars['zero']; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['total_min'])) ? $this->_run_mod_handler('formatprice', true, $_tmp) : smarty_modifier_formatprice($_tmp)); ?>
<?php endif; ?>" /></td>
  <td>&nbsp;-&nbsp;</td>
  <td><input type="text" size="10" maxlength="15" name="posted_data[total_max]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['total_max'])) ? $this->_run_mod_handler('formatprice', true, $_tmp) : smarty_modifier_formatprice($_tmp)); ?>
" /></td>
</tr>
</table>

  </td>
</tr>

<tr>
  <td class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_payment_method']; ?>
:</td>
  <td>
  <select name="posted_data[paymentid]" style="width: 70%;">
    <option value="">&nbsp;</option>
<?php $_from = $this->_tpl_vars['payment_methods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pm']):
?>
    <option value="<?php echo $this->_tpl_vars['pm']['paymentid']; ?>
"<?php if ($this->_tpl_vars['search_prefilled']['paymentid'] == $this->_tpl_vars['pm']['paymentid']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['pm']['payment_method']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
  </select>
  </td>
</tr>

<tr>
  <td class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_delivery']; ?>
:</td>
  <td>
<?php if ($this->_tpl_vars['shipping_methods']): ?>
  <select name="posted_data[shipping_method]" style="width:70%">
    <option value="">&nbsp;</option>
<?php $_from = $this->_tpl_vars['shipping_methods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['s']):
?>
    <option value="<?php echo $this->_tpl_vars['s']['shippingid']; ?>
"<?php if ($this->_tpl_vars['search_prefilled']['shipping_method'] == $this->_tpl_vars['s']['shippingid']): ?> selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['s']['shipping'])) ? $this->_run_mod_handler('trademark', true, $_tmp) : smarty_modifier_trademark($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
  </select>
<?php else: ?>
  <?php echo $this->_tpl_vars['lng']['txt_shipping_methods_is_empty']; ?>

<?php endif; ?>
  </td>
</tr>

<?php endif; ?>

<tr> 
  <td class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_order_status']; ?>
:</td>
  <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/order_status.tpl", 'smarty_include_vars' => array('status' => $this->_tpl_vars['search_prefilled']['status'],'mode' => 'select','name' => "posted_data[status]",'extended' => 'Y','extra' => "style='width:70%'",'display_preauth' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>

<?php if ($this->_tpl_vars['usertype'] == 'A'): ?>
<?php echo smarty_function_getvar(array('var' => 'providers','func' => 'func_get_providers'), $this);?>

<?php if ($this->_tpl_vars['providers']): ?>
<tr>
  <td class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_provider']; ?>
:</td>
  <td>
    <select name="posted_data[provider]">
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

<?php if ($this->_tpl_vars['usertype'] != 'C'): ?>
<tr> 
  <td class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_order_features']; ?>
:</td>
  <td>
<?php $this->assign('features', $this->_tpl_vars['search_prefilled']['features']); ?>
  <select name="posted_data[features][]" multiple="multiple" size="7" style="width:70%">
    <option value="gc_applied"<?php if ($this->_tpl_vars['features']['gc_applied']): ?> selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_entirely_or_partially_payed_by_gc'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</option>
    <option value="discount_applied"<?php if ($this->_tpl_vars['features']['discount_applied']): ?> selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_global_discount_applied'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</option>
    <option value="coupon_applied"<?php if ($this->_tpl_vars['features']['coupon_applied']): ?> selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_discount_coupon_applied'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</option>
    <option value="free_ship"<?php if ($this->_tpl_vars['features']['free_ship']): ?> selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_free_shipping'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</option>
    <option value="free_tax"<?php if ($this->_tpl_vars['features']['free_tax']): ?> selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_tax_exempt'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</option>
    <option value="gc_ordered"<?php if ($this->_tpl_vars['features']['gc_ordered']): ?> selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_gc_purchased'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</option>
    <option value="notes"<?php if ($this->_tpl_vars['features']['notes']): ?> selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_orders_with_notes_assigned'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</option>
  </select><br />
<?php echo $this->_tpl_vars['lng']['lbl_hold_ctrl_key']; ?>

  </td>
</tr>
<?php endif; ?>

<?php if ($this->_tpl_vars['usertype'] != 'C'): ?>

<tr>
  <td class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_search_for_pattern']; ?>
:</td>
  <td>
  <input type="text" name="posted_data[product_substring]" size="30" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['product_substring'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" style="width:70%" />
  </td>
</tr>

<tr>
  <td class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_search_in']; ?>
:</td>
  <td>

<table cellpadding="0" cellspacing="0">
<tr>
  <td width="5"><input type="checkbox" id="posted_data_by_title" name="posted_data[by_title]"<?php if ($this->_tpl_vars['search_prefilled'] == "" || $this->_tpl_vars['search_prefilled']['by_title']): ?> checked="checked"<?php endif; ?> /></td>
  <td nowrap="nowrap"><label for="posted_data_by_title"><?php echo $this->_tpl_vars['lng']['lbl_product_title']; ?>
</label>&nbsp;&nbsp;</td>

  <td width="5"><input type="checkbox" id="posted_data_by_options" name="posted_data[by_options]"<?php if ($this->_tpl_vars['search_prefilled'] == "" || $this->_tpl_vars['search_prefilled']['by_options']): ?> checked="checked"<?php endif; ?> /></td>
  <td nowrap="nowrap"><label for="posted_data_by_options"><?php echo $this->_tpl_vars['lng']['lbl_options']; ?>
</label></td>
</tr>
</table>

  </td>
</tr>

<tr>
  <td class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_sku']; ?>
:</td>
  <td>
  <input type="text" maxlength="64" name="posted_data[productcode]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['productcode'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" style="width:70%" />
  </td>
</tr>

<tr>
  <td class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_productid']; ?>
#:</td>
  <td>
  <input type="text" maxlength="64" name="posted_data[productid]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['productid'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" style="width:70%" />
  </td>
</tr>

<tr> 
  <td class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_price']; ?>
 (<?php echo $this->_tpl_vars['config']['General']['currency_symbol']; ?>
):</td>
  <td>
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

<?php endif; ?>

<?php if ($this->_tpl_vars['usertype'] != 'C'): ?>

<tr> 
  <td class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_customer']; ?>
:</td>
  <td><input type="text" name="posted_data[customer]" size="30" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['customer'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" style="width:70%" /></td>
</tr>

<tr>
  <td class="FormButton"><?php echo $this->_tpl_vars['lng']['lbl_search_in']; ?>
:</td>
  <td>
<table cellspacing="0" cellpadding="0">
<tr>
    <td width="5"><input type="checkbox" id="posted_data_by_username" name="posted_data[by_username]"<?php if ($this->_tpl_vars['search_prefilled'] == "" || $this->_tpl_vars['search_prefilled']['by_username']): ?> checked="checked"<?php endif; ?> /></td>
    <td nowrap="nowrap"><label for="posted_data_by_username"><?php echo $this->_tpl_vars['lng']['lbl_username']; ?>
</label>&nbsp;&nbsp;</td>

  <td width="5"><input type="checkbox" id="posted_data_by_firstname" name="posted_data[by_firstname]"<?php if ($this->_tpl_vars['search_prefilled'] == "" || $this->_tpl_vars['search_prefilled']['by_firstname']): ?> checked="checked"<?php endif; ?> /></td>
  <td nowrap="nowrap"><label for="posted_data_by_firstname"><?php echo $this->_tpl_vars['lng']['lbl_first_name']; ?>
</label>&nbsp;&nbsp;</td>

  <td width="5"><input type="checkbox" id="posted_data_by_lastname" name="posted_data[by_lastname]"<?php if ($this->_tpl_vars['search_prefilled'] == "" || $this->_tpl_vars['search_prefilled']['by_lastname']): ?> checked="checked"<?php endif; ?> /></td>
  <td nowrap="nowrap"><label for="posted_data_by_lastname"><?php echo $this->_tpl_vars['lng']['lbl_last_name']; ?>
</label></td>
</tr>
</table>
  </td>
</tr>

<tr>
  <td class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_company']; ?>
:</td>
  <td><input type="text" maxlength="128" name="posted_data[company]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['company'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" style="width:70%" /></td>
</tr>

<tr>
  <td class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_search_by_address']; ?>
:</td>
  <td>
<table cellpadding="0" cellspacing="0">
<tr>
  <td width="5"><input type="radio" id="address_type_null" name="posted_data[address_type]" value=""<?php if ($this->_tpl_vars['search_prefilled'] == "" || $this->_tpl_vars['search_prefilled']['address_type'] == ""): ?> checked="checked"<?php endif; ?> onclick="javascript:managedate('address',true)" /></td>
  <td class="OptionLabel"><label for="address_type_null"><?php echo $this->_tpl_vars['lng']['lbl_ignore_address']; ?>
</label></td>

  <td width="5"><input type="radio" id="address_type_B" name="posted_data[address_type]" value="B"<?php if ($this->_tpl_vars['search_prefilled']['address_type'] == 'B'): ?> checked="checked"<?php endif; ?> onclick="javascript:managedate('address',false)" /></td>
  <td class="OptionLabel"><label for="address_type_B"><?php echo $this->_tpl_vars['lng']['lbl_billing']; ?>
</label></td>

  <td width="5"><input type="radio" id="address_type_S" name="posted_data[address_type]" value="S"<?php if ($this->_tpl_vars['search_prefilled']['address_type'] == 'S'): ?> checked="checked"<?php endif; ?> onclick="javascript:managedate('address',false)" /></td>
  <td class="OptionLabel"><label for="address_type_S"><?php echo $this->_tpl_vars['lng']['lbl_shipping']; ?>
</label></td>

  <td width="5"><input type="radio" id="address_type_both" name="posted_data[address_type]" value="Both"<?php if ($this->_tpl_vars['search_prefilled']['address_type'] == 'Both'): ?> checked="checked"<?php endif; ?> onclick="javascript:managedate('address',false)" /></td>
  <td class="OptionLabel"><label for="address_type_both"><?php echo $this->_tpl_vars['lng']['lbl_both']; ?>
</label></td>
</tr>
</table>
  </td>
</tr>

<tr>
  <td class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_city']; ?>
:</td>
  <td><input type="text" maxlength="64" name="posted_data[city]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['city'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" style="width:70%" /></td>
</tr>

<tr>
  <td class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_state']; ?>
:</td>
  <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/states.tpl", 'smarty_include_vars' => array('states' => $this->_tpl_vars['states'],'name' => "posted_data[state]",'default' => $this->_tpl_vars['search_prefilled']['state'],'required' => 'N','style' => "style='width:70%'")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>

<tr>
  <td class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_country']; ?>
:</td>
  <td>
  <select name="posted_data[country]" style="width:70%">
    <option value="">[<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_please_select_one'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
]</option>
<?php unset($this->_sections['country_idx']);
$this->_sections['country_idx']['name'] = 'country_idx';
$this->_sections['country_idx']['loop'] = is_array($_loop=$this->_tpl_vars['countries']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['country_idx']['show'] = true;
$this->_sections['country_idx']['max'] = $this->_sections['country_idx']['loop'];
$this->_sections['country_idx']['step'] = 1;
$this->_sections['country_idx']['start'] = $this->_sections['country_idx']['step'] > 0 ? 0 : $this->_sections['country_idx']['loop']-1;
if ($this->_sections['country_idx']['show']) {
    $this->_sections['country_idx']['total'] = $this->_sections['country_idx']['loop'];
    if ($this->_sections['country_idx']['total'] == 0)
        $this->_sections['country_idx']['show'] = false;
} else
    $this->_sections['country_idx']['total'] = 0;
if ($this->_sections['country_idx']['show']):

            for ($this->_sections['country_idx']['index'] = $this->_sections['country_idx']['start'], $this->_sections['country_idx']['iteration'] = 1;
                 $this->_sections['country_idx']['iteration'] <= $this->_sections['country_idx']['total'];
                 $this->_sections['country_idx']['index'] += $this->_sections['country_idx']['step'], $this->_sections['country_idx']['iteration']++):
$this->_sections['country_idx']['rownum'] = $this->_sections['country_idx']['iteration'];
$this->_sections['country_idx']['index_prev'] = $this->_sections['country_idx']['index'] - $this->_sections['country_idx']['step'];
$this->_sections['country_idx']['index_next'] = $this->_sections['country_idx']['index'] + $this->_sections['country_idx']['step'];
$this->_sections['country_idx']['first']      = ($this->_sections['country_idx']['iteration'] == 1);
$this->_sections['country_idx']['last']       = ($this->_sections['country_idx']['iteration'] == $this->_sections['country_idx']['total']);
?>
    <option value="<?php echo $this->_tpl_vars['countries'][$this->_sections['country_idx']['index']]['country_code']; ?>
"<?php if ($this->_tpl_vars['search_prefilled']['country'] == $this->_tpl_vars['countries'][$this->_sections['country_idx']['index']]['country_code']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['countries'][$this->_sections['country_idx']['index']]['country']; ?>
</option>
<?php endfor; endif; ?>
  </select>
  </td>
</tr>

<tr>
  <td class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_zip_code']; ?>
:</td>
  <td>
<input type="text" maxlength="32" name="posted_data[zipcode]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['zipcode'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" style="width:70%" />
  </td>
</tr>

<tr>
  <td class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_phone']; ?>
/<?php echo $this->_tpl_vars['lng']['lbl_fax']; ?>
:</td>
  <td><input type="text" maxlength="32" name="posted_data[phone]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['phone'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" style="width:70%" />
<?php if ($this->_tpl_vars['search_prefilled'] == "" || $this->_tpl_vars['search_prefilled']['address_type'] == ""): ?>
<script type="text/javascript" language="JavaScript 1.2">
//<![CDATA[
managedate('address',true);
//]]>
</script>
<?php endif; ?>
</td>
</tr>

<tr>
  <td class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_email']; ?>
:</td>
  <td><input type="text" maxlength="128" name="posted_data[email]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" style="width:70%" /></td>
</tr>

<tr>
  <td class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_one_return_customer']; ?>
:</td>
  <td><table><tr>
  <td><input type="radio" id="one_return_customer" name="posted_data[one_return_customer]" value=""<?php if ($this->_tpl_vars['search_prefilled']['one_return_customer'] == ""): ?> checked="checked"<?php endif; ?> /></td><td><label for="one_return_customer"><?php echo $this->_tpl_vars['lng']['lbl_all']; ?>
</label></td>
  <td><input type="radio" id="one_return_customerO" name="posted_data[one_return_customer]" value="O"<?php if ($this->_tpl_vars['search_prefilled']['one_return_customer'] == 'O'): ?> checked="checked"<?php endif; ?> /></td><td><label for="one_return_customerO"><?php echo $this->_tpl_vars['lng']['lbl_one_customer']; ?>
</label></td>
  <td><input type="radio" id="one_return_customerR" name="posted_data[one_return_customer]" value="R"<?php if ($this->_tpl_vars['search_prefilled']['one_return_customer'] == 'R'): ?> checked="checked"<?php endif; ?> /></td><td><label for="one_return_customerR"><?php echo $this->_tpl_vars['lng']['lbl_return_customer']; ?>
</label></td>
  </tr></table>
  </td>
</tr>

<?php endif; ?>

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
$this->_smarty_include(array('smarty_include_tpl_file' => "dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_search_orders'],'content' => $this->_smarty_vars['capture']['dialog'],'extra' => 'width="100%"')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['mode'] == 'search'): ?>
<br /><br />
<?php if ($this->_tpl_vars['total_items'] >= '1'): ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['txt_N_results_found'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'items', $this->_tpl_vars['total_items']) : smarty_modifier_substitute($_tmp, 'items', $this->_tpl_vars['total_items'])); ?>
<br />
<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['txt_displaying_X_Y_results'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'first_item', $this->_tpl_vars['first_item'], 'last_item', $this->_tpl_vars['last_item']) : smarty_modifier_substitute($_tmp, 'first_item', $this->_tpl_vars['first_item'], 'last_item', $this->_tpl_vars['last_item'])); ?>

<?php else: ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['txt_N_results_found'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'items', 0) : smarty_modifier_substitute($_tmp, 'items', 0)); ?>

<?php endif; ?>
<?php endif; ?>

<br /><br />

<?php if ($this->_tpl_vars['orders'] != ""): ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/orders_list.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['usertype'] != 'C' && $this->_tpl_vars['mode'] != 'search' && $this->_tpl_vars['current_membership_flag'] != 'FS'): ?>

<?php ob_start(); ?>
<a name="ExportOrders"></a>
<br />

<?php if ($this->_tpl_vars['is_admin_user']): ?>
<?php echo $this->_tpl_vars['lng']['txt_delete_export_all_orders_note_admin']; ?>

<?php else: ?>
<?php echo $this->_tpl_vars['lng']['txt_delete_export_all_orders_note_provider']; ?>

<?php endif; ?>
<br />
<br />

<form name="ordersform" action="orders.php" method="post">
<input type="hidden" name="mode" value="" />

<table cellpadding="1" cellspacing="5">

<tr>
  <td class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_export_file_format']; ?>
:</td>
  <td>&nbsp;</td>
  <td>
  <select name="export_fmt">
    <option value="std"><?php echo $this->_tpl_vars['lng']['lbl_standart']; ?>
</option>
    <option value="csv_tab"><?php echo $this->_tpl_vars['lng']['lbl_40x_compatible']; ?>
: CSV <?php echo $this->_tpl_vars['lng']['lbl_with_tab_delimiter']; ?>
</option>
    <option value="csv_semi"><?php echo $this->_tpl_vars['lng']['lbl_40x_compatible']; ?>
: CSV <?php echo $this->_tpl_vars['lng']['lbl_with_semicolon_delimiter']; ?>
</option>
    <option value="csv_comma"><?php echo $this->_tpl_vars['lng']['lbl_40x_compatible']; ?>
: CSV <?php echo $this->_tpl_vars['lng']['lbl_with_comma_delimiter']; ?>
</option>
<?php if ($this->_tpl_vars['active_modules']['QuickBooks'] == 'Y'): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/QuickBooks/orders.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
  </select>
  </td>
  <td><input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_export_all'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: submitForm(this, 'export_all');" /></td>
</tr>

<tr> 
  <td colspan="4" class="SubmitBox">
<?php if ($this->_tpl_vars['usertype'] == 'A'): ?>
  <input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_delete_all_orders'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: if (confirm(txt_delete_orders_warning)) submitForm(this, 'delete_all');" />
<?php endif; ?>
<br />
  </td>
</tr>

</table>
</form>

<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
<?php if ($this->_tpl_vars['is_admin_user']): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_export_delete_orders'],'content' => $this->_smarty_vars['capture']['dialog'],'extra' => 'width="100%"')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_export_orders'],'content' => $this->_smarty_vars['capture']['dialog'],'extra' => 'width="100%"')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<br /><br />
<?php if ($this->_tpl_vars['active_modules']['Order_Tracking']): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/orders_tracking.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php endif; ?>

<br /><br /><?php if ($this->webmaster_mode) { ?></div><?php } ?>