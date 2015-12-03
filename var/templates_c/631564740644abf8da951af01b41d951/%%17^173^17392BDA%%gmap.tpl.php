<?php /* Smarty version 2.6.26, created on 2015-12-02 18:51:08
         compiled from gmap.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'gmap.tpl', 15, false),)), $this); ?>
<?php if ($this->webmaster_mode) { ?><div id="common_files0gmap.tpl1" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?><?php func_load_lang($this, "gmap.tpl","lbl_shipping_address,lbl_billing_address,lbl_phone,lbl_gmap_show"); ?><?php ob_start(); ?>
<strong><?php echo $this->_tpl_vars['description']['name']; ?>
</strong><br />
(<?php if ($this->_tpl_vars['description']['type'] == 'shipping'): ?>
<?php echo $this->_tpl_vars['lng']['lbl_shipping_address']; ?>

<?php else: ?>
<?php echo $this->_tpl_vars['lng']['lbl_billing_address']; ?>

<?php endif; ?>)<br />
<?php echo $this->_tpl_vars['description']['address']; ?>
<br />
<?php echo $this->_tpl_vars['lng']['lbl_phone']; ?>
: <?php echo $this->_tpl_vars['description']['phone']; ?>

<?php $this->_smarty_vars['capture']['gmap'] = ob_get_contents(); ob_end_clean(); ?>
<a href="javascript:void(0);" onclick="javascript:GMap.showModal('<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['address'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlcompat') : smarty_modifier_escape($_tmp, 'htmlcompat')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
','<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_smarty_vars['capture']['gmap'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlcompat') : smarty_modifier_escape($_tmp, 'htmlcompat')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
');" class="gmarker<?php if ($this->_tpl_vars['show_on_map'] == '1'): ?> gmarker-show-on<?php endif; ?>"><?php if ($this->_tpl_vars['show_on_map'] == '1'): ?><?php echo $this->_tpl_vars['lng']['lbl_gmap_show']; ?>
<?php endif; ?></a><?php if ($this->webmaster_mode) { ?></div><?php } ?>