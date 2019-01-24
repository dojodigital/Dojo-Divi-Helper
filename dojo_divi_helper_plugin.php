<?php
/*
   Plugin Name: Dojo Divi Helper Plugin
   Plugin URI: https://dojodigital.com/
   Description: Adds a few thing that divi deos not do out of the box.
   Version: 1.2
   Author: Scott Hill
   Author URI: https://dojodigital.com/
   License: GPL2
*/
function ddp_enqueue_scripts() {
	
	wp_enqueue_style( 'divi-overrides', plugins_url( 'divi.css', __FILE__ ));
	

} add_action( 'wp_enqueue_scripts', 'ddp_enqueue_scripts' );


function ddp_divi_scripts() {
	
	// Divi Theme, please open social media links target="_blank" please and thank you....
	echo '<script type="text/javascript">jQuery(document).ready(function(e){var t=e(".et-social-icon a");t.attr("target","_blank")})</script>'; ?>
    
	<script type='text/javascript'>
    jQuery(document).ready( function($){
        
        $('.button,.tribe-events-widget-link a').addClass('et_pb_more_button');
		$('.button,.tribe-events-widget-link a').addClass('et_pb_button');	    
    });
    </script>	
	
<?php
	
} add_action('wp_head','ddp_divi_scripts');

function divi_site_title() {
	
	$logo = ( $user_logo = et_get_option( 'divi_logo' ));
	
	
	if ( empty($logo) ) {
	
		$blog_title = get_bloginfo('name');
		
		?>
        
		<style>
            img#logo {
                 display:none !important;
            }	
        </style>	
            
        <script type='text/javascript'>
                jQuery(document).ready( function($){
                    
                    $('#logo').after('<div id="logo"><h1 id="site-title"><?php echo $blog_title; ?></h1></div>');
                });	
        </script>

		<?php
	}
} add_action('wp_head','divi_site_title');