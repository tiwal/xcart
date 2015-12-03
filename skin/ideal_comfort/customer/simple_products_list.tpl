{*
$Id: simple_products_list.tpl,v 1.1.1.1 2012/04/05 10:16:13 ferz Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
{list2matrix assign="products_matrix" assign_width="cell_width" list=$products row_length=$config.Appearance.simple_length}
{assign var="is_matrix_view" value=true}
{assign var=rowl value=$config.Appearance.products_per_row}

{assign var=prod_count value=$products|@count}
{if $prod_count < $rowl}
	{assign var=full_width value=100}
	{assign var=product_table_width value=`$cell_width*$prod_count`}
	{assign var=cell_width value=`$full_width/$prod_count`}
{else}
	{assign var=product_table_width value=100}
{/if}


{if $products_matrix}

  <table cellspacing="3" class="products products-table simple-products-table" style="width:{$product_table_width}%" summary="{$lng.lbl_products_list|escape}">

    {foreach from=$products_matrix item=row name=products_matrix}

      <tr{interline name=products_matrix}>

        {foreach from=$row item=product name=products}
          {if $product}

            <td{interline name=products additional_class="product-cell"}>
              <div class="image">
                <div class="image-wrapper">
                <a href="product.php?productid={$product.productid}"{if $open_new_window eq 'Y'} target="_blank"{/if}>{include file="product_thumbnail.tpl" productid=$product.productid image_x=$product.tmbn_x image_y=$product.tmbn_y product=$product.product tmbn_url=$product.tmbn_url}</a>
                </div>
              </div>
            </td>
			{if !$smarty.foreach.products.last}
			<td class="column_separator"><div>&nbsp;</div></td>
			{/if}
          {/if}
        {/foreach}

      </tr>

      <tr{interline name=products_matrix additional_class="product-name-row"}>

        {foreach from=$row item=product name=products}
          {if $product}

            <td{interline name=products additional_class="product-cell"} style="width: {$cell_width}%;">
<script type="text/javascript">
//<![CDATA[
products_data[{$product.productid}] = {ldelim}{rdelim};
//]]>
</script>
              <a href="product.php?productid={$product.productid}" class="product-title"{if $open_new_window eq 'Y'} target="_blank"{/if}>{$product.product|amp}</a>
            </td>
			{if !$smarty.foreach.products.last}
			<td class="column_separator"><div>&nbsp;</div></td>
			{/if}
          {/if}
        {/foreach}

      </tr>

      <tr{interline name=products_matrix}>

        {foreach from=$row item=product name=products}
          {if $product}

            <td{interline name=products additional_class="product-cell product-cell-price"}>
              {if $product.product_type ne "C"}

                {if $product.appearance.is_auction}

                  <span class="price">{$lng.lbl_enter_your_price}</span><br />
                  {$lng.lbl_enter_your_price_note}

                {else}

                  {if $product.taxed_price gt 0}

                    <div class="price-row">
                      <span class="price-value">{currency value=$product.taxed_price}</span>
                    </div>

                  {/if}

                {/if}

              {else}

                &nbsp;

              {/if}

            </td>
			{if !$smarty.foreach.products.last}
			<td class="column_separator"><div>&nbsp;</div></td>
			{/if}
          {/if}
        {/foreach}

      </tr>
      {if not $smarty.foreach.products_matrix.last}
        <tr class="separator">
          {assign var=colsp value=`$row_length`}
		  {assign var=colsp value=`$colsp+$row_length-1`}
          <td colspan="{$colsp|default:1}">&nbsp;</td>
        </tr>
      {/if}

    {/foreach}

  </table>

{/if}

