<?php /* Smarty version 2.6.26, created on 2015-12-02 19:15:33
         compiled from customer/bottom.tpl */ ?>
<?php if ($this->webmaster_mode) { ?><div id="ideal_comfort0customer0bottom.tpl" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?><div class="box">
	<div class="footer-links">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/help/menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>
    <div class="copyright">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "copyright.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
	<div class="payment-logos">
			<img src="<?php echo $this->_tpl_vars['AltImagesDir']; ?>
/custom/payment_logos.png" width="162" height="26" alt="" />
      <div class="prnotice">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/prnotice.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </div>
	</div>
  <?php if ($this->_tpl_vars['active_modules']['Users_online']): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Users_online/menu_users_online.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php endif; ?>
</div><?php if ($this->webmaster_mode) { ?></div><?php } ?>