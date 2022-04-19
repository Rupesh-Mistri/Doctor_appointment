<?php
$connection =mysqli_connect('localhost','root','','appointmentdb');
?>
 


<html>
<head>
</head>
<body bgcolor=lightblue>
<center>
<form action=# method=post>
  Select date: <Input type=date name=date> <br>
  <input type=submit name=submit value=Click>
</form>

<table aling=center border=1 cellpadding=5 cellspacing=5 >
<tr><td>Name</td><td>ID No.</td><td>Gender</td><td>Mobile No.</td></tr>
<?php
 if(isset($_POST['submit']))
{
$d1=$_POST['date']; 
echo $d1;
echo "<br>";
//$d1=date('Y/m/d');
    $query="select * from pappoint where date='$d1'";
   $result= mysqli_query($connection,$query);
   while($row=mysqli_fetch_row($result))
    {
     echo("<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td></tr>");

    } 
	
   /*  if($result){
       echo"success";
	}
	else{
     	echo"failed";
	} */
}
?>

</table>

</center>

</body>
</html>

