{*
$Id: simple_products_list.tpl,v 1.1.2.1 2012/04/05 11:53:48 ferz Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
{list2matrix assign="products_matrix" assign_width="cell_width" list=$products row_length=$config.Appearance.simple_length}
{assign var="is_matrix_view" value=true}

{if $products_matrix}

  <table cellspacing="3" class="products products-table simple-products-table width-100" summary="{$lng.lbl_products_list|escape}">

    {foreach from=$products_matrix item=row name=products_matrix}

      <tr{interline name=products_matrix}>

        {foreach from=$row item=product name=products}
          {if $product}

            <td{interline name=products additional_class="product-cell"}>
              <div class="image">
                <div class="image-wrapper">
		<div class="imgborder" style="width: {$product.tmbn_x}px;" >
                <a href="product.php?productid={$product.productid}"{if $open_new_window eq 'Y'} target="_blank"{/if} id="img_{$product.productid}" rel="#img_{$product.productid}_tooltip">{include file="product_thumbnail.tpl" productid=$product.productid image_x=$product.tmbn_x image_y=$product.tmbn_y product=$product.product tmbn_url=$product.tmbn_url}</a>
		</div>
                </div>
              </div>

            {capture name=pt assign=txt}
		<b>{$product.product|escape}</b><br />
		<br />
              {if $product.product_type ne "C"}
                {if $active_modules.Subscriptions ne "" and $product.catalogprice}
                  {include file="modules/Subscriptions/subscription_info_inlist.tpl"}
                {elseif $product.appearance.is_auction}
                {else}
                  {if $product.taxed_price gt 0}
                      <span class="price-value">{include file="currency.tpl" value=$product.taxed_price}</span>
                  {/if}
                {/if}
              {/if}
            {/capture}
            {include file="customer/product_tip.tpl" text=$txt id="img_`$product.productid`" width="200"}
            </td>

          {/if}
        {/foreach}

      </tr>
{**
      <tr{interline name=products_matrix additional_class="product-name-row"}>

        {foreach from=$row item=product name=products}
          {if $product}

            <td{interline name=products additional_class="product-cell"} style="width: {$cell_width}%;">
<script type="text/javascript">
//<![CDATA[
products_data[{$product.productid}] = {ldelim}{rdelim};
//]]>
</script>
              <a href="product.php?productid={$product.productid}" class="product-title"{if $open_new_window eq 'Y'} target="_blank"{/if}>{$product.product|escape}</a>
            </td>

          {/if}
        {/foreach}

      </tr>

      <tr{interline name=products_matrix}>

        {foreach from=$row item=product name=products}
          {if $product}

            <td{interline name=products additional_class="product-cell product-cell-price"}>
              {if $product.product_type ne "C"}

                {if $active_modules.Subscriptions ne "" and $product.catalogprice}

                  {include file="modules/Subscriptions/subscription_info_inlist.tpl"}

                {elseif $product.appearance.is_auction}

                  <span class="price">{$lng.lbl_enter_your_price}</span><br />
                  {$lng.lbl_enter_your_price_note}

                {else}

                  {if $product.taxed_price gt 0}

                    <div class="price-row">
                      <span class="price-value">{include file="currency.tpl" value=$product.taxed_price}</span>
                    </div>

                  {/if}

                {/if}

              {else}

                &nbsp;

              {/if}

            </td>

          {/if}
        {/foreach}

      </tr>
**}
      {if not $smarty.foreach.products_matrix.last}
        <tr class="separator">
          <td colspan="{$config.Appearance.products_per_row|default:1}">&nbsp;</td>
        </tr>
      {/if}

    {/foreach}

  </table>

{/if}

