<?php
include("config.php");
$name=$_GET['name'];
$price=$_GET['price'];
$sql="INSERT INTO `recipe`(`name`, `price`) VALUES ('$name','$price')";
$result=mysqli_query($con,$sql);
 if($result){
     echo "1";
}else{
    echo "no";
}
?>

