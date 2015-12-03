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
 * Build fancy categories tree for the storefront menu
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage Modules
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com>
 * @copyright  Copyright (c) 2001-2012 Qualiteam software Ltd <info@x-cart.com>
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @version    $Id: fancy_categories.php,v 1.18.2.5 2012/03/27 11:18:30 aim Exp $
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

if ( !defined('XCART_START') ) { header("Location: ../../"); die("Access denied"); }

// Build categories tree
$catexp_path = array();
if (
    !empty($cat)
    && $config['Flyout_Menus']['fancy_categories_skin'] == 'Icons'
    && $config['Flyout_Menus']['icons_mode'] == 'C'
) {
    $catexp_path = func_get_category_path($cat, 'categoryid');
    $smarty->assign('catexp', $cat);
}

$_use_cache = func_fc_use_cache();

if ($_use_cache && !func_fc_has_cache()) {
    func_fc_build_categories(
        0, 
        array(intval($user_account['membershipid'])), 
        array($shop_language), 
        false
    );
}

$fancy_use_cache = $_use_cache && func_fc_has_cache();

if (!$fancy_use_cache) {
    $categories = func_fc_prepare_categories($categories, $catexp_path);
}

$smarty->assign('fancy_use_cache', $fancy_use_cache);

$css_files['Flyout_Menus'] = array(
    array('subpath' => $config['Flyout_Menus']['fancy_categories_skin'] . '/'),
);

if (
    isset($config[$fancy_prefix . 'css_files'])
    && !empty($config[$fancy_prefix . 'css_files'])
) {

    $tmp = unserialize($config[$fancy_prefix . 'css_files']);

    if (is_array($tmp)) {
        foreach ($tmp as $k => $v) {
            list($browser, $version) = @explode(':', $v, 2);

            $css_files['Flyout_Menus'][] = array(
                'subpath' => $config["Flyout_Menus"]["fancy_categories_skin"] . '/',
                'suffix'  => $k,
                'browser' => $browser,
                'version' => $version,
            );
        }
    }
}

?>
