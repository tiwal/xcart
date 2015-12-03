{*
$Id: menu_users_online.tpl,v 1.1.2.1 2011/11/02 12:36:19 aim Exp $
vim: set ts=2 sw=2 sts=2 et:
*}
{if $users_online}

  <div class="uo-box">
    <strong>{if $config.Users_online.users_online_note_type eq 'long'}{$lng.lbl_users_online_visited_us|substitute:"N":$config.Users_online.users_online_period}{else}{$lng.lbl_users_online}{/if}:</strong>&nbsp;

    {foreach from=$users_online item=v name="_users"}
      <span class="item nowrap">{$v.count}
        {if $v.usertype eq 'A' or ($v.usertype eq 'P' and $active_modules.Simple_Mode)}
          {$lng.lbl_admin_s}
        {elseif $v.usertype eq 'P'}
          {$lng.lbl_provider_s} 
        {elseif $v.usertype eq 'B'}
          {$lng.lbl_partner_s} 
        {elseif $v.usertype eq 'C' and $v.is_registered eq 'Y'}
          {$lng.lbl_registered_customer_s} 
        {elseif $v.usertype eq 'C' and $v.is_registered eq 'A'}
          {$lng.lbl_anonymous_customer_s}
        {elseif $v.usertype eq 'C' and $v.is_registered eq ''}
          {$lng.lbl_unregistered_customer_s} 
        {/if}
        {if not $smarty.foreach._users.last}, {/if}
      </span>
    {/foreach}

  </div>

{/if}
