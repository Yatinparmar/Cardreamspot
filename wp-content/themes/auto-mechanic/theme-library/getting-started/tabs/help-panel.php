<?php
/**
 * Help Panel.
 *
 * @package auto_mechanic
 */
?>

<div id="help-panel" class="panel-left visible">

    <div id="#help-panel" class="steps">  
        <h4><?php esc_html_e( 'Quick Setup for Home Page', 'auto-mechanic' ); ?></h4>
        <hr class="quick-set">
        <p><?php esc_html_e( '1) Go to the dashboard. navigate to pages, add a new one, and label it "home" or whatever else you like.The page has now been created.', 'auto-mechanic' ); ?></p>
        <p><?php esc_html_e( '2) Go back to the dashboard and then select Settings.', 'auto-mechanic' ); ?></p>
        <p><?php esc_html_e( '3) Then Go to readings in the setting.', 'auto-mechanic' ); ?></p>
        <p><?php esc_html_e( '4) There are 2 options your latest post or static page.', 'auto-mechanic' ); ?></p>
        <p><?php esc_html_e( '5) Select static page and select from the dropdown you wish to use as your home page, save changes.', 'auto-mechanic' ); ?></p>
        <p><?php esc_html_e( '6) You can set the home page in this manner.', 'auto-mechanic' ); ?></p>
        <hr>
        <h4><?php esc_html_e( 'Setup Slider Section', 'auto-mechanic' ); ?></h4>
        <hr class="quick-set">
         <p><?php esc_html_e( '1) Go to Appereance > then Go to Customizer.', 'auto-mechanic' ); ?></p>
         <p><?php esc_html_e( '2) In Customizer > Go to Front Page Options > Go to Banner Section.', 'auto-mechanic' ); ?></p>
         <p><?php esc_html_e( '3) For Setup Banner Section you have to create post in dashboard first.', 'auto-mechanic' ); ?></p>
         <p><?php esc_html_e( '4) In Banner Section > Enable the Toggle button > and fill the following details.', 'auto-mechanic' ); ?></p>
         <p><?php esc_html_e( '5) In this way you can set Banner Section.', 'auto-mechanic' ); ?></p>
         <hr>
        <h4><?php esc_html_e( 'Setup Menus Section', 'auto-mechanic' ); ?></h4>
        <hr class="quick-set">
         <p><?php esc_html_e( '1) Go to Post > add new post and add category which you want.', 'auto-mechanic' ); ?></p>
         <p><?php esc_html_e( '2) Go to Customizer > Go to Front Page Options > Go to Menus Section.', 'auto-mechanic' ); ?></p>
         <p><?php esc_html_e( '4) In Menus Section > Enable the Toggle button and give heading and select category which you want.', 'auto-mechanic' ); ?></p>
         <p><?php esc_html_e( '5) In this way you can set Menus Section.', 'auto-mechanic' ); ?></p>
    </div>
    <hr>

    <div class="custom-setting">
        <h4><?php esc_html_e( 'Quick Customizer Settings', 'auto-mechanic' ); ?></h4>
        <span><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" target="_blank"><?php esc_html_e( 'Customize', 'auto-mechanic' ); ?></a></span>
    </div>
    <hr>
   <div class="setting-box">
        <div class="custom-links">
            <div class="icon-box">
                <span class="dashicons dashicons-admin-site-alt3"></span>
            </div>
            <h5><?php esc_html_e( 'Site Logo', 'auto-mechanic' ); ?></h5>
            <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=custom_logo' ) ); ?>" target="_blank"><?php esc_html_e( 'Customize', 'auto-mechanic' ); ?></a>
            
        </div>
        <div class="custom-links">
            <div class="icon-box">
                <span class="dashicons dashicons-color-picker"></span>
            </div>
            <h5><?php esc_html_e( 'Color', 'auto-mechanic' ); ?></h5>
            <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=primary_color' ) ); ?>" target="_blank"><?php esc_html_e( 'Customize', 'auto-mechanic' ); ?></a>
            
        </div>
        <div class="custom-links">
            <div class="icon-box">
                <span class="dashicons dashicons-screenoptions"></span>
            </div>
            <h5><?php esc_html_e( 'Theme Options', 'auto-mechanic' ); ?></h5>
            <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=auto_mechanic_theme_options' ) ); ?>"target="_blank"><?php esc_html_e( 'Customize', 'auto-mechanic' ); ?></a>
            
        </div>
    </div>
    <div class="setting-box">
        <div class="custom-links">
            <div class="icon-box">
                <span class="dashicons dashicons-format-image"></span>
            </div>
            <h5><?php esc_html_e( 'Header Image ', 'auto-mechanic' ); ?></h5>
            <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=header_image' ) ); ?>" target="_blank"><?php esc_html_e( 'Customize', 'auto-mechanic' ); ?></a>
            
        </div>
        <div class="custom-links">
            <div class="icon-box">
                <span class="dashicons dashicons-align-full-width"></span>
            </div>
            <h5><?php esc_html_e( 'Footer Options ', 'auto-mechanic' ); ?></h5>
            <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=auto_mechanic_footer_copyright_text' ) ); ?>" target="_blank"><?php esc_html_e( 'Customize', 'auto-mechanic' ); ?></a>
            
        </div>
        <div class="custom-links">
            <div class="icon-box">
                <span class="dashicons dashicons-admin-page"></span>
            </div>
            <h5><?php esc_html_e( 'Front Page Options', 'auto-mechanic' ); ?></h5>
            <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=auto_mechanic_front_page_options' ) ); ?>" target="_blank"><?php esc_html_e( 'Customize', 'auto-mechanic' ); ?></a>
            
        </div>
    </div>
</div>