<?php
$connection =mysqli_connect('localhost','root','','appointmentdb');
?>
 
<html>
<head>
</head>
<body bgcolor=lightblue>
<h1>Appointment Page<h1>
 <form action=# method=post>
 <table border=0 cellpadding=3>
  <tr>
   <td>Name:</td>
   <td> <Input type=text name=name required> <br> </td>
  </tr> 
  <tr>
   <td>ID No:  </td>
   <td> <input type=text name="id" required></td> 
  <tr> 
   <td>Gender: </td> 
   <td><input type=radio name="gen" required value=Male >Male 
   <input type=radio  name="gen" required value=Female>Female </td>
  </tr>
  <tr>
    <td>Mobile:</td>
	<td><input type=text name="mobile" required> </td>
  </tr>
   <tr>
    <td>Email ID:</td>
	<td><input type=text name="email" required> </td>
  </tr>
  <tr><td>Select date: </td><td><Input type=date name=date> </td></tr>
  <tr colspan=2> <td><input type=submit name=submit value=Click>  </td></tr>
  </table>
  
 </form>
 <?php
 if(isset($_POST['submit']))
 { 
	 $name=$_POST['name'];
	 $id=$_POST['id'];
	 $gen=$_POST['gen'];
	 $mobile=$_POST['mobile'];
	 $email=$_POST['email'];
	 $d1=$_POST['date'];
	 
//	$d1=date('Y/m/d');
    // $d1=date("Y-m-d");
	$query="INSERT INTO pappoint Values('$name',$id,'$gen',$mobile,'$email','$d1')";
   $result= mysqli_query($connection,$query);
  /*  if($result)
   {
       echo"success";
	}
	else
	{
     	echo"failed";
	} */	

			  
$html="<h1>You have successfully register for appointment<h1><br>
       <table>
	          <tr><td>Name</td><td>:</td><td>$name</td></tr>
              <tr><td>ID No</td><td>:</td><td>$id</td></tr>
			  <tr><td>Gender</td><td>:</td><td>$gen</td></tr>
			  <tr><td>Mobile</td><td>:</td><td>$mobile</td></tr>
              <tr><td>Email</td><td>:</td><td>$email</td></tr>
			  <tr><td>Date</td><td>:</td><td>$d1</td></tr>
	    </table>";			  
	
	include('smtp/PHPMailerAutoload.php');
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="cocvworld@gmail.com";
	$mail->Password="key1lock";
	$mail->SetFrom("cocvworld@gmail.com");
	$mail->addAddress($email);
	$mail->IsHTML(true);
	$mail->Subject="New Contact Us";
	$mail->Body=$html;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->send()){
		echo "Mail sent";
	}else{
		echo "Error occur";
	}
     
     
     //sms
     require_once 'vendor/autoload.php';
$messagebird = new MessageBird\Client('plYu4RmMW1PGknUwC7GtC4lm0');
$message = new MessageBird\Objects\Message;
$message->originator = '+917004557615';
$message->recipients = [  $mobile ];
$message->body = $name.' , Your Appointment Successfully Registered';
$response = $messagebird->messages->create($message);
     
     
 }
?>
<?php

?>


 
</body>
</html>

