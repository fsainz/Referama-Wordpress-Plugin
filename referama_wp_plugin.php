<?php
/*
Plugin Name: Referama Wordpress Plugin
Plugin URI: http://www.referama.com
Description: Integrates Referama into your Wordpress
Version: 0.2
Author: Referama
Author URI: http://www.referama.com
License: GPL2
 */

add_shortcode('referama', 'referama_embed');

function referama_embed($args){    
  extract( shortcode_atts( array(
    'collection_id' => 0,
    'visualization' => 'people1',
  ), $args ) );

  if ( defined('REFERAMA_DEV')==true ){
    $referama_host = 'http://localhost:3000/';
  }else{
    $referama_host = 'http://www.referama.com/';
  }

  $html ="";
  if ($collection_id != 0){
    $html = <<<EOD
      <div class="referama_anchor" data-rfm-id="$collection_id" data-rfm-visualization="$visualization"></div>
      <script type='text/javascript'>
        (function() {
            Referama = {};
            Referama.host = "//localhost/";
            var rfm = document.createElement('script'); rfm.type = 'text/javascript'; rfm.async = true;
            rfm.src = Referama.host + "javascripts/rfm_loader.js";
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(rfm);
        })();
      </script>
EOD;
    if ($visualization != 'widget'){
      $html = $html."<div class='powered_by_referama'> Powered by <a href='http://www.referama.com' target='_blank'>Referama</a> </div>";
    }
  }
  return $html;
}


?>
