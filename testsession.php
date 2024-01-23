<?php
session_start();
  print_r($_SESSION['person']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 3px solid black;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
    </style>
</head>

<body>

    <div class="container">
        <center>
            <h2>Display Recipes</h2>
        </center>
        <?php
        if (isset($_SESSION['person']) && !empty($_SESSION['person'])) {
            $person = $_SESSION['person'];
        ?>
        <table>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>PRICE</th>
            </tr>
            <?php
                for ($i = 0; $i < count($person); $i += 3) {
                    $id = $person[$i];
                    $name = $person[$i + 1];
                    $price = $person[$i + 2];
                    ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $price; ?></td>
            </tr>
            <?php
                }
                ?>
        </table>
        <?php
        } else {
            echo "<p>No data found</p>";
        }
        ?>
    </div>

</body>

</html>