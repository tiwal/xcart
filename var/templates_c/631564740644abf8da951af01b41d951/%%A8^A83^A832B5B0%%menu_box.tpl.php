<?php /* Smarty version 2.6.26, created on 2015-12-02 19:19:03
         compiled from provider/menu_box.tpl */ ?>
<?php if ($this->webmaster_mode) { ?><div id="common_files0provider0menu_box.tpl" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?><?php func_load_lang($this, "provider/menu_box.tpl","lbl_dashboard,lbl_orders,lbl_this_month_orders,lbl_search_orders_menu,lbl_provider_commissions,lbl_catalog,lbl_add_new_product,lbl_products,lbl_extra_fields,lbl_manufacturers,lbl_discounts,lbl_coupons,lbl_shipping_and_taxes,lbl_shipping_and_taxes,lbl_destination_zones,lbl_tax_rates,lbl_shipping_charges,lbl_shipping_markups,lbl_tools,lbl_summary,lbl_files,lbl_import_export,lbl_update_inventory"); ?>
<ul id="horizontal-menu">

<li>
<a href="home.php"><?php echo $this->_tpl_vars['lng']['lbl_dashboard']; ?>
</a>
</li>

<li>

<a href="<?php echo $this->_tpl_vars['catalogs']['provider']; ?>
/orders.php?mode=new"><?php echo $this->_tpl_vars['lng']['lbl_orders']; ?>
</a>

<div>
<a href="<?php echo $this->_tpl_vars['catalogs']['provider']; ?>
/orders.php?mode=new"><?php echo $this->_tpl_vars['lng']['lbl_this_month_orders']; ?>
</a>
<a href="<?php echo $this->_tpl_vars['catalogs']['provider']; ?>
/orders.php"><?php echo $this->_tpl_vars['lng']['lbl_search_orders_menu']; ?>
</a>
<a href="<?php echo $this->_tpl_vars['catalogs']['provider']; ?>
/commissions.php"><?php echo $this->_tpl_vars['lng']['lbl_provider_commissions']; ?>
</a>
</div>
</li>

<li>

<a href='<?php echo $this->_tpl_vars['catalogs']['provider']; ?>
/search.php'><?php echo $this->_tpl_vars['lng']['lbl_catalog']; ?>
</a>

<div>
<a href="<?php echo $this->_tpl_vars['catalogs']['provider']; ?>
/product_modify.php"><?php echo $this->_tpl_vars['lng']['lbl_add_new_product']; ?>
</a>
<a href="<?php echo $this->_tpl_vars['catalogs']['provider']; ?>
/search.php"><?php echo $this->_tpl_vars['lng']['lbl_products']; ?>
</a>
<?php if ($this->_tpl_vars['active_modules']['Extra_Fields'] != ""): ?>
<a href="<?php echo $this->_tpl_vars['catalogs']['provider']; ?>
/extra_fields.php"><?php echo $this->_tpl_vars['lng']['lbl_extra_fields']; ?>
</a>
<?php endif; ?>
<?php if ($this->_tpl_vars['active_modules']['Manufacturers']): ?>
<a href="<?php echo $this->_tpl_vars['catalogs']['provider']; ?>
/manufacturers.php"><?php echo $this->_tpl_vars['lng']['lbl_manufacturers']; ?>
</a>
<?php endif; ?>
<?php if ($this->_tpl_vars['active_modules']['Special_Offers'] != ""): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Special_Offers/menu_provider.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<a href="<?php echo $this->_tpl_vars['catalogs']['provider']; ?>
/discounts.php"><?php echo $this->_tpl_vars['lng']['lbl_discounts']; ?>
</a>
<?php if ($this->_tpl_vars['active_modules']['Discount_Coupons'] != ""): ?>
<a href="<?php echo $this->_tpl_vars['catalogs']['provider']; ?>
/coupons.php"><?php echo $this->_tpl_vars['lng']['lbl_coupons']; ?>
</a>
<?php endif; ?>
<?php if ($this->_tpl_vars['active_modules']['Product_Configurator'] != ""): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Product_Configurator/pconf_menu_provider.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['active_modules']['Feature_Comparison'] != ""): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Feature_Comparison/admin_menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
</div>
</li>

<li>

<?php if ($this->_tpl_vars['config']['Shipping']['enable_shipping'] == 'Y'): ?>
  <a href="<?php echo $this->_tpl_vars['catalogs']['provider']; ?>
/shipping_rates.php"><?php echo $this->_tpl_vars['lng']['lbl_shipping_and_taxes']; ?>
</a>
<?php else: ?>
  <a href="<?php echo $this->_tpl_vars['catalogs']['provider']; ?>
/taxes.php"><?php echo $this->_tpl_vars['lng']['lbl_shipping_and_taxes']; ?>
</a>
<?php endif; ?>

<div>
<a href="<?php echo $this->_tpl_vars['catalogs']['provider']; ?>
/zones.php"><?php echo $this->_tpl_vars['lng']['lbl_destination_zones']; ?>
</a>
<a href="<?php echo $this->_tpl_vars['catalogs']['provider']; ?>
/taxes.php"><?php echo $this->_tpl_vars['lng']['lbl_tax_rates']; ?>
</a>
<?php if ($this->_tpl_vars['config']['Shipping']['enable_shipping'] == 'Y'): ?>
<a href="<?php echo $this->_tpl_vars['catalogs']['provider']; ?>
/shipping_rates.php"><?php echo $this->_tpl_vars['lng']['lbl_shipping_charges']; ?>
</a>
<?php if ($this->_tpl_vars['config']['Shipping']['realtime_shipping'] == 'Y'): ?>
<a href="<?php echo $this->_tpl_vars['catalogs']['provider']; ?>
/shipping_rates.php?type=R"><?php echo $this->_tpl_vars['lng']['lbl_shipping_markups']; ?>
</a>
<?php endif; ?>
<?php endif; ?>
</div>
</li>

<li>

<a href="<?php echo $this->_tpl_vars['catalogs']['provider']; ?>
/general.php"><?php echo $this->_tpl_vars['lng']['lbl_tools']; ?>
</a>

<div>
<a href="<?php echo $this->_tpl_vars['catalogs']['provider']; ?>
/general.php"><?php echo $this->_tpl_vars['lng']['lbl_summary']; ?>
</a>
<a href="<?php echo $this->_tpl_vars['catalogs']['provider']; ?>
/file_manage.php"><?php echo $this->_tpl_vars['lng']['lbl_files']; ?>
</a>
<a href="<?php echo $this->_tpl_vars['catalogs']['provider']; ?>
/import.php"><?php echo $this->_tpl_vars['lng']['lbl_import_export']; ?>
</a>
<a href="<?php echo $this->_tpl_vars['catalogs']['provider']; ?>
/inv_update.php"><?php echo $this->_tpl_vars['lng']['lbl_update_inventory']; ?>
</a>
</div>
</li>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/help.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</ul><?php if ($this->webmaster_mode) { ?></div><?php } ?>