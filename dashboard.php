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
    <link rel="stylesheet" href="css/dashboard.css">
    <!-- Extra -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>


<body>
    <!-- Header -->
    <?php
        include('templates/navbar.php');
    ?>

    <?php
        session_start();
        $username = $_SESSION['username'];
     ?>

     <!-- Content -->

    <!-- Recs -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm dashboard-box" style="text-align: center;">
            <h3> Songs You May Like </h3>
                  <table class="table table-hover table-borderless" >
                      <thead>
                          <th scope="col" class="table-header"> Title </th>
                          <th scope="col" class="table-header"> Preview </th>
                          <th scope="col" class="table-header"> </th>
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
          <div class="col-sm dashboard-box" style="text-align: center;">
            <h3> Hidden Gems </h3>
            <table class="table table-hover table-borderless" >
                <thead>
                    <th scope="col" class="table-header"> Title </th>
                    <th scope="col" class="table-header"> Preview </th>
                    <th scope="col" class="table-header"> </th>
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
          <div class="col-sm dashboard-box"  style="text-align: center;">
            <h3> Artists You May Like </h3>
            <table class="table table-hover table-borderless" >
                <thead>
                    <th scope="col" class="table-header"> Name </th>
                    <th scope="col" class="table-header"> </th>
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

        <div class="row">
            <div class="col-sm dashboard-box" style="text-align: center;">
                <h3> Moods </h3>

                <div class="btn-group btn-moods btn-block" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-secondary btn-mood" data-toggle="collapse" href="#happy" aria-expanded="false" aria-controls="happy"> <i class="fas fa-laugh fa-5x"></i></button>
                    <button type="button" class="btn btn-secondary btn-mood" data-toggle="collapse" href="#neutral" aria-expanded="false" aria-controls="neutral"> <i class="fas fa-meh fa-5x"></i></button>
                    <button type="button" class="btn btn-secondary btn-mood" data-toggle="collapse" href="#sad" aria-expanded="false" aria-controls="sad"> <i class="fas fa-sad-cry fa-5x"></i></button>
                </div>

                <div class="collapse multi-collapse " id="happy">
                  <div class="card card-body">
                      <table class="table table-hover table-borderless song-mood" >
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

                <div class="collapse multi-collapse song-mood" id="neutral">
                  <div class="card card-body">
                      <table class="table table-hover table-borderless song-mood" >
                          <?php
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

                <div class="collapse multi-collapse song-mood" id="sad">
                  <div class="card card-body">
                      <table class="table table-hover table-borderless song-mood" >
                          <?php
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

        <div class="row">
            <div class="col-sm dashboard-box" style="text-align: center;">
                <a href="favoriteSongs.php"> <h3> Favorite Songs </h3> </a>
            </div>
            <div class="col-sm dashboard-box" style="text-align: center;">
                <a href="myPlaylists.php" > <h3> My Playlists </h3> </a>
            </div>
            <div class="col-sm dashboard-box" style="text-align: center;">
                <a href="favoriteArtists.php" > <h3> Favorite Artists </h3> </a>
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
