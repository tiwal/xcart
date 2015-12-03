<?php /* Smarty version 2.6.26, created on 2015-12-02 19:15:33
         compiled from customer/main/welcome.tpl */ ?>
<?php if ($this->webmaster_mode) { ?><div id="ideal_comfort0customer0main0welcome.tpl" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?><?php func_load_lang($this, "customer/main/welcome.tpl","lbl_welcome,txt_welcome"); ?><table cellspacing="0" class="welcome-table" summary="<?php echo $this->_tpl_vars['lng']['lbl_welcome']; ?>
">
<tr>
	<td class="welcome-cell">
		<div class="welcome-img">
			<img src="<?php echo $this->_tpl_vars['AltImagesDir']; ?>
/custom/welcome_picture.jpg" alt="" title="" usemap="#xcart"/>
			<map id="xcart" name="xcart">
				<area shape="rect" coords="336,33,457,230" href="" target="_blank" alt="X-Cart" />
			</map>
		</div>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/evaluation.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 		<?php echo $this->_tpl_vars['lng']['txt_welcome']; ?>
<br />

		<?php if ($this->_tpl_vars['active_modules']['Bestsellers'] && $this->_tpl_vars['config']['Bestsellers']['bestsellers_menu'] != 'Y'): ?>
		  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Bestsellers/bestsellers.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><br />
		<?php endif; ?>
		<?php if ($this->_tpl_vars['active_modules']['Bestsellers'] && $this->_tpl_vars['bestsellers']): ?>
			<?php $this->assign('row_length', 2); ?>
		<?php else: ?>
			<?php $this->assign('row_length', false); ?>
		<?php endif; ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/featured.tpl", 'smarty_include_vars' => array('row_length' => $this->_tpl_vars['row_length'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</td>
	<?php if ($this->_tpl_vars['active_modules']['Bestsellers'] && $this->_tpl_vars['bestsellers']): ?>
	<td class="bestsellers-cell">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Bestsellers/menu_bestsellers.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</td>
	<?php endif; ?>
</tr>
</table><?php if ($this->webmaster_mode) { ?></div><?php } ?>