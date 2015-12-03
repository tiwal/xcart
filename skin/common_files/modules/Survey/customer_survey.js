/* vim: set ts=2 sw=2 sts=2 et: */
/**
 * Survey functions for customer area
 * 
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage JS Library
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com> 
 * @version    $Id: customer_survey.js,v 1.3.2.1 2011/08/01 14:39:09 aim Exp $
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

/* onsubmit handler */
function savePeriod(f) {
  if (f && f.period == 0) {
    xAlert(txt_survey_is_empty_notify);
    return false;
  }

  return checkRequiredAnswers(f.surveyid.value);
}

/* onclick / onchange handler */
function setPeriod() {
  if (!this.form || this.form.period != 0)
    return;

  this.form.period = new Date().getTime();
}

/* Answer selection handler */
function checkSelectedAnswer(surveyid,type,qid,aid) {
  var commentObj = document.getElementById('ansc_'+aid);
  var answerObj = document.getElementById('ans_'+aid);

  if (!answerObj)
    return true;
  
  if (commentObj)
    commentObj.disabled = !answerObj.checked;
  
  var l_questions = questions[surveyid];
  if (type != 'C' && l_questions && l_questions[qid] && l_questions[qid]['answers']) {
    for (var a in l_questions[qid].answers) {
      if (!hasOwnProperty(l_questions[qid].answers, a))
        continue;

      var answerid = l_questions[qid].answers[a];
      if (document.getElementById('ansc_' + answerid) && answerid != aid)
        document.getElementById('ansc_' + answerid).disabled = true;
    }
  }
  return true;
}

/* Check mandatory fields */
function checkRequiredAnswers(surveyid) {
  var l_questions = questions[surveyid];
  if (l_questions) {
    for (var qid in l_questions) {
      if (hasOwnProperty(l_questions, qid) && l_questions[qid]['required'] == 'Y' && !checkAnswer(qid, l_questions)) {
        requiredQuestionAlert(qid, l_questions);
        return false;
      }
    }
  }
  return true;
}

/* Check if the question was answered */
function checkAnswer(qid, l_questions) {
  var qType = l_questions[qid]['type'];
  var answered = false;

  switch (qType) {
    case 'N':
      if (document.getElementById('comment_'+qid)) 
        answered = document.getElementById('comment_'+qid).value.replace(/ /g, '').length > 0;
      break;
    case 'C':
    case 'R':
      if (l_questions[qid]['answers']) {
        for (var a in l_questions[qid].answers) {
          if (!hasOwnProperty(l_questions[qid].answers, a))
            continue;

          var answObj = document.getElementById('ans_' + l_questions[qid].answers[a]);
          if (answObj && answObj.checked) {
            answered = true;
            break;
          }
        }
      }
      break;
  }
  return answered;
}

/* function moves the user to an anchor position */
function requiredQuestionAlert(qid, l_questions) {
  window.location = window.location.toString().replace(/#.*$/, '') + '#question'+qid;
  xAlert(substitute(txt_survey_mandatory_question_alert,'question',l_questions[qid]['question']));
  return false;
}

/* Set event handlers */
if (surveyForm && surveyForm.elements && surveyForm.elements.length > 0) {
  surveyForm.period = 0;
  for (var i = 0; i < surveyForm.elements.length; i++) {
    var obj = surveyForm.elements[i];
    if (obj.type == 'hidden' || !obj.name || obj.name.search(/^data/) == -1)
      continue;

    if (obj.type == 'checkbox' || obj.type == 'radio') {
      obj.onclick = setPeriod;
      if (obj.checked) {
        surveyForm.period = 1;
      }
    } else {
      obj.onchange = setPeriod;
      if (obj.value != "") {
        surveyForm.period = 1;
      }
    }
    
  }  
}
