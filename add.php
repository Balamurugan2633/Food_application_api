<?php
session_start();
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
        <h2>Add Recipes</h2>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add</button>

        <br></br>
        <?php
        include_once("config.php");
        $sql = "SELECT * FROM `recipe`";
        $result = mysqli_query($con, $sql);   
        $totalPrice = 0; 
        ?>
        <center>
            <h2>Recipe data</h2>
        </center>
        <?php
    if (mysqli_num_rows($result)) {
        $_SESSION['person']=array();?>
        <table>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>PRICE</th>
            </tr>
            <?php
             while ($row = mysqli_fetch_assoc($result)) {
     // Set session variables
   
     array_push($_SESSION['person'],$row['id'],$row['name'],$row['price']);
    //  print_r($_SESSION['person']);

                ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['price']; ?></td>
            </tr>
            <?php
             $totalPrice+=$row['price'];

         } 
         

         ?>
        </table>
        <?php } else {
        echo "No data found";
    }
    ?>
   <br><br>
    <center><h4>Total price :Rs<?php echo $totalPrice;?>/-</h4></center>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Recipes Add</h4>
                        <br>
                    </div>
                    <div class="modal-body">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="recipe">Recipe name</label>
                            <input type="text" id="rname" class="form-control" />

                        </div>
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example4">Price</label>
                            <input type="number" id="rprice" class="form-control" />
                        </div>
                        <br>
                        <button type="submit" id="submit" class="btn btn-primary btn-block mb-4">Submit</button>
                        <br>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$("#submit").on("click", function() {
    var name = $("#rname").val();
    var price = $("#rprice").val();
    $.ajax({
        type: "GET",
        url: "store.php?name=" + name + "&price=" + price,
        success: function(data) {
            if (data == 1) {
                window.location.href = 'http://localhost/movie_application/add.php?';
                alert("data are stored");
            } else {
                alert("not stored");
            }
        }
    })
})
</script>