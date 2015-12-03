<?php /* Smarty version 2.6.26, created on 2015-12-02 18:06:58
         compiled from modules/Product_Options/customer_options.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'wm_remove', 'modules/Product_Options/customer_options.tpl', 13, false),array('modifier', 'escape', 'modules/Product_Options/customer_options.tpl', 13, false),array('modifier', 'default', 'modules/Product_Options/customer_options.tpl', 28, false),array('function', 'currency', 'modules/Product_Options/customer_options.tpl', 59, false),)), $this); ?>
<?php if ($this->_tpl_vars['product_options'] != '' || $this->_tpl_vars['product_wholesale'] != ''): ?>

  <?php if ($this->_tpl_vars['nojs'] != 'Y'): ?>
    <tr style="display: none;">
      <td colspan="3">

<script type="text/javascript">
//<![CDATA[
var alert_msg = '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['alert_msg'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
';
//]]>
</script>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Product_Options/check_options.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </td>
    </tr>
  <?php endif; ?>

  <?php $_from = $this->_tpl_vars['product_options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
    <?php if ($this->_tpl_vars['v']['options'] != '' || $this->_tpl_vars['v']['is_modifier'] == 'T' || $this->_tpl_vars['v']['is_modifier'] == 'A'): ?>
      <tr>
        <td class="property-name product-input">
          <?php if ($this->_tpl_vars['usertype'] == 'A'): ?>
            <?php echo $this->_tpl_vars['v']['class']; ?>

          <?php else: ?>
            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['v']['classtext'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['v']['class']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['v']['class'])); ?>

          <?php endif; ?>
        </td>
        <td class="property-value" colspan="2">

          <?php if ($this->_tpl_vars['cname'] != ""): ?>
            <?php $this->assign('poname', ($this->_tpl_vars['cname'])."[".($this->_tpl_vars['v']['classid'])."]"); ?>
          <?php else: ?>
            <?php $this->assign('poname', "product_options[".($this->_tpl_vars['v']['classid'])."]"); ?>
          <?php endif; ?>

          <?php if ($this->_tpl_vars['v']['is_modifier'] == 'T'): ?>

            <input id="po<?php echo $this->_tpl_vars['v']['classid']; ?>
" type="text" name="<?php echo $this->_tpl_vars['poname']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['v']['default'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />

          <?php elseif ($this->_tpl_vars['v']['is_modifier'] == 'A'): ?>

            <textarea id="po<?php echo $this->_tpl_vars['v']['classid']; ?>
" name="<?php echo $this->_tpl_vars['poname']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['v']['default'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>

          <?php else: ?>

            <select id="po<?php echo $this->_tpl_vars['v']['classid']; ?>
" name="<?php echo $this->_tpl_vars['poname']; ?>
"<?php if ($this->_tpl_vars['disable']): ?> disabled="disabled"<?php endif; ?><?php if ($this->_tpl_vars['nojs'] != 'Y'): ?> onchange="javascript: check_options();"<?php endif; ?>>

              <?php $_from = $this->_tpl_vars['v']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['o']):
?>

                <option value="<?php echo $this->_tpl_vars['o']['optionid']; ?>
"<?php if ($this->_tpl_vars['o']['selected'] == 'Y'): ?> selected="selected"<?php endif; ?>>
                <?php echo ''; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['o']['option_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?><?php echo ''; ?><?php if ($this->_tpl_vars['v']['is_modifier'] == 'Y' && $this->_tpl_vars['o']['price_modifier'] != 0): ?><?php echo '&nbsp;('; ?><?php if ($this->_tpl_vars['o']['modifier_type'] != '%'): ?><?php echo ''; ?><?php echo smarty_function_currency(array('value' => $this->_tpl_vars['o']['price_modifier'],'display_sign' => 1,'plain_text_message' => 1), $this);?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php echo $this->_tpl_vars['o']['price_modifier']; ?><?php echo '%'; ?><?php endif; ?><?php echo ')'; ?><?php endif; ?><?php echo ''; ?>

                </option>

              <?php endforeach; endif; unset($_from); ?>
            </select>
          <?php endif; ?>

        </td>
      </tr>
    <?php endif; ?>

  <?php endforeach; endif; unset($_from); ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['product_options_ex'] != ""): ?>

  <tr>
      <td class="warning-message" colspan="3" id="exception_msg" style="display: none;"></td>
  </tr>

  <?php if ($this->_tpl_vars['err'] != ''): ?>

    <tr>
      <td colspan="3" class="customer-message"><?php echo $this->_tpl_vars['lng']['txt_product_options_combinations_warn']; ?>
:</td>
    </tr>

    <?php $_from = $this->_tpl_vars['product_options_ex']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
      <tr>
        <td colspan="3" class="poptions-exceptions-list">

          <?php $_from = $this->_tpl_vars['v']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['o']):
?>

            <?php echo '<div>'; ?><?php if ($this->_tpl_vars['usertype'] == 'A'): ?><?php echo ''; ?><?php echo $this->_tpl_vars['o']['class']; ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['o']['classtext'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?><?php echo ''; ?><?php endif; ?><?php echo ': '; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['o']['option_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?><?php echo '</div>'; ?>


          <?php endforeach; endif; unset($_from); ?>

        </td>
      </tr>
    <?php endforeach; endif; unset($_from); ?>

  <?php endif; ?>

<?php endif; ?>