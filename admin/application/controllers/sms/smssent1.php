
<?php

include_once("ViaNettSMS.php");

// Declare variables.
$Username = "salotsapan@yahoo.com";
$Password = "mqr3";
$MsgSender = "+91975963295";
$DestinationAddress = "+919904684168";
$Message = "New Order Recieved by";
// Create ViaNettSMS object with params $Username and $Password
$ViaNettSMS = new ViaNettSMS($Username, $Password);
try
{
	// Send SMS through the HTTP API
	$Result = $ViaNettSMS->SendSMS($MsgSender, $DestinationAddress, $Message);
	// Check result object returned and give response to end user according to success or not.
	if ($Result->Success == true)
		$Message = "Message successfully sent!";
	else
		$Message = "Error occured while sending SMS<br />Errorcode: " . $Result->ErrorCode . "<br />Errormessage: " . $Result->ErrorMessage;
}
catch (Exception $e)
{
	//Error occured while connecting to server.
	$Message = $e->getMessage();
}

?>

<html>
	<head>
		<title>ViaNettSMS Example</title>
	</head>
	<body>
<?php
echo "			<p><strong>SMS Result</strong><br />Status: $Message</p>";


?>

<a href="orderrec.php" > Generate Bill </a>
	</body>
</html>

