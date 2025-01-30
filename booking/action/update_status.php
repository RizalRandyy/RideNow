<?php
if (isset($_GET['id'])) {
  include '../../connection.php';

  $query = "UPDATE bookings SET status = 'Confirmed' WHERE booking_id = '$_GET[id]'";

  $update = mysqli_query($db_connection, $query);

  $motorcycle = "UPDATE motorcycles SET availability = 0 WHERE motorcycle_id = '$_GET[mid]'";
  $update_motorcycle = mysqli_query($db_connection, $motorcycle);

  if ($update && $update_motorcycle) {
    echo "<script>alert('Booking Status Updated Successfully!')</script>";
  } else {
    echo "<script>alert('Booking Status Update Failed!')</script>";
  }
}
?>

<script>window.location.href = "../read_booking.php";</script>