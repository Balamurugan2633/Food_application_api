<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden">
        <style>
        .background-radial-gradient {
            background-color: hsl(218, 41%, 15%);
            background-image: radial-gradient(650px circle at 0% 0%,
                    hsl(218, 41%, 35%) 15%,
                    hsl(218, 41%, 30%) 35%,
                    hsl(218, 41%, 20%) 75%,
                    hsl(218, 41%, 19%) 80%,
                    transparent 100%),
                radial-gradient(1250px circle at 100% 100%,
                    hsl(218, 41%, 45%) 15%,
                    hsl(218, 41%, 30%) 35%,
                    hsl(218, 41%, 20%) 75%,
                    hsl(218, 41%, 19%) 80%,
                    transparent 100%);
        }

        #radius-shape-1 {
            height: 220px;
            width: 220px;
            top: -60px;
            left: -130px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
        }

        #radius-shape-2 {
            border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
            bottom: -60px;
            right: -110px;
            width: 300px;
            height: 300px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
        }

        .bg-glass {
            background-color: hsla(0, 0%, 100%, 0.9) !important;
            backdrop-filter: saturate(200%) blur(25px);
        }

        #password-container input[type="password"],
        #password-container input[type="text"] {
            width: 100%;
            padding: 12px 36px 12px 12px;
            box-sizing: border-box;

        }

        /* .fa-eye{
  position: absolute;
  top: 12%;
  right: 34%;
 cursor: pointer; 
  color: lightgray; 
} */
        .toggle-password {
            position: absolute;
            right: 12%;
            top: 52%;
            transform: translateY(-50%);
            /* cursor: pointer; */
        }
        </style>

        <div id="loadingGif" style="display:none"><img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif">
        </div>
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        Why is food a basic need? <br />

                    </h1>
                    <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                        Food is a basic need is a “must-have” but also a “want to have.” Food provides energy
                        and nutrients that give us life. A balanced diet supplies the calories, protein, fat,
                        carbohydrates, and other micro-nutrients the body needs. Food also provides fluids that
                        replenish bodily fluids.
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <center>
                                <h4 style="color:#ad1fff;">Welcome to Login Page</h4>
                            </center><br><br>

                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row">
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example3">User Name</label>
                                    <input type="text" id="form3Example3" class="form-control" />

                                </div>
                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4">Password</label>
                                    <input type="password" id="form3Example4" class="form-control" />
                                    <span class="toggle-password" style="font-size:18px;" onclick="togglePassword()">
                                        <i class="fa fa-eye" id="eye-icon"></i>
                                    </span>
                                </div>
                                <!-- Submit button -->
                                <button type="submit" id="submit" class="btn btn-primary btn-block mb-4">Login</button>
                                <br>
                                <p>Don't have account? Click to Sign up</p>
                                <button type="submit" id="submit" class="btn btn-primary btn-block mb-4"
                                    onclick="window.location.href='http://localhost/Movie_Application/registerpage.php'">
                                    Sign up</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    $("#submit").on("click", function() {
        var user = $("#form3Example3").val();
        var pass = $("#form3Example4").val();
        document.getElementById('loadingGif').style.display = "block";
        console.log(user);
        console.log(pass);
        $.ajax({
            type: "GET",
            url: "login.php?user=" + user + "&pass=" + pass,
            success: function(data) {
                document.getElementById('loadingGif').style.display = "none";
                if (data == 1) {
                    window.location.href = 'http://localhost/movie_application/model.php?name=' +
                        user;
                } else {
                    alert("incorrect user and pass");
                }
            }
        })
    })
    </script>
    <script>
    function togglePassword() {
        const passwordInput = document.getElementById('form3Example4');
        const eyeIcon = document.getElementById('eye-icon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }
    </script>
</body>

</html>