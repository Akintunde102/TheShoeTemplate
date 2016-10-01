<?php
$site_name = 'localhost/bfems';  
$orderEmail = 'jegedeakintunde@gmail.com';  	
/** Check your file system path! **/
require_once('store/m/mobile_detect.php');
require_once('store/send/classes/Email.class.php');
require_once('store/send/classes/Courier.class.php');



$detect = new Mobile_Detect;

$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer'); 

if ($deviceType == 'tablet'){$deviceType = 'phone';}

?>