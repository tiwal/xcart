{*
$Id: left_bar.tpl,v 1.1.1.1 2012/04/05 10:16:13 ferz Exp $ 
vim: set ts=2 sw=2 sts=2 et:
*}
{include file="customer/menu_cart.tpl"}
{if $active_modules.SnS_connector}
  {include file="modules/SnS_connector/button.tpl"}
{/if}

{if $active_modules.Feature_Comparison && $comparison_products ne ''}
  {include file="modules/Feature_Comparison/product_list.tpl" }
{/if}

{include file="customer/categories.tpl"}

{if $active_modules.Bestsellers && !($main eq "catalog" and $current_category.category eq "")}
  {include file="modules/Bestsellers/menu_bestsellers.tpl"}
{/if}

{if $active_modules.Manufacturers ne "" and $config.Manufacturers.manufacturers_menu eq "Y"}
  {include file="modules/Manufacturers/menu_manufacturers.tpl"}
{/if}


{if $active_modules.Gift_Certificates ne ""}
  {include file="modules/Gift_Certificates/gc_menu.tpl"}
{/if}
{if $active_modules.Recently_Viewed}
  {include file="modules/Recently_Viewed/section.tpl"}
{/if}
{include file="customer/special.tpl"}
{include file="customer/news.tpl" }

{if $active_modules.Survey and $menu_surveys}
  {foreach from=$menu_surveys item=menu_survey}
    {include file="modules/Survey/menu_survey.tpl"}
  {/foreach}
{/if}

{if $active_modules.XAffiliate && $config.XAffiliate.partner_register eq 'Y' && $config.XAffiliate.display_backoffice_link eq 'Y'}
  {include file="partner/menu_affiliate.tpl" }
{/if}

{if $active_modules.Interneka}
  {include file="modules/Interneka/menu_interneka.tpl" }
{/if}

{include file="poweredby.tpl" }
