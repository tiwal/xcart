<?php /* Smarty version 2.6.26, created on 2015-12-02 19:15:33
         compiled from customer/menu_dialog.tpl */ ?>
<?php if ($this->webmaster_mode) { ?><div id="ideal_comfort0customer0menu_dialog.tpl5" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?><div class="menu-dialog<?php if ($this->_tpl_vars['additional_class']): ?> <?php echo $this->_tpl_vars['additional_class']; ?>
<?php endif; ?>">
  <div class="title-bar <?php if ($this->_tpl_vars['link_href']): ?> link-title<?php endif; ?>">
    <?php echo ''; ?><?php if ($this->_tpl_vars['link_href']): ?><?php echo '<span class="title-link"><a href="'; ?><?php echo $this->_tpl_vars['link_href']; ?><?php echo '" class="title-link"><img src="'; ?><?php echo $this->_tpl_vars['ImagesDir']; ?><?php echo '/spacer.gif" alt=""  /></a></span>'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['minicart']): ?><?php echo '<img class="icon ajax-minicart-icon" src="'; ?><?php echo $this->_tpl_vars['ImagesDir']; ?><?php echo '/spacer.gif" alt="" />'; ?><?php else: ?><?php echo '<h2>'; ?><?php echo $this->_tpl_vars['title']; ?><?php echo '</h2>'; ?><?php endif; ?><?php echo ''; ?>

  </div>
  <div class="content">
    <?php echo $this->_tpl_vars['content']; ?>

  </div>
  <?php if ($this->_tpl_vars['minicart']): ?>
	<div class="clearing"></div>
	<div class="t-l"></div><div class="t-r"></div>
	<div class="b-l"></div><div class="b-r"></div>
  <?php endif; ?>
</div><?php if ($this->webmaster_mode) { ?></div><?php } ?>