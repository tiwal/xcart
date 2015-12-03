<?php /* Smarty version 2.6.26, created on 2015-12-02 18:06:58
         compiled from modules/Feature_Comparison/product.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'modules/Feature_Comparison/product.tpl', 38, false),)), $this); ?>
<?php $_from = $this->_tpl_vars['product']['features']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
  <tr>
    <td class="property-name" nowrap="nowrap">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Feature_Comparison/option_hint.tpl", 'smarty_include_vars' => array('opt' => $this->_tpl_vars['v'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </td>
    <td class="property-value" valign="top" colspan="2">

      <?php if ($this->_tpl_vars['v']['option_type'] == 'S'): ?>

        <?php echo $this->_tpl_vars['v']['variants'][$this->_tpl_vars['v']['value']]['variant_name']; ?>


      <?php elseif ($this->_tpl_vars['v']['option_type'] == 'M'): ?>

        <?php $_from = $this->_tpl_vars['v']['variants']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['o']):
?>
          <?php if ($this->_tpl_vars['o']['selected'] != ''): ?>
            <?php echo $this->_tpl_vars['o']['variant_name']; ?>
<br />
          <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>

      <?php elseif ($this->_tpl_vars['v']['option_type'] == 'B'): ?>

        <?php if ($this->_tpl_vars['v']['value'] == 'Y'): ?>
          <?php echo $this->_tpl_vars['lng']['lbl_yes']; ?>

        <?php else: ?>
          <?php echo $this->_tpl_vars['lng']['lbl_no']; ?>

        <?php endif; ?>

      <?php elseif (( $this->_tpl_vars['v']['option_type'] == 'N' || $this->_tpl_vars['v']['option_type'] == 'D' ) && $this->_tpl_vars['v']['value'] != ''): ?>

        <?php echo $this->_tpl_vars['v']['formated_value']; ?>


      <?php else: ?>

        <?php echo ((is_array($_tmp=$this->_tpl_vars['v']['value'])) ? $this->_run_mod_handler('replace', true, $_tmp, "\n", "<br />") : smarty_modifier_replace($_tmp, "\n", "<br />")); ?>


      <?php endif; ?>

    </td>
  </tr>
<?php endforeach; endif; unset($_from); ?>