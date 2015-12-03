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
 * Product reviews related operations processor
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage Lib
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com>
 * @copyright  Copyright (c) 2001-2012 Qualiteam software Ltd <info@x-cart.com>
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @version    $Id: reviews.php,v 1.36.2.4 2012/03/27 11:18:22 aim Exp $
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

if ( !defined('XCART_SESSION_START') ) { header("Location: ../"); die("Access denied"); }

if (empty($productid))
    return true;

x_load('product');

if ($mode == 'update_reviews') {

    // Update review(s)

    $flag = false;
    if ($reviews) {
        foreach ($reviews as $k => $v) {
            if ($geid && $fields['review'][$k] == 'Y') {
                $old_data = func_query_first("SELECT * FROM $sql_tbl[product_reviews] WHERE review_id='$k'");
                unset($old_data['review_id']);
                $old_data = func_addslashes($old_data);
                while($pid = func_ge_each($geid, 1, $productid)) {
                    db_query("DELETE FROM $sql_tbl[product_reviews] WHERE email='$old_data[email]' AND message='$old_data[message]' AND productid = '$pid'");
                    $v['productid'] = $pid;
                    func_array2insert('product_reviews', $v, true);
                }

                $v['productid'] = $productid;
            }

            func_array2update('product_reviews', $v, "review_id = '$k'");
            $flag = true;
        }
    }

    // Add review

    if (!empty($review_new['message'])) {
        $review_new['productid'] = $productid;
        func_array2insert('product_reviews', $review_new);
        if($geid && $fields['new_review'] == 'Y') {
            while($pid = func_ge_each($geid, 1, $productid)) {
                $review_new['productid'] = $pid;
                db_query("DELETE FROM $sql_tbl[product_reviews] WHERE email='$review_new[email]' AND message='$review_new[message]' AND productid = '$pid'");
                func_array2insert('product_reviews', $review_new);
            }
        }

        $flag = true;
    }

    if ($flag) {
        $top_message['content'] = func_get_langvar_by_name('msg_adm_product_reviews_upd');
        $top_message['type'] = 'I';
    }

    func_refresh('reviews');

}
elseif ($mode == 'review_delete') {

    // Delete review(s)

    if (!empty($rids)) {
        if ($geid && !empty($fields['review'])) {
            foreach ($rids as $id => $tmp) {
                if ($fields['review'][$id] != 'Y')
                    continue;

                $old_data = func_query_first("SELECT * FROM $sql_tbl[product_reviews] WHERE review_id='$id'");
                $old_data = func_addslashes($old_data);
                while($pid = func_ge_each($geid, 1, $productid)) {
                    db_query("DELETE FROM $sql_tbl[product_reviews] WHERE email='$old_data[email]' AND message='$old_data[message]' AND productid = '$pid'");
                }
            }
        }

        db_query ("DELETE FROM $sql_tbl[product_reviews] WHERE review_id IN ('".implode("','", array_keys($rids))."')");

        $top_message['content'] = func_get_langvar_by_name('msg_adm_product_reviews_del');
        $top_message['type'] = 'I';
    }

    func_refresh('reviews');
}

$product_reviews = func_query ("SELECT * FROM $sql_tbl[product_reviews] WHERE productid = '$productid'");

if (!empty($product_reviews)) {
    $smarty->assign ('product_reviews', $product_reviews);
}
?>
