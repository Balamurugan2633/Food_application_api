<?php
session_start();
include("config.php");
$user=$_GET['user'];
$pass=$_GET['pass'];
 $sql="SELECT * FROM `user` WHERE username='$user' AND password='$pass'";
 $result=mysqli_query($con,$sql);
 if(mysqli_num_rows($result)>0){
     echo "1";
}else{
    echo "0";
}
?>