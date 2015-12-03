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
 * Bestsellers
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage Modules
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com>
 * @copyright  Copyright (c) 2001-2012 Qualiteam software Ltd <info@x-cart.com>
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @version    $Id: bestsellers.php,v 1.49.2.7 2012/03/27 11:18:28 aim Exp $
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

if (!defined('XCART_SESSION_START')) { header("Location: ../../"); die("Access denied"); }

x_load('product');

if (
    !is_numeric($config['Bestsellers']['number_of_bestsellers'])
    || $config['Bestsellers']['number_of_bestsellers'] < 0
) {
    $config['Bestsellers']['number_of_bestsellers'] = 0;
}

/**
 * Get products data for current category and store it into $products array
 */
$cat = isset($cat) ? intval($cat) : 0;

$search_query = '';

$threshold = 0;

if ($cat) {

    $category_data = func_query_first("SELECT categoryid, lpos, rpos, threshold_bestsellers FROM $sql_tbl[categories] USE INDEX (PRIMARY) WHERE categoryid = '$cat'");

    if ($category_data)
        $result = func_query_hash("SELECT categoryid, threshold_bestsellers FROM xcart_categories USE INDEX (pa) WHERE lpos BETWEEN $category_data[lpos] AND $category_data[rpos] AND avail = 'Y'", "categoryid", false, true);
    else
        $result = '';

    $threshold = intval($category_data['threshold_bestsellers']);

    $cat_ids = array();

    if (
        is_array($result)
        && !empty($result)
    ) {

        $cat_ids = array_keys($result);

        foreach ($result as $threshold_bestsellers) {

            if (
                $threshold_bestsellers > 0
                && $threshold > $threshold_bestsellers
            ) {
                $threshold = intval($threshold_bestsellers);
            }

        }

    } else {

        $cat_ids[] = $cat;

    }

    if ($threshold)
        $threshold -= 1;

    $search_query = " AND $sql_tbl[products_categories].categoryid IN ('" . implode("','", $cat_ids) . "')";

    unset($result);
}

if (
    !empty($active_modules['Advanced_Statistics']) 
    && $config['Advanced_Statistics']['use_delayed_stats_update'] == 'Y'
) {
    // Flush all delayed queries to product data table
    func_run_delayed_query('views_stats_products'); 
}

/**
 * Search the bestsellers
 */
$bestsellers = func_search_products(
    $search_query
        . " AND $sql_tbl[products].sales_stats >= '" . $threshold . "'",
    @$user_account['membershipid'],
    "$sql_tbl[products].sales_stats DESC, $sql_tbl[products].views_stats DESC",
    $config['Bestsellers']['number_of_bestsellers']
);

$smarty->assign_by_ref('bestsellers', $bestsellers);

?>
