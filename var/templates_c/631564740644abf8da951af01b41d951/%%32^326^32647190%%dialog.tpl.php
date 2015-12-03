<?php /* Smarty version 2.6.26, created on 2015-12-02 19:15:33
         compiled from customer/dialog.tpl */ ?>
<?php if ($this->webmaster_mode) { ?><div id="ideal_comfort0customer0dialog.tpl" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?><div class="dialog<?php if ($this->_tpl_vars['additional_class']): ?> <?php echo $this->_tpl_vars['additional_class']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['noborder']): ?> noborder<?php endif; ?><?php if ($this->_tpl_vars['sort'] && $this->_tpl_vars['printable'] != 'Y'): ?> list-dialog<?php endif; ?>">
  <?php if (! $this->_tpl_vars['noborder']): ?>
    <div class="title">
      <h2><?php echo $this->_tpl_vars['title']; ?>
</h2>
      <?php if ($this->_tpl_vars['sort'] && $this->_tpl_vars['printable'] != 'Y'): ?>
        <div class="sort-box">
          <?php if ($this->_tpl_vars['selected'] == '' && $this->_tpl_vars['direction'] == ''): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/search_sort_by.tpl", 'smarty_include_vars' => array('selected' => $this->_tpl_vars['search_prefilled']['sort_field'],'direction' => $this->_tpl_vars['search_prefilled']['sort_direction'],'url' => $this->_tpl_vars['products_sort_url'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          <?php else: ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/search_sort_by.tpl", 'smarty_include_vars' => array('url' => $this->_tpl_vars['products_sort_url'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          <?php endif; ?>
        </div>
      <?php endif; ?>
	  <div class="t-l"></div><div class="t-r"></div>
	  <div class="b-l"></div><div class="b-r"></div>
    </div>
  <?php endif; ?>
  <div class="content"><?php echo $this->_tpl_vars['content']; ?>
</div>
</div><?php if ($this->webmaster_mode) { ?></div><?php } ?>