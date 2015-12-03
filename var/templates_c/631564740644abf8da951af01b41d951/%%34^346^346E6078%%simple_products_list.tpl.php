<?php /* Smarty version 2.6.26, created on 2015-12-02 18:06:58
         compiled from customer/simple_products_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'list2matrix', 'customer/simple_products_list.tpl', 5, false),array('function', 'interline', 'customer/simple_products_list.tpl', 25, false),array('function', 'currency', 'customer/simple_products_list.tpl', 84, false),array('modifier', 'count', 'customer/simple_products_list.tpl', 9, false),array('modifier', 'escape', 'customer/simple_products_list.tpl', 21, false),array('modifier', 'amp', 'customer/simple_products_list.tpl', 56, false),array('modifier', 'default', 'customer/simple_products_list.tpl', 109, false),)), $this); ?>
<?php echo smarty_function_list2matrix(array('assign' => 'products_matrix','assign_width' => 'cell_width','list' => $this->_tpl_vars['products'],'row_length' => $this->_tpl_vars['config']['Appearance']['simple_length']), $this);?>

<?php $this->assign('is_matrix_view', true); ?>
<?php $this->assign('rowl', $this->_tpl_vars['config']['Appearance']['products_per_row']); ?>

<?php $this->assign('prod_count', count($this->_tpl_vars['products'])); ?>
<?php if ($this->_tpl_vars['prod_count'] < $this->_tpl_vars['rowl']): ?>
	<?php $this->assign('full_width', 100); ?>
	<?php $this->assign('product_table_width', ($this->_tpl_vars['cell_width']*$this->_tpl_vars['prod_count'])); ?>
	<?php $this->assign('cell_width', ($this->_tpl_vars['full_width']/$this->_tpl_vars['prod_count'])); ?>
<?php else: ?>
	<?php $this->assign('product_table_width', 100); ?>
<?php endif; ?>


<?php if ($this->_tpl_vars['products_matrix']): ?>

  <table cellspacing="3" class="products products-table simple-products-table" style="width:<?php echo $this->_tpl_vars['product_table_width']; ?>
%" summary="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_products_list'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">

    <?php $_from = $this->_tpl_vars['products_matrix']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['products_matrix'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['products_matrix']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['row']):
        $this->_foreach['products_matrix']['iteration']++;
?>

      <tr<?php echo smarty_function_interline(array('name' => 'products_matrix'), $this);?>
>

        <?php $_from = $this->_tpl_vars['row']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['products'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['products']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['product']):
        $this->_foreach['products']['iteration']++;
?>
          <?php if ($this->_tpl_vars['product']): ?>

            <td<?php echo smarty_function_interline(array('name' => 'products','additional_class' => "product-cell"), $this);?>
>
              <div class="image">
                <div class="image-wrapper">
                <a href="product.php?productid=<?php echo $this->_tpl_vars['product']['productid']; ?>
"<?php if ($this->_tpl_vars['open_new_window'] == 'Y'): ?> target="_blank"<?php endif; ?>><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "product_thumbnail.tpl", 'smarty_include_vars' => array('productid' => $this->_tpl_vars['product']['productid'],'image_x' => $this->_tpl_vars['product']['tmbn_x'],'image_y' => $this->_tpl_vars['product']['tmbn_y'],'product' => $this->_tpl_vars['product']['product'],'tmbn_url' => $this->_tpl_vars['product']['tmbn_url'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></a>
                </div>
              </div>
            </td>
			<?php if (! ($this->_foreach['products']['iteration'] == $this->_foreach['products']['total'])): ?>
			<td class="column_separator"><div>&nbsp;</div></td>
			<?php endif; ?>
          <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>

      </tr>

      <tr<?php echo smarty_function_interline(array('name' => 'products_matrix','additional_class' => "product-name-row"), $this);?>
>

        <?php $_from = $this->_tpl_vars['row']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['products'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['products']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['product']):
        $this->_foreach['products']['iteration']++;
?>
          <?php if ($this->_tpl_vars['product']): ?>

            <td<?php echo smarty_function_interline(array('name' => 'products','additional_class' => "product-cell"), $this);?>
 style="width: <?php echo $this->_tpl_vars['cell_width']; ?>
%;">
<script type="text/javascript">
//<![CDATA[
products_data[<?php echo $this->_tpl_vars['product']['productid']; ?>
] = {};
//]]>
</script>
              <a href="product.php?productid=<?php echo $this->_tpl_vars['product']['productid']; ?>
" class="product-title"<?php if ($this->_tpl_vars['open_new_window'] == 'Y'): ?> target="_blank"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['product'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
</a>
            </td>
			<?php if (! ($this->_foreach['products']['iteration'] == $this->_foreach['products']['total'])): ?>
			<td class="column_separator"><div>&nbsp;</div></td>
			<?php endif; ?>
          <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>

      </tr>

      <tr<?php echo smarty_function_interline(array('name' => 'products_matrix'), $this);?>
>

        <?php $_from = $this->_tpl_vars['row']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['products'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['products']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['product']):
        $this->_foreach['products']['iteration']++;
?>
          <?php if ($this->_tpl_vars['product']): ?>

            <td<?php echo smarty_function_interline(array('name' => 'products','additional_class' => "product-cell product-cell-price"), $this);?>
>
              <?php if ($this->_tpl_vars['product']['product_type'] != 'C'): ?>

                <?php if ($this->_tpl_vars['product']['appearance']['is_auction']): ?>

                  <span class="price"><?php echo $this->_tpl_vars['lng']['lbl_enter_your_price']; ?>
</span><br />
                  <?php echo $this->_tpl_vars['lng']['lbl_enter_your_price_note']; ?>


                <?php else: ?>

                  <?php if ($this->_tpl_vars['product']['taxed_price'] > 0): ?>

                    <div class="price-row">
                      <span class="price-value"><?php echo smarty_function_currency(array('value' => $this->_tpl_vars['product']['taxed_price']), $this);?>
</span>
                    </div>

                  <?php endif; ?>

                <?php endif; ?>

              <?php else: ?>

                &nbsp;

              <?php endif; ?>

            </td>
			<?php if (! ($this->_foreach['products']['iteration'] == $this->_foreach['products']['total'])): ?>
			<td class="column_separator"><div>&nbsp;</div></td>
			<?php endif; ?>
          <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>

      </tr>
      <?php if (! ($this->_foreach['products_matrix']['iteration'] == $this->_foreach['products_matrix']['total'])): ?>
        <tr class="separator">
          <?php $this->assign('colsp', ($this->_tpl_vars['row_length'])); ?>
		  <?php $this->assign('colsp', ($this->_tpl_vars['colsp']+$this->_tpl_vars['row_length']-1)); ?>
          <td colspan="<?php echo ((is_array($_tmp=@$this->_tpl_vars['colsp'])) ? $this->_run_mod_handler('default', true, $_tmp, 1) : smarty_modifier_default($_tmp, 1)); ?>
">&nbsp;</td>
        </tr>
      <?php endif; ?>

    <?php endforeach; endif; unset($_from); ?>

  </table>

<?php endif; ?>
