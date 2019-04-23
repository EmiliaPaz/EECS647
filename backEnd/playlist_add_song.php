<?php

  $mysqli = new mysqli("mysql.eecs.ku.edu", "csydney", "Jaisai4e", "csydney");
  session_start();
  $username = $_SESSION['username'];
  $playlist_id = $_SESSION['playlist_id'];
  $song_id = $_GET['song_id'];

  $query = "INSERT INTO Playlist_contains_song (song_id, playlist_id) VALUES ('$song_id', '$playlist_id')";
  if ($result = $mysqli->query($query))
  {
    header('Location: ../myPlaylists.php');
  }
  else
  {
    header('Location: ../myPlaylists.php');
  }

?>
