<?php
include_once("config.php");

if(isset($_GET['name']) && isset($_GET['price'])) {
    $name = $_GET['name'];
    $price = $_GET['price'];

    // Server-side validation
    if (!empty($name) && is_numeric($price)) {
        // Perform database insertion
        $sql = "INSERT INTO `recipe` (name, price) VALUES ('$name', '$price')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo 1; // Success
        } else {
            echo 0; // Error in database insertion
        }
    } else {
        echo -1; // Validation failed
    }
} else {
    echo -1; // Invalid parameters
}
?>
