<?php 
$user=$_GET['name'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js'></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="movie.php">Home</a>
</li>
<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="mealshow.php">Recipes</a>
</li>
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 profile-menu"> 
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <label style= "margin-right:15px; color:white"> <?php echo $user; ?> </label>
          <div class="profile-pic">
          <center><i class="fa fa-user" aria-hidden="true" style="margin-top:15px"></i></center>
              
             </div>
         <!-- You can also use icon as follows: -->
           <!--  <i class="fas fa-user"></i> -->
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</a></li>
          </ul>
        </li>
     </ul>
    </div>
  </div>
</nav>
<div id="loadingGif" style="display:none"><img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif"></div>

<div id="showdata"style="background-color:black;">
</div>

<style>

.profile-pic{
    display: inline-block;
    vertical-align: middle;
     width: 50px;
     height: 50px;
     overflow: hidden;
    border-radius: 50%;
 }
 
 .profile-pic img{
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

  </style>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script>
$(document).ready(function(){
    var urlparams = new URLSearchParams(window.location.search);
    var mealId= urlparams.get('id');
    var apiurl="https://www.themealdb.com/api/json/v1/1/lookup.php?i=" +mealId;
    document.getElementById('loadingGif').style.display = "block";
    $.ajax({
        url:apiurl,
        datatype: 'json',
        success:function(data){
          document.getElementById('loadingGif').style.display = "none";
            if(data.meals){
                var mealdiv=$("#showdata");
                var meal = data.meals[0];
                mealdiv.append('<center><img src="'+ meal.strMealThumb +'"alt="' + meal.strMeal +'" ></center>');
                mealdiv.append('<center><h5 style="color:white;">' + meal.strMeal + '</h5></center>');
                mealdiv.append('<center><h6 style="color:white;">' + meal.strArea + '</h6></center>');
                mealdiv.append('<center><h7 style="color:white;">' + meal.strCategory + '</h7></center>');
                mealdiv.append('<center><p style="color:white;text-align:center;">' + meal.strInstructions + '</p></center>');
            }else{
                $('#showdata').html("meal details are not found");
            }
        },
        error:function(){
            $('#showdata').html("error fetching meal details");
        }
    })
})    
    </script>
    </body>
    </html>