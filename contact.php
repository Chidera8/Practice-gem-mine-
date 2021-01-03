<?php 
    function checkemail($str) {
         return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
    }
    
	if(isset($_POST['submit'])){
		$to = "support@gem-mine.com";
		$from = $_POST['email'];
		if(!checkemail($from)){
            echo '<script language="javascript">';
            echo 'alert("Invalid Email!")';  //showing..
            echo '</script>';
            exit;;
        }else{
            $sender = $_POST['name'];
    		$subject = $_POST['subject'];
    		$message =  $_POST['message'];
    
    		$headers = "MIME-VERSION: 1.0" . "\r\n";
    		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    		$headers = "From:" . $from;
    		mail($to,$subject,$message,$headers);
    		echo '<script language="javascript">';
            echo 'alert("Email sent successfully!! We will get back to you shortly!")';  //showing..
            echo '</script>';
            
            header("Location: contact.html");
        }
	}
	else{
		echo "Failed";
	}
?>
