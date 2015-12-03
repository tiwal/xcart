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
 * Search addon for Feature comparison module
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage Modules
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com>
 * @copyright  Copyright (c) 2001-2012 Qualiteam software Ltd <info@x-cart.com>
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @version    $Id: search_define.php,v 1.25.2.4 2012/03/27 11:18:30 aim Exp $
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

if (!defined('XCART_SESSION_START')) { header("Location: ../../"); die("Access denied"); }

if ($mode == 'search') {

    // Choosing products be features
    if (!empty($data['choosing']) && $current_area == 'C') {
        foreach ($data['choosing'] as $k => $v) {
            $inner_joins[$k] = array(
                'tblname' => 'product_foptions',
                'on' => "$k.productid = $sql_tbl[products].productid"
            );
            $inner_joins['fo_'.$k] = array(
                'tblname' => 'feature_options',
                'on' => "fo_$k.avail = 'Y'"
            );
            $where[] = "fo_$k.foptionid = $k.foptionid";
            $where[] = "fo_$k.fclassid = $sql_tbl[feature_classes].fclassid";
            $where[] = $v;
        }
        $where[] = "$sql_tbl[product_features].productid IS NOT NULL";
    }

    // Define SQL-query by Feature class ID
    if (!empty($data['fclassid'])) {
        $fields[] = "$sql_tbl[product_features].fclassid";
        $inner_joins['product_features'] = array(
            'on' => "$sql_tbl[product_features].productid = $sql_tbl[products].productid AND $sql_tbl[product_features].fclassid = '$data[fclassid]'"
        );

    } elseif ($current_area == 'C') {
        $fields[] = "$sql_tbl[product_features].fclassid";
        $left_joins['product_features'] = array(
            'on' => "$sql_tbl[product_features].productid = $sql_tbl[products].productid"
        );
        $left_joins['feature_classes'] = array(
            'on' => "$sql_tbl[feature_classes].fclassid = $sql_tbl[product_features].fclassid AND $sql_tbl[feature_classes].avail = 'Y'"
        );

        if (($config['Feature_Comparison']['fcomparison_show_product_list'] == 'Y') && $config['Feature_Comparison']['fcomparison_max_product_list'] > @count((array)$comparison_list_ids)) {
            if (@count((array)$comparison_list_ids) > 0) {
                $fields[] = "IF($sql_tbl[product_features].fclassid IS NULL || $sql_tbl[product_features].productid IN ('".@implode("','",@array_keys((array)$comparison_list_ids))."'),'','Y') as is_clist";
            } else {
                $fields[] = "IF($sql_tbl[product_features].fclassid IS NULL,'','Y') as is_clist";
            }
        }
    }
}
?>
