{*
$Id: home.tpl,v 1.3.2.1 2010/08/18 06:56:59 igoryan Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
{config_load file="$skin_config"}
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{$lng.txt_site_title}</title>
{include file="meta.tpl"}
<link rel="stylesheet" type="text/css" href="{$SkinDir}/css/skin1_admin.css" />
</head>
<body{$reading_direction_tag}{if $login eq ""} class="not-logged-in"{/if}>
{include file="rectangle_top.tpl"}
{include file="head_admin.tpl" need_quick_search="Y"}
{if $login ne ""}
{include file="provider/menu_box.tpl"}
{/if}
<!-- main area -->
<table width="100%" cellpadding="0" cellspacing="0" align="center">
<tr>
<td valign="top" class="central-space{if $dialog_tools_data}-dtools{/if}">
<!-- central space -->
{include file="location.tpl"}

{if $main eq "authentication"}
{if not $active_modules.Simple_Mode and $config.General.provider_register eq 'Y'}
  {assign var=is_register value="Y"}
{/if}
{include file="main/authentication.tpl" login_title=$lng.lbl_provider_login_title is_register=$is_register}

{elseif $smarty.get.mode eq "subscribed"}
{include file="main/subscribe_confirmation.tpl"}

{elseif $smarty.get.mode eq "unsubscribed"}
{include file="main/unsubscribe_confirmation.tpl"}

{elseif $main eq "ups_import"}
{include file="modules/Order_Tracking/ups_import.tpl"}

{elseif $main eq "import_export"}
{include file="main/import_export.tpl"}

{elseif $main eq "froogle_export"}
{include file="modules/Froogle/froogle.tpl"}

{elseif $main eq "slg"}
{include file="modules/Shipping_Label_Generator/generator.tpl"}

{elseif $main eq "register"}
{include file="provider/main/register.tpl"}

{elseif $main eq "search"}
{include file="main/search_result.tpl"}

{elseif $main eq "manufacturers"}
{include file="modules/Manufacturers/manufacturers.tpl"}

{elseif $main eq "discounts"}
{include file="provider/main/discounts.tpl"}

{elseif $main eq "coupons"}
{include file="modules/Discount_Coupons/coupons.tpl"}

{elseif $main eq "extra_fields"}
{if $active_modules.Extra_Fields ne ""}
{include file="modules/Extra_Fields/extra_fields.tpl"}
{/if}

{elseif $main eq "wishlists"}
{include file="modules/Wishlist/wishlists.tpl"}

{elseif $main eq "wishlist"}
{include file="modules/Wishlist/display_wishlist.tpl"}

{elseif $main eq "taxes"}
{include file="provider/main/taxes.tpl"}

{elseif $main eq "tax_edit"}
{include file="provider/main/tax_edit.tpl"}

{elseif $main eq "shipping_rates"}
{include file="provider/main/shipping_rates.tpl"}

{elseif $main eq "zones"}
{include file="provider/main/zones.tpl"}

{elseif $main eq "zone_edit"}
{include file="provider/main/zone_edit.tpl"}

{elseif $main eq "product"}
{include file="main/product.tpl"}

{elseif $main eq "product_links"}
{include file="admin/main/product_links.tpl"}

{elseif $main eq "home" and $smarty.get.mode eq 'profile_created'}
{include file="provider/main/welcome_queued.tpl"}

{elseif $main eq "home"}
{include file="provider/main/promotions.tpl"}

{elseif $main eq "inv_update"}
{include file="provider/main/inv_update.tpl"}

{elseif $main eq "inv_updated"}
{include file="main/inv_updated.tpl"}

{elseif $main eq "error_inv_update"}
{include file="main/error_inv_update.tpl"}

{elseif $main eq "product_configurator"}
{include file="modules/Product_Configurator/pconf_common.tpl"}

{elseif $main eq "general_info"}
{include file="provider/main/general.tpl"}

{elseif $main eq "change_password"}
{include file="main/change_password.tpl"}

{elseif $main eq "special_offers"}
{include file="modules/Special_Offers/common.tpl"}

{elseif $main eq "commissions"}
{include file="main/commissions.tpl"}

{else}
{include file="common_templates.tpl"}
{/if}
<!-- /central space -->
&nbsp;
</td>

<td valign="top">
{include file="dialog_tools.tpl"}
</td>

</tr>
</table>
{include file="rectangle_bottom.tpl"}
</body>
</html>
