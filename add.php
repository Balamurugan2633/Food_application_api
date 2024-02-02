<?php 
include("config.php");
session_start();
$user=$_GET['name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
    .navbar {
        overflow: hidden;
        background-color: #333;
        position: fixed;
        top: 0;
        width: 100%;
    }

    .navbar a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }



    #main {
        margin-top: 10%;
        margin-left: 25%;
        padding-top: 15px;
        position: absolute;
        width: 70%;
    }

    .profile-pic {
        display: inline-block;
        vertical-align: middle;
        width: 50px;
        height: 50px;
        overflow: hidden;
        border-radius: 50%;
    }

    .profile-pic img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .profile-menu .dropdown-menu {
        right: 0;
        left: unset;
    }

    .profile-menu .fa-fw {
        margin-right: 10px;
    }

    .toggle-change::after {
        border-top: 0;
        border-bottom: 0.3em solid;
    }

    .sidenav {
        height: 100%;
        top: 94px;
        width: 20%;
        z-index: 1;
        left: 0;
        position: fixed;
        background-color: #111;
        overflow-x: hidden;
        padding-top: 20px;
    }

    .sidenav a {
        padding: 6px 6px 6px 32px;
        text-decoration: none;
        font-size: 25px;
        color: white;
        display: block;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }


    }

    .dropdown-menu show {
        position: relative;
    }

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

    <div class="sidenav">
        <!-- Sidebar links with escaped username -->
        <a class="nav-link " aria-current="page" href="model.php?name=<?php echo $user; ?>">Home</a>
        <a class="nav-link" aria-current="page" href="cart.php?name=<?php echo $user; ?>">Cart</a>
        <a class="nav-link active" aria-current="page" href="add.php?name=<?php echo $user; ?>" style="color:#ad1fff;">Add Recipe</a>
        <a class="nav-link" aria-current="page" href="session.php?name=<?php echo $user; ?>">Session</a>
        <a class="nav-link" aria-current="page" href="logout.php?name=<?php echo $user; ?>">Logout</a>
    </div>

    <div class="container" id="main">
        <h2>Add Recipes</h2>
        <button type="button" id='dialogid' class="btn btn-info btn-lg" data-toggle="modal"
            data-target="#myModal">Add</button>

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
   
     array_push($_SESSION['person'],$row['id'],$row['name'],$row['price']);

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
        <center>
            <h4>Total Price : Rs <?php echo round($totalPrice,1);?>/-</h4>
        </center>
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
                            <input type="text" id="rname" class="form-control" pattern="[A-Za-z]" required />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example4">Price</label>
                            <input type="number" id="rprice" class="form-control" required />
                        </div>
                        <br>
                        <button type="submit" id="submit" class="btn btn-primary btn-block mb-4">Submit</button>
                        <br>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="navbar">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"style="color:#ad1fff;">Cistron Foods</a>
                        </li>
                    </ul>

                    <form class="d-flex" role="search">
                        <input id="search" class="form-control me-2" type="search" placeholder="Search"
                            aria-label="Search" oninput="callser()">

                    </form>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 profile-menu">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <label id="name" style="margin-right:15px; color:white"> <?php echo $user ?> </label>
                                <div class="profile-pic">
                                    <center><i class="fa fa-user" aria-hidden="true" style="margin-top:15px"></i>
                                    </center>
                                </div>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="logout.php">
                                        <i class="fas fa-sign-out-alt fa-fw"></i>LogOut</a>
                                </li>
                            </ul>
                        </li>
                    </ul>


                </div>
            </div>
        </nav>
    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function() {
    $("#submit").on("click", function() {
        var name = $("#rname").val();
        var price = $("#rprice").val();
        $.ajax({
            type: "GET",
            url: "store.php?name=" + name + "&price=" + price,
            success: function(data) {
                if (data == 1) {
                    window.location.href =
                        'http://localhost/meals_application/modelshow.php?';
                    alert("data are stored");
                } else {
                    alert("not stored");
                }
            }
        })
    });
    $("#dialogid").on("click", function() {
        $("#myModal").modal('show');
    });
    $("#close").on("click", function() {
        $("#myModal").modal('hide');
    });
});
</script>