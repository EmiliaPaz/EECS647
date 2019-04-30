<?php
    //  Redirects to home page if user hasn't signed in
    include('dashboardClass.php');
    $dashboard = new dashboard();
    $dashboard->user_signin();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Songs</title>
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

    ?>

     <!-- Content -->
    <div class="content">
        <h2> Favorite Songs </h2>

        <!-- <form action="backEnd/delete_song.php" method="post"> -->
            <table class="table thead-light table-hover" >
                <thead class="thead-light">
                    <th scope="col"> Name </th>
                    <th scope="col"> Preview </th>
                    <th scope="col"> Popularity </th>
                    <th scope="col"> Track number </th>
                    <th scope="col">  </th>
                </thead>

                <?php
                  $query = "SELECT Song.song_id, Song.name, Song.url, Song.popularity, Song.track_number FROM Song INNER JOIN Favorite_songs ON Song.song_id = Favorite_songs.song_id AND username = '$username'";
                  if ($result = $mysqli->query($query))
                  {
                    while ($row = $result->fetch_assoc())
                    {
                      $song_id = $row['song_id'];
                      $name = $row['name'];
                      $url = $row['url'];
                      $popularity = $row['popularity'];
                      $track_number = $row['track_number'];
                      ?>
                      <tr>
                          <td> <?php echo $name; ?> </td>
                          <td> <a href="<?php echo $url; ?>"> Listen </a>  </td>
                          <td> <?php echo $popularity; ?> </td>
                          <td> <?php echo $track_number; ?> </td>
                          <td> <a href="backEnd/delete_song.php?song_id=<?php echo $song_id ?>"> Remove from favorites </a> </td>
                      </tr>
                      <?php
                    }
                    $result->free();
                  }
                ?>
            </table>
        <!-- </form> -->
    </div>

    <div>
      Find song:
      <form action="backEnd/find_song.php" method="post">
        <input type="text" name="song_name">
        <input type="submit" value="Search">
      </form>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
