/* vim: set ts=2 sw=2 sts=2 et: */
/**
 * Payment methods functions
 * 
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage JS Library
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com> 
 * @version    $Id: payment_methods.js,v 1.2.2.1 2011/07/04 10:44:36 aim Exp $
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

function markDisabledCB(obj) {
  $(obj).parents('table').eq(0).find(':checkbox:disabled').prop('checked', obj.checked);
}

function changeDisabledOrderBy(obj) {
  $(obj).parents('table').eq(0).find(':checkbox:disabled').parents('tr').eq(0).find(':text').filter(function() { return this.name.search(/orderby/) != -1; }).val(obj.value);
}
