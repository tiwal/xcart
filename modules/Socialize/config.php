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
 * Some definitions for Socialize module
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage Modules
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com>
 * @copyright  Copyright (c) 2001-2012 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @version    $Id: config.php,v 1.1.2.5.2.1 2012/04/06 15:01:57 aim Exp $
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

if (!defined('XCART_START')) {
    header('Location: ../../');
    die('Access denied');
}

$_module_dir = $xcart_dir . XC_DS . 'modules' . XC_DS . 'Socialize';

$fb_langs = array(
    'Catalan' => 'ca_ES',
    'Czech' => 'cs_CZ',
    'Welsh' => 'cy_GB',
    'Danish' => 'da_DK',
    'German' => 'de_DE',
    'Basque' => 'eu_ES',
    'English' => 'en_US',
    'Spanish' => 'es_LA',
    'Finnish' => 'fi_FI',
    'French' => 'fr_FR',
    'Galician' => 'gl_ES',
    'Hungarian' => 'hu_HU',
    'Italian' => 'it_IT',
    'Japanese' => 'ja_JP',
    'Korean' => 'ko_KR',
    'Norwegian' => 'nn_NO',
    'Dutch' => 'nl_NL',
    'Polish' => 'pl_PL',
    'Portuguese' => 'pt_PT',
    'Romanian' => 'ro_RO',
    'Russian' => 'ru_RU',
    'Slovak' => 'sk_SK',
    'Slovenian' => 'sl_SI',
    'Swedish' => 'sv_SE',
    'Thai' => 'th_TH',
    'Turkish' => 'tr_TR',
    'Kurdish' => 'ku_TR',
    'Chinese' => 'zh_CN',
    'Afrikaans' => 'af_ZA',
    'Albanian' => 'sq_AL',
    'Armenian' => 'hy_AM',
    'Azeri' => 'az_AZ',
    'Belarusian' => 'be_BY',
    'Bengali' => 'bn_IN',
    'Bosnian' => 'bs_BA',
    'Bulgarian' => 'bg_BG',
    'Croatian' => 'hr_HR',
    'Dutch' => 'nl_BE',
    'Esperanto' => 'eo_EO',
    'Estonian' => 'et_EE',
    'Faroese' => 'fo_FO',
    'Georgian' => 'ka_GE',
    'Greek' => 'el_GR',
    'Gujarati' => 'gu_IN',
    'Hindi' => 'hi_IN',
    'Icelandic' => 'is_IS',
    'Indonesian' => 'id_ID',
    'Irish' => 'ga_IE',
    'Javanese' => 'jv_ID',
    'Kannada' => 'kn_IN',
    'Kazakh' => 'kk_KZ',
    'Latin' => 'la_VA',
    'Latvian' => 'lv_LV',
    'Limburgish' => 'li_NL',
    'Lithuanian' => 'lt_LT',
    'Macedonian' => 'mk_MK',
    'Malagasy' => 'mg_MG',
    'Malay' => 'ms_MY',
    'Maltese' => 'mt_MT',
    'Marathi' => 'mr_IN',
    'Mongolian' => 'mn_MN',
    'Nepali' => 'ne_NP',
    'Punjabi' => 'pa_IN',
    'Romansh' => 'rm_CH',
    'Sanskrit' => 'sa_IN',
    'Serbian' => 'sr_RS',
    'Somali' => 'so_SO',
    'Swahili' => 'sw_KE',
    'Filipino' => 'tl_PH',
    'Tamil' => 'ta_IN',
    'Tatar' => 'tt_RU',
    'Telugu' => 'te_IN',
    'Malayalam' => 'ml_IN',
    'Ukrainian' => 'uk_UA',
    'Uzbek' => 'uz_UZ',
    'Vietnamese' => 'vi_VN',
    'Xhosa' => 'xh_ZA',
    'Zulu' => 'zu_ZA',
    'Khmer' => 'km_KH',
    'Tajik' => 'tg_TJ',
    'Arabic' => 'ar_AR',
    'Hebrew' => 'he_IL',
    'Urdu' => 'ur_PK',
    'Persian' => 'fa_IR',
    'Syriac' => 'sy_SY',
    'Yiddish' => 'yi_DE',
    'Guaraní' => 'gn_PY',
    'Quechua' => 'qu_PE',
    'Aymara' => 'ay_BO',
    'Northern Sami' => 'se_NO',
    'Pashto' => 'ps_AF',
    'Klingon' => 'tl_ST'
);

/*
  Load module functions
 */
if (!empty($include_func))
    require_once $_module_dir . XC_DS . 'func.php';


/*
  HTTP(S) ddetect
 */
$current_protocol = ($HTTPS ? 'https' : 'http');
$smarty->assign('current_protocol', $current_protocol);

/*
  "Want more?" message drawing
 */

if (func_constant('AREA_TYPE') == 'A' && @$option == 'Socialize') {

    if (!empty($ajax_mode)) {

        switch ($ajax_mode) {
            case 'close':
                db_query("UPDATE $sql_tbl[config] SET value = 'none' WHERE name = 'soc_want_more_box'");
                break;
            case 'open':
                db_query("UPDATE $sql_tbl[config] SET value = 'block' WHERE name = 'soc_want_more_box'");
                break;
        }

        exit();
    }

    $smarty->assign('want_more_box_mode', func_query_first_cell("SELECT value FROM $sql_tbl[config] WHERE name = 'soc_want_more_box'"));

    $want_more_content = func_display('modules/Socialize/want_more.tpl', $smarty, false);

    function func_soc_want_more_drawings($tpl, &$smarty) {

        global $want_more_content;

        $tpl = preg_replace('/<div id="want-more" style="margin: -15px 0;">/', '<div id="want-more" style="margin: -15px 0;">' . $want_more_content, $tpl);

        return $tpl;
    }

    $smarty->register_outputfilter('func_soc_want_more_drawings');
}

/*
  Pin-it button drawings
 */
if (func_constant('AREA_TYPE') == 'C' && !defined('IS_ROBOT') && !defined('QUICK_START')) {

    x_session_register('pinterest_endpoint');

    if (empty($pinterest_endpoint)) {

        $pin_js = func_url_get($current_protocol . '://assets.pinterest.com/js/pinit.js');

        if (!empty($pin_js)) {
            preg_match('/endpoint:[^\"]*\"(.*?)\"/si', $pin_js, $pin_endpoint);
        }

        $pinterest_endpoint = (!empty($pin_endpoint[1]) ? $pin_endpoint[1] : '//d3io1k5o0zdpqr.cloudfront.net/pinit.html');

    }

    $smarty->assign('pinterest_endpoint', $pinterest_endpoint);

}
?>
