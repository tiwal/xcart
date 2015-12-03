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
 * Module configuration
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage Modules
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com>
 * @copyright  Copyright (c) 2001-2012 Qualiteam software Ltd <info@x-cart.com>
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @version    $Id: config.php,v 1.22.2.6 2012/03/27 11:18:39 aim Exp $
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

if ( !defined('XCART_START') ) { header('Location: ../../'); die('Access denied'); }
/**
 * Global definitions for Wholesale Trading module
 */

$css_files['Wholesale_Trading'][] = array();

if (defined('IS_IMPORT')) {
    $modules_import_specification['WHOLESALE_PRICES'] = array(
        'script'        => '/modules/Wholesale_Trading/import.php',
        'permissions'    => 'AP',
        'need_provider'    => true,
        'parent'        => 'PRODUCTS',
        'parent_key_field' => 'productid',
        'export_sql'    => "SELECT productid FROM $sql_tbl[pricing] WHERE (quantity > '1' OR membershipid != '0') GROUP BY productid",
        'table'         => 'pricing',
        'key_field'     => 'productid',
        'orderby'        => 100,
        'finalize'        => true,
        'columns'        => array(
            'productid'        => array(
                'type'        => 'N',
                'is_key'    => true,
                'default'    => 0),
            'productcode'    => array(
                'is_key'    => true),
            'product'        => array(
                'is_key'    => true),
            'variantcode'    => array(
                'is_key'    => true),
            'quantity'        => array(
                'array'        => true,
                'required'    => true,
                'type'        => 'N'),
            'membership'    => array(
                'array'        => true),
            'membershipid'    => array(
                'array'     => true,
                'type'        => 'N',
                'default'    => 0),
            'price'            => array(
                'array'     => true,
                'required'    => true,
                'type'        => 'P')
        )

    );
}
?>
