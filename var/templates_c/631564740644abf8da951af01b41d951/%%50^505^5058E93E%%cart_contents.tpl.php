<?php /* Smarty version 2.6.26, created on 2015-12-02 19:10:03
         compiled from modules/One_Page_Checkout/summary/cart_contents.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'modules/One_Page_Checkout/summary/cart_contents.tpl', 6, false),array('modifier', 'escape', 'modules/One_Page_Checkout/summary/cart_contents.tpl', 6, false),array('modifier', 'truncate', 'modules/One_Page_Checkout/summary/cart_contents.tpl', 12, false),array('modifier', 'amp', 'modules/One_Page_Checkout/summary/cart_contents.tpl', 12, false),array('function', 'multi', 'modules/One_Page_Checkout/summary/cart_contents.tpl', 26, false),array('function', 'currency', 'modules/One_Page_Checkout/summary/cart_contents.tpl', 27, false),)), $this); ?>

<table cellspacing="0" class="cart-content width-100" summary="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_products'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">

  <?php $_from = $this->_tpl_vars['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['products'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['products']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['product']):
        $this->_foreach['products']['iteration']++;
?>

    <tr>
      <td>
        <a href="product.php?productid=<?php echo $this->_tpl_vars['product']['productid']; ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['product']['product'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['product']['product'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 50, "...", true) : smarty_modifier_truncate($_tmp, 50, "...", true)))) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
 (<?php echo ((is_array($_tmp=$this->_tpl_vars['product']['productcode'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
)</a>
        <?php if ($this->_tpl_vars['product']['product_type'] == 'C' && $this->_tpl_vars['product']['display_price'] < 0): ?>
          <span class="pconf-negative-price"> <?php echo $this->_tpl_vars['lng']['lbl_pconf_discounted']; ?>
</span>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['active_modules']['Gift_Registry']): ?>
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Gift_Registry/product_event_cart_contents.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
      </td>

      <td class="cart-content-text nowrap">
        <?php echo $this->_tpl_vars['lng']['lbl_qty']; ?>
: <?php echo $this->_tpl_vars['product']['amount']; ?>

      </td>
      
      <td class="cart-column-total cart-content-text">
        <?php echo smarty_function_multi(array('x' => $this->_tpl_vars['product']['display_price'],'y' => $this->_tpl_vars['product']['amount'],'assign' => 'total'), $this);?>

        <?php echo smarty_function_currency(array('value' => $this->_tpl_vars['total'],'display_sign' => $this->_tpl_vars['product']['price_show_sign']), $this);?>

      </td>
    </tr>

  <?php endforeach; endif; unset($_from); ?>

  <?php if ($this->_tpl_vars['cart']['giftcerts'] != ""): ?>

    <?php $_from = $this->_tpl_vars['cart']['giftcerts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['gc'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['gc']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['gc']):
        $this->_foreach['gc']['iteration']++;
?>

      <tr>
        <td><?php echo $this->_tpl_vars['lng']['lbl_gc_for']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['gc']['recipient'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30, "...", true) : smarty_modifier_truncate($_tmp, 30, "...", true)); ?>
</td>
        <td class="cart-content-text"><?php echo $this->_tpl_vars['lng']['lbl_qty']; ?>
: 1</td>
        <td class="cart-column-price cart-content-text">
          <?php echo smarty_function_currency(array('value' => $this->_tpl_vars['gc']['amount']), $this);?>

        </td>
      </tr>

    <?php endforeach; endif; unset($_from); ?>

  <?php endif; ?>

</table>