<?php
if (isset($_POST['save'])) {
  include "../../connection.php";

  $query = "UPDATE users SET
            role = '$_POST[role]',
            fullname = '$_POST[fullname]',
            email = '$_POST[email]',
            phone = '$_POST[phone]'
            WHERE user_id = '$_POST[user_id]'; 
            ";

  $update = mysqli_query($db_connection, $query);

  if ($update) {
    echo "<script>alert('User updated successfully!');</script>";
  } else {
    echo "<script>alert('User update failed!');</script>";
  }
}
?>

<script>
  window.location.replace("../read_user.php");
</script>