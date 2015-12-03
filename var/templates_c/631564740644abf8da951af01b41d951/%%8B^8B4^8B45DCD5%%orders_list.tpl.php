<?php /* Smarty version 2.6.26, created on 2015-12-02 18:51:08
         compiled from main/orders_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'wm_remove', 'main/orders_list.tpl', 10, false),array('modifier', 'escape', 'main/orders_list.tpl', 10, false),array('modifier', 'strip_tags', 'main/orders_list.tpl', 10, false),array('modifier', 'substitute', 'main/orders_list.tpl', 69, false),array('modifier', 'default', 'main/orders_list.tpl', 74, false),array('modifier', 'date_format', 'main/orders_list.tpl', 88, false),array('function', 'inc', 'main/orders_list.tpl', 46, false),array('function', 'cycle', 'main/orders_list.tpl', 51, false),array('function', 'currency', 'main/orders_list.tpl', 90, false),)), $this); ?>
<?php if ($this->webmaster_mode) { ?><div id="common_files0main0orders_list.tpl" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?><?php func_load_lang($this, "main/orders_list.tpl","txt_delete_selected_orders_warning,lbl_search_again,lbl_status,lbl_customer,lbl_provider,lbl_date,lbl_total,lbl_blocked,lbl_ip_blocked,lbl_modify_profile,lbl_deleted,lbl_anonymous,lbl_deleted,lbl_userid,txt_not_available,lbl_gross_total,lbl_total_paid,txt_gcheckout_order_list_status_note,lbl_update_status,lbl_invoices_for_selected,lbl_labels_for_selected,lbl_delete_selected,txt_shipping_labels_note,lbl_get_shipping_labels,lbl_export_orders,txt_export_all_found_orders_text,lbl_export_file_format,lbl_standart,lbl_40x_compatible,lbl_with_tab_delimiter,lbl_40x_compatible,lbl_with_semicolon_delimiter,lbl_40x_compatible,lbl_with_comma_delimiter,lbl_export_selected,lbl_export_all_found,lbl_search_results"); ?><?php $this->assign('total', 0.00); ?>
<?php $this->assign('total_paid', 0.00); ?>

<script type="text/javascript">
//<![CDATA[
var txt_delete_selected_orders_warning = "<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['txt_delete_selected_orders_warning'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
";
//]]>
</script>

<?php if ($this->_tpl_vars['orders'] != ""): ?>

<?php ob_start(); ?>

<div align="right"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_search_again'],'href' => "orders.php")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/navigation.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/check_all_row.tpl", 'smarty_include_vars' => array('form' => 'processorderform','prefix' => 'orderids')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<form action="process_order.php" method="post" name="processorderform">
<input type="hidden" name="mode" value="" />

<table cellpadding="2" cellspacing="1" width="100%">

<?php $this->assign('colspan', 6); ?>

<tr class="TableHead">
  <td width="5">&nbsp;</td>
  <td width="5%" nowrap="nowrap"><?php if ($this->_tpl_vars['search_prefilled']['sort_field'] == 'orderid'): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/sort_pointer.tpl", 'smarty_include_vars' => array('dir' => $this->_tpl_vars['search_prefilled']['sort_direction'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>&nbsp;<?php endif; ?><a href="orders.php?mode=search&amp;sort=orderid<?php if ($this->_tpl_vars['search_prefilled']['sort_field'] == 'orderid'): ?>&amp;sort_direction=<?php if ($this->_tpl_vars['search_prefilled']['sort_direction'] == 1): ?>0<?php else: ?>1<?php endif; ?><?php endif; ?>">#</a></td>
  <td nowrap="nowrap"><?php if ($this->_tpl_vars['search_prefilled']['sort_field'] == 'status'): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/sort_pointer.tpl", 'smarty_include_vars' => array('dir' => $this->_tpl_vars['search_prefilled']['sort_direction'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>&nbsp;<?php endif; ?><a href="orders.php?mode=search&amp;sort=status<?php if ($this->_tpl_vars['search_prefilled']['sort_field'] == 'status'): ?>&amp;sort_direction=<?php if ($this->_tpl_vars['search_prefilled']['sort_direction'] == 1): ?>0<?php else: ?>1<?php endif; ?><?php endif; ?>"><?php echo $this->_tpl_vars['lng']['lbl_status']; ?>
</a></td>
  <td width="30%" nowrap="nowrap"><?php if ($this->_tpl_vars['search_prefilled']['sort_field'] == 'customer'): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/sort_pointer.tpl", 'smarty_include_vars' => array('dir' => $this->_tpl_vars['search_prefilled']['sort_direction'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>&nbsp;<?php endif; ?><a href="orders.php?mode=search&amp;sort=customer<?php if ($this->_tpl_vars['search_prefilled']['sort_field'] == 'customer'): ?>&amp;sort_direction=<?php if ($this->_tpl_vars['search_prefilled']['sort_direction'] == 1): ?>0<?php else: ?>1<?php endif; ?><?php endif; ?>"><?php echo $this->_tpl_vars['lng']['lbl_customer']; ?>
</a></td>
<?php if ($this->_tpl_vars['usertype'] == 'A' && $this->_tpl_vars['single_mode'] == ""): ?>
<?php $this->assign('colspan', 7); ?>
  <td width="20%" nowrap="nowrap"><?php if ($this->_tpl_vars['search_prefilled']['sort_field'] == 'provider'): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/sort_pointer.tpl", 'smarty_include_vars' => array('dir' => $this->_tpl_vars['search_prefilled']['sort_direction'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>&nbsp;<?php endif; ?><a href="orders.php?mode=search&amp;sort=provider<?php if ($this->_tpl_vars['search_prefilled']['sort_field'] == 'provider'): ?>&amp;sort_direction=<?php if ($this->_tpl_vars['search_prefilled']['sort_direction'] == 1): ?>0<?php else: ?>1<?php endif; ?><?php endif; ?>"><?php echo $this->_tpl_vars['lng']['lbl_provider']; ?>
</a></td>
<?php endif; ?>
  <td width="20%" nowrap="nowrap"><?php if ($this->_tpl_vars['search_prefilled']['sort_field'] == 'date'): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/sort_pointer.tpl", 'smarty_include_vars' => array('dir' => $this->_tpl_vars['search_prefilled']['sort_direction'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>&nbsp;<?php endif; ?><a href="orders.php?mode=search&amp;sort=date<?php if ($this->_tpl_vars['search_prefilled']['sort_field'] == 'date'): ?>&amp;sort_direction=<?php if ($this->_tpl_vars['search_prefilled']['sort_direction'] == 1): ?>0<?php else: ?>1<?php endif; ?><?php endif; ?>"><?php echo $this->_tpl_vars['lng']['lbl_date']; ?>
</a></td>
  <td width="20%" align="right" nowrap="nowrap"><?php if ($this->_tpl_vars['search_prefilled']['sort_field'] == 'total'): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/sort_pointer.tpl", 'smarty_include_vars' => array('dir' => $this->_tpl_vars['search_prefilled']['sort_direction'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>&nbsp;<?php endif; ?><a href="orders.php?mode=search&amp;sort=total<?php if ($this->_tpl_vars['search_prefilled']['sort_field'] == 'total'): ?>&amp;sort_direction=<?php if ($this->_tpl_vars['search_prefilled']['sort_direction'] == 1): ?>0<?php else: ?>1<?php endif; ?><?php endif; ?>"><?php echo $this->_tpl_vars['lng']['lbl_total']; ?>
</a></td>
</tr>

<?php unset($this->_sections['oid']);
$this->_sections['oid']['name'] = 'oid';
$this->_sections['oid']['loop'] = is_array($_loop=$this->_tpl_vars['orders']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['oid']['show'] = true;
$this->_sections['oid']['max'] = $this->_sections['oid']['loop'];
$this->_sections['oid']['step'] = 1;
$this->_sections['oid']['start'] = $this->_sections['oid']['step'] > 0 ? 0 : $this->_sections['oid']['loop']-1;
if ($this->_sections['oid']['show']) {
    $this->_sections['oid']['total'] = $this->_sections['oid']['loop'];
    if ($this->_sections['oid']['total'] == 0)
        $this->_sections['oid']['show'] = false;
} else
    $this->_sections['oid']['total'] = 0;
if ($this->_sections['oid']['show']):

            for ($this->_sections['oid']['index'] = $this->_sections['oid']['start'], $this->_sections['oid']['iteration'] = 1;
                 $this->_sections['oid']['iteration'] <= $this->_sections['oid']['total'];
                 $this->_sections['oid']['index'] += $this->_sections['oid']['step'], $this->_sections['oid']['iteration']++):
$this->_sections['oid']['rownum'] = $this->_sections['oid']['iteration'];
$this->_sections['oid']['index_prev'] = $this->_sections['oid']['index'] - $this->_sections['oid']['step'];
$this->_sections['oid']['index_next'] = $this->_sections['oid']['index'] + $this->_sections['oid']['step'];
$this->_sections['oid']['first']      = ($this->_sections['oid']['iteration'] == 1);
$this->_sections['oid']['last']       = ($this->_sections['oid']['iteration'] == $this->_sections['oid']['total']);
?>

<?php echo smarty_function_inc(array('value' => $this->_tpl_vars['total'],'inc' => $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['total'],'assign' => 'total'), $this);?>

<?php if ($this->_tpl_vars['orders'][$this->_sections['oid']['index']]['status'] == 'P' || $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['status'] == 'C'): ?>
  <?php echo smarty_function_inc(array('value' => $this->_tpl_vars['total_paid'],'inc' => $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['total'],'assign' => 'total_paid'), $this);?>

<?php endif; ?>

<tr<?php echo smarty_function_cycle(array('values' => ", class='TableSubHead'"), $this);?>
>
  <td width="5"><input type="checkbox" name="orderids[<?php echo $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['orderid']; ?>
]" /></td>
  <td><a href="order.php?orderid=<?php echo $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['orderid']; ?>
">#<?php echo $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['orderid']; ?>
</a></td>
  <td nowrap="nowrap">
<?php if ($this->_tpl_vars['is_admin_user']): ?>
<input type="hidden" name="order_status_old[<?php echo $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['orderid']; ?>
]" value="<?php echo $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['status']; ?>
" />
<?php if ($this->_tpl_vars['orders'][$this->_sections['oid']['index']]['goid'] != ""): ?>
<?php $this->assign('is_gcheckout_orders', '1'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/order_status.tpl", 'smarty_include_vars' => array('status' => $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['status'],'mode' => 'select','name' => "order_status[".($this->_tpl_vars['orders'][$this->_sections['oid']['index']]['orderid'])."]",'extra' => "disabled='disabled' class='ui-state-disabled'")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php elseif ($this->_tpl_vars['orders'][$this->_sections['oid']['index']]['status_blocked']): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/order_status.tpl", 'smarty_include_vars' => array('status' => $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['status'],'mode' => 'select','name' => "order_status[".($this->_tpl_vars['orders'][$this->_sections['oid']['index']]['orderid'])."]",'extra' => "disabled='disabled' class='ui-state-disabled'")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/order_status.tpl", 'smarty_include_vars' => array('status' => $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['status'],'mode' => 'select','name' => "order_status[".($this->_tpl_vars['orders'][$this->_sections['oid']['index']]['orderid'])."]")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php else: ?>
<a href="order.php?orderid=<?php echo $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['orderid']; ?>
"><b><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/order_status.tpl", 'smarty_include_vars' => array('status' => $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['status'],'mode' => 'static')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></b></a>
<?php endif; ?>
<?php if ($this->_tpl_vars['active_modules']['Stop_List'] != '' && $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['blocked'] == 'Y'): ?>
<img src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/no_ip.gif" style="vertical-align: middle;" alt="<?php echo $this->_tpl_vars['lng']['lbl_blocked']; ?>
:<?php echo $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['ip']; ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_ip_blocked'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'ip', $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['ip']) : smarty_modifier_substitute($_tmp, 'ip', $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['ip'])); ?>
" />
<?php endif; ?>
  </td>
  <td>
    <?php if ($this->_tpl_vars['is_admin_user'] && $this->_tpl_vars['current_membership_flag'] != 'FS' && $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['existing_userid'] == $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['userid']): ?>
      <a href="<?php echo $this->_tpl_vars['catalogs']['admin']; ?>
/user_modify.php?user=<?php echo ((is_array($_tmp=$this->_tpl_vars['orders'][$this->_sections['oid']['index']]['userid'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&amp;usertype=C" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_modify_profile'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" target="_blank"><?php echo ((is_array($_tmp=@$this->_tpl_vars['orders'][$this->_sections['oid']['index']]['firstname'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['orders'][$this->_sections['oid']['index']]['b_firstname']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['orders'][$this->_sections['oid']['index']]['b_firstname'])); ?>
 <?php echo ((is_array($_tmp=@$this->_tpl_vars['orders'][$this->_sections['oid']['index']]['lastname'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['orders'][$this->_sections['oid']['index']]['b_lastname']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['orders'][$this->_sections['oid']['index']]['b_lastname'])); ?>
</a>
    <?php else: ?>
      <?php echo ((is_array($_tmp=@$this->_tpl_vars['orders'][$this->_sections['oid']['index']]['firstname'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['orders'][$this->_sections['oid']['index']]['b_firstname']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['orders'][$this->_sections['oid']['index']]['b_firstname'])); ?>
 <?php echo ((is_array($_tmp=@$this->_tpl_vars['orders'][$this->_sections['oid']['index']]['lastname'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['orders'][$this->_sections['oid']['index']]['b_lastname']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['orders'][$this->_sections['oid']['index']]['b_lastname'])); ?>
 
      <?php if ($this->_tpl_vars['orders'][$this->_sections['oid']['index']]['existing_userid'] != $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['userid'] && $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['userid'] > 0): ?>
        <font class="Star"> <?php echo $this->_tpl_vars['lng']['lbl_deleted']; ?>
</font>
      <?php elseif ($this->_tpl_vars['orders'][$this->_sections['oid']['index']]['userid'] == 0): ?>
        <span class="SmallText"> (<?php echo $this->_tpl_vars['lng']['lbl_anonymous']; ?>
)</span>
      <?php endif; ?>
    <?php endif; ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gmap.tpl", 'smarty_include_vars' => array('address' => $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['gmap']['address'],'description' => $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['gmap']['description'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </td>
<?php if ($this->_tpl_vars['usertype'] == 'A' && $this->_tpl_vars['single_mode'] == ""): ?>
  <td nowrap="nowrap"><?php if ($this->_tpl_vars['orders'][$this->_sections['oid']['index']]['provider_login'] != ''): ?><?php echo $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['provider_login']; ?>
<?php elseif ($this->_tpl_vars['orders'][$this->_sections['oid']['index']]['provider'] > 0): ?><font class="Star"> <?php echo $this->_tpl_vars['lng']['lbl_deleted']; ?>
 (<?php echo $this->_tpl_vars['lng']['lbl_userid']; ?>
: <?php echo $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['provider']; ?>
)</font><?php else: ?><?php echo $this->_tpl_vars['lng']['txt_not_available']; ?>
<?php endif; ?></td>
<?php endif; ?>
  <td nowrap="nowrap"><a href="order.php?orderid=<?php echo $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['orderid']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['orders'][$this->_sections['oid']['index']]['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['config']['Appearance']['datetime_format']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['config']['Appearance']['datetime_format'])); ?>
</a></td>
  <td nowrap="nowrap" align="right">
  <a href="order.php?orderid=<?php echo $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['orderid']; ?>
"><?php echo smarty_function_currency(array('value' => $this->_tpl_vars['orders'][$this->_sections['oid']['index']]['total']), $this);?>
</a>
  </td>
</tr>

<?php endfor; endif; ?>

<tr>
  <td colspan="<?php echo $this->_tpl_vars['colspan']; ?>
"><img src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/spacer.gif" width="100%" height="1" alt="" /></td>
</tr>

<tr>
  <td colspan="<?php echo $this->_tpl_vars['colspan']; ?>
" align="right"><?php echo $this->_tpl_vars['lng']['lbl_gross_total']; ?>
: <b><?php echo smarty_function_currency(array('value' => $this->_tpl_vars['total']), $this);?>
</b></td>
</tr>

<tr>
  <td colspan="<?php echo $this->_tpl_vars['colspan']; ?>
" align="right"><?php echo $this->_tpl_vars['lng']['lbl_total_paid']; ?>
: <b><?php echo smarty_function_currency(array('value' => $this->_tpl_vars['total_paid']), $this);?>
</b></td>
</tr>

<tr>
  <td colspan="<?php echo $this->_tpl_vars['colspan']; ?>
"><br />

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/navigation.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['is_admin_user'] && $this->_tpl_vars['is_gcheckout_orders'] == '1'): ?>
<?php echo $this->_tpl_vars['lng']['txt_gcheckout_order_list_status_note']; ?>

<br /><br />
<?php endif; ?>

<div<?php if ($this->_tpl_vars['is_admin_user']): ?> id="sticky_content"<?php endif; ?>>

<?php if ($this->_tpl_vars['is_admin_user']): ?>
<div class="main-button">
  <input type="button" class="big-main-button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_update_status'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: submitForm(this, 'update');" />
</div>
<br />
<?php endif; ?>

<input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_invoices_for_selected'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: if (checkMarks(this.form, new RegExp('orderids\[[0-9]+\]', 'gi'))) { document.processorderform.target='invoices'; submitForm(this, 'invoice'); document.processorderform.target=''; }" />
&nbsp;&nbsp;&nbsp;&nbsp;
<?php if ($this->_tpl_vars['usertype'] != 'C'): ?>
<input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_labels_for_selected'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: if (checkMarks(this.form, new RegExp('orderids\[[0-9]+\]', 'gi'))) { document.processorderform.target='labels'; submitForm(this, 'label'); document.processorderform.target=''; }" />
&nbsp;&nbsp;&nbsp;&nbsp;
<?php endif; ?>
<?php if ($this->_tpl_vars['is_admin_user']): ?>
<input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_delete_selected'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: if (checkMarks(this.form, new RegExp('orderids\[[0-9]+\]', 'gi'))) if (confirm(txt_delete_selected_orders_warning)) submitForm(this, 'delete');" />
&nbsp;&nbsp;&nbsp;&nbsp;
<?php endif; ?>

<?php if ($this->_tpl_vars['active_modules']['Shipping_Label_Generator'] != '' && ( $this->_tpl_vars['usertype'] == 'A' || $this->_tpl_vars['usertype'] == 'P' )): ?>
<br />
<br />
<br />
<?php echo $this->_tpl_vars['lng']['txt_shipping_labels_note']; ?>

<br />
<br />
<input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_get_shipping_labels'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: if (checkMarks(this.form, new RegExp('orderids\[[0-9]+\]', 'gi'))) { document.processorderform.action='generator.php'; submitForm(this, ''); }" />
<?php endif; ?>

</div>

<?php if ($this->_tpl_vars['usertype'] != 'C'): ?>
<br />
<br />
<br />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/subheader.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_export_orders'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo $this->_tpl_vars['lng']['txt_export_all_found_orders_text']; ?>

<br /><br />
<?php echo $this->_tpl_vars['lng']['lbl_export_file_format']; ?>
:<br />
<select id="export_fmt" name="export_fmt">
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
<br />
<br />
<input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_export_selected'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: if (checkMarks(this.form, new RegExp('orderids\[[0-9]+\]', 'gi'))) submitForm(this, 'export');" />&nbsp;&nbsp;&nbsp;
<input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_export_all_found'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: self.location='orders.php?mode=search&amp;export=export_found&amp;export_fmt='+document.getElementById('export_fmt').value;" />
<?php endif; ?>
</td>
</tr>

</table>
</form>

<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_search_results'],'content' => $this->_smarty_vars['capture']['dialog'],'extra' => 'width="100%"')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?><?php if ($this->webmaster_mode) { ?></div><?php } ?>