<?php
//create help forms
function wwme_wh_help_form($cta)
{
    $internalid = preg_replace('/\s+/', '', $cta);
    echo "
 <input type='text' id='wwme_wh_internalid' name='internalid' value='" . $internalid . "' hidden>
<input type='hidden' name='post_id' id='post_id' value='5555555'/>
<input type='text' id='wwme_wh_title' name='title' placeholder='Project Title' required>
<br>
<textarea id='wwme_wh_desc' name='desc' placeholder='Project Detailed Description'></textarea>
<br>
<input type='file' name='my_image_upload' id='my_image_upload'  multiple='false' >
<br>
<input type='text' id='wwme_wh_site' name='site' placeholder='Website Link' required>
<br>
<input type='text' id='wwme_wh_name' name='name' placeholder='Name' required> <input type='text' id='wwme_wh_email' name='email' placeholder='Email' required>
<br><br>
<input class='button-primary' id='wwme_wh_submit' formmethod='post'  type='submit' value='" . $cta . "'>
</div>
</form>
";
}

//send email
function wwme_wh_sendemail()
{
    if (!empty($_POST['email'])) {
        echo "<div id='wwme_wh_sent_info'>";
        echo "Thank you for contacting us, we will get back to you as soon as possible! Please make sure you whitelist admin@webwealth.me email to be able to receive messages from us.";
        echo "</div>";

        if (!empty($_POST['internalid'])) {$internalid = $_POST['internalid'];} else { $internalid = "";}
        if (!empty($_POST['title'])) {$title = $_POST['title'];} else { $title = "";}
        if (!empty($_POST['desc'])) {$desc = $_POST['desc'];} else { $desc = "";}
        if (!empty($_POST['site'])) {$site = $_POST['site'];} else { $site = "";}
        if (!empty($_POST['myFile'])) {$myFile = $_POST['myFile'];} else { $myFile = "";}
        $attachments = array(WP_CONTENT_DIR . "/uploads/$myFile");
        if (!empty($_POST['name'])) {$name = $_POST['name'];} else { $name = "";}
        if (!empty($_POST['email'])) {$email = $_POST['email'];} else { $email = "";}

        $to = "admin@webwealth.me";

        $txt = "Service: $internalid" . "\r\n";
        if ($internalid == "GetMyOngoingMaintenance") {$txt = $txt . "IMPORTANT: Please setup the reocurring secure Paypal Payment to start your service by going here: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=L7G7FDS3BU2VN ($59), thank you!" . "\r\n";}
        $txt = $txt . "Name: $name" . "\r\n";
        $txt = $txt . "Email: $email" . "\r\n";
        $txt = $txt . "Site: $site" . "\r\n \r\n";
        $txt = $txt . "Title: $title" . "\r\n";
        $msgtitle = $internalid . ": " . $name . " [" . $site . "] " . $title;

        //if they choose step by step, see which type they choose
        if ($internalid == "GETMYSTEPBYSTEPINSTRUCTIONSQUOTE") {
            if (!empty($_POST['manual'])) {$manual = $_POST['manual'];
                $txt = $txt . "REQUESTED: MANUAL" . "\r\n";
            }
            if (!empty($_POST['video'])) {
                $txt = $txt . "REQUESTED: VIDEO" . "\r\n";
            }
        }
        //if they choose custom work, see which type they choose
        if ($internalid == "GETMYDOITFORMEQUOTE") {
            if (!empty($_POST['currentsiteedits'])) {$manual = $_POST['currentsiteedits'];
                $txt = $txt . "REQUESTED: Current Site Edits" . "\r\n \r\n";
            }
            if (!empty($_POST['newfunctionality'])) {$manual = $_POST['newfunctionality'];
                $txt = $txt . "REQUESTED: New Functionality" . "\r\n \r\n";
            }
            if (!empty($_POST['psdtowptheme'])) {$manual = $_POST['psdtowptheme'];
                $txt = $txt . "REQUESTED: PSD to WP Theme" . "\r\n \r\n";
            }
            if (!empty($_POST['instalssl'])) {$manual = $_POST['instalssl'];
                $txt = $txt . "REQUESTED: Instal SSL (HTTP to HTTPS)" . "\r\n \r\n";
            }
            if (!empty($_POST['fixwperrors'])) {$manual = $_POST['fixwperrors'];
                $txt = $txt . "REQUESTED: Fix WordPress Errors" . "\r\n \r\n";
            }
            if (!empty($_POST['fixwptheme'])) {$manual = $_POST['fixwptheme'];
                $txt = $txt . "REQUESTED: Fix WordPress Theme Issues" . "\r\n \r\n";
            }
            if (!empty($_POST['fixcode'])) {$manual = $_POST['fixcode'];
                $txt = $txt . "REQUESTED: Fix Any Coding Bugs" . "\r\n \r\n";
            }
            if (!empty($_POST['fixplugin'])) {$manual = $_POST['fixplugin'];
                $txt = $txt . "REQUESTED: Fix Any Plugin Issue" . "\r\n \r\n";
            }
            if (!empty($_POST['createeditwebsite'])) {$manual = $_POST['createeditwebsite'];
                $txt = $txt . "REQUESTED: Create or Edit Website" . "\r\n \r\n";
            }
            if (!empty($_POST['removehackharden'])) {$manual = $_POST['removehackharden'];
                $txt = $txt . "REQUESTED: Remove Hack & Harden Security" . "\r\n \r\n";
            }
            if (!empty($_POST['converttowp'])) {$manual = $_POST['converttowp'];
                $txt = $txt . "REQUESTED: Convert Websites to WordPress" . "\r\n \r\n";
            }
            if (!empty($_POST['transferwp'])) {$manual = $_POST['transferwp'];
                $txt = $txt . "REQUESTED: Move WP to Other Host" . "\r\n \r\n";
            }
            if (!empty($_POST['speed'])) {$manual = $_POST['speed'];
                $txt = $txt . "REQUESTED: Make your Site Faster" . "\r\n \r\n";
            }
            if (!empty($_POST['updatewp'])) {$manual = $_POST['updatewp'];
                $txt = $txt . "REQUESTED: Update WordPress, Theme & Plugins" . "\r\n \r\n";
            }
            if (!empty($_POST['backupwp'])) {$manual = $_POST['backupwp'];
                $txt = $txt . "REQUESTED: Backup Your Site" . "\r\n \r\n";
            }
            if (!empty($_POST['customwork'])) {$manual = $_POST['customwork'];
                $txt = $txt . "REQUESTED: Any other Custom Work" . "\r\n \r\n";
            }

        }

        $txt = $txt . "Description: $desc" . "\r\n \r\n";

        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: multipart/mixed; charset=iso-8859-1' . "\r\n";
        $headers = "From: $email" . "\r\n" . "CC: $email";

        // These files need to be included as dependencies when on the front end.
        require_once ABSPATH . 'wp-admin/includes/image.php';
        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/media.php';

        // Let WordPress handle the upload.
        // Remember, 'my_image_upload' is the name of our file input in our form above.
        $attachment_id = media_handle_upload('my_image_upload', 9999);
        $attachments = get_attached_file($attachment_id);

        /*if ( is_wp_error( $attachment_id ) ) {
        echo "There was an error uploading the image.";
        } else {
        echo "The image was uploaded successfully!";
        }*/

        wp_mail($to, $msgtitle, $txt, $headers, $attachments);
        wp_delete_attachment($attachment_id, true);

    }

}

//add css
function wwme_wh_outputcss()
{
    echo "<style>";
    include dirname(__FILE__) . "/style.css";
    echo "</style>";
}

//add js
function wwme_wh_outputjs()
{
    $js = "
<script>
jQuery(document).ready(function($) {


})
</script>";
    echo $js;

}
