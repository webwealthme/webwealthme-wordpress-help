<?php
/**
 * Plugin Name:       WebWealth.me Wordpress Help
 * Description:       Get Expert WordPress Help (Advice, Custom Tutorials or Done For You) Directly From WP Admin
 * Version:           2018.12.04
 * Author:            Mike Mind
 * Author URI:        https://webwealth.me
 * Text Domain:       webwealth.me
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: https://github.com/webwealthme/webwealthme-wordpress-help
 */

//here we make the settings menu
class wwme_wh_SettingsPage
{
    public $scs_apikey,
    $scs_channelId;
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action('admin_menu', array($this, 'add_plugin_page'));
        add_action('admin_init', array($this, 'page_init'));
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'SCS Auto Poster Options',
            'SCS Auto Poster',
            'manage_options',
            'scs_ytap',
            array($this, 'create_admin_page')
            //array($this, 'scs_ytap_main')
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        require_once dirname(__FILE__) . "/functions.php";

        $this->options = get_option('scs_ytap_options');
        scs_ytap_outputcss();
        ?>

         <div class="wrap">
            <h1>SCS YouTube Auto Poster Settings</h1>
            <div class="scs_mikemind">
            I'm Mike, a <a href="http://mikemind.me/" target="_blank">Full-Stack Web Developer Freelancer</a>, and you can contact me for feedback, bugs, feature requests or other work at
            <a href="mailto:admin@webwealth.me?Subject=Hello%20Mike" target="_blank">admin@webwealth.me</a> or at my YouTube Channel:
            <a href="https://www.youtube.com/channel/UC3f86MEyfT0DLaa6uxbFF9w/videos" target="_blank">MikeMindAcodeMY</a>. </div>
            <div class="scs_mikemind donate">
            I don't drink beer nor coffee but you can <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ERBYPAZV9Z9RC&source=url" target="_blank">donate here</a> to help me improve this plugin, create other cool free software and to spend more time with my family. Thank you! :)
            </div>
            <br>
            <div id="scs_ytap_accordion" class="accordion">
    <label for="tm" class="accordionitem"><h1><b>Click for Settings</b></h1></label>
    <input type="checkbox" id="tm"/>
    <div class="hiddentext">
            <form method="post" action="options.php">
            <?php
// This prints out all hidden setting fields
        settings_fields('scs_ytap_option_group');
        do_settings_sections('scs_ytap');
        submit_button();
        ?>
        <p>*Required</p>
            </form>
        </div>
        <form method="post" action="">
        <input type="text" name="action" value="start" hidden><br>
        <input class="scs_ytap_ytbutton" type="submit" value="Make YT Posts!"><br><br>
        </form>
        </div>
  </div>

        <?php

        if (($this->scs_apikey == "") || (!isset($this->scs_apikey))) {
            //if no api key is set, the settings menu will be displayed initially
            echo "<style>.hiddentext{display:block!important;opacity:1!important}</style>";}

        scs_ytap_outputjs();

        if (isset($_POST['action'])) {

            $this->scs_ytap_main();}

    }

    /**
     * Register and add settings
     */
    public function page_init()
    {
        register_setting(
            'scs_ytap_option_group', // Option group
            'scs_ytap_options', // Option name
            array($this, 'sanitize') // Sanitize
        );

        add_settings_section(
            'setting_section_scs_ytap', // ID
            'YouTube Settings', // Title
            array($this, 'print_section_info'), // Callback
            'scs_ytap' // Page
        );

        add_settings_field(
            'apikey',
            'Api Key*',
            array($this, 'apikey_callback'),
            'scs_ytap',
            'setting_section_scs_ytap'
        );



    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize($input)
    {
        $new_input = array();

        if (isset($input['apikey'])) {
            $new_input['apikey'] = sanitize_text_field($input['apikey']);
        }

          return $new_input;
    }

    /**
     * Print the Section text
     */
    public function print_section_info()
    {
        //print '*Required';
    }
    public function print_section_info_wppost()
    {
        //print 'Enter your post settings below:';
    }
    public function print_section_info_cron()
    {
        //print 'Wordpress Cron activates when someone visits the site, if you want to work as a real cron (activate on time) without someone visiting the site, then use this ';
    }
    /**
     * Get the settings option array and print one of its values
     */

    public function apikey_callback()
    {

        if (isset($this->options['apikey'])) {
            $this->scs_apikey = $this->options['apikey'];} else { $this->scs_apikey = "";}

        printf(
            '<input type="text" id="apikey" name="scs_ytap_options[apikey]" value="%s" required /> <a href="https://developers.google.com/youtube/v3/getting-started" target="_blank">How to get one?</a>',
            isset($this->options['apikey']) ? esc_attr($this->options['apikey']) : ''
        );
    }

    

    public function cronDay_callback()
    {
        if (isset($this->options['cronDay'])) {
            $this->scs_cronDay = $this->options['cronDay'];} else { $this->scs_cronDay = "OFF";}

        $post_cronDay_code = scs_ytap_post_cronDay_array_loop($this->scs_cronDay);

        printf(
            '<select id="cronDay" name="scs_ytap_options[cronDay]" value="%s">
            ' . $post_cronDay_code . '
      </select> (Optional: Automatically create posts using <a href="https://developer.wordpress.org/plugins/cron/"
      title="WP-Cron does not run constantly as the system cron does; it is only triggered on page load." target="_blank">WPcron</a>)',
            isset($this->options['cronDay']) ? esc_attr($this->options['cronDay']) : 'OFF'
        );

        if (isset($this->scs_cronDay)) {
            if ($this->scs_cronDay != "OFF") {
                //unschedule the cron first to set it with new value
                if (wp_next_scheduled('scs_ytap_cron_event')) {
                    $timestamp = wp_next_scheduled('scs_ytap_cron_event');
                    wp_unschedule_event($timestamp, 'scs_ytap_cron_event');
                }

                //check to see if cron is already scheduled
                if (!wp_next_scheduled('scs_ytap_cron_event')) {
                    wp_schedule_event(time(), $this->scs_cronDay, 'scs_ytap_cron_event');
                }
            } else {
                //this will unschedule the cron
                if (wp_next_scheduled('scs_ytap_cron_event')) {
                    $timestamp = wp_next_scheduled('scs_ytap_cron_event');
                    wp_unschedule_event($timestamp, 'scs_ytap_cron_event');
                }
            }

        }
    }

    public function scs_ytap_main()
    {

    }

}

//if (is_admin()) {
$wwme_wh_settings_page = new wwme_wh_SettingsPage();
//}

//set a cron job
/*register_activation_hook(__FILE__, 'scs_ytap_cron_activation');

function scs_ytap_cron_activation() {
if (! wp_next_scheduled ( 'scs_ytap_cron_event' )) {
wp_schedule_event(time(), 'hourly', 'scs_ytap_cron_event');
}
}
 */
add_action('scs_ytap_cron_event', 'do_scs_ytap_cron');

function do_scs_ytap_cron()
{
//do something
    require_once dirname(__FILE__) . "/cron.php";

}

register_deactivation_hook(__FILE__, 'scs_ytap_cron_deactivation');

function scs_ytap_cron_deactivation()
{
    wp_clear_scheduled_hook('scs_ytap_cron_event');
}