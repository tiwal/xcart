{*
$Id: right_bar.tpl,v 1.1.2.1 2012/04/05 11:53:48 ferz Exp $ 
vim: set ts=2 sw=2 sts=2 et:
*}
{if $active_modules.SnS_connector}
  {include file="modules/SnS_connector/button.tpl"}
{/if}

{if $active_modules.Feature_Comparison and $comparison_products ne ''}
  {include file="modules/Feature_Comparison/product_list.tpl"}
{/if}

{include file="customer/menu_cart.tpl"}

{include file="customer/authbox.tpl"}

{if $active_modules.Recently_Viewed}
  {include file="modules/Recently_Viewed/section.tpl"}
{/if}

{include file="customer/news.tpl"}

{if $active_modules.XAffiliate and $config.XAffiliate.partner_register eq 'Y' and $config.XAffiliate.display_backoffice_link eq 'Y'}
  {include file="partner/menu_affiliate.tpl"}
{/if}

{if not $active_modules.Simple_Mode and $config.General.provider_register eq 'Y' and $config.General.provider_display_backoffice_link eq 'Y'}
  {include file="customer/menu_provider.tpl"}
{/if}

{if $active_modules.Interneka}
  {include file="modules/Interneka/menu_interneka.tpl"}
{/if}

{include file="poweredby.tpl"}
