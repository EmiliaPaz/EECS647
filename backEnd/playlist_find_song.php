<!DOCTYPE html>
<html lang="en">
<head>
    <title>Song Search</title>
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

    <!-- Credentials -->
    <?php
        // include('templates/sql_credentials.php');
        $mysqli = new mysqli("mysql.eecs.ku.edu", "csydney", "Jaisai4e", "csydney");
        session_start();
       $username = $_SESSION['username'];
       $song_name = $_POST['song_name'];
    ?>

     <!-- Content -->
    <div class="content">
        <h2> Songs Like "<?php echo $song_name; ?>"  </h2>

            <table class="table thead-light table-hover" >
                <thead class="thead-light">
                    <th scope="col"> Name </th>
                    <th scope="col"> Artist </th>
                    <th scope="col"> </th>
                </thead>

                <?php
                  $query = "SELECT Song.song_id, Song.name, Artist_has_song.stage_name FROM Song, Artist_has_song WHERE name LIKE '%$song_name%' AND Song.song_id = Artist_has_song.song_id";
                  if ($result = $mysqli->query($query))
                  {
                    while ($row = $result->fetch_assoc())
                    {
                      $song_id = $row['song_id'];
                      $name = $row['name'];
                      $artist = $row['stage_name'];
                      ?>
                      <tr>
                          <td> <?php echo $name; ?> </td>
                          <td> <?php echo $artist; ?> </td>
                          <td>
                            <a href="playlist_add_song.php?song_id=<?php echo $song_id ?>"> Add to playlist </a>
                          </td>
                      </tr>
                      <?php
                    }
                    $result->free();
                  }
                ?>
            </table>
    </div>

    <div>
      <form action="../myPlaylists.php" method="post">
        <input type="submit" value="Go back">
      </form>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
