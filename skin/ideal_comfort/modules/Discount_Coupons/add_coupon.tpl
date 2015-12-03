{*
$Id: add_coupon.tpl,v 1.1.1.1 2012/04/05 10:16:14 ferz Exp $
vim: set ts=2 sw=2 sts=2 et:
*}

<p class="text-block">{$lng.txt_add_coupon_header}</p>

{capture name=dialog}

  {if $gcheckout_enabled}
    <p class="text-block">{$lng.txt_gcheckout_add_coupon_note}</p>
  {/if}

  <form action="cart.php" name="couponform">
    <input type="hidden" name="mode" value="add_coupon" />

    <table cellspacing="0" summary="{$lng.lbl_redeem_discount_coupon|escape}">
      <tr>
        <td class="data-name">{$lng.lbl_coupon_code}</td>
        <td><input type="text" size="32" name="coupon" /></td>
        <td>&nbsp;</td>
        <td>{include file="customer/buttons/submit.tpl" type="input"}</td>
      </tr>
    </table>

  </form>

{/capture}
{if $page eq 'place_order'}
  {include file="customer/dialog.tpl" title=$lng.lbl_redeem_discount_coupon content=$smarty.capture.dialog additional_class="cart" noborder=true}
{else}
  {include file="customer/dialog.tpl" title=$lng.lbl_redeem_discount_coupon content=$smarty.capture.dialog additional_button_class="light-button"}
{/if}
