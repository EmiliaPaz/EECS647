<?php

  $mysqli = new mysqli("mysql.eecs.ku.edu", "csydney", "Jaisai4e", "csydney");
  session_start();
  $username = $_SESSION['username'];
  $stage_name = $_GET['stage_name'];

  $query = "DELETE FROM Favorite_artists WHERE username = '$username' AND stage_name = '$stage_name'";
  if ($result = $mysqli->query($query))
  {
    header('Location: ../favoriteSongs.php');
  }
  else
  {
    header('Location: ../favoriteSongs.php');
  }

?>
