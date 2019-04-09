<?php
    echo "here";
    // Always start this first
    session_start();

    // Destroying the session clears the $_SESSION variable and logs the user out.
    // This also happens automatically when the browser is closed
    session_destroy();

    header('Location: ../home.php');
?>
