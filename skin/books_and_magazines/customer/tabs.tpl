{*
$Id: tabs.tpl,v 1.1.2.1 2012/04/05 11:53:48 ferz Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
{assign var=speed_bar value=$speed_bar|@array_reverse}
{if $speed_bar}
  <div class="tabs2{if $all_languages_cnt gt 1} with_languages{/if}">
    <ul>

      {foreach from=$speed_bar item=sb name=tabs}
        <li{interline name=tabs}><a href="{$sb.link|amp}">{$sb.title}</a></li>
      {/foreach}

    </ul>
  </div>
{/if}
