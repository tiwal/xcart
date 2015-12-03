{*
$Id: tabs.tpl,v 1.1.1.1 2012/04/05 10:16:13 ferz Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
{if $speed_bar}
  <div class="tabs{if $all_languages_cnt gt 1} with_languages{/if}">
    <ul>

      {foreach from=$speed_bar item=sb name=tabs}
         {strip}
			<li{interline name=tabs}>
				<a href="{$sb.link|amp}">
				{if $smarty.cookies.store_language eq "zh"}
					{if $sb.title eq "Home"}
					主页
					{/if}
					{if $sb.title eq "Shopping Cart"}
					购物车
					{/if}
					{if $sb.title eq "Contact Us"}
					联系我们
					{/if}
					
					
				{else}
					{$sb.title}
				{/if}
					<img src="{$ImagesDir}/spacer.gif" alt="" />
				</a>
				<div class="t-l"></div><div class="t-r"></div>
			</li>
		{/strip}
      {/foreach}

    </ul>
  </div>
{/if}
