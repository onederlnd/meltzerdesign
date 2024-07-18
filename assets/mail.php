<?php 
if(isset($_POST['submit'])){
    $to = "rchristenhusz@brandnutmarketing.com"; // this is your Email address
    $email = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $business_type = $_POST['business_type'];
    $company = $_POST['company'];
    $subject = "Form submission";
    // $subject2 = "Copy of your form submission";
    $message =  "First Name: ". $first_name . 
                "\nLast Name: " . $last_name . 
                "\nCompany: " . $company .
                "\nEmail Address: " . $email . 
                "\nBusiness Type: " . $business_type . 
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
?>