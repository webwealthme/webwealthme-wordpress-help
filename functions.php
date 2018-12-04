<?php
//include necessary files
require_once dirname(__FILE__) . "/incl/getytcaptions.php";

//define constants
//this fixes the file_get_contents
define("SCSYTAPFIXFILEGET", serialize(array("ssl" => array("verify_peer" => false, "verify_peer_name" => false))));

