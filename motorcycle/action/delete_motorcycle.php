<?php
if (isset($_GET['id'])) {
  include '../../connection.php';

  $query = "DELETE FROM motorcycles WHERE motorcycle_id = '$_GET[id]'";

  $delete = mysqli_query($db_connection, $query);

  if ($delete) {
    echo "<script>alert('Motorcycle deleted successfully!')</script>";
  } else {
    echo "<script>alert('Motorcycle delete failed!')</script>";
  }
}
?>

<script>window.location.replace('../read_motorcycle.php')</script>
