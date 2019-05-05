<?php
    //  Redirects to home page if user hasn't signed in
    include('dashboardClass.php');
    $dashboard = new dashboard();
    $dashboard->user_signin();
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Playlists</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/dashboard.css">
    <!-- Extra -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

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
       <h2> My Playlists </h2>

         <table class="table thead-light table-hover" >
             <thead class="thead-light">
                 <th scope="col"> Name </th>
                  <th scope="col"> Name </th>
             </thead>

             <?php
               $query = "SELECT playlist_id, name FROM Playlist WHERE username = '$username'";
               if ($result = $mysqli->query($query))
               {
                 while ($row = $result->fetch_assoc())
                 {
                   $playlist_id = $row['playlist_id'];
                   $name = $row['name'];
                   ?>
                   <tr>
                       <td>
                         <a href="backEnd/show_playlist.php?playlist_id=<?php echo $playlist_id ?>?playlist_name=<?php echo $name ?>"> <?php echo $name; ?> </a>
                       </td>
                         <td> <a href="backEnd/delete_playlist.php?playlist_id=<?php echo $playlist_id ?>"> Delete playlist </a> </td>
                   </tr>
                   <?php
                 }
                 $result->free();
               }
             ?>
         </table>
    </div>

    <div>
      Create new playlist:
      <form action="backEnd/create_playlist.php" method="post">
        <input type="text" name="playlist_name">
        <input type="submit" value="Create Playlist">
      </form>
    </div>


    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
