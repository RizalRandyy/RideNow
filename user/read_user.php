<?php
$currentPage = 'read_user.php';
$title = 'Users';
include '../components/head.php';

?>

<div class="container">
  <p><a class="btn btn-success btn-sm" href="add_user.php">Add New User</a></p>
  <div class="card">
    <div class="table-wrapper">
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>Role</th>
            <th>Fullname</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Photo</th>
            <th colspan="3">
              Action
            </th>
          </tr>
        </thead>
        <tbody>
          <?php
          include "../connection.php";
          $query = "SELECT * FROM users";
          $users = mysqli_query($db_connection,  $query);
          $i = 1;
          foreach ($users as $data) :
          ?>
            <tr>
              <td><?= $i++; ?></td>
              <td><?= $data["username"]; ?></td>
              <td><?= $data["role"]; ?></td>
              <td><?= $data["fullname"]; ?></td>
              <td><?= $data["email"]; ?></td>
              <td><?= $data["phone"]; ?></td>
              <td>
                <div>
                  <img src="../public/assets/uploads/images/users/<?= $data['photo'] ?>" width="50" height="50" alt="user-photo">
                </div>
              </td>
              <td><a href="edit_user.php?id=<?= $data['user_id'] ?>" class="btn btn-warning btn-sm">Edit</a></td>
              <td><a href="action/delete_user.php?id=<?= $data['user_id'] ?>" onclick="return confirm('Are you sure want to delete this user?')" class="btn btn-danger btn-sm">Delete</a></td>
              <td><a href="action/reset_password.php?id=<?= $data['user_id']; ?>&role=<?= $data['role']; ?>" onclick="return confirm('Are you sure reset the password?')" class="btn btn-secondary btn-sm">Reset Password</a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include '../components/footer.php' ?>