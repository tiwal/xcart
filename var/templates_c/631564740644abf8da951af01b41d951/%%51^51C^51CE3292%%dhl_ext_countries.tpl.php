<?php /* Smarty version 2.6.26, created on 2015-12-02 19:10:03
         compiled from customer/main/dhl_ext_countries.tpl */ ?>
<?php if ($this->_tpl_vars['config']['Shipping']['realtime_shipping'] == 'Y' && $this->_tpl_vars['config']['Shipping']['use_intershipper'] != 'Y' && ( ! $this->_tpl_vars['active_modules']['UPS_OnLine_Tools'] || $this->_tpl_vars['show_carriers_selector'] != 'Y' || $this->_tpl_vars['current_carrier'] != 'UPS' ) && $this->_tpl_vars['dhl_ext_countries'] && $this->_tpl_vars['has_active_arb_smethods']): ?>

  <label>
    <?php echo $this->_tpl_vars['lng']['txt_dhl_ext_countries_note']; ?>
:
    <select name="dhl_ext_country" <?php if ($this->_tpl_vars['onchange']): ?> onchange="javascript: self.location = 'cart.php?mode=checkout&amp;action=update&amp;dhl_ext_country=' + this.options[this.selectedIndex].value;"<?php endif; ?>>
      <?php if (! $this->_tpl_vars['dhl_ext_country']): ?>
        <option value=""><?php echo $this->_tpl_vars['lng']['lbl_please_select_one']; ?>
</option>
      <?php endif; ?>
      <?php $_from = $this->_tpl_vars['dhl_ext_countries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
        <option value="<?php echo $this->_tpl_vars['c']; ?>
"<?php if ($this->_tpl_vars['c'] == $this->_tpl_vars['dhl_ext_country']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['c']; ?>
</option>
      <?php endforeach; endif; unset($_from); ?>
    </select>
  </label>

<?php endif; ?>