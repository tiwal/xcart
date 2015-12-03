{*
$Id: dialog.tpl,v 1.1.1.1 2012/04/05 10:16:13 ferz Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
<div class="dialog{if $additional_class} {$additional_class}{/if}{if $noborder} noborder{/if}{if $sort and $printable ne 'Y'} list-dialog{/if}">
  {if not $noborder}
    <div class="title">
      <h2>{$title}</h2>
      {if $sort and $printable ne 'Y'}
        <div class="sort-box">
          {if $selected eq '' and $direction eq ''}
            {include file="customer/search_sort_by.tpl" selected=$search_prefilled.sort_field direction=$search_prefilled.sort_direction url=$products_sort_url}
          {else}
            {include file="customer/search_sort_by.tpl" url=$products_sort_url}
          {/if}
        </div>
      {/if}
	  <div class="t-l"></div><div class="t-r"></div>
	  <div class="b-l"></div><div class="b-r"></div>
    </div>
  {/if}
  <div class="content">{$content}</div>
</div>
