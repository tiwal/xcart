{*
$Id: amazon_top_button.tpl,v 1.1.2.4 2012/01/04 12:17:16 aim Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
{if $amazon_enabled}
  {if $config.Amazon_Checkout.amazon_mark ne ''}
    <img src='{$config.Amazon_Checkout.amazon_mark}' style="float:right;" alt='{$lng.lbl_amazon_checkout}' />
  {/if}

  {if $config.Amazon_Checkout.enable_amazon_top_button eq 'Y'}
    {include file="modules/Amazon_Checkout/checkout_btn.tpl" top_button='Y' abtn_id=top_cbaButton2}
  {/if}

  {if $config.Amazon_Checkout.amazon_mark ne ''}
    <div class="clearing"></div>
  {/if}    
{/if}
