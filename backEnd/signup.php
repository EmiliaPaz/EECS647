<?php

    include ('../templates/sql_credentials.php');
    global $mysqli;

    // Statements
    $stmt_username = $mysqli->prepare("SELECT * FROM User WHERE username = ?;");
    $stmt_username->bind_param("s", $username);
    $stmt_email = $mysqli->prepare("SELECT * FROM User WHERE email = ?;");
    $stmt_email->bind_param("s", $email);
    $stmt_signup = $mysqli->prepare("INSERT INTO User (username,password,email) VALUES (?,?,?)");
    $stmt_signup->bind_param("sss",$username,$password_hashed,$email);

    // Variables
    $username = $_POST["newUsername"];
    $password1 = $_POST["newPassword1"];
    $password2 = $_POST["newPassword2"];
    $password_hashed = hash('sha512', $password1);
    $email = $_POST["newEmail"];


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
            $_SESSION['signup_msg'] = "Error: cannot have blank username";
         }
         else if ($email == '')
         {
             $_SESSION['signup_msg'] = "Error: cannot have blank email";
         }
         else if ($password1 == '')
         {
             $_SESSION['signup_msg'] = "Error: cannot have blank password";
         }
         else if ($password1 != $password2)
         {
             $_SESSION['signup_msg'] = "Error: Passwords do not match up";
         }
         else if($stmt_signup->execute())
         {
             $_SESSION['signup_msg'] = "New user created succesfully";
         }
         else
         {
             $_SESSION['signup_msg'] = "Error";
         }
    }

    $stmt_username->close();
    $stmt_email->close();
    $stmt_signup->close();
    $mysqli->close();

    header('Location: ../home.php');
?>
