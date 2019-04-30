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

    <?php
        include ('templates/sql_credentials.php');
        global $mysqli;
        session_start();
        $username = $_SESSION['username'];
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
                  <table class="table thead-light table-hover" >
                      <thead class="thead-light">
                          <th scope="col"> Title </th>
                          <th scope="col"> Preview </th>
                          <th scope="col"> </th>
                      </thead>

                      <?php
                        $query = "SELECT DISTINCT Song_genre.song_id, Song_genre.name, Song.url\n"
                                . "FROM Song_genre\n"
                                . "INNER JOIN Song\n"
                                . "ON Song_genre.song_id = Song.song_id\n"
                                . "AND Song.popularity > 60\n"
                                . "INNER JOIN User_genre\n"
                                . "ON Song_genre.genre = User_genre.genre\n"
                                . "AND User_genre.username = '$username'\n"
                                . "AND Song_genre.song_id NOT IN\n"
                                . "(SELECT fs.song_id FROM Favorite_songs fs WHERE fs.username = '$username')\n"
                                . "ORDER BY RAND()\n"
                                . "LIMIT 10";
                        if ($result = $mysqli->query($query))
                        {
                          while ($row = $result->fetch_assoc())
                          {
                            $song_id= $row['song_id'];
                            $title = $row['name'];
                            $url = $row['url'];
                            ?>
                            <tr>
                                <td> <?php echo $title; ?> </td>
                                <td> <a href="<?php echo $url; ?>" target="_blank"> Listen </a>  </td>
                                <td> <a href="backEnd/add_song.php?song_id=<?php echo $song_id ?>"> Add favorite </a> </td>
                            </tr>
                            <?php
                          }
                          $result->free();
                        }
                      ?>

                  </table>
          </div>
          <div class="col-sm" style="text-align: center;">
            <h3> Hidden Gems </h3>
            <table class="table thead-light table-hover" >
                <thead class="thead-light">
                    <th scope="col"> Title </th>
                    <th scope="col"> Preview </th>
                    <th scope="col"> </th>
                </thead>

                <?php
                  $query = "SELECT DISTINCT Song_genre.song_id, Song_genre.name, Song.url\n"
                          . "FROM Song_genre\n"
                          . "INNER JOIN Song\n"
                          . "ON Song_genre.song_id = Song.song_id\n"
                          . "AND Song.popularity BETWEEN 30 AND 60\n"
                          . "INNER JOIN User_genre\n"
                          . "ON Song_genre.genre = User_genre.genre\n"
                          . "AND User_genre.username = '$username'\n"
                          . "AND Song_genre.song_id NOT IN\n"
                          . "(SELECT fs.song_id FROM Favorite_songs fs WHERE fs.username = '$username')\n"
                          . "ORDER BY RAND()\n"
                          . "LIMIT 10";
                  if ($result = $mysqli->query($query))
                  {
                    while ($row = $result->fetch_assoc())
                    {
                      $song_id= $row['song_id'];
                      $title = $row['name'];
                      $url = $row['url'];
                      ?>
                      <tr>
                          <td> <?php echo $title; ?> </td>
                          <td> <a href="<?php echo $url; ?>" target="_blank"> Listen </a>  </td>
                          <td> <a href="backEnd/add_song.php?song_id=<?php echo $song_id ?>"> Add favorite </a> </td>
                      </tr>
                      <?php
                    }
                    $result->free();
                  }
                ?>

            </table>
          </div>
          <div class="col-sm"  style="text-align: center;">
            <h3> Artists You May Like </h3>
            <table class="table thead-light table-hover" >
                <thead class="thead-light">
                    <th scope="col"> Name </th>
                    <th scope="col"> </th>
                </thead>

                <?php
                  $query = "SELECT DISTINCT Artist_genre.stage_name\n"
                        . "FROM Artist_genre\n"
                        . "INNER JOIN User_genre\n"
                        . "ON Artist_genre.genre = User_genre.genre\n"
                        . "AND User_genre.username = '$username'\n"
                        . "AND Artist_genre.stage_name NOT IN\n"
                        . "(SELECT fa.stage_name FROM Favorite_artists fa WHERE fa.username = '$username')\n"
                        . "ORDER BY RAND()\n"
                        . "LIMIT 10";
                  if ($result = $mysqli->query($query))
                  {
                    while ($row = $result->fetch_assoc())
                    {
                      $stage_name = $row['stage_name'];
                      ?>
                      <tr>
                          <td> <?php echo $stage_name; ?> </td>
                          <td> <a href="backEnd/add_artist.php?stage_name=<?php echo $stage_name ?>"> Add favorite </a> </td>
                      </tr>
                      <?php
                    }
                    $result->free();
                  }
                ?>

            </table>
          </div>
        </div>
      </div>

    <!-- mood -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm" style="text-align: center;">
            <h3> Moods </h3>
            <table class="table thead-light table-hover" >
                <thead class="thead-light">
                    <th scope="col"> Mood </th>
                    <th scope="col">  Title</th>
                    <th scope="col">  Title</th>
                    <th scope="col">  </th>
                </thead>

                <?php
                  $query = "SELECT Song.song_id, Song.name, Song.url\n"
                          . "FROM Song\n"
                          . "WHERE Song.valence > 0.65\n"
                          . "ORDER BY RAND()\n"
                          . "LIMIT 1";
                  if ($result = $mysqli->query($query))
                  {
                    while ($row = $result->fetch_assoc())
                    {
                      $song_id = $row['song_id'];
                      $title = $row['name'];
                      $url = $row['url'];
                      ?>
                      <tr>
                          <td> Positive </td>
                          <td> <?php echo $title; ?> </td>
                          <td> <a href="<?php echo $url; ?>" target="_blank"> Listen </a>  </td>
                          <td> <a href="backEnd/add_song.php?song_id=<?php echo $song_id ?>"> Add favorite </a> </td>
                      </tr>
                      <?php
                    }
                    $result->free();
                  }
                  $query = "SELECT Song.song_id, Song.name, Song.url\n"
                          . "FROM Song\n"
                          . "WHERE Song.valence BETWEEN 0.35 AND 0.65\n"
                          . "ORDER BY RAND()\n"
                          . "LIMIT 1";
                  if ($result = $mysqli->query($query))
                  {
                    while ($row = $result->fetch_assoc())
                    {
                      $song_id = $row['song_id'];
                      $title = $row['name'];
                      $url = $row['url'];
                      ?>
                      <tr>
                          <td> Neutral </td>
                          <td> <?php echo $title; ?> </td>
                          <td> <a href="<?php echo $url; ?>" target="_blank"> Listen </a>  </td>
                          <td> <a href="backEnd/add_song.php?song_id=<?php echo $song_id ?>"> Add favorite </a> </td>
                      </tr>
                      <?php
                    }
                    $result->free();
                  }
                  $query = "SELECT Song.song_id, Song.name, Song.url\n"
                          . "FROM Song\n"
                          . "WHERE Song.valence < 0.35\n"
                          . "ORDER BY RAND()\n"
                          . "LIMIT 1";
                  if ($result = $mysqli->query($query))
                  {
                    while ($row = $result->fetch_assoc())
                    {
                      $song_id = $row['song_id'];
                      $title = $row['name'];
                      $url = $row['url'];
                      ?>
                      <tr>
                          <td> Negative </td>
                          <td> <?php echo $title; ?> </td>
                          <td> <a href="<?php echo $url; ?>" target="_blank"> Listen </a>  </td>
                          <td> <a href="backEnd/add_song.php?song_id=<?php echo $song_id ?>"> Add favorite </a> </td>
                      </tr>
                      <?php
                    }
                    $result->free();
                  }
                ?>

            </table>
          </div>
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
