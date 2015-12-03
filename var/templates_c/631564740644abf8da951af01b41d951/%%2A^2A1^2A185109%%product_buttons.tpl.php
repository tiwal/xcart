<?php /* Smarty version 2.6.26, created on 2015-12-02 18:06:58
         compiled from modules/Feature_Comparison/product_buttons.tpl */ ?>
<?php if ($this->_tpl_vars['product']['fclassid'] > 0 && ( $this->_tpl_vars['is_comparison_list'] == 'Y' || ( $this->_tpl_vars['product']['other_products'] || $this->_tpl_vars['product']['is_product_popup'] == 'Y' ) )): ?>

  <div class="fcomp-product-box">

    <?php if ($this->_tpl_vars['is_comparison_list'] == 'Y' && $this->_tpl_vars['product']['appearance']['dropout_actions'] == ""): ?>
      <div class="buttons-row">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Feature_Comparison/add_comparison_list.tpl", 'smarty_include_vars' => array('productid' => $this->_tpl_vars['product']['productid'],'additional_button_class' => "light-button")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </div>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['product']['other_products'] || $this->_tpl_vars['product']['is_product_popup'] == 'Y'): ?>
      <div class="fcomp-compare-with-title"><?php echo $this->_tpl_vars['lng']['lbl_fcomp_compare_product_with']; ?>
</div>
        <form action="comparison.php" method="post" name="compareform">
          <input type="hidden" name="mode" value="get_products" />
          <input type="hidden" name="productids[<?php echo $this->_tpl_vars['product']['productid']; ?>
]" value="Y" />
      <div class="fcomp-select-box">

          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Feature_Comparison/product_selector.tpl", 'smarty_include_vars' => array('products' => $this->_tpl_vars['product']['other_products'],'is_product_popup' => $this->_tpl_vars['product']['is_product_popup'],'fclassid' => $this->_tpl_vars['product']['fclassid'],'no_ids' => $this->_tpl_vars['product']['productid'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_product_comparison'],'type' => 'input','style' => 'image')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </div>

        </form>
    <?php endif; ?>

  </div>

<?php endif; ?>