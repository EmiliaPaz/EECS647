<?php

    $mysqli = new mysqli("mysql.eecs.ku.edu", "csydney", "Jaisai4e", "csydney");
    session_start();
    $username = $_SESSION['username'];

    $query =  "SELECT * FROM User WHERE username='$username'";


    if ($result = $mysqli->query($query))
    {
        while ($row = $result->fetch_assoc())
        {
            // Passwords
            $old2 = $_POST["oldPassword2"];
            $new1 = $_POST["newPassword1"];
            $new2 = $_POST["newPassword2"];

            // Hash passwords
            $old1_hash = $row['password'];
            $old2_hash = hash('sha512',$old2);
            $new1_hash = hash('sha512',$new1);
            $new2_hash = hash('sha512',$new2);


            if($old1_hash == $old2_hash && $new1_hash == $new2_hash)
            {
                $stmt = $mysqli->prepare("UPDATE User SET password= ? WHERE username= ? ;");
                $stmt->bind_param("ss", $new1_hash, $username);
                if ($stmt->execute()) {
                  echo "Password updated succesfully";
                }
                else {
                  echo "Password failed to update";
                }
            }
            else
            {
                echo "Password failed to update";
            }
        }
        $result->free();
    }
    else
    {
        echo "Password failed to update";
    }

    header('Location: ../settings.php');


?>
