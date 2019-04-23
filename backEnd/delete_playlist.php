<?php

  $mysqli = new mysqli("mysql.eecs.ku.edu", "csydney", "Jaisai4e", "csydney");
  session_start();
  $username = $_SESSION['username'];
  $playlist_id = $_GET['playlist_id'];

  $query = "DELETE FROM Playlist WHERE username = '$username' AND playlist_id = '$playlist_id'";
  if ($result = $mysqli->query($query))
  {
    header('Location: ../myPlaylists.php');
  }
  else
  {
    header('Location: ../myPlaylists.php');
  }

?>
