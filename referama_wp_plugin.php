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
    'visualization' => 'attribute 2 default',
  ), $args ) );


  $html ="alksjdlak.....a$collection_id b.....";
  if ($collection_id != 0){
    $html = <<<EOD
      <h1>...$collection_id</h1>
      <div class="referama_anchor" data-rfm-id="$collection_id" data-rfm-visualization="$visualization"></div>
      <script type='text/javascript'>
        (function() {
            Referama = {};
            Referama.host = "http://localhost:3000/"
            var rfm = document.createElement('script'); rfm.type = 'text/javascript'; rfm.async = true;
            rfm.src = Referama.host + "assets/not_bundled/rfm_loader.js";
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(rfm);
        })();
      </script>
EOD;
  }
  return $html;
}


?>
