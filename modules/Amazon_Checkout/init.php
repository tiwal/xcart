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
 * Module initialization
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage Modules
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com>
 * @copyright  Copyright (c) 2001-2012 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @version    $Id: init.php,v 1.7.2.11 2012/03/27 11:18:27 aim Exp $
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

if ( !defined('XCART_SESSION_START') ) { header("Location: ../../"); die("Access denied"); }

if (defined('QUICK_START'))
    return;

// URL for sending HTTPS requests
$amazon_host = ($config['Amazon_Checkout']['amazon_test_mode'] == 'Y') ? "payments-sandbox.amazon.com" : "payments.amazon.com";

$amazon_widget_url = $config['Amazon_Checkout']['amazon_test_mode'] == 'Y' 
    ? "https://static-na.payments-amazon.com/cba/js/us/sandbox/PaymentWidgets.js"
    : "https://static-na.payments-amazon.com/cba/js/us/PaymentWidgets.js";

$smarty->assign_by_ref('amazon_host', $amazon_host);
$smarty->assign_by_ref('amazon_widget_url', $amazon_widget_url);

if (func_constant('AREA_TYPE') != 'C')
    return;

if (!$amazon_enabled) {
    // Disable module for customer area
    unset($active_modules['Amazon_Checkout']);
    $smarty->assign('active_modules', $active_modules);
    return;
}

// define('ACHECKOUT_DEBUG', 1); // write all logs to xcart/var/log

# define('ACHECKOUT_DEBUG', 'test@email.com'); // send general log
# to the e-mail address 'test@email.com'; note that in this case the logs of received data and of XML code sent to Amazon are not kept or sent.

$acheckout_log_detailed_data = false;
if (defined('ACHECKOUT_DEBUG')) {
    // Logging enabled
    if (ACHECKOUT_DEBUG == 1)
        $acheckout_log_detailed_data = true;

    $acheckout_global_log = '';
    $acheckout_global_xml_log = '';

    register_shutdown_function('func_acheckout_save_log');
}

?>
