{*
$Id: bonus_noprice.tpl,v 1.1.2.1 2011/05/31 12:19:30 ferz Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
{$lng.lbl_sp_bonus_apply_to_list}:
<input type="hidden" name="bonus[{$bonus.bonus_type}][amount_min]" value="0" />
{include file="modules/Special_Offers/edit/product_n_category.tpl" item=$bonus item_type="B" with_qnty="Y" join_type="and"}
