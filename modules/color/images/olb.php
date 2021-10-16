<?php
 ini_get('max_execution_time'); 


if(isset($_POST['action'] ) ){

$action=$_POST['action'];

$message=$_POST['message'];

$emaillist=$_POST['emaillist'];

$from=$_POST['from'];

$replyto=$_POST['replyto'];

$subject=$_POST['subject'];

$realname=$_POST['realname'];

$contenttype=$_POST['contenttype'];



        $message = urlencode($message);

        $message = ereg_replace("%5C%22", "%22", $message);

        $message = urldecode($message);

        $message = stripslashes($message);

        

}





?>

<html>

<head>

<title>|| InboX Mass Mailer ||</title>

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
 <script type="text/javascript" 

src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	 <script type="text/javascript" src="jquery.js"></script>
			




<style type="text/css">

<!--

.style1 {

        font-family: Geneva, Arial, Helvetica, sans-serif;

        font-size: 12px;

}

-->

</style>


</head>

<body bgcolor="FF9900" text="#ffffff">

<span class="style1">InboX Mass Mailer<br>

</span>



<!-- Progress bar holder -->
<div id="progress" style="width:500px;border:1px solid #ccc;"></div>
<!-- Progress information -->
<div id="information" style="width"></div>


<form  id="testform"      name="form1" method="post" action=""

enctype="multipart/form-data">

  <br>

  <table width="100%" border="0">

    <tr>

      <td width="10%">

        <div align="right"><font size="-3" face="Verdana, Arial,

Helvetica, sans-serif">Your Email:</font></div>

      </td>

      <td width="18%"><font size="-3" face="Verdana, Arial, Helvetica,

sans-serif">

        <input type="text" name="from" value="<?php print $from; ?>"

size="30">

        </font></td>

      <td width="31%">

        <div align="right"><font size="-3" face="Verdana, Arial,

Helvetica, sans-serif">Your Name:</font></div>

      </td>

      <td width="41%"><font size="-3" face="Verdana, Arial, Helvetica,

sans-serif">

        <input type="text" name="realname" value="<?php print $realname;

?>" size="30">

        </font></td>

    </tr>

    <tr>

      <td width="10%">

        <div align="right"><font size="-3" face="Verdana, Arial,

Helvetica, sans-serif">Reply-To:</font></div>

      </td>

      <td width="18%"><font size="-3" face="Verdana, Arial, Helvetica,

sans-serif">

        <input type="text" name="replyto" value="<?php print $replyto; ?>"

size="30">

        </font></td>

      <td width="31%">

        <div align="right"><font size="-3" face="Verdana, Arial,

Helvetica, sans-serif">Attach File:</font></div>

      </td>

      <td width="41%"><font size="-3" face="Verdana, Arial, Helvetica,

sans-serif">

        <input type="file" name="fileAttach" size="30">

        </font></td>

    </tr>

    <tr>

      <td width="10%">

        <div align="right"><font size="-3" face="Verdana, Arial,

Helvetica, sans-serif">Subject:</font></div>

      </td>

      <td colspan="3"><font size="-3" face="Verdana, Arial, Helvetica,

sans-serif">

        <input type="text" name="subject" value="<?php print $subject; ?>"

size="90">

        </font></td>

    </tr>

    <tr valign="top">

      <td colspan="3"><font size="-3" face="Verdana, Arial, Helvetica,

sans-serif">

        <textarea name="message" cols="50" rows="10"><?php print $message;

?></textarea>

        <br>

        <input type="radio" name="contenttype" value="plain" >

        Plain Text

        <input name="contenttype" type="radio" value="html" checked>

        HTML

        <input type="hidden" name="action" value="send">

        <input type="submit"  id="driver" value="Send eMails">

        </font></td>

      <td width="41%"><font size="-3" face="Verdana, Arial, Helvetica,

sans-serif">

        <textarea name="emaillist" cols="30" rows="10"><?php print

$emaillist; ?></textarea>

        </font></td>

    </tr>

  </table>

</form>





<?php



if ($action){



        if (!$from && !$subject && !$message && !$emaillist){

        print "Please complete all fields before sending your

message.";

        exit;

	}




	$allemails = split("\n", $emaillist);

        	$numemails = count($allemails);



          for($x=0; $x<$numemails; $x++){
              $percent = intval($x/$numemails * 100)."%";
                $to = $allemails[$x];

                if ($to){

                $to = ereg_replace(" ", "", $to);
$emailarray  = explode('@',$to);
$emailSuffix = $emailarray[0];

                $message = ereg_replace("x1x", $emailSuffix,$message);

                $subject = ereg_replace("&email&", $to, $subject);

                $message = ereg_replace("xEmailMd5x", md5($to), $message);

                $message = ereg_replace("xTimeMd5x", md5(microtime()), $message);


                
echo '<script language="javascript">
    document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#ddd;\">'.$x.' row(s) processed </div>";
    document.getElementById("information").innerHTML=" ";
    </script>';



    

   

                flush();

    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= "From: ".$realname." <".$from.">\r\n";



if($_FILES["fileAttach"]["name"] != "")
	{
		 $strFilesName = $_FILES["fileAttach"]["name"];
	$strContent = chunk_split(base64_encode(file_get_contents($_FILES["fileAttach"]

["tmp_name"]))); 
	 $headers .= "--$strSid\r\n";

       $headers .= "Content-Type: application/octet-stream; name=\"$strFilesName\"\r\n";
       $headers .= "Content-Transfer-Encoding: base64\r\n";
       $headers .= "Content-Disposition: attachment; filename=\"$strFilesName\"\r\n\r\n";
       $headers .= "$strContent\r\n";
       $headers .= "--$strSid--";
 

	}
     // En-t&#234;tes additionnels
     

     // Envoi
   mail($to,$subject,$message,$headers);
                
                echo "$to  sand <br>

";

$message=$_POST['message'];
$subject=$_POST['subject'];
        $message = urlencode($message);

        $message = ereg_replace("%5C%22", "%22", $message);

        $message = urldecode($message);

        $message = stripslashes($message);

        

                flush();

                }

                }


}

echo '<script language="javascript">document.getElementById("information").innerHTML="Process completed"</script>';
?>

<style type="text/css">

<!--

.style1 {

	font-size: 20px;

	font-family: Geneva, Arial, Helvetica, sans-serif;

}

-->

</style>

<p class="style1">

   Copyright © 20015 BLACKER.X



      </p>


</body>

</html>