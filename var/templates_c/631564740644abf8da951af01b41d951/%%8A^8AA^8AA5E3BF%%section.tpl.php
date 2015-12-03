<?php /* Smarty version 2.6.26, created on 2015-12-02 19:15:33
         compiled from modules/Recently_Viewed/section.tpl */ ?>
<?php if ($this->webmaster_mode) { ?><div id="common_files0modules0Recently_Viewed0section.tpl" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?><?php if (! ( $_COOKIE['robot'] == 'X-Cart Catalog Generator' && $_COOKIE['is_robot'] == 'Y' )): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Recently_Viewed/content.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?><?php if ($this->webmaster_mode) { ?></div><?php } ?>