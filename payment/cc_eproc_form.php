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
 * "eProcessing Network - Database Engine" payment module (credit card processor)
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage Payment interface
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com>
 * @copyright  Copyright (c) 2001-2012 Qualiteam software Ltd <info@x-cart.com>
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @version    $Id: cc_eproc_form.php,v 1.13.2.5.2.1 2012/04/18 08:40:23 aim Exp $
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

if (!isset($REQUEST_METHOD)) {
    $REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
}

if ($REQUEST_METHOD == 'POST' && !empty($_POST['ID'])) {

    require './auth.php';

    $bill_output['sessid'] = func_query_first_cell("SELECT sessid FROM $sql_tbl[cc_pp3_data] where ref = '".$ID."'");
    $bill_output['billmes'] = $auth_response;
    $bill_output['avsmes'] = $avs_response;
    $bill_output['cvvmes'] = $cvv2_response;

    if ($approved == 'Y' && !empty($transid)) {
        $bill_output['code'] = 1;
        $bill_output['billmes'] .= "; Transaction ID: ".$transid;
        $bill_output['billmes'] .= "; Inv.: ".$inv;
    } else {
        $bill_output['code'] = 2;
    }

    require $xcart_dir.'/payment/payment_ccend.php';

} else {

    if (!defined('XCART_START')) { header("Location: ../"); die("Access denied"); }

    $eproc_url = "https://www.eProcessingNetwork.com/cgi-bin/dbe/order.pl";
    $ordr = $module_params['param02'].join("-", $secure_oid);
    $return_url = $current_location.'/payment/'.$module_params['processor'];
    $logo_url = $current_location.$smarty_skin_dir.'/images/xlogo.gif';

    if (!$duplicate) {
        db_query("REPLACE INTO $sql_tbl[cc_pp3_data] (ref,sessid) VALUES ('".addslashes($ordr)."','".$XCARTSESSID."')");
    }

    $post = array(
        'ePNAccount'        => $module_params['param01'],
        'Total'                => $cart['total_cost'],
        'FirstName'            => $userinfo['firstname'],
        'LastName'            => $userinfo['lastname'],
        'Address'            => $userinfo['b_address'],
        'Zip'                => $userinfo['b_zipcode'],
        'EMail'                => $userinfo['email'],
        'ID'                => $ordr,
        'ReturnApprovedURL'    => $return_url,
        'ReturnDeclinedURL'    => $return_url,
        'LogoURL'            => $logo_url,
    );

    func_create_payment_form($eproc_url, $post, 'eProcessingNetwork');

    exit();

}

?>
