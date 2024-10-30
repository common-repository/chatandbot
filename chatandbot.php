<?php

/**
 * Plugin Name: Live Chat and ChatBot - ChatAndBot
 * Description: Live chat for websites
 * Plugin URI:  https://chatandbot.com
 * Author:      ChatAndBot
 * Version:     1.2
 *
 * Text Domain: chatandbot
 * Domain Path: /languages
 * Requires at least: 3
 *
 * License:     GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html

 */
 
register_activation_hook( __FILE__, 'chatandbot_plugin_activation'  );


register_deactivation_hook( __FILE__, 'chatandbot_plugin_deactivation'  );
 
 
 add_action('init', 'chatandbot_init');
 
 
 add_action('admin_menu','chatandbot_menu');
 
 
 add_action('admin_init','chatandbot_register_setting');
 
 add_action('wp_footer', 'add_chatandbot_js');

function chatandbot_init()
{
 
    load_plugin_textdomain('chatandbot', false, dirname(plugin_basename(__FILE__)) . '/languages');
 
}

 
 function chatandbot_register_setting(){
  
  register_setting('chatandbot', 'plugin_id');
}

 
 
function chatandbot_menu(){
 add_options_page(__('ChatAndBot Settings Page','chatandbot'),__('ChatAndBot Settings','chatandbot'),'manage_options','chatandbot-settings','fn_chatandbot_settings_page');

}

function fn_chatandbot_settings_page(){
 
 ?>
 <div class="wrap">
   <h2><?php _e('ChatAndBot Settings','chatandbot') ?></h2>
   <form method="post" action="options.php">
     <?php settings_fields('chatandbot'); ?>
     <table class="form-table" style="margin-top: 1.5em;">
       <tr >
         <th  valign="top" style="text-align:left; padding:0px;" scope="row"><?php _e('Plugin ID','chatandbot') ?>  </th>
         </tr><tr >
         <td style="text-align:left; padding:0px;"> <input  type="text" name="plugin_id" style="width:90%;"  value="<?php echo esc_attr(get_option('plugin_id')); ?>"></td>
       </tr>
       <tr>
         <td  style="text-align:left; padding-top:1px; font-weight:bold;"><?php _e('In your account on chatandbot.com copy the plugin id and paste it into this field.','chatandbot') ?> </td>
       </tr>
     </table>
     <p class="submit">
      <input type="submit" class="button-primary" value=<?php _e('Save Change','chatandbot') ?>>
     </p>
   </form>
 </div>
 
 <?php
}

function chatandbot_plugin_activation(){}

function chatandbot_plugin_deactivation(){
 echo 'Deactivated';
}


function add_chatandbot_js()
{

 
 $plugin_id_arr=explode('124wedf239_', get_option('plugin_id'));
 
 if(isset($plugin_id_arr[1]) ){
  
    echo "<script async='true' type='text/javascript'>(function () { var _id = ". esc_attr($plugin_id_arr[0])."; var _aid = '".esc_attr($plugin_id_arr[1])."'; var d = document;var cab_user_param ='';var w = window;var title = encodeURIComponent(d.title); var url = w.location.origin+w.location.pathname;   var _date = Date.now();var width=document.documentElement.clientWidth;  var height=document.documentElement.clientHeight; function l(){ var s = document.createElement('script');s.type = 'text/javascript'; s.async = true;s.src = 'https://chatandbot.com/erl/web333?width='+width+'&height='+height+cab_user_param+'&get_fr=1&title='+title+'&sid='+_id+'&aid='+_aid+'&date='+_date+'&url='+url;var ss = document.getElementsByTagName('script')[0];ss.parentNode.insertBefore(s, ss);}if (d.readyState == 'complete') {l();} else {if (w.attachEvent) {w.attachEvent('onload', l);} else { w.addEventListener('load', l, false);}}})()</script>";

 }
 

}

