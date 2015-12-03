<?php /* Smarty version 2.6.26, created on 2015-12-02 19:10:03
         compiled from modules/One_Page_Checkout/opc_profile.tpl */ ?>

<div id="opc_profile">

  <h2><?php echo $this->_tpl_vars['lng']['lbl_name_and_address']; ?>
</h2>
  <script type="text/javascript">
  //<![CDATA[
  // Used to update global $need_shipping var to work isCheckoutReady():ajax.checkout.js function properly
  var need_shipping = <?php if ($this->_tpl_vars['need_shipping']): ?>true<?php else: ?>false<?php endif; ?>;
  //]]>
  </script>
  
  <?php if (( $this->_tpl_vars['userinfo'] != '' && ! $this->_tpl_vars['userinfo']['is_incomplete'] ) && ! $this->_tpl_vars['reg_error'] && ! $this->_tpl_vars['force_change_address']): ?>
    
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/One_Page_Checkout/profile/profile_details_html.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  
  <?php else: ?>
  
    <?php if ($this->_tpl_vars['reg_error']): ?>
      <p class="error-message"><?php echo $this->_tpl_vars['reg_error']['errdesc']; ?>
</p>
    <?php endif; ?>

    <form class="skip-auto-validation" action="cart.php?mode=checkout" method="post" name="registerform">
      <fieldset id="personal_details" class="registerform">

        <input type="hidden" name="usertype" value="C" />
        <input type="hidden" name="anonymous" value="<?php echo $this->_tpl_vars['anonymous']; ?>
" />
        <?php if ($this->_tpl_vars['config']['Security']['use_https_login'] == 'Y'): ?>
          <input type="hidden" name="<?php echo $this->_tpl_vars['XCARTSESSNAME']; ?>
" value="<?php echo $this->_tpl_vars['XCARTSESSID']; ?>
" />
        <?php endif; ?>
  
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/One_Page_Checkout/profile/address_info.tpl', 'smarty_include_vars' => array('type' => 'B','hide_header' => true,'first' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/One_Page_Checkout/profile/account_info.tpl', 'smarty_include_vars' => array('hide_header' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/One_Page_Checkout/profile/address_info.tpl', 'smarty_include_vars' => array('type' => 'S','hide_header' => true,'first' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/One_Page_Checkout/profile/personal_info.tpl', 'smarty_include_vars' => array('first' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/One_Page_Checkout/profile/additional_info.tpl', 'smarty_include_vars' => array('section' => 'A','first' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  
        
        <?php ob_start();
$_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_apply'],'additional_button_class' => "main-button update-profile",'type' => 'input')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
$this->assign('submit_button', ob_get_contents()); ob_end_clean();
 ?>
  
        <?php if ($this->_tpl_vars['active_modules']['Image_Verification'] && $this->_tpl_vars['show_antibot']['on_registration'] == 'Y' && $this->_tpl_vars['display_antibot']): ?>
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Image_Verification/spambot_arrest.tpl", 'smarty_include_vars' => array('mode' => 'simple','id' => $this->_tpl_vars['antibot_sections']['on_registration'],'antibot_err' => $this->_tpl_vars['reg_antibot_err'],'button_code' => $this->_tpl_vars['submit_button'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php else: ?>
        <div class="button-row" align="center">
            <?php echo $this->_tpl_vars['submit_button']; ?>

        </div>
        <?php endif; ?>
  
      </fieldset>
    </form>
    
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "check_registerform_fields_js.tpl", 'smarty_include_vars' => array('is_opc' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  
  <?php endif; ?>

</div>