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
 * Profile update / registration interface
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage Provder interface
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com>
 * @copyright  Copyright (c) 2001-2012 Qualiteam software Ltd <info@x-cart.com>
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @version    $Id: register.php,v 1.62.2.6 2012/03/27 11:18:44 aim Exp $
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

require './auth.php';

if (
    !in_array($mode, array('update', 'delete', 'notdelete')) 
    && $config['General']['provider_register'] != 'Y'
) {
    func_403(47);
}

if (!empty($login)) {
    include $xcart_dir . '/include/security.php';
}

$newbie = 'Y';

if (
    !empty($submode) 
    && $single_mode 
    && $submode == 'seller_address'
) {
    func_header_location('register.php?mode=update');
}

if (
    func_is_seller_address_empty($logged_userid)
    && empty($submode)
    && $REQUEST_METHOD == 'GET'
) {
    $top_message = array(
        'type' => 'W',
        'content' => func_get_langvar_by_name("msg_empty_seller_address")
    );
    $smarty->assign('top_message', $top_message);
    unset($top_message);
}

/**
 * Update seller address
 */
if (
    $REQUEST_METHOD == 'POST' 
    && isset($_POST['submode']) 
    && $_POST['submode'] == 'seller_address'
) {

    if ($config['Shipping']['allow_change_seller_address'] != 'Y') {
        func_header_location("register.php?mode=update&submode=seller_address");
    }

    require $xcart_dir.'/include/safe_mode.php';

    x_load('user');

    $_fields = array('address', 'address_2', 'city', 'state', 'country', 'zipcode');

    if (func_query_first_cell("SELECT active FROM $sql_tbl[shipping] WHERE active='Y' AND code='ARB'") == 'Y') {
        $_fields = func_array_merge($_fields, array('arb_id', 'arb_password', 'arb_account', 'arb_shipping_key', 'arb_shipping_key_intl'));
    }

    $saved_data = $posted_data = array();
    $posted_data['userid'] = $logged_userid;

    foreach($_fields as $_field)
        if (isset($_field)) {
            $posted_data[$_field] = $_POST[$_field];
            $saved_data['seller_'.$_field] = $posted_data[$_field];
        }

    $top_message = array();

    if (func_update_seller_address($posted_data)) {

        $top_message['content'] = func_get_langvar_by_name("msg_seller_address_upd");

    } else {

        x_session_register('profile_modified_data');

        $profile_modified_data[$logged_userid] = $saved_data;

        $top_message['content'] = func_get_langvar_by_name("msg_err_profile_upd");
        $top_message['type'] = 'E';
        $top_message['reg_error'] = 'Y';
    }

    func_header_location("register.php?mode=update&submode=seller_address");

}

/**
 * Where to forward <form action
 */
$_path = $config['Security']['use_https_login'] == 'Y' ? $xcart_catalogs_secure['provider'] . '/' : '';

$smarty->assign('register_script_name', $_path . 'register.php');

$display_antibot = empty($login);

if (empty($mode) && !empty($login)) {
    $mode = 'update';
}

require $xcart_dir . '/include/register.php';

$smarty->assign('newbie', $newbie);

// Assign the current location line
$smarty->assign('location', $location);

if (
    file_exists($xcart_dir.'/modules/gold_display.php')
    && is_readable($xcart_dir.'/modules/gold_display.php')
) {
    include $xcart_dir.'/modules/gold_display.php';
}
func_display('provider/home.tpl',$smarty);
?>
