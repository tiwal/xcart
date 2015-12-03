<?php /* Smarty version 2.6.26, created on 2015-12-02 19:19:03
         compiled from file:debug_templates.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'assign_debug_info', 'file:debug_templates.tpl', 5, false),array('modifier', 'escape', 'file:debug_templates.tpl', 9, false),array('modifier', 'strip_tags', 'file:debug_templates.tpl', 10, false),array('modifier', 'wm_remove', 'file:debug_templates.tpl', 10, false),array('modifier', 'default', 'file:debug_templates.tpl', 18, false),array('modifier', 'replace', 'file:debug_templates.tpl', 68, false),array('modifier', 'string_format', 'file:debug_templates.tpl', 73, false),array('modifier', 'debug_print_var', 'file:debug_templates.tpl', 91, false),)), $this); ?>
<?php func_load_lang($this, "file:debug_templates.tpl","lbl_xcart_debugging_console,lbl_included_templates_config_files,txt_assigned_template_variables,txt_no_template_variables_assigned,txt_assigned_config_file_variables,txt_no_config_vars_assigned,lbl_execution_time"); ?><?php echo smarty_function_assign_debug_info(array(), $this);?>


<script type="text/javascript">
//<![CDATA[
var local_opener_name = "<?php echo ((is_array($_tmp=$this->_tpl_vars['opener'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";
var local_lbl_xcart_debugging_console = "<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_xcart_debugging_console'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";
var local_lbl_included_templates_config_files = "<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_included_templates_config_files'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";
var local_txt_assigned_template_variables = "<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['txt_assigned_template_variables'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";
var local_txt_no_template_variables_assigned = "<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['txt_no_template_variables_assigned'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";
var local_txt_assigned_config_file_variables = "<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['txt_assigned_config_file_variables'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";
var local_txt_no_config_vars_assigned = "<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['txt_no_config_vars_assigned'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";
var local_images_dir = "<?php echo ((is_array($_tmp=$this->_tpl_vars['ImagesDir'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";
var display_templater_vars_in_popup = <?php if ($this->_tpl_vars['config']['Appearance']['display_templater_vars_in_popup'] == 'Y'): ?>true<?php else: ?>false<?php endif; ?>;
var default_charset = "<?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['default_charset'])) ? $this->_run_mod_handler('default', true, $_tmp, 'utf-8') : smarty_modifier_default($_tmp, 'utf-8')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";
var shop_language = "<?php echo ((is_array($_tmp=$this->_tpl_vars['shop_language'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";

<?php echo '
if (window.opener == null || local_opener_name != "console") {

  _smarty_console = window.open("", "console", "width=430,height=500,resizable,scrollbars=yes");

  var btn_switch = \'\';
  if (display_templater_vars_in_popup) {
    btn_switch = \'<input onclick="document.getElementById(\\\'templates\\\').style.display=\\\'\\\'; document.getElementById(\\\'vars\\\').style.display=\\\'none\\\'; this.disabled=true; document.getElementById(\\\'var_button\\\').disabled=false;" type="button" id="tpl_button" disabled="disabled" value="Show templates">&nbsp;<input onclick="document.getElementById(\\\'vars\\\').style.display=\\\'\\\'; document.getElementById(\\\'templates\\\').style.display=\\\'none\\\'; this.disabled=true; document.getElementById(\\\'tpl_button\\\').disabled=false;" type="button" value="Show variables" id="var_button"> <br /> <br />\';
  }

  try {
    if (_smarty_console) {
      _smarty_console.document.open();
      _smarty_console.document.write(
        \'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\'
        + \'<html xmlns="http://www.w3.org/1999/xhtml">\'
        + \'<head><title>\' + local_lbl_xcart_debugging_console + \'<\'+\'/title>\'
        + \'<meta http-equiv="Content-Type" content="text/html; charset=\' + default_charset + \'" />\'
        + \'<meta http-equiv="Content-Script-Type" content="text/javascript" />\'
        + \'<meta http-equiv="Content-Style-Type" content="text/css" />\'
        + \'<meta http-equiv="Content-Language" content="\' + shop_language + \'" />\'
        + \'<meta name="ROBOTS" content="NOINDEX,NOFOLLOW" />\'
        + \'<style type="text/css">\' + "\\n"
        + \' html, body { font-size: 12px; padding: 0px; margin: 5px; } \' + "\\n"
        + \' ul { padding: 0px 0px 0px 20px; margin: 0px 0px 10px 0px; } \' + "\\n"
        + \' li { list-style-image: url(\' + local_images_dir + \'/rarrow.gif); white-space: nowrap; color: black; } \' + "\\n"
        + \' li a:link, li a:visited, li a:hover, li a:active { color: brown; text-decoration: none; font-size: 1em; } \' + "\\n"
        + \' li.ft-template { color: brown; } \' + "\\n"
        + \' li.empty { background: #eeeeee none; } \' + "\\n"
        + \' table.vars { font-size: 1em; margin-bottom: 10px; } \' + "\\n"
        + \' table.vars tr td { background: #fefefe none; white-space: nowrap; padding: 3px; font-size: 1em; font-family: monospace; } \' + "\\n"
        + \' table.vars tr.line td { background: #eeeeee none; } \' + "\\n"
        + \' table.vars tr td.name { color: blue; vertical-align: top; } \' + "\\n"
        + \' h1 { width: 400px; white-space: nowrap; background: #cccccc none; text-align: center; font-weight: bold; font-size: 1.3em; margin: 0px; padding: 0px; } \' + "\\n"
        + \' span.file { color: black; } \' + "\\n"
        + \' em.time { padding-left: 2em; font-size: 0.9em; color: black; } \' + "\\n"
        + \'<\'+\'/style>\'
        + \'<\'+\'/head><body>\'
        + btn_switch
        + \'<h1>\' + local_lbl_included_templates_config_files + \'<\'+\'/h1>\'
        + \'<ul id="templates">\'
      );
'; ?>

<?php $_from = $this->_tpl_vars['_debug_tpls']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['_debug_tpls'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['_debug_tpls']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['t']):
        $this->_foreach['_debug_tpls']['iteration']++;
?>
      _smarty_console.document.write(
        '<li style="margin-left: <?php echo $this->_tpl_vars['t']['depth']; ?>
em;" class="ft-<?php echo $this->_tpl_vars['t']['type']; ?>
">'
<?php if ($this->_tpl_vars['t']['type'] == 'template' && $this->_tpl_vars['webmaster_mode'] == 'editor'): ?>
        + '<a hr'+'ef="<?php echo $this->_tpl_vars['catalogs']['admin']; ?>
/file_edit.php?file=%2f<?php echo ((is_array($_tmp=$this->_tpl_vars['t']['filename'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&amp;opener=console" target="_blank" onmouseover="javascript: if (window.mainWnd && mainWnd.tmo) mainWnd.tmo(\'<?php echo ((is_array($_tmp=$this->_tpl_vars['t']['filename'])) ? $this->_run_mod_handler('replace', true, $_tmp, "/", '0') : smarty_modifier_replace($_tmp, "/", '0')); ?>
\', this);"><?php echo $this->_tpl_vars['t']['filename']; ?>
<'+'/a>'
<?php else: ?>
        + '<?php echo $this->_tpl_vars['t']['filename']; ?>
'
<?php endif; ?>
<?php if ($this->_tpl_vars['config']['Appearance']['display_compile_time_in_popup'] == 'Y'): ?>
         + '<em class="time" title="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_execution_time'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">(<?php echo ((is_array($_tmp=$this->_tpl_vars['t']['exec_time'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.5f") : smarty_modifier_string_format($_tmp, "%.5f")); ?>
)<?php if (($this->_foreach['_debug_tpls']['iteration'] <= 1)): ?> (total)<?php endif; ?><'+'/em>'
<?php endif; ?>
        + '<'+'/li>'
      );
<?php endforeach; else: ?>
      _smarty_console.document.write('<li class="empty"><em>no templates included<'+'/em<'+'/li>');  
<?php endif; unset($_from); ?>
<?php echo '
      _smarty_console.document.write(\'<\'+\'/ul>\');
  
      if (display_templater_vars_in_popup) {
        _smarty_console.document.write(
          \'<div id="vars" style="display:none;">\' +
          \'<h1>\' + local_txt_assigned_template_variables + \'<\'+\'/h1>\' +
          \'<table cellspacing="1" class="vars">\'
        );
        '; ?>

          <?php unset($this->_sections['vars']);
$this->_sections['vars']['name'] = 'vars';
$this->_sections['vars']['loop'] = is_array($_loop=$this->_tpl_vars['_debug_keys']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['vars']['show'] = true;
$this->_sections['vars']['max'] = $this->_sections['vars']['loop'];
$this->_sections['vars']['step'] = 1;
$this->_sections['vars']['start'] = $this->_sections['vars']['step'] > 0 ? 0 : $this->_sections['vars']['loop']-1;
if ($this->_sections['vars']['show']) {
    $this->_sections['vars']['total'] = $this->_sections['vars']['loop'];
    if ($this->_sections['vars']['total'] == 0)
        $this->_sections['vars']['show'] = false;
} else
    $this->_sections['vars']['total'] = 0;
if ($this->_sections['vars']['show']):

            for ($this->_sections['vars']['index'] = $this->_sections['vars']['start'], $this->_sections['vars']['iteration'] = 1;
                 $this->_sections['vars']['iteration'] <= $this->_sections['vars']['total'];
                 $this->_sections['vars']['index'] += $this->_sections['vars']['step'], $this->_sections['vars']['iteration']++):
$this->_sections['vars']['rownum'] = $this->_sections['vars']['iteration'];
$this->_sections['vars']['index_prev'] = $this->_sections['vars']['index'] - $this->_sections['vars']['step'];
$this->_sections['vars']['index_next'] = $this->_sections['vars']['index'] + $this->_sections['vars']['step'];
$this->_sections['vars']['first']      = ($this->_sections['vars']['iteration'] == 1);
$this->_sections['vars']['last']       = ($this->_sections['vars']['iteration'] == $this->_sections['vars']['total']);
?>
            _smarty_console.document.write('<tr<?php if (!(1 & $this->_sections['vars']['index'])): ?> class="line"<?php endif; ?>><td class="name">{$<?php echo $this->_tpl_vars['_debug_keys'][$this->_sections['vars']['index']]; ?>
}</td><td><?php echo ((is_array($_tmp=smarty_modifier_debug_print_var($this->_tpl_vars['_debug_vals'][$this->_sections['vars']['index']]))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
</td></tr>');
          <?php endfor; else: ?>
            _smarty_console.document.write('<tr class="line"><td colspan="2"><em>' + local_txt_no_template_variables_assigned + '</em></td></tr>');
          <?php endif; ?>
        <?php echo '
        _smarty_console.document.write(\'</table>\');

        _smarty_console.document.write(
          \'<h1>\' + local_txt_assigned_config_file_variables + \'<\'+\'/h1>\' +
          \'<table cellspacing="1" class="vars">\'
        );
        '; ?>

          <?php unset($this->_sections['vars']);
$this->_sections['vars']['name'] = 'vars';
$this->_sections['vars']['loop'] = is_array($_loop=$this->_tpl_vars['_debug_config_keys']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['vars']['show'] = true;
$this->_sections['vars']['max'] = $this->_sections['vars']['loop'];
$this->_sections['vars']['step'] = 1;
$this->_sections['vars']['start'] = $this->_sections['vars']['step'] > 0 ? 0 : $this->_sections['vars']['loop']-1;
if ($this->_sections['vars']['show']) {
    $this->_sections['vars']['total'] = $this->_sections['vars']['loop'];
    if ($this->_sections['vars']['total'] == 0)
        $this->_sections['vars']['show'] = false;
} else
    $this->_sections['vars']['total'] = 0;
if ($this->_sections['vars']['show']):

            for ($this->_sections['vars']['index'] = $this->_sections['vars']['start'], $this->_sections['vars']['iteration'] = 1;
                 $this->_sections['vars']['iteration'] <= $this->_sections['vars']['total'];
                 $this->_sections['vars']['index'] += $this->_sections['vars']['step'], $this->_sections['vars']['iteration']++):
$this->_sections['vars']['rownum'] = $this->_sections['vars']['iteration'];
$this->_sections['vars']['index_prev'] = $this->_sections['vars']['index'] - $this->_sections['vars']['step'];
$this->_sections['vars']['index_next'] = $this->_sections['vars']['index'] + $this->_sections['vars']['step'];
$this->_sections['vars']['first']      = ($this->_sections['vars']['iteration'] == 1);
$this->_sections['vars']['last']       = ($this->_sections['vars']['iteration'] == $this->_sections['vars']['total']);
?>
            _smarty_console.document.write('<tr<?php if (!(1 & $this->_sections['vars']['index'])): ?> class="line"<?php endif; ?>><td class="name">{$<?php echo $this->_tpl_vars['_debug_config_keys'][$this->_sections['vars']['index']]; ?>
}</td><td><?php echo ((is_array($_tmp=smarty_modifier_debug_print_var($this->_tpl_vars['_debug_config_vals'][$this->_sections['vars']['index']]))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
</td></tr>');
          <?php endfor; else: ?>
            _smarty_console.document.write('<tr class="line"><td colspan="2"><em>' + local_txt_no_config_vars_assigned + '</em></td></tr>');
          <?php endif; ?>
        <?php echo '
        _smarty_console.document.write(\'</table>\');
        _smarty_console.document.write(\'</div>\');
      }

      _smarty_console.document.write(\'<\'+\'/body><\'+\'/html>\');
      _smarty_console.document.close();
      _smarty_console.mainWnd = window;

    }
  } catch(e) {
  }
}
'; ?>

//]]>
</script>