{*
$Id: customer_answer_comment.tpl,v 1.2.2.1 2011/08/01 13:32:01 aim Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
<textarea{if $question.col gt 1} style="width: 90%;"{/if}{if $is_column or $is_menu} rows="2" cols="20"{else} rows="4" cols="40"{/if} name="data[{$qid|escape}][comment][{$aid|escape}]" id="ansc_{$aid|escape}"{if $readonly} readonly="readonly"{elseif $a.selected eq ""} disabled="disabled"{/if}>{$a.comment|escape}</textarea>
