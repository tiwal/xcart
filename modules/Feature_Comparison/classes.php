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
 * Manage product features classes
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage Modules
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com>
 * @copyright  Copyright (c) 2001-2012 Qualiteam software Ltd <info@x-cart.com>
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @version    $Id: classes.php,v 1.54.2.11 2012/03/27 11:18:30 aim Exp $
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

if (!defined('XCART_SESSION_START')) { header("Location: ../../"); die("Access denied"); }

x_load('backoffice','image');

if(empty($fclassid)) {
    $location[] = array(func_get_langvar_by_name('lbl_product_feature_classes'), '');
} else {
    $location[] = array(func_get_langvar_by_name('lbl_product_feature_classes'), 'classes.php');
}

if(
    !empty($fclassid)
    && $current_area == 'P'
    && empty($active_modules['Simple_Mode'])
    && !$single_mode
) {

    $cnt = func_query_first_cell("SELECT COUNT(*) FROM $sql_tbl[feature_classes] WHERE $sql_tbl[feature_classes].provider = '$logged_userid' AND $sql_tbl[feature_classes].fclassid = '$fclassid'");

    if($cnt == 0) {
        $top_message['content'] = func_get_langvar_by_name("txt_not_allowed_edit_product_class");
        $top_message['type'] = 'E';
        func_header_location('classes.php');
    }
}

$fc_option_types = array(
    'T' => func_get_langvar_by_name('lbl_feature_option_type_T'),
    'S' => func_get_langvar_by_name('lbl_feature_option_type_S'),
    'M' => func_get_langvar_by_name('lbl_feature_option_type_M'),
    'N' => func_get_langvar_by_name('lbl_feature_option_type_N'),
    'B' => func_get_langvar_by_name('lbl_feature_option_type_B'),
    'D' => func_get_langvar_by_name('lbl_feature_option_type_D')
);

if(empty($new)) {
    $dialog_tools_data['left'][] = array(
        'link'     => "classes.php?new=Y",
        'title' => func_get_langvar_by_name('lbl_add_feature_class')
    );
}

if(
    !empty($fclassid)
    || !empty($new)
) {
    $dialog_tools_data['left'][] = array(
        'link' => 'classes.php',
        'title' => func_get_langvar_by_name('lbl_product_type_list')
    );
}

$dialog_tools_data['right'][] = array(
    'link' => 'search.php',
    'title' => func_get_langvar_by_name('lbl_search_products')
);

// Define formats by option type
$formats = array(
    'T' => array(
        'I' => func_get_langvar_by_name('lbl_input_box'),
        'T' => func_get_langvar_by_name('lbl_text_area')),
    'D' => array(
        $config['Appearance']['date_format'] => strftime($config['Appearance']['date_format']),
        "%d-%m-%Y" => strftime("%d-%m-%Y"),
        "%d/%m/%Y" => strftime("%d/%m/%Y"),
        "%d.%m.%Y" => strftime("%d.%m.%Y"),
        "%m-%d-%Y" => strftime("%m-%d-%Y"),
        "%m/%d/%Y" => strftime("%m/%d/%Y"),
        "%Y-%m-%d" => strftime("%Y-%m-%d"),
        "%b %e, %Y" => strftime("%b %e, %Y"),
        "%A, %B %e, %Y" => strftime("%A, %B %e, %Y")),
    'N' => array(
        '' => 1000000,
        "2;,;." => number_format(1000000,2,",",'.'),
        "2;,;" => number_format(1000000,2,",",''),
        "2;,; " => number_format(1000000,2,","," "),
        "2;.;," => number_format(1000000,2,'.',","),
        "2;.;" => number_format(1000000,2,'.',''),
        "2;.; " => number_format(1000000,2,'.'," "),
        "3;,;." => number_format(1000000,3,",",'.'))
);

// Close opened class
if(!empty($close)) {
    $fclassid = '';

} elseif(
    $mode == 'add'
    && !empty($add['class'])
    && ($image_perms = func_check_image_storage_perms($file_upload_data, 'F')) !== true
) {
    // Check permissions
    $top_message = array(
        'content' => $image_perms['content'],
        'type' => 'E'
    );

// Add/Modify class (class options and class option variants)
} elseif(
    $mode == 'add'
    && !empty($add['class'])
) {

    // Update class
    if($add['fclassid'] > 0) {

        if (isset($is_save)) {
            db_query("REPLACE INTO $sql_tbl[feature_classes_lng] VALUES ('$add[fclassid]','$shop_language','$add[class]')");

            if($shop_language != $config['default_admin_language']) {
                unset($add['class']);
            }

            func_array2update('feature_classes', $add, "fclassid = '$add[fclassid]'");
        }

        // Update class options
        if($options && isset($is_update)) {
            foreach($options as $k => $v) {
                db_query("REPLACE INTO $sql_tbl[feature_options_lng] VALUES ('$k','$shop_language','$v[option_name]', '$v[option_hint]')");

                if ($shop_language != $config['default_admin_language']) {
                    unset($v['option_name']);
                    unset($v['option_hint']);
                }

                if(isset($formats[$v['option_type']]) && (!isset($v['format']) || !isset($formats[$v['option_type']][$v['format']]))) {

                    reset($formats[$v['option_type']]);
                    $v['format'] = key($formats[$v['option_type']]);

                } elseif(!isset($formats[$v['option_type']]) && isset($v['format'])) {

                    $v['format'] = '';

                }

                func_array2update('feature_options', $v, "foptionid = '$k'");
            }
        }

        // Add new option
        if(
            !empty($new_option['option_name'])
            && isset($fc_option_types[$new_option['option_type']])
            && isset($is_add)
        ) {
            $new_option['fclassid'] = $add['fclassid'];

            if(empty($new_option['orderby'])) {
                $new_option['orderby'] = func_query_first_cell("SELECT MAX(orderby) FROM $sql_tbl[feature_options] WHERE fclassid = '$add[fclassid]'")+1;
            }

            if(isset($formats[$new_option['option_type']])) {
                reset($formats[$new_option['option_type']]);
                $new_option['format'] = key($formats[$new_option['option_type']]);
            }

            $id = func_array2insert('feature_options', $new_option);

            // Add lng labels for the new option
            $add_for_languages = array_unique(array($shop_language, $config['default_admin_language'], $config['default_customer_language']));
            foreach($add_for_languages as $lng) {
                db_query("REPLACE INTO $sql_tbl[feature_options_lng] VALUES ('$id','$lng','$new_option[option_name]', '$new_option[option_hint]')");
            }

            if (
                !empty($new_option_variants)
                && (
                    $new_option['option_type'] == 'S'
                    || $new_option['option_type'] == 'M'
                )
            ) {

                $new_option_variants = explode("\n", stripslashes($new_option_variants));

                foreach($new_option_variants as $k => $v) {

                    $fvariantid = func_add_feature_variant($id, $v, $k);

                }
            }
        }

        // Add and/or Update option variants
        if(
            !empty($_foptionid)
            && (
                $variants
                || $new_variant
            ) && (
                isset($is_update_variants)
                || isset($is_add_variant)
            )
        ) {

            $foptionid = $_foptionid;

            if (
                !empty($new_variant)
                && isset($is_add_variant)
            ) {
                $fvariantid = func_add_feature_variant($foptionid, $new_variant, $new_orderby);
            }

            if (!empty($variants)) {
                foreach ($variants as $fvariantid => $variant) {

                    func_array2update(
                        'feature_variants',
                        array(
                            'orderby' => $variant['orderby']
                        ),
                        "fvariantid='$fvariantid'"
                    );

                    func_array2insert(
                        'feature_variants_lng_current',
                        array(
                            'fvariantid' => $fvariantid,
                            'variant_name' => $variant['variant_name']
                        ),
                        true
                    );

                }
            }
        }

        $top_message['content'] = func_get_langvar_by_name("lbl_feature_class_is_updated");

        $fclassid = $add['fclassid'];

    // Add class
    } else {

        if(empty($add['orderby'])) {

            $add['orderby'] = func_query_first_cell("SELECT MAX(orderby) FROM $sql_tbl[feature_classes]") + 1;

        }

        $add['provider'] = $logged_userid;

        $fclassid = func_array2insert('feature_classes', $add);

        func_array2insert(
            'feature_classes_lng',
            array(
                'fclassid'     => $fclassid,
                'code'         => $shop_language,
                'class'     => $add['class'],
            )
        );

        $top_message['content'] = func_get_langvar_by_name("lbl_feature_class_is_added");
    }

    // Add / Modify product type image
    if(
        func_check_image_posted($file_upload_data, 'F')
        && !empty($fclassid)
        && isset($is_save)
    ) {

        func_save_image($file_upload_data, 'F', $fclassid);

    }

// Delete class
} elseif(
    $mode == 'delete'
    && (
        $fclassid
        || $ids
    )
) {

    if ($fclassid) {
        $ids[$fclassid] = true;
    }

    foreach($ids as $id => $v) {

        $opts = func_query_column("SELECT foptionid FROM $sql_tbl[feature_options] WHERE fclassid = '$id'");

        if (!empty($opts)) {
            db_query("DELETE FROM $sql_tbl[feature_options] WHERE fclassid = '$id'");
            db_query("DELETE FROM $sql_tbl[feature_options_lng] WHERE foptionid IN ('".@implode("','", $opts)."')");
            db_query("DELETE FROM $sql_tbl[product_foptions] WHERE foptionid IN ('".@implode("','", $opts)."')");

            $fvars = func_query_column("SELECT fvariantid FROM $sql_tbl[feature_variants] WHERE foptionid IN ('".@implode("','", $opts)."')");

            db_query("DELETE FROM $sql_tbl[feature_variants] WHERE foptionid IN ('".@implode("','", $opts)."')");
            func_delete_entity_from_lng_tables('feature_variants_lng_', $fvars, 'fvariantid');

        }

        db_query("DELETE FROM $sql_tbl[feature_classes] WHERE fclassid = '$id'");
        db_query("DELETE FROM $sql_tbl[product_features] WHERE fclassid = '$id'");
        db_query("DELETE FROM $sql_tbl[feature_classes_lng] WHERE fclassid = '$id'");

        func_delete_image($id, 'F');
    }

    func_data_cache_get('fc_count', array('Y'), true);
    func_data_cache_get('fc_count', array('N'), true);

    unset($fclassid, $ids);
    $top_message['content'] = func_get_langvar_by_name("lbl_feature_classes_are_deleted");

// Delete image
} elseif(
    $mode == 'delete_image'
    && $fclassid
) {

    func_delete_image($fclassid, 'F');
    $top_message['content'] = func_get_langvar_by_name("lbl_feature_image_is_deleted");

// Delete option
} elseif(
    $mode == 'delete_options'
    && (
        $foptionid
        || $ids
    )
    && $fclassid
) {

    if($foptionid) {
        $ids[$foptionid] = true;
    }

    db_query("DELETE FROM $sql_tbl[feature_options] WHERE fclassid = '$fclassid' AND foptionid IN ('".@implode("','", @array_keys($ids))."')");
    db_query("DELETE FROM $sql_tbl[feature_options_lng] WHERE foptionid IN ('".@implode("','", @array_keys($ids))."')");
    db_query("DELETE FROM $sql_tbl[product_foptions] WHERE foptionid IN ('".@implode("','", @array_keys($ids))."')");

    $fvars = func_query_column("SELECT fvariantid FROM $sql_tbl[feature_variants] WHERE foptionid IN ('".@implode("','", @array_keys($ids))."')");

    db_query("DELETE FROM $sql_tbl[feature_variants] WHERE foptionid IN ('".@implode("','", @array_keys($ids))."')");
    func_delete_entity_from_lng_tables('feature_variants_lng_', $fvars, 'fvariantid');

    unset($foptionid, $ids);

    func_data_cache_get('fc_count', array('Y'), true);
    func_data_cache_get('fc_count', array('N'), true);

    $top_message['content'] = func_get_langvar_by_name("lbl_class_options_are_deleted");

// Delete option variants
} elseif(
    $mode == 'delete_variants'
    && $_foptionid
    && $fclassid
    && $vids
) {

    $foptionid = $_foptionid;

    foreach($vids as $k => $v) {

        $foption_type = func_query_first_cell("SELECT option_type FROM $sql_tbl[feature_variants] INNER JOIN $sql_tbl[feature_options] ON $sql_tbl[feature_variants].foptionid=$sql_tbl[feature_options].foptionid WHERE fvariantid='$k'");

        if ($foption_type == 'M') {

            $res = db_query("SELECT productid, value FROM $sql_tbl[product_foptions] WHERE foptionid='$foptionid' AND value LIKE '%|$k|%'");

            if ($res) {

                while ($row = db_fetch_array($res)) {
                    $data = func_sql_unserialize($row['value']);

                    foreach ($data as $kk => $vv) {
                        if ($vv == $k) unset($data[$kk]);
                    }

                    if (!empty($data)) {

                        func_array2insert(
                            'product_foptions',
                            array(
                                'foptionid' => $foptionid,
                                'productid' => $row['productid'],
                                'value' => func_sql_serialize($data),
                            ),
                            true
                        );

                    } else {

                        db_query("DELETE FROM $sql_tbl[product_foptions] WHERE foptionid='$foptionid' AND productid='$row[productid]'");

                    }
                }
            }

        } else {

            db_query("DELETE FROM $sql_tbl[product_foptions] WHERE value='$k' AND foptionid='$foptionid'");

        }

        db_query("DELETE FROM $sql_tbl[feature_variants] WHERE fvariantid='$k'");
        func_delete_entity_from_lng_tables('feature_variants_lng_', $k, 'fvariantid');

    }

    unset($option, $vids);

    $top_message['content'] = func_get_langvar_by_name("lbl_option_variants_are_deleted");

// Update classes
} elseif(
    $mode == 'update'
    && $update
) {

    foreach($update as $id => $v) {

        db_query("UPDATE $sql_tbl[feature_classes] SET avail = '$v[avail]', orderby = '$v[orderby]' WHERE fclassid = '$id'");

    }

    func_data_cache_get('fc_count', array('Y'), true);
    func_data_cache_get('fc_count', array('N'), true);

    $top_message['content'] = func_get_langvar_by_name("lbl_feature_classes_are_updated");

// Select option variant
} elseif(
    $mode == 'modify_variants'
    && $ids
) {

    list($foptionid, $tmp) = each($ids);

}

// Redirect after modifications
if(!empty($mode)) {
    func_header_location(
        'classes.php'
        . (!empty($fclassid) ? "?fclassid=" . $fclassid : '')
        . (!empty($foptionid) ? "&foptionid=" . $foptionid . "#foption" . $foptionid : '')
    );
}

// Get classes
if(
    $current_area == 'P'
    && empty($active_modules['Simple_Mode'])
    && !$single_mode
) {

    $classes = func_query("SELECT $sql_tbl[feature_classes].*,"
        . " IFNULL($sql_tbl[feature_classes_lng].class, $sql_tbl[feature_classes].class) AS class"
        . " FROM $sql_tbl[feature_classes]"
        . " LEFT JOIN $sql_tbl[feature_classes_lng] ON $sql_tbl[feature_classes_lng].fclassid = $sql_tbl[feature_classes].fclassid"
        . " AND $sql_tbl[feature_classes_lng].code = '$shop_language'"
        . " WHERE $sql_tbl[feature_classes].provider = '$logged_userid'"
        . " GROUP BY $sql_tbl[feature_classes].fclassid ORDER BY $sql_tbl[feature_classes].orderby");

    if (!empty($classes)) {

        foreach ($classes as $k => $v) {
            $classes[$k]['other_provider'] = func_query_first_cell("SELECT COUNT(*) FROM $sql_tbl[product_features], $sql_tbl[products] WHERE $sql_tbl[product_features].fclassid = '$v[fclassid]' AND $sql_tbl[product_features].productid = $sql_tbl[products].productid AND $sql_tbl[products].provider != '$logged_userid'");

        }

    }

} else {

    $classes = func_query("SELECT $sql_tbl[feature_classes].*, $sql_tbl[customers].login AS provider_login,"
        . " IFNULL($sql_tbl[feature_classes_lng].class, $sql_tbl[feature_classes].class) AS class"
        . " FROM $sql_tbl[feature_classes]"
        . " LEFT JOIN $sql_tbl[feature_classes_lng] ON $sql_tbl[feature_classes_lng].fclassid = $sql_tbl[feature_classes].fclassid"
        . " AND $sql_tbl[feature_classes_lng].code = '$shop_language'"
        . " LEFT JOIN $sql_tbl[customers] ON $sql_tbl[feature_classes].provider = $sql_tbl[customers].id"
        . " GROUP BY $sql_tbl[feature_classes].fclassid"
        . " ORDER BY $sql_tbl[feature_classes].orderby");

}

// Get class data
if (!empty($fclassid)) {

    if(
        $current_area == 'P'
        && empty($active_modules['Simple_Mode'])
        && !$single_mode
    ) {

        $class = func_query_first("SELECT $sql_tbl[feature_classes].*, IF($sql_tbl[images_F].id IS NULL,'','Y') as is_image, IFNULL($sql_tbl[feature_classes_lng].class, $sql_tbl[feature_classes].class) as class FROM $sql_tbl[feature_classes] LEFT JOIN $sql_tbl[feature_classes_lng] ON $sql_tbl[feature_classes_lng].fclassid = $sql_tbl[feature_classes].fclassid AND $sql_tbl[feature_classes_lng].code = '$shop_language' LEFT JOIN $sql_tbl[images_F] ON $sql_tbl[images_F].id = $sql_tbl[feature_classes].fclassid WHERE $sql_tbl[feature_classes].provider = '$logged_userid' AND $sql_tbl[feature_classes].fclassid = '$fclassid' GROUP BY $sql_tbl[feature_classes].fclassid ORDER BY $sql_tbl[feature_classes].orderby");

        if (!empty($class)) {

            $class['other_provider'] = func_query_first_cell("SELECT COUNT(*) FROM $sql_tbl[product_features], $sql_tbl[products] WHERE $sql_tbl[product_features].fclassid = '$fclassid' AND $sql_tbl[product_features].productid = $sql_tbl[products].productid AND $sql_tbl[products].provider != '$logged_userid'");

        }

    } else {

        $class = func_query_first("SELECT $sql_tbl[feature_classes].*, IF($sql_tbl[images_F].id IS NULL,'','Y') as is_image, IFNULL($sql_tbl[feature_classes_lng].class, $sql_tbl[feature_classes].class) as class FROM $sql_tbl[feature_classes] LEFT JOIN $sql_tbl[feature_classes_lng] ON $sql_tbl[feature_classes_lng].fclassid = $sql_tbl[feature_classes].fclassid AND $sql_tbl[feature_classes_lng].code = '$shop_language' LEFT JOIN $sql_tbl[images_F] ON $sql_tbl[images_F].id = $sql_tbl[feature_classes].fclassid WHERE $sql_tbl[feature_classes].fclassid = '$fclassid'");

    }

    if (empty($class)) {

        func_header_location('classes.php');

    }

    // Get class options
    $class['options'] = func_query("SELECT $sql_tbl[feature_options].*, IFNULL($sql_tbl[feature_options_lng].option_name, $sql_tbl[feature_options].option_name) as option_name, IFNULL($sql_tbl[feature_options_lng].option_hint, $sql_tbl[feature_options].option_hint) as option_hint FROM $sql_tbl[feature_options] LEFT JOIN $sql_tbl[feature_options_lng] ON $sql_tbl[feature_options_lng].foptionid = $sql_tbl[feature_options].foptionid AND $sql_tbl[feature_options_lng].code = '$shop_language'WHERE $sql_tbl[feature_options].fclassid = '$fclassid' ORDER BY $sql_tbl[feature_options].orderby");

    if (!empty($class['options'])) {

        foreach($class['options'] as $k => $v) {

            $class['options'][$k]['variants'] = func_query("SELECT $sql_tbl[feature_variants].*, $sql_tbl[feature_variants_lng_current].variant_name FROM $sql_tbl[feature_variants] INNER JOIN $sql_tbl[feature_variants_lng_current] USING(fvariantid) WHERE foptionid='$v[foptionid]' ORDER BY orderby");

        }

    } else {

        unset($class['options']);

    }

    $smarty->assign('class',         $class);
    $smarty->assign('image',         func_image_properties('F', $fclassid));
    $smarty->assign('foptionid',     @$foptionid);

    $location[] = array($class['class'], "");
}

if (!empty($classes))
    $smarty->assign('classes', $classes);

$smarty->assign('fc_option_types',         $fc_option_types);
$smarty->assign('query_string',         urlencode($QUERY_STRING));
$smarty->assign('dialog_tools_data',     $dialog_tools_data);
$smarty->assign('formats',                 $formats);
?>
