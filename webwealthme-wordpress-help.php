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
    public $wwme_wh_variable;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action('admin_menu', array($this, 'add_plugin_page'));
        //add_action('admin_init', array($this, 'page_init'));
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {

        add_menu_page('WebWealth.me WordPress Help', 'WebWealth.me WordPress Help', 'manage_options', 'wwme_wh', array($this, 'create_admin_page'), '../wp-content/plugins/webwealthme-wordpress-help/logo.png');

        /* // This page will be under "Settings"
    add_options_page(
    'WebWealth.me Wordpress Help',
    'WebWealth.me Wordpress Help',
    'manage_options',
    'wwme_wh',
    array($this, 'create_admin_page')
    );*/
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        require_once dirname(__FILE__) . "/functions.php";

        wwme_wh_outputcss();
        ?>

        <div id="wwme_wh_maindiv">
<div id="wwme_wh_news_info">Loved our service? <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=FAUCSBEY7S2YQ" target="_blank">Leave a tip</a> ☺</div>



<input id="wwme_wh_help" type="radio" name="tabs" checked>
<label for="wwme_wh_help">HELP</label>

<input id="wwme_wh_whyus" type="radio" name="tabs">
<label for="wwme_wh_whyus">WHY US?</label>

<input id="wwme_wh_faq" type="radio" name="tabs">
<label for="wwme_wh_faq">FAQ</label>

<input id="wwme_wh_contact" type="radio" name="tabs">
<label for="wwme_wh_contact">CONTACT</label>

<section id="wwme_wh_help_content">
<h1>We currently offer the following services:</h1>
<p><i><b>Note 1:</b> For best experience please describe your request with as much detail as possible and also attach project files if you have, such as documents, pdfs, images, screenshots, etc (please zip archive them to attach all).</br>
<b>Note 2:</b> To get a faster quote and speed up work delivery please send temporary wp admin access (some projects require temporary ftp access as well, so it would be great if this is provided as well).</i></p>

<div class="wwme_wh_accordion">

<!-- Panel 1 -->
<div>
  <input type="radio" name="wwme_wh_panel" id="wwme_wh_panel_free-consultation">
  <label for="wwme_wh_panel_free-consultation">FREE CONSULTATION</label>
  <div class="accordion__content accordion__content--small">
  <h2>FREE CONSULTATION ► Get FREE WordPress related advice and recommendations from us!</h2>
<p><b>What do you try to accomplish?</b></p>
<form action="">
<?php wwme_wh_help_form("GET MY FREE CONSULTATION");?>
  </div>
</div>

<!-- Panel 2 -->
<div>
  <input type="radio" name="wwme_wh_panel" id="wwme_wh_panel_step-by-step">
  <label for="wwme_wh_panel_step-by-step">STEP BY STEP INSTRUCTIONS</label>
  <div class="accordion__content accordion__content--small">
  <h2>STEP BY STEP INSTRUCTIONS ► Get a detailed step by step instruction manual or video for your WP needs!</h2>
  <p><b>What do you try to accomplish?</b></p>
  <form action="">
checkboxes Manual (TEXT/IMAGES)  VIDEO
<?php wwme_wh_help_form("GET MY STEP BY STEP INSTRUCTIONS QUOTE");?>
  </div>
</div>

<!-- Panel 3 -->
<div>
  <input type="radio" name="wwme_wh_panel" id="wwme_wh_panel_new-site">
  <label for="wwme_wh_panel_new-site">NEW WP SITE</label>
  <div class="accordion__content accordion__content--small">
  <h2>NEW WP SITE ► Get A Professional Wordpress Site that converts users into leads/buyers!</h2>
  <p><b>What we offer?</b></p>
  <p>✓ Mobile Responsive Themes<br>
✓ Forms (Contact, Quote, Schedule, Request, Order...)<br>
✓ Animated Slider / Slideshow<br>
✓ Ecommerce<br>
✓ Social Sharing (Facebook, Twitter, G+)<br>
✓ Youtube/Vimeo Video Embedding<br>
✓ Google Analytics/Adsense/Maps Integration (details must be provided)<br>
✓ Site Email Addresses<br>
✓ Basic training on how to use your website<br>
✓ Site will be delivered in zip format as well<br>
✓ Anything else you need...<br>
<br>
<b>Notes:</b><br>
⚀ Own created logo, stock images and dummy text will be used if you don’t have them yet.<br>
⚁ No gambling, adult or illegal sites.</p>

<form action="">
<?php wwme_wh_help_form("GET MY NEW WP SITE QUOTE");?>
  </div>
</div>


<!-- Panel 4 -->
<div>
  <input type="radio" name="wwme_wh_panel" id="wwme_wh_panel_speed">
  <label for="wwme_wh_panel_speed">SPEED OPTIMIZATION</label>
  <div class="accordion__content accordion__content--small">
  <h2>SPEED OPTIMIZATION ► Improve Speed and Performance for better user experience and increased Google rankings!</h2>
  <p><b>Included:</b></p>
  <p>✓ Faster Loading Time<br>
✓ Image Optimization<br>
✓ Enabling gZip Compression<br>
✓ Caching Pages To Serve Static Content<br>
✓ Optimizing Homepage<br>
✓ Optimizing WP Database<br>
✓ Efficient Browser Caching<br>
✓ Minification<br>
✓ Before & After Report</p>

<form action="">
<?php wwme_wh_help_form("GET MY SPEED OPTIMIZATION QUOTE");?>
  </div>
</div>

<!-- Panel 5 -->
<div>
  <input type="radio" name="wwme_wh_panel" id="wwme_wh_panel_error-fixes">
  <label for="wwme_wh_panel_error-fixes">ERROR FIXES</label>
  <div class="accordion__content accordion__content--small">
  <h2>ERROR FIXES ► Fix Fast Any Wordpress Error, Issue Or Problem!</h2>
  <p><b>Fix Specific Errors:</b><br>
✓ Warning: Cannot modify header information – headers already sent by<br>
✓ WordPress White Screen of Death / Fatal error<br>
✓ Internal Server Error<br>
✓ HTTP Error 403 – Forbidden<br>
✓ You are not authorized to view this page (403 error)<br>
<br>
<b>Fix Design/Theme Errors:</b><br>
✓ Header/footer issues<br>
✓ Navigation problems<br>
✓ HTML/CSS Layout Issues<br>
✓ Responsive Issues / Mobile Issues<br>
✓ Font/layout color(s)<br>
✓ Broken images placeholders<br>
<br>
<b>Fix General Errors:</b><br>
✓ WordPress Errors<br>
✓ Any Coding Bugs (PHP, JS)<br>
✓ Any Plugin Issues</p>

<form action="">
<?php wwme_wh_help_form("GET MY ERROR FIXES QUOTE");?>
  </div>
</div>

<!-- Panel 6 -->
<div>
  <input type="radio" name="wwme_wh_panel" id="wwme_wh_panel_security">
  <label for="wwme_wh_panel_security">SECURITY</label>
  <div class="accordion__content accordion__content--small">
  <h2>SECURITY ► Remove any WordPress Malware, Hack, Virus or Malicious Code & Harden Security!</h2>
  <p><b>What we offer?</b></p>
  <p>✓ Wordpress Malware Cleanup<br>
✓ Backdoor, phishing scripts, SEO spam removal<br>
✓ Iframe hacks, JavaScript hacks, base64 hacks...<br>
✓ Upgrade Existing Plugins & WP Core<br>
✓ Install & Config WP Security Plugins<br>
✓ Protect your site from hackers<br>
✓ Make site Google friendly<br>
✓ Regain Google ranking</p>

<form action="">
<?php wwme_wh_help_form("GET MY SECURITY QUOTE");?>
  </div>
</div>

<!-- Panel 7 -->
<div>
  <input type="radio" name="wwme_wh_panel" id="wwme_wh_panel_transfer">
  <label for="wwme_wh_panel_transfer">WP TRANSFER</label>
  <div class="accordion__content accordion__content--small">
  <h2>TRANSFER ► Move Wordpress Site To New Host Or Domain!</h2>
  <p><b>What we offer?</b></p>
  <p>✓ Move from subdomain to root<br>
✓ Move from root to subdomain<br>
✓ Move from one domain to another<br>
✓ Move from one host to another<br>
<br>
<b>Notes:</b><br>
✓ No missing files or content<br>
✓ No Size Restrictions<br>
✓ Minimum information required</p>

<form action="">
<?php wwme_wh_help_form("GET MY WP TRANSFER QUOTE");?>
  </div>
</div>

<!-- Panel 8 -->
<div>
  <input type="radio" name="wwme_wh_panel" id="wwme_wh_panel_other">
  <label for="wwme_wh_panel_other">OTHER - DO IT FOR ME</label>
  <div class="accordion__content accordion__content--small">
  <h2>OTHER - DO IT FOR ME ► Anything you need to get done just let us know!</h2>
<p><b>Choose the one that fits best:</b></p>

<form action="">
( ) Current Site Edits
( ) New Functionality
( ) PSD to WP Theme
( ) Instal SSL (HTTP to HTTPS)
( ) Fix WordPress Errors
( ) Fix WordPress Theme Issues
( ) Fix Any Coding Bugs
( ) Fix Any Plugin Issue
( ) Create or Edit Website
( ) Remove Hack & Harden Security
( ) Convert Websites to WordPress
( ) Move WP to Other Host
( ) Make your Site Faster
( ) Update WordPress, Theme & Plugins
( ) Backup Your Site
( ) Any other Custom Work

<?php wwme_wh_help_form("GET MY DO IT FOR ME QUOTE");?>
  </div>
</div>

<!-- Panel 8 -->
<div>
  <input type="radio" name="wwme_wh_panel" id="wwme_wh_panel_maintenance">
  <label for="wwme_wh_panel_maintenance">ONGOING MAINTENANCE</label>
  <div class="accordion__content accordion__content--small">
  <h2>ONGOING MAINTENANCE ► Keep your site running smoothly and up to date!</h2>
  <p><b>Included:</b></p>
  <p>✓ WP Core Updates<br>
✓ Plugins and Theme Updates<br>
✓ Site Backups<br>
✓ Security Check<br>
✓ Speed Check<br>
✓ Integrity Check<br>
✓ Small WP Requests<br>
<br>
<b>IMPORTANT:</b> Website link, WP ADMIN + CPANEL access is needed, so please provide before ordering</p>

<form action="">
<?php wwme_wh_help_form("Get My Free Consultation");?>
<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=L7G7FDS3BU2VN" target="_blank">SUBSCRIBE FOR JUST $99 $59</a>
  </div>
</div>

</div><!-- .wwme_wh_accordion -->


</section>

<section id="wwme_wh_whyus_content">
<h1>Why Choose WebWealth.me Services?</h1>

<p>☆ Reliable & High Rated WordPress Designers/Developers<br>
☆ Great Communication, Fast Response & Work Delivery<br>
☆ Competitive Prices<br>
☆ 10+ Years Wordpress Experience<br>
☆ Over 3000 Happy Customers Served<br>
<br>
❮❯ WP, HTML, CSS, PHP, JavaScript Experts<br>
✎ Photoshop, Illustrator, Premiere Top Designers<br>
<br>
Bonus: Free Expert Tips to Improve Website on any FREE or Paid service.<br>
100% Satisfied or 7 Day Money Back Guarantee ☺<p>
</section>

<section id="wwme_wh_faq_content">
<p><b>Q: What do you offer?</b><br>
<b>A:</b> Custom Work on the following Wordpress topics: Errors, Theme Issues, Coding Bugs, Plugin Issue, Create or Edit Website, Remove Hack & Harden Security, Convert Websites to WordPress, Move WP to Other Host, Make your Site Faster, Update WP, Theme & Plugins, Backup and a lot more.</p>

<p><b>Q: How does it work?</b><br>
<b>A:</b> First, Thank you for choosing our services :) The process is very simple:<br>
1. You: Send a request to us with your Wordpress needs<br>
2. Us: Communicate how and by when will the fixes/changes be done and the quote (if paid service)<br>
3. You: Agree (pay first quote % if applicable) and send us the required logins to get started<br>
4. Us: Finish the work + send report<br>
5. You: Love it and pay final quote<br>
6. Recommended: You: Get the ONGOING MAINTENANCE to Keep your site running smoothly and up to date!<br>
Note: Additional information will be requested if needed, to provide you the best possible service.</p>

<p><b>Q: How much time do I get included help and revisions? </b><br>
<b>A:</b> After the project is successfully done and payment was made, we offer free help and revisions for that specific task/project (within reason) for 7 days. After 1 week, other help or revisions must be paid for.</p>

<p><b>Q: How are payments made? </b><br>
<b>A:</b> Securely with Paypal.</p>

<p><b>Q: How are refunds handled?</b><br>
<b>A:</b> 7 Days money back Guarantee. If for any reason you are not satisfied with the service provided, you get your money back!</p>

<p><b>Q: How can I get a faster quote and speed up work delivery?</b><br>
<b>A:</b> Send all the info you have related to the project including attached media (the more specific the better) & Send temporary wp admin access (please note that some projects require temporary ftp access as well, so it would be great if this is provided as well)</p>

</section>

<section id="wwme_wh_contact_content">

Contact WebWealth.me for any feedback/request/question/etc at admin@webwealth.me or using the form below:
    <?php wwme_wh_help_form("Contact");?>



</section>




        </div>

        <?php

        //wwme_wh_outputjs();

        if (isset($_POST['action'])) {

            // add thank you message here
        }

    }

}

if (is_admin()) {
    $wwme_wh_settings_page = new wwme_wh_SettingsPage();
}

//add button to admin toolbar
function wwme_wh_admin_toolbar_button($wp_admin_bar)
{
    $args = array(
        'id' => 'wwme_wh_admin_toolbar_button',
        'title' => 'GET HELP',
        'href' => '/wp-admin/admin.php?page=wwme_wh',
        'meta' => array(
            'class' => 'custom-button-class',
        ),
    );
    $wp_admin_bar->add_node($args);
    echo "
<style>
#wp-admin-bar-wwme_wh_admin_toolbar_button {background-color:#F26722!important;}
#wp-admin-bar-wwme_wh_admin_toolbar_button > a {font-weight: bold!important;font-size:150%!important}
#wp-admin-bar-wwme_wh_admin_toolbar_button > a::before {
    content: url(../wp-content/plugins/webwealthme-wordpress-help/logo.png);
    transform: scale(.8);
    height: 20px;
    width: 20px;
    margin-top: -3px;
    margin-left: -5px;
}

#toplevel_page_wwme_wh {background-color:#F26722!important;}
</style>
";

}

add_action('admin_bar_menu', 'wwme_wh_admin_toolbar_button', 31);