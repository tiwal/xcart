<?php /* Smarty version 2.6.26, created on 2015-12-02 18:05:18
         compiled from main/language_selector.tpl */ ?>
<?php if ($this->_tpl_vars['all_languages_cnt'] > 1): ?>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
    <td colspan="3" align="right">
    <table cellspacing="1" cellpadding="2" border="0">
    <tr>
        <td><?php echo $this->_tpl_vars['lng']['lbl_language']; ?>
:</td>
        <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/language_selector_short.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
    </tr>
    </table>
    </td>
</tr>
</table>
<?php endif; ?>