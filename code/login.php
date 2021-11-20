<?php
  session_start();
?>

<?php
// Connect to the database
$mysqli = new mysqli("localhost", "root", null, "css326_delivery");


if ($mysqli->connect_errno) {
  echo $mysqli->connect_error;
}

if (isset($_POST["submit"])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM myuser WHERE (username = '$username' AND password = '$password') OR (email = '$username' AND password = '$password')";
  
    $result = $mysqli->query($query);
    
    if ($result) {
      if ($result->num_rows == 1) {
        $data = $result->fetch_array();
        // echo "userID => " . $data["Userid"];
        $_SESSION['current_uid'] = $data["Userid"];
        header("Location: http://localhost/css325/CSS326/CSS326/html/index.php");
      }
      else {
        echo "Wrong Username Or Password";
      }
    }
    else {
      echo "FAILED";
    }
}
?>