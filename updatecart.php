<?php
include("config.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $newQuantity = $_POST['quantity'];}
    $sql = "UPDATE `cart` SET `quantity`='$newQuantity' WHERE id = $id";
    if ($con->query($sql) === TRUE) {
        echo 'success';
    } else {
        echo 'error';
    }
?>
