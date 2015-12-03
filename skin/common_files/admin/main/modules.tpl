{*
$Id: modules.tpl,v 1.3.2.2 2012/02/28 13:46:30 aim Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
{include file="page_title.tpl" title=$lng.lbl_modules}

{getvar func='func_get_xcart_paid_modules'}
{if $smarty.cookies.hide_dialog_xcart_paid_modules eq '' and $func_get_xcart_paid_modules}
<script type="text/javascript">
//<![CDATA[
{literal}
$(document).ready(function () {
  ajax.core.loadBlock($('#xcart_paid_modules'), 'xcart_paid_modules')
  $('#dialog_xcart_paid_modules a.close-link').click(function(){
    var date_time = new Date().getTime() + 3600*24*1000;
    $.cookie('hide_dialog_xcart_paid_modules', '1', { expires: new Date(date_time)});
  });
});
{/literal}
//]]>
</script>
{capture name=dialog}
<div id="xcart_paid_modules"></div>
<div class="more_xcart_modules_link">
<a href='http://www.x-cart.com/modules.html?utm_source=xcart_admin&amp;utm_medium=link&amp;utm_campaign=xcart_modules_link' target='_blank'>{$lng.lbl_more_xcart_modules}</a>
</div>
{/capture}
{include file="location.tpl" location="" alt_content=$smarty.capture.dialog extra='width="100%"' newid="dialog_xcart_paid_modules" alt_type="I" image_none="Y"}
{/if}

{$lng.txt_modules_top_text}

<br /><br />

<form action="modules.php?mode=update" method="post" name="myform">

<table cellpadding="5" width="100%">
{foreach from=$modules item=m}
<tr{cycle values=", class='TableSubHead'"}>
  <td width="20"><input type="checkbox" id="{$m.module_name}" name="{$m.module_name}"{if $m.active eq "Y"} checked="checked"{/if} /></td>
  <td width="20%" nowrap="nowrap">
<label for="{$m.module_name}">
{assign var="module_name" value="module_name_`$m.module_name`"}
{if $lng.$module_name}{$lng.$module_name}{else}{$m.module_name}{/if}
</label>
  </td>
  <td width="80%">
{assign var="module_descr" value="module_descr_`$m.module_name`"}
{if $lng.$module_descr}{$lng.$module_descr}{else}{$m.module_descr}{/if}
  </td>
  <td>
{if $m.options_url ne "" and $m.active eq "Y"}
<a href="{$m.options_url|amp}">{$lng.lbl_configure}</a>
{else}
&nbsp;
{/if}
  </td>
</tr>
{/foreach}
</table>
<br />

<div id="sticky_content">
  <div class="main-button">
    <input class="big-main-button" type="submit" value="{$lng.lbl_apply_changes|strip_tags:false|escape}" />
  </div>
</div>

</form>
