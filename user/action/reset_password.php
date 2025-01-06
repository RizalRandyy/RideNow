<?php

include "../../connection.php";

$password = password_hash($_GET['role'], PASSWORD_DEFAULT);

$query = "UPDATE users SET password='$password' WHERE user_id='$_GET[id]'";

$update = mysqli_query($db_connection, $query);

if ($update) {
  echo "<script>alert('Reset password succeeded!')</script>";
} else {
  echo "<script>alert('Reset password failed!')</script>";
}
?>

<script>
  window.location.replace('../read_user.php');
</script>