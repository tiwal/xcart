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
 * Includes common scripts for specified area
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage Lib
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com>
 * @copyright  Copyright (c) 2001-2012 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @version    $Id: common.php,v 1.9.2.6 2012/03/27 11:18:19 aim Exp $
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

if ( !defined('XCART_SESSION_START') ) { header('Location: ../'); die('Access denied'); }

if (!isset($current_area)) {

    return;

}

switch ($current_area) {

    case 'C':

        x_load('category');

        // Build categories tree for the Flyout menus module

        if (
            empty($active_modules['Flyout_Menus'])
            || !func_fc_use_cache()
            || !func_fc_has_cache()
            || strpos($config['alt_skin'], 'artistictunes') !== false //Display Horizontal menu categories, when cache is used
        ) {

            if (
                !isset($cat)
                || $config['General']['root_categories'] == 'Y'
            ) {

                $categories = func_get_categories_list(0, false);

            } else {

                $categories = func_get_categories_list($cat, false);
        
            }
        }

        if (!empty($active_modules['Flyout_Menus'])) {

            include $xcart_dir . '/modules/Flyout_Menus/fancy_categories.php';

        }

        // Get categories menu data
        if (!empty($categories)) {
            $smarty->assign('categories_menu_list', $categories);
        }

        if (!empty($active_modules['Manufacturers'])) {

            include $xcart_dir . '/modules/Manufacturers/customer_manufacturers.php';

        }

        if (!empty($active_modules['Bestsellers'])) {

            include $xcart_dir . '/modules/Bestsellers/bestsellers.php';

        }

        break;

    case 'A':
        break;

    case 'P':
        break;

    case 'B':
        break;
}

?>
