{*
$Id: welcome.tpl,v 1.1.2.1 2012/04/05 11:53:49 ferz Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
{*if $display_greet_visitor_name}

  <h1>{$lng.lbl_welcome_back|substitute:"name":$display_greet_visitor_name} </h1>

{elseif $lng.lbl_site_title}

  <h1>{$lng.lbl_welcome_to|substitute:"company":$lng.lbl_site_title|amp}</h1>

{else}

  <h1>{$lng.lbl_welcome_to|substitute:"company":$config.Company.company_name|amp}</h1>

{/if*}

<div><img src="{$AltImagesDir}/custom/mainbanner.jpg" alt="" /></div>

{$lng.txt_welcome}<br />

{include file="customer/main/featured.tpl"}

{if $active_modules.Bestsellers and $config.Bestsellers.bestsellers_menu ne "Y"}
  {include file="modules/Bestsellers/bestsellers.tpl"}<br />
{/if}

