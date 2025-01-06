<?php

if (isset($_POST['save'])) {
  include '../../connection.php';

  $folder = '../../public/assets/uploads/images/motorcycles/';

  if ($_FILES['photo']['name'] != '') {
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $folder . $_FILES['photo']['name']))
      $photo = $_FILES['photo']['name'];
  } else {
    $photo = 'default.jpeg';
  }

  $query = "INSERT INTO motorcycles (brand, name, description, type, price_per_day, stock, photo) VALUES ('$_POST[brand]', '$_POST[name]', '$_POST[description]', '$_POST[type]', '$_POST[price_per_day]', '$_POST[stock]', '$photo')";

  $create = mysqli_query($db_connection, $query);

  if ($create) {
    echo "<script>alert('Motorcycle added Successfully!')</script>";
  } else {
    echo "<script>alert('Motorcycle add Failed!')</script>";
  }
}
?>

<script>window.location.href("../read_motorcycle.php")</script>