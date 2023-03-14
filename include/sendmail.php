<?php 
global $_REQUEST;
$response = array('error'=>'');
$contact_email = 'umoyoprintex@gmail.com';

// type
$type = $_REQUEST['type'];	
// parse
parse_str($_POST['data'], $post_data);	
		

		$fname = stripslashes(strip_tags(trim($post_data['fname'])));
        $lname = stripslashes(strip_tags(trim($post_data['lname'])));
        $phone = stripslashes(strip_tags(trim($post_data['phone'])));
		$email = stripslashes(strip_tags(trim($post_data['email'])));
        $company =stripslashes(strip_tags(trim( $post_data['company'])));
		$message =stripslashes(strip_tags(trim( $post_data['message'])));
        $subject =stripslashes(strip_tags(trim( $post_data['subject'])));
			
		if (trim($contact_email)!='') {
			$subj = 'Message from Umoyo Micro Loans Limited';
			$msg = $subj." \r\nFName: $fname \r\nLName: $lname \r\nPhone: $phone \r\nE-mail: $email \r\nCompany: $company \r\nMessage: $message \r\nSubject: $subject ";
		
			$head = "Content-Type: text/plain; charset=\"utf-8\"\n"
				. "X-Mailer: PHP/" . phpversion() . "\n"
				. "Reply-To: $email\n"
				. "To: $contact_email\n"
				. "From: $email\n";
		
			if (!@mail($contact_email, $subj, $msg, $head)) {
				$response['error'] = 'Error send message!';
			}
		} else 
				$response['error'] = 'Error send message!';


	echo json_encode($response);
	die();
?>