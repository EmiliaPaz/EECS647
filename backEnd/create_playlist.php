<?php

  $mysqli = new mysqli("mysql.eecs.ku.edu", "csydney", "Jaisai4e", "csydney");
  session_start();
  $username = $_SESSION['username'];
  $playlist_name = $_POST['playlist_name'];

  $query = "INSERT INTO Playlist (name, username) VALUES ('$playlist_name', '$username')";
  if ($result = $mysqli->query($query))
  {
    header('Location: ../myPlaylists.php');
  }
  else
  {
    header('Location: ../myPlaylists.php');
  }

?>
