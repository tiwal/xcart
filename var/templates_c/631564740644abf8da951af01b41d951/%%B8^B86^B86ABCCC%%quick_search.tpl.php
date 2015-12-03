<?php /* Smarty version 2.6.26, created on 2015-12-02 19:19:03
         compiled from quick_search.tpl */ ?>
<?php if ($this->webmaster_mode) { ?><div id="common_files0quick_search.tpl" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?><?php func_load_lang($this, "quick_search.tpl","lbl_keywords,lbl_no_results_found,lbl_quick_search_nopattern,lbl_searching"); ?><script type="text/javascript" src="<?php echo $this->_tpl_vars['SkinDir']; ?>
/js/quick_search.js"></script>
<?php echo '
<!--[if gte IE 5.5]>
<![if lt IE 7]>
<style type="text/css">
div#quick_search_panel {
  position: absolute; right: 20px; bottom: 10px;
  right: auto; bottom: auto;
  left: expression((-20-quick_search_panel.offsetWidth+(document.documentElement.clientWidth ? document.documentElement.clientWidth : document.body.clientWidth)+(ignoreMe2=document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft))+\'px\');
  top: expression((-10-(quick_search_panel).offsetHeight+(document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body.clientHeight)+(ignoreMe=document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop))+\'px\');
}
</style>
<![endif]>
<![endif]-->
'; ?>

<div id="quick_search_panel" style="display:none;">
  <div class="quick-search-panel-main">

    <div class="quick-search-body" id="quick_search_body1">
      <span id="quick_search_results"><?php echo $this->_tpl_vars['lng']['lbl_keywords']; ?>
</span>
      <span id="quick_search_no_results" style="display:none;"><?php echo $this->_tpl_vars['lng']['lbl_no_results_found']; ?>
</span>
      <span id="quick_search_no_pattern" style="display:none;"><?php echo $this->_tpl_vars['lng']['lbl_quick_search_nopattern']; ?>
</span><br />
    </div>

    <div class="quick-search-body" id="quick_search_body2" style="display:none;">
      <?php echo $this->_tpl_vars['lng']['lbl_searching']; ?>
...<br /><br />
      <img src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/quick_search_searching.gif" alt="" />
    </div>

    <div class="quick-search-close" onclick="javascript:close_quick_search();"></div>

  </div>
</div><?php if ($this->webmaster_mode) { ?></div><?php } ?>