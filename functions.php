<?php

// send email
// build form that takes parameters of what to use incl button name
/*<title>
<textarea>
<upload files>
<checkboxes> Manual (TEXT/IMAGES)  VIDEO
<name>
<email>
<checkbox> Get a copy of the message in your email inbox
<Get STEP BY STEP INSTRUCTIONS Quote>*/


//create help forms
function wwme_wh_help_form($color, $cta){
 echo "
title
textarea
upload files
name
email
checkbox Get a copy of the message in your email inbox
$cta
";
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