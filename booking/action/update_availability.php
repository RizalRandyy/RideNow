<?php
if (isset($_GET['mid'])) {
  include '../../connection.php';

  $motorcycle = "UPDATE motorcycles SET availability = 1 WHERE motorcycle_id = '$_GET[mid]'";
  $update_motorcycle = mysqli_query($db_connection, $motorcycle);

  if ($update_motorcycle) {
    echo "<script>alert('Motorcycle Returned!')</script>";
  } else {
    echo "<script>alert('Motorcycle Return Failed!')</script>";
  }
}
?>

<script>window.location.href = "../read_booking.php";</script>