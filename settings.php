<?php
    //  Redirects to home page if user hasn't signed in
    include('dashboardClass.php');
    $dashboard = new dashboard();
    $dashboard->user_signin();
    // SQL credentials
    include ('templates/sql_credentials.php');
    global $mysqli;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Settings</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/dashboard.css">
    <!-- Extra -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>


<body>
    <!-- Header -->
    <?php
        include('templates/navbar.php');
    ?>

    <?php
        session_start();
        $username = $_SESSION['username'];
     ?>

     <!-- Content -->

    <!-- Recs -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                 <div class="col-sm" style="text-align: center;">
                     <h1> Settings </h1>
                 </div>
            </div>

            <div class="row">
                <div class="col-sm dashboard-box" style="text-align: center;">
                    <h3> User Account </h3>
                    <table class="table table-borderless" >
                        <thead>
                            <th scope="col" class="table-header"> Username </th>
                            <th scope="col" class="table-header"> Email </th>
                            <th scope="col" class="table-header"> Password </th>
                        </thead>
                        <?php
                        $query = "SELECT email FROM User where username = '$username'";
                        if ($result = $mysqli->query($query))
                        {
                            while ($row = $result->fetch_assoc())
                            {
                                $email= $row['email'];
                                ?>
                                <tr>
                                    <td> <?php echo $username; ?> </td>
                                    <td> <?php echo $email; ?> </td>
                                    <td> ******** </td>
                                </tr>
                            <?php
                            }
                            $result->free();
                        }
                        ?>
                    </table>
                </div>

                <div class="col-sm dashboard-box" style="text-align: center;">
                    <h3> Security </h3>

                    <h4> Change email </h4>
                    <form class="form-sell" action="backEnd/changeEmail.php" method="post">
                        <div class="form-group row">
                            <label for="item" class="col-sm-2 col-form-label">Old email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="oldEmail1" name="oldEmail1" value="<?php echo $email ?>"   readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="item" class="col-sm-2 col-form-label">Repeat old email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="oldEmail2" name="oldEmail2">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">New email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="newEmail1" name="newEmail1">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Repeat new email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="newEmail2" name="newEmail2">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-submitSettings" name="submitChangeEmail" label="Submit" id="submitChangeEmail" value="Submit"></input>
                            </div>
                        </div>
                    </form>

                    <h4> Change password </h4>
                    <form class="form-sell" action="backEnd/changePassword.php" method="post">
                        <div class="form-group row">
                            <label for="item" class="col-sm-2 col-form-label">Old password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="oldPassword1" name="oldPassword1" value="********"   readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="item" class="col-sm-2 col-form-label">Repeat old email</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="oldPassword2" name="oldPassword2">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">New email</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="newPassword1" name="newPassword1">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Repeat new email</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="newPassword2" name="newPassword2">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-submitSettings" name="submitChangePassword" label="Submit" id="submitChangePassword" value="Submit"></input>
                            </div>
                        </div>
                    </form>


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
