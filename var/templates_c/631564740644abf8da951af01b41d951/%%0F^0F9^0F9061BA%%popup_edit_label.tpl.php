<?php /* Smarty version 2.6.26, created on 2015-12-02 18:38:55
         compiled from main/popup_edit_label.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'main/popup_edit_label.tpl', 6, false),array('modifier', 'wm_remove', 'main/popup_edit_label.tpl', 9, false),array('modifier', 'escape', 'main/popup_edit_label.tpl', 9, false),array('modifier', 'default', 'main/popup_edit_label.tpl', 47, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php echo smarty_function_config_load(array('file' => ($this->_tpl_vars['skin_config'])), $this);?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_label_dialog'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</title>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "meta.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "presets_js.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['SkinDir']; ?>
/js/common.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['SkinDir']; ?>
/js/popup_edit_label.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['SkinDir']; ?>
/css/skin1_admin.css" />
<style type="text/css">
<?php echo '
BODY {
  MARGIN: 5px;
  PADDING: 0px;
  BACKGROUND-COLOR: #FFFBD3;
}
IMG.Icon {
  BORDER: 0px;
  VERTICAL-ALIGN: middle;
  WIDTH: 23px;
  HEIGHT: 22px;
}
.Head {
  FONT-SIZE: 12px;
  FONT-WEIGHT: bold;
}
#labelName {
  FONT-SIZE: 12px;
  PADDING-LEFT: 10px;
}
.webmaster-mode-ie-warn {
  margin: 10px 0;
  color: #b51800;
  text-align: center;
  width: 100%;
}
'; ?>

</style>
</head>
<body<?php echo $this->_tpl_vars['reading_direction_tag']; ?>
 onload="javascript: getData();" onunload="javascript: rememberXY();">

<form name="lf" action="<?php echo $this->_tpl_vars['catalogs']['admin']; ?>
/set_label.php" method="post" accept-charset="<?php echo ((is_array($_tmp=@$this->_tpl_vars['default_charset'])) ? $this->_run_mod_handler('default', true, $_tmp, "utf-8") : smarty_modifier_default($_tmp, "utf-8")); ?>
" onsubmit="javascript: copyText();">
<input type="hidden" name="lang" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['shop_language'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<input type="hidden" name="name" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['labelName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />

<table cellspacing="0" cellpadding="0" id="tbl">
<tr>
  <td class="Head"><?php echo $this->_tpl_vars['lng']['lbl_name']; ?>
:</td>
  <td id="labelName"><?php echo ((is_array($_tmp=$this->_tpl_vars['labelName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
  <td class="Head" valign="top"><?php echo $this->_tpl_vars['lng']['lbl_value']; ?>
:</td>
  <td style="padding-left: 10px;" valign="top">
<?php if ($this->_tpl_vars['tarea']): ?>
<?php if ($this->_tpl_vars['config']['UA']['browser'] == 'MSIE'): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/textarea.tpl", 'smarty_include_vars' => array('cols' => 100,'rows' => 10,'data' => $this->_tpl_vars['labelText'],'name' => 'val','width' => '640px','style' => "width: 640px;")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/textarea.tpl", 'smarty_include_vars' => array('cols' => 100,'rows' => 5,'data' => $this->_tpl_vars['labelText'],'name' => 'val','width' => '640px','style' => "width: 640px;",'btn_rows' => 4)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php else: ?>
<input type="text" id="val" name="val" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['labelText'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<?php endif; ?>
</td>
</tr>
<tr>
  <td colspan="2" align="center">
<a onclick="javascript: copyText();" href="javascript:void(0);"><img class="Icon" src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/preview.gif" alt="" />&nbsp;<?php echo $this->_tpl_vars['lng']['lbl_preview']; ?>
</a>
&nbsp;&nbsp;&nbsp;
<a onclick="javascript: copyText(); document.lf.submit();" href="javascript:void(0);"><img class="Icon" src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/save.gif" alt="" />&nbsp;<?php echo $this->_tpl_vars['lng']['lbl_save']; ?>
</a>
&nbsp;&nbsp;&nbsp;
<a onclick="javascript: restoreLabel(); window.close();" href="javascript:void(0);"><img class="Icon" src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/cancel.gif" alt="" />&nbsp;<?php echo $this->_tpl_vars['lng']['lbl_cancel']; ?>
</a>
  </td>
</tr>
</table>
</form>
<?php if ($this->_tpl_vars['config']['UA']['browser'] == 'MSIE'): ?>
<div class="webmaster-mode-ie-warn"><?php echo $this->_tpl_vars['lng']['txt_webmaster_mode_ie_warn']; ?>
</div>
<?php endif; ?>
</body>
</html>