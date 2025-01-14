<?php
$currentPage = 'read_booking.php';
$title = 'Bookings';
include '../components/head.php';
?>

<div class="container">
  <div class="card">
    <div class="card-body">
      <form method="GET" action="read_booking.php" class="d-flex align-items-end">
        <div class="form-group flex-grow-1 me-2">
          <label for="search" class="form-label">Search by Customer Name</label>
          <input type="text" name="search" id="search" class="form-control" placeholder="Enter customer name" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
        </div>
      </form>
    </div>
  </div>
  <div class="card">
    <div class="table-wrapper">
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Customer</th>
            <th>Phone</th>
            <th>Motorcycle</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Return Method</th>
            <th>Total Price</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>
        <tbody id="booking-table">
          <?php
          include "../connection.php";
          $search = isset($_GET['search']) ? $_GET['search'] : '';
          $query = "SELECT * FROM bookings WHERE customer_name LIKE '%$search%'";
          $bookings = mysqli_query($db_connection, $query);
          $i = 1;
          foreach ($bookings as $data) :
          ?>
            <tr>
              <td><?= $i++; ?></td>
              <td><?= $data["customer_name"]; ?></td>
              <td><?= $data["phone_number"]; ?></td>
              <td><?= $data["motorcycle_id"]; ?></td>
              <td><?= $data["start_date"]; ?></td>
              <td><?= $data["duration"]; ?></td>
              <td><?= $data["return_method"]; ?></td>
              <td><?= $data["total_price"]; ?></td>
              <td><a href="edit_booking.php?id=<?= $data['booking_id'] ?>" class="btn btn-warning btn-sm">Edit</a></td>
              <td><a href="action/delete_booking.php?id=<?= $data['booking_id'] ?>" onclick="return confirm('Are you sure want to delete this booking?')" class="btn btn-danger btn-sm">Delete</a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include '../components/footer.php' ?>

<script>
  document.getElementById('search').addEventListener('input', function() {
    const searchValue = this.value;
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'read_booking.php?search=' + searchValue, true);
    xhr.onload = function() {
      if (this.status === 200) {
        const parser = new DOMParser();
        const doc = parser.parseFromString(this.responseText, 'text/html');
        const newTableBody = doc.getElementById('booking-table').innerHTML;
        document.getElementById('booking-table').innerHTML = newTableBody;
      }
    };
    xhr.send();
  });
</script>