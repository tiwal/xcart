{*
$Id: phones.tpl,v 1.1.2.1 2012/04/05 11:53:48 ferz Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
<div class="phones">

  {if $config.Company.company_phone}
    <div class="first">{$lng.lbl_phone_1_title}: <span class="phone">{$config.Company.company_phone}</span></div>
  {/if}

  {if $config.Company.company_phone_2}
    <div class="last">{$lng.lbl_phone_2_title}: <span class="phone">{$config.Company.company_phone_2}</span></div>
  {/if}

</div>

