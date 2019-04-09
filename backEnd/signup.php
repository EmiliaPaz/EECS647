<?php

    echo "here \n";

    // $mysqli = new mysqli("mysql.eecs.ku.edu", "csydney", "Jaisai4e", "csydney");
    include ('../templates/sql_credentials.php');
    global $mysqli;



    // Statements
    $stmt_username = $mysqli->prepare("SELECT * FROM User WHERE username = ?;");
    $stmt_username->bind_param("s", $username);
    $stmt_email = $mysqli->prepare("SELECT * FROM User WHERE email = ?;");
    $stmt_email->bind_param("s", $email);
    $stmt_signup = $mysqli->prepare("INSERT INTO User (username,password,email) VALUES (?,?,?)");
    $stmt_signup->bind_param("sss",$username,$password1,$email);

    echo "statements \n ";

    // Variables
    $username = $_POST["newUsername"];
    $password1 = $_POST["newPassword1"];
    $password2 = $_POST["newPassword2"];
    $email = $_POST["newEmail"];

    echo "variables \n";

    $stmt_username->execute();
    if($stmt_username->fetch())
    {
        // Username already exists
        echo "Username already exists \n";
    }
    else if($stmt_email->fetch())
    {
        // Email already exists
        echo "Email already exists \n";
    }
    else
    {
        if ($username == '')
        {
             // "Error: cannot have blank username";
             echo "Error: cannot have blank username";
         }
         else if ($email == '')
         {
             // "Error: cannot have blank email";
             echo "Error: cannot have blank email";
         }
         else if ($password1 == '')
         {
             // "Error: cannot have blank password";
             echo "Error: cannot have blank password";
         }
         else if ($password1 != $password2)
         {
             // "Error: Passwords do not match up";
             echo "Error: Passwords do not match up";
         }
         else if($stmt_signup->execute())
         {
             // New error created succesfully
             echo "New error created succesfully";
         }
         else
         {
             // error
             echo "Error";
         }
    }

    $stmt_username->close();
    $stmt_email->close();
    $stmt_signup->close();
    $mysqli->close();
?>
