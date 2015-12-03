<?php /* Smarty version 2.6.26, created on 2015-12-02 19:15:33
         compiled from customer/home.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'customer/home.tpl', 6, false),array('function', 'config_load', 'customer/home.tpl', 9, false),array('function', 'load_defer_code', 'customer/home.tpl', 55, false),)), $this); ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="<?php echo ((is_array($_tmp=@$this->_tpl_vars['default_charset'])) ? $this->_run_mod_handler('default', true, $_tmp, "utf-8") : smarty_modifier_default($_tmp, "utf-8")); ?>
"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php echo smarty_function_config_load(array('file' => ($this->_tpl_vars['skin_config'])), $this);?>

<html xmlns="http://www.w3.org/1999/xhtml"<?php if ($this->_tpl_vars['active_modules']['Socialize']): ?> xmlns:g="http://base.google.com/ns/1.0" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#"<?php endif; ?>>
<head>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/service_head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 
</head>
<body<?php if ($this->_tpl_vars['body_onload'] != ''): ?> onload="javascript: <?php echo $this->_tpl_vars['body_onload']; ?>
"<?php endif; ?><?php if ($this->_tpl_vars['container_classes']): ?> class="<?php $_from = $this->_tpl_vars['container_classes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?><?php echo $this->_tpl_vars['c']; ?>
 <?php endforeach; endif; unset($_from); ?>"<?php endif; ?>>
<div id="page-container"<?php if ($this->_tpl_vars['page_container_class']): ?> class="<?php echo $this->_tpl_vars['page_container_class']; ?>
"<?php endif; ?>>
  <div id="page-container2">
    <div id="content-container">
      <div id="content-container2">

        <?php if ($this->_tpl_vars['config']['Socialize']['soc_fb_like_enabled'] == 'Y' || $this->_tpl_vars['config']['Socialize']['soc_fb_send_enabled'] == 'Y'): ?>
          <div id="fb-root"></div>
        <?php endif; ?>

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/content.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

      </div>
    </div>

    <div class="clearing">&nbsp;</div>

    <div id="header">
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>

    <div id="footer">

      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/bottom.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    </div>

    <?php if ($this->_tpl_vars['active_modules']['SnS_connector']): ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/SnS_connector/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['active_modules']['Google_Analytics'] && $this->_tpl_vars['config']['Google_Analytics']['ganalytics_version'] == 'Traditional'): ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Google_Analytics/ga_code.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>

  </div>
  <!--[if lte IE 7]>
	  <div id="fake-minicart"></div>
  <![endif]-->
</div>
<?php echo smarty_function_load_defer_code(array('type' => 'js'), $this);?>

<?php echo smarty_function_load_defer_code(array('type' => 'css'), $this);?>

<?php if ($this->_tpl_vars['active_modules']['Wibiya']): ?>
<?php echo ((is_array($_tmp=@$this->_tpl_vars['config']['Wibiya']['wibiya_integration_code'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['wibiya_integration_code']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['wibiya_integration_code'])); ?>

<?php endif; ?>
</body>
</html>