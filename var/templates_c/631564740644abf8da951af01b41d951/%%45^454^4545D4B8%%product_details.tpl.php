<?php /* Smarty version 2.6.26, created on 2015-12-02 18:06:58
         compiled from customer/main/product_details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'customer/main/product_details.tpl', 8, false),array('modifier', 'default', 'customer/main/product_details.tpl', 18, false),array('modifier', 'substitute', 'customer/main/product_details.tpl', 50, false),array('modifier', 'formatprice', 'customer/main/product_details.tpl', 62, false),array('function', 'currency', 'customer/main/product_details.tpl', 82, false),array('function', 'alter_currency', 'customer/main/product_details.tpl', 91, false),)), $this); ?>
<form name="orderform" method="post" action="cart.php" onsubmit="javascript: return FormValidation(this);" id="orderform">
  <input type="hidden" name="mode" value="<?php if ($this->_tpl_vars['active_modules']['Gift_Registry'] && $this->_tpl_vars['wishlistid']): ?>wl2cart<?php else: ?>add<?php endif; ?>" />
  <input type="hidden" name="productid" value="<?php echo $this->_tpl_vars['product']['productid']; ?>
" />
  <input type="hidden" name="cat" value="<?php echo ((is_array($_tmp=$_GET['cat'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
  <input type="hidden" name="page" value="<?php echo ((is_array($_tmp=$_GET['page'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
  <?php if ($this->_tpl_vars['active_modules']['Gift_Registry'] && $this->_tpl_vars['wishlistid']): ?>
    <input type="hidden" name="fwlitem" value="<?php echo $this->_tpl_vars['wishlistid']; ?>
" />
    <input type="hidden" name="eventid" value="<?php echo $this->_tpl_vars['eventid']; ?>
" />
  <?php endif; ?>

  <table cellspacing="0" cellpadding="0" summary="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_description'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">

    <tr>
      <td class="descr"><?php echo ((is_array($_tmp=@$this->_tpl_vars['product']['fulldescr'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['product']['descr']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['product']['descr'])); ?>
</td>

      <?php if ($this->_tpl_vars['active_modules']['Special_Offers']): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Special_Offers/customer/product_bp_icon.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <?php endif; ?>

      <?php if ($this->_tpl_vars['product']['appearance']['has_market_price'] && $this->_tpl_vars['product']['appearance']['market_price_discount'] > 0): ?>
        <td align="right" valign="top">
          <div class="save-percent-container">
            <div class="save" id="save_percent_box">
              <span id="save_percent"><?php echo $this->_tpl_vars['product']['appearance']['market_price_discount']; ?>
</span>%
            </div>
          </div>
        </td>
      <?php endif; ?>

    </tr>

  </table>

  <table cellspacing="0" class="product-properties" summary="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_description'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">

    <tr>
      <td class="property-name"><?php echo $this->_tpl_vars['lng']['lbl_sku']; ?>
</td>
      <td class="property-value" id="product_code" colspan="2"><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['productcode'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
    </tr>

    <?php if ($this->_tpl_vars['config']['Appearance']['show_in_stock'] == 'Y' && $this->_tpl_vars['config']['General']['unlimited_products'] != 'Y' && $this->_tpl_vars['product']['distribution'] == ""): ?>
      <tr>
        <td class="property-name"><?php echo $this->_tpl_vars['lng']['lbl_in_stock']; ?>
</td>
        <td class="property-value product-quantity-text" colspan="2">
          <?php if ($this->_tpl_vars['product']['avail'] > 0): ?>
            <?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['txt_items_available'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'items', $this->_tpl_vars['product']['avail']) : smarty_modifier_substitute($_tmp, 'items', $this->_tpl_vars['product']['avail'])); ?>

          <?php else: ?>
            <?php echo $this->_tpl_vars['lng']['lbl_no_items_available']; ?>

          <?php endif; ?>
        </td>
      </tr>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['product']['weight'] != "0.00" || $this->_tpl_vars['variants'] != ''): ?>
      <tr id="product_weight_box"<?php if ($this->_tpl_vars['product']['weight'] == '0.00'): ?> style="display: none;"<?php endif; ?>>
        <td class="property-name"><?php echo $this->_tpl_vars['lng']['lbl_weight']; ?>
</td>
        <td class="property-value" colspan="2">
          <span id="product_weight"><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['weight'])) ? $this->_run_mod_handler('formatprice', true, $_tmp) : smarty_modifier_formatprice($_tmp)); ?>
</span> <?php echo $this->_tpl_vars['config']['General']['weight_symbol']; ?>

        </td>
      </tr>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['active_modules']['Extra_Fields']): ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Extra_Fields/product.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['active_modules']['Feature_Comparison']): ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Feature_Comparison/product.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>

    <tr class="separator">
      <td colspan="3">&nbsp;</td>
    </tr>

    <?php if ($this->_tpl_vars['product']['appearance']['has_market_price'] && $this->_tpl_vars['product']['appearance']['market_price_discount'] > 0): ?>
      <tr>
        <td class="property-name product-taxed-price"><?php echo $this->_tpl_vars['lng']['lbl_market_price']; ?>
:</td>
        <td class="property-value product-taxed-price" colspan="2"><?php echo smarty_function_currency(array('value' => $this->_tpl_vars['product']['list_price']), $this);?>
</td>
      </tr>
    <?php endif; ?>

    <tr>
      <td class="property-name product-price" valign="top"><?php echo $this->_tpl_vars['lng']['lbl_our_price']; ?>
:</td>
      <td class="property-value" valign="top" colspan="2">
      <?php if ($this->_tpl_vars['product']['taxed_price'] != 0 || $this->_tpl_vars['variant_price_no_empty']): ?>
        <span class="product-price-value"><?php echo smarty_function_currency(array('value' => $this->_tpl_vars['product']['taxed_price'],'tag_id' => 'product_price'), $this);?>
</span>
        <span class="product-market-price"><?php echo smarty_function_alter_currency(array('value' => $this->_tpl_vars['product']['taxed_price'],'tag_id' => 'product_alt_price'), $this);?>
</span>
        <?php if ($this->_tpl_vars['product']['taxes']): ?>
          <br /><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/taxed_price.tpl", 'smarty_include_vars' => array('taxes' => $this->_tpl_vars['product']['taxes'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>

      <?php else: ?>
        <input type="text" size="7" name="price" />
      <?php endif; ?>
      </td>
    </tr>

    <?php if ($this->_tpl_vars['product']['forsale'] != 'B'): ?>
      <tr>
        <td colspan="3"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/product_prices.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
      </tr>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['product']['forsale'] != 'B' || ( $this->_tpl_vars['product']['forsale'] == 'B' && $_GET['pconf'] != "" && $this->_tpl_vars['active_modules']['Product_Configurator'] )): ?>

      <?php if ($this->_tpl_vars['active_modules']['Product_Options'] != ""): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Product_Options/customer_options.tpl", 'smarty_include_vars' => array('disable' => $this->_tpl_vars['lock_options'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <?php endif; ?>

      <tr class="quantity-row">

        <?php if ($this->_tpl_vars['product']['appearance']['empty_stock'] && ( $this->_tpl_vars['variants'] == '' || ( $this->_tpl_vars['variants'] != '' && $this->_tpl_vars['product']['avail'] <= 0 ) )): ?>

          <td colspan="3" class="product-input">
		  <div class="quantity"><img class="left_crns_qty" src="<?php echo $this->_tpl_vars['AltImagesDir']; ?>
/custom/left_corners.gif" alt=""/><img class="right_crns_qty" src="<?php echo $this->_tpl_vars['AltImagesDir']; ?>
/custom/right_corners.gif" alt=""/>
		  <?php echo $this->_tpl_vars['lng']['lbl_qty']; ?>

<script type="text/javascript">
//<![CDATA[
var min_avail = 1;
var avail = 0;
var product_avail = 0;
//]]>
</script>

            <strong><?php echo $this->_tpl_vars['lng']['txt_out_of_stock']; ?>
</strong>
			</div>
          

        <?php elseif (! $this->_tpl_vars['product']['appearance']['force_1_amount'] && $this->_tpl_vars['product']['forsale'] != 'B'): ?>

          <td colspan="3" class="product-input">
            <div class="quantity"><img class="left_crns_qty" src="<?php echo $this->_tpl_vars['AltImagesDir']; ?>
/custom/left_corners.gif" alt=""/><img class="right_crns_qty" src="<?php echo $this->_tpl_vars['AltImagesDir']; ?>
/custom/right_corners.gif" alt=""/>
			<?php if ($this->_tpl_vars['config']['Appearance']['show_in_stock'] == 'Y' && ! $this->_tpl_vars['product']['appearance']['quantity_input_box_enabled'] && $this->_tpl_vars['config']['General']['unlimited_products'] != 'Y'): ?>
              <?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_quantity_x'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'quantity', $this->_tpl_vars['product']['avail']) : smarty_modifier_substitute($_tmp, 'quantity', $this->_tpl_vars['product']['avail'])); ?>

            <?php else: ?>
              <?php echo $this->_tpl_vars['lng']['lbl_qty']; ?>

            <?php endif; ?>
  
<script type="text/javascript">
//<![CDATA[
var min_avail = <?php echo ((is_array($_tmp=@$this->_tpl_vars['product']['appearance']['min_quantity'])) ? $this->_run_mod_handler('default', true, $_tmp, 1) : smarty_modifier_default($_tmp, 1)); ?>
;
var avail = <?php echo ((is_array($_tmp=@$this->_tpl_vars['product']['appearance']['max_quantity'])) ? $this->_run_mod_handler('default', true, $_tmp, 1) : smarty_modifier_default($_tmp, 1)); ?>
;
var product_avail = <?php echo ((is_array($_tmp=@$this->_tpl_vars['product']['avail'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
;
//]]>
</script>
            <input type="text" id="product_avail_input" name="amount" maxlength="11" size="1" onchange="javascript: return check_quantity_input_box(this);" value="<?php echo ((is_array($_tmp=@$_GET['quantity'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['product']['appearance']['min_quantity']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['product']['appearance']['min_quantity'])); ?>
"<?php if (! $this->_tpl_vars['product']['appearance']['quantity_input_box_enabled']): ?> disabled="disabled" style="display: none;"<?php endif; ?>/>
            <?php if ($this->_tpl_vars['product']['appearance']['quantity_input_box_enabled'] && $this->_tpl_vars['config']['Appearance']['show_in_stock'] == 'Y' && $this->_tpl_vars['config']['General']['unlimited_products'] != 'Y'): ?>
              <span id="product_avail_text" class="quantity-text"><?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_product_quantity_from_to'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'min', $this->_tpl_vars['product']['appearance']['min_quantity'], 'max', $this->_tpl_vars['product']['avail']) : smarty_modifier_substitute($_tmp, 'min', $this->_tpl_vars['product']['appearance']['min_quantity'], 'max', $this->_tpl_vars['product']['avail'])); ?>
</span>
            <?php endif; ?>

            <select id="product_avail" name="amount"<?php if ($this->_tpl_vars['active_modules']['Product_Options'] != '' && ( $this->_tpl_vars['product_options'] != '' || $this->_tpl_vars['product_wholesale'] != '' )): ?> onchange="javascript: check_wholesale(this.value);"<?php endif; ?><?php if ($this->_tpl_vars['product']['appearance']['quantity_input_box_enabled']): ?> disabled="disabled" style="display: none;"<?php endif; ?>>
                <option value="<?php echo $this->_tpl_vars['product']['appearance']['min_quantity']; ?>
"<?php if ($_GET['quantity'] == $this->_tpl_vars['product']['appearance']['min_quantity']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['product']['appearance']['min_quantity']; ?>
</option>
              <?php if (! $this->_tpl_vars['product']['appearance']['quantity_input_box_enabled']): ?>
                <?php unset($this->_sections['quantity']);
$this->_sections['quantity']['name'] = 'quantity';
$this->_sections['quantity']['loop'] = is_array($_loop=$this->_tpl_vars['product']['appearance']['loop_quantity']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['quantity']['start'] = (int)$this->_tpl_vars['product']['appearance']['min_quantity'];
$this->_sections['quantity']['show'] = true;
$this->_sections['quantity']['max'] = $this->_sections['quantity']['loop'];
$this->_sections['quantity']['step'] = 1;
if ($this->_sections['quantity']['start'] < 0)
    $this->_sections['quantity']['start'] = max($this->_sections['quantity']['step'] > 0 ? 0 : -1, $this->_sections['quantity']['loop'] + $this->_sections['quantity']['start']);
else
    $this->_sections['quantity']['start'] = min($this->_sections['quantity']['start'], $this->_sections['quantity']['step'] > 0 ? $this->_sections['quantity']['loop'] : $this->_sections['quantity']['loop']-1);
if ($this->_sections['quantity']['show']) {
    $this->_sections['quantity']['total'] = min(ceil(($this->_sections['quantity']['step'] > 0 ? $this->_sections['quantity']['loop'] - $this->_sections['quantity']['start'] : $this->_sections['quantity']['start']+1)/abs($this->_sections['quantity']['step'])), $this->_sections['quantity']['max']);
    if ($this->_sections['quantity']['total'] == 0)
        $this->_sections['quantity']['show'] = false;
} else
    $this->_sections['quantity']['total'] = 0;
if ($this->_sections['quantity']['show']):

            for ($this->_sections['quantity']['index'] = $this->_sections['quantity']['start'], $this->_sections['quantity']['iteration'] = 1;
                 $this->_sections['quantity']['iteration'] <= $this->_sections['quantity']['total'];
                 $this->_sections['quantity']['index'] += $this->_sections['quantity']['step'], $this->_sections['quantity']['iteration']++):
$this->_sections['quantity']['rownum'] = $this->_sections['quantity']['iteration'];
$this->_sections['quantity']['index_prev'] = $this->_sections['quantity']['index'] - $this->_sections['quantity']['step'];
$this->_sections['quantity']['index_next'] = $this->_sections['quantity']['index'] + $this->_sections['quantity']['step'];
$this->_sections['quantity']['first']      = ($this->_sections['quantity']['iteration'] == 1);
$this->_sections['quantity']['last']       = ($this->_sections['quantity']['iteration'] == $this->_sections['quantity']['total']);
?>
                  <?php if ($this->_sections['quantity']['index'] != $this->_tpl_vars['product']['appearance']['min_quantity']): ?>
                    <option value="<?php echo $this->_sections['quantity']['index']; ?>
"<?php if ($_GET['quantity'] == $this->_sections['quantity']['index']): ?> selected="selected"<?php endif; ?>><?php echo $this->_sections['quantity']['index']; ?>
</option>
                  <?php endif; ?>
                <?php endfor; endif; ?>
              <?php endif; ?>
            </select>
			</div>
          

        <?php else: ?>

          <td colspan="3" class="product-input">
		  <div class="quantity"><img class="left_crns_qty" src="<?php echo $this->_tpl_vars['AltImagesDir']; ?>
/custom/left_corners.gif" alt=""/><img class="right_crns_qty" src="<?php echo $this->_tpl_vars['AltImagesDir']; ?>
/custom/right_corners.gif" alt=""/>
		  <?php echo $this->_tpl_vars['lng']['lbl_qty']; ?>


<script type="text/javascript">
//<![CDATA[
var min_avail = 1;
var avail = 1;
var product_avail = 1;
//]]>
</script>

            <span class="product-one-quantity">1</span>
            <input type="hidden" name="amount" value="1" />

            <?php if ($this->_tpl_vars['product']['distribution'] != ""): ?>
              <?php echo $this->_tpl_vars['lng']['txt_product_downloadable']; ?>

            <?php endif; ?>
			</div>
          

        <?php endif; ?>

      

      <?php if ($this->_tpl_vars['product']['min_amount'] > 1): ?>
          <span class="product-min-amount"><?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['txt_need_min_amount'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'items', $this->_tpl_vars['product']['min_amount']) : smarty_modifier_substitute($_tmp, 'items', $this->_tpl_vars['product']['min_amount'])); ?>
</span>
      <?php endif; ?>
		<?php if ($this->_tpl_vars['product']['appearance']['buy_now_buttons_enabled']): ?>
			 <?php if ($this->_tpl_vars['product']['forsale'] != 'B'): ?>
			<div class="buttons-row">

			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/buy_now_list.tpl", 'smarty_include_vars' => array('type' => 'input','additional_button_class' => "main-button")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

			<?php if ($this->_tpl_vars['product']['appearance']['dropout_actions']): ?>
			  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/add_to_list.tpl", 'smarty_include_vars' => array('id' => $this->_tpl_vars['product']['productid'],'js_if_condition' => "FormValidation()")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

			<?php elseif ($this->_tpl_vars['product']['appearance']['buy_now_add2wl_enabled']): ?>
			   <a title="<?php echo $this->_tpl_vars['lng']['lbl_add_to_wl']; ?>
" onclick="javascript: if (FormValidation()) submitForm(document.orderform, 'add2wl', arguments[0]);" href="javascript: void(0);">
					<img src="<?php echo $this->_tpl_vars['AltImagesDir']; ?>
/custom/add_to_wl.png" alt="<?php echo $this->_tpl_vars['lng']['lbl_add_to_wl']; ?>
"/>
				</a>
			<?php endif; ?>

			</div>
			<?php else: ?>

			  <?php echo $this->_tpl_vars['lng']['txt_pconf_product_is_bundled']; ?>


			<?php endif; ?>
		<?php endif; ?>
	  </td>
	 </tr>
    <?php endif; ?>

  </table>

  <?php if ($this->_tpl_vars['product']['appearance']['buy_now_buttons_enabled']): ?>

    <?php if ($this->_tpl_vars['product']['forsale'] != 'B'): ?>

      <ul class="simple-list">
      <?php if ($this->_tpl_vars['active_modules']['Socialize']): ?>
      <li>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Socialize/buttons_row.tpl", 'smarty_include_vars' => array('detailed' => true,'href' => ($this->_tpl_vars['current_location'])."/".($this->_tpl_vars['canonical_url']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </li>
      <?php endif; ?>

      <?php if ($this->_tpl_vars['config']['Company']['support_department'] != ""): ?> 
      <li>
      
      <div class="ask-question">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_ask_question_about_product'],'style' => 'link','href' => "javascript: return !popupOpen(xcart_web_dir + '/popup_ask.php?productid=".($this->_tpl_vars['product']['productid'])."')")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </div>

      <div class="clearing"></div>
      </li>
      <?php endif; ?>

      </ul>

    <?php endif; ?>

    <?php if ($_GET['pconf'] != "" && $this->_tpl_vars['active_modules']['Product_Configurator']): ?>

      <input type="hidden" name="slot" value="<?php echo $_GET['slot']; ?>
" />
      <input type="hidden" name="addproductid" value="<?php echo $this->_tpl_vars['product']['productid']; ?>
" />

      <div class="button-row">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_pconf_add_to_configuration'],'href' => "javascript: if (FormValidation()) ".($this->_tpl_vars['ldelim'])."document.orderform.productid.value='".($_GET['pconf'])."'; document.orderform.action='pconf.php'; document.orderform.submit();".($this->_tpl_vars['rdelim']),'additional_button_class' => "light-button")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </div>

      <?php if ($this->_tpl_vars['product']['appearance']['empty_stock']): ?>
        <p class="message">
          <strong><?php echo $this->_tpl_vars['lng']['lbl_note']; ?>
:</strong> <?php echo $this->_tpl_vars['lng']['lbl_pconf_slot_out_of_stock_note']; ?>

        </p>
      <?php endif; ?>

      <?php if ($this->_tpl_vars['product']['appearance']['min_quantity'] == $this->_tpl_vars['product']['appearance']['max_quantity']): ?>
        <p><?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['txt_add_to_configuration_note'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'items', $this->_tpl_vars['product']['appearance']['min_quantity']) : smarty_modifier_substitute($_tmp, 'items', $this->_tpl_vars['product']['appearance']['min_quantity'])); ?>
</p>
      <?php endif; ?>

    <?php endif; ?>

  <?php endif; ?>

</form>
<?php if ($this->_tpl_vars['active_modules']['Product_Options'] && ( $this->_tpl_vars['product_options'] != '' || $this->_tpl_vars['product_wholesale'] != '' ) && ( $this->_tpl_vars['product']['product_type'] != 'C' || ! $this->_tpl_vars['active_modules']['Product_Configurator'] )): ?>
<script type="text/javascript">
//<![CDATA[
setTimeout(check_options, 200);
//]]>
</script>
<?php endif; ?>
