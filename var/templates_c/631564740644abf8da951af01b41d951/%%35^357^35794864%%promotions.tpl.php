<?php /* Smarty version 2.6.26, created on 2015-12-02 19:16:22
         compiled from provider/main/promotions.tpl */ ?>
<?php if ($this->webmaster_mode) { ?><div id="common_files0provider0main0promotions.tpl" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?><?php func_load_lang($this, "provider/main/promotions.tpl","lbl_add_new_product,txt_provider_promotion_add_new_product_note,lbl_product_modify,txt_provider_promotion_modify_product_note,lbl_extra_fields,lbl_provider_promotion_ef_note,lbl_shipping_charges,txt_provider_promotion_sc_note,lbl_destination_zones,txt_provider_promotion_dz_note,lbl_discounts,txt_provider_promotion_discounts_note,lbl_coupons,txt_provider_promotion_coupons_note,lbl_tax_rates,txt_provider_promotion_taxes_note,lbl_new_orders,txt_provider_promotion_no_note,lbl_search_orders_menu,txt_provider_promotion_so_note"); ?><?php if ($this->_tpl_vars['root_warning']): ?>
  <?php ob_start(); ?>
    <?php echo $this->_tpl_vars['root_warning']; ?>

  <?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "location.tpl", 'smarty_include_vars' => array('location' => "",'alt_content' => $this->_smarty_vars['capture']['dialog'],'extra' => 'width="100%"','newid' => 'root_warning','alt_type' => 'W')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<br />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/promotion_link.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_add_new_product'],'href' => ($this->_tpl_vars['catalogs']['provider'])."/product_modify.php",'promo_note' => $this->_tpl_vars['lng']['txt_provider_promotion_add_new_product_note'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/promotion_link.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_product_modify'],'href' => ($this->_tpl_vars['catalogs']['provider'])."/search.php",'promo_note' => $this->_tpl_vars['lng']['txt_provider_promotion_modify_product_note'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if ($this->_tpl_vars['active_modules']['Extra_Fields'] != ""): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/promotion_link.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_extra_fields'],'href' => ($this->_tpl_vars['catalogs']['provider'])."/extra_fields.php",'promo_note' => $this->_tpl_vars['lng']['lbl_provider_promotion_ef_note'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/promotion_link.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_shipping_charges'],'href' => ($this->_tpl_vars['catalogs']['provider'])."/shipping_rates.php",'promo_note' => $this->_tpl_vars['lng']['txt_provider_promotion_sc_note'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/promotion_link.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_destination_zones'],'href' => ($this->_tpl_vars['catalogs']['provider'])."/zones.php",'promo_note' => $this->_tpl_vars['lng']['txt_provider_promotion_dz_note'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/promotion_link.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_discounts'],'href' => ($this->_tpl_vars['catalogs']['provider'])."/discounts.php",'promo_note' => $this->_tpl_vars['lng']['txt_provider_promotion_discounts_note'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/promotion_link.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_coupons'],'href' => ($this->_tpl_vars['catalogs']['provider'])."/coupons.php",'promo_note' => $this->_tpl_vars['lng']['txt_provider_promotion_coupons_note'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/promotion_link.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_tax_rates'],'href' => ($this->_tpl_vars['catalogs']['provider'])."/taxes.php",'promo_note' => $this->_tpl_vars['lng']['txt_provider_promotion_taxes_note'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if (! $this->_tpl_vars['single_mode']): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/promotion_link.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_new_orders'],'href' => ($this->_tpl_vars['catalogs']['provider'])."/orders.php?substring=&amp;status=Q",'promo_note' => $this->_tpl_vars['lng']['txt_provider_promotion_no_note'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/promotion_link.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_search_orders_menu'],'href' => ($this->_tpl_vars['catalogs']['provider'])."/orders.php",'promo_note' => $this->_tpl_vars['lng']['txt_provider_promotion_so_note'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?><?php if ($this->webmaster_mode) { ?></div><?php } ?>