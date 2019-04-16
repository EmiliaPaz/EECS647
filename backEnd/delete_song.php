<?php

  $mysqli = new mysqli("mysql.eecs.ku.edu", "csydney", "Jaisai4e", "csydney");
  session_start();
  $username = $_SESSION['username'];
  $song_id = $_GET['song_id'];

  $query = "DELETE FROM Favorite_songs WHERE username = '$username' AND song_id = '$song_id'";
  if ($result = $mysqli->query($query))
  {
    header('Location: ../favoriteSongs.php');
  }
  else
  {
    header('Location: ../favoriteSongs.php');
  }

?>
