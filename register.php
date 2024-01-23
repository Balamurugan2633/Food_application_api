<?php
include("config.php");
$user=$_GET['user'];
$pass=$_GET['pass'];
$email=$_GET['email'];

 $sql="INSERT INTO `user`(`username`, `password`, `email`) VALUES ('$user','$pass','$email')";
 $result=mysqli_query($con,$sql);
 if($result){
     echo "1";
}else{
    echo "no";
}


?>
