<?php
$currentPage = 'read_motorcycle.php';
$title = 'Motorcycles';
include '../components/head.php';

?>

<div class="container">
  <p><a href="add_motorcycle.php" class="btn btn-success btn-sm">Add New Motorcycle</a></p>
  <div class="card">
    <div class="table-wrapper">
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Brand</th>
            <th>Name</th>
            <th>Type</th>
            <th>Price/day</th>
            <th>Availability</th>
            <th>Photo</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include '../connection.php';
          $query = "SELECT * FROM motorcycles";
          $motor = mysqli_query($db_connection, $query);

          $i = 1;
          foreach ($motor as $data) :
          ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $data['brand'] ?></td>
              <td><?= $data['name'] ?></td>
              <td><?= $data['type'] ?></td>
              <td><?php echo "Rp. " . number_format($data['price_per_day'], 2, ",", "."); ?></td>
              <td><?php echo ($data['availability'] >= 1) ? "available" : "In use"; ?></td>
              <td>
                <div>
                  <img src="../public/assets/uploads/images/motorcycles/<?= $data['photo'] ?>" width="100" height="100" alt="motorcycle-photo">
                </div>
              </td>
              <td><a href="edit_motorcycle.php?id=<?= $data['motorcycle_id'] ?> " class="btn btn-warning btn-sm">Edit</a></td>
              <td><a href="action/delete_motorcycle.php?id=<?= $data['motorcycle_id'] ?>" onclick="return confirm('Are you sure want to delete this motorcycle?')" class="btn btn-danger btn-sm">Delete</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include '../components/footer.php' ?>