{*
$Id: footer_links.tpl,v 1.1.2.1 2012/04/05 11:53:49 ferz Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
{if $active_modules.Socialize and ($config.Socialize.soc_fb_page_url ne "" or $config.Socialize.soc_tw_user_name ne "") and $usertype ne "A"}
<table cellspacing="0" cellpadding="0">
<tr>
{if $config.Socialize.soc_tw_user_name ne ""}
	<td><a href="http://twitter.com/#!/{$config.Socialize.soc_tw_user_name}"><img src="{$AltImagesDir}/custom/twitter.gif" alt="{$lng.lbl_soc_twitter}" /></a></td>
{/if}
{if $config.Socialize.soc_fb_page_url ne ""}
	<td><a href="{$config.Socialize.soc_fb_page_url}"><img src="{$AltImagesDir}/custom/facebook.gif" alt="{$lng.lbl_soc_facebook}" /></a></td>
{/if}
</tr>
</table>
{/if}