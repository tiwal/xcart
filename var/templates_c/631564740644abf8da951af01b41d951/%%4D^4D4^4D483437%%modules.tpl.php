<?php /* Smarty version 2.6.26, created on 2015-12-02 18:19:48
         compiled from admin/main/modules.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'getvar', 'admin/main/modules.tpl', 7, false),array('function', 'cycle', 'admin/main/modules.tpl', 39, false),array('modifier', 'amp', 'admin/main/modules.tpl', 53, false),array('modifier', 'strip_tags', 'admin/main/modules.tpl', 65, false),array('modifier', 'escape', 'admin/main/modules.tpl', 65, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page_title.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_modules'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo smarty_function_getvar(array('func' => 'func_get_xcart_paid_modules'), $this);?>

<?php if ($_COOKIE['hide_dialog_xcart_paid_modules'] == '' && $this->_tpl_vars['func_get_xcart_paid_modules']): ?>
<script type="text/javascript">
//<![CDATA[
<?php echo '
$(document).ready(function () {
  ajax.core.loadBlock($(\'#xcart_paid_modules\'), \'xcart_paid_modules\')
  $(\'#dialog_xcart_paid_modules a.close-link\').click(function(){
    var date_time = new Date().getTime() + 3600*24*1000;
    $.cookie(\'hide_dialog_xcart_paid_modules\', \'1\', { expires: new Date(date_time)});
  });
});
'; ?>

//]]>
</script>
<?php ob_start(); ?>
<div id="xcart_paid_modules"></div>
<div class="more_xcart_modules_link">
<a href='http://www.x-cart.com/modules.html?utm_source=xcart_admin&amp;utm_medium=link&amp;utm_campaign=xcart_modules_link' target='_blank'><?php echo $this->_tpl_vars['lng']['lbl_more_xcart_modules']; ?>
</a>
</div>
<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "location.tpl", 'smarty_include_vars' => array('location' => "",'alt_content' => $this->_smarty_vars['capture']['dialog'],'extra' => 'width="100%"','newid' => 'dialog_xcart_paid_modules','alt_type' => 'I','image_none' => 'Y')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php echo $this->_tpl_vars['lng']['txt_modules_top_text']; ?>


<br /><br />

<form action="modules.php?mode=update" method="post" name="myform">

<table cellpadding="5" width="100%">
<?php $_from = $this->_tpl_vars['modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['m']):
?>
<tr<?php echo smarty_function_cycle(array('values' => ", class='TableSubHead'"), $this);?>
>
  <td width="20"><input type="checkbox" id="<?php echo $this->_tpl_vars['m']['module_name']; ?>
" name="<?php echo $this->_tpl_vars['m']['module_name']; ?>
"<?php if ($this->_tpl_vars['m']['active'] == 'Y'): ?> checked="checked"<?php endif; ?> /></td>
  <td width="20%" nowrap="nowrap">
<label for="<?php echo $this->_tpl_vars['m']['module_name']; ?>
">
<?php $this->assign('module_name', "module_name_".($this->_tpl_vars['m']['module_name'])); ?>
<?php if ($this->_tpl_vars['lng'][$this->_tpl_vars['module_name']]): ?><?php echo $this->_tpl_vars['lng'][$this->_tpl_vars['module_name']]; ?>
<?php else: ?><?php echo $this->_tpl_vars['m']['module_name']; ?>
<?php endif; ?>
</label>
  </td>
  <td width="80%">
<?php $this->assign('module_descr', "module_descr_".($this->_tpl_vars['m']['module_name'])); ?>
<?php if ($this->_tpl_vars['lng'][$this->_tpl_vars['module_descr']]): ?><?php echo $this->_tpl_vars['lng'][$this->_tpl_vars['module_descr']]; ?>
<?php else: ?><?php echo $this->_tpl_vars['m']['module_descr']; ?>
<?php endif; ?>
  </td>
  <td>
<?php if ($this->_tpl_vars['m']['options_url'] != "" && $this->_tpl_vars['m']['active'] == 'Y'): ?>
<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['m']['options_url'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
"><?php echo $this->_tpl_vars['lng']['lbl_configure']; ?>
</a>
<?php else: ?>
&nbsp;
<?php endif; ?>
  </td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<br />

<div id="sticky_content">
  <div class="main-button">
    <input class="big-main-button" type="submit" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_apply_changes'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
  </div>
</div>

</form>