{*
$Id: jquery_ui.tpl,v 1.4.2.3 2012/01/20 15:25:01 aim Exp $ 
vim: set ts=2 sw=2 sts=2 et:
*}

{*jQuery UI Components included in jquery-ui.custom.min.js
    jquery.ui.core.min.js
    jquery.ui.widget.min.js
    jquery.ui.mouse.min.js
    jquery.ui.button.min.js
    jquery.ui.resizable.min.js
    jquery.ui.draggable.min.js
    jquery.ui.dialog.min.js
    jquery.ui.tabs.min.js
    jquery.ui.datepicker.min.js
    jquery.ui.position.min.js
*}
{load_defer file="lib/jqueryui/jquery-ui.custom.min.js" type="js"}

{if $usertype eq 'C'}
  {load_defer file="lib/jqueryui/jquery.ui.theme.css" type="css"}
{else}
  {load_defer file="lib/jqueryui/jquery.ui.admin.css" type="css"}
{/if}
