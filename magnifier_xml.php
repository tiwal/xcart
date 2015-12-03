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
 * Show image
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage Customer interface
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com>
 * @copyright  Copyright (c) 2001-2012 Qualiteam software Ltd <info@x-cart.com>
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @version    $Id: magnifier_xml.php,v 1.18.2.4 2012/03/27 11:18:14 aim Exp $
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

define('OFFERS_DONT_SHOW_NEW', 1);
define('BENCH_BLOCK', true);
require './auth.php';

if (empty($active_modules['Magnifier']))
    exit;

if (!empty($imageid)) {
    $productid = func_query_first_cell("SELECT id FROM $sql_tbl[images_Z] WHERE imageid = '$imageid'");
    $select_cond = " imageid = '".$imageid."'";
}
require_once $xcart_dir.'/modules/Magnifier/product_magnifier.php';

if (empty($zoomer_images) || !is_array($zoomer_images)) {
    echo '';
    return;
}

$xmlContent = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?><list>";

foreach ($zoomer_images as $key=>$image) {
    $xmlContent .= "<image ipath=\"".$xcart_web_dir.'/images/Z/'.$productid.'/'.$image['imageid']."/\" />";
}
$xmlContent .= "</list>";

$zoomer_hint = func_get_langvar_by_name('lbl_zoomer_hint_magnifier',NULL,false,true);

if (function_exists('iconv'))
    $_zoomer_hint = iconv($default_charset, "UTF-8", $zoomer_hint);

$zoomer_hint = ($_zoomer_hint === false) ? constant('ZOOMER_HINT_MAGNIFIER') : $_zoomer_hint;

$xmlContent .= "<hints><magnifier hint=\"".$zoomer_hint." \"/></hints>";

echo $xmlContent;
exit;
?>

