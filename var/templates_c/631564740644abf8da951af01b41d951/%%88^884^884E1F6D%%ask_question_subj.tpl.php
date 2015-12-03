<?php /* Smarty version 2.6.26, created on 2015-12-02 18:07:29
         compiled from mail/ask_question_subj.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'mail/ask_question_subj.tpl', 5, false),)), $this); ?>
<?php echo smarty_function_config_load(array('file' => ($this->_tpl_vars['skin_config'])), $this);?>
<?php echo $this->_tpl_vars['config']['Company']['company_name']; ?>
: <?php echo $this->_tpl_vars['lng']['eml_someone_ask_question_subj']; ?>
