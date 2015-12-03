<?php /* Smarty version 2.6.26, created on 2015-12-02 19:15:33
         compiled from modules/Socialize/service_head.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'modules/Socialize/service_head.tpl', 9, false),array('modifier', 'escape', 'modules/Socialize/service_head.tpl', 10, false),array('modifier', 'truncate', 'modules/Socialize/service_head.tpl', 11, false),array('modifier', 'addslashes', 'modules/Socialize/service_head.tpl', 11, false),array('modifier', 'replace', 'modules/Socialize/service_head.tpl', 13, false),array('modifier', 'func_get_facebook_lang_code', 'modules/Socialize/service_head.tpl', 26, false),array('function', 'load_defer', 'modules/Socialize/service_head.tpl', 34, false),)), $this); ?>

<?php if ($this->_tpl_vars['active_modules']['Socialize'] && $this->_tpl_vars['main'] != 'cart' && ( $this->_tpl_vars['products'] != '' || $this->_tpl_vars['product'] != '' ) && ( ! $this->_tpl_vars['ie_ver'] || $this->_tpl_vars['ie_ver'] > 6 )): ?>

  <?php if ($this->_tpl_vars['main'] == 'product' && ! $this->_tpl_vars['active_modules']['Facebook_Tab'] && ! strstr ( $_SERVER['HTTP_USER_AGENT'] , 'W3C_Validator' )): ?>
    <?php $this->assign('prod_descr', ((is_array($_tmp=@$this->_tpl_vars['product']['descr'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['product']['fulldescr']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['product']['fulldescr']))); ?>
    <meta property="og:title" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['product']['product'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"/>
    <meta property="og:description" content="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod_descr'])) ? $this->_run_mod_handler('truncate', true, $_tmp, '500', '...', false) : smarty_modifier_truncate($_tmp, '500', '...', false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('addslashes', true, $_tmp) : addslashes($_tmp)); ?>
" />
    <meta property="og:url" content="<?php echo $this->_tpl_vars['current_location']; ?>
/<?php echo $this->_tpl_vars['canonical_url']; ?>
" />
    <meta property="og:image" content="<?php if ($this->_tpl_vars['product']['tmbn_url'] && ! $this->_tpl_vars['product']['default_image']): ?><?php echo $this->_tpl_vars['product']['tmbn_url']; ?>
<?php else: ?><?php echo $this->_tpl_vars['current_location']; ?>
<?php if ($this->_tpl_vars['product']['default_image']): ?>/<?php echo ((is_array($_tmp=$this->_tpl_vars['product']['default_image'])) ? $this->_run_mod_handler('replace', true, $_tmp, './', '') : smarty_modifier_replace($_tmp, './', '')); ?>
<?php else: ?>/image.php?type=<?php echo ((is_array($_tmp=@$this->_tpl_vars['type'])) ? $this->_run_mod_handler('default', true, $_tmp, 'T') : smarty_modifier_default($_tmp, 'T')); ?>
&id=<?php echo $this->_tpl_vars['product']['productid']; ?>
<?php endif; ?><?php endif; ?>" />
      <?php endif; ?>

  <?php if ($this->_tpl_vars['config']['Socialize']['soc_ggl_plus_enabled'] == 'Y'): ?>
    <script type="text/javascript" src="<?php echo $this->_tpl_vars['current_protocol']; ?>
://apis.google.com/js/plusone.js">
        {lang: '<?php echo $this->_tpl_vars['store_language']; ?>
'}
    </script>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['config']['Socialize']['soc_fb_like_enabled'] == 'Y' || $this->_tpl_vars['config']['Socialize']['soc_fb_send_enabled'] == 'Y'): ?>
    <script type="text/javascript" id="facebook-jssdk" src="//connect.facebook.net/<?php echo func_get_facebook_lang_code($this->_tpl_vars['store_language']); ?>
/all.js"></script>
    <?php ob_start(); ?>
      $(function(){
        FB.init({
          xfbml: true
        });
      });
    <?php $this->_smarty_vars['capture']['fb_init'] = ob_get_contents(); ob_end_clean(); ?>
    <?php echo smarty_function_load_defer(array('file' => 'fb_init','direct_info' => $this->_smarty_vars['capture']['fb_init'],'type' => 'js','queue' => 2048), $this);?>

  <?php endif; ?>

  <?php if ($this->_tpl_vars['config']['Socialize']['soc_tw_enabled'] == 'Y'): ?>
    <script type="text/javascript" src="<?php echo $this->_tpl_vars['current_protocol']; ?>
://platform.twitter.com/widgets.js"></script>
  <?php endif; ?>


  <?php if ($this->_tpl_vars['config']['Socialize']['soc_pin_enabled'] == 'Y'): ?>
    <?php ob_start(); ?>
      <?php echo '
        var pinterest_options = {
          att: {
          
            layout: "count-layout",
            count: "always-show-count"
          },
          endpoint: "'; ?>
<?php echo $this->_tpl_vars['pinterest_endpoint']; ?>
<?php echo '",
            button: "//pinterest.com/pin/create/button/?",
            vars: {
            req: ["url", "media"],
            opt: ["title", "description"]
          },
          layout: {
            none: {
              width: 43,
              height: 20
            },
            vertical: {
              width: 43,
              height: 58
            },
            horizontal: {
              width: 90,
              height: 20
            }
          }
        }
      '; ?>

    <?php $this->_smarty_vars['capture']['pinterest_options'] = ob_get_contents(); ob_end_clean(); ?>

    <?php ob_start(); ?>
      $(function(){
        pin_it();
      });
    <?php $this->_smarty_vars['capture']['pinterest_call'] = ob_get_contents(); ob_end_clean(); ?>

    <?php echo smarty_function_load_defer(array('file' => 'pinterest_options','direct_info' => $this->_smarty_vars['capture']['pinterest_options'],'type' => 'js','queue' => 2049), $this);?>

    <?php echo smarty_function_load_defer(array('file' => "modules/Socialize/pinterest.js",'type' => 'js','queue' => 2050), $this);?>

    <?php echo smarty_function_load_defer(array('file' => 'pinterest_call','direct_info' => $this->_smarty_vars['capture']['pinterest_call'],'type' => 'js','queue' => 2051), $this);?>


  <?php endif; ?>

<?php endif; ?>
<?php echo smarty_function_load_defer(array('file' => "modules/Socialize/main.css",'type' => 'css'), $this);?>
