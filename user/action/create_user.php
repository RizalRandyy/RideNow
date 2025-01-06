<?php
if (isset($_POST['save'])) {
  include '../../connection.php';

  $folder = '../../public/assets/uploads/images/users/';

  if ($_FILES['photo']['name'] != '') {
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $folder . $_FILES['photo']['name']))
      $photo = $_FILES['photo']['name'];
  } else {
    $photo = 'default.jpeg';
  }

  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $query = "INSERT INTO users (username, password, role, fullname, email, phone, photo) VALUES ('$_POST[username]', '$password', '$_POST[role]', '$_POST[fullname]', '$_POST[email]', '$_POST[phone]', '$photo')";

  $create = mysqli_query($db_connection, $query);

  if ($create) {
    echo "<script>alert('User added successfully!');</script>";
  } else {
    echo "<script>alert('User add failed!');</script>";
  }
}
?>

<script>
  window.location.replace("../read_user.php");
</script>