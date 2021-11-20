<?php
  session_start();
?>

<?php
    session_unset();
    session_destroy();
    header("Location: http://localhost/css325/CSS326/CSS326/html/login.php")
?>