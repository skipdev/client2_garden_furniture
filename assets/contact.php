<?php

// Email address verification
function isEmail($email) {
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if($_POST) {

    // Enter the email where you want to receive the message
    $emailTo = 'stephyx.web@gmail.com';

    $name = addslashes(trim($_POST['name']));
    $clientEmail = addslashes(trim($_POST['email']));
    $subject = addslashes(trim($_POST['subject']));
    $message = addslashes(trim($_POST['message']));

    $array = array('nameMessage' => '', 'emailMessage' => '', 'subjectMessage' => '', 'messageMessage' => '');

    
    if($name == '') {
        $array['subjectname'] = 'Empty name!';
    }
    if(!isEmail($clientEmail)) {
        $array['emailMessage'] = 'Invalid email!';
    }
    if($subject == '') {
        $array['subjectMessage'] = 'Empty subject!';
    }
    if($message == '') {
        $array['messageMessage'] = 'Empty message!';
    }
    if($name != '' && isEmail($clientEmail) && $subject != '' && $message != '') {
        // Send email
		$headers = "From: " . $name . " - " . $clientEmail . " <" . $clientEmail . ">" . "\r\n" . "Reply-To: " . $clientEmail;
		mail($emailTo, $subject, $message, $headers);
    }

    echo json_encode($array);

}

?>
