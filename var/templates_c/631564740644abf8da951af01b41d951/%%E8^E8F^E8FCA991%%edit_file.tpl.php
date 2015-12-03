<?php /* Smarty version 2.6.26, created on 2015-12-02 19:15:49
         compiled from admin/main/edit_file.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/main/edit_file.tpl', 11, false),array('modifier', 'replace', 'admin/main/edit_file.tpl', 22, false),array('modifier', 'default', 'admin/main/edit_file.tpl', 39, false),array('modifier', 'strip_tags', 'admin/main/edit_file.tpl', 72, false),array('modifier', 'wm_remove', 'admin/main/edit_file.tpl', 86, false),)), $this); ?>
<?php if ($this->webmaster_mode) { ?><div id="common_files0admin0main0edit_file.tpl" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?><?php func_load_lang($this, "admin/main/edit_file.tpl","lbl_edit_file,txt_edit_file_top_text,lbl_file,lbl_warning,msg_err_file_permission_denied,msg_err_file_cannot_be_modified,lbl_save,lbl_cancel,txt_js_restore_template_note,txt_restore_template_note,lbl_restore_file"); ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page_title.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_edit_file'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo $this->_tpl_vars['lng']['txt_edit_file_top_text']; ?>
<br />
<br />

<img src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/folder.gif" width="16" height="16" alt="" />
<a href="file_edit.php?dir=<?php echo ((is_array($_tmp=$_GET['dir'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo $this->_tpl_vars['root_skin_dir']; ?>
<?php echo ((is_array($_tmp=$_GET['dir'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</a><br />
<br />
<?php echo $this->_tpl_vars['lng']['lbl_file']; ?>
: <strong><?php echo $this->_tpl_vars['filename']; ?>
</strong><br />
<br />

<?php if (! $this->_tpl_vars['is_writable']): ?>
  <strong><?php echo $this->_tpl_vars['lng']['lbl_warning']; ?>
:</strong> <?php if ($this->_tpl_vars['use_edit_area']): ?><?php echo $this->_tpl_vars['lng']['msg_err_file_permission_denied']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lng']['msg_err_file_cannot_be_modified']; ?>
<?php endif; ?><br />
<?php endif; ?>

<?php if ($this->_tpl_vars['file_type'] == 'image'): ?>

  <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['SkinDir'])) ? $this->_run_mod_handler('replace', true, $_tmp, '/common_files', '') : smarty_modifier_replace($_tmp, '/common_files', '')); ?>
<?php echo $this->_tpl_vars['filename']; ?>
" alt="" />

<?php else: ?>

  <?php if ($this->_tpl_vars['use_edit_area']): ?>

    <script type="text/javascript" src="<?php echo $this->_tpl_vars['SkinDir']; ?>
/lib/edit_area/edit_area_full.js"></script>
<script type="text/javascript">
//<![CDATA[
var initData = {
  id: "filebody",
<?php if ($_GET['toggle_edit_area'] == 'Y'): ?>
  display: "later",
<?php endif; ?>
  start_highlight: true,
  allow_resize: "both",
  allow_toggle: true,
  syntax: '<?php echo ((is_array($_tmp=@$this->_tpl_vars['file_ext'])) ? $this->_run_mod_handler('default', true, $_tmp, 'html') : smarty_modifier_default($_tmp, 'html')); ?>
',
  language: '<?php echo ((is_array($_tmp=@$this->_tpl_vars['shop_language'])) ? $this->_run_mod_handler('default', true, $_tmp, 'en') : smarty_modifier_default($_tmp, 'en')); ?>
',
<?php if ($this->_tpl_vars['file_ext_selector']): ?>  syntax_selection_allow: "css,html,js,tpl",<?php endif; ?>
  toolbar: "search, go_to_line, |, undo, redo, |, select_font, <?php if ($this->_tpl_vars['file_ext_selector']): ?>|, syntax_selection,<?php endif; ?>|, change_smooth_selection, highlight, reset_highlight, |, help",
  allow_resize: "no"
};

<?php echo '
if (window.editAreaLoader) {
  editAreaLoader.init(initData);
}
'; ?>

//]]>
</script>

  <?php endif; ?>

  <form action="file_edit.php" method="post" <?php if ($this->_tpl_vars['use_edit_area']): ?>onsubmit="javascript: if(!$('#edit_area_toggle_checkbox_filebody').prop('checked'))$('#toggle_edit_area').val('Y');"<?php endif; ?>>
    <input type="hidden" name="filename" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['filename'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
    <input type="hidden" name="dir" value="<?php echo ((is_array($_tmp=$_GET['dir'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
    <input type="hidden" name="opener" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['opener'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
    <input type="hidden" name="mode" value="save_file" />
    <?php if ($this->_tpl_vars['use_edit_area']): ?>
    <input type="hidden" name="toggle_edit_area" id="toggle_edit_area" value="" />
    <?php endif; ?>

    <textarea cols="100" rows="40" name="filebody" id="filebody" style="width: 100%;"><?php $_from = $this->_tpl_vars['filebody']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['l']):
?><?php echo ((is_array($_tmp=$this->_tpl_vars['l'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
<?php endforeach; endif; unset($_from); ?></textarea>
    <br />
    <br />

    <table width="100%">
    <tr>
      <td class="main-button">
        <input type="submit" value="&nbsp;<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_save'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&nbsp;" />
      </td>
      <td align="right">
        <input type="button" value="&nbsp;<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_cancel'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&nbsp;" onclick="javascript: history.go(-1);" />
      </td>
    </tr>
    </table>

  </form>

<?php endif; ?>

<?php if ($this->_tpl_vars['has_backup']): ?>

  <form method="post" action="file_edit.php" name="file_restore" onsubmit="javascript: return confirm('<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['txt_js_restore_template_note'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
');">
    <input type="hidden" name="filename" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['filename'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
    <input type="hidden" name="dir" value="<?php echo ((is_array($_tmp=$_GET['dir'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
    <input type="hidden" name="mode" value="restore" />
    <input type="hidden" name="opener" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['opener'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />

    <?php echo $this->_tpl_vars['lng']['txt_restore_template_note']; ?>
<br />
    <input type="submit" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_restore_file'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
  </form>

<?php endif; ?><?php if ($this->webmaster_mode) { ?></div><?php } ?>