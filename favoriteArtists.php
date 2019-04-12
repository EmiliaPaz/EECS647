<?php
    //  Redirects to home page if user hasn't signed in
    //  Checks if the username session variable has been set. If true it shows the page, else it redirects to the home page
    include('dashboardClass.php');
    $dboard = new dashboard();
    $dboard->user_signin();
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Artists</title>
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
      include('templates/navbar.php');
  ?>

  <!-- Credentials -->
  <?php
      // include('templates/sql_credentials.php');
      $mysqli = new mysqli("mysql.eecs.ku.edu", "csydney", "Jaisai4e", "csydney");
      $username = $_SESSION['username'];
  ?>

      <!-- Content -->
     <div class="content">
         <h2> Favorite Artists </h2>


           <table class="table thead-light table-hover" >
               <thead class="thead-light">
                   <th scope="col"> Name </th>
                   <th scope="col"> Genre </th>
               </thead>

               <?php
                 $query = "SELECT Artist.stage_name, genre FROM Artist INNER JOIN Favorite_artists ON Artist.stage_name = Favorite_artists.stage_name AND username = '$username'";
                 if ($result = $mysqli->query($query))
                 {
                   while ($row = $result->fetch_assoc())
                   {
                     $name = $row['stage_name'];
                     $genre = $row['genre'];
                     ?>
                     <tr>
                         <td> <?php echo $name; ?> </td>
                         <td> <?php echo $genre; ?> </td>
                     </tr>
                     <?php
                   }
                   $result->free();
                 }
               ?>

           </table>
     </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
