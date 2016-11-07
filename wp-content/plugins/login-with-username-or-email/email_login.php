<?php
/*
Plugin Name: Login with Email or Username
Plugin URI: https://www.bcswebsitesolutions.com/downloads/login-with-username-or-email/
Description: Allow users to login with Email or Username while logging in to Wordpress
Version: 2.7
Tested up to: 4.4
License: GPLv2 or later.
Author: BCS Website Solutions
Author URI: https://www.bcswebsitesolutions.com/
Text Domain: login-with-username-or-email
*/
 
add_filter('authenticate', 'bcs_el_login_with_email', 20, 3);

function bcs_el_login_with_email( $user, $username, $password ) {
    if ( is_email( $username ) ) {
        $user = get_user_by_email( $username );
        if ( $user ) $username = $user->user_login;
    }
    return wp_authenticate_username_password(null, $username, $password );
}
 
add_filter( 'gettext', 'bcs_el_showEmailWrap', 20, 3 );

function bcs_el_showEmailWrap( $translated_text, $text, $domain ) {
	
	if ( !empty($_GET['action']) && $_GET['action'] == 'register' && $text == 'Username' ) { 
        return $translated_text;  
    }  


    /*if ( "Username" == $translated_text )
        $translated_text .= __( ' Or Email');
    return $translated_text;*/
	
	$original_text = 'Username';
 $new_text = '/Email';
    if ( $text == $original_text)
        $translated_text .=   __( $new_text, $domain);//$new_text; //$translated_text .=  $new_text;
    return $translated_text;
	
	
	/* if ( 'wp-login.php' != basename( $_SERVER['SCRIPT_NAME'] ) ) {  
            return $translated_text;  
        }  
    
        if ( "Username" == $text ) {  
            $translated_text .= ' '.__( 'or', $domain);  
            $translated_text .= ' '.__( 'Email', $domain);  
        }  
        return $translated_text; */
	
	
}


function bcs_el_wp_admin_area_notice() {
 	  global $current_user ;
 
        $user_id = $current_user->ID;
	if ( is_super_admin() ) {
	 /* Check that the user hasn't already clicked to ignore the message */
	 if ( ! get_user_meta($user_id, 'bcs_login_email') ) {
		 
   echo '<div class="updated  is-dismissible"><p>';
 
        printf(__('Thank You For Installing "Login with Email or Username"  developed by <a href="https://www.bcswebsitesolutions.com" target="_blank">BCS Website Solutions</a>| <a href="%1$s">Hide Notice</a>'), '?login_email_ignore=0');
 
        echo "</p></div>";
	 }
	 }
}
add_action( 'admin_notices', 'bcs_el_wp_admin_area_notice' );

add_action('admin_init', 'bcs_el_login_email_ignore');

function bcs_el_login_email_ignore() {
	global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset($_GET['login_email_ignore']) && '0' == $_GET['login_email_ignore'] ) {
             add_user_meta($user_id, 'bcs_login_email', 'true', true);
	}
}

add_action('admin_init', 'bcs_el_login_email_ignore_ad');

function bcs_el_login_email_ignore_ad() {
	global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset($_GET['login_email_ignore_ad']) && '0' == $_GET['login_email_ignore_ad'] ) {
             add_user_meta($user_id, 'bcs_login_email_ad', 'true', true);
	}
}


function bcs_el_my_admin_notice() { 
global $current_user ;
 
        $user_id = $current_user->ID;
	if ( is_super_admin() ) {
	 /* Check that the user hasn't already clicked to ignore the message */
	 if ( ! get_user_meta($user_id, 'bcs_login_email_ad') ) {
		 ?>
    <div class="updated">
        <?php
		printf(__('<p><img src="https://www.bcswebsiteservices.com/images/Logo-only-50x50.png" style="margin:10px;display:block;" width="40" height="40" align="left" />Looking for a website like no other? You\'re at the right place. BCS Website Services can help your business to develop a web presence that matches your corporate identity, and use the internet to gain new customers and better serve your existing clients.</p><p><a href="https://www.bcswebsiteservices.com" target="_blank">Read More...</a> | <a href="%1$s">Hide Notice</a></p>'), '?login_email_ignore_ad=0');
 
   ?> 
    </div>
    <?php
	 }
	 }
}

/*
function bcs_el_my_admin_notice() { ?>
    <div class="updated">
        <p><?php _e( '<h2>Website Design Richmond Va</h2><p>Looking for a website like no other? You\'re at the right place. We can help your business to develop a web presence that matches your corporate identity, and use the internet to gain new customers and better serve your existing clients.</p><p><a href="https://www.bcswebsiteservices.com" target="_blank">Read More...</a></p>' ); ?></p>
    </div>
    <?php
}*/
add_action( 'admin_notices', 'bcs_el_my_admin_notice' );


add_filter( 'plugin_action_links', 'bcs_el_ad', 10, 2);										// add  link to the plugin admin page
// CALLED ON 'plugin_action_links' ACTION
function bcs_el_ad($links, $file)
{	if ($file == plugin_basename(__FILE__))
		array_push($links, '<a href="https://www.bcswebsitesolutions.com/?page_id=825" target="_blank">Hire us/Contact us</a>');
	return $links;
}