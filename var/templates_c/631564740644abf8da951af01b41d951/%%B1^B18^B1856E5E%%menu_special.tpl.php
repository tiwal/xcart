<?php /* Smarty version 2.6.26, created on 2015-12-02 19:15:33
         compiled from modules/Survey/menu_special.tpl */ ?>
<?php func_load_lang($this, "modules/Survey/menu_special.tpl","lbl_survey_surveys"); ?><?php if ($this->_tpl_vars['surveys_is_avail']): ?>
  <li>
    <a href="<?php echo $this->_tpl_vars['catalogs']['customer']; ?>
/survey.php"><?php echo $this->_tpl_vars['lng']['lbl_survey_surveys']; ?>
</a>
  </li>
<?php endif; ?>