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
        include('templates/navbar.php');
    ?>

     <!-- Conent -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm" style="text-align: center;">
            <a href="favoriteSongs.php"> Favorite Songs </a>
          </div>
          <div class="col-sm" style="text-align: center;">
            <a href="myPlaylists.php" >My Playlists</a>
          </div>
          <div class="col-sm"  style="text-align: center;">
            <a href="favoriteArtists.php">Favorite Artists</a>
          </div>
        </div>
      </div>

    </div>

    <!-- Recs -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm" style="text-align: center;">
            <h3> Songs You May Like </h3>
            <?php
            //get 10 random songs that are not already in the user's favorite songs and which are in an album which is of the same genre as albums that contain songs the user likes, with popularity 60-100
            // SELECT Song_genre.name FROM Song_genre
            // WHERE Song_genre.song_id NOT IN
            // (SELECT Favorite_songs.song_id
            // FROM Favorite_songs
            // WHERE username = 'sample_user');
            ?>
          </div>
          <div class="col-sm" style="text-align: center;">
            <h3> Hidden Gems </h3>
            <?php
            //get 10 random songs that are not already in the user's favorite songs and which are in an album which is of the same genre as albums that contain songs the user likes, with popularity 30-60
             ?>
          </div>
          <div class="col-sm"  style="text-align: center;">
            <h3> Artists You May Like </h3>
            <?php
            //get 10 random artists that are not already in the user's favorite artists and which are of the same genre as artists the user likes, with popularity 60-100
             ?>
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
