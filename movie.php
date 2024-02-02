<?php 
$user=$_GET['name'];
?>
<!DOCTYPE html>
<html lang="en">
<style>
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

    .sidenav a {
        font-size: 18px;
    }
}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js'></script>

    <div id="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="movie.php">Home</a>
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
                                <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-fw"></i>
                                        Log
                                        Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

</head>

<body style='background-color:black'>

<div class="sidenav">
        <!-- Sidebar links with escaped username -->
        <a class="nav-link active" aria-current="page" href="model.php?name=<?php echo $user; ?>"
            style="color:#ad1fff;">Home</a>
        <a class="nav-link" aria-current="page" href="cart.php?name=<?php echo $user; ?>">Cart</a>
        <a class="nav-link" aria-current="page" href="add.php?name=<?php echo $user; ?>">Add Recipe</a>
        <a class="nav-link" aria-current="page" href="session.php?name=<?php echo $user; ?>">Session</a>
        <a class="nav-link" aria-current="page" href="logout.php?name=<?php echo $user; ?>">Logout</a>
    </div>

    <div id="loadingGif" style="display:none;top:0px;right:0px;width:100%;height:100%;background-position:center;">
        <img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif">
    </div>

    <div id="data">
        <div id="meals-container" class="grid-container">
        </div>
        <div id="meals-containerser" class="grid-container" style="display:none;">
        </div>
    </div>

</body>


</html>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
$(document).ready(function() {
    var user = '<?php echo $user?>';
    // alert(user);
    document.getElementById('loadingGif').style.display = "block";
    $.ajax({
        type: "GET",
        url: "https://www.themealdb.com/api/json/v1/1/search.php?f=s",
        dataType: 'json',
        success: function(data) {

            $("#meals-container").show();
            $("#meals-containerser").hide();
            // console.log(data);
            // var mealname = data.meals[0].strMeal;
            // console.log(mealname);

            // var count=data.meals.length;
            // console.log(count);
            document.getElementById('loadingGif').style.display = "none";
            if (data.meals) {
                var mealsContainer = $('#meals-container');
                $.each(data.meals, function(index, meal) {
                    var mealDiv = $('<div class="grid-item" onclick="textcal(' + meal
                        .idMeal + ');">');
                    mealDiv.click(function() {
                        window.location.href = 'mealshow.php?id=' + meal.idMeal +
                            "&name=" + user;
                    })
                    mealDiv.append('<h5>' + meal.strMeal + '</h5>');
                    mealDiv.append('<img src="' + meal.strMealThumb + '"alt="' + meal
                        .strMeal + ' width="100" height="100"" >');
                    mealsContainer.append(mealDiv);
                });
            } else {
                $('#meals-container').html('No meals found');
            }
        },
        error: function() {
            $('#meals-container').html('Error fetching data');
        }
    });
});
</script>
<script>
function callser() {
    var sear = $('#search').val();
    if (sear == '') {
        $("#meals-container").show();
        $("#meals-containerser").hide();
    } else {

        var user = '<?php echo $user?>';
        // alert(user);
        $.ajax({
            type: "GET",
            url: "https://www.themealdb.com/api/json/v1/1/search.php?s=" + sear,
            dataType: 'json',
            success: function(data) {
                // console.log(data);
                $("#meals-container").hide();
                $("#meals-containerser").show();
                // var mealname = data.meals[0].strMeal;
                // console.log(mealname);

                // var count=data.meals.length;
                // console.log(count);
                if (data.meals) {
                    var mealsContainer = $('#meals-containerser');
                    $.each(data.meals, function(index, meal) {
                        var mealDiv = $('<div class="grid-item" onclick="textcal(' + meal.idMeal +
                            ');">');
                        mealDiv.click(function() {
                            window.location.href = 'mealshow.php?id=' + meal.idMeal +
                                "&name=" + user;
                        })
                        mealDiv.append('<h5>' + meal.strMeal + '</h5>');
                        mealDiv.append('<img src="' + meal.strMealThumb + '"alt="' + meal.strMeal +
                            ' width="100" height="100"" >');
                        mealsContainer.append(mealDiv);
                    });
                } else {
                    $('#meals-container').html('No meals found');
                }
            },
            error: function() {
                $('#meals-container').html('Error fetching data');
            }
        });
    }
}
</script>