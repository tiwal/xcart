<?php /* Smarty version 2.6.26, created on 2015-12-02 19:10:03
         compiled from modules/One_Page_Checkout/opc_authbox.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'substitute', 'modules/One_Page_Checkout/opc_authbox.tpl', 8, false),array('modifier', 'escape', 'modules/One_Page_Checkout/opc_authbox.tpl', 9, false),array('modifier', 'lower', 'modules/One_Page_Checkout/opc_authbox.tpl', 15, false),)), $this); ?>
<div class="opc-authbox" id="opc_authbox">
  <?php if ($this->_tpl_vars['login'] != ''): ?>

    <?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['txt_opc_greeting'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'name', $this->_tpl_vars['fullname']) : smarty_modifier_substitute($_tmp, 'name', $this->_tpl_vars['fullname'])); ?>
&nbsp;
    <a href="register.php?mode=update" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_view_profile'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo $this->_tpl_vars['lng']['lbl_view_profile']; ?>
</a>&nbsp;
    <a href="login.php?mode=logout" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_sign_out'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo $this->_tpl_vars['lng']['lbl_sign_out']; ?>
</a>

  <?php else: ?>

    <?php ob_start(); ?>
      <a title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_sign_in'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" href="login.php" onclick="javascript: popupOpen('login.php'); return false;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_sign_in'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
    <?php $this->_smarty_vars['capture']['loginbn'] = ob_get_contents(); ob_end_clean(); ?>
    <?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['txt_opc_sign_in'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'sign_in_link', $this->_smarty_vars['capture']['loginbn']) : smarty_modifier_substitute($_tmp, 'sign_in_link', $this->_smarty_vars['capture']['loginbn'])); ?>


  <?php endif; ?>
</div>