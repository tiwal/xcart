<?php /* Smarty version 2.6.26, created on 2015-12-02 19:10:03
         compiled from modules/Gift_Registry/product_event_cart_contents.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'substitute', 'modules/Gift_Registry/product_event_cart_contents.tpl', 8, false),)), $this); ?>
<?php if ($this->_tpl_vars['product']['event_data'] != ""): ?>
<?php $this->assign('creator', ($this->_tpl_vars['product']['event_data']['creator_title'])." ".($this->_tpl_vars['product']['event_data']['firstname'])." ".($this->_tpl_vars['product']['event_data']['lastname'])); ?>
<div class="event-info">
  <?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_giftreg_present_for'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'event_name', $this->_tpl_vars['product']['event_data']['title'], 'eventid', $this->_tpl_vars['product']['event_data']['event_id'], 'creator', $this->_tpl_vars['creator']) : smarty_modifier_substitute($_tmp, 'event_name', $this->_tpl_vars['product']['event_data']['title'], 'eventid', $this->_tpl_vars['product']['event_data']['event_id'], 'creator', $this->_tpl_vars['creator'])); ?>

</div>
<?php endif; ?>