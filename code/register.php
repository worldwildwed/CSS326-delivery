<?php
// Connect to the database
$mysqli = new mysqli("localhost", "root", null, "css326_delivery");

if ($mysqli->connect_errno) {
  echo $mysqli->connect_error;
}

if (isset($_POST["submit"])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $insert_sql = "INSERT INTO `myuser`(`Username`, `Password`, `Email`) VALUES ('$username', '$password', '$email')";
  
    $result = $mysqli->query($insert_sql);
    echo $result;
    if (!$result){
        echo "Insert failed!<br/>";
        echo $mysqli->error;
    }
    else {
      $URL = "localhost/css325/CSS326/CSS326/html";
      header("Location: http://localhost/css325/CSS326/CSS326/html/login.html");
      exit();
    }
}
?>