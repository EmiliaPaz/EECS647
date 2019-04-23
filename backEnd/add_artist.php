<?php

  $mysqli = new mysqli("mysql.eecs.ku.edu", "csydney", "Jaisai4e", "csydney");
  session_start();
  $username = $_SESSION['username'];
  $stage_name = $_GET['stage_name'];

  $query = "INSERT INTO Favorite_artists (stage_name, username) VALUES ('$stage_name', '$username')";
  if ($result = $mysqli->query($query))
  {
    header('Location: ../favoriteArtists.php');
  }
  else
  {
    header('Location: ../favoriteArtists.php');
  }

?>
