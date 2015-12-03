{*
$Id: general.tpl,v 1.1.2.2 2011/11/17 13:12:10 aim Exp $
vim: set ts=2 sw=2 sts=2 et:
*}

<p>{$lng.txt_help_zone_title}</p>

{include file="customer/buttons/button.tpl" button_title=$lng.lbl_recover_password href="help.php?section=Password_Recovery" style="link"}

{if $usertype ne 'A'}
{include file="customer/buttons/button.tpl" button_title=$lng.lbl_contact_us href="help.php?section=contactus&mode=update" style="link"}
{/if}
