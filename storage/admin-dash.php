<?php
    session_start();
    $mysqli = new mysqli("localhost", "root", null, "css326_delivery");
    // login method to Restaurant users
    echo 'Current Resid is ' . $_SESSION['Resid'];
    $current_resid = $_SESSION['Resid'];
    
    function generate_imgname($resid, $itemid, $resusername) {
        $str = $resid . '--' . $itemid . '--' . $resusername;
        
        return $str;
        // $imgname = sha1()
    }

    function update_item_img($mysqli, $imgname) {
      $resid = 1;
      $itemid = 1;
      $update = "UPDATE `item` SET `ImageName` = '$imgname' WHERE `Itemid` = $itemid AND `Resid` = $resid";
      $result = $mysqli->query($update);
      if ($result) {
        echo 'updated image name';
      } else { echo $mysqli->error;}
    }

    if(isset($_POST['submit'])){
      // pizza image upload test
      $resid = 1;
      $itemid = 1;
      $resusername = "bistro";
      $targetDir = "food-image/";
      $imgname = generate_imgname($resid, $itemid, $resusername);
      $filetype = explode(".", $_FILES['file']['name']);
      $filetype = end($filetype);
      $imgname = $imgname . '.' . $filetype;
      $targetFile = $targetDir.basename($imgname);
      echo $targetFile . 'xczxczxcxzcxz  ';

      print_r($_FILES['file']);
      echo '</br>';  
      print_r($filetype);

      update_item_img($mysqli, $imgname);
      move_uploaded_file($_FILES['file']['tmp_name'], $targetFile);
    }

    if (isset($_POST['update-item'])) {
      // pizza image upload test
      $resid = $current_resid;
      $itemid = $_POST['itemid'];
      $q = "SELECT * FROM `restaurant` WHERE `Resid` = " . $resid;
      $result = $mysqli->query($q);
      $profile = $result->fetch_array();
      // $resusername = "bistro";
      $resusername = $profile['Username'];
      $targetDir = "food-image/";
      $imgname = generate_imgname($resid, $itemid, $resusername);
      $filetype = explode(".", $_FILES['file']['name']);
      $filetype = end($filetype);

      $imgname = $imgname . '.' . $filetype;
      $targetFile = $targetDir . basename($imgname);
      echo $targetFile . ' ---------------- ';

      print_r($_FILES['file']);
      echo '</br>';
      print_r($filetype);

      $update = "UPDATE `item` SET `ImageName` = '$imgname' WHERE `Itemid` = $itemid AND `Resid` = $resid";
      $result = $mysqli->query($update);
      if ($result) {
        echo 'updated image name';
      } else { echo $mysqli->error;}
      move_uploaded_file($_FILES['file']['tmp_name'], $targetFile);
    }

    if(isset($_POST['logout'])) {
      session_unset();
      session_destroy();
      header("Location: http://localhost/css325/CSS326/CSS326/storage/login-res.php");
    }
    
    if(isset($_POST['update-res-img'])) {
      $resid = $current_resid;
      $targetDir = "profile-image/";
      $filetype = explode(".", $_FILES['file']['name']);
      $filetype = end($filetype);
      $imgname = $resid . "." . $filetype;
      $targetFile = $targetDir . basename($imgname);
      echo $targetFile . ' ---------------- ';

      print_r($_FILES['file']);
      echo '</br>';
      print_r($filetype);
      $update = "UPDATE `restaurant` SET `ResImg`= '$imgname' WHERE `Resid` =" . $resid;
      $result = $mysqli->query($update);
      if ($result) {
        echo 'updated image name';
      } else { echo $mysqli->error;}
      move_uploaded_file($_FILES['file']['tmp_name'], $targetFile);
    }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>HTML Form</title>
  </head>
  <body>
    <h1>Form</h1>
    <div>
    <form method="POST" action="#" >
      <input type="submit" name="logout" value="LOGOUT" >
    </form></div>
    <form method="POST" action="#" enctype="multipart/form-data" >
    <label  class="form-label">Upload Restarant Image</label> 
          File : <input type="file" name="file" >
          <input type="submit" name="update-res-img" value="update res profile" >
    </form></div>

  </br>
    <input type="submit" name="select-all" value="Select All"></form>
  <p></p>
  <p></p>
    
    <?php
      $query = "SELECT * FROM `item` WHERE `Resid` = ". $current_resid;
      $result = $mysqli->query($query);
      //echo $query;
      if (!$result) { echo $mysqli->error; }
      while ($row = $result->fetch_array()){
    ?>
      <div>
        <form method="POST" action="#" enctype="multipart/form-data" >
          <label>Select: </label> 
          <input type="checkbox" name="select" value="0" >
          <input type="hidden" name="itemid" value=<?php echo $row['Itemid']?>>
          <label><?php echo $row['Itemid']?> </label> 
          <input type="text" name="name" value="<?php echo $row['Name']?>" >
          <input type="text" name="price" value="<?php echo $row['Price']?>" >
          <input type="text" name="desc" value="<?php echo $row['Description']?>" >
          <label>Available: </label> 
          <?php

            if($row['Available'] == 1) { echo "<input type='checkbox' name='avai' value='available' checked>"; }
            else { echo "<input type='checkbox' name='avai' value='available'>"; }
            if($row['ImageName'] == "") { echo "No Image Name Yet..."; }
            else { echo "<h2>Image Name " . $row['ImageName'] . "</h2>"; }
          ?>
          <!-- <input type="text" name="avai" value="<?php echo $row['Available']?>" > -->
          
          <label  class="form-label">Upload Food Image</label> 
          File : <input type="file" name="file" >
          <input type="submit" name="update-item" value="update" >
        </form></div>
    <?php } ?>


  </body>
</html>