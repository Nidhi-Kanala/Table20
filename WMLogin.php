<?php
 session_start();
 $username=$_POST['username'];
 $password=$_POST['pwd'];
 $db=mysqli_connect('localhost','root','','bank');
 $query="SELECT * from wmregister2 where Name='$username' AND Password='$password'";
 $res=mysqli_query($db,$query);
 if(mysqli_num_rows($res)==1){
 	 $_SESSION['username']=$username;
 	 $_SESSION['flag']=true;
 	header('location: WMDashboard.html');
 }
 else
 	header('location:WMLogin.php');
 ?>
