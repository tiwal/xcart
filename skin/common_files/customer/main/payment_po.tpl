{*
$Id: payment_po.tpl,v 1.3.2.1 2011/07/15 14:32:47 aim Exp $
vim: set ts=2 sw=2 sts=2 et:
*}

{if $checkout_module eq 'One_Page_Checkout'}
  
    {include file="modules/One_Page_Checkout/payment/po_info.tpl" hide_header="Y"}
  
{else}
  
  <script type="text/javascript">
  //<![CDATA[
  requiredFields = [
    ["PO_Number", "{$lng.lbl_po_number}"],
    ["Company_name", "{$lng.lbl_company_name}"],
    ["Name_of_purchaser", "{$lng.lbl_name_of_purchaser}"],
    ["Position", "{$lng.lbl_position}"]
  ];
  //]]>
  </script>
  
  <table cellspacing="0" class="data-table" summary="{$lng.lbl_po_information|escape}">
  
    {if $hide_header ne "Y"}
      <tr>
        <td class="register-section-title"><label>{$lng.lbl_po_information}</label></td>
      </tr>
    {/if}
  
    <tr>
      <td class="data-name"><label for="PO_Number">{$lng.lbl_po_number}</label></td>
      <td class="data-required">*</td>
      <td><input type="text" size="32" id="PO_Number" name="PO_Number" /></td>
    </tr>
  
    <tr>
      <td class="data-name"><label for="Company_name">{$lng.lbl_company_name}</label></td>
      <td class="data-required">*</td>
      <td><input type="text" size="32" id="Company_name" name="Company_name" /></td>
    </tr>
  
    <tr>
      <td class="data-name"><label for="Name_of_purchaser">{$lng.lbl_name_of_purchaser}</label></td>
      <td class="data-required">*</td>
      <td><input type="text" size="32" id="Name_of_purchaser" name="Name_of_purchaser" /></td>
    </tr>
  
    <tr>
      <td class="data-name"><label for="Position">{$lng.lbl_position}</label></td>
      <td class="data-required">*</td>
      <td><input type="text" size="32" id="Position" name="Position" /></td>
    </tr>
  
  </table>

{/if}
