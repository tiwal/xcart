{*
$Id: bottom.tpl,v 1.1.1.1.2.1 2012/04/09 13:34:22 aim Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
<div class="box">
	<div class="footer-links">
			{include file="customer/help/menu.tpl"}
	</div>
    <div class="copyright">
			{include file="copyright.tpl"}
    </div>
	<div class="payment-logos">
			<img src="{$AltImagesDir}/custom/payment_logos.png" width="162" height="26" alt="" />
      <div class="prnotice">
        {include file="main/prnotice.tpl"}
      </div>
	</div>
  {if $active_modules.Users_online}
    {include file="modules/Users_online/menu_users_online.tpl"}
  {/if}
</div>
