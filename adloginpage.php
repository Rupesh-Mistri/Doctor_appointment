<?php
$connection =mysqli_connect('localhost','root','','appointmentdb');
?>

<html>  
<body bgcolor=lightblue> 
<form  method="post" action="adloginpage.php">
<table width=50% align=center  cellpadding=5>
  <tr><td colspan=2>Admin Login</td></tr>
  <tr><td>UserID</td><td> <input type=text name =userid required></td></tr>
    <tr><td>Password</td><td> <input type=password name =password required></td></tr>
  <tr><td></td> <td> <input type=submit name=Login> </td></tr>
</table> 
</form>
</body> 
</html>


<?php 
  if($_SERVER['REQUEST_METHOD']=='POST')
 {
	$userid=$_POST['userid'];
	$password=$_POST['password'];
  
$query="select * from adlogin where username='$userid' and password ='$password";
      $result= mysqli_query($connection,$query);
      
	
	        if (mysqli_num_rows($result) === 1) 
            {
 
               $row = mysqli_fetch_assoc($result);

    if ($row['username'] === $username && $row['password'] === $password) 
            {

                echo "Logged in!";

                $_SESSION['user_name'] = $row['user_name'];

                $_SESSION['name'] = $row['name'];

            //    $_SESSION['id'] = $row['id'];

                header("Location: adminpage.php");

                //exit();
            }}}
?>