/* vim: set ts=2 sw=2 sts=2 et: */
/**
 * Show advertisement for some country on configuration.php?option=Company page 
 * Sage pay special offer for UK
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage JS Library
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com> 
 * @version    $Id: show_company_adv.js,v 1.1.2.2 2011/11/18 07:56:42 aim Exp $
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */
function func_show1time_company_adv(){
  var txt = '<tr><td colspan="2">&nbsp;</td><td>&nbsp;<b>NOTE</b>: Sage Pay offers special deal for UK merchants.<br />&nbsp;Read more</td></tr>';

  if (
    $('#location_country').val() == 'GB'
    && $.cookie('hide_company_adv') != '1'
  ) {
    $('#tr_location_country').after(txt);

    var date_time = new Date().getTime() + 86400*365*1000;
    $.cookie('hide_company_adv', '1', { expires: new Date(date_time)});
  }
}

$(document).ready(
  function() {

    // Show advertisement when admin change country to GB
    $('#location_country').change(function() {
      func_show1time_company_adv();
    });

    // Show advertisement if GB is selected by default on installation
    func_show1time_company_adv();
  }
);
