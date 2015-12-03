<?php /* Smarty version 2.6.26, created on 2015-12-02 19:07:12
         compiled from admin/main/category_modify.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'admin/main/category_modify.tpl', 20, false),array('modifier', 'wm_remove', 'admin/main/category_modify.tpl', 20, false),array('modifier', 'escape', 'admin/main/category_modify.tpl', 20, false),)), $this); ?>
<script type="text/javascript" language="JavaScript 1.2">
//<![CDATA[
window.name = "catmodwin";
//]]>
</script>

<script type="text/javascript" src="<?php echo $this->_tpl_vars['SkinDir']; ?>
/js/popup_image_selection.js"></script>

<?php if ($this->_tpl_vars['section'] != 'lng'): ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "check_clean_url.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript">
//<![CDATA[
var requiredFields = [
  ['category_name', "<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_category'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
", false]<?php if ($this->_tpl_vars['config']['SEO']['clean_urls_enabled'] == 'Y'): ?>, ['clean_url', "<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_clean_url'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
", false]<?php endif; ?>
]
//]]>
</script>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "check_required_fields_js.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['mode'] == 'add'): ?>
<?php $this->assign('title', $this->_tpl_vars['lng']['lbl_add_category']); ?>
<?php else: ?>
<?php $this->assign('title', $this->_tpl_vars['lng']['lbl_modify_category']); ?>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page_title.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['title'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<a name="modify_category"></a>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/main/location.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<form name="addform" action="category_modify.php" method="post" enctype="multipart/form-data" onsubmit="javascript: return checkRequired(requiredFields)<?php if ($this->_tpl_vars['config']['SEO']['clean_urls_enabled'] == 'Y'): ?> &amp;&amp;checkCleanUrl(document.addform.clean_url)<?php endif; ?>">
<input type="hidden" name="mode" value="<?php echo $this->_tpl_vars['mode']; ?>
" />

<?php if ($this->_tpl_vars['mode'] == 'add'): ?>
  <input type="hidden" name="parent" value="<?php echo $this->_tpl_vars['cat']; ?>
" />
<?php else: ?>
  <input type="hidden" name="cat" value="<?php echo $this->_tpl_vars['cat']; ?>
" />
<?php endif; ?>

<table cellpadding="3" cellspacing="1" width="100%">

<tr>
  <td height="10" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_category_icon']; ?>
:</td>
  <td width="10" height="10">&nbsp;</td>
  <td height="10">
    <?php if ($this->_tpl_vars['mode'] != 'add'): ?>
      <?php if ($this->_tpl_vars['image']['image_size'] <= 0): ?><?php $this->assign('no_delete', 'Y'); ?><?php endif; ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/edit_image.tpl", 'smarty_include_vars' => array('type' => 'C','id' => $this->_tpl_vars['current_category']['categoryid'],'delete_url' => "category_modify.php?mode=delete_icon&amp;cat=".($this->_tpl_vars['cat']),'button_name' => $this->_tpl_vars['lng']['lbl_save'],'no_delete' => $this->_tpl_vars['no_delete'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <?php else: ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/edit_image.tpl", 'smarty_include_vars' => array('type' => 'C','id' => 0,'delete_url' => "category_modify.php?mode=delete_icon&amp;cat=".($this->_tpl_vars['cat']),'button_name' => $this->_tpl_vars['lng']['lbl_save'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
  </td>
</tr>

<tr>
  <td height="10" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_position']; ?>
:</td>
  <td width="10" height="10">&nbsp;</td>
  <td height="10">
    <input type="text" name="order_by" size="5" value="<?php echo $this->_tpl_vars['current_category']['order_by']; ?>
" />
  </td>
</tr>

<tr>
  <td height="10" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_category']; ?>
:</td>
  <td width="10" height="10"><font class="Star">*</font></td>
  <td height="10">
    <input type="text" name="category" id="category" maxlength="255" size="65" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['current_category']['category'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" <?php if ($this->_tpl_vars['config']['SEO']['clean_urls_enabled'] == 'Y'): ?>onchange="javascript: if (this.form.clean_url.value == '') copy_clean_url(this, this.form.clean_url)"<?php endif; ?>/>
  </td>
</tr>

<?php if ($this->_tpl_vars['mode'] != 'add'): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/clean_url_field.tpl", 'smarty_include_vars' => array('clean_url' => $this->_tpl_vars['current_category']['clean_url'],'show_req_fields' => 'Y','clean_urls_history' => $this->_tpl_vars['current_category']['clean_urls_history'],'clean_url_fill_error' => $this->_tpl_vars['top_message']['clean_url_fill_error'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/clean_url_field.tpl", 'smarty_include_vars' => array('clean_url' => "",'show_req_fields' => 'Y','clean_urls_history' => "")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<tr>
  <td height="10" class="FormButton" nowrap="nowrap" valign="top"><?php echo $this->_tpl_vars['lng']['lbl_description']; ?>
:</td>
  <td width="10" height="10"><font class="Star"></font></td>
  <td height="10">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/textarea.tpl", 'smarty_include_vars' => array('name' => 'description','cols' => 65,'rows' => 15,'data' => $this->_tpl_vars['current_category']['description'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </td>
</tr>

<tr>
  <td height="10" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_membership']; ?>
:</td>
  <td width="10" height="10"><font class="FormButtonOrange"></font></td>
  <td height="10"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/membership_selector.tpl", 'smarty_include_vars' => array('data' => $this->_tpl_vars['current_category'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>

<tr>
  <td height="10" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_availability']; ?>
:</td>
  <td width="10" height="10"><font class="Star"></font></td>
  <td height="10">
    <select name="avail">
      <option value='Y' <?php if (( $this->_tpl_vars['current_category']['avail'] == 'Y' )): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_enabled']; ?>
</option>
      <option value='N' <?php if (( $this->_tpl_vars['current_category']['avail'] == 'N' )): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_disabled']; ?>
</option>
    </select>
  </td>
</tr>

<tr>
  <td height="10" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_title_tag']; ?>
:</td>
  <td width="10" height="10"><font class="FormButtonOrange"></font></td>
  <td height="10">
    <textarea cols="65" rows="4" name="title_tag"><?php echo ((is_array($_tmp=$this->_tpl_vars['current_category']['title_tag'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</textarea>
  </td>
</tr>

<tr>
  <td height="10" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_meta_keywords']; ?>
:</td>
  <td width="10" height="10"><font class="FormButtonOrange"></font></td>
  <td height="10">
    <textarea cols="65" rows="4" name="meta_keywords"><?php echo ((is_array($_tmp=$this->_tpl_vars['current_category']['meta_keywords'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</textarea>
  </td>
</tr>

<tr>
  <td height="10" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_meta_description']; ?>
:</td>
  <td width="10" height="10"><font class="FormButtonOrange"></font></td>
  <td height="10">
    <textarea cols="65" rows="4" name="meta_description"><?php echo ((is_array($_tmp=$this->_tpl_vars['current_category']['meta_description'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</textarea>
  </td>
</tr>

<tr>
    <td height="10" class="FormButton"><?php echo $this->_tpl_vars['lng']['lbl_override_child_meta_data']; ?>
:</td>
    <td width="10" height="10"><font class="FormButtonOrange"></font></td>
    <td height="10">
      <input type="checkbox" name="override_child_meta" value="Y"<?php if ($this->_tpl_vars['current_category']['override_child_meta'] == 'Y'): ?> checked="checked"<?php endif; ?> /><br />
      <b><?php echo $this->_tpl_vars['lng']['lbl_note']; ?>
:</b>&nbsp;<?php echo $this->_tpl_vars['lng']['lbl_override_child_meta_data_note']; ?>

  </td>
</tr>
</table>
<br /><br />

<div id="sticky_content">
  <div class="main-button">
    <input type="submit" class="big-main-button" value=" <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_apply_changes'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 " />
  </div>
</div>

<table cellpadding="3" cellspacing="1" width="100%">
<?php if ($this->_tpl_vars['mode'] != 'add'): ?>

<tr>
  <td colspan="3"><br /><br /><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/subheader.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_category_location_title'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>

<tr>
  <td height="10" class="FormButton" nowrap="nowrap"><?php echo $this->_tpl_vars['lng']['lbl_category_location']; ?>
</td>
  <td width="10" height="10"><font class="FormButtonOrange"></font></td>
  <td height="10">
<select name="cat_location">
  <option value="0"><?php echo $this->_tpl_vars['lng']['lbl_root_level']; ?>
</option>
<?php $_from = $this->_tpl_vars['allcategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['catid'] => $this->_tpl_vars['c']):
?>
<?php if ($this->_tpl_vars['c']['moving_enabled']): ?>
  <option value="<?php echo $this->_tpl_vars['catid']; ?>
"<?php if ($this->_tpl_vars['catid'] == $this->_tpl_vars['current_category']['parentid']): ?> selected="selected" disabled="disabled"<?php endif; ?>><?php echo $this->_tpl_vars['c']['category_path']; ?>
</option>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</select>
  </td>
</tr>

<tr>
  <td colspan="2" class="FormButton">&nbsp;</td>
  <td class="SubmitBox"><input type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_update'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="javascript: submitForm(this, 'move');" /></td>
</tr>

<?php endif; ?>

</table>
</form>

<?php if ($this->_tpl_vars['section'] != 'lng' && $this->_tpl_vars['mode'] != 'add' && $this->_tpl_vars['cat'] > 0): ?>
  <br />
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/clean_urls.tpl", 'smarty_include_vars' => array('resource_name' => 'cat','resource_id' => $this->_tpl_vars['cat'],'clean_url_action' => "category_modify.php",'clean_urls_history_mode' => 'clean_urls_history','clean_urls_history' => $this->_tpl_vars['current_category']['clean_urls_history'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php elseif ($this->_tpl_vars['section'] == 'lng' && $this->_tpl_vars['mode'] != 'add' && $this->_tpl_vars['cat'] > 0): ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/main/category_lng.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php endif; ?>
