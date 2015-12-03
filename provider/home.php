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
 * Home page interface
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage Provder interface
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com>
 * @copyright  Copyright (c) 2001-2012 Qualiteam software Ltd <info@x-cart.com>
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @version    $Id: home.php,v 1.46.2.4 2012/03/27 11:18:44 aim Exp $
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

require './auth.php';

if (!empty($active_modules['Simple_Mode'])) {

    func_header_location($current_location . DIR_ADMIN . '/home.php');

}

$location[] = array(func_get_langvar_by_name('lbl_top_info_provider'), '');

/**
 * Assign Smarty variables and show template
 */

x_session_register('show_seller_address_warning');

if (
    func_is_seller_address_empty($logged_userid)
    && $show_seller_address_warning
) {

    $top_message = array(
        'type' => 'W',
        'content' => func_get_langvar_by_name("msg_empty_seller_address")
    );

    $smarty->assign('top_message', $top_message);
    unset($top_message);
    $show_seller_address_warning = false;

}

// Assign the current location line
if (!empty($login)) {

    $smarty->assign('location', $location);

}

if(
    !empty($user_account)
    && $user_account['flag'] == 'RP'
    && !x_session_is_registered('hide_root_warning')
) {

    $smarty->assign('root_warning', func_get_langvar_by_name('msg_root_provider_warning'));

    x_session_register('hide_root_warning');
    x_session_save('hide_root_warning');

}

$smarty->assign('main', '' === $login && $mode != 'profile_created' ? 'authentication' : 'home');

if (
    file_exists($xcart_dir. '/modules/gold_display.php')
    && is_readable($xcart_dir. '/modules/gold_display.php')
) {
    include $xcart_dir. '/modules/gold_display.php';
}

func_display('provider/home.tpl',$smarty);
?>
