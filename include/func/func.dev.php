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
 * X-Cart test functions
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage Lib
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com>
 * @copyright  Copyright (c) 2001-2012 Qualiteam software Ltd <info@x-cart.com>
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @version    $Id: func.dev.php,v 1.1.2.6.2.1 2012/04/18 08:00:38 aim Exp $
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

if ( !defined('XCART_START') ) { header("Location: ../"); die("Access denied"); }

/**
 * Function to test func_get_builtin_modules function bt#0116777
 */
function test_func_get_builtin_modules()
{
    global $sql_tbl;

    $current = func_query_column("SELECT module_name FROM $sql_tbl[modules] WHERE module_name NOT IN ('Demo','Simple_Mode') ORDER BY module_name");

    return $current;
}

/*
 Function to test func_category_is_in_subcat_tree
*/
function test_func_category_is_in_subcat_tree(){
    global $shop_language, $user_account;
    x_load('category');

    $all_categories = func_data_cache_get("get_categories_tree", array(0, false, $shop_language, $user_account['membershipid']));
    
    $result = array();
    foreach ($all_categories as $k=>$v) {
        foreach ($all_categories as $k2=>$v2) {
            if (!func_category_is_in_subcat_tree($v, $v2)) {
                $result[] = "'" . $v['category_path'] . '\' can be moved to \'' . $v2['category_path'] . "'";
            }
        }
    }

    return $result;
}

/*
 Test func_taxcloud_get_cached_response and func_taxcloud_get_cached_response functions
*/
function test_func_taxcloud_get_cached_response() {
    global $sql_tbl, $xcart_dir;
    global $taxcloud_module_dir;


    if (!isset($sql_tbl['taxcloud_cache'])) {
        $include_func = true;
        require_once $xcart_dir . "/modules/TaxCloud/config.php";
    }        


    for ($x = 0; $x < 10; $x++)
        func_taxcloud_save_response_in_cache("key$x",(object)"value$x");

    $res = array();
    for ($x = 0; $x < 10; $x++)
        $res[] = func_taxcloud_get_cached_response("key$x");

    return $res;

}


?>
