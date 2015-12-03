<?php /* Smarty version 2.6.26, created on 2015-12-02 18:06:52
         compiled from customer/main/taxed_price.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'substitute', 'customer/main/taxed_price.tpl', 15, false),array('function', 'currency', 'customer/main/taxed_price.tpl', 20, false),)), $this); ?>
<?php if ($this->_tpl_vars['taxes']): ?>

  <?php $_from = $this->_tpl_vars['taxes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tax_name'] => $this->_tpl_vars['tax']):
?>

    <?php if ($this->_tpl_vars['tax']['tax_value'] > 0 && $this->_tpl_vars['tax']['display_including_tax'] == 'Y'): ?>

      <?php if ($this->_tpl_vars['display_info'] == ""): ?>
        <?php $this->assign('display_info', $this->_tpl_vars['tax']['display_info']); ?>
      <?php endif; ?>

      <?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_including_tax'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'tax', $this->_tpl_vars['tax']['tax_display_name']) : smarty_modifier_substitute($_tmp, 'tax', $this->_tpl_vars['tax']['tax_display_name'])); ?>


      <?php if ($this->_tpl_vars['display_info'] == 'V' || ( $this->_tpl_vars['display_info'] == 'A' && $this->_tpl_vars['tax']['rate_type'] == "$" )): ?>

        <?php if (! $this->_tpl_vars['is_subtax']): ?>
          <?php echo smarty_function_currency(array('value' => $this->_tpl_vars['tax']['tax_value'],'tag_id' => "tax_".($this->_tpl_vars['tax']['taxid'])), $this);?>

        <?php else: ?>
          <?php echo smarty_function_currency(array('value' => $this->_tpl_vars['tax']['tax_value']), $this);?>

        <?php endif; ?>

      <?php elseif ($this->_tpl_vars['display_info'] == 'R'): ?>

        <?php if ($this->_tpl_vars['tax']['rate_type'] == "$"): ?>
          <?php echo smarty_function_currency(array('value' => $this->_tpl_vars['tax']['rate_value']), $this);?>

        <?php else: ?>
          <?php echo $this->_tpl_vars['tax']['rate_value']; ?>
%
        <?php endif; ?>

      <?php elseif ($this->_tpl_vars['display_info'] == 'A'): ?>

        <?php if ($this->_tpl_vars['tax']['rate_type'] == "%"): ?>
          <?php echo $this->_tpl_vars['tax']['rate_value']; ?>
% (

          <?php if (! $this->_tpl_vars['is_subtax']): ?>
            <?php echo smarty_function_currency(array('value' => $this->_tpl_vars['tax']['tax_value'],'tag_id' => "tax_".($this->_tpl_vars['tax']['taxid'])), $this);?>

          <?php else: ?>
            <?php echo smarty_function_currency(array('value' => $this->_tpl_vars['tax']['tax_value']), $this);?>

          <?php endif; ?>
          )

        <?php endif; ?>

      <?php endif; ?>

      <br />

    <?php endif; ?>

  <?php endforeach; endif; unset($_from); ?>

<?php endif; ?>