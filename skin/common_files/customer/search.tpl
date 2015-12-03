{*
$Id: search.tpl,v 1.1.2.1.2.1 2012/04/09 10:14:12 aim Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
<div class="search">
  <div class="valign-middle">
    <form method="post" action="search.php" name="productsearchform">

      <input type="hidden" name="simple_search" value="Y" />
      <input type="hidden" name="mode" value="search" />
      <input type="hidden" name="posted_data[by_title]" value="Y" />
      <input type="hidden" name="posted_data[by_descr]" value="Y" />
      <input type="hidden" name="posted_data[by_sku]" value="Y" />
      <input type="hidden" name="posted_data[search_in_subcategories]" value="Y" />
      <input type="hidden" name="posted_data[including]" value="all" />

      {strip}

        <span class="search">{$lng.lbl_search}:</span>
        <input type="text" name="posted_data[substring]" class="text{if not $search_prefilled.substring} default-value{/if}" value="{$search_prefilled.substring|default:$lng.lbl_enter_keyword|escape}" />
        {include file="customer/buttons/button.tpl" type="input" style="image"}
        <a href="search.php" class="search" rel="nofollow">{$lng.lbl_advanced_search}</a>
      {/strip}

    </form>

  </div>
</div>
