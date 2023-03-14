<?php 
global $_REQUEST;
$response = array('error'=>'');
$contact_email = 'umoyoprintex@gmail.com';

// type
$type = $_REQUEST['type'];	
// parse
parse_str($_POST['data'], $post_data);	
		

		$name = stripslashes(strip_tags(trim($post_data['name'])));
        $service = stripslashes(strip_tags(trim($post_data['service'])));
        $email = stripslashes(strip_tags(trim($post_data['email'])));
        $phone = stripslashes(strip_tags(trim($post_data['phone'])));
				
		if (trim($contact_email)!='') {
			$subj = 'Message from Umoyo Micro Loans Limited';
			$msg = $subj." \r\nName: $name \r\nService: $service \r\nE-mail: $email \r\nPhone: $phone";
		
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