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
 * Comparison products list
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage Modules
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com>
 * @copyright  Copyright (c) 2001-2012 Qualiteam software Ltd <info@x-cart.com>
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @version    $Id: comparison_products.php,v 1.19.2.6.2.1 2012/04/06 13:01:29 aim Exp $
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

if (!defined('XCART_SESSION_START')) { header("Location: ../../"); die("Access denied"); }

if ($config['Feature_Comparison']['fcomparison_show_product_list'] == 'Y') {

    if (
        is_array($comparison_list_ids)
        && count($comparison_list_ids) > 0
    ) {

        $tmp = func_query("SELECT $sql_tbl[products_lng_current].productid, $sql_tbl[feature_classes].fclassid, $sql_tbl[products_lng_current].product, IF($sql_tbl[feature_classes_lng].class IS NOT NULL, $sql_tbl[feature_classes_lng].class, $sql_tbl[feature_classes].class) as class FROM $sql_tbl[products_lng_current], $sql_tbl[product_features], $sql_tbl[feature_classes] LEFT JOIN $sql_tbl[feature_classes_lng] ON $sql_tbl[feature_classes].fclassid = $sql_tbl[feature_classes_lng].fclassid AND $sql_tbl[feature_classes_lng].code = '$shop_language' WHERE $sql_tbl[products_lng_current].productid = $sql_tbl[product_features].productid AND $sql_tbl[product_features].fclassid = $sql_tbl[feature_classes].fclassid AND $sql_tbl[products_lng_current].productid IN ('".implode("','", array_keys($comparison_list_ids))."')");

        if (!empty($tmp)) {

            $comparison_products = array();

            foreach($tmp as $k => $v) {

                if (!isset($comparison_products[$v['fclassid']])) {
                    $comparison_products[$v['fclassid']] = array(
                        'class' => $v['class'],
                    );
                }

                $comparison_products[$v['fclassid']]['products'][] = $v;
            }

            $comparison_products_cnt = intval(count($tmp));

            $smarty->assign('comparison_products',         $comparison_products);
            $smarty->assign('comparison_products_cnt',     $comparison_products_cnt);

            if($config['Feature_Comparison']['fcomparison_max_product_list'] > $comparison_products_cnt) {

                $is_comparison_list = true;

            }

        }

    } else {

        $is_comparison_list = true;

    }

}

if ($is_comparison_list) {

    $smarty->assign('is_comparison_list', 'Y');

}

?>
