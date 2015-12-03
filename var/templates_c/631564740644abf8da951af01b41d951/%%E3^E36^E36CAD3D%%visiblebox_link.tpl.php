<?php /* Smarty version 2.6.26, created on 2015-12-02 18:05:42
         compiled from main/visiblebox_link.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'main/visiblebox_link.tpl', 10, false),)), $this); ?>
<table cellpadding="1" cellspacing="5" width="100%">
  <tr>
    <td>
      <table cellpadding="2" cellspacing="2">
        <tr>
          <td <?php if ($this->_tpl_vars['no_use_class'] == 'Y'): ?><?php else: ?>class="ExpandSectionMark"<?php endif; ?> id="close<?php echo $this->_tpl_vars['mark']; ?>
" onclick="javascript: visibleBox('<?php echo $this->_tpl_vars['mark']; ?>
');"<?php if ($this->_tpl_vars['visible']): ?> style="display: none;"<?php endif; ?>><img src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/plus.gif" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_click_to_open'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
          <td <?php if ($this->_tpl_vars['no_use_class'] == 'Y'): ?><?php else: ?>class="ExpandSectionMark"<?php endif; ?> id="open<?php echo $this->_tpl_vars['mark']; ?>
" onclick="javascript: visibleBox('<?php echo $this->_tpl_vars['mark']; ?>
');"<?php if (! $this->_tpl_vars['visible']): ?> style="display: none;"<?php endif; ?>><img src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/minus.gif" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_click_to_close'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
          <td nowrap="nowrap" class="ExpandSectionText"><a href="javascript:void(0);" onclick="javascript: visibleBox('<?php echo $this->_tpl_vars['mark']; ?>
');"><b><?php echo $this->_tpl_vars['title']; ?>
</b></a></td>
        </tr>
      </table>
    </td>
  </tr>
</table>