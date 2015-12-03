{*
$Id: menu_box.tpl,v 1.2.2.2.2.2 2012/04/19 11:23:22 aim Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
<ul id="horizontal-menu">

<li>
<a href="home.php">{$lng.lbl_dashboard}</a>
</li>

<li>

<a href='{$catalogs.admin}/orders.php?date=M'>{$lng.lbl_orders}</a>

<div>
<a href="{$catalogs.admin}/orders.php?date=M">{$lng.lbl_this_month_orders}</a>
<a href="{$catalogs.admin}/orders.php">{$lng.lbl_search_orders_menu}</a>
{if $active_modules.RMA ne ""}
<a href="{$catalogs.admin}/returns.php">{$lng.lbl_returns}</a>
{/if}
{if $active_modules.Gift_Certificates}
<a href="{$catalogs.admin}/giftcerts.php">{$lng.lbl_gift_certificates}</a>
{/if}
</div>
</li>

<li>

<a href='{$catalogs.admin}/search.php'>{$lng.lbl_catalog}</a>

<div>
<a href="{$catalogs.provider}/product_modify.php">{$lng.lbl_add_new_product}</a>
<a href="{$catalogs.admin}/search.php">{$lng.lbl_products}</a>
{if $active_modules.Customer_Reviews}
<a href="{$catalogs.admin}/ratings_edit.php">{$lng.lbl_edit_ratings}</a>
{/if}
{if $active_modules.Extra_Fields}
<a href="{$catalogs.provider}/extra_fields.php">{$lng.lbl_extra_fields}</a>
{/if}
<a href="{$catalogs.admin}/categories.php">{$lng.lbl_categories}</a>
{if $active_modules.Manufacturers}
<a href="{$catalogs.admin}/manufacturers.php">{$lng.lbl_manufacturers}</a>
{/if}
{if $active_modules.Product_Configurator}
{include file="modules/Product_Configurator/pconf_menu_provider.tpl"}
{/if}
{if $active_modules.Feature_Comparison}
{include file="modules/Feature_Comparison/admin_menu.tpl"}
{/if}
<a href="{$catalogs.provider}/discounts.php">{$lng.lbl_discounts}</a>
{if $active_modules.Discount_Coupons}
<a href="{$catalogs.provider}/coupons.php">{$lng.lbl_coupons}</a>
{/if}
{if $active_modules.Special_Offers}
{include file="modules/Special_Offers/menu_provider.tpl"}
{/if}
</div>
</li>

<li>

<a href='{$catalogs.admin}/users.php'>{$lng.lbl_users}</a>

<div>
<a href="{$catalogs.admin}/users.php">{$lng.lbl_users}</a>
{if $active_modules.Wishlist}
<a href="{$catalogs.admin}/wishlists.php">{$lng.lbl_wish_lists}</a>
{/if}
<a href="{$catalogs.admin}/memberships.php">{$lng.lbl_membership_levels}</a>
<a href="{$catalogs.admin}/titles.php">{$lng.lbl_titles}</a>
{if $active_modules.Stop_List}
<a href="{$catalogs.admin}/stop_list.php">{$lng.lbl_stop_list}</a>
{/if}
</div>
</li>

<li>

{if $config.Shipping.enable_shipping eq "Y"}
  <a href="{$catalogs.provider}/shipping_rates.php">{$lng.lbl_shipping_and_taxes}</a>
{else}
  <a href="{$catalogs.admin}/taxes.php">{$lng.lbl_shipping_and_taxes}</a>
{/if}

<div>
<a href="{$catalogs.admin}/countries.php">{$lng.lbl_countries}</a>
<a href="{$catalogs.admin}/states.php">{$lng.lbl_states}</a>
<a href="{$catalogs.provider}/zones.php">{$lng.lbl_destination_zones}</a>
<a href="{$catalogs.admin}/taxes.php">{$lng.lbl_taxing_system}</a>
<a href="{$catalogs.admin}/configuration.php?option=Shipping">{$lng.lbl_menu_shipping_options}</a>
<a href="{$catalogs.admin}/shipping.php">{$lng.lbl_shipping_methods}</a>
{if $config.Shipping.enable_shipping eq "Y"}
<a href="{$catalogs.provider}/shipping_rates.php">{$lng.lbl_shipping_charges}</a>
{if $config.Shipping.realtime_shipping eq "Y"}
<a href="{$catalogs.provider}/shipping_rates.php?type=R">{$lng.lbl_shipping_markups}</a>
{/if}
{/if}
{if $active_modules.UPS_OnLine_Tools}
<a href="{$catalogs.admin}/ups.php">{$lng.lbl_ups_online_tools}</a>
{/if}
</div>
</li>

<li>

<a href='{$catalogs.admin}/tools.php'>{$lng.lbl_tools}</a>

<div>
<a href="{$catalogs.admin}/import.php">{$lng.lbl_import_export}</a>
<a href="{$catalogs.provider}/inv_update.php">{$lng.lbl_update_inventory}</a>
<a href="{$catalogs.admin}/general.php">{$lng.lbl_summary}</a>
<a href="{$catalogs.admin}/statistics.php">{$lng.lbl_statistics}</a>
<a href="{$catalogs.admin}/db_backup.php">{$lng.lbl_db_backup_restore}</a>
<a href="{$catalogs.admin}/editor_mode.php">{$lng.lbl_webmaster_mode}</a>
<a href="{$catalogs.admin}/change_mpassword.php">{$lng.lbl_change_mpassword}</a>
<a href="{$catalogs.admin}/tools.php">{$lng.lbl_maintenance}</a>
</div>
</li>

<li>

<a href='{$catalogs.admin}/configuration.php'>{$lng.lbl_settings}</a>

<div>
<a href="{$catalogs.admin}/configuration.php">{$lng.lbl_general_settings}</a>
<a href="{$catalogs.admin}/payment_methods.php">{$lng.lbl_payment_methods}</a>
<a href="{$catalogs.admin}/modules.php">{$lng.lbl_modules}</a>
<a href="{$catalogs.admin}/images_location.php">{$lng.lbl_images_location}</a>
{if $active_modules.XPayments_Connector}
<a href="{$catalogs.admin}/configuration.php?option=XPayments_Connector">{$lng.module_name_XPayments_Connector}</a>
{/if}
</div>
</li>

<li>

<a href='{$catalogs.admin}/languages.php'>{$lng.lbl_content}</a>

<div>
<a href="{$catalogs.admin}/languages.php">{$lng.lbl_languages}</a>
<a href="{$catalogs.admin}/pages.php">{$lng.lbl_static_pages}</a>
<a href="{$catalogs.admin}/speed_bar.php">{$lng.lbl_speed_bar}</a>
<a href="{$catalogs.admin}/html_catalog.php">{$lng.lbl_html_catalog}</a>
{if $active_modules.News_Management}
<a href="{$catalogs.admin}/news.php">{$lng.lbl_news_management}</a>
{/if}
<a href="{$catalogs.admin}/file_edit.php">{$lng.lbl_edit_templates}</a>
<a href="{$catalogs.admin}/file_manage.php">{$lng.lbl_files}</a>
{if $active_modules.Survey}
<a href="{$catalogs.admin}/surveys.php">{$lng.lbl_survey_surveys}</a>
{/if}
</div>
</li>

{if $active_modules.XAffiliate}
{include file="admin/menu_affiliate.tpl"}
{/if}

{include file="admin/help.tpl"}

</ul>
