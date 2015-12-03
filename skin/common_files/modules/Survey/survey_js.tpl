{*
$Id: survey_js.tpl,v 1.3.2.1 2011/08/01 14:39:09 aim Exp $ 
vim: set ts=2 sw=2 sts=2 et:
*}
<script type="text/javascript">
//<![CDATA[
var surveyForm = document.surveyfillmenuform{if $is_menu}{$survey.surveyid}{/if};
var notify_empty_survey = {if $config.Survey.survey_warn_empty_instance eq 'Y'}true{else}false{/if};
var txt_survey_is_empty_notify = "{$lng.txt_survey_is_empty_notify|wm_remove|escape:javascript}";
var txt_survey_mandatory_question_alert = "{$lng.txt_survey_mandatory_question_alert|wm_remove|escape:javascript}";

if (!isset(questions))
  var questions = [];

{foreach from=$survey.questions item=question key=qid}
questions[{$survey.surveyid}] = [];
questions[{$survey.surveyid}][{$qid}] = {ldelim}required: '{$question.required|default:"N"}', type:'{$question.answers_type}', question: '{$question.question|wm_remove|escape:javascript}'{rdelim};
{if $question.answers ne ''}
questions[{$survey.surveyid}][{$qid}]['answers'] = [{foreach from=$question.answers item=a key=aid name=answ}{$aid}{if not $smarty.foreach.answ.last},{/if}{/foreach}];
{/if}
{/foreach}
//]]>
</script>
{load_defer file="modules/Survey/customer_survey.js" type="js"}
