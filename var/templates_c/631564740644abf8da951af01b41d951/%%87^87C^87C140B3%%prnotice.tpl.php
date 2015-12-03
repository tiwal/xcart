<?php /* Smarty version 2.6.26, created on 2015-12-02 19:19:03
         compiled from main/prnotice.tpl */ ?>
<?php if ($this->webmaster_mode) { ?><div id="common_files0main0prnotice.tpl" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?><?php if ($this->_tpl_vars['main'] == 'catalog' && $this->_tpl_vars['current_category']['category'] == ""): ?>
  Powered by X-Cart <?php echo $this->_tpl_vars['sm_prnotice_txt']; ?>

<?php else: ?>
  Powered by X-Cart <?php echo $this->_tpl_vars['sm_prnotice_txt']; ?>

<?php endif; ?><?php if ($this->webmaster_mode) { ?></div><?php } ?>