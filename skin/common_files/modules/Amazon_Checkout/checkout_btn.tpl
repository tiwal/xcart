{*
$Id: checkout_btn.tpl,v 1.1.2.5 2011/12/01 09:40:10 aim Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
{getvar func='func_tpl_is_acheckout_button_enabled'}
{if $func_tpl_is_acheckout_button_enabled}
{if $config.amazon_integration_version eq '2'}
  {getvar var='amazon_checkout_data' func='func_amazon_get_checkout_data'}
  {if not $std_checkout_disabled or $paypal_express_active or $gcheckout_button}
    {if $top_button ne 'Y'}
      <p>{$lng.lbl_gcheckout_or_use}</p>
    {/if}
  {/if}
  <div id="{$abtn_id|default:"cbaButton1"}"/>
  <script>
    new CBA.Widgets.StandardCheckoutWidget(
      {ldelim}
        merchantId: '{$amazon_checkout_data.merchantId}',
        orderInput: {ldelim}format: "XML", value: "{$amazon_checkout_data.value}"{rdelim}, 
        buttonSettings: {ldelim}size:'large',color:'orange',background:'white'{rdelim}
      {rdelim}).render("{$abtn_id|default:"cbaButton1"}"); 
  </script>
  </div>
{else}
  <div class="gcheckout-cart-buttons">
    <div>
      {if not $std_checkout_disabled or $paypal_express_active or $gcheckout_button}
        {if $top_button ne 'Y'}
          <p>{$lng.lbl_gcheckout_or_use}</p>
        {/if}
      {/if}
        <a href="cart.php?mode=acheckout"><img alt="" src="https://{$amazon_host}/gp/cba/button?color=orange&amp;cartOwnerId={$config.Amazon_Checkout.amazon_mid}&amp;size={if $btn_size eq ''}large{else}{$btn_size}{/if}&amp;background=white" /></a>
    </div>
  </div>
{/if}
{/if}
