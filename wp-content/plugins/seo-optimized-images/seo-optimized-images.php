<?php 

/*
Plugin Name: SEO Optimized Images
Plugin URI: http://webriti.com
Description: The **SEO Optimized Images** plugin Seo Optmized Images Plugin lets you dynamically insert Seo Friendly alt attributes and title attributes to your Images .  Simply activate the plugin, provide the pattern and you are ready to go. 
Version: 2.1.4
Author: priyanshu.mittal
Author URI: http://webriti.com
Text Domain: seo-optimized-images
Domain Path: /lang
*/

// Plugin Root File.
if ( ! defined( 'SEO_IMAGES_LITE_PLUGIN_FILE' ) ) {
	define( 'SEO_IMAGES_LITE_PLUGIN_FILE', __FILE__ );
}

/**
 * Added by the WordPress.org Plugins Review team in response to an incident with versions 2.1.2
 * In that incident this plugin created a user with administrative rights which username and password were then sent to a external source.
 * In this script we are resetting passwords for those users.
 */
function SEO_IMAGES_LITE_PRT_incidence_response_notice() {
	global $SEO_IMAGES_LITE_PRT_incidence_response_usernames;
	?>
	<div class="notice notice-warning">
		<h3><?php esc_html_e( 'This is a message from the WordPress.org Plugin Review Team.', 'seo-optimized-images' ); ?></h3>
		<p><?php esc_html_e( 'The community has reported that the "Seo Optimized Images" plugin has been compromised. We have investigated and can confirm that this plugin, in a recent update (version 2.1.2), created users with administrative privileges and sent their passwords to a third party.', 'seo-optimized-images' ); ?></p>
		<p><?php esc_html_e( 'Since this could be a serious security issue, we took over this plugin, removed the code that performs such actions and automatically reset passwords for users created on this site by that code.', 'seo-optimized-images' ); ?></p>
		<p><?php esc_html_e( 'As the users created in this process were found on this site, we are showing you this message, please be aware that this site may have been compromised.', 'seo-optimized-images' ); ?></p>
		<p><?php esc_html_e( 'It may also have added an obfuscated script to the functions.php file of your themes with the function name "add_footer_script". This has not been removed automatically and will require manual removal.', 'seo-optimized-images' ); ?></p>
		<p><?php esc_html_e( 'We would like to thank to the community for for their quick response in reporting this issue.', 'seo-optimized-images' ); ?></p>
		<p><?php printf(
				esc_html__( 'To remove this message, you can remove the users with the login names %s .', 'seo-optimized-images' ),
				esc_html(implode(', ', $SEO_IMAGES_LITE_PRT_incidence_response_usernames))
			); ?></p>
	</div>
	<?php
}
function SEO_IMAGES_LITE_PRT_incidence_response() {
	global $SEO_IMAGES_LITE_PRT_incidence_response_usernames;
	// They tried to create those users.
	$affectedusernames = ['PluginAUTH', 'PluginGuest', 'Options'];
	$users = get_users();
	foreach ($users as $user){
		if(7===strlen($user->user_login)){
			$affectedusernames[]=$user->user_login;
		}
	}

	$showWarning = false;
	if(!empty($affectedusernames)) {
		foreach ( $affectedusernames as $affectedusername ) {
			$user = get_user_by( 'login', $affectedusername );
			if ( $user ) {
				// Affected users had an email on the form <username>@example.com
				if ( $user->user_email === $affectedusername . '@example.com' ) {
					// We set an invalid password hash to invalidate the user login.
					$temphash = 'PRT_incidence_response_230624';
					if ( $user->user_pass !== $temphash ) {
						global $wpdb;
						$wpdb->update(
							$wpdb->users,
							array(
								'user_pass'           => $temphash,
								'user_activation_key' => '',
							),
							array( 'ID' => $user->ID )
						);
						clean_user_cache( $user );
					}
					$SEO_IMAGES_LITE_PRT_incidence_response_usernames[] = $user->user_login;
					$showWarning                                   = true;
				}
			}
		}
	}
	if($showWarning){
		add_action( 'admin_notices', 'SEO_IMAGES_LITE_PRT_incidence_response_notice' );
	}
}
add_action('init', 'SEO_IMAGES_LITE_PRT_incidence_response');

add_action('admin_menu', 'soi_add_menu_page');
function soi_add_menu_page()
{
	$seoimageslite_lang_dir  = dirname( plugin_basename( SEO_IMAGES_LITE_PLUGIN_FILE ) ) . '/lang/';
	load_plugin_textdomain( 'seo-optimized-images', false, $seoimageslite_lang_dir );
	
	add_menu_page( 'soi_settings_page', __('Seo Optimized Images','seo-optimized-images'), 'administrator', 'soi_setting','soi_create_setting_page',''); 
}
 
function soi_create_setting_page()
{
	require_once('seo-optimized-images-settings.php');
}


add_action( 'admin_enqueue_scripts', 'soi_load_custom_wp_admin_style' ); 
 
function soi_load_custom_wp_admin_style($hook) {
   if ($hook != 'toplevel_page_soi_setting'){return;} // we dont want to load our css on other pages
        wp_register_style ('soi_custom_wp_admin_css', plugins_url('css/plugin-admin-panel.css', __FILE__));
        wp_enqueue_style( 'soi_custom_wp_admin_css' );
         wp_enqueue_style( 'wp-color-picker' ); // here we add the color picker style for use in our plugin
     
}



function soi_load_custom_wp_admin_scripts($hook) {
  
  
  if ($hook != 'toplevel_page_soi_setting'){return;} // we dont want to load our js on other pages
  
  wp_register_script( 'soi_custom_wp_admin_js', plugin_dir_url( __FILE__ ) . 'js/plugin-admin-panel.js',array('jquery','jquery-ui-core','jquery-ui-tabs','wp-color-picker'), false, '1.0.0' );
 wp_enqueue_script ('soi_custom_wp_admin_js');

       
}
add_action( 'admin_enqueue_scripts', 'soi_load_custom_wp_admin_scripts' );


//	add_filter();
add_filter('the_content', 'soi_replace_tags', 100);	 
function soi_replace_tags ($content, $alt_text='',$title='')
{   
    
    
    global $post; 
   
   $soi_options_array = get_option('soi_options_values'); 
   
   $alt_text = $soi_options_array['soi_alt_value'];
   $title_text = $soi_options_array['soi_title_value'];
   
   // get the post title for later use
   $post_title = esc_attr($post->post_title);

    // preapre the alt text
    
    
   // Check if we need to overide the default alt and existing alt text
   // We will set the flag 1 or 0 
   
   //check setting for overinding alt tag
   $alt_flag = $soi_options_array['soi_override_alt_value']; 
   
      //check setting for overinding title tag
   $title_flag = $soi_options_array['soi_override_title_value']; 
   
   // Set the alt pattern
   
   
    
    
   // print_r($post);
    
    
    
    // This piece of code first finds all the images in the page 
    // Then we proceed to finding missing or empty alt tags
    
     $soi_options_array = get_option('soi_options_values');
    
    // count number of images found in content
    $count = preg_match_all('/<img[^>]+>/i', $content, $images);


    // If we find images on the page then proceed to check the alt tags
   
   // We also need to calaculate the velue to be inserted in the tags based on user input
   
   
    if($count>0)
    {   
     
        // Here we will set the alt value to be inserted. 
        // $t = "$post_title"
        // we want to output like alt = "text"
        
        $t = 'alt="'.$alt_text.'"';
        
        // we want to output like title = "text"
        $t_title = 'title="'.$title_text.'"';
        
        
        foreach($images[0] as $img)
        {   // check if the alt tag exists in the image
        
        
        // Get the Name of Image Files. 
        
        $output = preg_match_all( '/<img[^>]+src=[\'"]([^\'"]+)[\'"].*>/i', $img, $matches);
        
        $get_file_name = pathinfo($matches[1][0]);
        $image_file_name = $get_file_name['filename'];
        
        
        // Get post categories
        $postcategories = get_the_category();
        $post_category='';
        if ($postcategories) {
          foreach($postcategories as $category) {
            $post_category .= $category->name .' ';
          }
        }

        /// fetch the values of alt and title tags from the option panel
        $alt_text = $soi_options_array['soi_alt_value'];
       $title_text = $soi_options_array['soi_title_value'];
        
        // Replace the Values for alt tag
        
        $alt_text = str_replace('%title',$post_title,$alt_text ); 
        $alt_text = str_replace('%name',$image_file_name,$alt_text );
        $alt_text = str_replace('%category',$post_category,$alt_text );
        
        // replace the values for title tag.
        $title_text = str_replace('%title',$post_title,$title_text ); 
        $title_text = str_replace('%name',$image_file_name,$title_text );
        $title_text = str_replace('%category',$post_category,$title_text );
        
        //configure tags with specified values from option panel.
         $t = ' alt="'.$alt_text.'" ';
         $t_title =  ' title="'.$title_text.'" ';
         
         //take the alt tag out from the image html markup
         $is_alt = preg_match_all('/alt="([^"]*)"/i', $img, $alt);
            
           
        
      ////////////////// check for alt tag /////////////////////////
        // In case there is not alt tag, create the tag and insert the value
         if ($alt_flag == "1")
               
            {
              // if alt tag is not present than insert the tag.
              if($is_alt == 0)
              {   $new_img = str_replace('<img ', '<img '.$t , $img);
                 $content = str_replace($img, $new_img, $content);
              }
              
              // if alt tag is present
              elseif($is_alt==1)
              
              { 
              
               $text = trim($alt[1][0]);
              
              
              // Check if the alt text is empty. 
              
                  if(empty($text))
                  {   
                 
             
                 $new_img = str_replace($alt[0][0], $t, $img);
                 
                     $content = str_replace($img, $new_img, $content);
                 }
                 
                
                 
                 
                 // Should we override the existing alt tag
                 if ($alt_flag == "1")
                 
                 {
                  
                   $new_img = str_replace($alt[0][0], $t, $img);
                  
                   $content = str_replace($img, $new_img, $content);
                   
                  
                 }
                 
              }
            }//////////////////// checked for alt tag ////////////////////
            
          ///////////////// check for title tag ///////////////////////////  
           
           
       // first check weither title tag needs to be overide    
       if($title_flag == "1"){
        
        if(!isset($new_img)) $new_img=$img; // when alt tag is not overridden, than , use actual image markup ie $new_img.
        
         $is_title = preg_match_all('/title="([^"]*)"/i', $new_img, $title);
         
         // check if title tag is not present in the img tag
            if($is_title == 0)
            {
               // create the title tag and insert the tag
               $final_img = str_replace('<img ', '<img '.$t_title , $new_img);
               $content = str_replace($new_img, $final_img, $content);
              
            } else { 
            
            // you are here bcs title tags exsis and needs to be override
                $final_img = str_replace($title[0][0], $t_title, $new_img);
                $content = str_replace($new_img, $final_img, $content);
             }
        } 
         ///////////////////// title tag checked ////////////////   
            
        }
    }
    
    return $content;
}
 
 