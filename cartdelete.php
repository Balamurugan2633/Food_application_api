<?php
include("config.php");
$mealId = $_POST['mealid'];
$sql = "DELETE FROM cart WHERE id = $mealId";
if ($con->query($sql) === TRUE) {
    echo '1';
} else {
    echo 'error';
}
?>
