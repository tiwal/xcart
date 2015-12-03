{*
$Id: search.tpl,v 1.1.4.1 2012/04/09 10:14:12 aim Exp $
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

        <a href="search.php" class="link"><img src="{$AltImagesDir}/vivid_dreams/advsearch.gif" alt="" /></a>
        <input type="text" name="posted_data[substring]" class="text{if not $search_prefilled.substring} default-value{/if}" value="{$search_prefilled.substring|default:$lng.lbl_enter_keyword|escape}" />
        {include file="customer/buttons/button.tpl" type="input" style="image"}
      {/strip}

    </form>

  </div>
</div>
