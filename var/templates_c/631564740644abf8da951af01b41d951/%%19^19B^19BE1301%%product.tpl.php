<?php /* Smarty version 2.6.26, created on 2015-12-02 18:06:58
         compiled from modules/Extra_Fields/product.tpl */ ?>
<?php $_from = $this->_tpl_vars['extra_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
  <?php if ($this->_tpl_vars['v']['active'] == 'Y' && $this->_tpl_vars['v']['field_value']): ?>
    <tr>
      <td class="property-name"><?php echo $this->_tpl_vars['v']['field']; ?>
</td>
      <td class="property-value" colspan="2"><?php echo $this->_tpl_vars['v']['field_value']; ?>
</td>
    </tr>
  <?php endif; ?>
<?php endforeach; endif; unset($_from); ?>