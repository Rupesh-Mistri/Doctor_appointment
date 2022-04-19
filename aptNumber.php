<?php
$connection =mysqli_connect('localhost','root','','appointmentdb');
?>
 
<html>
<head>
</head>
<body bgcolor=lightblue>
<h1>No. of appointment</h1>

<form action=# method=post>
  Select date: <Input type=date name=date required> <br>
  <input type=submit name=submit value=Click>
</form>
<?php
  

 if(isset($_POST['submit']))
{
$d1=$_POST['date']; 
echo $d1;
echo "<br>";
//$d1=date('Y/m/d');


//No of appointment left	
   $query="select 30-count(*) from pappoint where date='$d1'";
   $result= mysqli_query($connection,$query);
   while($row=mysqli_fetch_row($result))
    {
         echo "No.of appointment left ".$row[0];
		 echo"<br>";
    } 
	
     if($result){
       echo"";
	}
	else{
     	echo"Failed";
	} 
}
?>

</body>
</html>

