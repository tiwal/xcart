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
 * Shipping options
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage Admin interface
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com>
 * @copyright  Copyright (c) 2001-2012 Qualiteam software Ltd <info@x-cart.com>
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @version    $Id: shipping_options.php,v 1.77.2.15 2012/03/27 11:18:17 aim Exp $
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

require './auth.php';
require $xcart_dir.'/include/security.php';

x_session_register('saved_user_data');

$location[] = array(func_get_langvar_by_name('lbl_shipping_options'), '');

$carriers = func_get_carriers();

$carrier_valid = false;

foreach ($carriers as $k => $v) {
    if ($v[0] == $carrier) {
        $carrier_valid = true;
        break;
    }
}

$carrier = $carrier_valid ? $carrier : '';

if ($carrier_valid && $REQUEST_METHOD == 'POST') {
/**
 * Update the shipping options
 */
    $topMessage = '';
    $suffix = '';
    $shippingOptions = array();

    if ($carrier == 'FDX') {

    // FEDEX options update

        if (isset($update_options)) {

            // Update the FedEx options
            $carrier_codes = isset($carrier_codes) && !empty($carrier_codes) ? implode('|', $carrier_codes) : '';

            $fedex_options = array(
                'carrier_codes' => $carrier_codes,
                'packaging' => $packaging,
                'dropoff_type' => $dropoff_type,
                'ship_date' => intval($ship_date),
                'dim_length' => sprintf("%.2f", $dim_length),
                'dim_width' => sprintf("%.2f", $dim_width),
                'dim_height' => sprintf("%.2f", $dim_height),
                'max_weight' => abs(doubleval($max_weight)),
                'cod_value' => sprintf("%.2f", $cod_value),
                'cod_type' => $cod_type,
                'alcohol' => (empty($alcohol) ? 'N' : 'Y'),
                'hold_at_location' => (empty($hold_at_location) ? 'N' : 'Y'),
                'dry_ice' => (empty($dry_ice) ? 'N' : 'Y'),
                'nonstandard_container' => (empty($nonstandard_container) ? 'N' : 'Y'),
                'inside_pickup' => (empty($inside_pickup) ? 'N' : 'Y'),
                'inside_delivery' => (empty($inside_delivery) ? 'N' : 'Y'),
                'saturday_pickup' => (empty($saturday_pickup) ? 'N' : 'Y'),
                'saturday_delivery' => (empty($saturday_delivery) ? 'N' : 'Y'),
                'residential_delivery' => (empty($residential_delivery) ? 'N' : 'Y'),
                'dg_accessibility' => $dg_accessibility,
                'signature' => $signature,
                'handling_charges_amount' => sprintf("%.2f", $handling_charges_amount),
                'handling_charges_type' => $handling_charges_type,
                'currency_code' => $currency_code,
                'param01' => @$param01,
                'param02' => @$param02,
                'add_smartpost_detail' => @$add_smartpost_detail,
                'smartpost_indicia' => $smartpost_indicia,
                'smartpost_ancillaryendorsement' => $smartpost_ancillaryendorsement,
                'smartpost_hubid' => $smartpost_hubid,
                'send_insured_value' => @$send_insured_value,
            );

            $shippingOptions['param00'] = addslashes(serialize($fedex_options));

        }

    } elseif ($carrier == 'USPS') {

    // USPS options update

        $dim = abs(doubleval($dim_length)) . ':' . abs(doubleval($dim_width)) . ':' . abs(doubleval($dim_height)) . ':' . abs(doubleval($dim_girth));

        if ($value_of_content_type == 'fixed_value')
            $value_of_content_type = abs(round($value_of_content_fixed, 2));

        settype($use_maximum_dimensions, 'string');
        settype($status_new_method, 'string');
        settype($param11, 'string');
        $shippingOptions = array(
            'param00' => $mailtype,
            'param01' => $status_new_method,
            'param02' => $machinable,
            'param03' => $container_express,
            'param04' => $container_priority,
            'param05' => $firstclassmailtype,
            'param06' => $dim,//common
            'param07' => $value_of_content_type,
            'param08' => abs(doubleval($max_weight)),//common
            'param09' => ('Y' !== $use_maximum_dimensions) ? 'N' : $use_maximum_dimensions,//common
            'param10' => $container_intl,
            'param11' => empty($param11) ? 'N' : $param11,//common
        );

    } elseif ($carrier == 'Intershipper') {

    // INTERSHIPPER options update

        $shippingOptions = array(
            'param00' => $delivery,
            'param01' => $shipmethod,
            'param02' => abs(doubleval($length)),
            'param03' => abs(doubleval($width)),
            'param04' => abs(doubleval($height)),
            'param05' => is_array($options) ? implode('|', $options) : '',
            'param06' => $packaging,
            'param07' => $contents,
            'param08' => abs(doubleval($codvalue)),
            'param09' => abs(doubleval($weight)),
            'param10' => ('Y' !== $use_maximum_dimensions) ? 'N' : $use_maximum_dimensions,
        );

    } elseif ($carrier == 'CPC') {

    // Canada Post options update

        $shippingOptions = array(
            'param00' => $descr,
            'param01' => abs(doubleval($length)),
            'param02' => abs(doubleval($width)),
            'param03' => abs(doubleval($height)),
            'param04' => $insvalue,
            'param06' => abs(doubleval($weight)),
            'param07' => ('Y' !== $use_maximum_dimensions) ? 'N' : $use_maximum_dimensions,
        );

    } elseif ($carrier == 'ARB') {

    // Airborne ShipIt options update

        $shippingOptions = array(
            'param00' => $param00,
            'param01' => intval($param01),
            'param02' => intval($param02),
            'param03' => intval($param03),
            'param04' => intval($param04),
            'param05' => (intval($param06) < 1) ? 'NR' : $param05,
            'param06' => intval($param06),
            'param07' => $opt_haz . ',' . $opt_own_account,
            'param08' => !in_array($param08, array('M', 'P')) ? 'M' : $param08,
            'param09' => intval($param09),
            'param10' => abs(doubleval($param10)),
            'param11' => isset($param11) ? $param11 : 'N',
        );

    } elseif ($carrier == 'APOST') {

    // Australia Post options update

        $shippingOptions = array(
            'param00' => abs(doubleval($param00)),
            'param01' => abs(doubleval($param01)),
            'param02' => abs(doubleval($param02)),
            'param03' => isset($param03) ? $param03 : 'N',
            'param04' => abs(doubleval($param04)),
            'param05' => isset($param05) ? $param05 : 'N',
        );

    }

    if (!empty($shippingOptions)) {

        $shippingOptions['currency_rate'] = isset($currency_rate) ? abs(doubleval($currency_rate)) : 1;
        $shippingOptions['carrier'] = $carrier;

        func_array2insert(
            'shipping_options',
            $shippingOptions,
            true
        );

    }

    $top_message['content'] = empty($topMessage)
        ? func_get_langvar_by_name('msg_adm_shipping_option_upd')
        : $topMessage;

    func_header_location('shipping_options.php?carrier=' . $carrier . $suffix);

} // /if ($REQUEST_METHOD == 'POST')

/**
 * Collect options for current carrier
 */
$shipping_options = array ();

$shipping_options [strtolower($carrier)] = func_query_first("SELECT * FROM $sql_tbl[shipping_options] WHERE carrier='$carrier'");

if ($carrier == 'FDX') {

    // Prepare FedEx (API) information
    if (!empty($error))
        $smarty->assign('fill_error', 'Y');

        $prepared_user_data = $saved_user_data;

    if (empty($prepared_user_data)) {
        $prepared_user_data = array();
        $prepared_user_data['person_name'] = $user_account['firstname'] . ' ' . $user_account['lastname'];
        $prepared_user_data['company_name'] = $config['Company']['company_name'];
        $prepared_user_data['phone_number'] = preg_replace("/[^\d]/", "", $config['Company']['company_phone']);
        $prepared_user_data['email'] = $config['Company']['site_administrator'];
        $prepared_user_data['address_1'] = $config['Company']['location_address'];
        $prepared_user_data['city'] = $config['Company']['location_city'];
        $prepared_user_data['state'] = $config['Company']['location_state'];
        $prepared_user_data['zipcode'] = $config['Company']['location_zipcode'];
        $prepared_user_data['country'] = $config['Company']['location_country'];
    }

    $smarty->assign('prepared_user_data', $prepared_user_data);

    include_once $xcart_dir.'/include/countries.php';
    include_once $xcart_dir.'/include/states.php';

    $fedex_options = $shipping_options['fdx']['param00'];
    $shipping_options['fdx'] = @unserialize($fedex_options);
}
#####################################

if ($carrier == 'Intershipper') {
/**
 * Get the shipping options for Intershipper service
 */
    $options = explode('|',$shipping_options["intershipper"]["param05"]);
    foreach($options as $option) {
        $shipping_options['intershipper']['options'][$option] = 'Y';
    }

    $smarty->assign('max_intershipper_weight', round(150 * 453.6 / $config['General']['weight_symbol_grams'], 4));
}

if ($carrier == 'CPC') {
    $smarty->assign('max_cpc_weight', round(30 * 1000 / $config['General']['weight_symbol_grams'], 4));
}

if ($carrier == 'ARB') {
    $_data = explode(',',$shipping_options["arb"]["param07"]);
    $shipping_options['arb']['opt_haz'] = @$_data[0];
    $shipping_options['arb']['opt_own_account'] = @$_data[1];
    $smarty->assign('max_arb_weight', round(149 * 453.6 / $config['General']['weight_symbol_grams'], 4));
}

if ($carrier == 'USPS') {
    $_dim = explode(':', $shipping_options["usps"]["param06"]);

    if (func_array_empty($_dim))
        $_dim = array_fill(0, 4, 0);

    $shipping_options['usps']['dim_length'] = $_dim[0];
    $shipping_options['usps']['dim_width'] = $_dim[1];
    $shipping_options['usps']['dim_height'] = $_dim[2];
    $shipping_options['usps']['dim_girth'] = $_dim[3];

    if (is_numeric($shipping_options["usps"]["param07"]))
        $shipping_options['usps']['fixed_value'] = 'Y';
}

if ($carrier == 'FDX') {
    if (!empty($shipping_options['fdx']['carrier_codes'])) {
        $ccodes = explode('|', $shipping_options["fdx"]["carrier_codes"]);
        $shipping_options['fdx']['carrier_codes'] = array();
        foreach ($ccodes as $code) {
            $shipping_options['fdx']['carrier_codes'][$code] = 1;
        }
    }
}

$smarty->assign('carriers', $carriers);
$smarty->assign('carrier', $carrier);

$smarty->assign ('shipping_options', $shipping_options);

$smarty->assign('main','shipping_options');

// Assign the current location line
$smarty->assign('location', $location);

include './shipping_tools.php';

// Assign the section navigation data
$smarty->assign('dialog_tools_data', $dialog_tools_data);

if (
    file_exists($xcart_dir.'/modules/gold_display.php')
    && is_readable($xcart_dir.'/modules/gold_display.php')
) {
    include $xcart_dir.'/modules/gold_display.php';
}
func_display('admin/home.tpl',$smarty);
?>
