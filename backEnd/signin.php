<?php

    include ('../templates/sql_credentials.php');
    global $mysqli;

    session_start();

    // Statements
    $stmt_signin = $mysqli->prepare("SELECT * FROM User WHERE username= ? AND password= ?");
    $stmt_signin->bind_param("ss",$username,$password_hashed);

    // Variables
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password_hashed = hash('sha512',$password);

    // Sign in
    $stmt_signin->execute();
    if($stmt_signin->fetch())
    {
        $_SESSION['username'] = $username;
        header('Location: ../dashboard.php');
    }
    else
    {
        $_SESSION['signin_error'] = "username/password incorrect";
        header('Location: ../home.php');
    }

    $stmt_signin->close();
    $mysqli->close();
?>
