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

// $Id: navigation.php,v 1.40.2.3 2012/03/27 10:11:35 aim Exp $

if ( !defined('XCART_SESSION_START') ) { header("Location: ../"); die("Access denied"); }

global $total_nav_pages, $total_items, $objects_per_page;

$objects_per_page = intval($objects_per_page);

if ($objects_per_page < 1)
    $objects_per_page = 10;

if (!isset($page)) $page = 0;

$max_nav_pages = max(intval($config['Appearance']['max_nav_pages']), 1);
$total_nav_pages = max(($total_nav_pages ? $total_nav_pages : ceil($total_items / $objects_per_page)+1), 2);
$page = min(max(intval($page), 1), $total_nav_pages-1);
$first_page = $objects_per_page * ($page - 1);

$start_page = max(ceil($page - ($max_nav_pages / 2)), 1);
$total_super_pages = (0 == $total_items % $objects_per_page)
    ? $total_items / $objects_per_page
    : floor($total_items / $objects_per_page) + 1;

$total_pages = min($start_page + min($max_nav_pages, $total_super_pages), $total_super_pages+1);

if ($total_pages - $start_page < $max_nav_pages)
    $start_page = $max_nav_pages >= $total_pages ? 1 : $total_pages - $max_nav_pages;

if ($page > 1)
    $smarty->assign('navigation_arrow_left', $page - 1);

if ($page < $total_super_pages)
    $smarty->assign('navigation_arrow_right', $page + 1);

$smarty->assign('navigation_max_pages', $max_nav_pages);

$smarty->assign('navigation_page', $page);
$smarty->assign('total_pages', $total_pages);
$smarty->assign('start_page', $start_page);
$smarty->assign('total_super_pages', $total_super_pages);
?>
