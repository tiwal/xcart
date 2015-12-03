{*
$Id: shipping_options.tpl,v 1.1.2.22 2012/03/20 10:43:42 aim Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
{include file="page_title.tpl" title=$lng.lbl_shipping_options}

<br />

{$lng.txt_shipping_options_top_text}

<br /><br />

{include file="check_email_script.tpl"}
{include file="check_zipcode_js.tpl"}

{$lng.lbl_select_service}:
{section name=carrier loop=$carriers}
{if $carriers[carrier].0 eq $carrier}
<b>{$carriers[carrier].1}</b>
{else}
<a href="shipping_options.php?carrier={$carriers[carrier].0}">{$carriers[carrier].1}</a>
{/if}
{if not %carrier.last%}&nbsp;::&nbsp;{/if}
{/section}

<br /><br />

{if $carrier eq "FDX"}

{capture name=dialog}

<div align="right"><a href="shipping.php?carrier=FDX#rt">{$lng.lbl_X_shipping_methods|substitute:"service":"FedEx"}</a></div>

<br />

{if $config.Shipping.FEDEX_account_number ne '' and $config.Shipping.FEDEX_meter_number ne ''}

<br />
<br />

{$lng.txt_fedex_options_note}

<br />
<br />

<form method="post" action="shipping_options.php">
<input type="hidden" name="carrier" value="FDX" />

<table cellpadding="3" cellspacing="1" width="100%">

<tr>
  <td width="30%"><b>{$lng.lbl_fedex_carrier_type}:</b></td>
  <td width="70%">
    <select name="carrier_codes[]" multiple="multiple">
      <option value="FDXE"{if $shipping_options.fdx.carrier_codes.FDXE} selected="selected"{/if}>FedEx Express (FDXE)</option>
      <option value="FDXG"{if $shipping_options.fdx.carrier_codes.FDXG} selected="selected"{/if}>FedEx Ground (FDXG)</option>
      <option value="FXSP"{if $shipping_options.fdx.carrier_codes.FXSP} selected="selected"{/if}>FedEx SmartPost (FXSP)</option>
    </select>
  </td>
</tr>

<tr>
  <td><b>{$lng.lbl_packaging}:</b></td>
  <td>
  <select name="packaging">
    <option value="FEDEX_ENVELOPE"{if $shipping_options.fdx.packaging eq "FEDEX_ENVELOPE"} selected="selected"{/if}>FedEx Envelope</option>
    <option value="FEDEX_PAK"{if $shipping_options.fdx.packaging eq "FEDEX_PAK"} selected="selected"{/if}>FedEx Pak</option>
    <option value="FEDEX_BOX"{if $shipping_options.fdx.packaging eq "FEDEX_BOX"} selected="selected"{/if}>FedEx Box</option>
    <option value="FEDEX_TUBE"{if $shipping_options.fdx.packaging eq "FEDEX_TUBE"} selected="selected"{/if}>FedEx Tube</option>
    <option value="FEDEX_10KG_BOX"{if $shipping_options.fdx.packaging eq "FEDEX_10KG_BOX"} selected="selected"{/if}>FedEx 10Kg Box</option>
    <option value="FEDEX_25KG_BOX"{if $shipping_options.fdx.packaging eq "FEDEX_25KG_BOX"} selected="selected"{/if}>FedEx 25Kg Box</option>
    <option value="YOUR_PACKAGING"{if $shipping_options.fdx.packaging eq "YOUR_PACKAGING"} selected="selected"{/if}>My packaging</option>
  </select>
  </td>
</tr>

<tr>
  <td><b>{$lng.lbl_fedex_dropoff_type}:</b></td>
  <td>
  <select name="dropoff_type">
    <option value="REGULAR_PICKUP"{if $shipping_options.fdx.dropoff_type eq "REGULAR_PICKUP"} selected="selected"{/if}>Regular pickup</option>
    <option value="REQUEST_COURIER"{if $shipping_options.fdx.dropoff_type eq "REQUEST_COURIER"} selected="selected"{/if}>Request courier</option>
    <option value="DROP_BOX"{if $shipping_options.fdx.dropoff_type eq "DROP_BOX"} selected="selected"{/if}>Drop box</option>
    <option value="BUSINESS_SERVICE_CENTER"{if $shipping_options.fdx.dropoff_type eq "BUSINESS_SERVICE_CENTER"} selected="selected"{/if}>Business Service Center</option>
    <option value="STATION"{if $shipping_options.fdx.dropoff_type eq "STATION"} selected="selected"{/if}>Station</option>
  </select>
  </td>
</tr>

<tr>
  <td><b>{$lng.lbl_fedex_ship_date}:</b></td>
  <td>
  <select name="ship_date">
    {section name=num loop=11 start=0}
    <option value="{$smarty.section.num.index}"{if $smarty.section.num.index eq $shipping_options.fdx.ship_date} selected="selected"{/if}>{$smarty.section.num.index}</option>
    {/section}
  </select>
  </td>
</tr>

<tr>
    <td><b>{$lng.lbl_fedex_currency}:</b></td>
    <td>
        <select name="currency_code">
          <option value="USD"{if $shipping_options.fdx.currency_code eq "USD"} selected="selected"{/if}>U.S. Dollars (USD)</option>
          <option value="CAD"{if $shipping_options.fdx.currency_code eq "CAD"} selected="selected"{/if}>Canadian Dollars (CAD)</option>
          <option value="EUR"{if $shipping_options.fdx.currency_code eq "EUR"} selected="selected"{/if}>European Currency Unit (EUR)</option>
          <option value="JYE"{if $shipping_options.fdx.currency_code eq "JYE"} selected="selected"{/if}>Japanese Yen (JYE)</option>
          <option value="UKL"{if $shipping_options.fdx.currency_code eq "UKL"} selected="selected"{/if}>British Pounds (UKL)</option>
          <option value="NOK"{if $shipping_options.fdx.currency_code eq "NOK"} selected="selected"{/if}>Norwegian Kronen (NOK)</option>
          <option value="AUD"{if $shipping_options.fdx.currency_code eq "AUD"} selected="selected"{/if}>Australian Dollars (AUD)</option>
          <option value="HKD"{if $shipping_options.fdx.currency_code eq "HKD"} selected="selected"{/if}>Hong Kong Dollars (HKD)</option>
          <option value="NTD"{if $shipping_options.fdx.currency_code eq "NTD"} selected="selected"{/if}>New Taiwan Dollars (NTD)</option>
          <option value="SID"{if $shipping_options.fdx.currency_code eq "SID"} selected="selected"{/if}>Singapore Dollars (SID)</option>
          <option value="ANG"{if $shipping_options.fdx.currency_code eq "ANG"} selected="selected"{/if}>Antilles Guilder (ANG)</option>
          <option value="RDD"{if $shipping_options.fdx.currency_code eq "RDD"} selected="selected"{/if}>Dominican Peso (RDD)</option>
          <option value="ARN"{if $shipping_options.fdx.currency_code eq "ARN"} selected="selected"{/if}>Argentina Peso (ARN)</option>
          <option value="ECD"{if $shipping_options.fdx.currency_code eq "ECD"} selected="selected"{/if}>E. Caribbean Dollars (ECD)</option>
          <option value="PKR"{if $shipping_options.fdx.currency_code eq "PKR"} selected="selected"{/if}>Pakistan Rupee (PKR)</option>
          <option value="AWG"{if $shipping_options.fdx.currency_code eq "AWG"} selected="selected"{/if}>Aruban Florins (AWG)</option>
          <option value="EGP"{if $shipping_options.fdx.currency_code eq "EGP"} selected="selected"{/if}>Egyptian Pound (EGP)</option>
          <option value="PHP"{if $shipping_options.fdx.currency_code eq "PHP"} selected="selected"{/if}>Philippine Pesos (PHP)</option>
          <option value="SAR"{if $shipping_options.fdx.currency_code eq "SAR"} selected="selected"{/if}>Saudi Arabian Riyals (SAR)</option>
          <option value="BHD"{if $shipping_options.fdx.currency_code eq "BHD"} selected="selected"{/if}>Bahraini Dinars (BHD)</option>
          <option value="BBD"{if $shipping_options.fdx.currency_code eq "BBD"} selected="selected"{/if}>Barbados Dollars (BBD)</option>
          <option value="INR"{if $shipping_options.fdx.currency_code eq "INR"} selected="selected"{/if}>Indian Rupees (INR)</option>
          <option value="WON"{if $shipping_options.fdx.currency_code eq "WON"} selected="selected"{/if}>South Korea Won (WON)</option>
          <option value="BMD"{if $shipping_options.fdx.currency_code eq "BMD"} selected="selected"{/if}>Bermuda Dollars (BMD)</option>
          <option value="JAD"{if $shipping_options.fdx.currency_code eq "JAD"} selected="selected"{/if}>Jamaican Dollars (JAD)</option>
          <option value="SEK"{if $shipping_options.fdx.currency_code eq "SEK"} selected="selected"{/if}>Swedish Krona (SEK)</option>
          <option value="BRL"{if $shipping_options.fdx.currency_code eq "BRL"} selected="selected"{/if}>Brazil Real (BRL)</option>
          <option value="SFR"{if $shipping_options.fdx.currency_code eq "SFR"} selected="selected"{/if}>Swiss Francs (SFR)</option>
          <option value="KUD"{if $shipping_options.fdx.currency_code eq "KUD"} selected="selected"{/if}>Kuwaiti Dinars (KUD)</option>
          <option value="THB"{if $shipping_options.fdx.currency_code eq "THB"} selected="selected"{/if}>Thailand Baht (THB)</option>
          <option value="BND"{if $shipping_options.fdx.currency_code eq "BND"} selected="selected"{/if}>Brunei Dollar (BND)</option>
          <option value="MOP"{if $shipping_options.fdx.currency_code eq "MOP"} selected="selected"{/if}>Macau Patacas (MOP)</option>
          <option value="TTD"{if $shipping_options.fdx.currency_code eq "TTD"} selected="selected"{/if}>Trinidad &amp; Tobago Dollars (TTD)</option>
          <option value="MYR"{if $shipping_options.fdx.currency_code eq "MYR"} selected="selected"{/if}>Malaysian Ringgits (MYR)</option>
          <option value="TRY"{if $shipping_options.fdx.currency_code eq "TRY"} selected="selected"{/if}>Turkish Lira (TRY)</option>
          <option value="CHP"{if $shipping_options.fdx.currency_code eq "CHP"} selected="selected"{/if}>Chilean Pesos (CHP)</option>
          <option value="UAE"{if $shipping_options.fdx.currency_code eq "UAE"} selected="selected"{/if}>Mexican Pesos	NMP (UAE)</option>
          <option value="DHS"{if $shipping_options.fdx.currency_code eq "DHS"} selected="selected"{/if}>Dirhams (DHS)</option>
          <option value="CNY"{if $shipping_options.fdx.currency_code eq "CNY"} selected="selected"{/if}>Chinese Renminbi (CNY)</option>
          <option value="DKK"{if $shipping_options.fdx.currency_code eq "DKK"} selected="selected"{/if}>Denmark Krone (DKK)</option>
          <option value="NZD"{if $shipping_options.fdx.currency_code eq "NZD"} selected="selected"{/if}>New Zealand Dollars (NZD)</option>
          <option value="VEF"{if $shipping_options.fdx.currency_code eq "VEF"} selected="selected"{/if}>Venezuela Bolivar (VEF)</option>
        </select>
    </td>
</tr>

<tr>
    <td colspan="2"><br />{include file="main/subheader.tpl" title=$lng.lbl_fedex_package_limits class="grey"}</td>
</tr>

<tr>
    <td colspan="2">{$lng.txt_fedex_limits_note}</td>
</tr>

<tr>
  <td>
    <b>{$lng.lbl_maximum_package_weight} ({$config.General.weight_symbol}):</b>
  </td>
  <td nowrap="nowrap">
    <input type="text" name="max_weight" value="{$shipping_options.fdx.max_weight|doubleval}" size="7" />
  </td>
</tr>

<tr>
  <td><b>{$lng.lbl_maximum_package_dimensions} ({$config.General.dimensions_symbol}):</b></td>
  <td nowrap="nowrap">
    <table cellpadding="0" cellspacing="1" border="0">
    <tr>
      <td>{$lng.lbl_length}</td>
      <td></td>
      <td>{$lng.lbl_width}</td>
      <td></td>
      <td>{$lng.lbl_height}</td>
    </tr>
    <tr>
      <td><input type="text" name="dim_length" value="{$shipping_options.fdx.dim_length}" size="6" /></td>
      <td>&nbsp;x&nbsp;</td>
      <td><input type="text" name="dim_width" value="{$shipping_options.fdx.dim_width}" size="6" /></td>
      <td>&nbsp;x&nbsp;</td>
      <td><input type="text" name="dim_height" value="{$shipping_options.fdx.dim_height}" size="6" /></td>
    </tr>
    </table>
  </td>
</tr>

<tr>
  <td><label for="param01"><b>{$lng.lbl_fedex_pkg_no_use}:</b></label></td>
  <td><input type="checkbox" name="param01" id="param01" value="Y"{if $shipping_options.fdx.param01 eq "Y" or !$shipping_options.fdx} checked="checked"{/if} /></td>
</tr>

<tr>
  <td><label for="param02"><b>{$lng.lbl_use_maximum_dimensions}:</b></label></td>
  <td><input type="checkbox" name="param02" id="param02" value="Y"{if $shipping_options.fdx.param02 eq "Y"} checked="checked"{/if} /></td>
</tr>

<tr>
    <td colspan="2"><br />{include file="main/subheader.tpl" title=$lng.lbl_fedex_cod class="grey"}</td>
</tr>

<tr>
    <td><b>{$lng.lbl_fedex_cod_value} ({$shipping_options.fdx.currency_code|default:"USD"}):</b></td>
    <td>
        <input type="text" name="cod_value" value="{$shipping_options.fdx.cod_value|default:"0.00"}" />
    </td>
</tr>

<tr>
    <td><b>{$lng.lbl_fedex_cod_type}:</b></td>
    <td>
        <select name="cod_type">
      <option value="ANY"{if $shipping_options.fdx.cod_type eq "ANY"} selected="selected"{/if}>{$lng.lbl_fedex_any}</option>
      <option value="GUARANTEED_FUNDS"{if $shipping_options.fdx.cod_type eq "GUARANTEED_FUNDS"} selected="selected"{/if}>{$lng.lbl_fedex_guaranteed_funds}</option>
      <option value="CASH"{if $shipping_options.fdx.cod_type eq "CASH"} selected="selected"{/if}>{$lng.lbl_fedex_cash}</option>
        </select>
    </td>
</tr>

<tr>
    <td colspan="2"><br />{include file="main/subheader.tpl" title=$lng.lbl_fedex_special_services class="grey"}</td>
</tr>

<tr>
  <td><b>{$lng.lbl_fedex_dangerous_goods}:</b></td>
  <td>
  <select name="dg_accessibility">
    <option value=""{if $shipping_options.fdx.dg_accessibility eq ""} selected="selected"{/if}>&nbsp;</option>
    <option value="ACCESSIBLE"{if $shipping_options.fdx.dg_accessibility eq "ACCESSIBLE"} selected="selected"{/if}>{$lng.lbl_fedex_accessible}</option>
    <option value="INACCESSIBLE"{if $shipping_options.fdx.dg_accessibility eq "INACCESSIBLE"} selected="selected"{/if}>{$lng.lbl_fedex_inaccessible}</option>
  </select>
  </td>
</tr>

<tr>
  <td><b>{$lng.lbl_fedex_signature_option}:</b></td>
  <td>
  <select name="signature">
    <option value=""{if $shipping_options.fdx.signature eq ""} selected="selected"{/if}>&nbsp;</option>
    <option value="NO_SIGNATURE_REQUIRED"{if $shipping_options.fdx.signature eq "NO_SIGNATURE_REQUIRED"} selected="selected"{/if}>{$lng.lbl_fedex_no_signature}</option>
    <option value="INDIRECT"{if $shipping_options.fdx.signature eq "INDIRECT"} selected="selected"{/if}>{$lng.lbl_fedex_signature_indirect}</option>
    <option value="DIRECT"{if $shipping_options.fdx.signature eq "DIRECT"} selected="selected"{/if}>{$lng.lbl_fedex_signature_direct}</option>
    <option value="ADULT"{if $shipping_options.fdx.signature eq "ADULT"} selected="selected"{/if}>{$lng.lbl_fedex_signature_adult}</option>
  </select>
  </td>
</tr>

<tr>
  <td colspan="2">

  <table cellpadding="3" cellspacing="1">

  <tr>
    <td width="10"><input type="checkbox" name="dry_ice" id="dry_ice" value="Y"{if $shipping_options.fdx.dry_ice eq "Y"} checked="checked"{/if} /></td>
    <td width="50%"><b><label for="dry_ice">{$lng.lbl_fedex_dry_ice}</label></b></td>
    <td width="20">&nbsp;</td>
    <td width="10"><input type="checkbox" name="hold_at_location" id="hold_at_location" value="Y"{if $shipping_options.fdx.hold_at_location eq "Y"} checked="checked"{/if} /></td>
    <td width="50%"><b><label for="hold_at_location">{$lng.lbl_fedex_hold_at_location}</label></b></td>
  </tr>

  <tr>
    <td><input type="checkbox" name="inside_pickup" id="inside_pickup" value="Y"{if $shipping_options.fdx.inside_pickup eq "Y"} checked="checked"{/if} /></td>
    <td><b><label for="inside_pickup">{$lng.lbl_fedex_inside_pickup}</label></b></td>
    <td>&nbsp;</td>
    <td><input type="checkbox" name="inside_delivery" id="inside_delivery" value="Y"{if $shipping_options.fdx.inside_delivery eq "Y"} checked="checked"{/if} /></td>
    <td><b><label for="inside_delivery">{$lng.lbl_fedex_inside_delivery}</label></b></td>
  </tr>

  <tr>
    <td><input type="checkbox" name="saturday_pickup" id="saturday_pickup" value="Y"{if $shipping_options.fdx.saturday_pickup eq "Y"} checked="checked"{/if} /></td>
    <td><b><label for="saturday_pickup">{$lng.lbl_fedex_saturday_pickup}</label></b></td>
    <td>&nbsp;</td>
    <td><input type="checkbox" name="saturday_delivery" id="saturday_delivery" value="Y"{if $shipping_options.fdx.saturday_delivery eq "Y"} checked="checked"{/if} /></td>
    <td><b><label for="saturday_delivery">{$lng.lbl_fedex_saturday_delivery}</label></b></td>
  </tr>

  <tr>
    <td valign="top"><input type="checkbox" name="residential_delivery" id="residential_delivery" value="Y"{if $shipping_options.fdx.residential_delivery eq "Y"} checked="checked"{/if} /></td>
    <td><b><label for="residential_delivery">{$lng.lbl_fedex_residential_delivery}</label></b>
    </td>
    <td>&nbsp;</td>
    <td valign="top"><input type="checkbox" name="nonstandard_container" id="nonstandard_container" value="Y"{if $shipping_options.fdx.nonstandard_container eq "Y"} checked="checked"{/if} /></td>
    <td valign="top"><b><label for="nonstandard_container">{$lng.lbl_fedex_nonstandard_container}</label></b></td>
  </tr>

  </table>

  </td>
</tr>

<tr>
    <td colspan="2"><br />{include file="main/subheader.tpl" title=$lng.lbl_additional_charges class="grey"}</td>
</tr>

<tr>
  <td><label for="send_insured_value"><b>{$lng.lbl_fedex_send_insured_value}:</b></label></td>
  <td><input type="checkbox" name="send_insured_value" id="send_insured_value" value="Y"{if $shipping_options.fdx.send_insured_value eq "Y" or !$shipping_options.fdx} checked="checked"{/if} />
</td>
</tr>

<tr>
  <td><b>{$lng.lbl_fedex_handling_amount}:</b></td>
  <td>
  <input type="text" size="10" maxlength="10" name="handling_charges_amount" value="{$shipping_options.fdx.handling_charges_amount|default:"0.00"}" />
  {assign var="fdx_currency_code" value=$shipping_options.fdx.currency_code|default:"USD"}
  <select name="handling_charges_type">
    <option value="FIXED_AMOUNT"{if $shipping_options.fdx.handling_charges_type eq "FIXED_AMOUNT"} selected="selected"{/if}>{$fdx_currency_code}</option>
    <option value="PERCENTAGE_OF_NET_FREIGHT"{if $shipping_options.fdx.handling_charges_type eq "PERCENTAGE_OF_NET_FREIGHT"} selected="selected"{/if}>% of base</option>
    <option value="PERCENTAGE_OF_NET_CHARGE"{if $shipping_options.fdx.handling_charges_type eq "PERCENTAGE_OF_NET_CHARGE"} selected="selected"{/if}>% of net</option>
    <option value="PERCENTAGE_OF_NET_CHARGE_EXCLUDING_TAXES"{if $shipping_options.fdx.handling_charges_type eq "PERCENTAGE_OF_NET_CHARGE_EXCLUDING_TAXES"} selected="selected"{/if}>% of net (excluding taxes)</option>
  </select>

  {include file="main/tooltip_js.tpl" text=$lng.txt_fedex_help_charges_type|substitute:"currency_code":$fdx_currency_code type="img"}
  </td>
</tr>

<tr>
    <td colspan="2"><br />{include file="main/subheader.tpl" title=$lng.lbl_fedex_smartpost_settings class="grey"}</td>
</tr>

<tr>
  <td><label for="add_smartpost_detail"><b>{$lng.lbl_fedex_add_smartpost_detail}:</b></label></td>
  <td><input type="checkbox" name="add_smartpost_detail" id="add_smartpost_detail" value="Y"{if $shipping_options.fdx.add_smartpost_detail eq "Y"} checked="checked"{/if} onclick="javascript:  $('.smartpost_block').css('display', (this.checked ? '': 'none')); "/>
  {include file="main/tooltip_js.tpl" text=$lng.txt_fedex_smartpost_help type="img" id="smart_posthelp" sticky=true}
</td>
</tr>

<tr {if $shipping_options.fdx.add_smartpost_detail ne "Y"}style="display: none;"{/if} class="smartpost_block">
  <td><b>{$lng.lbl_fedex_indicia}:</b></td>
  <td>
  <select name="smartpost_indicia">
    <option value="MEDIA_MAIL"{if $shipping_options.fdx.smartpost_indicia eq "MEDIA_MAIL"} selected="selected"{/if}>MEDIA_MAIL</option>
    <option value="PARCEL_RETURN"{if $shipping_options.fdx.smartpost_indicia eq "PARCEL_RETURN"} selected="selected"{/if}>PARCEL_RETURN</option>
    <option value="PARCEL_SELECT"{if $shipping_options.fdx.smartpost_indicia eq "PARCEL_SELECT"} selected="selected"{/if}>PARCEL_SELECT</option>
    <option value="PRESORTED_BOUND_PRINTED_MATTER"{if $shipping_options.fdx.smartpost_indicia eq "PRESORTED_BOUND_PRINTED_MATTER"} selected="selected"{/if}>PRESORTED_BOUND_PRINTED_MATTER</option>
    <option value="PRESORTED_STANDARD"{if $shipping_options.fdx.smartpost_indicia eq "PRESORTED_STANDARD"} selected="selected"{/if}>PRESORTED_STANDARD</option>
  </select>
  </td>
</tr>

<tr {if $shipping_options.fdx.add_smartpost_detail ne "Y"}style="display: none;"{/if} class="smartpost_block">
  <td><b>{$lng.lbl_fedex_ancillaryendorsement}:</b></td>
  <td>
  <select name="smartpost_ancillaryendorsement">
    <option value=""{if $shipping_options.fdx.smartpost_ancillaryendorsement eq ""} selected="selected"{/if}>&nbsp;</option>
    <option value="ADDRESS_CORRECTION"{if $shipping_options.fdx.smartpost_ancillaryendorsement eq "ADDRESS_CORRECTION"} selected="selected"{/if}>ADDRESS_CORRECTION</option>
    <option value="CARRIER_LEAVE_IF_NO_RESPONSE"{if $shipping_options.fdx.smartpost_ancillaryendorsement eq "CARRIER_LEAVE_IF_NO_RESPONSE"} selected="selected"{/if}>CARRIER_LEAVE_IF_NO_RESPONSE</option>
    <option value="CHANGE_SERVICE"{if $shipping_options.fdx.smartpost_ancillaryendorsement eq "CHANGE_SERVICE"} selected="selected"{/if}>CHANGE_SERVICE</option>
    <option value="FORWARDING_SERVICE"{if $shipping_options.fdx.smartpost_ancillaryendorsement eq "FORWARDING_SERVICE"} selected="selected"{/if}>FORWARDING_SERVICE</option>
    <option value="RETURN_SERVICE"{if $shipping_options.fdx.smartpost_ancillaryendorsement eq "RETURN_SERVICE"} selected="selected"{/if}>RETURN_SERVICE</option>
  </select>
  </td>
</tr>

<tr {if $shipping_options.fdx.add_smartpost_detail ne "Y"}style="display: none;"{/if} class="smartpost_block">
  <td><b>{$lng.lbl_fedex_hubid}:</b></td>
  <td>
  <select name="smartpost_hubid">
    <option value="5303"{if $shipping_options.fdx.smartpost_hubid eq "5303"} selected="selected"{/if}>Atlanta ATGA (5303)</option>
    <option value="5281"{if $shipping_options.fdx.smartpost_hubid eq "5281"} selected="selected"{/if}>Charlotte CHNC (5281)</option>
    <option value="5602"{if $shipping_options.fdx.smartpost_hubid eq "5602"} selected="selected"{/if}>Chicago CIIL (5602)</option>
    <option value="5929"{if $shipping_options.fdx.smartpost_hubid eq "5929"} selected="selected"{/if}>Chino COCA (5929)</option>
    <option value="5751"{if $shipping_options.fdx.smartpost_hubid eq "5751"} selected="selected"{/if}>Dallas DLTX (5751)</option>
    <option value="5802"{if $shipping_options.fdx.smartpost_hubid eq "5802"} selected="selected"{/if}>Denver DNCO (5802)</option>
    <option value="5481"{if $shipping_options.fdx.smartpost_hubid eq "5481"} selected="selected"{/if}>Detroit DTMI (5481)</option>
    <option value="5087"{if $shipping_options.fdx.smartpost_hubid eq "5087"} selected="selected"{/if}>Edison EDNJ (5087)</option>
    <option value="5431"{if $shipping_options.fdx.smartpost_hubid eq "5431"} selected="selected"{/if}>Grove City GCOH (5431)</option>
    <option value="5771"{if $shipping_options.fdx.smartpost_hubid eq "5771"} selected="selected"{/if}>Houston HOTX (5771)</option>
    <option value="5465"{if $shipping_options.fdx.smartpost_hubid eq "5465"} selected="selected"{/if}>Indianapolis ININ (5465)</option>
    <option value="5648"{if $shipping_options.fdx.smartpost_hubid eq "5648"} selected="selected"{/if}>Kansas City KCKS (5648)</option>
    <option value="5902"{if $shipping_options.fdx.smartpost_hubid eq "5902"} selected="selected"{/if}>Los Angeles LACA (5902)</option>
    <option value="5254"{if $shipping_options.fdx.smartpost_hubid eq "5254"} selected="selected"{/if}>Martinsburg MAWV (5254)</option>
    <option value="5379"{if $shipping_options.fdx.smartpost_hubid eq "5379"} selected="selected"{/if}>Memphis METN (5379)</option>
    <option value="5552"{if $shipping_options.fdx.smartpost_hubid eq "5552"} selected="selected"{/if}>Minneapolis MPMN (5552)</option>
    <option value="5531"{if $shipping_options.fdx.smartpost_hubid eq "5531"} selected="selected"{/if}>New Berlin NBWI (5531)</option>
    <option value="5110"{if $shipping_options.fdx.smartpost_hubid eq "5110"} selected="selected"{/if}>Newburgh NENY (5110)</option>
    <option value="5015"{if $shipping_options.fdx.smartpost_hubid eq "5015"} selected="selected"{/if}>Northborough NOMA (5015)</option>
    <option value="5327"{if $shipping_options.fdx.smartpost_hubid eq "5327"} selected="selected"{/if}>Orlando ORFL (5327)</option>
    <option value="5194"{if $shipping_options.fdx.smartpost_hubid eq "5194"} selected="selected"{/if}>Philadelphia PHPA (5194)</option>
    <option value="5854"{if $shipping_options.fdx.smartpost_hubid eq "5854"} selected="selected"{/if}>Phoenix PHAZ (5854)</option>
    <option value="5150"{if $shipping_options.fdx.smartpost_hubid eq "5150"} selected="selected"{/if}>Pittsburgh PTPA (5150)</option>
    <option value="5958"{if $shipping_options.fdx.smartpost_hubid eq "5958"} selected="selected"{/if}>Sacramento SACA (5958)</option>
    <option value="5843"{if $shipping_options.fdx.smartpost_hubid eq "5843"} selected="selected"{/if}>Salt Lake City SCUT (5843)</option>
    <option value="5983"{if $shipping_options.fdx.smartpost_hubid eq "5983"} selected="selected"{/if}>Seattle SEWA (5983)</option>
    <option value="5631"{if $shipping_options.fdx.smartpost_hubid eq "5631"} selected="selected"{/if}>St. Louis STMO (5631)</option>
  </select>
  </td>
</tr>

</table>

<br />
<br />

<input type="submit" value="{$lng.lbl_apply|escape}" name="update_options" />

</form>

{else}

{$lng.txt_fedex_disabled_note}

<br />
<br />

{/if}

{/capture}
{assign var="section_title" value=$lng.lbl_X_shipping_options|substitute:"service":"FedEx"}
{include file="dialog.tpl" content=$smarty.capture.dialog title=$section_title extra='width="100%"'}

{/if}

{if $carrier eq "USPS"}

<script type="text/javascript">
//<![CDATA[
{literal}
$(document).ready( function() {
  $('#value_of_content_type').bind("change", function(event){
    $('#value_of_content_fixed').toggle(this.value == 'fixed_value');
  })
});

{/literal}
//]]>
</script>


{capture name=dialog}

<div align="right"><a href="shipping.php?carrier=USPS#rt">{$lng.lbl_X_shipping_methods|substitute:"service":"U.S.P.S."}</a></div>

<form method="post" action="shipping_options.php">
<input type="hidden" name="carrier" value="USPS" />

<table cellpadding="3" cellspacing="1" width="100%">



<tr>
  <td><label for="param11"><b>{$lng.lbl_usps_pkg_no_use}:</b></label></td>
  <td><input type="checkbox" name="param11" id="param11" value="Y"{if $shipping_options.usps.param11 eq "Y" or !$shipping_options.usps.param11} checked="checked"{/if} /></td>
</tr>

<tr>
  <td><b>{$lng.lbl_maximum_package_weight} ({$config.General.weight_symbol})*:</b></td>
  <td>
    <input type="text" name="max_weight" size="6" value="{$shipping_options.usps.param08|doubleval}"/>
   </td>
</tr>

<tr>
  <td><b>{$lng.lbl_maximum_package_dimensions} ({$config.General.dimensions_symbol})*:</b></td>
  <td nowrap="nowrap">
    <table cellpadding="0" cellspacing="1" border="0">
    <tr>
      <td>{$lng.lbl_length}</td>
      <td></td>
      <td>{$lng.lbl_width}</td>
      <td></td>
      <td>{$lng.lbl_height}</td>
    </tr>
    <tr>
      <td><input type="text" name="dim_length" size="6" value="{$shipping_options.usps.dim_length|doubleval}"/></td>
      <td>&nbsp;x&nbsp;</td>
      <td><input type="text" name="dim_width" size="6" value="{$shipping_options.usps.dim_width|doubleval}" /></td>
      <td>&nbsp;x&nbsp;</td>
      <td><input type="text" name="dim_height" size="6" value="{$shipping_options.usps.dim_height|doubleval}"/></td>
    </tr>
    </table>
  </td>
</tr>

<tr>
  <td><label for="use_maximum_dimensions"><b>{$lng.lbl_use_maximum_dimensions}:</b></label></td>
  <td><input type="checkbox" name="use_maximum_dimensions" id="use_maximum_dimensions" value="Y"{if $shipping_options.usps.param09 eq "Y"} checked="checked"{/if} /></td>
</tr>

<tr>
  <td><b>{$lng.lbl_usps_girth} ({$config.General.dimensions_symbol}):</b></td>
  <td nowrap="nowrap">
<input type="text" name="dim_girth" value="{$shipping_options.usps.dim_girth|escape}" size="7" />
  </td>
</tr>

<tr>
  <td><label for="status_new_method"><b>{$lng.lbl_usps_new_method_status}:</b></label></td>
  <td><input type="checkbox" name="status_new_method" id="status_new_method" value="new_method_is_enabled"{if $shipping_options.usps.param01 eq "new_method_is_enabled"} checked="checked"{/if} /></td>
</tr>

<tr>
  <td><b>{$lng.lbl_shipping_cost_convertion_rate}:</b><br />
  <font class="SmallText">{$lng.txt_shipping_cost_convertion_rate_us_dollars}</font>
  </td>
  <td valign="top"><input type="text" name="currency_rate" size="10" value="{$shipping_options.usps.currency_rate|escape}" /></td>
</tr>

<tr>
  <td colspan="2"><b>*</b> {$lng.txt_usps_limits_note}</td>
</tr>

<tr>
  <td colspan="2"><hr /></td>
</tr>
{*
  International U.S.P.S. section
*}

<tr>
  <td colspan="2"><h3>{$lng.lbl_international_usps}</h3></td>
</tr>

<tr>
  <td width="50%"><b>{$lng.lbl_type_of_mail}:</b></td>
  <td>
  <select name="mailtype">
    <option value="All"{if $shipping_options.usps.param00 eq "All"} selected="selected"{/if}>All</option>
    <option value="Package"{if $shipping_options.usps.param00 eq "Package"} selected="selected"{/if}>Package</option>
    <option value="Postcards or aerogrammes"{if $shipping_options.usps.param00 eq "Postcards or aerogrammes"} selected="selected"{/if}>Postcards or Aerogrammes</option>
    <option value="Envelope"{if $shipping_options.usps.param00 eq "Envelope"} selected="selected"{/if}>Envelope</option>
    <option value="LargeEnvelope"{if $shipping_options.usps.param00 eq "LargeEnvelope"} selected="selected"{/if}>Large Envelope</option>
    <option value="FlatRate"{if $shipping_options.usps.param00 eq "FlatRate"} selected="selected"{/if}>Flat Rate</option>
  </select>
  </td>
</tr>

<tr>
  <td width="50%"><b>{$lng.lbl_usps_value_of_content}:</b></td>
  <td>
  <select name="value_of_content_type" id="value_of_content_type">
    <option value="100%"{if $shipping_options.usps.param07 eq "100%"} selected="selected"{/if}>{$lng.lbl_N_of_order_total|substitute:"percent":"100%"}</option>
    <option value="90%"{if $shipping_options.usps.param07 eq "90%"} selected="selected"{/if}>{$lng.lbl_N_of_order_total|substitute:"percent":"90%"}</option>
    <option value="80%"{if $shipping_options.usps.param07 eq "80%"} selected="selected"{/if}>{$lng.lbl_N_of_order_total|substitute:"percent":"80%"}</option>
    <option value="70%"{if $shipping_options.usps.param07 eq "70%"} selected="selected"{/if}>{$lng.lbl_N_of_order_total|substitute:"percent":"70%"}</option>
    <option value="60%"{if $shipping_options.usps.param07 eq "60%"} selected="selected"{/if}>{$lng.lbl_N_of_order_total|substitute:"percent":"60%"}</option>
    <option value="50%"{if $shipping_options.usps.param07 eq "50%"} selected="selected"{/if}>{$lng.lbl_N_of_order_total|substitute:"percent":"50%"}</option>
    <option value="40%"{if $shipping_options.usps.param07 eq "40%"} selected="selected"{/if}>{$lng.lbl_N_of_order_total|substitute:"percent":"40%"}</option>
    <option value="30%"{if $shipping_options.usps.param07 eq "30%"} selected="selected"{/if}>{$lng.lbl_N_of_order_total|substitute:"percent":"30%"}</option>
    <option value="20%"{if $shipping_options.usps.param07 eq "20%"} selected="selected"{/if}>{$lng.lbl_N_of_order_total|substitute:"percent":"20%"}</option>
    <option value="10%"{if $shipping_options.usps.param07 eq "10%"} selected="selected"{/if}>{$lng.lbl_N_of_order_total|substitute:"percent":"10%"}</option>
    <option value="fixed_value"{if $shipping_options.usps.fixed_value eq "Y"} selected="selected"{/if}>{$lng.lbl_fixed_value}</option>
  </select>
    <input type="text" name="value_of_content_fixed" id="value_of_content_fixed" size="10" {if $shipping_options.usps.fixed_value ne "Y"} value="0" style="display: none;"{else}value="{$shipping_options.usps.param07|default:'0'}"{/if}/>
  </td>
</tr>

<tr>
  <td><b>{$lng.lbl_usps_container3}:</b></td>
  <td>
  <select name="container_intl">
    <option value="RECTANGULAR"{if $shipping_options.usps.param10 eq "RECTANGULAR"} selected="selected"{/if}>Rectangular</option>
    <option value="NONRECTANGULAR"{if $shipping_options.usps.param10 eq "NONRECTANGULAR"} selected="selected"{/if}>Non Rectangular</option>
  </select>
  </td>
</tr>

<tr>
  <td colspan="2"><hr /></td>
</tr>

<tr>
  <td colspan="2"><h3>{$lng.lbl_domestic_usps}</h3></td>
</tr>

<tr>
  <td><b>{$lng.lbl_machinable}:</b></td>
  <td>
  <select name="machinable">
    <option value="FALSE"{if $shipping_options.usps.param02 eq "FALSE"} selected="selected"{/if}>{$lng.lbl_no}</option>
    <option value="TRUE"{if $shipping_options.usps.param02 eq "TRUE"} selected="selected"{/if}>{$lng.lbl_yes}</option>
  </select>
  </td>
</tr>

<tr>
  <td><b>{$lng.lbl_usps_container}:</b></td>
  <td>
  <select name="container_express">
    <option value="None">{$lng.lbl_none}</option>
    <option value="Flat Rate Box"{if $shipping_options.usps.param03 eq "Flat Rate Box"} selected="selected"{/if}>Express Mail Flat Rate Boxes, 13-5/8" x 11-7/8" x 3-3/8", 11" x 8-1/2" x 5-1/2"</option>
    <option value="Flat Rate Envelope"{if $shipping_options.usps.param03 eq "Flat Rate Envelope"} selected="selected"{/if}>Express Mail Flat Rate Envelope, 12.5 x 9.5</option>
    <option value="Legal Flat Rate Envelope"{if $shipping_options.usps.param03 eq "Legal Flat Rate Envelope"} selected="selected"{/if}>Express Mail Legal Flat Rate Envelope, 15 x 9.5</option>
    <option value="RECTANGULAR"{if $shipping_options.usps.param03 eq "RECTANGULAR"} selected="selected"{/if}>Rectangular (Express Mail Large)</option>
    <option value="NONRECTANGULAR"{if $shipping_options.usps.param03 eq "NONRECTANGULAR"} selected="selected"{/if}>Non Rectangular (Express Mail Large)</option>
  </select>
  </td>
</tr>

<tr>
  <td><b>{$lng.lbl_usps_container2}:</b></td>
  <td>
  <select name="container_priority">
    <option value="None">{$lng.lbl_none}</option>
    <option value="Flat Rate Envelope"{if $shipping_options.usps.param04 eq "Flat Rate Envelope"} selected="selected"{/if}>Priority Mail Flat Rate Envelope, 12.5 x 9.5</option>
    <option value="Legal Flat Rate Envelope"{if $shipping_options.usps.param04 eq "Legal Flat Rate Envelope"} selected="selected"{/if}>Priority Mail Legal Flat Rate Envelope, 15 x 9.5</option>
    <option value="Padded Flat Rate Envelope"{if $shipping_options.usps.param04 eq "Padded Flat Rate Envelope"} selected="selected"{/if}>Priority Mail Padded Flat Rate Envelope, 12.5 x 9.5</option>
    <option value="GIFT CARD FLAT RATE ENVELOPE"{if $shipping_options.usps.param04 eq "GIFT CARD FLAT RATE ENVELOPE"} selected="selected"{/if}>Priority Mail Gift Card Flat Rate, 10" x 7"</option>
    <option value="SM FLAT RATE ENVELOPE"{if $shipping_options.usps.param04 eq "SM FLAT RATE ENVELOPE"} selected="selected"{/if}>Priority Mail Small Flat Rate Envelope, 10" x 6"</option>
    <option value="WINDOW FLAT RATE ENVELOPE"{if $shipping_options.usps.param04 eq "WINDOW FLAT RATE ENVELOPE"} selected="selected"{/if}>Priority Mail Window Flat Rate Envelope, 10" x 5"</option>
    <option value="SM FLAT RATE BOX"{if $shipping_options.usps.param04 eq "SM FLAT RATE BOX"} selected="selected"{/if}>Priority Mail Small Flat Rate Box, 8-5/8" x 5-3/8" x 1-5/8"</option>
    <option value="MD FLAT RATE BOX"{if $shipping_options.usps.param04 eq "MD FLAT RATE BOX"} selected="selected"{/if}>Priority Mail Medium Flat Rate Boxes, 11" x 8-1/2" x 5-1/2", 13-5/8" x 11-7/8" x 3-3/8"</option>
    <option value="LG FLAT RATE BOX"{if $shipping_options.usps.param04 eq "LG FLAT RATE BOX"} selected="selected"{/if}>Priority Mail Large Flat Rate Boxes, 12" x 12" x 5-1/2", 23-11/16" x 11-3/4" x 3"</option>
    <option value="REGIONALRATEBOXA"{if $shipping_options.usps.param04 eq "REGIONALRATEBOXA"} selected="selected"{/if}>Priority Mail Regional Box A: weight limit 15 lbs.12-13/16"x10-15/16"x2-3/8",10"x7"x4-3/4"</option>
    <option value="REGIONALRATEBOXB"{if $shipping_options.usps.param04 eq "REGIONALRATEBOXB"} selected="selected"{/if}>Priority Mail Regional Box B: weight limit 20 lbs.15-7/8"x14-3/8"x2-7/8",12"x10-1/4"x5"</option>
    <option value="REGIONALRATEBOXC"{if $shipping_options.usps.param04 eq "REGIONALRATEBOXC"} selected="selected"{/if}>Priority Mail Regional Box C: weight limit 25 lbs.14-3/4" x 11-3/4" x 11-1/2"</option>
    <option value="RECTANGULAR"{if $shipping_options.usps.param04 eq "RECTANGULAR"} selected="selected"{/if}>Rectangular (Priority Mail Large)</option>
    <option value="NONRECTANGULAR"{if $shipping_options.usps.param04 eq "NONRECTANGULAR"} selected="selected"{/if}>Non Rectangular (Priority Mail Large)</option>
  </select>
  </td>
</tr>

<tr>
  <td><b>{$lng.lbl_usps_first_class_mail_type}:</b></td>
  <td>
  <select name="firstclassmailtype">
    <option value="LETTER"{if $shipping_options.usps.param05 eq "LETTER"} selected="selected"{/if}>Letter</option>
    <option value="FLAT"{if $shipping_options.usps.param05 eq "FLAT"} selected="selected"{/if}>Flat</option>
    <option value="PARCEL"{if $shipping_options.usps.param05 eq "PARCEL"} selected="selected"{/if}>Parcel</option>
    <option value="POSTCARD"{if $shipping_options.usps.param05 eq "POSTCARD"} selected="selected"{/if}>PostCard</option>
    <option value="PACKAGE SERVICE"{if $shipping_options.usps.param05 eq "PACKAGE SERVICE"} selected="selected"{/if}>Package Service</option>
  </select>
  </td>
</tr>

<tr>
  <td colspan="2" class="SubmitBox"><input type="submit" value="{$lng.lbl_apply|strip_tags:false|escape}" /></td>
</tr>

</table>
</form>

{/capture}
{assign var="section_title" value=$lng.lbl_X_shipping_options|substitute:"service":"U.S.P.S."}
{include file="dialog.tpl" content=$smarty.capture.dialog title=$section_title extra='width="100%"'}

{/if}

{if $carrier eq "Intershipper"}

{capture name=dialog}

<div align="right"><a href="shipping.php#rt">{$lng.lbl_manage_shipping_methods}</a></div>

<form method="post" action="shipping_options.php">
<input type="hidden" name="carrier" value="Intershipper" />

<table cellpadding="3" cellspacing="1" width="100%">

<tr>
  <td width="40%"><b>{$lng.lbl_type_of_delivery}:</b></td>
  <td>
  <select name="delivery">
    <option value="COM"{if $shipping_options.intershipper.param00 eq "COM"} selected="selected"{/if}>Commercial delivery</option>
    <option value="RES"{if $shipping_options.intershipper.param00 eq "RES"} selected="selected"{/if}>Residential delivery</option>
  </select>
  </td>
</tr>

<tr>
  <td><b>{$lng.lbl_type_of_pickup}:</b></td>
  <td>
  <select name="shipmethod">
    <option value="DRP"{if $shipping_options.intershipper.param01 eq "DRP"} selected="selected" {/if}>Drop of at carrier location</option>
    <option value="SCD"{if $shipping_options.intershipper.param01 eq "SCD"} selected="selected" {/if}>Regularly Scheduled Pickup</option>
    <option value="PCK"{if $shipping_options.intershipper.param01 eq "PCK"} selected="selected" {/if}>Schedule A Special Pickup</option>
  </select>
  </td>
</tr>

<tr>
  <td><b>{$lng.lbl_package_type}:</b></td>
  <td>
  <select name="packaging">
    <option value="BOX"{if $shipping_options.intershipper.param06 eq "BOX"} selected="selected"{/if}>Customer-supplied Box</option>
    <option value="CBX"{if $shipping_options.intershipper.param06 eq "CBX"} selected="selected"{/if}>Carrier Box</option>
    <option value="CPK"{if $shipping_options.intershipper.param06 eq "CPK"} selected="selected"{/if}>Carrier Pak</option>
    <option value="ENV"{if $shipping_options.intershipper.param06 eq "ENV"} selected="selected"{/if}>Carrier Envelope</option>
    <option value="MEM"{if $shipping_options.intershipper.param06 eq "MEM"} selected="selected"{/if}>Media Mail</option>
    <option value="TUB"{if $shipping_options.intershipper.param06 eq "TUB"} selected="selected"{/if}>Carrier Tube</option>
  </select>
  </td>
</tr>

<tr>
  <td><b>{$lng.lbl_nature_of_shipment_contents}:</b></td>
  <td>
  <select name="contents">
    <option value="OTR"{if $shipping_options.intershipper.param07 eq "OTR"} selected="selected"{/if}>Other: Most shipments will use this code</option>
    <option value="LQD"{if $shipping_options.intershipper.param07 eq "LQD"} selected="selected"{/if}>Liquid</option>
    <option value="AHM"{if $shipping_options.intershipper.param07 eq "AHM"} selected="selected"{/if}>Accessible HazMat</option>
    <option value="IHM"{if $shipping_options.intershipper.param07 eq "IHM"} selected="selected"{/if}>Inaccessible HazMat</option>
  </select>
  </td>
</tr>

<tr>
  <td><b>{$lng.lbl_package_cod_value}:</b></td>
  <td><input type="text" name="codvalue" size="10" value="{$shipping_options.intershipper.param08|escape}" /></td>
</tr>

<tr>
  <td><b>{$lng.lbl_optional_services}:</b></td>
  <td>
    <input type="checkbox" name="options[]" value="ADP" {if $shipping_options.intershipper.options.ADP ne ""} checked="checked" {/if}/>Additional Handling<br/>
    <input type="checkbox" name="options[]" value="SDP" {if $shipping_options.intershipper.options.SDP ne ""} checked="checked" {/if}/>Saturday Delivery <br/>
    <input type="checkbox" name="options[]" value="PDP" {if $shipping_options.intershipper.options.PDP ne ""} checked="checked" {/if}/>Proof of Delivery<br/>
  </td>
</tr>

<tr>
  <td>
    <b>{$lng.lbl_maximum_package_weight} ({$config.General.weight_symbol})*:</b>
  </td>
  <td>
    <input type="text" name="weight" size="6" value="{$shipping_options.intershipper.param09|doubleval}"/> ({$lng.lbl_should_not_exceed} {$max_intershipper_weight} {$config.General.weight_symbol})
  </td>
</tr>

<tr>
  <td><b>{$lng.lbl_maximum_package_dimensions} ({$config.General.dimensions_symbol})*:</b></td>
  <td>
    <table cellpadding="0" cellspacing="1" border="0">
    <tr>
      <td>{$lng.lbl_length}</td>
      <td></td>
      <td>{$lng.lbl_width}</td>
      <td></td>
      <td>{$lng.lbl_height}</td>
    </tr>
    <tr>
      <td><input type="text" name="length" size="6" value="{$shipping_options.intershipper.param02|doubleval}"/></td>
      <td>&nbsp;x&nbsp;</td>
      <td><input type="text" name="width" size="6" value="{$shipping_options.intershipper.param03|doubleval}" /></td>
      <td>&nbsp;x&nbsp;</td>
      <td><input type="text" name="height" size="6" value="{$shipping_options.intershipper.param04|doubleval}"/></td>
    </tr>
    </table>
  </td>
</tr>

<tr>
  <td><label for="use_maximum_dimensions"><b>{$lng.lbl_use_maximum_dimensions}:</b></label></td>
  <td><input type="checkbox" name="use_maximum_dimensions" id="use_maximum_dimensions" value="Y"{if $shipping_options.intershipper.param10 eq "Y"} checked="checked"{/if} /></td>
</tr>

<tr>
  <td colspan="2"><b>*</b> {$lng.txt_intershipper_limits_note}</td>
</tr>

<tr>
  <td colspan="2" class="SubmitBox"><input type="submit" value="{$lng.lbl_apply|strip_tags:false|escape}" /></td>
</tr>

</table>
</form>

{/capture}
{assign var="section_title" value=$lng.lbl_X_shipping_options|substitute:"service":"InterShipper"}
{include file="dialog.tpl" content=$smarty.capture.dialog title=$section_title extra='width="100%"'}

{/if}

{if $carrier eq "CPC"}

{capture name=dialog}

<div align="right"><a href="shipping.php?carrier=CPC#rt">{$lng.lbl_X_shipping_methods|substitute:"service":"Canada Post"}</a></div>

<form method="post" action="shipping_options.php">
<input type="hidden" name="carrier" value="CPC" />

<table cellpadding="3" cellspacing="1" width="100%">

<tr>
  <td width="50%"><b>{$lng.lbl_item_description}:</b></td>
  <td><input type="text" name="descr" size="50" value="{$shipping_options.cpc.param00|escape}" /></td>
</tr>

<tr>
  <td><b>{$lng.lbl_cpc_package_insured_value}:</b></td>
  <td><input type="text" name="insvalue" size="10" value="{$shipping_options.cpc.param04|escape}" /></td>
</tr>

<tr>
  <td><b>{$lng.lbl_shipping_cost_convertion_rate}:</b><br />
  <font class="SmallText">{$lng.txt_shipping_cost_convertion_rate}</font>
  </td>
  <td valign="top"><input type="text" name="currency_rate" size="10" value="{$shipping_options.cpc.currency_rate|escape}" /></td>
</tr>

<tr>
  <td><b>{$lng.lbl_maximum_package_dimensions} ({$config.General.dimensions_symbol})*:</b></td>
  <td>
    <table cellpadding="0" cellspacing="1" border="0">
    <tr>
      <td>{$lng.lbl_length}</td>
      <td></td>
      <td>{$lng.lbl_width}</td>
      <td></td>
      <td>{$lng.lbl_height}</td>
    </tr>
    <tr>
      <td><input type="text" name="length" size="6" value="{$shipping_options.cpc.param01|doubleval}"/></td>
      <td>&nbsp;x&nbsp;</td>
      <td><input type="text" name="width" size="6" value="{$shipping_options.cpc.param02|doubleval}" /></td>
      <td>&nbsp;x&nbsp;</td>
      <td><input type="text" name="height" size="6" value="{$shipping_options.cpc.param03|doubleval}"/></td>
    </tr>
    </table>
  </td>
</tr>

<tr>
  <td><label for="use_maximum_dimensions"><b>{$lng.lbl_use_maximum_dimensions}:</b></label></td>
  <td><input type="checkbox" name="use_maximum_dimensions" id="use_maximum_dimensions" value="Y"{if $shipping_options.cpc.param07 eq "Y"} checked="checked"{/if} /></td>
</tr>

<tr>
  <td>
    <b>{$lng.lbl_maximum_package_weight} ({$config.General.weight_symbol})*:</b>
  </td>
  <td>
    <input type="text" name="weight" size="6" value="{$shipping_options.cpc.param06|doubleval}"/> ({$lng.lbl_should_not_exceed} {$max_cpc_weight} {$config.General.weight_symbol})
  </td>
</tr>

<tr>
  <td colspan="2"><b>*</b> {$lng.txt_cpc_limits_note}</td>
</tr>

<tr>
  <td colspan="2" class="SubmitBox"><input type="submit" value="{$lng.lbl_apply|strip_tags:false|escape}" /></td>
</tr>

</table>
</form>

{/capture}
{assign var="section_title" value=$lng.lbl_X_shipping_options|substitute:"service":"Canada Post"}
{include file="dialog.tpl" content=$smarty.capture.dialog title=$section_title extra='width="100%"'}

{/if}

{if $carrier eq "ARB"}

{capture name=dialog}
<form method="post" action="shipping_options.php">
<input type="hidden" name="carrier" value="ARB" />

<table width="100%">

<tr>
  <td width="50%"><b>{$lng.lbl_arb_pkgtype}:</b></td>
  <td width="50%">
  <select name="param00">
    <option value="P"{if $shipping_options.arb.param00 eq "P"} selected="selected"{/if}>Package</option>
    <option value="L"{if $shipping_options.arb.param00 eq "L"} selected="selected"{/if}>Letter</option>
  </select>
  </td>
</tr>

<tr>
  <td width="50%"><b>{$lng.lbl_arb_shipdays}:</b></td>
  <td><input type="text" name="param01" size="10" value="{$shipping_options.arb.param01|escape}" /></td>
</tr>

<tr>
  <td><b>{$lng.lbl_shipping_cost_convertion_rate}:</b><br />
  <font class="SmallText">{$lng.txt_shipping_cost_convertion_rate_us_dollars}</font>
  </td>
  <td valign="top"><input type="text" name="currency_rate" size="10" value="{$shipping_options.arb.currency_rate|escape}" /></td>
</tr>

<tr valign="top">
  <td width="50%"><b>{$lng.lbl_arb_ap_type}:</b></td>
  <td width="50%">
  <select name="param05">
    <option value="NR" {if $shipping_options.arb.param05 eq "NR"} selected="selected"{/if}>Not required</option>
    <option value="AP" {if $shipping_options.arb.param05 eq "AP"} selected="selected"{/if}>Asset Protection</option>
  </select>
  </td>
</tr>

<tr>
  <td width="50%"><b>{$lng.lbl_arb_ap_value}:</b></td>
  <td><input type="text" name="param06" size="10" value="{$shipping_options.arb.param06|escape}" /></td>
</tr>

<tr>
  <td width="50%"><b>{$lng.lbl_arb_haz}:</b></td>
  <td><input type="checkbox" name="opt_haz" value="Y"{if $shipping_options.arb.opt_haz eq "Y"} checked="checked"{/if} /></td>
</tr>

<tr>
  <td width="50%"><b>{$lng.lbl_arb_codpmt}:</b></td>
  <td>
  <select name="param08">
    <option value="M"{if $shipping_options.arb.param08 eq "M"} selected="selected"{/if}>Cashier's Check or Money Order</option>
    <option value="P"{if $shipping_options.arb.param08 eq "P"} selected="selected"{/if}>Personal or Company Check</option>
  </select>
  </td>
</tr>

<tr>
  <td width="50%"><b>{$lng.lbl_arb_codval}:</b></td>
  <td><input type="text" name="param09" size="10" value="{$shipping_options.arb.param09|escape}" /></td>
</tr>

<tr>
  <td width="50%"><b>{$lng.lbl_arb_opt_own_account}:</b></td>
  <td><input type="checkbox" name="opt_own_account" value="Y"{if $shipping_options.arb.opt_own_account eq "Y"} checked="checked"{/if} /></td>
</tr>

<tr>
  <td width="50%"><b>{$lng.lbl_maximum_package_weight} ({$config.General.weight_symbol})*:</b></td>
  <td><input type="text" name="param10" size="10" value="{$shipping_options.arb.param10|doubleval}" />({$lng.lbl_should_not_exceed} {$max_arb_weight} {$config.General.weight_symbol})</td>
</tr>

<tr>
  <td><b>{$lng.lbl_maximum_package_dimensions} ({$config.General.dimensions_symbol})*:</b></td>
  <td>
    <table cellpadding="0" cellspacing="1" border="0">
    <tr>
      <td>{$lng.lbl_length}</td>
      <td></td>
      <td>{$lng.lbl_width}</td>
      <td></td>
      <td>{$lng.lbl_height}</td>
    </tr>
    <tr>
      <td><input type="text" name="param02" size="6" value="{$shipping_options.arb.param02|doubleval}" /></td>
      <td>&nbsp;x&nbsp;</td>
      <td><input type="text" name="param03" size="6" value="{$shipping_options.arb.param03|doubleval}" /></td>
      <td>&nbsp;x&nbsp;</td>
      <td><input type="text" name="param04" size="6" value="{$shipping_options.arb.param04|doubleval}" /></td>
    </tr>
    </table>
  </td>
</tr>

<tr>
  <td><label for="param11"><b>{$lng.lbl_use_maximum_dimensions}:</b></label></td>
  <td><input type="checkbox" name="param11" id="param11" value="Y"{if $shipping_options.arb.param11 eq "Y"} checked="checked"{/if} /></td>
</tr>

<tr>
  <td colspan="2"><b>*</b> {$lng.txt_arb_limits_note}</td>
</tr>

<tr>
  <td colspan="2" class="SubmitBox"><input type="submit" value="{$lng.lbl_apply|strip_tags:false|escape}" /></td>
</tr>

</table>
</form>
{/capture}
{assign var="section_title" value=$lng.lbl_X_shipping_options|substitute:"service":"Airborne / DHL"}
{include file="dialog.tpl" content=$smarty.capture.dialog title=$section_title extra='width="100%"'}

{/if}

{if $carrier eq "APOST"}

{capture name=dialog}
<form method="post" action="shipping_options.php">
<input type="hidden" name="carrier" value="APOST" />

<table width="100%">

<tr>
  <td>
    <b>{$lng.lbl_maximum_package_weight} ({$config.General.weight_symbol}):</b>
  </td>
  <td>
    <input type="text" name="param04" size="6" value="{$shipping_options.apost.param04|doubleval}" /></td>
</tr>

<tr>
  <td><b>{$lng.lbl_shipping_cost_convertion_rate}:</b><br />
  <font class="SmallText">{$lng.txt_shipping_cost_convertion_rate_au_dollars}</font>
  </td>
  <td valign="top"><input type="text" name="currency_rate" size="10" value="{$shipping_options.apost.currency_rate|escape}" /></td>
</tr>

<tr>
  <td><b>{$lng.lbl_maximum_package_dimensions} ({$config.General.dimensions_symbol}):</b></td>
  <td>
    <table cellpadding="0" cellspacing="1" border="0">
    <tr>
      <td>{$lng.lbl_length}</td>
      <td></td>
      <td>{$lng.lbl_width}</td>
      <td></td>
      <td>{$lng.lbl_height}</td>
    </tr>
    <tr>
      <td><input type="text" name="param00" size="6" value="{$shipping_options.apost.param00|doubleval}" /></td>
      <td>&nbsp;x&nbsp;</td>
      <td><input type="text" name="param01" size="6" value="{$shipping_options.apost.param01|doubleval}" /></td>
      <td>&nbsp;x&nbsp;</td>
      <td><input type="text" name="param02" size="6" value="{$shipping_options.apost.param02|doubleval}" /></td>
    </tr>
    </table>
  </td>
</tr>

<tr>
  <td width="50%"><b>{$lng.lbl_apost_pkg_no_use}:</b></td>
  <td><input type="checkbox" name="param03" value="Y"{if $shipping_options.apost.param03 eq "Y" or !$shipping_options.apost} checked="checked"{/if} /></td>
</tr>

<tr>
  <td><label for="param05"><b>{$lng.lbl_use_maximum_dimensions}:</b></label></td>
  <td><input type="checkbox" name="param05" id="param05" value="Y"{if $shipping_options.apost.param05 eq "Y"} checked="checked"{/if} /></td>
</tr>

<tr>
    <td colspan="2"><b>{$lng.lbl_note}</b>: {$lng.txt_apost_limits_note}</td>
</tr>

<tr>
  <td colspan="2" class="SubmitBox"><input type="submit" value="{$lng.lbl_apply|strip_tags:false|escape}" /></td>
</tr>
</table>
</form>

{/capture}
{assign var="section_title" value=$lng.lbl_X_shipping_options|substitute:"service":"Australia Post"}
{include file="dialog.tpl" content=$smarty.capture.dialog title=$section_title extra='width="100%"'}

{/if}
