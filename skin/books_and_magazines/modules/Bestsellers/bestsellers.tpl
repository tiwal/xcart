{*
$Id: bestsellers.tpl,v 1.1.2.1 2012/04/05 11:53:49 ferz Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
{if $bestsellers}

  {capture name=bestsellers}

    {include file="customer/simple_products_list.tpl" products=$bestsellers class=""}

  {/capture}
  {include file="customer/dialog.tpl" title=$lng.lbl_bestsellers content=$smarty.capture.bestsellers}

{/if}
