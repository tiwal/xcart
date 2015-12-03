<?php /* Smarty version 2.6.26, created on 2015-12-02 19:15:33
         compiled from modules/Bestsellers/menu_bestsellers.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'interline', 'modules/Bestsellers/menu_bestsellers.tpl', 11, false),array('modifier', 'escape', 'modules/Bestsellers/menu_bestsellers.tpl', 17, false),)), $this); ?>
<?php if ($this->webmaster_mode) { ?><div id="ideal_comfort0modules0Bestsellers0menu_bestsellers.tpl" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?><?php func_load_lang($this, "modules/Bestsellers/menu_bestsellers.tpl","lbl_bestsellers"); ?><?php if ($this->_tpl_vars['config']['Bestsellers']['bestsellers_menu'] == 'Y' && $this->_tpl_vars['bestsellers']): ?>

  <?php ob_start(); ?>
    <ul>

      <?php $_from = $this->_tpl_vars['bestsellers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['bestsellers'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['bestsellers']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['b']):
        $this->_foreach['bestsellers']['iteration']++;
?>
        <li<?php echo smarty_function_interline(array('name' => 'bestsellers'), $this);?>
>
			<div class="image">
				<a href="product.php?productid=<?php echo $this->_tpl_vars['b']['productid']; ?>
&amp;cat=<?php echo $this->_tpl_vars['cat']; ?>
&amp;bestseller=Y">
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "product_thumbnail.tpl", 'smarty_include_vars' => array('src' => $this->_tpl_vars['b']['tmbn_url'],'productid' => $this->_tpl_vars['b']['productid'],'image_x' => $this->_tpl_vars['b']['tmbn_x'],'class' => 'image','product' => $this->_tpl_vars['b']['product'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				</a>
			</div>
			<a href="product.php?productid=<?php echo $this->_tpl_vars['b']['productid']; ?>
&amp;cat=<?php echo $this->_tpl_vars['cat']; ?>
&amp;bestseller=Y"><?php echo ((is_array($_tmp=$this->_tpl_vars['b']['product'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
			<div class="price-row">
				<span class="price-value"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "currency.tpl", 'smarty_include_vars' => array('value' => $this->_tpl_vars['b']['taxed_price'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span>
				<span class="market-price"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/alter_currency_value.tpl", 'smarty_include_vars' => array('alter_currency_value' => $this->_tpl_vars['b']['taxed_price'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span>
			</div>
        </li>
      <?php endforeach; endif; unset($_from); ?>

    </ul>
  <?php $this->_smarty_vars['capture']['menu'] = ob_get_contents(); ob_end_clean(); ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/menu_dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_bestsellers'],'content' => $this->_smarty_vars['capture']['menu'],'additional_class' => "menu-bestsellers")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php endif; ?><?php if ($this->webmaster_mode) { ?></div><?php } ?>