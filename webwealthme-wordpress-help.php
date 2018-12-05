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

    add_menu_page( 'WebWealth.me WordPress Help', 'WebWealth.me WordPress Help', 'manage_options', 'wwme_wh', array($this, 'create_admin_page'),'../wp-content/plugins/webwealthme-wordpress-help/logo.png');


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
        -> Loved our service? Leave a tip :)




<input id="wwme_wh_help" type="radio" name="tabs" checked>
<label for="wwme_wh_help">HELP</label>

<input id="wwme_wh_whyus" type="radio" name="tabs">
<label for="wwme_wh_whyus">WHY US?</label>

<input id="wwme_wh_faq" type="radio" name="tabs">
<label for="wwme_wh_faq">FAQ</label>

<input id="wwme_wh_contact" type="radio" name="tabs">
<label for="wwme_wh_contact">CONTACT</label>

<section id="wwme_wh_help_content">
We currently offer the following services:
Note 1: For best experience please describe your request with as much detail as possible and attach files.
Note 2: To get a faster quote and speed up work delivery please send all the info you have related to the project including attached media (if more than 1 file, please zip them and attach all) & send temporary wp admin access (please note that some projects require temporary ftp access as well, so it would be great if this is provided as well)

<div class="accordion">

<!-- Panel 1 -->
<div>
  <input type="radio" name="panel" id="panel-1">
  <label for="panel-1">Panel 1</label>
  <div class="accordion__content accordion__content--small">
    <h2 class="accordion__header">Header</h2>
    <p class="accordion__body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto possimus at a cum saepe molestias modi illo facere ducimus voluptatibus praesentium deleniti fugiat ab error quia sit perspiciatis velit necessitatibus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet.</p>
  </div>
</div>

<!-- Panel 2 -->
<div>
  <input type="radio" name="panel" id="panel-2">
  <label for="panel-2">Panel 2</label>
  <div class="accordion__content accordion__content--med">
    <h2 class="accordion__header">Header</h2>
    <p class="accordion__body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto possimus at a cum saepe molestias modi illo facere ducimus voluptatibus praesentium deleniti fugiat ab error quia sit perspiciatis velit necessitatibus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente eligendi nulla illo culpa ab in at adipisci eveniet id itaque maxime soluta recusandae doloribus laboriosam dignissimos est aut cupiditate delectus.</p>
  </div>
</div>

<!-- Panel 3 -->
<div>
  <input type="radio" name="panel" id="panel-3">
  <label for="panel-3">Panel 3</label>
  <div class="accordion__content accordion__content--small">
    <h2 class="accordion__header">Header</h2>
    <p class="accordion__body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto possimus at a cum saepe molestias modi illo facere ducimus voluptatibus praesentium deleniti fugiat ab error quia sit perspiciatis velit necessitatibus.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
  </div>
</div>

<!-- Panel 4 -->
<div>
  <input type="radio" name="panel" id="panel-4">
  <label for="panel-4">Panel 4</label>
  <div class="accordion__content accordion__content--large">
    <h2 class="accordion__header">Header</h2>
    <p class="accordion__body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto possimus at a cum saepe molestias modi illo facere ducimus voluptatibus praesentium deleniti fugiat ab error quia sit perspiciatis velit necessitatibus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda odio provident ullam culpa rem tempora voluptatem inventore facere adipisci doloribus dolorum ad maxime itaque quasi animi aliquid voluptates rerum expedita? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui culpa amet neque nostrum cumque eaque corrupti ad accusantium? Consectetur reiciendis ad earum aspernatur at quibusdam cupiditate rerum ipsam consequatur suscipit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab rem explicabo exercitationem unde harum? Iste nobis quae animi illum laborum incidunt hic illo ad repellat repudiandae et alias facere magni.</p>
  </div>
</div>

</div><!-- .accordion -->


DROPDOWNS:
----FREE----
**************************************************************************
FREE CONSULTATION ► Get WordPress related advice and recommendations from us!
What do you try to accomplish?
<?php wwme_wh_help_form("#555555","Get My Free Consultation"); ?>


**************************************************************************

----PAID----
**************************************************************************
STEP BY STEP INSTRUCTIONS ► Get a detailed step by step instruction manual or video for your WP needs!
What do you try to accomplish?
checkboxes Manual (TEXT/IMAGES)  VIDEO
<?php wwme_wh_help_form("#555555","STEP BY STEP INSTRUCTIONS Quote"); ?>

**************************************************************************

**************************************************************************
NEW WP SITE ► Get A Professional Wordpress Site that converts users into leads/buyers!
What we offer:
✓ Mobile Responsive Themes
✓ Forms (Contact, Quote, Schedule, Request, Order...)
✓ Animated Slider / Slideshow
✓ Ecommerce
✓ Social Sharing (Facebook, Twitter, G+)
✓ Youtube/Vimeo Video Embedding
✓ Google Analytics/Adsense/Maps Integration (details must be provided)
✓ Site Email Addresses
✓ Basic training on how to use your website
✓ Site will be delivered in zip format as well
✓ Anything else you need...

Notes:
⚀ Own created logo, stock images and dummy text will be used if you don’t have them yet.
⚁ No gambling, adult or illegal sites.

<?php wwme_wh_help_form("#555555","NEW WP SITE Quote"); ?>
**************************************************************************

**************************************************************************
SPEED OPTIMIZATION ► Improve Speed and Performance for better user experience and increased Google rankings!
Included:
✓ Faster Loading Time
✓ Image Optimization
✓ Enabling gZip Compression
✓ Caching Pages To Serve Static Content
✓ Optimizing Homepage
✓ Optimizing WP Database
✓ Efficient Browser Caching
✓ Minification
✓ Before & After Report

<?php wwme_wh_help_form("#555555","SPEED OPTIMIZATION Quote"); ?>

**************************************************************************

**************************************************************************
ERROR FIXES ► Fix Fast Any Wordpress Error, Issue Or Problem!
What we fix?
Fix Specific Errors:
✓ Warning: Cannot modify header information – headers already sent by
✓ WordPress White Screen of Death / Fatal error
✓ Internal Server Error
✓ HTTP Error 403 – Forbidden
✓ You are not authorized to view this page (403 error)

Fix Design/Theme Errors:
✓ Header/footer issues
✓ Navigation problems
✓ HTML/CSS Layout Issues
✓ Responsive Issues / Mobile Issues
✓ Font/layout color(s)
✓ Broken images placeholders.

Fix General Errors:
✓ WordPress Errors
✓ Any Coding Bugs (PHP, JS)
✓ Any Plugin Issues

<?php wwme_wh_help_form("#555555","ERROR FIXES Quote"); ?>

**************************************************************************

**************************************************************************
SECURITY ► Remove any WordPress Malware, Hack, Virus or Malicious Code & Harden Security!
What we offer?
✓ Wordpress Malware Cleanup
✓ Backdoor, phishing scripts, SEO spam removal
✓ Iframe hacks, JavaScript hacks, base64 hacks...
✓ Upgrade Existing Plugins & WP Core
✓ Install & Config WP Security Plugins
✓ Protect your site from hackers
✓ Make site Google friendly
✓ Regain Google ranking

<?php wwme_wh_help_form("#555555","SECURITY Quote"); ?>

**************************************************************************

**************************************************************************
TRANSFER ► Move Wordpress Site To New Host Or Domain!
What we offer:
✓ Move from subdomain to root
✓ Move from root to subdomain
✓ Move from one domain to another
✓ Move from one host to another
Benefits:
✓ No missing files or content
✓ No Size Restrictions
✓ Minimum information required

<?php wwme_wh_help_form("#555555","TRANSFER Quote"); ?>

**************************************************************************

**************************************************************************
OTHER - DO IT FOR ME ► Anything you need to get done just let us know!

Choose the one that fits best:
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

<?php wwme_wh_help_form("#555555","My OTHER - DO IT FOR ME Quote"); ?>

**************************************************************************

**************************************************************************
ONGOING MAINTENANCE ($59) ► Keep your site running smoothly and up to date!
Included:
✓ WP Core Updates
✓ Plugins and Theme Updates
✓ Site Backups
✓ Security Check
✓ Speed Check
✓ Integrity Check
✓ Small WP Requests

IMPORTANT: Website link, WP ADMIN + CPANEL access is needed, so please provide before ordering
<?php wwme_wh_help_form("#555555","Get My Free Consultation was $99"); ?>


**************************************************************************
</section>

<section id="wwme_wh_whyus_content">
Why Choose WebWealth.me Services?

☆ Reliable & High Rated WordPress Designers/Developers
☆ Great Communication, Fast Response & Work Delivery
☆ Competitive Prices
☆ 10+ Years Wordpress Experience
☕ Over 3000 Happy Customers Served

❮❯ WP, HTML, CSS, PHP, JavaScript Experts
✎ Photoshop, Illustrator, Premiere Top Designers

Bonus: Free Expert Tips to Improve Website on any FREE or Paid service.
100% Satisfied or 7 Day Money Back Guarantee ☺
</section>

<section id="wwme_wh_faq_content">
Q. What do you offer?
A. Custom Work on the following Wordpress topics: Errors, Theme Issues, Coding Bugs, Plugin Issue, Create or Edit Website, Remove Hack & Harden Security, Convert Websites to WordPress, Move WP to Other Host, Make your Site Faster, Update WP, Theme & Plugins, Backup and a lot more.

Q. How does it work?
A. First, Thank you for choosing our services :) The process is very simple: 
1. You: Send a request to us with your Wordpress needs 
2. Us: Communicate how and by when will the fixes/changes be done and the quote (if paid service)
3. You: Agree (pay first quote % if applicable) and send us the required logins to get started 
4. Us: Finish the work + send report
5. You: Love it and pay final quote
6. Recommended: You: Get the ONGOING MAINTENANCE to Keep your site running smoothly and up to date!
Note: Additional information will be requested if needed, to provide you the best possible service.

Q. How much time do I get included help and revisions?
A. After the project is successfully done and payment was made, we offer free help and revisions for that specific task/project (within reason) for 7 days. After 1 week, other help or revisions must be paid for.

Q. How are payments made?
A. Securely with Paypal.

Q. How are refunds handled?
A. 7 Days money back Guarantee. If for any reason you are not satisfied with the service provided, you get your money back!

Q. How can I get a faster quote and speed up work delivery?
A. Send all the info you have related to the project including attached media (the more specific the better) & Send temporary wp admin access (please note that some projects require temporary ftp access as well, so it would be great if this is provided as well)

</section>

<section id="wwme_wh_contact_content">

Contact WebWealth.me for any feedback/request/question/etc at admin@webwealth.me or using the form below:
    <?php wwme_wh_help_form("#555555","Contact"); ?>



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
function wwme_wh_admin_toolbar_button($wp_admin_bar){
    $args = array(
    'id' => 'wwme_wh_admin_toolbar_button',
    'title' => 'GET HELP',
    'href' => '/wp-admin/admin.php?page=wwme_wh',
    'meta' => array(
    'class' => 'custom-button-class'
    )
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