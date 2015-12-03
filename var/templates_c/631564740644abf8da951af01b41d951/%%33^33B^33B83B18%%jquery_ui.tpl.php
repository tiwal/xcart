<?php /* Smarty version 2.6.26, created on 2015-12-02 19:19:03
         compiled from jquery_ui.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'load_defer', 'jquery_ui.tpl', 18, false),)), $this); ?>
<?php if ($this->webmaster_mode) { ?><div id="common_files0jquery_ui.tpl" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?>
<?php echo smarty_function_load_defer(array('file' => "lib/jqueryui/jquery-ui.custom.min.js",'type' => 'js'), $this);?>


<?php if ($this->_tpl_vars['usertype'] == 'C'): ?>
  <?php echo smarty_function_load_defer(array('file' => "lib/jqueryui/jquery.ui.theme.css",'type' => 'css'), $this);?>

<?php else: ?>
  <?php echo smarty_function_load_defer(array('file' => "lib/jqueryui/jquery.ui.admin.css",'type' => 'css'), $this);?>

<?php endif; ?><?php if ($this->webmaster_mode) { ?></div><?php } ?>