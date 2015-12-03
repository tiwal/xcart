{*
$Id: xcart_paid_modules.tpl,v 1.1.2.1 2011/11/25 08:03:34 aim Exp $
vim: set ts=2 sw=2 sts=2 et:
*}

{if $paid_modules ne ''}
<div>
<ul>
{foreach from=$paid_modules item=module}
<li>
<h2><a href='{$module.page|default:$config.rss_xcart_paid_default_url}' target='_blank'><img src='{$module.image}' height="100" alt="{$module.name|escape}" /></a></h2>
<a href='{$module.page|default:$config.rss_xcart_paid_default_url}' target='_blank'>{$module.name|escape}</a>
<p style="text-align:left">{$module.desc|escape}</p>
</li>
{/foreach}
</ul>
</div>
{/if}
