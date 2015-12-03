<?php /* Smarty version 2.6.26, created on 2015-12-02 19:15:33
         compiled from customer/tabs.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'interline', 'customer/tabs.tpl', 11, false),array('modifier', 'amp', 'customer/tabs.tpl', 12, false),)), $this); ?>
<?php if ($this->webmaster_mode) { ?><div id="ideal_comfort0customer0tabs.tpl" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?><?php if ($this->_tpl_vars['speed_bar']): ?>
  <div class="tabs<?php if ($this->_tpl_vars['all_languages_cnt'] > 1): ?> with_languages<?php endif; ?>">
    <ul>

      <?php $_from = $this->_tpl_vars['speed_bar']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tabs'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tabs']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sb']):
        $this->_foreach['tabs']['iteration']++;
?>
         <?php echo '<li'; ?><?php echo smarty_function_interline(array('name' => 'tabs'), $this);?><?php echo '><a href="'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['sb']['link'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?><?php echo '">'; ?><?php if ($_COOKIE['store_language'] == 'zh'): ?><?php echo ''; ?><?php if ($this->_tpl_vars['sb']['title'] == 'Home'): ?><?php echo '主页'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['sb']['title'] == 'Shopping Cart'): ?><?php echo '购物车'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['sb']['title'] == 'Contact Us'): ?><?php echo '联系我们'; ?><?php endif; ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php echo $this->_tpl_vars['sb']['title']; ?><?php echo ''; ?><?php endif; ?><?php echo '<img src="'; ?><?php echo $this->_tpl_vars['ImagesDir']; ?><?php echo '/spacer.gif" alt="" /></a><div class="t-l"></div><div class="t-r"></div></li>'; ?>

      <?php endforeach; endif; unset($_from); ?>

    </ul>
  </div>
<?php endif; ?><?php if ($this->webmaster_mode) { ?></div><?php } ?>