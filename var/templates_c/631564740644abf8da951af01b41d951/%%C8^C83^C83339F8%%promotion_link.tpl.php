<?php /* Smarty version 2.6.26, created on 2015-12-02 19:16:22
         compiled from main/promotion_link.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'main/promotion_link.tpl', 7, false),array('modifier', 'amp', 'main/promotion_link.tpl', 7, false),)), $this); ?>
<?php if ($this->webmaster_mode) { ?><div id="common_files0main0promotion_link.tpl9" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?><div class="promotion-cell">
  <div class="promotion-link">
  	<a title="<?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['href'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
"><?php echo $this->_tpl_vars['title']; ?>
</a>
  </div>
  <?php if ($this->_tpl_vars['promo_note'] != ""): ?>
    <div class="promo-note">
      <?php echo $this->_tpl_vars['promo_note']; ?>

    </div>
  <?php endif; ?>
</div><?php if ($this->webmaster_mode) { ?></div><?php } ?>