<?php /* Smarty version 2.6.26, created on 2015-12-02 18:52:54
         compiled from provider/main/profile_menu.tpl */ ?>

<?php if ($this->_tpl_vars['main'] == 'user_profile' || ( $this->_tpl_vars['main'] == 'register' && $this->_tpl_vars['login'] != '' )): ?>

<?php if ($this->_tpl_vars['main'] == 'user_profile'): ?>
<?php $this->assign('query_str', "?user=".($_GET['user'])."&amp;usertype=P"); ?>
<?php else: ?>
<?php $this->assign('query_str', "?mode=update"); ?>
<?php endif; ?>

<?php if (! $this->_tpl_vars['single_mode']): ?>
<table cellpadding="5" cellspacing="0" width="100%">
<tr>
  <td width="100%">&nbsp;</td>
  <td nowrap="nowrap"><?php if ($_GET['submode'] != 'seller_address'): ?><span class="simple-button"><?php echo $this->_tpl_vars['lng']['lbl_profile_details']; ?>
</span><?php else: ?><a href="<?php echo $this->_tpl_vars['register_script_name']; ?>
<?php echo $this->_tpl_vars['query_str']; ?>
" class="simple-button"><?php echo $this->_tpl_vars['lng']['lbl_profile_details']; ?>
</a><?php endif; ?></td>
  <td nowrap="nowrap"><?php if ($_GET['submode'] != 'seller_address'): ?><a href="<?php echo $this->_tpl_vars['register_script_name']; ?>
<?php echo $this->_tpl_vars['query_str']; ?>
&amp;submode=seller_address" class="simple-button"><?php echo $this->_tpl_vars['lng']['lbl_seller_address']; ?>
</a><?php else: ?><span class="simple-button"><?php echo $this->_tpl_vars['lng']['lbl_seller_address']; ?>
</span><?php endif; ?></td>
</tr>
</table>
<?php endif; ?>
<?php endif; ?>