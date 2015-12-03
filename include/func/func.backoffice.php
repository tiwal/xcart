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
 * Backoffice functions
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage Lib
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com>
 * @copyright  Copyright (c) 2001-2012 Qualiteam software Ltd <info@x-cart.com>
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @version    $Id: func.backoffice.php,v 1.52.2.32.2.1 2012/04/17 09:00:35 aim Exp $
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

if ( !defined('XCART_START') ) { header("Location: ../"); die("Access denied"); }

x_load('files');

/**
 * This function determines the files location for current user
 */
function func_get_files_location($userid = 0, $usertype = '')
{
    global $logged_userid, $single_mode, $files_dir_name, $files_dir_prefix;
    global $user_account;

    if ($userid == 0) {
        $userid = $logged_userid;
    }

    if ($usertype === '') {
        $usertype = $user_account['usertype'];
    }

    if ($single_mode || $usertype == 'A')
        return $files_dir_name;

    $files_dir = $files_dir_name . XC_DS . $files_dir_prefix . $userid;

    return $files_dir;
}

/**
 * This function updates/inserts the language variable into 'languages_alt'
 */
function func_languages_alt_insert($name, $value, $code="")
{
    global $sql_tbl, $all_languages;

    if (!is_array($all_languages))
        return false;

    if (empty($code)) {

        // For empty code update/insert variables for all languages

        foreach($all_languages as $k=>$v) {
            db_query("REPLACE INTO $sql_tbl[languages_alt] (code, name, value) VALUES ('$v[code]', '$name', '$value')");
        }
    }
    else {

        // For not empty $code...

        $result = false;

        // Check if $code is valid

        foreach($all_languages as $k=>$v) {
            if ($code == $v['code']) {
                $result = true;
                break;
            }
        }

        if (!$result)
            return false;

        // Update/insert variable for $code

        db_query("REPLACE INTO $sql_tbl[languages_alt] (code, name, value) VALUES ('$code', '$name', '$value')");
    }

    return true;
}

/**
 * Callback function: determination of empty field
 */
function func_callback_empty($value)
{
    return strlen($value) > 0;
}

function func_disable_paypal_methods($paypal_solution, $enable=false)
{
    global $sql_tbl;

    $paypal_direct  = func_query_first("SELECT $sql_tbl[payment_methods].paymentid, $sql_tbl[payment_methods].active FROM $sql_tbl[payment_methods], $sql_tbl[ccprocessors] WHERE $sql_tbl[payment_methods].processor_file='ps_paypal_pro.php' AND $sql_tbl[payment_methods].processor_file=$sql_tbl[ccprocessors].processor AND $sql_tbl[payment_methods].paymentid<>$sql_tbl[ccprocessors].paymentid");
    $paypal_express = func_query_first("SELECT $sql_tbl[payment_methods].paymentid, $sql_tbl[payment_methods].active FROM $sql_tbl[payment_methods], $sql_tbl[ccprocessors] WHERE $sql_tbl[payment_methods].processor_file='ps_paypal_pro.php' AND $sql_tbl[payment_methods].processor_file=$sql_tbl[ccprocessors].processor AND $sql_tbl[payment_methods].paymentid=$sql_tbl[ccprocessors].paymentid");
    $paypal_standard = func_query_first("SELECT $sql_tbl[payment_methods].paymentid, $sql_tbl[payment_methods].active FROM $sql_tbl[payment_methods], $sql_tbl[ccprocessors] WHERE $sql_tbl[payment_methods].processor_file='ps_paypal.php' AND $sql_tbl[payment_methods].processor_file=$sql_tbl[ccprocessors].processor AND $sql_tbl[payment_methods].paymentid=$sql_tbl[ccprocessors].paymentid");

    $paypal_directid = @$paypal_direct['paymentid'];
    $paypal_expressid = @$paypal_express['paymentid'];
    $paypalid = @$paypal_standard['paymentid'];

    $disable_methods = array();
    $enable_methods = array();

    switch ($paypal_solution) {
        case 'ipn':
            $disable_methods = array($paypal_expressid, $paypal_directid);
            $enable_methods[] = $paypalid;
            break;

        case 'pro':
        case 'uk':
            $disable_methods[] = $paypalid;
            $enable_methods = array($paypal_expressid, $paypal_directid);
            if (!$enable && $paypal_direct['active'] != 'Y') {
                $disable_methods[] = $paypal_expressid;
                $disable_methods[] = $paypal_directid;
            }
            break;

        case 'express':
            $disable_methods = array($paypalid, $paypal_directid);
            $enable_methods[] = $paypal_expressid;
            break;
    }

    if (!func_array_empty($disable_methods)) {
        func_array2update('payment_methods', array('active' => 'N'), "paymentid IN ('".implode("','", $disable_methods)."')");
    }

    if ($enable && !func_array_empty($enable_methods)) {
        func_array2update('payment_methods', array('active' => 'Y'), "paymentid IN ('".implode("','", $enable_methods)."')");
    }

    if (in_array($paypal_solution, array('uk', 'pro')) && !empty($paypal_expressid)) {
        $active = func_query_first_cell("SELECT active FROM $sql_tbl[payment_methods] WHERE paymentid = '$paypal_directid'");
        func_array2update('payment_methods', array('active' => $active), "paymentid = '$paypal_expressid'");
    }
}

/**
 * This function inserts the zone elements
 * country (C), state (S), county (G), city (T), zip code (Z), address (A)
 */
function func_insert_zone_element($zoneid, $field_type, $zone_elements)
{
    global $sql_tbl;

    db_query("DELETE FROM $sql_tbl[zone_element] WHERE zoneid='$zoneid' AND field_type='$field_type'");
    if (!empty($zone_elements) && is_array($zone_elements)) {
        foreach ($zone_elements as $k=>$v) {
            $v = trim($v);
            if (empty($v)) continue;

            db_query("REPLACE INTO $sql_tbl[zone_element] (zoneid, field, field_type) VALUES ('$zoneid', '$v', '$field_type')");
        }
    }
}

function func_array_merge_ext()
{
    $vars = func_get_args();

    if (!is_array($vars) || empty($vars))
        return array();

    foreach($vars as $k => $v) {
        if (!is_array($v) || empty($v))
            unset($vars[$k]);
    }

    if (empty($vars))
        return array();

    $vars = array_values($vars);
    $orig = array_shift($vars);
    foreach ($vars as $var) {
        foreach ($var as $k => $v) {
            if (isset($orig[$k]) && is_array($orig[$k]) && is_array($v)) {
                $orig[$k] = func_array_merge_ext($orig[$k], $v);
            }
            else {
                $orig[$k] = $v;
            }
        }
    }

    return $orig;
}

/**
 * Get information about directory:
 *  - how many files does directory contain
 *  - what size does directory have
 */
function func_get_dir_status($directory, $hr = false, $rec_level = 0)
{

    $result = array(
        'files' => 0,
        'size'=>0,
        'is_large' => false
    );

    if ($rec_level++ > MAX_FUNC_NESTING_LEVEL) {
        $result['is_large'] = true;
        return $result;
    }

    $dir = @opendir($directory);
    if (!$dir) return $result;

    while (($file = readdir($dir)) !== false) {
        if ($file == '.' || $file == '..') continue;

        $path = $directory.XC_DS.$file;

        if (is_file($path)) {
            $result['files']++;
            $result['size'] += filesize($path);
        } else {
            $temp = func_get_dir_status($path, false, $rec_level);
            $result['files'] += $temp['files'];
            $result['size'] += $temp['size'];
            if ($temp['is_large']) $result['is_large'] = true;
        }
    }

    closedir($dir);

    // human readable form
    if ($hr) {

        $powers = array('kb' => 1, 'Mb' => 2, 'Gb' => 3);

        $hr_size = '';

        foreach (array_reverse($powers) as $name => $power) {
            if (($size = $result['size']/pow(1024, $power)) > 0.9) {
                $hr_size = round($size)." ".$name;
                break;
            }
        }

        if (empty($hr_size)) {
            $hr_size = $result['size']." bytes";
        }

        $result['size'] = $hr_size;
        $result['dir'] = $directory;

    }

    return $result;
}

/**
 * This function updates the field 'display_states' of xcart_countries table
 * depending on existing states information
 */
function func_update_country_states ($country, $all_countries=false)
{
    global $sql_tbl;

    $countries = array();

    if (empty($country) && !$all_countries)
        return;

    if (!$all_countries) {

        if (is_array($country))
            $countries = $country;
        elseif (!empty($country))
            $countries[] = $country;

    }

    $countries_with_states = func_query_column("SELECT DISTINCT(country_code) FROM $sql_tbl[states] WHERE 1 " . (!empty($countries) ? " AND country_code IN ('".implode("','", $countries)."')" : ""));

    db_query("UPDATE $sql_tbl[countries] SET display_states='N' WHERE 1" . (!empty($countries) ? " AND code IN ('".implode("','", $countries)."')" : ""));

    if (!empty($countries_with_states))
        db_query("UPDATE $sql_tbl[countries] SET display_states='Y' WHERE code IN ('" . implode("','", $countries_with_states) . "')");

}

/**
 * Display time period
 */
function func_display_time_period($t)
{

    if (empty($t))
        return "0:0:0";

    $ms = $t - floor($t);
    $ms = $ms > 0 ? round($ms*1000, 0) : 0;

    $t = floor($t);
    $s = $t % 60;

    $t = floor($t / 60);
    $m = $t > 0 ? $t % 60 : 0;

    if ($t > 0)
        $t = floor($t / 60);

    $h = $t > 0 ? $t % 24 : 0;

    return $h.":".$m.":".$s;

}

/**
 * Detect max data size for inserting to DB
 */
function func_get_max_upload_size()
{
    global $sql_max_allowed_packet;

    $upload_max_filesize = func_upload_max_filesize();

    if ($sql_max_allowed_packet && $sql_max_allowed_packet < $upload_max_filesize) {
        $upload_max_filesize = $sql_max_allowed_packet-1024;
    }

    $upload_max_filesize = func_convert_to_megabyte($upload_max_filesize);

    return $upload_max_filesize;
}

/**
 * This function updates the cache of zone elements
 * Format: C2-S3-G4-T1-Z5-A2
 */
function func_zone_cache_update ($zoneid)
{
    global $sql_tbl;

    $result = '';

    $data = func_query("SELECT field_type, count(*) as count FROM $sql_tbl[zone_element] WHERE zoneid='$zoneid' GROUP BY field_type");

    if (!empty($data)) {
        $result_array = array();
        for ($i = 0; $i < count($data); $i++) {
            $result_array[] = $data[$i]['field_type'].$data[$i]['count'];
        }
        $result = implode("-", $result_array);
    }

    db_query("UPDATE $sql_tbl[zones] SET zone_cache='$result' WHERE zoneid='$zoneid'");
}

/**
 * Check - allow or not remote IP address for admin area
 */
function func_check_allow_admin_ip($ip = false)
{
    global $config, $REMOTE_ADDR;

    if (!defined('SECURITY_BLOCK_UNKNOWN_ADMIN_IP') || !constant('SECURITY_BLOCK_UNKNOWN_ADMIN_IP'))
        return true;

    if (!isset($config['allowed_ips']) || empty($config['allowed_ips']))
        return false;

    if (!is_array($config['allowed_ips']))
        $config['allowed_ips'] = func_array_map("trim", explode(",", $config['allowed_ips']));

    if (empty($config['allowed_ips']))
        return false;

    return func_compare_ip(
        empty($ip) ? $REMOTE_ADDR : $ip,
        $config['allowed_ips']
    );

}

/**
 * Send to shop administrator message with IP address registration link
 */
function func_send_admin_ip_reg($mode = 'C', $local_login = false, $email = false)
{
    global $login, $config, $xcart_catalogs, $REMOTE_ADDR, $mail_smarty;

    if (empty($local_login))
        $local_login = $login;

    if (!isset($config['ip_register_codes']) || empty($config['ip_register_codes']))
        $config['ip_register_codes'] = array();
    elseif (!is_array($config['ip_register_codes']))
        $config['ip_register_codes'] = unserialize($config['ip_register_codes']);

    if (!is_array($config['ip_register_codes']))
        $config['ip_register_codes'] = array();

    mt_srand(XC_TIME);
    $md5 = md5(func_microtime().mt_rand(0, XC_TIME));
    while (isset($config['ip_register_codes'][$md5]))
        $md5 = md5(func_microtime().mt_rand(XC_TIME));

    $found = false;
    foreach ($config['ip_register_codes'] as $k => $v) {
        if ($v['ip'] == $REMOTE_ADDR) {
            $found = $k;
            break;
        }
    }

    if ($found && isset($config['ip_register_codes'][$found])) {
        $md5 = $found;
        $config['ip_register_codes'][$found]['expiry'] = XC_TIME+86400*3;

    } else {
        $config['ip_register_codes'][$md5] = array(
            'ip' => $REMOTE_ADDR,
            'expiry' => XC_TIME+86400*3
        );
    }

    func_array2insert('config',    array('name' => 'ip_register_codes', 'value' => addslashes(serialize($config['ip_register_codes']))), true);

    $mail_smarty->assign('mode', $mode);
    $mail_smarty->assign('ip', $REMOTE_ADDR);
    $mail_smarty->assign('local_login', $local_login);
    $mail_smarty->assign('date', date("m/d/Y H:i:s T"));

    $mail_smarty->assign('url', $xcart_catalogs['admin']."/ip_register.php?key=".$md5);

    x_load('mail');

    func_send_mail($config['Company']['site_administrator'], "mail/security_ip_note_subj.tpl", "mail/security_ip_note.tpl", $config['Company']['site_administrator'], true);
    if ($email)
        func_send_mail($email, 'mail/security_ip_note_subj.tpl', 'mail/security_ip_note.tpl', $config['Company']['site_administrator'], true);

    return $md5;
}

/**
 * Register IP address for Admin area
 */
function func_register_admin_ip($ip)
{
    global $config;

    if (!isset($config['allowed_ips']) || empty($config['allowed_ips']))
        $config['allowed_ips'] = array();
    elseif (!is_array($config['allowed_ips']))
        $config['allowed_ips'] = func_array_map("trim", explode(",", $config['allowed_ips']));

    if (in_array($ip, $config['allowed_ips']))
        return true;

    $config['allowed_ips'][] = $ip;

    func_array2insert('config', array('name' => 'allowed_ips', 'value' => addslashes(implode(",", $config['allowed_ips']))), true);

    func_remove_ip_request($ip, true);

    return true;
}

/**
 * Delete IP address from registration requests list by IP address(es) or by request id
 */
function func_remove_ip_request($ids, $by_ip = false)
{
    global $config;

    if (!isset($config['ip_register_codes']) || empty($config['ip_register_codes']) || empty($ids))
        return false;

    if (!is_array($config['ip_register_codes']))
        $config['ip_register_codes'] = unserialize($config['ip_register_codes']);

    if (!is_array($config['ip_register_codes']))
        return false;

    if (!is_array($ids))
        $ids = array($ids);

    $changed = false;
    foreach ($config['ip_register_codes'] as $k => $v) {
        if ((!$by_ip && in_array($k, $ids)) || ($by_ip && in_array($v['ip'], $ids))) {
            $changed = true;
            func_unset($config['ip_register_codes'], $k);
        }
    }

    if ($changed) {
        func_array2insert('config', array('name' => 'ip_register_codes', 'value' => addslashes(serialize($config['ip_register_codes']))), true);
    }

    return true;
}

/**
 * Check tax service name
 */
function func_check_tax_service_name($tax_name)
{
    return (bool)preg_match("/^[a-zA-Z][\w\d]*$/", $tax_name) && strlen($tax_name) <= 10;
}

/**
 * Generate form id
 */
function func_generate_formid($force = false)
{
    global $sql_tbl, $XCARTSESSID;

    static $stored_md5 = false;

    if (!empty($stored_md5) && !$force)
        return $stored_md5;

    $check_string = "SELECT COUNT(*) FROM " . $sql_tbl['form_ids'] . " WHERE sessid = '" . $XCARTSESSID . "' AND formid = '";

    do {
        $stored_md5 = md5(XC_TIME . mt_rand(0, time()));
    } while (func_query_first_cell($check_string . $stored_md5 . "'"));

    func_array2insert(
        'form_ids',
        array(
            'sessid' => $XCARTSESSID,
            'formid' => $stored_md5,
            'expire' => XC_TIME,
        )
    );

    return $stored_md5;
}

/**
 * Templater output filter for formid substitute
 */
function func_substitute_formid($tpl_output, &$templater)
{
    static $current_formid = false;

    if (preg_match("/<form[^>]+method\s*=\s*['\"]?post['\"]?[^>]*>/SUis", $tpl_output)) {

        if (empty($current_formid))
            $current_formid = func_generate_formid();

        if (!empty($current_formid))
            $tpl_output = preg_replace("/(<form[^>]+method\s*=\s*['\"]?post['\"]?[^>]*>)/SUis", "\\1\n<input type=\"hidden\" name=\"_formid\" value=\"$current_formid\" />", $tpl_output);

    }

    return $tpl_output;
}

/**
 * Check formid
 */
function func_check_formid($formid = null)
{
    global $XCARTSESSID, $sql_tbl;

    if (is_null($formid))
        $formid = isset($_POST['_formid']) ? $_POST['_formid'] : false;

    return !(
        empty($formid) ||
        !is_string($formid) ||
        !preg_match("/^[\da-f]{32}$/i", $formid) ||
        !func_query_first_cell("SELECT COUNT(*) FROM $sql_tbl[form_ids] WHERE sessid = '$XCARTSESSID' AND formid = '$formid'")
    );
}

// Check limit for post_max_size and upload_max_filesize
// INPUT: filename, form_size - average post size without filesize
function func_check_uploaded_files_sizes($filename = 'userfile', $form_size = 500, $max_filesize = '')
{
    global $REQUEST_METHOD, $HTTP_REFERER, $top_message, $upload_warning_message;

    #to avoid double checking
    static $is_checked = false;

    if ($is_checked)
        return true;

    $is_checked = true;

    if ($REQUEST_METHOD != 'POST' || !stristr($_SERVER['CONTENT_TYPE'],'multipart/form-data'))
        return true;

    $post_max_size = func_convert_to_byte(ini_get('post_max_size'));

    if (empty($max_filesize))
        $max_filesize = func_upload_max_filesize();
    else
        $max_filesize = min(func_upload_max_filesize(), $max_filesize);

    // Check post_max_size exceeding

    $error = empty($_POST) && empty($_GET) && empty($_FILES) && $_SERVER['CONTENT_LENGTH'] > $post_max_size;

    // Check upload_max_filesize exceeding

    if ($filename == 'none')
        $filename = '';

    if (
        !empty($filename)
        && isset($_FILES[$filename])
        && !$error
        && !is_uploaded_file($filename)
        && $_FILES[$filename]['error'] == 1
    ) {
        $error = true;
    }

    if ($error) {
        $top_message['type'] = 'E';
        $upload_warning_message = func_get_langvar_by_name('txt_max_file_size_warning3', array('size1' =>func_convert_to_megabyte($max_filesize), 'size2' => func_convert_to_megabyte($_SERVER['CONTENT_LENGTH'] - $form_size)), false, true);
        $top_message['content'] = $upload_warning_message;
        func_header_location(func_is_internal_url($HTTP_REFERER) ? $HTTP_REFERER : 'home.php');
    }

    return true;
}

/**
 * Text variables to use in license text
 */

/*
 * Check if ssl shared cert is used. Return false, or web_dirs for http/https
*/
function func_is_used_ssl_shared_cert($http_location, $https_location) {

    if (
        $http_location === $https_location
        || strpos($http_location, 'http://') === false
        || strpos($https_location, 'https://') === false
    )
        return false;

    $http_location = rtrim($http_location, '/') . '/';
    $https_location = rtrim($https_location, '/') . '/';

    $http_location = str_replace('http://', '://', $http_location);
    $https_location = str_replace('https://', '://', $https_location);

    $http_location_rest = preg_replace('%://.*?/%', '/', $http_location);
    $https_location_rest = preg_replace('%://.*?/%', '/', $https_location);

    $https_location_rest = rtrim($https_location_rest, '/');
    $http_location_rest = rtrim($http_location_rest, '/');

    if ($http_location_rest !== $https_location_rest) {
        return array(
            'http' => $http_location_rest,
            'https' => $https_location_rest
        );
    }    

    return false;
}

/*
* Check if %$module% apache module is enabled. Skip check if apache_get_modules function is not avalaible
*/
function func_apache_check_module($module)
{
    $res = true;
    
    if (function_exists('apache_get_modules')) {
        $modules = apache_get_modules();

        if (!empty($modules)) {
            $res = false;
            foreach ($modules as $k => $m) {
                if (strpos($m, $module) !== false) {
                    $res = true;
                    break;
                }                
            }
        }
    }

    return $res;
}

/*
 * Used on admin/configuration.php POST. Check if admin has changed some option
 */
function func_option_is_changed($category, $name)
{
    global $config, $sql_tbl;

    if (empty($name))
        return false;

    $new_value = func_query_first_cell("SELECT value FROM $sql_tbl[config] WHERE name='$name'");

    return $new_value != $config[$category][$name];
}

/*
 * Get all offline payment methods Used as source for force_offline_paymentid config var (sql/xcart_data.sql)
 */
function func_get_offline_payment_methods($condition='')
{
    global $sql_tbl;

    $methods = func_query_hash("SELECT paymentid, payment_method FROM $sql_tbl[payment_methods] WHERE processor_file='' $condition AND is_cod!='Y'", 'paymentid', false, true);

    if (!empty($methods)) {
        $methods[0] = '';
        unset($methods[14]);// Do not use Gift Certificate pm
        ksort($methods);
    }

    settype($methods, 'array');
    return $methods;
}

/**        
 * Clear force_offline_paymentid if it is C.O.D.
 */        
function func_check_force_offline_paymentid_for_cod()
{ 
    global $config, $sql_tbl;

    $force_offline_paymentid = intval($config['Egoods']['force_offline_paymentid']);
    $is_cod_force_offline_payment = func_query_first_cell("SELECT paymentid FROM $sql_tbl[payment_methods] WHERE paymentid='$force_offline_paymentid' AND is_cod='Y'");

    if (!empty($is_cod_force_offline_payment)) {
       func_array2update('config', array('value' => '0'), "name='force_offline_paymentid'");
    }

    return true;
}

/**
 * Obtain and parse
 */
function func_get_xcart_paid_modules()
{
    global $config, $HTTPS, $sql_tbl, $active_modules;

    if (!is_url($config['rss_xcart_paid_modules']))
        return array();

    static $res = false;
    if ($res)
        return $res;

    $modules = func_query_column("SELECT module_name FROM $sql_tbl[modules] ORDER BY module_name");

    // CreSecure Hosted Payment Page integration
    $has_cc_cresecure_hpp = func_query_first_cell("SELECT processor FROM $sql_tbl[ccprocessors] WHERE processor='cc_cresecure_hpp.php'");
    if (!empty($has_cc_cresecure_hpp))
        $modules[] = 'cc_cresecure_hpp.php';

    // BrainTree payment integration
    $has_cc_braintree = func_query_first_cell("SELECT processor FROM $sql_tbl[ccprocessors] WHERE processor='cc_braintree.php'");
    if (!empty($has_cc_braintree))
        $modules[] = '_braintree';

    // X-Payments
    if (!empty($active_modules['XPayments_Connector'])) {
        func_xpay_func_load();
        if (xpc_is_payment_methods_exists())
            $modules[] = '_xp';
    }
    
    
    $cache_key = md5(serialize($modules)). $HTTPS;

    if ($data = func_get_cache_func($cache_key, 'get_xcart_paid_modules')) {
        $res = $data;
        return $data;
    }

    $rss_url = parse_url($config['rss_xcart_paid_modules']);

    x_load('http','xml');
    list($header, $result) = func_http_get_request($rss_url['host'], $rss_url['path'], @$rss_url['query']);

    if (
        $HTTPS
        && !empty($result)
    ) {
        $result = str_replace('http://', 'https://', $result);
    }    

    $parse_error = false;
    $options = array(
        'XML_OPTION_CASE_FOLDING' => 1,
        'XML_OPTION_TARGET_ENCODING' => 'ISO-8859-1'
    );
    $parsed = func_xml_parse($result, $parse_error, $options);

    $paid_modules = array();
    if (!empty($parsed)) {
        $items = func_array_path($parsed, 'MODULES/#/MODULE');

        if (is_array($items)) {
            foreach ($items as $item) {

                $service_name = func_array_path($item, '@/SERVICE_NAME');
                if (in_array($service_name, $modules))
                    continue;

                $paid_modules[] = array(
                    'name' => func_array_path($item, '@/NAME'),
                    'desc' => func_array_path($item, '@/DESC'),
                    'image' => func_array_path($item, '@/IMAGE'),
                    'price' => func_array_path($item, '@/PRICE'),
                    'page' => func_array_path($item, '@/PAGE'),
                );
            }
        }
    }

    
    func_save_cache_func($paid_modules, $cache_key, 'get_xcart_paid_modules');
    $res = $paid_modules;
    return $paid_modules;
}

/*
 Return possible processors in X-Payments, in sql or array format
*/
function func_get_xp_processors($format = 'in_sql')
{
    global $sql_tbl;

    // Show these methods with 'via X-Payments' note
    $methods = array (
        'ANZ eGate - Merchant-Hosted',
        'AuthorizeNet - AIM',
        'Bean Stream',
        'BluePay',
        'Caledon',
        'CyberSource - SOAP Toolkit API',
        'DIBS',
        'DirectOne - Direct Interface',
        'ECHOnline',
        'First Data Global Gateway - LinkPoint',
        'GoEmerchant - EZ Payment Gateway Direct',
        'GoEmerchant - XML Gateway API',
        'HSBC - XML API integration',
        'HeidelPay',
        'Innovative E-Commerce',
        'NetRegistry e-commerce',
        'Netbilling gateway - Direct',
        'Ogone - Direct',
        'PSiGate - XML Direct',
        'PayFlow - Pro',
        'PayPal WPP Direct Payment',//Website Payments Pro (Direct payment)
        'PlugnPay - Remote Auth method',
        'RBS WorldPay - Global Gateway',
        'Sage Pay Go - Direct protocol',
        'SecurePay - Non-Recurring Interface',
        'SecurePay Australia - Direct',
        'SecurePay Australia - ReDirect',
        'SkipJack',
        'USA ePay',
        'Virtual Merchant - Merchant Provided Form',
        'ePDQ - MPI XML',
        'eProcessingNetwork - Transparent Database Engine',
        'eSelect Plus - Direct Post',
        'eWAY Merchant Hosted Payment',
        'iTransact (Process USA) - XML scheme',
    );

    if ($format != 'in_sql')
        return $methods;

    $storage = func_data_cache_get('sql_tables_fields');
    $fields = $storage[strtolower($sql_tbl['ccprocessors'])];

    if (empty($fields))
        return array();

    $pattern = "'" . implode("','",$fields) . "'";

    $ret = '';
    foreach ($methods as $method) {
        $method_str = str_replace("'module_name'", "'$method' AS module_name", $pattern);
        $method_str = str_replace("'type'", "'Z_via_xp' AS type", $method_str);
        $method_str = str_replace("'disable_ccinfo'", "'N' AS disable_ccinfo", $method_str);
        $method_str = str_replace("'background'", "'Y' AS background", $method_str);
        $method_str = str_replace("'processor'", "'via_xp' AS processor", $method_str);

        $ret .= " UNION (SELECT " . $method_str . ")";
    }    

    return $ret;
}

/*
 Example: Return all active_modules/unset phrases from modules/config.php modules/init.php
 functest.func_get_phrases_from_files
*/
function func_get_phrases_from_files($directory, $files, $phrases, $recursive = 'recursive', $output='all')
{
    global $xcart_dir;

    $dir = @opendir($xcart_dir . XC_DS . $directory);
    if (!$dir) return '';

    $result = array();
    while (($file = readdir($dir)) !== false) {
        if ($file == '.' || $file == '..') continue;

        $path = $directory.XC_DS.$file;

        if (
            is_file($xcart_dir . XC_DS .$path)
            && in_array($file, $files)
        ) {
            $content = file_get_contents($xcart_dir . XC_DS .$path);
            preg_match_all("/.*(?:$phrases).*/mi", $content, $arr);
            if ($output == 'all')
                $result[$path] = $arr;
            else    
                $result[$path] = !func_array_empty($arr);
        } elseif(
            is_dir($xcart_dir . XC_DS .$path)
            && $recursive == 'recursive'
        ) {
            $tmp = func_get_phrases_from_files($path, $files, $phrases, $recursive, $output);
            if (!func_array_empty($tmp))
                $result[$path] = $tmp;
        }
    }
    closedir($dir);

    return $result;
}

/**
 * Get all providers from store. Used in templates for PRO X-Cart version. 
 */
function func_get_providers()
{
    global $single_mode, $sql_tbl;

    if (!$single_mode) {
        $providers = func_query("SELECT id, login, title, firstname, lastname FROM $sql_tbl[customers] WHERE usertype='P' ORDER BY login, lastname, firstname");
    }

    settype($providers, 'array');

    return $providers;
}


function func_drop_lng_tables($lng_table, $code='') {
    global $all_languages, $sql_tbl;

    if (empty($code)) {
        // Drop all tables
        $_languages = array_keys($all_languages);
        foreach ($_languages as $_code) {
            db_query("DROP TABLE IF EXISTS {$sql_tbl[$lng_table . $_code]}");
        }
    } else {
        db_query("DROP TABLE IF EXISTS {$sql_tbl[$lng_table . $code]}");
    }

    func_data_cache_clear('sql_tables_fields');

    return true;
}


function func_add_lng_table($lng_table, $code)
{
    global $config, $sql_tbl, $xcart_tbl_prefix;

    $src_table = $sql_tbl[$lng_table . $config['default_admin_language']];
    $dest_table = $xcart_tbl_prefix . $lng_table . $code;
    if ($dest_table == $src_table)
        return true;

    db_query("CREATE TABLE IF NOT EXISTS $dest_table LIKE $src_table");

    func_data_cache_clear('sql_tables_fields');
    return true;
}

function func_delete_entity_from_lng_tables($lng_table, $key='', $key_name='')
{
    global $all_languages, $sql_tbl;

    if (!empty($key))
        $key = is_array($key) ? $key: array($key);

    $_languages = array_keys($all_languages);
    foreach ($_languages as $_code) {
        if (empty($key))
            db_query("DELETE FROM {$sql_tbl[$lng_table . $_code]}");
        else            
            db_query("DELETE FROM {$sql_tbl[$lng_table . $_code]} WHERE $key_name IN ('".implode("','", $key)."')");
    }

    return true;
}

function func_repair_lng_integrity($lng_table, $main_table, $key_name, $def_fields)
{
    global $all_languages, $config, $sql_tbl;

    $defcode = $config['default_admin_language'];
    $_languages = array_keys($all_languages);

    // Delete non-related data from products_lng_.. tables
    foreach ($_languages as $_code) {
        $dest_table = $sql_tbl[$lng_table . $_code];
        db_query("DELETE FROM $dest_table WHERE $key_name NOT IN ( SELECT DISTINCT $key_name FROM $main_table) ");
    }

    $dest_table = $sql_tbl[$lng_table . $defcode];
    $src_table = $main_table;
    // Repair default lng table from xcart_products
    db_query("INSERT INTO $dest_table ( SELECT $key_name, $def_fields FROM $src_table WHERE $key_name NOT IN ( SELECT DISTINCT $key_name FROM $dest_table) )");

    foreach ($_languages as $_code) {
        if ($defcode == $_code)
            continue;

        $dest_table = $sql_tbl[$lng_table . $_code];
        $src_table = $sql_tbl[$lng_table . $defcode];
        
        db_query("INSERT INTO $dest_table ( SELECT * FROM $src_table WHERE $key_name NOT IN ( SELECT DISTINCT $key_name FROM $dest_table) )");
    }

    return true;
}

/**
 * Obtain and parse 'X-Cart News' RSS feed 
 * Data source function for skin/common_files/main/xcart_news.tpl template
 */
function func_tpl_get_xcart_news($toplimit = 0)
{
    global $config;

    if (!is_url($config['rss_xcart_news_url']))
        return array();

    settype($toplimit, 'int');
    if ($data = func_get_cache_func($toplimit, 'tpl_get_xcart_news')) {
        return $data;
    }

    $rss_url = parse_url($config['rss_xcart_news_url']);

    x_load('http','xml');
    list($header, $result) = func_http_get_request($rss_url['host'], $rss_url['path'], @$rss_url['query']);

    if (function_exists('iconv'))
        $result = iconv("UTF-8", "ISO-8859-1//IGNORE", $result);
    
    $parse_error = false;
    $options = array(
        'XML_OPTION_CASE_FOLDING' => 1,
        'XML_OPTION_TARGET_ENCODING' => 'ISO-8859-1'
    );
    $parsed = func_xml_parse($result, $parse_error, $options);

    $news = array();
    if (!empty($parsed)) {
        $items = func_array_path($parsed, 'RSS/CHANNEL/ITEM');

        if (is_array($items)) {
            $i = 0;
            foreach ($items as $item) {
                $news[] = array(
                    'title' => func_array_path($item, '#/TITLE/0/#'),
                    'link' => func_array_path($item, '#/LINK/0/#'),
                    'description' => func_array_path($item, '#/DESCRIPTION/0/#'),
                    'pubDate' => func_array_path($item, '#/PUBDATE/0/#'),
                );
                $i++;

                if (
                    !empty($toplimit)
                    && $i == $toplimit
                ) {
                    break;
                }    
            }
        }
    }

    func_save_cache_func($news, $toplimit, 'tpl_get_xcart_news');
    return $news;
}

?>