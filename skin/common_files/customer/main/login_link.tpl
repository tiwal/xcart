{*
$Id: login_link.tpl,v 1.3.2.1 2011/12/12 10:35:49 aim Exp $ 
vim: set ts=2 sw=2 sts=2 et:
*}
<a href="{$authform_url}" title="{$lng.lbl_sign_in|escape}" {if not (($smarty.cookies.robot eq 'X-Cart Catalog Generator' and $smarty.cookies.is_robot eq 'Y') or ($config.Security.use_https_login eq 'Y' and not $is_https_zone))} onclick="javascript: return !popupOpen('login.php');"{/if}{if $classname} class="{$classname|escape}"{/if} id="href_Sign_in">{$lng.lbl_sign_in}</a>
