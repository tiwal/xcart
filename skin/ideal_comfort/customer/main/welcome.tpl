{*
$Id: welcome.tpl,v 1.1.1.1.2.1 2012/04/11 06:04:52 ferz Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
<table cellspacing="0" class="welcome-table" summary="{$lng.lbl_welcome}">
<tr>
	<td class="welcome-cell">
		<div class="welcome-img">
			<img src="{$AltImagesDir}/custom/welcome_picture.jpg" alt="" title="" usemap="#xcart"/>
			<map id="xcart" name="xcart">
				<area shape="rect" coords="336,33,457,230" href="" target="_blank" alt="X-Cart" />
			</map>
		</div>
		{include file="customer/evaluation.tpl"}
 		{$lng.txt_welcome}<br />

		{if $active_modules.Bestsellers and $config.Bestsellers.bestsellers_menu ne "Y"}
		  {include file="modules/Bestsellers/bestsellers.tpl"}<br />
		{/if}
		{if $active_modules.Bestsellers && $bestsellers}
			{assign var=row_length value=2}
		{else}
			{assign var=row_length value=false}
		{/if}
		{include file="customer/main/featured.tpl" row_length=$row_length}
	</td>
	{if $active_modules.Bestsellers && $bestsellers}
	<td class="bestsellers-cell">
		{include file="modules/Bestsellers/menu_bestsellers.tpl"}
	</td>
	{/if}
</tr>
</table>
