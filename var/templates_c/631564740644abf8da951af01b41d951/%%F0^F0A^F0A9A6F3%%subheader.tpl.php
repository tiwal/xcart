<?php /* Smarty version 2.6.26, created on 2015-12-02 19:19:03
         compiled from main/subheader.tpl */ ?>
<?php if ($this->webmaster_mode) { ?><div id="common_files0main0subheader.tpl3" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?><?php if ($this->_tpl_vars['class'] == 'grey'): ?>
<table cellspacing="0" class="SubHeaderGrey">
<tr>
  <td class="SubHeaderGrey"><?php echo $this->_tpl_vars['title']; ?>
</td>
</tr>
<tr>
  <td class="SubHeaderGreyLine"><img src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/spacer.gif" class="Spc" alt="" /></td>
</tr>
</table>
<?php elseif ($this->_tpl_vars['class'] == 'red'): ?>
<table cellspacing="0" class="SubHeaderRed">
<tr>
  <td class="SubHeaderRed"><?php echo $this->_tpl_vars['title']; ?>
</td>
</tr>
<tr>
  <td class="SubHeaderRedLine"><img src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/spacer.gif" class="Spc" alt="" /><br /></td>
</tr>
</table>
<?php elseif ($this->_tpl_vars['class'] == 'black'): ?>
<table cellspacing="0" class="SubHeaderBlack">
<tr>
  <td class="SubHeaderBlack"><?php echo $this->_tpl_vars['title']; ?>
</td>
</tr>
<tr>
  <td class="SubHeaderBlackLine"><img src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/spacer.gif" class="Spc" alt="" /><br /></td>
</tr>
</table>
<?php else: ?>
<table cellspacing="0" class="SubHeader">
<tr>
  <td class="SubHeader"><?php echo $this->_tpl_vars['title']; ?>
</td>
</tr>
<tr>
  <td class="SubHeaderLine"><img src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/spacer.gif" class="Spc" alt="" /><br /></td>
</tr>
</table>
<?php endif; ?>
<?php if ($this->webmaster_mode) { ?></div><?php } ?>