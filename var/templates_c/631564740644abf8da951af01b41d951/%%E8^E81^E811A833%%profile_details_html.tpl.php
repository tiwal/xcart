<?php /* Smarty version 2.6.26, created on 2015-12-02 19:10:03
         compiled from modules/One_Page_Checkout/profile/profile_details_html.tpl */ ?>
<div class="opc-checkout-profile">

  <?php if ($this->_tpl_vars['userinfo']['field_sections']['B']): ?>
    <?php if ($this->_tpl_vars['userinfo']['login'] != ''): ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/One_Page_Checkout/profile/address_book_link.tpl", 'smarty_include_vars' => array('type' => 'B')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
    <div class="opc-section-container">
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/address_details_html.tpl", 'smarty_include_vars' => array('address' => $this->_tpl_vars['userinfo']['address']['B'],'default_fields' => $this->_tpl_vars['userinfo']['default_address_fields'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <?php if ($this->_tpl_vars['userinfo']['login'] == ''): ?>
        <div class="address-line">
          <?php echo $this->_tpl_vars['lng']['lbl_email']; ?>
: <?php echo $this->_tpl_vars['userinfo']['email']; ?>
<br />
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['userinfo']['field_sections']['S'] && $this->_tpl_vars['ship2diff']): ?>
    <div class="optional-label">
      <label for="ship2diff">
        <input type="checkbox" id="ship2diff" name="ship2diff" value="Y" checked="checked" disabled="disabled" />
        <?php echo $this->_tpl_vars['lng']['lbl_ship_to_different_address']; ?>

      </label>
    </div>
    <?php if ($this->_tpl_vars['userinfo']['login'] != ''): ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/One_Page_Checkout/profile/address_book_link.tpl", 'smarty_include_vars' => array('type' => 'S')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
    <div class="opc-section-container">
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/address_details_html.tpl", 'smarty_include_vars' => array('address' => $this->_tpl_vars['userinfo']['address']['S'],'default_fields' => $this->_tpl_vars['userinfo']['default_address_fields'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['userinfo']['field_sections']['P']): ?>
    <h3><?php echo $this->_tpl_vars['lng']['lbl_personal_details']; ?>
</h3>
    <div class="opc-section-container">
      <div class="address-line">
        <?php if ($this->_tpl_vars['userinfo']['default_fields']['title'] && $this->_tpl_vars['userinfo']['title'] != ''): ?><?php echo $this->_tpl_vars['userinfo']['title']; ?>
 <?php endif; ?>
        <?php if ($this->_tpl_vars['userinfo']['default_fields']['firstname'] && $this->_tpl_vars['userinfo']['firstname'] != ''): ?><?php echo $this->_tpl_vars['userinfo']['firstname']; ?>
 <?php endif; ?>
        <?php if ($this->_tpl_vars['userinfo']['default_fields']['lastname'] && $this->_tpl_vars['userinfo']['lastname'] != ''): ?><?php echo $this->_tpl_vars['userinfo']['lastname']; ?>
<?php endif; ?>
      </div>

      <div class="address-line">
        <?php if ($this->_tpl_vars['userinfo']['default_fields']['company'] && $this->_tpl_vars['userinfo']['company'] != ''): ?>
          <?php echo $this->_tpl_vars['lng']['lbl_company']; ?>
: <?php echo $this->_tpl_vars['userinfo']['company']; ?>
<br />
        <?php endif; ?>
        <?php if ($this->_tpl_vars['userinfo']['default_fields']['url'] && $this->_tpl_vars['userinfo']['url'] != ''): ?>
          <?php echo $this->_tpl_vars['lng']['lbl_url']; ?>
: <?php echo $this->_tpl_vars['userinfo']['url']; ?>
<br />
        <?php endif; ?>
        <?php if ($this->_tpl_vars['userinfo']['default_fields']['ssn'] && $this->_tpl_vars['userinfo']['ssn'] != ''): ?>
          <?php echo $this->_tpl_vars['lng']['lbl_ssn']; ?>
: <?php echo $this->_tpl_vars['userinfo']['ssn']; ?>
<br />
        <?php endif; ?>
        <?php if ($this->_tpl_vars['userinfo']['default_fields']['tax_number'] && $this->_tpl_vars['userinfo']['tax_number'] != ''): ?>
          <?php echo $this->_tpl_vars['lng']['lbl_tax_number']; ?>
: <?php echo $this->_tpl_vars['userinfo']['tax_number']; ?>
<br />
        <?php endif; ?>

        <?php $_from = $this->_tpl_vars['userinfo']['additional_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
          <?php if ($this->_tpl_vars['v']['section'] == 'P' && $this->_tpl_vars['v']['avail'] == 'Y'): ?>
            <?php echo $this->_tpl_vars['v']['title']; ?>
: <?php echo $this->_tpl_vars['v']['value']; ?>
<br />
          <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['userinfo']['field_sections']['A']): ?>
    <h3><?php echo $this->_tpl_vars['lng']['lbl_additional_information']; ?>
</h3>
    <div class="opc-section-container">
      <div class="address-line">
        <?php $_from = $this->_tpl_vars['userinfo']['additional_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
          <?php if ($this->_tpl_vars['v']['section'] == 'A' && $this->_tpl_vars['v']['avail'] == 'Y'): ?>
            <?php echo $this->_tpl_vars['v']['title']; ?>
: <?php echo $this->_tpl_vars['v']['value']; ?>
<br />
          <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
      </div>
    </div>
  <?php endif; ?>

  <div class="button-row" align="center">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('additional_button_class' => "main-button edit-profile",'button_title' => $this->_tpl_vars['lng']['lbl_change'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </div>

</div>