{*
$Id: xcart_news.tpl,v 1.1.2.1 2011/06/14 15:04:04 aim Exp $
vim: set ts=2 sw=2 sts=2 et:
*}

{include file="page_title.tpl" title=$lng.lbl_xcart_news}

<p>{$lng.txt_qualiteam_about_news_page|substitute:'rss_full_source':$config.rss_xcart_news_url}</p>
<br />
{getvar var='xcart_news'}
{foreach from=$xcart_news item=item}
<hr size="1" noshade="noshade" class='Line' />
<div class='ItemsList'>{if $item.link}<a href='{$item.link}' target='_blank'>{$item.title}</a>{else}{$item.title}{/if}</div>
{$item.pubDate|date_format:$config.Appearance.datetime_format}<br />
{$item.description}<br />
{/foreach}
