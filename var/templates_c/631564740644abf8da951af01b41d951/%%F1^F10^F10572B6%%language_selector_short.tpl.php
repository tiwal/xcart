<?php /* Smarty version 2.6.26, created on 2015-12-02 18:05:18
         compiled from main/language_selector_short.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'amp', 'main/language_selector_short.tpl', 6, false),array('modifier', 'escape', 'main/language_selector_short.tpl', 12, false),)), $this); ?>
<?php if ($this->_tpl_vars['all_languages_cnt'] > 1): ?>
  <select<?php if ($this->_tpl_vars['selector_disabled']): ?> disabled="disabled"<?php else: ?> id="edit_lng" name="edit_lng" onchange="javascript: self.location='<?php echo ((is_array($_tmp=$this->_tpl_vars['script'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
edit_lng='+this.value+'&amp;old_lng=<?php echo $this->_tpl_vars['shop_language']; ?>
<?php if ($this->_tpl_vars['anchor'] != ''): ?>#<?php echo $this->_tpl_vars['anchor']; ?>
<?php endif; ?>';"<?php endif; ?>>
    <?php if ($this->_tpl_vars['shop_language'] == $this->_tpl_vars['config']['default_admin_language'] && $this->_tpl_vars['is_no_default'] == 'Y'): ?>
      <option value=""><?php echo $this->_tpl_vars['lng']['lbl_please_select_language']; ?>
</option>
    <?php endif; ?>
    <?php $_from = $this->_tpl_vars['all_languages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
      <?php if (( $this->_tpl_vars['v']['code'] != $this->_tpl_vars['config']['default_admin_language'] || $this->_tpl_vars['is_no_default'] != 'Y' ) && $this->_tpl_vars['v']['language'] != ''): ?>
        <option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['v']['code'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['v']['code'] == $this->_tpl_vars['shop_language']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['v']['language']; ?>
</option>
      <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
  </select>
<?php endif; ?>