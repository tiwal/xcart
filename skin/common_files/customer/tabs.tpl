{*
$Id: tabs.tpl,v 1.1.2.1.2.1 2012/04/04 05:55:15 ferz Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
{if $speed_bar}
  <div class="tabs{if $all_languages_cnt gt 1} with_languages{/if}">
    <ul>

      {foreach from=$speed_bar item=sb name=tabs}
        <li{interline name=tabs}><a href="{$sb.link|amp}">{$sb.title|escape}</a></li>
      {/foreach}

    </ul>
  </div>
{/if}
