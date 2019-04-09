<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/general.css">
</head>
<body>
    <!-- Header -->
    <?php
        // include('templates/navbar.php');
    ?>
     
     <!-- Conent -->
    <div class="accordion" id="sign">
        <div class="card">
            <div class="card-header" id="signin">
                <h3> 
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#signin_collapse" aria-expanded="true" aria-controls="signin_collapse">
                        Sign in 
                    </button>
                </h3>
            </div>
            <div id="signin_collapse" class="collapse show" aria-labelledby="signin" data-parent="#sign">
                <div class="card-body">
                    <h3> .... </h3>
                </div>
            </div>
        </div>



        <div class="card">
            <div class="card-header" id="signup">
                <h3> 
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#signup_collapse" aria-expanded="true" aria-controls="signup_collapse">
                        Sign up 
                    </button>
                </h3>
            </div>
            <div id="signup_collapse" class="collapse show" aria-labelledby="signup" data-parent="#sign">
                <div class="card-body">
                    





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

</body>
</html>
