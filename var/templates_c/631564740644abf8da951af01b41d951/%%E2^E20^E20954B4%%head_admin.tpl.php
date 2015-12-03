<?php /* Smarty version 2.6.26, created on 2015-12-02 19:19:03
         compiled from head_admin.tpl */ ?>
<?php if ($this->webmaster_mode) { ?><div id="common_files0head_admin.tpl" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?><?php if ($this->_tpl_vars['login'] != ""): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "quick_search.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<div id="head-admin">

  <div id="logo-gray">
    <a href="home.php"><img src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/logo_gray.png" alt="" /></a>
  </div>

<?php if ($this->_tpl_vars['login'] != ""): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "authbox_top.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

</div><?php if ($this->webmaster_mode) { ?></div><?php } ?>