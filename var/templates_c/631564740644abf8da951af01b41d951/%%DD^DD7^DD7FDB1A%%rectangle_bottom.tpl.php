<?php /* Smarty version 2.6.26, created on 2015-12-02 19:19:03
         compiled from rectangle_bottom.tpl */ ?>
<?php if ($this->webmaster_mode) { ?><div id="common_files0rectangle_bottom.tpl" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?></td>
</tr>

<tr>
  <td class="BottomRow">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "bottom.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </td>
</tr>

</table>
<?php if ($this->_tpl_vars['config']['UA']['browser'] == 'MSIE' && ( $this->_tpl_vars['config']['UA']['version'] == "6.0" || $this->_tpl_vars['config']['UA']['version'] == "7.0" )): ?>
<script type="text/javascript">
//<![CDATA[
<?php echo '
$("#horizontal-menu li").hover(
  function () {
    $(this).find("div").toggleClass(\'horizontal-menu-li-hover-div\');
  }
);
$("#horizontal-menu").css(\'top\', \'49px\');
'; ?>

//]]>
</script>
<?php endif; ?><?php if ($this->webmaster_mode) { ?></div><?php } ?>