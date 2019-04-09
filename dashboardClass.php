<?php
class dashboard{
  public function user_signin(){
    session_start();
    // Redirect to home page if user hasn't logged in
    if ( ! isset( $_SESSION['username'] ) ) {
        header("Location: home.php");
    }
  }
}
?>
