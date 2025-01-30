<?php
if (isset($_POST['save'])) {
  include '../../connection.php';

  $folder = '../../public/assets/uploads/images/motorcycles/';

  $photo;

  if (move_uploaded_file($_FILES['new_photo']['tmp_name'], $folder . $_FILES['new_photo']['name'])) {
    $photo = $_FILES['new_photo']['name'];
  } else {
    $queryPhoto = "SELECT photo FROM motorcycles WHERE motorcycle_id=$_GET[id]";
    $getPhoto = mysqli_query($db_connection, $queryPhoto);
    $photo = $getPhoto;
  }

  $query = "UPDATE motorcycles SET 
            brand='$_POST[brand]',
            name='$_POST[name]',
            description='$_POST[description]',
            type='$_POST[type]',
            price_per_day='$_POST[price_per_day]',
            photo = '$photo'
            WHERE motorcycle_id='$_POST[motorcycle_id]'";


  $update = mysqli_query($db_connection, $query);

  if ($update) {
    if ($_POST['new_photo'] !== 'default.png') {
      unlink($folder . $_POST['new_photo']);
      echo "<script>alert('Motorcycle updated successfully!');</script>";
    } else {
      echo "<script>alert('Motorcycle update failed!');</script>";
    }
  }
}
?>

<script>window.location.replace('../read_motorcycle.php')</script>