<?php /* Smarty version 2.6.26, created on 2015-12-02 18:35:10
         compiled from provider/main/shipping_rates.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'substitute', 'provider/main/shipping_rates.tpl', 7, false),array('modifier', 'escape', 'provider/main/shipping_rates.tpl', 15, false),array('modifier', 'trademark', 'provider/main/shipping_rates.tpl', 22, false),array('modifier', 'wm_remove', 'provider/main/shipping_rates.tpl', 22, false),array('modifier', 'formatprice', 'provider/main/shipping_rates.tpl', 125, false),array('modifier', 'default', 'provider/main/shipping_rates.tpl', 138, false),array('modifier', 'strip_tags', 'provider/main/shipping_rates.tpl', 180, false),)), $this); ?>
<?php if ($this->_tpl_vars['type'] == 'D'): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page_title.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_shipping_charges'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['txt_shipping_charges_note'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'weight_symbol', $this->_tpl_vars['config']['General']['weight_symbol']) : smarty_modifier_substitute($_tmp, 'weight_symbol', $this->_tpl_vars['config']['General']['weight_symbol'])); ?>

<?php else: ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page_title.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_shipping_markups'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['txt_shipping_markups_note'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'weight_symbol', $this->_tpl_vars['config']['General']['weight_symbol']) : smarty_modifier_substitute($_tmp, 'weight_symbol', $this->_tpl_vars['config']['General']['weight_symbol'])); ?>

<?php endif; ?>

<form action="shipping_rates.php" method="get" name="zoneform">

<input type="hidden" name="type" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['type'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />

<b><?php if ($this->_tpl_vars['type'] == 'D'): ?><?php echo $this->_tpl_vars['lng']['lbl_edit_charges_for']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lng']['lbl_edit_markups_for']; ?>
<?php endif; ?></b><br />

<select name="shippingid" onchange="document.zoneform.submit()">
  <option value=""><?php echo $this->_tpl_vars['lng']['lbl_all_methods']; ?>
</option>
<?php unset($this->_sections['ship_num']);
$this->_sections['ship_num']['name'] = 'ship_num';
$this->_sections['ship_num']['loop'] = is_array($_loop=$this->_tpl_vars['shipping']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ship_num']['show'] = true;
$this->_sections['ship_num']['max'] = $this->_sections['ship_num']['loop'];
$this->_sections['ship_num']['step'] = 1;
$this->_sections['ship_num']['start'] = $this->_sections['ship_num']['step'] > 0 ? 0 : $this->_sections['ship_num']['loop']-1;
if ($this->_sections['ship_num']['show']) {
    $this->_sections['ship_num']['total'] = $this->_sections['ship_num']['loop'];
    if ($this->_sections['ship_num']['total'] == 0)
        $this->_sections['ship_num']['show'] = false;
} else
    $this->_sections['ship_num']['total'] = 0;
if ($this->_sections['ship_num']['show']):

            for ($this->_sections['ship_num']['index'] = $this->_sections['ship_num']['start'], $this->_sections['ship_num']['iteration'] = 1;
                 $this->_sections['ship_num']['iteration'] <= $this->_sections['ship_num']['total'];
                 $this->_sections['ship_num']['index'] += $this->_sections['ship_num']['step'], $this->_sections['ship_num']['iteration']++):
$this->_sections['ship_num']['rownum'] = $this->_sections['ship_num']['iteration'];
$this->_sections['ship_num']['index_prev'] = $this->_sections['ship_num']['index'] - $this->_sections['ship_num']['step'];
$this->_sections['ship_num']['index_next'] = $this->_sections['ship_num']['index'] + $this->_sections['ship_num']['step'];
$this->_sections['ship_num']['first']      = ($this->_sections['ship_num']['iteration'] == 1);
$this->_sections['ship_num']['last']       = ($this->_sections['ship_num']['iteration'] == $this->_sections['ship_num']['total']);
?>
  <option value="<?php echo $this->_tpl_vars['shipping'][$this->_sections['ship_num']['index']]['shippingid']; ?>
"<?php if ($_GET['shippingid'] != "" && $_GET['shippingid'] == $this->_tpl_vars['shipping'][$this->_sections['ship_num']['index']]['shippingid']): ?> selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['shipping'][$this->_sections['ship_num']['index']]['shipping'])) ? $this->_run_mod_handler('trademark', true, $_tmp) : smarty_modifier_trademark($_tmp)); ?>
 (<?php if ($this->_tpl_vars['shipping'][$this->_sections['ship_num']['index']]['destination'] == 'I'): ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_intl'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php else: ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_national'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>)</option>
<?php endfor; endif; ?>
</select>

<select name="zoneid" onchange="document.zoneform.submit()">
  <option value=""><?php echo $this->_tpl_vars['lng']['lbl_all_zones']; ?>
</option>
<?php unset($this->_sections['zone']);
$this->_sections['zone']['name'] = 'zone';
$this->_sections['zone']['loop'] = is_array($_loop=$this->_tpl_vars['zones']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['zone']['show'] = true;
$this->_sections['zone']['max'] = $this->_sections['zone']['loop'];
$this->_sections['zone']['step'] = 1;
$this->_sections['zone']['start'] = $this->_sections['zone']['step'] > 0 ? 0 : $this->_sections['zone']['loop']-1;
if ($this->_sections['zone']['show']) {
    $this->_sections['zone']['total'] = $this->_sections['zone']['loop'];
    if ($this->_sections['zone']['total'] == 0)
        $this->_sections['zone']['show'] = false;
} else
    $this->_sections['zone']['total'] = 0;
if ($this->_sections['zone']['show']):

            for ($this->_sections['zone']['index'] = $this->_sections['zone']['start'], $this->_sections['zone']['iteration'] = 1;
                 $this->_sections['zone']['iteration'] <= $this->_sections['zone']['total'];
                 $this->_sections['zone']['index'] += $this->_sections['zone']['step'], $this->_sections['zone']['iteration']++):
$this->_sections['zone']['rownum'] = $this->_sections['zone']['iteration'];
$this->_sections['zone']['index_prev'] = $this->_sections['zone']['index'] - $this->_sections['zone']['step'];
$this->_sections['zone']['index_next'] = $this->_sections['zone']['index'] + $this->_sections['zone']['step'];
$this->_sections['zone']['first']      = ($this->_sections['zone']['iteration'] == 1);
$this->_sections['zone']['last']       = ($this->_sections['zone']['iteration'] == $this->_sections['zone']['total']);
?>
  <option value="<?php echo $this->_tpl_vars['zones'][$this->_sections['zone']['index']]['zoneid']; ?>
"<?php if ($_GET['zoneid'] != "" && $_GET['zoneid'] == $this->_tpl_vars['zones'][$this->_sections['zone']['index']]['zoneid']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['zones'][$this->_sections['zone']['index']]['zone']; ?>
</option>
<?php endfor; endif; ?>
</select>

</form>

<br /><br />

<?php ob_start(); ?>

<?php if ($this->_tpl_vars['shipping_rates_avail'] > 0): ?>

<script type="text/javascript" language="JavaScript 1.2">
//<![CDATA[
checkboxes_form = 'shippingratesform';
checkboxes = new Array(<?php unset($this->_sections['zone']);
$this->_sections['zone']['name'] = 'zone';
$this->_sections['zone']['loop'] = is_array($_loop=$this->_tpl_vars['zones_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['zone']['show'] = true;
$this->_sections['zone']['max'] = $this->_sections['zone']['loop'];
$this->_sections['zone']['step'] = 1;
$this->_sections['zone']['start'] = $this->_sections['zone']['step'] > 0 ? 0 : $this->_sections['zone']['loop']-1;
if ($this->_sections['zone']['show']) {
    $this->_sections['zone']['total'] = $this->_sections['zone']['loop'];
    if ($this->_sections['zone']['total'] == 0)
        $this->_sections['zone']['show'] = false;
} else
    $this->_sections['zone']['total'] = 0;
if ($this->_sections['zone']['show']):

            for ($this->_sections['zone']['index'] = $this->_sections['zone']['start'], $this->_sections['zone']['iteration'] = 1;
                 $this->_sections['zone']['iteration'] <= $this->_sections['zone']['total'];
                 $this->_sections['zone']['index'] += $this->_sections['zone']['step'], $this->_sections['zone']['iteration']++):
$this->_sections['zone']['rownum'] = $this->_sections['zone']['iteration'];
$this->_sections['zone']['index_prev'] = $this->_sections['zone']['index'] - $this->_sections['zone']['step'];
$this->_sections['zone']['index_next'] = $this->_sections['zone']['index'] + $this->_sections['zone']['step'];
$this->_sections['zone']['first']      = ($this->_sections['zone']['iteration'] == 1);
$this->_sections['zone']['last']       = ($this->_sections['zone']['iteration'] == $this->_sections['zone']['total']);
?><?php $_from = $this->_tpl_vars['zones_list'][$this->_sections['zone']['index']]['shipping_methods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['shipid'] => $this->_tpl_vars['shipping_method']):
?><?php if ($this->_tpl_vars['comma'] != ""): ?>,<?php else: ?><?php $this->assign('comma', 1); ?><?php endif; ?>'sm_<?php echo $this->_tpl_vars['zones_list'][$this->_sections['zone']['index']]['zone']['zoneid']; ?>
_<?php echo $this->_tpl_vars['shipid']; ?>
'<?php unset($this->_sections['rate']);
$this->_sections['rate']['name'] = 'rate';
$this->_sections['rate']['loop'] = is_array($_loop=$this->_tpl_vars['shipping_method']['rates']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['rate']['show'] = true;
$this->_sections['rate']['max'] = $this->_sections['rate']['loop'];
$this->_sections['rate']['step'] = 1;
$this->_sections['rate']['start'] = $this->_sections['rate']['step'] > 0 ? 0 : $this->_sections['rate']['loop']-1;
if ($this->_sections['rate']['show']) {
    $this->_sections['rate']['total'] = $this->_sections['rate']['loop'];
    if ($this->_sections['rate']['total'] == 0)
        $this->_sections['rate']['show'] = false;
} else
    $this->_sections['rate']['total'] = 0;
if ($this->_sections['rate']['show']):

            for ($this->_sections['rate']['index'] = $this->_sections['rate']['start'], $this->_sections['rate']['iteration'] = 1;
                 $this->_sections['rate']['iteration'] <= $this->_sections['rate']['total'];
                 $this->_sections['rate']['index'] += $this->_sections['rate']['step'], $this->_sections['rate']['iteration']++):
$this->_sections['rate']['rownum'] = $this->_sections['rate']['iteration'];
$this->_sections['rate']['index_prev'] = $this->_sections['rate']['index'] - $this->_sections['rate']['step'];
$this->_sections['rate']['index_next'] = $this->_sections['rate']['index'] + $this->_sections['rate']['step'];
$this->_sections['rate']['first']      = ($this->_sections['rate']['iteration'] == 1);
$this->_sections['rate']['last']       = ($this->_sections['rate']['iteration'] == $this->_sections['rate']['total']);
?>,'posted_data[<?php echo $this->_tpl_vars['shipping_method']['rates'][$this->_sections['rate']['index']]['rateid']; ?>
][to_delete]'<?php endfor; endif; ?><?php endforeach; endif; unset($_from); ?><?php endfor; endif; ?>);
//]]>  
</script> 
<script type="text/javascript" src="<?php echo $this->_tpl_vars['SkinDir']; ?>
/js/change_all_checkboxes.js"></script>

<table cellpadding="0" cellspacing="0" width="100%">
<tr>
  <td><div style="line-height:170%"><a href="javascript:change_all(true);"><?php echo $this->_tpl_vars['lng']['lbl_check_all']; ?>
</a> / <a href="javascript:change_all(false);"><?php echo $this->_tpl_vars['lng']['lbl_uncheck_all']; ?>
</a></div></td>
  <td align="right">
<?php if ($this->_tpl_vars['type'] == 'D'): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_add_shipping_charge_values'],'href' => "#addrate")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_add_shipping_markup_values'],'href' => "#addrate")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?>
  </td>
</tr>
</table>

<br /><br />

<form action="shipping_rates.php" method="post" name="shippingratesform">
<input type="hidden" name="mode" value="update" />
<input type="hidden" name="zoneid" value="<?php echo ((is_array($_tmp=$_GET['zoneid'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
<input type="hidden" name="shippingid" value="<?php echo ((is_array($_tmp=$_GET['shippingid'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
<input type="hidden" name="type" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['type'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />

<table cellpadding="0" cellspacing="1" width="100%">

<?php unset($this->_sections['zone']);
$this->_sections['zone']['name'] = 'zone';
$this->_sections['zone']['loop'] = is_array($_loop=$this->_tpl_vars['zones_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['zone']['show'] = true;
$this->_sections['zone']['max'] = $this->_sections['zone']['loop'];
$this->_sections['zone']['step'] = 1;
$this->_sections['zone']['start'] = $this->_sections['zone']['step'] > 0 ? 0 : $this->_sections['zone']['loop']-1;
if ($this->_sections['zone']['show']) {
    $this->_sections['zone']['total'] = $this->_sections['zone']['loop'];
    if ($this->_sections['zone']['total'] == 0)
        $this->_sections['zone']['show'] = false;
} else
    $this->_sections['zone']['total'] = 0;
if ($this->_sections['zone']['show']):

            for ($this->_sections['zone']['index'] = $this->_sections['zone']['start'], $this->_sections['zone']['iteration'] = 1;
                 $this->_sections['zone']['iteration'] <= $this->_sections['zone']['total'];
                 $this->_sections['zone']['index'] += $this->_sections['zone']['step'], $this->_sections['zone']['iteration']++):
$this->_sections['zone']['rownum'] = $this->_sections['zone']['iteration'];
$this->_sections['zone']['index_prev'] = $this->_sections['zone']['index'] - $this->_sections['zone']['step'];
$this->_sections['zone']['index_next'] = $this->_sections['zone']['index'] + $this->_sections['zone']['step'];
$this->_sections['zone']['first']      = ($this->_sections['zone']['iteration'] == 1);
$this->_sections['zone']['last']       = ($this->_sections['zone']['iteration'] == $this->_sections['zone']['total']);
?>

<?php if ($this->_tpl_vars['zones_list'][$this->_sections['zone']['index']]['shipping_methods']): ?>

<tr>
  <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/subheader.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['zones_list'][$this->_sections['zone']['index']]['zone']['zone'],'class' => 'black')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>

<?php ob_start(); ?>
<?php $_from = $this->_tpl_vars['zones_list'][$this->_sections['zone']['index']]['shipping_methods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['shipid'] => $this->_tpl_vars['shipping_method']):
?>

<tr>
  <td class="SubHeaderGreyLine"><img src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/spacer.gif" class="Spc" alt="" /></td>
</tr>

<tr class="TableSubHead">
  <td>
<script type="text/javascript" language="JavaScript 1.2">
//<![CDATA[
checkboxes<?php echo $this->_tpl_vars['zones_list'][$this->_sections['zone']['index']]['zone']['zoneid']; ?>
_<?php echo $this->_tpl_vars['shipid']; ?>
 = new Array(<?php unset($this->_sections['rate']);
$this->_sections['rate']['name'] = 'rate';
$this->_sections['rate']['loop'] = is_array($_loop=$this->_tpl_vars['shipping_method']['rates']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['rate']['show'] = true;
$this->_sections['rate']['max'] = $this->_sections['rate']['loop'];
$this->_sections['rate']['step'] = 1;
$this->_sections['rate']['start'] = $this->_sections['rate']['step'] > 0 ? 0 : $this->_sections['rate']['loop']-1;
if ($this->_sections['rate']['show']) {
    $this->_sections['rate']['total'] = $this->_sections['rate']['loop'];
    if ($this->_sections['rate']['total'] == 0)
        $this->_sections['rate']['show'] = false;
} else
    $this->_sections['rate']['total'] = 0;
if ($this->_sections['rate']['show']):

            for ($this->_sections['rate']['index'] = $this->_sections['rate']['start'], $this->_sections['rate']['iteration'] = 1;
                 $this->_sections['rate']['iteration'] <= $this->_sections['rate']['total'];
                 $this->_sections['rate']['index'] += $this->_sections['rate']['step'], $this->_sections['rate']['iteration']++):
$this->_sections['rate']['rownum'] = $this->_sections['rate']['iteration'];
$this->_sections['rate']['index_prev'] = $this->_sections['rate']['index'] - $this->_sections['rate']['step'];
$this->_sections['rate']['index_next'] = $this->_sections['rate']['index'] + $this->_sections['rate']['step'];
$this->_sections['rate']['first']      = ($this->_sections['rate']['iteration'] == 1);
$this->_sections['rate']['last']       = ($this->_sections['rate']['iteration'] == $this->_sections['rate']['total']);
?><?php if (! $this->_sections['rate']['first']): ?>,<?php endif; ?>'posted_data[<?php echo $this->_tpl_vars['shipping_method']['rates'][$this->_sections['rate']['index']]['rateid']; ?>
][to_delete]'<?php endfor; endif; ?>);
//]]>  
</script> 
<table cellpadding="2" cellspacing="0" width="100%">
<tr>
  <td><input type="checkbox" id="sm_<?php echo $this->_tpl_vars['zones_list'][$this->_sections['zone']['index']]['zone']['zoneid']; ?>
_<?php echo $this->_tpl_vars['shipid']; ?>
" name="sm_<?php echo $this->_tpl_vars['zones_list'][$this->_sections['zone']['index']]['zone']['zoneid']; ?>
_<?php echo $this->_tpl_vars['shipid']; ?>
" onclick="javascript:change_all(this.checked, checkboxes_form, checkboxes<?php echo $this->_tpl_vars['zones_list'][$this->_sections['zone']['index']]['zone']['zoneid']; ?>
_<?php echo $this->_tpl_vars['shipid']; ?>
);" /></td>
  <td><b><label for="sm_<?php echo $this->_tpl_vars['zones_list'][$this->_sections['zone']['index']]['zone']['zoneid']; ?>
_<?php echo $this->_tpl_vars['shipid']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_method']['shipping'])) ? $this->_run_mod_handler('trademark', true, $_tmp) : smarty_modifier_trademark($_tmp)); ?>
 (<?php if ($this->_tpl_vars['shipping_method']['destination'] == 'I'): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_intl'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_national'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>)</label></b></td>
  <td align="right">
    <?php echo $this->_tpl_vars['lng']['lbl_apply_rates_to']; ?>
:
    <select name="apply_to[<?php echo $this->_tpl_vars['zones_list'][$this->_sections['zone']['index']]['zone']['zoneid']; ?>
][<?php echo $this->_tpl_vars['shipid']; ?>
]">
    <option value="DST"<?php if ($this->_tpl_vars['shipping_method']['apply_to'] == 'DST' || $this->_tpl_vars['shipping_method']['apply_to'] == ""): ?> selected="selected"<?php endif; ?>>DST (<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_discounted_subtotal'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
)</option>
    <option value="ST"<?php if ($this->_tpl_vars['shipping_method']['apply_to'] == 'ST'): ?> selected="selected"<?php endif; ?>>ST (<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_subtotal'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
)</option>
    </select>
  </td>
</tr>
</table>

  </td>
</tr>

<tr>
  <td class="SubHeaderGreyLine"><img src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/spacer.gif" class="Spc" alt="" /></td>
</tr>

<tr>
  <td>

<table cellpadding="0" cellspacing="3" width="100%">

<?php unset($this->_sections['rate']);
$this->_sections['rate']['name'] = 'rate';
$this->_sections['rate']['loop'] = is_array($_loop=$this->_tpl_vars['shipping_method']['rates']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['rate']['show'] = true;
$this->_sections['rate']['max'] = $this->_sections['rate']['loop'];
$this->_sections['rate']['step'] = 1;
$this->_sections['rate']['start'] = $this->_sections['rate']['step'] > 0 ? 0 : $this->_sections['rate']['loop']-1;
if ($this->_sections['rate']['show']) {
    $this->_sections['rate']['total'] = $this->_sections['rate']['loop'];
    if ($this->_sections['rate']['total'] == 0)
        $this->_sections['rate']['show'] = false;
} else
    $this->_sections['rate']['total'] = 0;
if ($this->_sections['rate']['show']):

            for ($this->_sections['rate']['index'] = $this->_sections['rate']['start'], $this->_sections['rate']['iteration'] = 1;
                 $this->_sections['rate']['iteration'] <= $this->_sections['rate']['total'];
                 $this->_sections['rate']['index'] += $this->_sections['rate']['step'], $this->_sections['rate']['iteration']++):
$this->_sections['rate']['rownum'] = $this->_sections['rate']['iteration'];
$this->_sections['rate']['index_prev'] = $this->_sections['rate']['index'] - $this->_sections['rate']['step'];
$this->_sections['rate']['index_next'] = $this->_sections['rate']['index'] + $this->_sections['rate']['step'];
$this->_sections['rate']['first']      = ($this->_sections['rate']['iteration'] == 1);
$this->_sections['rate']['last']       = ($this->_sections['rate']['iteration'] == $this->_sections['rate']['total']);
?>
<?php $this->assign('shipping_rate', $this->_tpl_vars['shipping_method']['rates'][$this->_sections['rate']['index']]); ?>

<tr>
  <td rowspan="2" nowrap="nowrap"><img src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/spacer.gif" width="10" height="1" alt="" /><input type="checkbox" name="posted_data[<?php echo $this->_tpl_vars['shipping_rate']['rateid']; ?>
][to_delete]" /></td>
  <td><?php echo $this->_tpl_vars['lng']['lbl_weight_range']; ?>
:</td>
  <td nowrap="nowrap">
<input type="text" name="posted_data[<?php echo $this->_tpl_vars['shipping_rate']['rateid']; ?>
][minweight]" size="9" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_rate']['minweight'])) ? $this->_run_mod_handler('formatprice', true, $_tmp) : smarty_modifier_formatprice($_tmp)); ?>
" />
-
<input type="text" name="posted_data[<?php echo $this->_tpl_vars['shipping_rate']['rateid']; ?>
][maxweight]" size="9" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_rate']['maxweight'])) ? $this->_run_mod_handler('formatprice', true, $_tmp) : smarty_modifier_formatprice($_tmp)); ?>
" />
  </td>
  <td><?php echo $this->_tpl_vars['lng']['lbl_flat_charge']; ?>
 (<?php echo $this->_tpl_vars['config']['General']['currency_symbol']; ?>
):</td>
  <td nowrap="nowrap"><input type="text" name="posted_data[<?php echo $this->_tpl_vars['shipping_rate']['rateid']; ?>
][rate]" size="5" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_rate']['rate'])) ? $this->_run_mod_handler('formatprice', true, $_tmp) : smarty_modifier_formatprice($_tmp)); ?>
" /></td>
  <td><?php echo $this->_tpl_vars['lng']['lbl_percent_charge']; ?>
:</td>
  <td><input type="text" name="posted_data[<?php echo $this->_tpl_vars['shipping_rate']['rateid']; ?>
][rate_p]" size="5" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_rate']['rate_p'])) ? $this->_run_mod_handler('formatprice', true, $_tmp) : smarty_modifier_formatprice($_tmp)); ?>
" /></td>
</tr>

<tr>
  <td><?php echo $this->_tpl_vars['lng']['lbl_subtotal_range']; ?>
:</td>
  <td nowrap="nowrap">
<input type="text" name="posted_data[<?php echo $this->_tpl_vars['shipping_rate']['rateid']; ?>
][mintotal]" size="9" value="<?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['shipping_rate']['mintotal'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)))) ? $this->_run_mod_handler('formatprice', true, $_tmp) : smarty_modifier_formatprice($_tmp)); ?>
" />
-
<input type="text" name="posted_data[<?php echo $this->_tpl_vars['shipping_rate']['rateid']; ?>
][maxtotal]" size="9" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_rate']['maxtotal'])) ? $this->_run_mod_handler('formatprice', true, $_tmp) : smarty_modifier_formatprice($_tmp)); ?>
" />
  </td>
  <td><?php echo $this->_tpl_vars['lng']['lbl_per_item_charge']; ?>
 (<?php echo $this->_tpl_vars['config']['General']['currency_symbol']; ?>
):</td>
  <td nowrap="nowrap"><input type="text" name="posted_data[<?php echo $this->_tpl_vars['shipping_rate']['rateid']; ?>
][item_rate]" size="5" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_rate']['item_rate'])) ? $this->_run_mod_handler('formatprice', true, $_tmp) : smarty_modifier_formatprice($_tmp)); ?>
" /></td>
  <td><?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_per_weight_charge'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'weight', $this->_tpl_vars['config']['General']['weight_symbol']) : smarty_modifier_substitute($_tmp, 'weight', $this->_tpl_vars['config']['General']['weight_symbol'])); ?>
 (<?php echo $this->_tpl_vars['config']['General']['currency_symbol']; ?>
):</td>
  <td nowrap="nowrap"><input type="text" name="posted_data[<?php echo $this->_tpl_vars['shipping_rate']['rateid']; ?>
][weight_rate]" size="5" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_rate']['weight_rate'])) ? $this->_run_mod_handler('formatprice', true, $_tmp) : smarty_modifier_formatprice($_tmp)); ?>
" /></td>
</tr>

<?php if (! $this->_sections['rate']['last']): ?>
<tr>
  <td colspan="7" class="SubHeaderGreyLine"><img src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/spacer.gif" class="Spc" alt="" /></td>
</tr>
<?php endif; ?>

<?php endfor; endif; ?>

</table>
  </td>
</tr>

<?php endforeach; endif; unset($_from); ?>
<?php $this->_smarty_vars['capture']['rates_list'] = ob_get_contents(); ob_end_clean(); ?>

<?php if ($this->_smarty_vars['capture']['rates_list']): ?>
<?php echo $this->_smarty_vars['capture']['rates_list']; ?>

<tr>
  <td>&nbsp;</td>
</tr>
<?php else: ?>
<tr>
  <td><?php if ($this->_tpl_vars['type'] == 'D'): ?><?php echo $this->_tpl_vars['lng']['lbl_no_shipping_rates_defined']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lng']['lbl_no_shipping_markups_defined']; ?>
<?php endif; ?></td>
</tr>
<?php endif; ?>

<?php endif; ?>

<?php endfor; endif; ?>

<tr>
  <td>
<input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_delete_selected'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: if (checkMarks(this.form, new RegExp('posted_data\\[[0-9]+\\]\\[to_delete\\]', 'gi'))) submitForm(this, 'delete');" />
&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_update'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
  </td>
</tr>

</table>
</form>

<br /><br /><br />

<a name="addrate"></a>

<?php endif; ?>

<br />
<?php if ($this->_tpl_vars['type'] == 'D'): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/subheader.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_add_shipping_charge_values'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/subheader.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_add_shipping_markup_values'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?>

<?php if ($this->_tpl_vars['shipping'] != ""): ?>

<form action="shipping_rates.php" method="post" name="addshippingrate">
<input type="hidden" name="mode" value="add" />
<input type="hidden" name="zoneid" value="<?php echo $this->_tpl_vars['zoneid']; ?>
" />
<input type="hidden" name="shippingid" value="<?php echo $this->_tpl_vars['shippingid']; ?>
" />
<input type="hidden" name="type" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['type'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />

<table cellpadding="0" cellspacing="3">

<tr>
  <td><b><?php echo $this->_tpl_vars['lng']['lbl_shipping_method']; ?>
:</b></td>
  <td>&nbsp;</td>
  <td>
  <select name="shippingid_new">
    <option value=""><?php echo $this->_tpl_vars['lng']['lbl_select_one']; ?>
</option>
<?php unset($this->_sections['ship_num']);
$this->_sections['ship_num']['name'] = 'ship_num';
$this->_sections['ship_num']['loop'] = is_array($_loop=$this->_tpl_vars['shipping']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ship_num']['show'] = true;
$this->_sections['ship_num']['max'] = $this->_sections['ship_num']['loop'];
$this->_sections['ship_num']['step'] = 1;
$this->_sections['ship_num']['start'] = $this->_sections['ship_num']['step'] > 0 ? 0 : $this->_sections['ship_num']['loop']-1;
if ($this->_sections['ship_num']['show']) {
    $this->_sections['ship_num']['total'] = $this->_sections['ship_num']['loop'];
    if ($this->_sections['ship_num']['total'] == 0)
        $this->_sections['ship_num']['show'] = false;
} else
    $this->_sections['ship_num']['total'] = 0;
if ($this->_sections['ship_num']['show']):

            for ($this->_sections['ship_num']['index'] = $this->_sections['ship_num']['start'], $this->_sections['ship_num']['iteration'] = 1;
                 $this->_sections['ship_num']['iteration'] <= $this->_sections['ship_num']['total'];
                 $this->_sections['ship_num']['index'] += $this->_sections['ship_num']['step'], $this->_sections['ship_num']['iteration']++):
$this->_sections['ship_num']['rownum'] = $this->_sections['ship_num']['iteration'];
$this->_sections['ship_num']['index_prev'] = $this->_sections['ship_num']['index'] - $this->_sections['ship_num']['step'];
$this->_sections['ship_num']['index_next'] = $this->_sections['ship_num']['index'] + $this->_sections['ship_num']['step'];
$this->_sections['ship_num']['first']      = ($this->_sections['ship_num']['iteration'] == 1);
$this->_sections['ship_num']['last']       = ($this->_sections['ship_num']['iteration'] == $this->_sections['ship_num']['total']);
?>
    <option value="<?php echo $this->_tpl_vars['shipping'][$this->_sections['ship_num']['index']]['shippingid']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['shipping'][$this->_sections['ship_num']['index']]['shipping'])) ? $this->_run_mod_handler('trademark', true, $_tmp) : smarty_modifier_trademark($_tmp)); ?>
 (<?php if ($this->_tpl_vars['shipping'][$this->_sections['ship_num']['index']]['destination'] == 'I'): ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_intl'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php else: ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_national'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>)</option>
<?php endfor; endif; ?>
  </select>
  </td>
</tr>

<tr>
  <td><b><?php echo $this->_tpl_vars['lng']['lbl_zone']; ?>
:</b></td>
  <td>&nbsp;</td>
  <td>
  <select name="zoneid_new">
<?php unset($this->_sections['zone']);
$this->_sections['zone']['name'] = 'zone';
$this->_sections['zone']['loop'] = is_array($_loop=$this->_tpl_vars['zones']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['zone']['show'] = true;
$this->_sections['zone']['max'] = $this->_sections['zone']['loop'];
$this->_sections['zone']['step'] = 1;
$this->_sections['zone']['start'] = $this->_sections['zone']['step'] > 0 ? 0 : $this->_sections['zone']['loop']-1;
if ($this->_sections['zone']['show']) {
    $this->_sections['zone']['total'] = $this->_sections['zone']['loop'];
    if ($this->_sections['zone']['total'] == 0)
        $this->_sections['zone']['show'] = false;
} else
    $this->_sections['zone']['total'] = 0;
if ($this->_sections['zone']['show']):

            for ($this->_sections['zone']['index'] = $this->_sections['zone']['start'], $this->_sections['zone']['iteration'] = 1;
                 $this->_sections['zone']['iteration'] <= $this->_sections['zone']['total'];
                 $this->_sections['zone']['index'] += $this->_sections['zone']['step'], $this->_sections['zone']['iteration']++):
$this->_sections['zone']['rownum'] = $this->_sections['zone']['iteration'];
$this->_sections['zone']['index_prev'] = $this->_sections['zone']['index'] - $this->_sections['zone']['step'];
$this->_sections['zone']['index_next'] = $this->_sections['zone']['index'] + $this->_sections['zone']['step'];
$this->_sections['zone']['first']      = ($this->_sections['zone']['iteration'] == 1);
$this->_sections['zone']['last']       = ($this->_sections['zone']['iteration'] == $this->_sections['zone']['total']);
?>
    <option value="<?php echo $this->_tpl_vars['zones'][$this->_sections['zone']['index']]['zoneid']; ?>
"<?php if ($_GET['zoneid'] == $this->_tpl_vars['zones'][$this->_sections['zone']['index']]['zoneid']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['zones'][$this->_sections['zone']['index']]['zone']; ?>
</option>
<?php endfor; endif; ?>
  </select>
  </td>
</tr>

<tr>
  <td><b><?php echo $this->_tpl_vars['lng']['lbl_apply_rate_to']; ?>
:</b></td>
  <td>&nbsp;</td>
  <td>
  <select name="apply_to_new">
    <option value="DST" selected="selected">DST (<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_discounted_subtotal'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
)</option>
    <option value="ST">ST (<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_subtotal'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
)</option>
  </select>
  </td>
</tr>

</table>

<table cellpadding="0" cellspacing="3" width="100%">

<tr>
  <td><b><?php echo $this->_tpl_vars['lng']['lbl_weight_range']; ?>
:</b></td>
  <td nowrap="nowrap">
<input type="text" name="minweight_new" size="9" value="<?php echo ((is_array($_tmp=0)) ? $this->_run_mod_handler('formatprice', true, $_tmp) : smarty_modifier_formatprice($_tmp)); ?>
" />
-
<input type="text" name="maxweight_new" size="9" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['maxvalue'])) ? $this->_run_mod_handler('formatprice', true, $_tmp) : smarty_modifier_formatprice($_tmp)); ?>
" />
  </td>
  <td><b><?php echo $this->_tpl_vars['lng']['lbl_flat_charge']; ?>
 (<?php echo $this->_tpl_vars['config']['General']['currency_symbol']; ?>
):</b></td>
  <td nowrap="nowrap"><input type="text" name="rate_new" size="5" value="<?php echo ((is_array($_tmp=0)) ? $this->_run_mod_handler('formatprice', true, $_tmp) : smarty_modifier_formatprice($_tmp)); ?>
" /></td>
  <td><b><?php echo $this->_tpl_vars['lng']['lbl_percent_charge']; ?>
:</b></td>
  <td><input type="text" name="rate_p_new" size="5" value="<?php echo ((is_array($_tmp=0)) ? $this->_run_mod_handler('formatprice', true, $_tmp) : smarty_modifier_formatprice($_tmp)); ?>
" /></td>
</tr>

<tr>
  <td><b><?php echo $this->_tpl_vars['lng']['lbl_subtotal_range']; ?>
:</b></td>
  <td nowrap="nowrap">
<input type="text" name="mintotal_new" size="9" value="<?php echo ((is_array($_tmp=0)) ? $this->_run_mod_handler('formatprice', true, $_tmp) : smarty_modifier_formatprice($_tmp)); ?>
" />
-
<input type="text" name="maxtotal_new" size="9" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['maxvalue'])) ? $this->_run_mod_handler('formatprice', true, $_tmp) : smarty_modifier_formatprice($_tmp)); ?>
" />
  </td>
  <td><b><?php echo $this->_tpl_vars['lng']['lbl_per_item_charge']; ?>
 (<?php echo $this->_tpl_vars['config']['General']['currency_symbol']; ?>
):</b></td>
  <td nowrap="nowrap"><input type="text" name="item_rate_new" size="5" value="<?php echo ((is_array($_tmp=0)) ? $this->_run_mod_handler('formatprice', true, $_tmp) : smarty_modifier_formatprice($_tmp)); ?>
" /></td>
  <td><b><?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_per_weight_charge'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'weight', $this->_tpl_vars['config']['General']['weight_symbol']) : smarty_modifier_substitute($_tmp, 'weight', $this->_tpl_vars['config']['General']['weight_symbol'])); ?>
 (<?php echo $this->_tpl_vars['config']['General']['currency_symbol']; ?>
):</b></td>
  <td nowrap="nowrap"><input type="text" name="weight_rate_new" size="5" value="<?php echo ((is_array($_tmp=0)) ? $this->_run_mod_handler('formatprice', true, $_tmp) : smarty_modifier_formatprice($_tmp)); ?>
" /></td>
</tr>

</table>

<br />
<input type="submit" value=" <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_add'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 " />

</form>

<?php elseif ($this->_tpl_vars['type'] == 'D'): ?>

<?php echo $this->_tpl_vars['lng']['txt_shipping_charge_rtc_note']; ?>


<?php endif; ?>

<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
<?php if ($this->_tpl_vars['type'] == 'D'): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_shipping_charges'],'content' => $this->_smarty_vars['capture']['dialog'],'extra' => 'width="100%"')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_shipping_markups'],'content' => $this->_smarty_vars['capture']['dialog'],'extra' => 'width="100%"')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
