<?php
if (isset($_GET['id'])) { 
  include "../../connection.php";

  $query = "DELETE FROM users WHERE user_id = '$_GET[id]'";

  $delete = mysqli_query($db_connection, $query);

  if ($delete) {
    echo "<script>alert('User deleted successfully!');</script>"; 
  } else { 
    echo "<script>alert('User delete failed!');</script>";
  }
}
?>

<script>window.location.replace("../read_user.php");</script>