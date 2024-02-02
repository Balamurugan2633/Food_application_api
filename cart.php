<?php
include("config.php");
$user = $_GET['name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js'></script>
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



    .main {
        padding-top: 15px;
        position: absolute;
        top: 78px;
        width: 100%;
    }

    .grid-container {
        display: grid;
        grid-template-columns: 25% 25% 25% 25%;
        background-color: black;
        top: 25%;
        padding: 10px;
        margin-left: 250px;
    }

    .grid-item {
        background-color: rgba(255, 255, 255, 0.8);
        /* border: 1px solid rgba(0, 0, 0, 0.8); */
        padding: 20px;
        font-size: 20px;
        text-align: center;
        border-radius: 18px;
        margin-top: 10px;
        margin-bottom: 30px;
        margin-right: 30px;
        margin-left: 30px;

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

    .quantity-button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }

    .quantity-input {
        width: 30px;
        height: 36px;
        padding: 5px;
        border: 3px solid #ccc;
        border-radius: 5px;
        /* Add any other styles you want */
    }
    </style>
</head>

<body>

    <div class="sidenav">
        
        <!-- Sidebar links with escaped username -->
        <a class="nav-link " aria-current="page" href="model.php?name=<?php echo $user; ?>">Home</a>
        <a class="nav-link active" aria-current="page" href="cart.php?name=<?php echo $user; ?>"style="color:#ad1fff;">Cart</a>
        <a class="nav-link" aria-current="page" href="add.php?name=<?php echo $user; ?>">Add Recipe</a>
        <a class="nav-link" aria-current="page" href="session.php?name=<?php echo $user; ?>">Session</a>
        <a class="nav-link" aria-current="page" href="logout.php?name=<?php echo $user; ?>">Logout</a>
    </div>

    

    <div class="main">
        <!-- <div id="loadingGif" style="display:none"><img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif">
        </div> -->
        <div id="meals-container" class="grid-container">
            <?php 
$mealId = $_POST['mealId'] ?? '';
$mealn = $_POST['mealn'] ?? '';
$mealimg = $_POST['mealimg'] ?? '';

$sql = "SELECT * FROM cart";
$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {
    $id=$row['id'];
    $meal_id=$row['meal_id'];
    echo '<div class="grid-item">';
    echo '<a href="mealshow.php?id='.$meal_id.'">';
    echo '<img src="' . $row['mealimg'] . '" alt="' . $row['meal_name'] . '" width="150" height="150"><br>';
    echo '</a>';
    echo '<h5>' . $row['meal_name'] . '</h5>';
    echo '<div class="quantity-container" data-id="' . $id . '">';
    echo '<button class="quantity-button decrement">-</button>';
    echo '<input type="text" class="quantity-input" value="' . $row['quantity'] . '" min="1" style="width:30px;">';
    echo '<button class="quantity-button increment">+</button>';
    echo '</div>';
    echo '</label>';
    echo '<button class="remove-btn" data-id="' . $id . '"  style="background-color:red;border-radius:3rem;font-size:15px;">Remove Recipe</button>';
    echo '</div>';
}
?>
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
                    <ul>
                        <li><a href="addtocart.php"><i class="fa fa-fw fa-user"></i></a></li>
                    </ul>
                    
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 profile-menu">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <label id="name" style="margin-right:15px; color:white"><?php echo $user; ?></label>

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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
$(document).ready(function() {
    $('.quantity-input').on('change', function() {
        var id = $(this).parent('.quantity-container').data('id');
        var newQuantity = $(this).val();
        if (!isNaN(newQuantity) && newQuantity > 0 && newQuantity % 1 === 0) {
            $.ajax({
                type: 'POST',
                url: 'updatecart.php',
                data: {
                    id: id,
                    quantity: newQuantity
                },
                success: function(response) {
                    alert('Quantity updated successfully');
                },
                error: function(error) {
                    console.error('Error updating quantity:', error);
                }
            });
        } else {
            alert('Please enter a valid quantity.');
        }
    });
    $('.quantity-container').on('click', '.increment', function() {
        var input = $(this).siblings('.quantity-input');
        input.val(parseInt(input.val(), 10) + 1).change();
    });
    $('.quantity-container').on('click', '.decrement', function() {
        var input = $(this).siblings('.quantity-input');
        var currentValue = parseInt(input.val(), 10);
        if (currentValue > 1) {
            input.val(currentValue - 1).change();
        }
    });
    $('.remove-btn').on('click', function() {
        var mealId = $(this).attr("data-id");
        $.ajax({
            type: 'POST',
            url: 'cartdelete.php',
            data: {
                mealid: mealId
            },
            success: function(response) {
                if (response == 1) {
                    alert("cart are removed");
                    location.reload();
                } else {
                    alert("cart are not removed");
                }
            },
        });
    });
});
</script>

</html>