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
 * Functions for block getter
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage Lib
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com>
 * @copyright  Copyright (c) 2001-2012 Qualiteam software Ltd <info@x-cart.com>
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @version    $Id: func.ajax.php,v 1.36.2.15 2012/03/27 11:18:23 aim Exp $
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

if ( !defined('XCART_START') ) { header("Location: ../"); die("Access denied"); }

/**
 * Get Buy Now product block for product list template
 */
function func_ajax_block_buy_now()
{
    global $productid, $user_account, $smarty, $cart, $sql_tbl, $xcart_dir;
    global $search_data, $REQUEST_METHOD, $mode, $current_area, $active_modules, $variant_properties;
    global $single_mode, $shop_language, $logged_userid, $login, $login_type;
    global $store_objects_per_page;
    global $config;

    if (!isset($productid))
        return 1;

    $productid = intval($productid);
    if ($productid < 1)
        return 2;

    x_load('product');

    x_session_register('cart');

    $old_search_data = $search_data['products'];
    $old_request_method = $REQUEST_METHOD;
    $old_mode = $mode;
    $_inner_search = true;

    $search_data['products'] = array(
        'productid' => $productid,
        'forsale' => 'Y'
    );

    if (
        !empty($active_modules['Special_Offers'])
        && isset($_POST['is_free_product'])
        && $_POST['is_free_product'] == 'Y'
    ) {
        $search_data['products']['show_special_prices'] = true;
    }

    $REQUEST_METHOD = 'GET';
    $mode = 'search';

    include $xcart_dir . '/include/search.php';

    $search_data['products'] = $old_search_data;
    $REQUEST_METHOD = $old_request_method;
    $mode = $old_mode;

    unset($old_search_data, $old_request_method, $old_mode);

    if (!is_array($products) || count($products) < 1)
        return 3;

    $product = array_shift($products);

    unset($products);

    $smarty->assign('featured', $_POST['is_featured_product']);
    $smarty->assign('product', $product);
    $smarty->assign('is_matrix_view', isset($_POST['type']) && $_POST['type'] == 'matrix');

    return func_ajax_trim_div(func_display('customer/main/buy_now.tpl', $smarty, false));
}

/**
 * Get latest X-Cart news for admin dashboard
 */


/**
 * Get Minicart block
 */
function func_ajax_block_minicart()
{
    global $cart, $user_account, $smarty, $config, $login, $logged_userid, $sql_tbl, $xcart_dir;

    x_session_register('cart');

    x_load('cart');

    $products = func_products_in_cart($cart, (!empty($user_account['membershipid']) ? $user_account['membershipid'] : ''));
    if (!is_array($products))
        $products = array();

    $giftcerts = (!empty($cart['giftcerts']) ? $cart['giftcerts'] : array());

    if (!$products && !$giftcerts)
        return 1;

    $list_length = count($products) + count($giftcerts);
    $config['Appearance']['minicart_length'] = max(1, intval($config['Appearance']['minicart_length']));

    if ($list_length > $config['Appearance']['minicart_length']) {
        if (count($products) > $config['Appearance']['minicart_length']) {
            $products = array_slice($products, 0, $config['Appearance']['minicart_length']);
            $giftcerts = array();

        } else {

            if (defined('X_PHP5x_COMPAT')) {
                $giftcerts = array_slice($giftcerts, 0, $config['Appearance']['minicart_length'] - count($products), true);
            } else {
                // PHP5.0.2  The optional preserve_keys parameter was added.
                require_once $xcart_dir . '/include/lib/PEAR/Compat/Function/array_slice.php';
                $giftcerts = php_compat_array_slice($giftcerts, 0, $config['Appearance']['minicart_length'] - count($products), true);
            }

        }

        $list_length = count($products) + count($giftcerts);
        $smarty->assign('cart_not_full', true);
    }

    if ($products)
        $smarty->assign('products', $products);

    if ($giftcerts)
        $smarty->assign('giftcerts', $giftcerts);

    $smarty->assign('list_length', $list_length);

    x_load('tests');
    if (test_active_bouncer() && ($config['General']['enable_anonymous_checkout'] == 'Y' || !empty($login))) {
        $paypal_express_active = func_cart_get_paypal_express_id();
        $smarty->assign('paypal_express_active', $paypal_express_active);
    }

    return func_ajax_trim_div(func_display('customer/minicart.tpl', $smarty, false));
}

/**
 * Get Minicart total block
 */
function func_ajax_block_minicart_total()
{
    global $cart, $user_account, $smarty;

    x_session_register('cart');

    $total_cost = 0;
    $total_items = 0;

    if (!empty($cart)) {

        x_load('cart');
        // Assign total cost
        if (!func_cart_is_zero_total_cost($cart)) {
            $total_cost = $cart['display_subtotal'];
        }

        // Sum up products items
        if (
            !empty($cart['products'])
            && is_array($cart['products'])
        ) {
            foreach ($cart['products'] as $p) {
                if (
                    !isset($p['hidden'])
                    || empty($p['hidden'])
                ) {
                    $total_items += $p['amount'];
                }
            }
        }

        // Sum up giftcerts items
        if (
            !empty($cart['giftcerts'])
            && is_array($cart['giftcerts'])
        ) {
            foreach ($cart['giftcerts'] as $g) {
                $total_items += $p['amount'];
            }
        }

    }

    $smarty->assign('minicart_total_cost',  $total_cost);
    $smarty->assign('minicart_total_items', $total_items);
    $smarty->assign('minicart_total_standalone', true);

    return func_ajax_trim_div(func_display('customer/minicart_total.tpl', $smarty, false));
}

/**
 * Get minicart links
 *
 * @return void
 * @see    ____func_see____
 */
function func_ajax_block_minicart_links()
{
    global $cart, $smarty, $active_modules;

    x_session_register('cart');

    $total_items = 0;

    if (!empty($cart)) {

        if (!empty($cart['products']) && is_array($cart['products']))
            $total_items += count($cart['products']);

        if (!empty($cart['giftcerts']) && is_array($cart['giftcerts']))
            $total_items += count($cart['giftcerts']);
    }

    $smarty->assign('minicart_total_items', $total_items);
    $smarty->assign('active_modules', $active_modules);

    return func_ajax_trim_div(func_display('customer/cart_checkout_links.tpl', $smarty, false));
}

/**
 * Get Product Details block for product details template
 */
function func_ajax_block_product_details()
{
    global $productid, $smarty, $sql_tbl, $user_account, $config, $cart, $pconf, $current_area, $active_modules, $xcart_dir, $options, $wishlistid, $login, $logged_userid, $current_area, $single_mode, $slot, $configurations, $shop_language;

    if (!isset($productid))
        return 1;

    $productid = intval($productid);
    if ($productid < 1)
        return 2;

    if (!defined('OFFERS_DONT_SHOW_NEW'))
        define('OFFERS_DONT_SHOW_NEW', 1);

    x_load('product', 'templater');

    $product_info = func_select_product($productid, @$user_account['membershipid'], true, false, false, false);
    if (empty($product_info['productid']))
        return 3;

    $product_info['appearance'] = func_get_appearance_data($product_info);

    if (!empty($active_modules['Gift_Registry']))
        include $xcart_dir.'/modules/Gift_Registry/customer_wlproduct.php';

    if (!empty($active_modules['Product_Options'])) {
        include $xcart_dir.'/modules/Product_Options/customer_options.php';

        if (!empty($variants) && !empty($product_options)) {

            $default = array();

            foreach ($product_options as $k => $v) {

                if ($v['is_modifier'] == '' && $v['options']) {

                    foreach ($v['options'] as $oid => $o) {

                        if (
                            isset($o['selected'])
                            && $o['selected'] == 'Y'
                        ) {
                            $default[$k] = $oid;
                        }

                    }

                }

            }

            if ($default) {

                $vid = func_query_first_cell("SELECT variantid, COUNT(optionid) as cnt FROM $sql_tbl[variant_items] WHERE optionid IN ('" . implode("','", $default) . "') GROUP BY variantid ORDER BY cnt DESC");

                if ($vid) {
                    $variant = func_query_first("SELECT * FROM $sql_tbl[variants] WHERE variantid = '$vid'");

                    if ($variant) {
                        $product_info['avail'] = $variant['avail'];

                        if ($cart['products']) {
                            foreach ($cart['products'] as $p) {
                                if ($p['productid'] == $productid && $p['variantid'] == $vid)
                                    $product_info['avail'] -= $p['amount'];
                            }
                        }
                    }
                }
            }
        }
    }

    if ($product_info['product_type'] != 'C') {

        // If this product is not configurable

        if ($config['General']['show_outofstock_products'] != 'Y' && empty($product_info['distribution'])) {
            $is_avail = true;
            if ($product_info['avail'] <= 0 && empty($variants)) {
                $is_avail = false;

            } elseif(!empty($variants)) {
                $is_avail = false;
                foreach($variants as $v) {
                    if ($v['avail'] > 0) {
                        $is_avail = true;
                        break;
                    }
                }
            }

            if (!empty($cart['products']) && !$is_avail) {
                foreach($cart['products'] as $v) {
                    if($product_info['productid'] == $v['productid']) {
                        $is_avail = true;
                        break;
                    }
                }
            }

            if (!$is_avail)
                return 4;
        }

        if (!empty($active_modules['Extra_Fields'])) {

            $extra_fields_provider = $product_info['provider'];

            include $xcart_dir . '/modules/Extra_Fields/extra_fields.php';

        }

        if (!empty($active_modules['Feature_Comparison']))
            include $xcart_dir.'/modules/Feature_Comparison/product.php';

        if (!empty($active_modules['Wholesale_Trading']) && empty($product_info['variantid']))
            include $xcart_dir.'/modules/Wholesale_Trading/product.php';

        if (!empty($active_modules['Product_Configurator']) && !empty($pconf) && !empty($slot)) {
            $_GET['pconf'] = $pconf;
            $_GET['slot'] = $slot;
            include $xcart_dir.'/modules/Product_Configurator/slot_product.php';
        }

    }

    if (!empty($active_modules['Special_Offers']))
        include $xcart_dir . '/modules/Special_Offers/product_offers.php';

    $smarty->assign('product', $product_info);

    return func_display('customer/main/product_details.tpl', $smarty, false);
}

/**
 * Load paid xcart_modules in AJAX block on the admin/modules.php
 */
function func_ajax_block_xcart_paid_modules()
{
    global $smarty;

    x_load('backoffice');
    $paid_modules = func_get_xcart_paid_modules();
    if (!empty($paid_modules)) {
        $index = mt_rand(0, count($paid_modules)-1);
        $paid_modules = array($paid_modules[$index]);
    }

    $smarty->assign_by_ref('paid_modules', $paid_modules);

    $res = func_display('admin/main/xcart_paid_modules.tpl', $smarty, false);
    return $res;
}

function func_ajax_block_provider_commission_data($orderid, $userid)
{
    global $sql_tbl, $xcart_dir, $smarty;

    require_once $xcart_dir . '/include/templater/plugins/function.currency.php';

    $data = func_query("SELECT $sql_tbl[order_details].product, $sql_tbl[provider_product_commissions].product_commission, $sql_tbl[order_details].itemid FROM $sql_tbl[provider_product_commissions] INNER JOIN $sql_tbl[order_details] USING(orderid,itemid) WHERE $sql_tbl[order_details].provider='$userid' AND $sql_tbl[order_details].orderid='$orderid'");

    $str = '';

    if (!empty($data)) {
        $str .= '<table>';
        foreach($data as $v) {
            $price = smarty_function_currency( array( 'value' => $v['product_commission']), $smarty);
            $str .= '<tr><td>' . htmlspecialchars($v['product']) . '</td><td><b>' . $price . '</b></td></tr>';
        }
        $str .= '</table>';
    }

    return $str;
}

/**
 * Ajax informational functions
 */

/**
 * Return true/false in the JSON format
 */
function func_ajax_info_is_cart_empty()
{
   global $cart;

   return func_is_cart_empty($cart) ? '1' : '0';
}

/*
    Service functions
*/

/**
 * Remove block box
 */
function func_ajax_trim_div($data)
{

    return preg_replace(array('/^<[\w\d]+.*>/USs', '/<\/[\w\d]+>$/Ss'), array('', ''), $data);
}

?>
