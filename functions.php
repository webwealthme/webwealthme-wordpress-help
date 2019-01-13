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
". wp_nonce_field('wwme_wh_sendemail_action') ."
<input class='button-primary' id='wwme_wh_submit' formmethod='post'  type='submit' value='" . $cta . "'>
</div>
</form>
";
}

//send email
function wwme_wh_sendemail()
{
    if (!empty($_POST['email'])) {
        $retrieved_nonce = $_REQUEST['_wpnonce'];
        if (!wp_verify_nonce($retrieved_nonce, 'wwme_wh_sendemail_action' ) ) die( 'Failed security check' );

        echo "<div id='wwme_wh_sent_info'>";
        echo "Thank you for contacting us, we will get back to you as soon as possible! Please make sure you whitelist admin@webwealth.me email to be able to receive messages from us.";
        echo "</div>";

        if (!empty($_POST['internalid'])) {$internalid = sanitize_text_field($_POST['internalid']);} else { $internalid = "";}
        if (!empty($_POST['title'])) {$title = sanitize_text_field($_POST['title']);} else { $title = "";}
        if (!empty($_POST['desc'])) {$desc = sanitize_textarea_field($_POST['desc']);} else { $desc = "";}
        if (!empty($_POST['site'])) {$site = sanitize_text_field($_POST['site']);} else { $site = "";}
        if (!empty($_POST['myFile'])) {$myFile = sanitize_file_name($_POST['myFile']);} else { $myFile = "";}
        
        $attachments_path = wp_upload_dir();
        $attachments = array($attachments_path["baseurl"] . "/$myFile");
        if (!empty($_POST['name'])) {$name = sanitize_text_field($_POST['name']);} else { $name = "";}
        if (!empty($_POST['email'])) {$email = sanitize_email($_POST['email']);} else { $email = "";}

        $to = "admin@webwealth.me";

        $txt = "Service: $internalid" . "\r\n";
        if ($internalid == "GetMyOngoingMaintenance") {$txt = $txt . "IMPORTANT: Please setup the reocurring secure Paypal Payment to start your service by going here: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=L7G7FDS3BU2VN ($59/month), thank you!" . "\r\n";}
        $txt = $txt . "Name: $name" . "\r\n";
        $txt = $txt . "Email: $email" . "\r\n";
        $txt = $txt . "Site: $site" . "\r\n \r\n";
        $txt = $txt . "Title: $title" . "\r\n";
        $msgtitle = $internalid . ": " . $name . " [" . $site . "] " . $title;

        //if they choose step by step, see which type they choose
        if ($internalid == "GETMYSTEPBYSTEPINSTRUCTIONSQUOTE") {
            if (!empty($_POST['manual'])) {
                $txt = $txt . "REQUESTED: MANUAL" . "\r\n";
            }
            if (!empty($_POST['video'])) {
                $txt = $txt . "REQUESTED: VIDEO" . "\r\n";
            }
        }
        //if they choose custom work, see which type they choose
        if ($internalid == "GETMYDOITFORMEQUOTE") {
            if (!empty($_POST['currentsiteedits'])) {
                $txt = $txt . "REQUESTED: Current Site Edits" . "\r\n \r\n";
            }
            if (!empty($_POST['newfunctionality'])) {
                $txt = $txt . "REQUESTED: New Functionality" . "\r\n \r\n";
            }
            if (!empty($_POST['psdtowptheme'])) {
                $txt = $txt . "REQUESTED: PSD to WP Theme" . "\r\n \r\n";
            }
            if (!empty($_POST['instalssl'])) {
                $txt = $txt . "REQUESTED: Instal SSL (HTTP to HTTPS)" . "\r\n \r\n";
            }
            if (!empty($_POST['fixwperrors'])) {
                $txt = $txt . "REQUESTED: Fix WordPress Errors" . "\r\n \r\n";
            }
            if (!empty($_POST['fixwptheme'])) {
                $txt = $txt . "REQUESTED: Fix WordPress Theme Issues" . "\r\n \r\n";
            }
            if (!empty($_POST['fixcode'])) {
                $txt = $txt . "REQUESTED: Fix Any Coding Bugs" . "\r\n \r\n";
            }
            if (!empty($_POST['fixplugin'])) {
                $txt = $txt . "REQUESTED: Fix Any Plugin Issue" . "\r\n \r\n";
            }
            if (!empty($_POST['createeditwebsite'])) {
                $txt = $txt . "REQUESTED: Create or Edit Website" . "\r\n \r\n";
            }
            if (!empty($_POST['removehackharden'])) {
                $txt = $txt . "REQUESTED: Remove Hack & Harden Security" . "\r\n \r\n";
            }
            if (!empty($_POST['converttowp'])) {
                $txt = $txt . "REQUESTED: Convert Websites to WordPress" . "\r\n \r\n";
            }
            if (!empty($_POST['transferwp'])) {
                $txt = $txt . "REQUESTED: Move WP to Other Host" . "\r\n \r\n";
            }
            if (!empty($_POST['speed'])) {
                $txt = $txt . "REQUESTED: Make your Site Faster" . "\r\n \r\n";
            }
            if (!empty($_POST['updatewp'])) {
                $txt = $txt . "REQUESTED: Update WordPress, Theme & Plugins" . "\r\n \r\n";
            }
            if (!empty($_POST['backupwp'])) {
                $txt = $txt . "REQUESTED: Backup Your Site" . "\r\n \r\n";
            }
            if (!empty($_POST['customwork'])) {
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
    wp_enqueue_style( 'wwme_wh_style', plugins_url( 'wwme_wh_style.css', __FILE__ ),false,null);
}

function wwme_wh_sanitize($string){
    
        $allowedposttags = array(
            'address'    => array(),
            'a'          => array(
                'href'     => true,
                'rel'      => true,
                'rev'      => true,
                'name'     => true,
                'target'   => true,
                'download' => array(
                    'valueless' => 'y',
                ),
            ),
            'abbr'       => array(),
            'acronym'    => array(),
            'area'       => array(
                'alt'    => true,
                'coords' => true,
                'href'   => true,
                'nohref' => true,
                'shape'  => true,
                'target' => true,
            ),
            'article'    => array(
                'align'    => true,
                'dir'      => true,
                'lang'     => true,
                'xml:lang' => true,
            ),
            'aside'      => array(
                'align'    => true,
                'dir'      => true,
                'lang'     => true,
                'xml:lang' => true,
            ),
            'audio'      => array(
                'autoplay' => true,
                'controls' => true,
                'loop'     => true,
                'muted'    => true,
                'preload'  => true,
                'src'      => true,
            ),
            'b'          => array(),
            'bdo'        => array(
                'dir' => true,
            ),
            'big'        => array(),
            'blockquote' => array(
                'cite'     => true,
                'lang'     => true,
                'xml:lang' => true,
            ),
            'br'         => array(),
            'button'     => array(
                'disabled' => true,
                'name'     => true,
                'type'     => true,
                'value'    => true,
            ),
            'caption'    => array(
                'align' => true,
            ),
            'cite'       => array(
                'dir'  => true,
                'lang' => true,
            ),
            'code'       => array(),
            'col'        => array(
                'align'   => true,
                'char'    => true,
                'charoff' => true,
                'span'    => true,
                'dir'     => true,
                'valign'  => true,
                'width'   => true,
            ),
            'colgroup'   => array(
                'align'   => true,
                'char'    => true,
                'charoff' => true,
                'span'    => true,
                'valign'  => true,
                'width'   => true,
            ),
            'del'        => array(
                'datetime' => true,
            ),
            'dd'         => array(),
            'dfn'        => array(),
            'details'    => array(
                'align'    => true,
                'dir'      => true,
                'lang'     => true,
                'open'     => true,
                'xml:lang' => true,
            ),
            'div'        => array(
                'align'    => true,
                'dir'      => true,
                'lang'     => true,
                'xml:lang' => true,
            ),
            'dl'         => array(),
            'dt'         => array(),
            'em'         => array(),
            'fieldset'   => array(),
            'figure'     => array(
                'align'    => true,
                'dir'      => true,
                'lang'     => true,
                'xml:lang' => true,
            ),
            'figcaption' => array(
                'align'    => true,
                'dir'      => true,
                'lang'     => true,
                'xml:lang' => true,
            ),
            'font'       => array(
                'color' => true,
                'face'  => true,
                'size'  => true,
            ),
            'footer'     => array(
                'align'    => true,
                'dir'      => true,
                'lang'     => true,
                'xml:lang' => true,
            ),
            'h1'         => array(
                'align' => true,
            ),
            'h2'         => array(
                'align' => true,
            ),
            'h3'         => array(
                'align' => true,
            ),
            'h4'         => array(
                'align' => true,
            ),
            'h5'         => array(
                'align' => true,
            ),
            'h6'         => array(
                'align' => true,
            ),
            'header'     => array(
                'align'    => true,
                'dir'      => true,
                'lang'     => true,
                'xml:lang' => true,
            ),
            'hgroup'     => array(
                'align'    => true,
                'dir'      => true,
                'lang'     => true,
                'xml:lang' => true,
            ),
            'hr'         => array(
                'align'   => true,
                'noshade' => true,
                'size'    => true,
                'width'   => true,
            ),
            'i'          => array(),
            'img'        => array(
                'alt'      => true,
                'align'    => true,
                'border'   => true,
                'height'   => true,
                'hspace'   => true,
                'longdesc' => true,
                'vspace'   => true,
                'src'      => true,
                'usemap'   => true,
                'width'    => true,
            ),
            'ins'        => array(
                'datetime' => true,
                'cite'     => true,
            ),
            'kbd'        => array(),
            'label'      => array(
                'for' => true,
            ),
            'legend'     => array(
                'align' => true,
            ),
            'li'         => array(
                'align' => true,
                'value' => true,
            ),
            'map'        => array(
                'name' => true,
            ),
            'mark'       => array(),
            'menu'       => array(
                'type' => true,
            ),
            'nav'        => array(
                'align'    => true,
                'dir'      => true,
                'lang'     => true,
                'xml:lang' => true,
            ),
            'p'          => array(
                'align'    => true,
                'dir'      => true,
                'lang'     => true,
                'xml:lang' => true,
            ),
            'pre'        => array(
                'width' => true,
            ),
            'q'          => array(
                'cite' => true,
            ),
            's'          => array(),
            'samp'       => array(),
            'span'       => array(
                'dir'      => true,
                'align'    => true,
                'lang'     => true,
                'xml:lang' => true,
            ),
            'section'    => array(
                'align'    => true,
                'dir'      => true,
                'lang'     => true,
                'xml:lang' => true,
            ),
            'script'      => array(               
                'src'      => true,
            ),
            'style'      => array(               
                'src'      => true,
            ),
            'small'      => array(),
            'strike'     => array(),
            'strong'     => array(),
            'sub'        => array(),
            'summary'    => array(
                'align'    => true,
                'dir'      => true,
                'lang'     => true,
                'xml:lang' => true,
            ),
            'sup'        => array(),
            'table'      => array(
                'align'       => true,
                'bgcolor'     => true,
                'border'      => true,
                'cellpadding' => true,
                'cellspacing' => true,
                'dir'         => true,
                'rules'       => true,
                'summary'     => true,
                'width'       => true,
            ),
            'tbody'      => array(
                'align'   => true,
                'char'    => true,
                'charoff' => true,
                'valign'  => true,
            ),
            'td'         => array(
                'abbr'    => true,
                'align'   => true,
                'axis'    => true,
                'bgcolor' => true,
                'char'    => true,
                'charoff' => true,
                'colspan' => true,
                'dir'     => true,
                'headers' => true,
                'height'  => true,
                'nowrap'  => true,
                'rowspan' => true,
                'scope'   => true,
                'valign'  => true,
                'width'   => true,
            ),
            'textarea'   => array(
                'cols'     => true,
                'rows'     => true,
                'disabled' => true,
                'name'     => true,
                'readonly' => true,
            ),
            'tfoot'      => array(
                'align'   => true,
                'char'    => true,
                'charoff' => true,
                'valign'  => true,
            ),
            'th'         => array(
                'abbr'    => true,
                'align'   => true,
                'axis'    => true,
                'bgcolor' => true,
                'char'    => true,
                'charoff' => true,
                'colspan' => true,
                'headers' => true,
                'height'  => true,
                'nowrap'  => true,
                'rowspan' => true,
                'scope'   => true,
                'valign'  => true,
                'width'   => true,
            ),
            'thead'      => array(
                'align'   => true,
                'char'    => true,
                'charoff' => true,
                'valign'  => true,
            ),
            'title'      => array(),
            'tr'         => array(
                'align'   => true,
                'bgcolor' => true,
                'char'    => true,
                'charoff' => true,
                'valign'  => true,
            ),
            'track'      => array(
                'default' => true,
                'kind'    => true,
                'label'   => true,
                'src'     => true,
                'srclang' => true,
            ),
            'tt'         => array(),
            'u'          => array(),
            'ul'         => array(
                'type' => true,
            ),
            'ol'         => array(
                'start'    => true,
                'type'     => true,
                'reversed' => true,
            ),
            'var'        => array(),
            'video'      => array(
                'autoplay' => true,
                'controls' => true,
                'height'   => true,
                'loop'     => true,
                'muted'    => true,
                'poster'   => true,
                'preload'  => true,
                'src'      => true,
                'width'    => true,
            ),
            
        );
        return wp_kses($string, $allowedposttags);
}