<?php
include("config.php");
$mealId = $_POST['mealId'] ?? '';
$mealn = $_POST['mealn'] ?? '';
$mealimg = $_POST['mealimg'] ?? '';
$quantity = $_POST['quantity'] ?? '';
$sql = "INSERT INTO cart (meal_id, meal_name, mealimg, quantity) VALUES ('$mealId', '$mealn', '$mealimg','$quantity')";
if ($con->query($sql) === TRUE) {
    echo "success";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
?>
