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
function wwme_wh_help_form($cta){
    $internalid = preg_replace('/\s+/', '', $cta);
 echo "
 <div id='wwme_wh_help_formmain'>
<input type='text' name='internalid' value='".$internalid."' hidden>
<input type='text' name='title' placeholder='Project Title'>
<br>
<textarea placeholder='Project Detailed Description'></textarea>
<br>
<input type='file' name='myFile'>
<br>
<input type='text' name='name' placeholder='Name'>
<br>
<input type='text' name='email' placeholder='Email'>
<br><br>
<input type='checkbox' name='messagecopy' value='copyofmessageininbox' checked> Get a copy of the message in your email inbox
<br>
<input class='button-primary' type='submit' value='".$cta."'>
</div>
</form>
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