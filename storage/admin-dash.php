<?php
    session_start();
    $mysqli = new mysqli("localhost", "root", null, "css326_delivery");
    // login method to Restaurant users
    echo 'Current Resid is ' . $_SESSION['Resid'];
    
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
      }
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
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>HTML Form</title>
  </head>
  <body>
    <h1>Form</h1>
    <form method="POST" action="#" enctype="multipart/form-data" >
      <label  class="form-label">Upload Food Image</label>
      <!-- <input type="text" class="form-control" id="exampleInputEmail1" name="name" required > <br><br> -->
      File : <input type="file" name="file"><br><br>
      <br/>
      <input type="submit" value="submit"  name="submit">
    </form>
  </body>
</html>