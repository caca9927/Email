<?php
	
	$f_name = $_POST['firstname'];
	$l_name = $_POST ['lastname'];
	$username = $_POST['username'];
	$pass1 = $_POST['password'];
	$pass2 = $_POST['password2'];
	$email = $_POST['email'];
	$sec = $_POST['security'];
	
	$domain = 'domain.org.uk'; //Insert Domain here.
	
	include ('inc/db/conn.php');
	
	$fullemail = $user ."@". $domain;
	
	$hash = md5($pass);
	$hash2 = md5($pass2);
	$pw= md5($_POST['password']);
	
	
	
	
	if ($hash == $hash2) {
		if ($sec == '17') {
		$mysql = "INSERT INTO `hm_accounts`(
			`accountdomainid`,
			`accountadminlevel`, 
			`accountaddress`, 
			`accountpassword`, 
			`accountactive`, 
			`accountisad`, 
			`accountaddomain`, 
			`accountadusername`, 
			`accountmaxsize`, 
			`accountvacationmessageon`, 
			`accountvacationmessage`, 
			`accountvacationsubject`, 
			`accountpwencryption`, 
			`accountforwardenabled`, 
			`accountforwardaddress`, 
			`accountforwardkeeporiginal`, 
			`accountenablesignature`, 
			`accountsignatureplaintext`, 
			`accountsignaturehtml`, 
			`accountlastlogontime`, 
			`accountvacationexpires`, 
			`accountvacationexpiredate`, 
			`accountpersonfirstname`, 
			`accountpersonlastname`) 
			VALUES (
					'2',
					'0',
					'$fullemail',
					'$pw',
					'1',
					'0',
					'',
					'',
					'0',
					'0',
					'0',
					'0',
					'3',
					'0',
					'',
					'0',
					'0',
					'',
					'',
					'2013-10-15 00:00:00',
					'0',
					'2013-10-15 00:00:00',
					'$f_name',
					'$l_name')
			";
			mysql_query($mysql);
			
			
		$email_from = 'myownemail@domain.com';
		$email_subject = "New email account activation";
		$email_body = "Thankyou $f_name for registering for a free email account. \n";
		$email_body = "you may now loginto your free emai8l account by visiting. http://www.domain.org.uk \n";
		$email_body = "Should you have any problems please reply to this email. \n";
		$email_body = "Should you forget your password. Please email passwords@somain.com. This is a security method used to protect your account. \n \n Regards Webmail Team";
		$to = "$email";
		$headers = "From: $email_from \r\n";
		$headers .= "Reply-To: $email_from \r\n";
		mail($to,$email_subject,$email_body,$headers);
			
			
			
			
			
			echo mysql_error();
			echo '<script type="text/javascript" >
		window.alert("Hello World!");
	
		alert("Hello World!");
	</script>';
			header ("location: index.php");
		}
		else {
			echo "Security Code Incorrect";
		}
	}
	
	else {
		echo "Passwords do not match. Please try again";
	
	}
	
	mysql_close()
	
	?>

