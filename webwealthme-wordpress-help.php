<?php
/**
 * Plugin Name:       WebWealth.me Wordpress Help
 * Description:       Get Expert WordPress Help (Advice, Custom Tutorials or Done For You) Directly From WP Admin
 * Version:           2018.12.08
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

<?php wwme_wh_sendemail();?>

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
<form name="wwme_wh_form" method="post" action="#" enctype="multipart/form-data">
<div class='wwme_wh_help_formmain'>
<?php wwme_wh_help_form("GET MY FREE CONSULTATION");?>
  </div>
</div>

<!-- Panel 2 -->
<div>
  <input type="radio" name="wwme_wh_panel" id="wwme_wh_panel_step-by-step">
  <label for="wwme_wh_panel_step-by-step">STEP BY STEP INSTRUCTIONS</label>
  <div class="accordion__content accordion__content--small">
  <h2>STEP BY STEP INSTRUCTIONS ► Get a detailed step by step instruction manual or video for your WP needs!</h2>
  <p><b>What do you want to achieve?</b></p>
  <form name="wwme_wh_form" method="post" action="#" enctype="multipart/form-data">
  <div class='wwme_wh_help_formmain'>
  FORMAT: <input type='checkbox' name='manual' value='manual' checked> Manual (TEXT/IMAGES) and/or &nbsp; <input type='checkbox' name='video' value='video'> VIDEO
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

<form name="wwme_wh_form" method="post" action="#" enctype="multipart/form-data">
<div class='wwme_wh_help_formmain'>
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

<form name="wwme_wh_form" method="post" action="#" enctype="multipart/form-data">
<div class='wwme_wh_help_formmain'>
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

<form name="wwme_wh_form" method="post" action="#" enctype="multipart/form-data">
<div class='wwme_wh_help_formmain'>
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

<form name="wwme_wh_form" method="post" action="#" enctype="multipart/form-data">
<div class='wwme_wh_help_formmain'>
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

<form name="wwme_wh_form" method="post" action="#" enctype="multipart/form-data">
<div class='wwme_wh_help_formmain'>
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

<form name="wwme_wh_form" method="post" action="#" enctype="multipart/form-data">
<div class='wwme_wh_help_formmain'>
<p><b>What service do you need?</b></p>
<input type='checkbox' name='currentsiteedits' value='currentsiteedits'> Current Site Edits<br>
<input type='checkbox' name='newfunctionality' value='newfunctionality'> New Functionality<br>
<input type='checkbox' name='psdtowptheme' value='psdtowptheme'> PSD to WP Theme<br>
<input type='checkbox' name='instalssl' value='instalssl'> Instal SSL (HTTP to HTTPS)<br>
<input type='checkbox' name='fixwperrors' value='fixwperrors'> Fix WordPress Errors<br>
<input type='checkbox' name='fixwptheme' value='fixwptheme'> Fix WordPress Theme Issues<br>
<input type='checkbox' name='fixcode' value='fixcode'> Fix Any Coding Bugs<br>
<input type='checkbox' name='fixplugin' value='fixplugin'> Fix Any Plugin Issue<br>
<input type='checkbox' name='createeditwebsite' value='createeditwebsite'> Create or Edit Website<br>
<input type='checkbox' name='removehackharden' value='removehackharden'> Remove Hack & Harden Security<br>
<input type='checkbox' name='converttowp' value='converttowp'> Convert Websites to WordPress<br>
<input type='checkbox' name='transferwp' value='transferwp'> Move WP to Other Host<br>
<input type='checkbox' name='speed' value='speed'> Make your Site Faster<br>
<input type='checkbox' name='updatewp' value='updatewp'> Update WordPress, Theme & Plugins<br>
<input type='checkbox' name='backupwp' value='backupwp'> Backup Your Site<br>
<input type='checkbox' name='customwork' value='customwork'> Any other Custom Work

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

<form name="wwme_wh_form" method="post" action="#" enctype="multipart/form-data">
<div class='wwme_wh_help_formmain'>
<?php wwme_wh_help_form("Get My Ongoing Maintenance");?>
  </div>
</div>

</div><!-- .wwme_wh_accordion -->


</section>

<section id="wwme_wh_whyus_content">
<h1>Why Choose WebWealth.me Services?</h1>

<p>☆ Reliable & High Rated WordPress Designers/Developers<br>
☆ Great Communication, Fast Response & Work Delivery<br>
☆ Competitive Prices<br>
☆ 10+ Years WordPress Experience<br>
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
<b>A:</b> Custom Work on the following WordPress topics: Errors, Theme Issues, Coding Bugs, Plugin Issue, Create or Edit Website, Remove Hack & Harden Security, Convert Websites to WordPress, Move WP to Other Host, Make your Site Faster, Update WP, Theme & Plugins, Backup and a lot more.</p>

<p><b>Q: How does it work?</b><br>
<b>A:</b> First, thank you for choosing our services :) The process is very simple:<br>
1. You: Send a request to us with your WordPress needs<br>
2. Us: Communicate how and by when will the fixes/changes be done and the quote (if paid service)<br>
3. You: Agree (pay first quote % if applicable) and send us the required logins to get started<br>
4. Us: Finish the work + send report<br>
5. You: Love it and pay final quote<br>
6. Recommended: You: Get the ONGOING MAINTENANCE to Keep your site running smoothly and up to date!<br>
Note: Additional information will be requested if needed, to provide you the best possible service.</p>

<p><b>Q: How much time do I get included help and revisions? </b><br>
<b>A:</b> After the project is successfully done and payment was made, we offer free help and revisions for that specific task/project (within reason) for 7 days. After 1 week, other help or revisions must be paid for.</p>

<p><b>Q: How are payments made? </b><br>
<b>A:</b> Securely with PayPal.</p>

<p><b>Q: How are refunds handled?</b><br>
<b>A:</b> 7 Days money back Guarantee. If for any reason you are not satisfied with the service provided, you get your money back!</p>

<p><b>Q: How can I get a faster quote and speed up work delivery?</b><br>
<b>A:</b> Send all the info you have related to the project including attached media (the more specific the better) & Send temporary wp admin access (please note that some projects require temporary ftp access as well, so it would be great if this is provided as well)</p>

</section>

<section id="wwme_wh_contact_content">

Contact WebWealth.me for any feedback/request/question/etc at admin@webwealth.me or using the form below:<br>
<form name="wwme_wh_form" method="post" action="#" enctype="multipart/form-data">
<div class='wwme_wh_help_formmain'>
    <?php wwme_wh_help_form("Send Message");?>


</section>
<a alt="WebWealth.me" href="https://WebWealth.me" target="_blank"><img style="max-height:100px;float:left;margin:10px" src="../wp-content/plugins/webwealthme-wordpress-help/WebWealth.me.png"></a>
<a alt="MikeMind.me" href="https://MikeMind.me" target="_blank"><img style="max-height:100px;float:left;margin:10px" src="../wp-content/plugins/webwealthme-wordpress-help/MikeMind.me.png"></a>



        </div>

        <?php

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

// define the wp_mail_failed callback
function action_wp_mail_failed($wp_error)
{
    return error_log(print_r($wp_error, true));
}

// add the action
add_action('wp_mail_failed', 'action_wp_mail_failed', 10, 1);