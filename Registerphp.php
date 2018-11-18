<?php
$username = "root";
$db_name= "bank";
$localhost="localhost";
$password="";
$conn=mysqli_connect($localhost,'root', $password, $db_name);
mysqli_select_db($conn,"bank");
if(!$conn)
{
  echo "Unable to connect";
}
if(isset($_POST['submit_btn']))
{
//echo '<script type="text/javascript"> alert("sign up button clicked") </script>';
$username=$_POST['uname'];
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$city=$_POST['city'];
$password=$_POST['pwd'];
$cpassword=$_POST['cpwd'];
if($password==$cpassword)
{
$query="SELECT * from wmregister2 where UserName='$username'";
$query_run=mysqli_query($conn,$query);
if(mysqli_num_rows($query_run)>0)
{
	echo '<script type="text/javascript"> alert("user already exits....") </script>';
  exit();
}
else
{
	$query="INSERT into wmregister2 values('$username','$name','$email','$password','$mobile','$city')";
	$query_run=mysqli_query($conn,$query);
	  header('location: login.html');
}
	if($query_run)
{
	echo '<script type="text/javascript">alert("user registered...")</script>';
}
else
{
	echo '<script type="text/javascript"> alert("Unable to register!")</script>';
  exit();
}
}
else
{
		echo '<script type="text/javascript"> alert("password and confirm password doesnot match!")</script>';
    exit();
}
}
?>