{*
$Id: menu.tpl,v 1.1.1.1 2012/04/05 10:16:13 ferz Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
<a href="help.php">{$lng.lbl_help_zone}</a>
<a href="help.php?section=contactus&amp;mode=update">{$lng.lbl_contact_us}</a>
{foreach from=$pages_menu item=p}
  {if $p.show_in_menu eq 'Y'}
	<a href="pages.php?pageid={$p.pageid}">{$p.title|amp}</a>
  {/if}
{/foreach}
