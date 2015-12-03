{*
$Id: service_head.tpl,v 1.1.2.7.2.1 2012/04/06 15:01:57 aim Exp $
vim: set ts=2 sw=2 sts=2 et:
*}

{if $active_modules.Socialize and $main neq 'cart' and ($products neq '' or $product neq '') and (!$ie_ver or $ie_ver gt 6)}

  {if $main eq "product" and !$active_modules.Facebook_Tab and !strstr($smarty.server.HTTP_USER_AGENT, 'W3C_Validator')}
    {assign var="prod_descr" value=$product.descr|default:$product.fulldescr}
    <meta property="og:title" content="{$product.product|escape}"/>
    <meta property="og:description" content="{$prod_descr|truncate:'500':'...':false|escape|addslashes}" />
    <meta property="og:url" content="{$current_location}/{$canonical_url}" />
    <meta property="og:image" content="{if $product.tmbn_url && !$product.default_image}{$product.tmbn_url}{else}{$current_location}{if $product.default_image}/{$product.default_image|replace:'./':''}{else}/image.php?type={$type|default:'T'}&id={$product.productid}{/if}{/if}" />
    {* Admin field. Use it for Insights
    <meta property="fb:admins" content="%YOUR_FB_USERID_HERE%" />
    *}
  {/if}

  {if $config.Socialize.soc_ggl_plus_enabled eq "Y"}
    <script type="text/javascript" src="{$current_protocol}://apis.google.com/js/plusone.js">
        {ldelim}lang: '{$store_language}'{rdelim}
    </script>
  {/if}

  {if $config.Socialize.soc_fb_like_enabled eq "Y" or $config.Socialize.soc_fb_send_enabled eq "Y"}
    <script type="text/javascript" id="facebook-jssdk" src="//connect.facebook.net/{$store_language|@func_get_facebook_lang_code}/all.js"></script>
    {capture name="fb_init"}
      $(function(){ldelim}
        FB.init({ldelim}
          xfbml: true
        {rdelim});
      {rdelim});
    {/capture}
    {load_defer file="fb_init" direct_info=$smarty.capture.fb_init type="js" queue=2048}
  {/if}

  {if $config.Socialize.soc_tw_enabled eq "Y"}
    <script type="text/javascript" src="{$current_protocol}://platform.twitter.com/widgets.js"></script>
  {/if}


  {if $config.Socialize.soc_pin_enabled eq "Y"}
    {capture name="pinterest_options"}
      {literal}
        var pinterest_options = {
          att: {
          
            layout: "count-layout",
            count: "always-show-count"
          },
          endpoint: "{/literal}{$pinterest_endpoint}{literal}",
            button: "//pinterest.com/pin/create/button/?",
            vars: {
            req: ["url", "media"],
            opt: ["title", "description"]
          },
          layout: {
            none: {
              width: 43,
              height: 20
            },
            vertical: {
              width: 43,
              height: 58
            },
            horizontal: {
              width: 90,
              height: 20
            }
          }
        }
      {/literal}
    {/capture}

    {capture name="pinterest_call"}
      $(function(){ldelim}
        pin_it();
      {rdelim});
    {/capture}

    {load_defer file="pinterest_options" direct_info=$smarty.capture.pinterest_options type="js" queue=2049}
    {load_defer file="modules/Socialize/pinterest.js" type="js" queue=2050}
    {load_defer file="pinterest_call" direct_info=$smarty.capture.pinterest_call type="js" queue=2051}

  {/if}

{/if}
{load_defer file="modules/Socialize/main.css" type="css"}
