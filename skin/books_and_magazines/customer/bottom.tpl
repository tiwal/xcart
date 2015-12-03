{*
$Id: bottom.tpl,v 1.1.2.1 2012/04/05 11:53:48 ferz Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
<div class="box">
      {if $active_modules.Users_online}
        {include file="modules/Users_online/menu_users_online.tpl"}
      {/if}

  <div class="subbox">
	<table width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td valign="top" style="padding-left: 20px;">
			<div class="bottom-title">{$lng.lbl_help}</div>
		        {include file="customer/help/menu.tpl"}
		</td>

		<td valign="top" align="right" style="padding-right: 20px;">
			{if $active_modules.Socialize}
				{include file="modules/Socialize/footer_links.tpl"}
			{/if}
		        {include file="customer/phones.tpl"}
			
		</td>
	</tr>
	</table>
	<div class="bottom-line"></div>
	<div class="copyright">{include file="copyright.tpl"}</div>
  </div>
</div>
