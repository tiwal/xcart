<?php /* Smarty version 2.6.26, created on 2015-12-02 18:22:21
         compiled from customer/main/per_page.tpl */ ?>
<?php echo '<span class="per-page-selector"><select onchange="javascript:window.location=\''; ?><?php echo $this->_tpl_vars['current_location']; ?><?php echo '/'; ?><?php echo $this->_tpl_vars['navigation_script']; ?><?php echo '&amp;objects_per_page=\' + this.value;"><option value="" selected="selected"></option>'; ?><?php $_from = $this->_tpl_vars['per_page_values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?><?php echo '<option value="'; ?><?php echo $this->_tpl_vars['value']; ?><?php echo '"'; ?><?php if ($this->_tpl_vars['value'] == $this->_tpl_vars['objects_per_page']): ?><?php echo ' selected="selected"'; ?><?php endif; ?><?php echo '>'; ?><?php echo $this->_tpl_vars['value']; ?><?php echo '</option>'; ?><?php endforeach; endif; unset($_from); ?><?php echo '</select>&nbsp;'; ?><?php echo $this->_tpl_vars['lng']['lbl_per_page']; ?><?php echo '</span>'; ?>
