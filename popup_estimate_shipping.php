<?php
/* vim: set ts=4 sw=4 sts=4 et: */
/*****************************************************************************\
+-----------------------------------------------------------------------------+
| X-Cart Software license agreement                                           |
| Copyright (c) 2001-2012 Qualiteam software Ltd <info@x-cart.com>            |
| All rights reserved.                                                        |
+-----------------------------------------------------------------------------+
| PLEASE READ  THE FULL TEXT OF SOFTWARE LICENSE AGREEMENT IN THE "COPYRIGHT" |
| FILE PROVIDED WITH THIS DISTRIBUTION. THE AGREEMENT TEXT IS ALSO AVAILABLE  |
| AT THE FOLLOWING URL: http://www.x-cart.com/license.php                     |
|                                                                             |
| THIS AGREEMENT EXPRESSES THE TERMS AND CONDITIONS ON WHICH YOU MAY USE THIS |
| SOFTWARE PROGRAM AND ASSOCIATED DOCUMENTATION THAT QUALITEAM SOFTWARE LTD   |
| (hereinafter referred to as "THE AUTHOR") OF REPUBLIC OF CYPRUS IS          |
| FURNISHING OR MAKING AVAILABLE TO YOU WITH THIS AGREEMENT (COLLECTIVELY,    |
| THE "SOFTWARE"). PLEASE REVIEW THE FOLLOWING TERMS AND CONDITIONS OF THIS   |
| LICENSE AGREEMENT CAREFULLY BEFORE INSTALLING OR USING THE SOFTWARE. BY     |
| INSTALLING, COPYING OR OTHERWISE USING THE SOFTWARE, YOU AND YOUR COMPANY   |
| (COLLECTIVELY, "YOU") ARE ACCEPTING AND AGREEING TO THE TERMS OF THIS       |
| LICENSE AGREEMENT. IF YOU ARE NOT WILLING TO BE BOUND BY THIS AGREEMENT, DO |
| NOT INSTALL OR USE THE SOFTWARE. VARIOUS COPYRIGHTS AND OTHER INTELLECTUAL  |
| PROPERTY RIGHTS PROTECT THE SOFTWARE. THIS AGREEMENT IS A LICENSE AGREEMENT |
| THAT GIVES YOU LIMITED RIGHTS TO USE THE SOFTWARE AND NOT AN AGREEMENT FOR  |
| SALE OR FOR TRANSFER OF TITLE. THE AUTHOR RETAINS ALL RIGHTS NOT EXPRESSLY  |
| GRANTED BY THIS AGREEMENT.                                                  |
+-----------------------------------------------------------------------------+
\*****************************************************************************/

/**
 * Shipping estimator interface (popup window)
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage Customer interface
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com>
 * @copyright  Copyright (c) 2001-2012 Qualiteam software Ltd <info@x-cart.com>
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @version    $Id: popup_estimate_shipping.php,v 1.8.2.7 2012/03/27 11:18:14 aim Exp $
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

require './auth.php';

x_load('user');
$_anonymous_userinfo = func_get_anonymous_userinfo();

/**
 * Update data
 */
if (
    'POST' === $REQUEST_METHOD
    && 'change_address' === $mode
) {

    $is_completed = func_is_completed_userinfo($_anonymous_userinfo) ? 'complete' : 'incomplete';
    if (
        !isset($_anonymous_userinfo['address']['S'])
        && isset($_anonymous_userinfo['address']['B'])
    ) {
        // Means ship to billing address was previously selected
        $_anonymous_userinfo['address']['B'] = func_array_merge($_anonymous_userinfo['address']['B'], $_POST['change_userinfo']);

    } else {
    
        // Otherwise update shipping address only
        settype($_anonymous_userinfo['address']['S'],'array');
        $_anonymous_userinfo['address']['S'] = func_array_merge($_anonymous_userinfo['address']['S'], $_POST['change_userinfo']);

        if (
            !isset($_anonymous_userinfo['address']['B'])
            || $is_completed == 'incomplete'
        ) {
            $_anonymous_userinfo['address']['B'] = $_anonymous_userinfo['address']['S'];
        }

    }

    func_set_anonymous_userinfo($_anonymous_userinfo, 'skip_session_save', $is_completed);

    func_reload_parent_window();
}

$location[0] = array(func_get_langvar_by_name('lbl_specify_destination'), '');
$smarty->assign('location', $location);

require $xcart_dir . '/include/countries.php';
require $xcart_dir . '/include/states.php';

$smarty->assign('shipping_estimate_fields', $shipping_estimate_fields);

$address = (isset($_anonymous_userinfo['address']['S']))
    ? $_anonymous_userinfo['address']['S']
    : $_anonymous_userinfo['address']['B'];

$smarty->assign('address',       $address);
$smarty->assign('template_name', 'customer/main/estimate_shipping.tpl');

func_display('customer/help/popup_info.tpl', $smarty);
?>
