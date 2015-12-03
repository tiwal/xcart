<?php /* Smarty version 2.6.26, created on 2015-12-02 18:07:05
         compiled from customer/main/ask_question.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'customer/main/ask_question.tpl', 9, false),array('modifier', 'default', 'customer/main/ask_question.tpl', 17, false),)), $this); ?>
<h1><?php echo $this->_tpl_vars['lng']['lbl_ask_question_about_product']; ?>
</h1>

<form action="<?php echo $this->_tpl_vars['xcart_web_dir']; ?>
/popup_ask.php" method="post" name="askform">
  <input type="hidden" name="mode" value="send_email" />
  <input type="hidden" name="productid" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['productid'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />

  <table cellspacing="1" cellpadding="3" class="product-ask-form">

    <tr>
      <td class="data-name"><label for="uname"><?php echo $this->_tpl_vars['lng']['lbl_name']; ?>
</label></td>
      <td class="data-required">*</td>
      <td>
        <input type="text" name="uname" id="uname" value="<?php if ($this->_tpl_vars['login'] != ''): ?><?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['fullname'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['login']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['login'])))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>" size="30" />
      </td>
    </tr>

    <tr>
      <td class="data-name"><label for="email"><?php echo $this->_tpl_vars['lng']['lbl_email']; ?>
</label></td>
      <td class="data-required">*</td>
      <td>
        <input type="text" class="input-email" name="email" id="email" value="<?php if ($this->_tpl_vars['config']['email_as_login'] == 'Y' && $this->_tpl_vars['login'] != ''): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['login'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>" size="30" />
      </td>
    </tr>

    <tr>
      <td class="data-name"><label for="phone"><?php echo $this->_tpl_vars['lng']['lbl_phone']; ?>
</label></td>
      <td>&nbsp;</td>
      <td>
        <input type="text" name="phone" id="phone" value="" size="30" />
      </td>
    </tr>

    <tr>
      <td colspan="3">
        <div class="field-container">
          <div class="data-name">
            <label for="question" class="data-required"><?php echo $this->_tpl_vars['lng']['lbl_your_question']; ?>
</label>
            <span class="star">*</span>
          </div>

          <div class="data-value">
            <textarea name="question" id="question" rows="8" cols="50"></textarea>
          </div>
        </div>
      </td>
    </tr>

    <?php ob_start();
$_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/submit.tpl", 'smarty_include_vars' => array('type' => 'input')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
$this->assign('submit_button', ob_get_contents()); ob_end_clean();
 ?>

    <?php if ($this->_tpl_vars['active_modules']['Image_Verification'] && $this->_tpl_vars['show_antibot']['on_ask_form'] == 'Y'): ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Image_Verification/spambot_arrest.tpl", 'smarty_include_vars' => array('mode' => "data-table",'id' => $this->_tpl_vars['antibot_sections']['on_ask_form'],'button_code' => $this->_tpl_vars['submit_button'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php else: ?>
    <tr>
      <td align="center" colspan="3">
        <?php echo $this->_tpl_vars['submit_button']; ?>

      </td>
    </tr>
    <?php endif; ?>

  </table>

</form>