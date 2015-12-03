<?php /* Smarty version 2.6.26, created on 2015-12-02 19:05:42
         compiled from admin/main/users.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'admin/main/users.tpl', 23, false),array('modifier', 'cat', 'admin/main/users.tpl', 37, false),array('modifier', 'escape', 'admin/main/users.tpl', 144, false),array('modifier', 'strip_tags', 'admin/main/users.tpl', 146, false),array('modifier', 'wm_remove', 'admin/main/users.tpl', 206, false),array('modifier', 'default', 'admin/main/users.tpl', 346, false),array('modifier', 'substitute', 'admin/main/users.tpl', 413, false),array('modifier', 'amp', 'admin/main/users.tpl', 442, false),array('function', 'interline', 'admin/main/users.tpl', 475, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page_title.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_users_management'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo $this->_tpl_vars['lng']['txt_users_management_top_text']; ?>


<br /><br />

<?php if ($this->_tpl_vars['mode'] == "" || $this->_tpl_vars['users'] == ""): ?>

<script type="text/javascript" src="<?php echo $this->_tpl_vars['SkinDir']; ?>
/js/reset.js"></script>
<script type="text/javascript">
//<![CDATA[
var searchform_def = [
  ['posted_data[substring]', ''],
  ['posted_data[by_username]', true],
  ['posted_data[by_firstname]', true],
  ['posted_data[by_lastname]', true],
  ['posted_data[by_email]', true],
  ['posted_data[by_company]', true],
  ['f_start_date', '<?php echo ((is_array($_tmp=XC_TIME)) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['config']['Appearance']['date_format']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['config']['Appearance']['date_format'])); ?>
'],
  ['f_end_date', '<?php echo ((is_array($_tmp=XC_TIME)) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['config']['Appearance']['date_format']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['config']['Appearance']['date_format'])); ?>
'],
  ['posted_data[is_export]', false],
<?php $this->assign('selected_membershipid', ""); ?>
<?php if ($this->_tpl_vars['config']['General']['membership_signup'] == 'Y' && $this->_tpl_vars['search_prefilled']['usertype'] == "" && $this->_tpl_vars['search_prefilled']['membershipid'] == 'pending_membership'): ?>

<?php $this->assign('selected_membershipid', "-pending_membership"); ?>

<?php else: ?>

<?php $_from = $this->_tpl_vars['memberships']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['lvls']):
?>

<?php if ($this->_tpl_vars['search_prefilled']['usertype'] == $this->_tpl_vars['k'] && $this->_tpl_vars['search_prefilled']['membershipid'] == ''): ?>

<?php $this->assign('selected_membershipid', ((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('cat', true, $_tmp, "-") : smarty_modifier_cat($_tmp, "-"))); ?>

<?php elseif ($this->_tpl_vars['config']['General']['membership_signup'] == 'Y' && $this->_tpl_vars['lvls'] != '' && $this->_tpl_vars['search_prefilled']['usertype'] == $this->_tpl_vars['k'] && $this->_tpl_vars['search_prefilled']['membershipid'] == 'pending_membership'): ?>

<?php $this->assign('selected_membershipid', ((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('cat', true, $_tmp, "-pending_membership") : smarty_modifier_cat($_tmp, "-pending_membership"))); ?>

<?php else: ?>

<?php $_from = $this->_tpl_vars['lvls']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
<?php if ($this->_tpl_vars['search_prefilled']['usertype'] == $this->_tpl_vars['k'] && $this->_tpl_vars['search_prefilled']['membershipid'] == $this->_tpl_vars['v']['membershipid']): ?>
<?php $this->assign('selected_membershipid', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('cat', true, $_tmp, "-") : smarty_modifier_cat($_tmp, "-")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['v']['membershipid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['v']['membershipid']))); ?>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

<?php endif; ?>

<?php endforeach; endif; unset($_from); ?>

<?php endif; ?>
  ['posted_data[membershipid]', ''],
  ['posted_data[address_type]', ''],
  ['posted_data[city]', ''],
  ['posted_data[state]', ''],
  ['posted_data[country]', ''],
  ['posted_data[zipcode]', ''],
  ['posted_data[phone]', ''],
  ['posted_data[url]', ''],
  ['posted_data[registration_date]', ''],
  ['posted_data[last_login_date]', ''],
  ['posted_data[suspended_by_admin]', ''],
  ['posted_data[auto_suspended]', ''],
  ['posted_data[orders_min]', ''],
  ['posted_data[orders_max]', ''],
  ['posted_data[date_period]', 'M']
];
//]]>
</script>

<?php echo $this->_tpl_vars['lng']['txt_search_users_text']; ?>


<br /><br />

<!-- SEARCH FORM START -->

<script type="text/javascript" language="JavaScript 1.2">
//<![CDATA[
var date_selected = '<?php if ($this->_tpl_vars['search_prefilled']['date_period'] == "" || $this->_tpl_vars['search_prefilled']['date_period'] == 'M'): ?>M<?php else: ?><?php echo $this->_tpl_vars['search_prefilled']['date_period']; ?>
<?php endif; ?>';
<?php echo '
function managedate(type, status) {

  if (type == \'address\')
    var fields = new Array(\'posted_data[city]\',\'posted_data[state]\',\'posted_data[country]\',\'posted_data[zipcode]\', \'posted_data[phone]\');
  else if (type == \'date\')
    var fields = new Array(\'f_start_date\', \'f_end_date\');
  else if (type == \'date_type\') {
    status = document.searchform.elements[\'posted_data[registration_date]\'].checked + document.searchform.elements[\'posted_data[last_login_date]\'].checked + document.searchform.elements[\'posted_data[suspended_by_admin]\'].checked + document.searchform.elements[\'posted_data[auto_suspended]\'].checked;
    status = !(status != 0);
  
    for (var i = 0; i < document.searchform.elements.length; i++)
      if (document.searchform.elements[i].name == \'posted_data[date_period]\') {
        if (status) {
          $(\'[name="posted_data[date_period]"]\').prop("disabled", true).addClass( \'ui-state-disabled\' );
        } else {
          $(\'[name="posted_data[date_period]"]\').prop("disabled", false).removeClass( \'ui-state-disabled\' );
        }
      }
  
    disable_dates = false;
    
    if (status)
      disable_dates = true;
    else if (date_selected != \'C\')
      disable_dates = true;
    
    managedate(\'date\', disable_dates);
    return true;

  }
  
  for (var i in fields) {
    if (status) {
      $(\'[name="\' + fields[i] + \'"]\').prop("disabled", true).addClass( \'ui-state-disabled\' );
    } else {
      $(\'[name="\' + fields[i] + \'"]\').prop("disabled", false).removeClass( \'ui-state-disabled\' );
    }
  }
}
'; ?>

//]]>
</script>

<?php ob_start(); ?>

<br />

<form name="searchform" action="users.php" method="post">

<table cellpadding="0" cellspacing="0" width="100%">

<tr>
  <td>

<table cellpadding="1" cellspacing="5" width="100%">

<tr>
  <td height="10" width="20%" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_search_for_pattern']; ?>
:</td>
  <td height="10">
  <input type="text" name="posted_data[substring]" size="30" style="width:70%" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['substring'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
  &nbsp;
  <input type="submit" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_search'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
  </td>
</tr>

<tr>
  <td height="10" class="FormButton"><?php echo $this->_tpl_vars['lng']['lbl_search_in']; ?>
:</td>
  <td>
<table cellpadding="0" cellspacing="0">
<tr>
  <td width="5"><input type="checkbox" id="posted_data_by_username" name="posted_data[by_username]"<?php if ($this->_tpl_vars['search_prefilled'] == "" || $this->_tpl_vars['search_prefilled']['by_username']): ?> checked="checked"<?php endif; ?> /></td>
  <td class="OptionLabel"><label for="posted_data_by_username"><?php echo $this->_tpl_vars['lng']['lbl_username']; ?>
</label></td>

  <td width="5"><input type="checkbox" id="posted_data_by_firstname" name="posted_data[by_firstname]"<?php if ($this->_tpl_vars['search_prefilled'] == "" || $this->_tpl_vars['search_prefilled']['by_firstname']): ?> checked="checked"<?php endif; ?> /></td>
  <td class="OptionLabel"><label for="posted_data_by_firstname"><?php echo $this->_tpl_vars['lng']['lbl_first_name']; ?>
</label></td>

  <td width="5"><input type="checkbox" id="posted_data_by_lastname" name="posted_data[by_lastname]"<?php if ($this->_tpl_vars['search_prefilled'] == "" || $this->_tpl_vars['search_prefilled']['by_lastname']): ?> checked="checked"<?php endif; ?> /></td>
  <td class="OptionLabel"><label for="posted_data_by_lastname"><?php echo $this->_tpl_vars['lng']['lbl_last_name']; ?>
</label></td>

  <td width="5"><input type="checkbox" id="posted_data_by_email" name="posted_data[by_email]"<?php if ($this->_tpl_vars['search_prefilled'] == "" || $this->_tpl_vars['search_prefilled']['by_email']): ?> checked="checked"<?php endif; ?> /></td>
  <td class="OptionLabel"><label for="posted_data_by_email"><?php echo $this->_tpl_vars['lng']['lbl_email']; ?>
</label></td>

  <td width="5"><input type="checkbox" id="posted_data_by_company" name="posted_data[by_company]"<?php if ($this->_tpl_vars['search_prefilled'] == "" || $this->_tpl_vars['search_prefilled']['by_company']): ?> checked="checked"<?php endif; ?> /></td>
  <td class="OptionLabel"><label for="posted_data_by_company"><?php echo $this->_tpl_vars['lng']['lbl_company']; ?>
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

<table cellpadding="1" cellspacing="5" width="100%" style="display: none;" id="box1">

<tr class="TableSubHead">
  <td height="10" class="FormButton" width="20%" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_search_for_user_type']; ?>
:</td>
  <td height="10">
  <select name="posted_data[membershipid]">
    <option value=""><?php echo $this->_tpl_vars['lng']['lbl_all']; ?>
</option>
<?php if ($this->_tpl_vars['config']['General']['membership_signup'] == 'Y'): ?>
    <option value="-pending_membership"<?php if ($this->_tpl_vars['search_prefilled']['usertype'] == "" && $this->_tpl_vars['search_prefilled']['membershipid'] == 'pending_membership'): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_pending_membership']; ?>
</option>
<?php endif; ?>
<?php $_from = $this->_tpl_vars['memberships']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['lvls']):
?>
    <option value="<?php echo $this->_tpl_vars['k']; ?>
-"<?php if ($this->_tpl_vars['search_prefilled']['usertype'] == $this->_tpl_vars['k'] && $this->_tpl_vars['search_prefilled']['membershipid'] == ''): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['memberships_lbls'][$this->_tpl_vars['k']]; ?>
</option>
<?php if ($this->_tpl_vars['config']['General']['membership_signup'] == 'Y' && $this->_tpl_vars['lvls'] != ''): ?>
    <option value="<?php echo $this->_tpl_vars['k']; ?>
-pending_membership"<?php if ($this->_tpl_vars['search_prefilled']['usertype'] == $this->_tpl_vars['k'] && $this->_tpl_vars['search_prefilled']['membershipid'] == 'pending_membership'): ?> selected="selected" <?php endif; ?>>&nbsp;&nbsp;&nbsp;<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_pending_membership'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endif; ?>
<?php $_from = $this->_tpl_vars['lvls']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
    <option value="<?php echo $this->_tpl_vars['k']; ?>
-<?php echo $this->_tpl_vars['v']['membershipid']; ?>
"<?php if ($this->_tpl_vars['search_prefilled']['usertype'] == $this->_tpl_vars['k'] && $this->_tpl_vars['search_prefilled']['membershipid'] == $this->_tpl_vars['v']['membershipid']): ?> selected="selected"<?php endif; ?>>&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['v']['membership']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
<?php endforeach; endif; unset($_from); ?>
  </select>
  </td>
</tr>

<tr>
  <td height="10" width="20%" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_search_by_address']; ?>
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

  <td width="5"><input type="radio" id="address_type_all" name="posted_data[address_type]" value="All"<?php if ($this->_tpl_vars['search_prefilled']['address_type'] == 'All'): ?> checked="checked"<?php endif; ?> onclick="javascript:managedate('address',false)" /></td>
  <td class="OptionLabel"><label for="address_type_all"><?php echo $this->_tpl_vars['lng']['lbl_all']; ?>
</label></td>
</tr>
</table>
  </td>
</tr>

<tr>
  <td height="10" width="20%" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_city']; ?>
:</td>
  <td height="10" width="80%">
  <input type="text" maxlength="128" name="posted_data[city]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['city'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" style="width:70%" />
  </td>
</tr>

<tr>
  <td height="10" width="20%" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_state']; ?>
:</td>
  <td height="10" width="80%">
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/states.tpl", 'smarty_include_vars' => array('states' => $this->_tpl_vars['states'],'name' => "posted_data[state]",'default' => $this->_tpl_vars['search_prefilled']['state'],'required' => 'N','style' => "style='width:70%'")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </td>
</tr>

<tr>
  <td height="10" width="20%" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_country']; ?>
:</td>
  <td height="10" width="80%">
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
  <td height="10" width="20%" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_zip_code']; ?>
:</td>
  <td height="10" width="80%">
  <input type="text" maxlength="32" name="posted_data[zipcode]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['zipcode'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" style="width:70%" />
  </td>
</tr>

<tr>
  <td height="10" width="20%" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_phone']; ?>
/<?php echo $this->_tpl_vars['lng']['lbl_fax']; ?>
:</td>
  <td height="10" width="80%">
  <input type="text" maxlength="32" name="posted_data[phone]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['phone'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" style="width:70%" />
  </td>
</tr>

<tr>
  <td height="10" width="20%" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_web_site']; ?>
:</td>
  <td height="10" width="80%">
  <input type="text" maxlength="255" name="posted_data[url]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" style="width:70%" />
  </td>
</tr>

<tr>
  <td height="10" width="20%" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_orders']; ?>
:</td>
  <td height="10" width="80%">
  <table cellpadding="0" cellspacing="0"><tr>
  <td><input type="text" maxlength="18" name="posted_data[orders_min]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['orders_min'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  <td> - </td>
  <td><input type="text" maxlength="18" name="posted_data[orders_max]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_prefilled']['orders_max'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr></table>
  </td>
</tr>

<tr class="TableSubHead">
  <td height="10" class="FormButton"><?php echo $this->_tpl_vars['lng']['lbl_search_for_users_that_is']; ?>
:</td>
  <td height="10">
<table cellpadding="0" cellspacing="0">
<tr>
  <td width="5"><input type="checkbox" id="posted_data_registration_date" name="posted_data[registration_date]" value="Y"<?php if ($this->_tpl_vars['search_prefilled']['registration_date'] != ""): ?> checked="checked"<?php endif; ?> onclick="javascript: managedate('date_type')" /></td>
  <td class="OptionLabel"><label for="posted_data_registration_date"><?php echo $this->_tpl_vars['lng']['lbl_registered']; ?>
</label></td>

  <td width="5"><input type="checkbox" id="posted_data_last_login_date" name="posted_data[last_login_date]" value="Y"<?php if ($this->_tpl_vars['search_prefilled']['last_login_date'] != ""): ?> checked="checked"<?php endif; ?> onclick="javascript:managedate('date_type')" /></td>
  <td class="OptionLabel"><label for="posted_data_last_login_date"><?php echo $this->_tpl_vars['lng']['lbl_last_logged_in']; ?>
</label></td>

  <td width="5"><input type="checkbox" id="posted_data_suspended_by_admin" name="posted_data[suspended_by_admin]" value="Y"<?php if ($this->_tpl_vars['search_prefilled']['suspended_by_admin'] != ""): ?> checked="checked"<?php endif; ?> onclick="javascript:managedate('date_type')" /></td>
  <td class="OptionLabel"><label for="posted_data_suspended_by_admin"><?php echo $this->_tpl_vars['lng']['lbl_suspended_by_admin']; ?>
</label></td>

  <td width="5"><input type="checkbox" id="posted_data_auto_suspended" name="posted_data[auto_suspended]" value="Y"<?php if ($this->_tpl_vars['search_prefilled']['auto_suspended'] != ""): ?> checked="checked"<?php endif; ?> onclick="javascript:managedate('date_type')" /></td>
  <td class="OptionLabel" width="100%">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/tooltip_js.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_suspended_automatically'],'text' => $this->_tpl_vars['lng']['txt_help_auto_suspended'],'type' => 'label','idfor' => 'posted_data_auto_suspended')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </td>
</tr>
</table>
  </td>
</tr>

<tr class="TableSubHead">
  <td class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_during_date_period']; ?>
:</td>
  <td>
<table cellpadding="2" cellspacing="2">
<tr>
  <td width="5"><input type="radio" id="date_period_M" name="posted_data[date_period]" value="M"<?php if ($this->_tpl_vars['search_prefilled']['date_period'] == "" || $this->_tpl_vars['search_prefilled']['date_period'] == 'M'): ?> checked="checked"<?php endif; ?> onclick="javascript:date_selected='M';managedate('date',true)" /></td>
  <td colspan="2" class="OptionLabel"><label for="date_period_M"><?php echo $this->_tpl_vars['lng']['lbl_this_month']; ?>
</label></td>
</tr>

<tr>
  <td width="5"><input type="radio" id="date_period_W" name="posted_data[date_period]" value="W"<?php if ($this->_tpl_vars['search_prefilled']['date_period'] == 'W'): ?> checked="checked"<?php endif; ?> onclick="javascript:date_selected='W';managedate('date',true)" /></td>
  <td colspan="2" class="OptionLabel"><label for="date_period_W"><?php echo $this->_tpl_vars['lng']['lbl_this_week']; ?>
</label></td>
</tr>

<tr>
  <td width="5"><input type="radio" id="date_period_D" name="posted_data[date_period]" value="D"<?php if ($this->_tpl_vars['search_prefilled']['date_period'] == 'D'): ?> checked="checked"<?php endif; ?> onclick="javascript:date_selected='D';managedate('date',true)" /></td>
  <td colspan="2" class="OptionLabel"><label for="date_period_D"><?php echo $this->_tpl_vars['lng']['lbl_today']; ?>
</label></td>
</tr>

<tr>
  <td width="5"><input type="radio" id="date_period_C" name="posted_data[date_period]" value="C"<?php if ($this->_tpl_vars['search_prefilled']['date_period'] == 'C'): ?> checked="checked"<?php endif; ?> onclick="javascript:date_selected='C';managedate('date',false)" /></td>
  <td class="OptionLabel"><label for="date_period_C"><?php echo $this->_tpl_vars['lng']['lbl_from']; ?>
</label></td>
  <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/datepicker.tpl", 'smarty_include_vars' => array('name' => 'start_date','date' => $this->_tpl_vars['search_prefilled']['start_date'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>

<tr>
  <td></td>
  <td class="OptionLabel"><?php echo $this->_tpl_vars['lng']['lbl_through']; ?>
</td>
  <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/datepicker.tpl", 'smarty_include_vars' => array('name' => 'end_date','date' => ((is_array($_tmp=@$this->_tpl_vars['search_prefilled']['end_date'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['end_date']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['end_date'])))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>

</table>
  </td>
</tr>

<tr>
  <td colspan="2"><br />
    <?php echo $this->_tpl_vars['lng']['txt_users_search_note']; ?>

    <script type="text/javascript" language="JavaScript 1.2">
    //<![CDATA[
      <?php if ($this->_tpl_vars['search_prefilled'] == "" || $this->_tpl_vars['search_prefilled']['address_type'] == ""): ?>
      managedate('address',true);
      <?php endif; ?>
      managedate('date_type');
      <?php if (( $this->_tpl_vars['search_prefilled']['registration_date'] != "" || $this->_tpl_vars['search_prefilled']['last_login_date'] != "" || $this->_tpl_vars['search_prefilled']['auto_suspended'] != "" || $this->_tpl_vars['search_prefilled']['suspended_by_admin'] != "" ) && $this->_tpl_vars['search_prefilled']['date_period'] != 'C'): ?>
      managedate('date', true);
      <?php endif; ?>
    //]]>
    </script>
  </td>
</tr>

</table>

  </td>
</tr>

</table>

<table cellpadding="1" cellspacing="5" width="100%">
  <tr>
    <td class="FormButton" width="20%">
      <a href="javascript:void(0);" onclick="javascript: reset_form('searchform', searchform_def);" class="underline"><?php echo $this->_tpl_vars['lng']['lbl_reset']; ?>
</a>
    </td>
    <td>
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
$this->_smarty_include(array('smarty_include_tpl_file' => "dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_search_for_user'],'content' => $this->_smarty_vars['capture']['dialog'],'extra' => 'width="100%"')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<br />

<!-- SEARCH FORM DIALOG END -->

<?php endif; ?>

<!-- SEARCH RESULTS SUMMARY -->

<a name="results"></a>

<?php if ($this->_tpl_vars['mode'] == 'search'): ?>
<?php if ($this->_tpl_vars['total_items'] > '0'): ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['txt_N_results_found'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'items', $this->_tpl_vars['total_items']) : smarty_modifier_substitute($_tmp, 'items', $this->_tpl_vars['total_items'])); ?>

( <?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['txt_displaying_X_Y_results'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'first_item', $this->_tpl_vars['first_item'], 'last_item', $this->_tpl_vars['last_item']) : smarty_modifier_substitute($_tmp, 'first_item', $this->_tpl_vars['first_item'], 'last_item', $this->_tpl_vars['last_item'])); ?>
 )
<?php else: ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['txt_N_results_found'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'items', 0) : smarty_modifier_substitute($_tmp, 'items', 0)); ?>

<?php endif; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['mode'] == 'search' && $this->_tpl_vars['users'] != ""): ?>

<!-- SEARCH RESULTS START -->

<br /><br />

<?php ob_start(); ?>

<div align="right"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_search_again'],'href' => "users.php")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>

<?php if ($this->_tpl_vars['total_pages'] < 3): ?>
<br />
<?php else: ?>
<?php $this->assign('pagestr', "&page=".($this->_tpl_vars['navigation_page'])); ?>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/navigation.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/check_all_row.tpl", 'smarty_include_vars' => array('style' => "line-height: 170%;",'form' => 'processuserform','prefix' => 'user')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<form action="process_user.php" method="post" name="processuserform">
<input type="hidden" name="mode" value="" />
<input type="hidden" name="pagestr" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pagestr'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
" />

<table cellpadding="2" cellspacing="1" width="100%">

<tr class="TableHead">
  <td>&nbsp;</td>
  <td><?php if ($this->_tpl_vars['search_prefilled']['sort_field'] == 'name'): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/sort_pointer.tpl", 'smarty_include_vars' => array('dir' => $this->_tpl_vars['search_prefilled']['sort_direction'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>&nbsp;<?php endif; ?><a href="users.php?mode=search<?php echo ((is_array($_tmp=$this->_tpl_vars['pagestr'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
&amp;sort=name"><?php echo $this->_tpl_vars['lng']['lbl_name']; ?>
</a> / <?php if ($this->_tpl_vars['search_prefilled']['sort_field'] == 'email'): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/sort_pointer.tpl", 'smarty_include_vars' => array('dir' => $this->_tpl_vars['search_prefilled']['sort_direction'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>&nbsp;<?php endif; ?><a href="users.php?mode=search<?php echo ((is_array($_tmp=$this->_tpl_vars['pagestr'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
&amp;sort=email"><?php echo $this->_tpl_vars['lng']['lbl_email']; ?>
</a></td>
  <td><?php if ($this->_tpl_vars['search_prefilled']['sort_field'] == 'usertype'): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/sort_pointer.tpl", 'smarty_include_vars' => array('dir' => $this->_tpl_vars['search_prefilled']['sort_direction'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>&nbsp;<?php endif; ?><a href="users.php?mode=search<?php echo ((is_array($_tmp=$this->_tpl_vars['pagestr'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
&amp;sort=usertype"><?php echo $this->_tpl_vars['lng']['lbl_usertype']; ?>
</a></td>
  <td><?php if ($this->_tpl_vars['search_prefilled']['sort_field'] == 'last_login'): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/sort_pointer.tpl", 'smarty_include_vars' => array('dir' => $this->_tpl_vars['search_prefilled']['sort_direction'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>&nbsp;<?php endif; ?><a href="users.php?mode=search<?php echo ((is_array($_tmp=$this->_tpl_vars['pagestr'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
&amp;sort=last_login"><?php echo $this->_tpl_vars['lng']['lbl_last_logged_in']; ?>
</a></td>
  <?php if ($this->_tpl_vars['users_has_partner']): ?>
    <td><?php echo $this->_tpl_vars['lng']['lbl_affiliate_plan']; ?>
</td>
  <?php endif; ?>
  <td><?php if ($this->_tpl_vars['search_prefilled']['sort_field'] == 'cnt'): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/sort_pointer.tpl", 'smarty_include_vars' => array('dir' => $this->_tpl_vars['search_prefilled']['sort_direction'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>&nbsp;<?php endif; ?><a href="users.php?mode=search<?php echo ((is_array($_tmp=$this->_tpl_vars['pagestr'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
&amp;sort=cnt"><?php echo $this->_tpl_vars['lng']['lbl_orders']; ?>
</a></td>
</tr>

<?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['u']):
        $this->_foreach['users']['iteration']++;
?>

  <?php $this->assign('_usertype', $this->_tpl_vars['u']['usertype']); ?>
  <?php if ($this->_tpl_vars['_usertype'] == 'P' && $this->_tpl_vars['single_mode'] == ""): ?>
    <?php $this->assign('products', $this->_tpl_vars['u']['products']); ?>
  <?php else: ?>
    <?php $this->assign('products', ""); ?>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['u']['firstname'] == '' && $this->_tpl_vars['u']['lastname'] == '' && $this->_tpl_vars['config']['email_as_login'] == 'Y'): ?>
    <?php $this->assign('uname', $this->_tpl_vars['u']['email']); ?>
  <?php else: ?>
    <?php $this->assign('uname', ($this->_tpl_vars['u']['firstname'])." ".($this->_tpl_vars['u']['lastname'])); ?>
    <?php if ($this->_tpl_vars['config']['email_as_login'] != 'Y'): ?>
      <?php $this->assign('uname', ((is_array($_tmp=$this->_tpl_vars['uname'])) ? $this->_run_mod_handler('cat', true, $_tmp, " (".($this->_tpl_vars['u']['login']).")") : smarty_modifier_cat($_tmp, " (".($this->_tpl_vars['u']['login']).")"))); ?>
    <?php endif; ?>
  <?php endif; ?>
 
  <tr<?php echo smarty_function_interline(array('name' => 'users','class' => 'TableSubHead'), $this);?>
>
    <td width="5"><input type="checkbox" name="user[<?php echo $this->_tpl_vars['u']['id']; ?>
]"<?php if ($this->_tpl_vars['u']['id'] == $this->_tpl_vars['logged_userid']): ?> disabled="disabled" class='ui-state-disabled'<?php endif; ?> /></td>
    <td>
      <a href="<?php if ($this->_tpl_vars['u']['id'] == $this->_tpl_vars['logged_userid']): ?>register.php?mode=update<?php else: ?>user_modify.php?user=<?php echo ((is_array($_tmp=$this->_tpl_vars['u']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&amp;usertype=<?php echo $this->_tpl_vars['u']['usertype']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['pagestr'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
<?php endif; ?>" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_modify_profile'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><font class="ItemsList"><?php echo $this->_tpl_vars['uname']; ?>
</font></a>
      <?php if ($this->_tpl_vars['uname'] != $this->_tpl_vars['u']['email']): ?>
        <br /><?php echo $this->_tpl_vars['u']['email']; ?>

      <?php endif; ?>
    </td>
    <td>
      <span title="<?php echo ((is_array($_tmp=@$this->_tpl_vars['u']['membership'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['lng']['lbl_no_membership']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['lng']['lbl_no_membership'])); ?>
"><?php echo $this->_tpl_vars['usertypes'][$this->_tpl_vars['_usertype']]; ?>
</span>
      <?php if ($this->_tpl_vars['_usertype'] == 'B'): ?>
        <br /><font class="SmallText"><i>(<?php if ($this->_tpl_vars['u']['status'] == 'Q'): ?><?php echo $this->_tpl_vars['lng']['lbl_unapproved']; ?>
<?php elseif ($this->_tpl_vars['u']['status'] == 'D'): ?><?php echo $this->_tpl_vars['lng']['lbl_declined']; ?>
<?php elseif ($this->_tpl_vars['u']['status'] == 'Y'): ?><?php echo $this->_tpl_vars['lng']['lbl_approved']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lng']['lbl_disabled']; ?>
<?php endif; ?>)</i></font>
      <?php elseif ($this->_tpl_vars['u']['status'] != 'Y' && $this->_tpl_vars['u']['status'] != 'A'): ?>
        <br /><font class="SmallText"><i>(<?php echo $this->_tpl_vars['lng']['lbl_account_status_suspended']; ?>
)</i></font>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['products'] != ""): ?>
        <br /><font class="SmallText"><i>(<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['txt_N_products'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'products', $this->_tpl_vars['products']) : smarty_modifier_substitute($_tmp, 'products', $this->_tpl_vars['products'])); ?>
)</i></font>
      <?php endif; ?>
    </td>
    <td nowrap="nowrap"><?php if (( $this->_tpl_vars['u']['last_login'] != 0 )): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['u']['last_login'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['config']['Appearance']['datetime_format']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['config']['Appearance']['datetime_format'])); ?>
<?php else: ?><?php echo $this->_tpl_vars['lng']['lbl_never_logged_in']; ?>
<?php endif; ?></td>
    <?php if ($this->_tpl_vars['users_has_partner']): ?>
      <td>
        <?php if ($this->_tpl_vars['u']['usertype'] == 'B'): ?>
          <select name="plan[<?php echo $this->_tpl_vars['u']['id']; ?>
]">
            <option value="0"><?php echo $this->_tpl_vars['lng']['lbl_none']; ?>
</option>
            <?php $_from = $this->_tpl_vars['plans']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
              <option value="<?php echo $this->_tpl_vars['p']['plan_id']; ?>
"<?php if ($this->_tpl_vars['u']['plan_id'] == $this->_tpl_vars['p']['plan_id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['p']['plan_title']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
          </select>
        <?php else: ?>
          &nbsp;
        <?php endif; ?>
      </td>
    <?php endif; ?>
    <td><?php if ($this->_tpl_vars['u']['cnt'] != '0'): ?><a href="orders.php?userid=<?php echo $this->_tpl_vars['u']['id']; ?>
"><?php echo $this->_tpl_vars['u']['cnt']; ?>
</a><?php else: ?> 0 <?php endif; ?></td>
  </tr>

<?php endforeach; endif; unset($_from); ?>

<tr>
  <td colspan="4" class="SubmitBox">
    <input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_delete_selected'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: if (checkMarks(this.form, new RegExp('^user\\[.+\\]', 'gi'))) submitForm(this, 'delete');" />
    <input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_export_selected'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: if (checkMarks(this.form, new RegExp('^user\\[.+\\]', 'gi'))) submitForm(this, 'export');" />
    <input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_export_all_found'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: self.location='users.php?mode=search&amp;export=export_found';" />
  </td>
  <?php if ($this->_tpl_vars['users_has_partner']): ?>
    <td>
      <input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_update'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: submitForm(this, 'update');" />
    </td>
  <?php endif; ?>
</tr>

<tr>
  <td colspan="5">
<br /><br /><br />
<table cellpadding="5">

<tr>
  <td><font class="FormButton"><?php echo $this->_tpl_vars['lng']['lbl_reg_chpass_admin']; ?>
</font></td>
  <td><input type="checkbox" name="op_change_password" /></td>
</tr>

<tr>
  <td><font class="FormButton"><?php echo $this->_tpl_vars['lng']['lbl_reg_account_status_admin']; ?>
</font></td>
  <td>
  <select name="op_change_status">
    <option value=""><?php echo $this->_tpl_vars['lng']['lbl_reg_do_not_change_admin']; ?>
</option>
    <option value="N" class="UsersActionDisable"><?php echo $this->_tpl_vars['lng']['lbl_reg_account_status_suspend']; ?>
</option>
    <option value="Y" class="UsersActionEnable"><?php echo $this->_tpl_vars['lng']['lbl_reg_account_status_enable']; ?>
</option>
  </select>
  </td>
</tr>
<tr>
  <td>
  <font class="FormButton"><?php echo $this->_tpl_vars['lng']['lbl_reg_account_activity_admin']; ?>
</font>
  <br />
  <font class="SmallText"><?php echo $this->_tpl_vars['lng']['lbl_reg_account_activity_note_admin']; ?>
</font>
  </td>
  <td>
  <select name="op_change_activity">
    <option value=""><?php echo $this->_tpl_vars['lng']['lbl_reg_do_not_change_admin']; ?>
</option>
    <option value="N" class="UsersActionDisable"><?php echo $this->_tpl_vars['lng']['lbl_reg_account_activity_disable']; ?>
</option>
    <option value="Y" class="UsersActionEnable"><?php echo $this->_tpl_vars['lng']['lbl_reg_account_activity_enable']; ?>
</option>
  </select>
  </td>
</tr>
</table>
  </td>
</tr>
<tr>
  <td colspan="5">
<table cellpadding="2" cellspacing="1">
<tr>
  <td><input type="radio" id="for_users_S" name="for_users" value="S" checked="checked" /></td>
  <td class="OptionLabel"><label for="for_users_S"><?php echo $this->_tpl_vars['lng']['lbl_of_selected_users']; ?>
</label></td>
  <td>&nbsp;&nbsp;</td>
  <td><input type="radio" id="for_users_A" name="for_users" value="A" /></td>
  <td class="OptionLabel"><label for="for_users_A"><?php echo $this->_tpl_vars['lng']['lbl_of_all_found_users']; ?>
</label></td>
</tr>
</table>
<br />
<input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_apply'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: submitForm(this, 'group_operation');" />
</td>
</tr>

</table>
</form>

<br />

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/navigation.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_search_results'],'content' => $this->_smarty_vars['capture']['dialog'],'extra' => 'width="100%"')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!-- SEARCH RESULTS START -->

<?php endif; ?>

<br />
