{*
$Id: buy_now.tpl,v 1.1.1.1 2012/04/05 10:16:13 ferz Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
{include file="customer/buttons/button.tpl" button_title=$lng.lbl_buy_now_img|substitute:"AltImagesDir":$AltImagesDir tips_title=$lng.lbl_buy_now notitle=true additional_button_class=$additional_button_class|cat:' add-to-cart-button'}
