<?php
    session_start();
    $mysqli = new mysqli("localhost", "root", null, "css326_delivery");
    if ($mysqli->connect_errno) {
        echo $mysqli->connect_error;
      }
    if (isset($_POST['addtocart'])) {
        $insert = sprintf("INSERT INTO `cart`(`Userid`, `Itemid`, `Quantity`) VALUES ( %d, %d ,%d)", $_SESSION['current_uid'], $_POST['itemid'], $_POST['quantity']);
        $result = $mysqli->query($insert);
        if ($result) {
            echo "CART INSERTED";
        }
    }
    echo "CART PHP";
?>