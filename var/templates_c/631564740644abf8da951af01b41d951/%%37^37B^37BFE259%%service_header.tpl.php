<?php /* Smarty version 2.6.26, created on 2015-12-02 18:06:44
         compiled from main/service_header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'main/service_header.tpl', 6, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php echo smarty_function_config_load(array('file' => ($this->_tpl_vars['skin_config'])), $this);?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title><?php echo $this->_tpl_vars['lng']['txt_site_title']; ?>
</title>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "meta.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['SkinDir']; ?>
/css/skin1_admin.css" />
</head>
<body<?php echo $this->_tpl_vars['reading_direction_tag']; ?>
>
<?php echo '
<script type="text/javascript" language="javascript">
//<![CDATA[
function refresh()
{
    window.scroll(0, 100000);

    setTimeout(\'refresh()\', 1000);
}
function scrollDown()
{
    setTimeout(\'refresh()\', 1000);
}
scrollDown();
//]]>
</script>
'; ?>

<div id="head-admin">

  <div id="logo-gray">
    <a href="<?php echo $this->_tpl_vars['http_location']; ?>
/"><img src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/logo_gray.png" alt="" /></a>
  </div>

</div>

<br />