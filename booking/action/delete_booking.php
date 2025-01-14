<?php
if (isset($_GET['id'])) {
  include '../../connection.php';

  $query = "DELETE FROM bookings WHERE booking_id = '$_GET[id]'";

  $delete = mysqli_query($db_connection, $query);

  if ($delete) {
    echo "<script>alert('Bookings deleted successfully!')</script>";
  } else {
    echo "<script>alert('Bookings delete failed!')</script>";
  }
}
?>

<script>window.location.replace('../read_booking.php')</script>
