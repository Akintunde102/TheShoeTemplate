<?php   include('store/inc.php');
	$time = strtotime(date("Y-m-d H:i:s"));

$errors 			= array(); 		// array to pass back data
$data 			= array(); 		// array to pass back data

// validate the variables ======================================================
	// if any of these variables don't exist, add an error to our $errors array


if (empty($_POST['fname']) && empty($_POST['email']))
	{
		$errors['fname'] = 'Please input your name and email address or phone number, we\ll need it to contact you';
	}

	if (empty($_POST['comment']))
	{$_POST['comment'] = 'No Comment';}
	
	
	if (!empty($_POST['fname']) && !empty($_POST['email']))
	{		
       $_POST['fname'] = trim($_POST['fname']);

       $_POST['email'] = trim($_POST['email']);
	   
       $_POST['comment'] = trim($_POST['comment']);
	}

	// if there are any errors in our errors array, return a success boolean of false
	if (empty($errors)) {
// construct the email
$Email = new Email();
$Email->sender = $_POST['fname'].' <'.$_POST['email'].'>';
$Email->recipient = 'BFEMS <'.$orderEmail.'>';
$Email->subject = "New Order from ".$_POST['fname'];
$Email->message_text = "New Order for product(Check via this address http://$site_name/img/products/".$_POST['product'].")
	Comment: ".$_POST['comment'];
$Email->message_html = "New Order for product(Check via this address http://$site_name/img/products/".$_POST['product'].")
<p>   <img src=\"http://$site_name/img/products/".$_POST['product']."\" /> </p><br/>
Comment: ".$_POST['comment'];

// send the email
$Courier = new Courier();
$sent = $Courier->send($Email);
	if($sent == Courier::SEND_OK){$data['success'] = true; $data['message'] = 'Your Order has been succesfully received,we\'ll get in touch';}
	else {$data['success'] = false; $data['message'] = 'An error occured,Please try again';}
	}
else { $data['success'] = false; $data['errors']  = $errors;}

	// return all our data to an AJAX call
	echo json_encode($data);