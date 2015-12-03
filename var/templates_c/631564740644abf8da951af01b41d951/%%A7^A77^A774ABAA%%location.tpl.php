<?php /* Smarty version 2.6.26, created on 2015-12-02 18:33:47
         compiled from admin/main/location.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'amp', 'admin/main/location.tpl', 13, false),)), $this); ?>
<?php if ($this->_tpl_vars['category_location'] && $this->_tpl_vars['cat'] != ""): ?>
<div class="navigation-path">
<?php echo ''; ?><?php unset($this->_sections['position']);
$this->_sections['position']['name'] = 'position';
$this->_sections['position']['loop'] = is_array($_loop=$this->_tpl_vars['category_location']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['position']['show'] = true;
$this->_sections['position']['max'] = $this->_sections['position']['loop'];
$this->_sections['position']['step'] = 1;
$this->_sections['position']['start'] = $this->_sections['position']['step'] > 0 ? 0 : $this->_sections['position']['loop']-1;
if ($this->_sections['position']['show']) {
    $this->_sections['position']['total'] = $this->_sections['position']['loop'];
    if ($this->_sections['position']['total'] == 0)
        $this->_sections['position']['show'] = false;
} else
    $this->_sections['position']['total'] = 0;
if ($this->_sections['position']['show']):

            for ($this->_sections['position']['index'] = $this->_sections['position']['start'], $this->_sections['position']['iteration'] = 1;
                 $this->_sections['position']['iteration'] <= $this->_sections['position']['total'];
                 $this->_sections['position']['index'] += $this->_sections['position']['step'], $this->_sections['position']['iteration']++):
$this->_sections['position']['rownum'] = $this->_sections['position']['iteration'];
$this->_sections['position']['index_prev'] = $this->_sections['position']['index'] - $this->_sections['position']['step'];
$this->_sections['position']['index_next'] = $this->_sections['position']['index'] + $this->_sections['position']['step'];
$this->_sections['position']['first']      = ($this->_sections['position']['iteration'] == 1);
$this->_sections['position']['last']       = ($this->_sections['position']['iteration'] == $this->_sections['position']['total']);
?><?php echo ''; ?><?php if ($this->_tpl_vars['category_location'][$this->_sections['position']['index']]['1'] != ''): ?><?php echo ''; ?><?php if ($this->_sections['position']['last']): ?><?php echo '<span class="current">'; ?><?php else: ?><?php echo '<a href="'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['category_location'][$this->_sections['position']['index']]['1'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?><?php echo '">'; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php echo $this->_tpl_vars['category_location'][$this->_sections['position']['index']]['0']; ?><?php echo ''; ?><?php if ($this->_tpl_vars['category_location'][$this->_sections['position']['index']]['1'] != ''): ?><?php echo ''; ?><?php if ($this->_sections['position']['last']): ?><?php echo '</span>'; ?><?php else: ?><?php echo '</a>'; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_sections['position']['last'] != 'true'): ?><?php echo '&nbsp;/&nbsp;'; ?><?php endif; ?><?php echo ''; ?><?php endfor; endif; ?><?php echo '</div>'; ?>

<br /><br />
<?php endif; ?>