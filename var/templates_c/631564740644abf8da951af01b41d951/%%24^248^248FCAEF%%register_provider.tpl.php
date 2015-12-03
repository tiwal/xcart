<?php /* Smarty version 2.6.26, created on 2015-12-02 18:53:03
         compiled from provider/main/register_provider.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'provider/main/register_provider.tpl', 22, false),array('modifier', 'amp', 'provider/main/register_provider.tpl', 108, false),array('modifier', 'default', 'provider/main/register_provider.tpl', 151, false),array('modifier', 'substitute', 'provider/main/register_provider.tpl', 186, false),)), $this); ?>

<?php ob_start(); ?>

<?php echo $this->_tpl_vars['lng']['txt_seller_address_note']; ?>


<br />
<br />

<?php $this->assign('reg_error', $this->_tpl_vars['top_message']['reg_error']); ?>

<?php if ($this->_tpl_vars['config']['Shipping']['allow_change_seller_address'] != 'Y' && $this->_tpl_vars['main'] != 'user_profile'): ?>

<table cellspacing="1" cellpadding="2" width="100%">

<tr>
<td align="right" nowrap="nowrap" width="40%"><?php echo $this->_tpl_vars['lng']['lbl_address']; ?>
:</td>
<td nowrap="nowrap">
<?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['seller_address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

</td>
</tr>

<tr>
<td align="right"><?php echo $this->_tpl_vars['lng']['lbl_address_2']; ?>
:</td>
<td nowrap="nowrap">
<?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['seller_address_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

</td>
</tr>

<tr>
<td align="right"><?php echo $this->_tpl_vars['lng']['lbl_city']; ?>
:</td>
<td nowrap="nowrap">
<?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['seller_city'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

</td>
</tr>

<tr>
<td align="right"><?php echo $this->_tpl_vars['lng']['lbl_state']; ?>
:</td>
<td nowrap="nowrap">
<?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['seller_statename'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

</td>
</tr>

<tr>
<td align="right"><?php echo $this->_tpl_vars['lng']['lbl_country']; ?>
:</td>
<td nowrap="nowrap">
<?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['seller_countryname'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

</td>
</tr>

<tr>
<td align="right"><?php echo $this->_tpl_vars['lng']['lbl_zip_code']; ?>
:</td>
<td nowrap="nowrap">
<?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['seller_zipcode'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

</td>
</tr>

<?php if ($this->_tpl_vars['userinfo']['need_arb_info'] == 'Y'): ?>

<tr>
<td colspan="2" align="center"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/subheader.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_arb_provider_section'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>

<tr>
<td align="right"><?php echo $this->_tpl_vars['lng']['opt_ARB_id']; ?>
:</td>
<td nowrap="nowrap">
<?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['seller_arb_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

</td>
</tr>

<tr>
<td align="right"><?php echo $this->_tpl_vars['lng']['opt_ARB_password']; ?>
:</td>
<td nowrap="nowrap">
<?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['seller_arb_password'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

</td>
</tr>

<tr>
<td align="right"><?php echo $this->_tpl_vars['lng']['opt_ARB_account']; ?>
:</td>
<td nowrap="nowrap">
<?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['seller_arb_account'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

</td>
</tr>

<tr>
<td align="right"><?php echo $this->_tpl_vars['lng']['opt_ARB_shipping_key']; ?>
:</td>
<td nowrap="nowrap">
<?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['seller_arb_shipping_key'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

</td>
</tr>

<tr>
<td align="right"><?php echo $this->_tpl_vars['lng']['opt_ARB_shipping_key_intl']; ?>
:</td>
<td nowrap="nowrap">
<?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['seller_arb_shipping_key_intl'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

</td>
</tr>

<?php endif; ?>

</table>

<?php else: ?>

<form action="<?php echo $this->_tpl_vars['register_script_name']; ?>
?<?php echo ((is_array($_tmp=$_SERVER['QUERY_STRING'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
" method="post" name="registerform" onsubmit="javascript: if (check_zip_code() && checkRequired(requiredFields)) return true; else return false;">
<?php if ($this->_tpl_vars['config']['Security']['use_https_login'] == 'Y'): ?>
<input type="hidden" name="<?php echo $this->_tpl_vars['XCARTSESSNAME']; ?>
" value="<?php echo $this->_tpl_vars['XCARTSESSID']; ?>
" />
<?php endif; ?>

<?php if ($_GET['mode'] == 'update'): ?>
<input type="hidden" name="mode" value="update" />
<?php endif; ?>
<input type="hidden" name="submode" value="seller_address" />

<table cellspacing="1" cellpadding="2" width="100%">

<tr>
<td align="right" width="40%"><?php echo $this->_tpl_vars['lng']['lbl_address']; ?>
</td>
<td width="1"><?php if ($this->_tpl_vars['default_fields']['address']['required'] == 'Y'): ?><font class="Star">*</font><?php else: ?>&nbsp;<?php endif; ?></td>
<td nowrap="nowrap">
<input type="text" id="address" name="address" size="32" maxlength="255" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['seller_address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<?php if ($this->_tpl_vars['reg_error'] != "" && $this->_tpl_vars['default_fields']['address']['required'] == 'Y' && $this->_tpl_vars['userinfo']['seller_address'] == ""): ?><font class="Star">&lt;&lt;</font><?php endif; ?>
</td>
</tr>

<tr>
<td align="right"><?php echo $this->_tpl_vars['lng']['lbl_address_2']; ?>
</td>
<td><?php if ($this->_tpl_vars['default_fields']['address']['required'] == 'Y'): ?><font class="Star">*</font><?php else: ?>&nbsp;<?php endif; ?></td>
<td nowrap="nowrap">
<input type="text" id="address_2" name="address_2" size="32" maxlength="255" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['seller_address_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<?php if ($this->_tpl_vars['reg_error'] != "" && $this->_tpl_vars['default_fields']['address_2']['required'] == 'Y' && $this->_tpl_vars['userinfo']['seller_address_2'] == ""): ?><font class="Star">&lt;&lt;</font><?php endif; ?>
</td>
</tr>

<tr>
<td align="right"><?php echo $this->_tpl_vars['lng']['lbl_city']; ?>
</td>
<td><?php if ($this->_tpl_vars['default_fields']['city']['required'] == 'Y'): ?><font class="Star">*</font><?php else: ?>&nbsp;<?php endif; ?></td>
<td nowrap="nowrap">
<input type="text" id="city" name="city" size="32" maxlength="255" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['seller_city'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<?php if ($this->_tpl_vars['reg_error'] != "" && $this->_tpl_vars['default_fields']['city']['required'] == 'Y' && $this->_tpl_vars['userinfo']['seller_city'] == ""): ?><font class="Star">&lt;&lt;</font><?php endif; ?>
</td>
</tr>

<tr>
<td align="right"><?php echo $this->_tpl_vars['lng']['lbl_state']; ?>
</td>
<td><?php if ($this->_tpl_vars['default_fields']['state']['required'] == 'Y'): ?><font class="Star">*</font><?php else: ?>&nbsp;<?php endif; ?></td>
<td nowrap="nowrap">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/states.tpl", 'smarty_include_vars' => array('states' => $this->_tpl_vars['states'],'name' => 'state','default' => ((is_array($_tmp=@$this->_tpl_vars['userinfo']['seller_state'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['config']['General']['default_state']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['config']['General']['default_state'])),'default_country' => ((is_array($_tmp=@$this->_tpl_vars['userinfo']['seller_country'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['config']['General']['default_country']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['config']['General']['default_country'])),'country_name' => 'country')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if (( $this->_tpl_vars['reg_error'] != "" && $this->_tpl_vars['default_fields']['state']['required'] == 'Y' && $this->_tpl_vars['userinfo']['seller_state'] == "" && $this->_tpl_vars['userinfo']['s_display_states'] ) || $this->_tpl_vars['error'] == 'statecode'): ?><font class="Star">&lt;&lt;</font><?php endif; ?>
</td>
</tr>

<tr>
<td align="right"><?php echo $this->_tpl_vars['lng']['lbl_country']; ?>
</td>
<td><?php if ($this->_tpl_vars['default_fields']['country']['required'] == 'Y'): ?><font class="Star">*</font><?php else: ?>&nbsp;<?php endif; ?></td>
<td nowrap="nowrap">
<select name="country" id="country" size="1" onchange="check_zip_code()">
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
"<?php if ($this->_tpl_vars['userinfo']['seller_country'] == $this->_tpl_vars['countries'][$this->_sections['country_idx']['index']]['country_code']): ?> selected="selected"<?php elseif ($this->_tpl_vars['countries'][$this->_sections['country_idx']['index']]['country_code'] == $this->_tpl_vars['config']['General']['default_country'] && $this->_tpl_vars['userinfo']['seller_country'] == ""): ?> selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['countries'][$this->_sections['country_idx']['index']]['country'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
</option>
<?php endfor; endif; ?>
</select>
<?php if ($this->_tpl_vars['reg_error'] != "" && $this->_tpl_vars['default_fields']['country']['required'] == 'Y' && $this->_tpl_vars['userinfo']['seller_country'] == ""): ?><font class="Star">&lt;&lt;</font><?php endif; ?>
</td>
</tr>

<tr style="display: none;">
  <td>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/register_states.tpl", 'smarty_include_vars' => array('state_name' => 'state','country_name' => 'country','county_name' => 'county','state_value' => ((is_array($_tmp=@$this->_tpl_vars['userinfo']['seller_state'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['config']['General']['default_state']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['config']['General']['default_state'])),'county_value' => $this->_tpl_vars['userinfo']['seller_county'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
   </td>
</tr>

<tr>
<td align="right"><?php echo $this->_tpl_vars['lng']['lbl_zip_code']; ?>
</td>
<td><?php if ($this->_tpl_vars['default_fields']['zipcode']['required'] == 'Y'): ?><font class="Star">*</font><?php else: ?>&nbsp;<?php endif; ?></td>
<td nowrap="nowrap">
<input type="text" id="zipcode" name="zipcode" size="32" maxlength="32" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['seller_zipcode'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onchange="check_zip_code()" />
<?php if ($this->_tpl_vars['reg_error'] != "" && $this->_tpl_vars['default_fields']['zipcode']['required'] == 'Y' && $this->_tpl_vars['userinfo']['seller_zipcode'] == ""): ?><font class="Star">&lt;&lt;</font><?php endif; ?>
</td>
</tr>

<tr>
<td colspan="3">
<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_company_location_country_provider_note'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'X', $this->_tpl_vars['config']['Company']['location_country_name']) : smarty_modifier_substitute($_tmp, 'X', $this->_tpl_vars['config']['Company']['location_country_name'])); ?>

<?php if ($this->_tpl_vars['userinfo']['seller_country'] != $this->_tpl_vars['config']['Company']['location_country'] && $this->_tpl_vars['userinfo']['seller_country'] != ""): ?><br />
<font class="Star">
<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_company_location_country_provider_warning'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'X', $this->_tpl_vars['config']['Company']['location_country_name']) : smarty_modifier_substitute($_tmp, 'X', $this->_tpl_vars['config']['Company']['location_country_name'])); ?>

</font>
<?php endif; ?>
</td>
</tr>

<?php if ($this->_tpl_vars['userinfo']['need_arb_info'] == 'Y'): ?>

<tr>
<td colspan="3" align="center"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/subheader.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_arb_provider_section'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>

<tr>
<td align="right"><?php echo $this->_tpl_vars['lng']['opt_ARB_id']; ?>
:</td>
<td>&nbsp;</td>
<td nowrap="nowrap">
<input type="text" name="arb_id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['seller_arb_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
</td>
</tr>

<tr>
<td align="right"><?php echo $this->_tpl_vars['lng']['opt_ARB_password']; ?>
:</td>
<td>&nbsp;</td>
<td nowrap="nowrap">
<input type="text" name="arb_password" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['seller_arb_password'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
</td>
</tr>

<tr>
<td align="right"><?php echo $this->_tpl_vars['lng']['opt_ARB_account']; ?>
:</td>
<td>&nbsp;</td>
<td nowrap="nowrap">
<input type="text" name="arb_account" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['seller_arb_account'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
</td>
</tr>

<tr>
<td align="right"><?php echo $this->_tpl_vars['lng']['opt_ARB_shipping_key']; ?>
:</td>
<td>&nbsp;</td>
<td nowrap="nowrap">
<input type="text" name="arb_shipping_key" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['seller_arb_shipping_key'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
</td>
</tr>

<tr>
<td align="right"><?php echo $this->_tpl_vars['lng']['opt_ARB_shipping_key_intl']; ?>
:</td>
<td>&nbsp;</td>
<td nowrap="nowrap">
<input type="text" name="arb_shipping_key_intl" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['seller_arb_shipping_key_intl'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
</td>
</tr>

<tr>
<td colspan="3" align="left"><b><?php echo $this->_tpl_vars['lng']['lbl_note']; ?>
:</b> <?php echo $this->_tpl_vars['lng']['lbl_arb_provider_note']; ?>
</td>
</tr>

<?php endif; ?>

<tr>
<td colspan="2">&nbsp;</td>
<td><br /><input type="submit" value=" <?php echo $this->_tpl_vars['lng']['lbl_save']; ?>
 " /></td>
</tr>

</table>

</form>
<?php endif; ?>
<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_seller_address'],'content' => $this->_smarty_vars['capture']['dialog'],'extra' => 'width="100%"')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>