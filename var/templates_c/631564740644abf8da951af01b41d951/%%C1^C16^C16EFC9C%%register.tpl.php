<?php /* Smarty version 2.6.26, created on 2015-12-02 18:52:54
         compiled from provider/main/register.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'amp', 'provider/main/register.tpl', 82, false),array('modifier', 'escape', 'provider/main/register.tpl', 119, false),array('modifier', 'wm_remove', 'provider/main/register.tpl', 168, false),array('modifier', 'strip_tags', 'provider/main/register.tpl', 179, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "check_email_script.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "check_password_script.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "check_zipcode_js.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "check_required_fields_js.tpl", 'smarty_include_vars' => array('fillerror' => $this->_tpl_vars['reg_error'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "change_states_js.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "check_registerform_fields_js.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['newbie'] == 'Y'): ?>
<?php if ($this->_tpl_vars['login'] != ""): ?>
<?php $this->assign('title', $this->_tpl_vars['lng']['lbl_account_details']); ?>
<?php else: ?>
<?php $this->assign('title', $this->_tpl_vars['lng']['lbl_create_profile']); ?>
<?php endif; ?>
<?php else: ?>
<?php if ($this->_tpl_vars['main'] == 'user_add'): ?>
<?php if ($this->_tpl_vars['active_modules']['Simple_Mode']): ?>
<?php $this->assign('title', $this->_tpl_vars['lng']['lbl_create_admin_profile']); ?>
<?php else: ?>
<?php $this->assign('title', $this->_tpl_vars['lng']['lbl_create_provider_profile']); ?>
<?php endif; ?>
<?php else: ?>
<?php if ($this->_tpl_vars['active_modules']['Simple_Mode']): ?>
<?php $this->assign('title', $this->_tpl_vars['lng']['lbl_modify_admin_profile']); ?>
<?php else: ?>
<?php $this->assign('title', $this->_tpl_vars['lng']['lbl_modify_provider_profile']); ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page_title.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['title'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<font class="Text">

<?php if ($this->_tpl_vars['newbie'] != 'Y'): ?>
<br />
<?php if ($this->_tpl_vars['active_modules']['Simple_Mode']): ?>
<?php if ($this->_tpl_vars['main'] == 'user_add'): ?>
<?php echo $this->_tpl_vars['lng']['txt_create_admin_profile']; ?>

<?php else: ?>
<?php echo $this->_tpl_vars['lng']['txt_modify_admin_profile']; ?>

<?php endif; ?>
<?php else: ?>
<?php if ($this->_tpl_vars['main'] == 'user_add'): ?> 
<?php echo $this->_tpl_vars['lng']['txt_create_provider_profile']; ?>

<?php else: ?> 
<?php echo $this->_tpl_vars['lng']['txt_modify_provider_profile']; ?>

<?php endif; ?> 
<?php endif; ?>
<br /><br />
<?php endif; ?>

<?php echo $this->_tpl_vars['lng']['txt_fields_are_mandatory']; ?>


</font>

<br /><br />

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "provider/main/profile_menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($_GET['submode'] == 'seller_address'): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "provider/main/register_provider.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php else: ?>
<?php ob_start(); ?>

<?php if ($this->_tpl_vars['newbie'] != 'Y' && $this->_tpl_vars['main'] != 'user_add' && $this->_tpl_vars['is_admin_user']): ?>
<div align="right"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_go_to_users_list'],'href' => "users.php?mode=search")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
<?php endif; ?>

<?php if ($this->_tpl_vars['registered'] == ""): ?>

<?php if ($this->_tpl_vars['reg_error']): ?>
<font class="Star"><?php echo $this->_tpl_vars['reg_error']['errdesc']; ?>
</font>
<br />
<?php endif; ?>

<form action="<?php echo $this->_tpl_vars['register_script_name']; ?>
?<?php echo ((is_array($_tmp=$_SERVER['QUERY_STRING'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
" method="post" name="registerform" onsubmit="javascript: return checkRegFormFields(this);" >
<?php if ($this->_tpl_vars['config']['Security']['use_https_login'] == 'Y'): ?>
<input type="hidden" name="<?php echo $this->_tpl_vars['XCARTSESSNAME']; ?>
" value="<?php echo $this->_tpl_vars['XCARTSESSID']; ?>
" />
<?php endif; ?>

<table cellspacing="1" cellpadding="2" width="100%">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/register_personal_info.tpl", 'smarty_include_vars' => array('userinfo' => $this->_tpl_vars['userinfo'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/register_address_book.tpl", 'smarty_include_vars' => array('addresses' => $this->_tpl_vars['userinfo']['addresses'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/register_additional_info.tpl", 'smarty_include_vars' => array('section' => 'A')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/register_account.tpl", 'smarty_include_vars' => array('userinfo' => $this->_tpl_vars['userinfo'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['active_modules']['News_Management'] && $this->_tpl_vars['newslists']): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/News_Management/register_newslists.tpl", 'smarty_include_vars' => array('userinfo' => $this->_tpl_vars['userinfo'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['active_modules']['Image_Verification'] && $this->_tpl_vars['show_antibot']['on_registration'] == 'Y' && $this->_tpl_vars['display_antibot']): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Image_Verification/spambot_arrest.tpl", 'smarty_include_vars' => array('mode' => "data-table",'id' => $this->_tpl_vars['antibot_sections']['on_registration'],'antibot_err' => $this->_tpl_vars['reg_antibot_err'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<tr>
  <td colspan="2">
    <br />
    <?php if ($this->_tpl_vars['newbie'] == 'Y' && $this->_tpl_vars['login'] != ""): ?>
      <a href="register.php?mode=delete" class="delete-profile-link"><?php echo $this->_tpl_vars['lng']['lbl_delete']; ?>
</a>
    <?php endif; ?>
  </td>
  <td>

    <br />

    <?php if ($_GET['mode'] == 'update'): ?>
      <input type="hidden" name="mode" value="update" />
    <?php endif; ?>
    <input type="submit" value=" <?php if ($this->_tpl_vars['userinfo']['id'] > 0): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_update'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_register'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?> " />

  </td>
</tr>

</table>
<input type="hidden" name="usertype" value="<?php if ($_GET['usertype'] != ""): ?><?php echo ((is_array($_tmp=$_GET['usertype'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
<?php else: ?><?php echo $this->_tpl_vars['usertype']; ?>
<?php endif; ?>" />
</form>

<br /><br />

<?php echo $this->_tpl_vars['lng']['txt_newbie_registration_bottom']; ?>


<br />

<?php else: ?>

<?php if ($_POST['mode'] == 'update' || $_GET['mode'] == 'update'): ?>
<?php echo $this->_tpl_vars['lng']['txt_profile_modified']; ?>

<?php else: ?>
<?php echo $this->_tpl_vars['lng']['txt_profile_created']; ?>

<?php endif; ?>

<?php endif; ?>

<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_profile_details'],'content' => $this->_smarty_vars['capture']['dialog'],'extra' => 'width="100%"')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['userinfo']['status'] == 'Q' && $this->_tpl_vars['usertype'] != 'P'): ?>

<br />

<?php ob_start(); ?>

<form action="<?php echo $this->_tpl_vars['register_script_name']; ?>
?<?php echo ((is_array($_tmp=$_SERVER['QUERY_STRING'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
" method="post" name="decisionform">

  <div id="decision">
    <input type="radio" id="opt_approved" name="mode" value="approved" onclick="javascript: this.form.submit();" />
    <label for="opt_approved">
      <?php echo $this->_tpl_vars['lng']['lbl_approve']; ?>

    </label>
    <input type="radio" id="opt_declined" name="mode" value="declined" onclick="javascript: $('#decline_reason').show();$('#apply_reason').show();" />
    <label for="opt_declined">
      <?php echo $this->_tpl_vars['lng']['lbl_decline']; ?>

    </label>
  
  </div>

  <br />
  <textarea id="decline_reason" style="display:none" name="reason" cols="40" rows="5" onfocus="javascript:if (this.value == '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['txt_decline_reason'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
') this.value='';"><?php echo $this->_tpl_vars['lng']['txt_decline_reason']; ?>
</textarea>

<script type="text/javascript">
//<![CDATA[
  $(function() {
    $("#decision").buttonset();
  });
//]]>
</script>

  <br /><br />
  <input type="submit" id="apply_reason" style="display:none" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_apply'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />

</form>

<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_approve_or_decline_provider_profile'],'content' => $this->_smarty_vars['capture']['dialog'],'extra' => 'width="100%"')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php endif; ?>