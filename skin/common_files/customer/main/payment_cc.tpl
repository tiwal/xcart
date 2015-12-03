{*
$Id: payment_cc.tpl,v 1.4.2.1 2012/02/14 12:49:45 aim Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
{if $payment_cc_data.background eq 'I'}
  {$lng.disable_ccinfo_iframe_msg}
{else}
  {$lng.disable_ccinfo_msg}
{/if}
<br />
