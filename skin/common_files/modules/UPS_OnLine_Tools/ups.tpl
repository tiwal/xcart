{*
$Id: ups.tpl,v 1.1 2010/05/21 08:32:50 joy Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
{include file="page_title.tpl" title=$lng.lbl_ups_online_tools}

{$lng.txt_ups_online_tools_top_text}

<br /><br />
{include file="modules/UPS_OnLine_Tools/dialog.tpl" title=$title content=$smarty.capture.dialog extra='width="100%"'}
{if $mode eq "rss"}
{include file="modules/UPS_OnLine_Tools/ups_rss.tpl"}
{elseif $ups_reg_step eq 0}
{include file="modules/UPS_OnLine_Tools/ups_main.tpl"}
{elseif $ups_reg_step eq 1}
{include file="modules/UPS_OnLine_Tools/ups_access_license_1.tpl"}
{elseif $ups_reg_step eq 2}
{include file="modules/UPS_OnLine_Tools/ups_access_license_2.tpl"}
{elseif $ups_reg_step eq 3}
{include file="modules/UPS_OnLine_Tools/ups_access_license_3.tpl"}
{elseif $ups_reg_step eq 4}
{include file="modules/UPS_OnLine_Tools/ups_access_license_4.tpl"}
{/if}
