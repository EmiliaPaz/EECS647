<?php

    $mysqli = new mysqli("mysql.eecs.ku.edu", "csydney", "Jaisai4e", "csydney");
    session_start();
    $username = $_SESSION['username'];

    $query =  "SELECT * FROM User WHERE username='$username'";

    if ($result = $mysqli->query($query))
    {
        while ($row = $result->fetch_assoc())
        {
            // Variables
            $old1 = $row['email'];
            $old2 = $_POST["oldEmail2"];
            $new1 = $_POST["newEmail1"];
            $new2 = $_POST["newEmail2"];

            if($old1 == $old2 && $new1 == $new2)
            {
                $stmt = $mysqli->prepare("UPDATE User SET email= ? WHERE username= ? ;");
                $stmt->bind_param("ss", $new1, $username);
                if ($stmt->execute()) {
                  echo "Email updated succesfully";
                }
                else {
                  echo "Email failed to update";
                }

            }
            else
            {
                echo "Email failed to update";
            }
        }
        $result->free();
    }
    else
    {
        echo "Email failed to update";
    }

    header('Location: ../settings.php');


?>
