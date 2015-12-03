{*
$Id: menu_dialog.tpl,v 1.1.1.1 2012/04/05 10:16:13 ferz Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
<div class="menu-dialog{if $additional_class} {$additional_class}{/if}">
  <div class="title-bar {if $link_href} link-title{/if}">
    {strip}

      {if $link_href}
        <span class="title-link">
          <a href="{$link_href}" class="title-link"><img src="{$ImagesDir}/spacer.gif" alt=""  /></a>
        </span>
      {/if}
	  {if $minicart}
		  <img class="icon ajax-minicart-icon" src="{$ImagesDir}/spacer.gif" alt="" />
	  {else}
	      <h2>{$title}</h2>
	  {/if}

    {/strip}
  </div>
  <div class="content">
    {$content}
  </div>
  {if $minicart}
	<div class="clearing"></div>
	<div class="t-l"></div><div class="t-r"></div>
	<div class="b-l"></div><div class="b-r"></div>
  {/if}
</div>
