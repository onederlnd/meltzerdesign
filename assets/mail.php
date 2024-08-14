<?php 
/* if(isset($_POST['submit'])){
    $to = "marla@meltzerdesign.com"; // this is your Email address
    $email = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $telephone = $_POST['telephone'];
    $company = $_POST['company'];
    $subject = "Web Form Submission - MeltzerDesign.com";
    // $subject2 = "Copy of your form submission";
    $message =  "First Name: ". $first_name . 
                "\nLast Name: " . $last_name . 
                "\nCompany: " . $company .
                "\nTelephone: " . $telephone . 
                "\nEmail Address: " . $email . 
                "\nMessage:\n" . $_POST['message'];
    // $message2 = "Here is a copy of your message " . $first_name . ",\n\n" . $business_type . "\n\n" . $_POST['message'];

    $headers = "From:" . $to;
    //$headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    //mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    // echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    // You cannot use header and echo together. It's one or the other.
    header('Location: ../thank_you.html');
    }
    */


   /*  This PHP form mailing script created by SiteGrinder 3.6 s_337  http://www.medialab.com/sitegrinder3  */

function stripFormSlashes($arr)
    {
 	    if(!is_array($arr))
 	    {
 		    return stripslashes($arr);
 	    }
 	    else
 	    {
 		    return array_map('stripFormSlashes', $arr);
 	    }
     }
 
     if(get_magic_quotes_gpc())
     {
 	    $_POST = stripFormSlashes($_POST);
     }
  $message = "";
  $message .= "First Name: " . htmlspecialchars($_POST['first_name'], ENT_QUOTES) . "<br \>\n";
  $message .= "Last Name: " . htmlspecialchars($_POST['last_name'], ENT_QUOTES) . "<br \>\n";
  $message .= "Email: " . htmlspecialchars($_POST['email'], ENT_QUOTES) . "<br \>\n";
  $message .= "Phone: " . htmlspecialchars($_POST['telephone'], ENT_QUOTES) . "<br \>\n";
  $message .= "Company: " . htmlspecialchars($_POST['company'], ENT_QUOTES) . "<br \>\n";
  $message .= "Comments: " . htmlspecialchars($_POST['message'], ENT_QUOTES) . "<br \>\n";
  $lowmsg = strtolower($message);
  $injection_strings = array ( "content-type:","charset=","mime-version:","multipart/mixed","bcc:","cc:");
  foreach($injection_strings as $suspect)
  {
   if((stristr($lowmsg, $suspect)) || (stristr(strtolower($_POST['first_name']), $suspect)) || (stristr(strtolower($_POST['email']), $suspect)))
   {
     die ( 'Illegal Input.  Go back and try again.  Your message has not been sent.' );
   }
  }
 $headers = "MIME-Version: 1.0\r\nContent-type: text/html; charset=utf-8\r\n";
 $headers .= "Content-Transfer-Encoding: 8bit\r\n";
 $headers .= "From: \"" . $_POST['first_name'] . " " . $_POST['last_name'] . "\" <" . $_POST['email'] . ">\r\n";
 $headers .= "Reply-To: " . $_POST['email'] . "\r\n";
  mail("rchristenhusz@brandnutmarketing.com", "From Marla Meltzer Graphic Design dot com", $message, $headers);
  header("Location: ../thank_you.html");
?>