<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/home.css">
    <!-- Extra -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>
<body>
    <!-- Header -->
    <?php
        // include('templates/navbar.php');
    ?>

     <!-- Conent -->
     <!-- <div class="sign-box"> Hello</div> -->
     <div class="sign-page">
         <div class="sign-box">
            <div class="accordion" id="sign">

                             <div class="card">
                                 <div class="card-header" id="signin">
                                     <h3>
                                         <button class="btn btn-link btn-sign" type="button" data-toggle="collapse" data-target="#signin_collapse" aria-expanded="true" aria-controls="signin_collapse">
                                             Sign in
                                             <span class="fa-stack fa-sm">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
                                              </span>
                                         </button>
                                     </h3>
                                 </div>

                                 <div id="signin_collapse" class="collapse" aria-labelledby="signin" data-parent="#sign">
                                     <div class="card-body">


                                         <form action="backEnd/signin.php" method="post">
                                             <div class="form-group row">
                                                 <label for="item" class="col-sm-2 col-form-label">Username</label>
                                                 <div class="col-sm-10">
                                                     <input type="text" class="form-control" name="username">
                                                 </div>
                                             </div>

                                             <div class="form-group row">
                                                 <label for="item" class="col-sm-2 col-form-label">Password</label>
                                                 <div class="col-sm-10">
                                                     <input type="password" class="form-control" name="password">
                                                 </div>
                                             </div>
                                             <div class="form-group">
                                                 <input type="submit" value="Log in" class="btn btn-secondary btn-block btn-submit"/>
                                             </div>
                                         </form>

                                         <?php
                                             session_start();
                                             // Shows an error message if the login credentials are invalid
                                             if(isset($_SESSION["signin_error"])){
                                                 $signin_error = $_SESSION["signin_error"];
                                                 echo "<p>$signin_error</p>";
                                             }
                                             // Destroys the adminError session and its message if the page is refreshed
                                             session_destroy();
                                         ?>
                                     </div>
                                 </div>
                             </div>

                             <div class="card">
                                 <div class="card-header" id="signup">
                                     <h3>
                                         <button class="btn btn-link btn-sign" type="button" data-toggle="collapse" data-target="#signup_collapse" aria-expanded="false" aria-controls="signup_collapse">
                                             Sign up
                                             <span class="fa-stack fa-sm">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
                                              </span>
                                         </button>
                                     </h3>
                                 </div>
                                 <div id="signup_collapse" class="collapse" aria-labelledby="signup" data-parent="#sign">
                                     <div class="card-body">

                                         <form action="backEnd/signup.php" method="post">
                                             <div class="form-group row">
                                                 <label for="item" class="col-sm-2 col-form-label">Username</label>
                                                 <div class="col-sm-10">
                                                     <input type="text" class="form-control" name="newUsername">
                                                 </div>
                                             </div>

                                             <div class="form-group row">
                                                 <label for="item" class="col-sm-2 col-form-label">Password</label>
                                                 <div class="col-sm-10">
                                                     <input type="password" class="form-control" name="newPassword1">
                                                 </div>
                                             </div>

                                             <div class="form-group row">
                                                 <label for="item" class="col-sm-2 col-form-label">Repeat Password</label>
                                                 <div class="col-sm-10">
                                                     <input type="password" class="form-control" name="newPassword2">
                                                 </div>
                                             </div>

                                             <div class="form-group row">
                                                 <label for="item" class="col-sm-2 col-form-label">Email</label>
                                                 <div class="col-sm-10">
                                                     <input type="text" class="form-control" name="newEmail">
                                                 </div>
                                             </div>

                                             <div class="form-group row">
                                                 <div class="col-sm-12">
                                                     <input type="submit" class="btn btn-secondary btn-block btn-submit" name="submit" value="Sign Up"></input>
                                                 </div>
                                             </div>
                                         </form>

                                     </div>
                                 </div>
                             </div>
         </div>

     </div>








    </div>



    <!-- Footer -->
    <?php

    ?>


    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     <script src="js/custom.js"></script>

</body>
</html>
