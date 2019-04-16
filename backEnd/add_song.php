<?php

  $mysqli = new mysqli("mysql.eecs.ku.edu", "csydney", "Jaisai4e", "csydney");
  session_start();
  $username = $_SESSION['username'];
  $song_id = $_GET['song_id'];

  $query = "INSERT INTO Favorite_songs (song_id, username) VALUES ('$song_id', '$username')";
  if ($result = $mysqli->query($query))
  {
    header('Location: ../favoriteSongs.php');
  }
  else
  {
    header('Location: ../favoriteSongs.php');
  }

?>
