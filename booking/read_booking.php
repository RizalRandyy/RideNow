<?php
$currentPage = 'read_booking.php';
$title = 'Bookings';
include '../components/head.php';
?>

<div class="container">
  <div class="card">
    <div class="table-wrapper">
      <table class="table text-sm">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Motorcycle</th>
            <th>Start Date</th>
            <th>Duration</th>
            <th>Return Method</th>
            <th>Total Price</th>
            <th>Status</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>
        <tbody id="booking-table">
          <?php
          include "../connection.php";
          $query = "SELECT bookings.*, 
                    motorcycles.name AS motorcycle_name,
                    motorcycles.availability AS availability
                    FROM bookings
                    LEFT JOIN motorcycles ON bookings.motorcycle_id = motorcycles.motorcycle_id";

          $bookings = mysqli_query($db_connection, $query);
          $i = 1;
          foreach ($bookings as $data) :
          ?>
            <tr>
              <td><?= $i++; ?></td>
              <td><?= $data["customer_name"]; ?></td>
              <td><?= $data["phone_number"]; ?></td>
              <td><?= $data["motorcycle_name"]; ?></td>
              <td><?= $data["start_date"]; ?></td>
              <td><?= $data["duration"]; ?> day</td>
              <td><?= $data["return_method"]; ?></td>
              <td><?= "Rp. " . number_format($data['total_price'], 2, ",", "."); ?></td>
              <td>
                <?php if ($data['status'] != 'Confirmed') { ?>
                  <div class="<?= $data['payment_status'] == 'Paid' ? "btn-payment-paid" : "btn-payment-pending" ?>">
                    <?= $data["payment_status"]; ?>
                  </div>
                <?php } else { ?>
                  <div class="btn-payment-confirmed">
                    <?= $data["status"]; ?>
                  </div>
                <?php } ?>
              </td>

              <?php if ($data['payment_status'] != 'Paid') { ?>
                <td><a href="edit_booking.php?id=<?= $data['booking_id'] ?>" class="btn btn-warning btn-sm">Edit</a></td>
                <td><a href="action/delete_booking.php?id=<?= $data['booking_id'] ?>" onclick="return confirm('Are you sure want to delete this booking?')" class="btn btn-danger btn-sm">Delete</a></td>
              <?php } else if ($data['status'] == 'Confirmed' && $data['availability'] == 1) { ?>
                <td><a href="edit_booking.php?id=<?= $data['booking_id'] ?>" class="btn btn-warning btn-sm">Edit</a></td>
                <td><a href="action/delete_booking.php?id=<?= $data['booking_id'] ?>" onclick="return confirm('Are you sure want to delete this booking?')" class="btn btn-danger btn-sm">Delete</a></td>
              <?php } else if ($data['availability'] == 0) { ?>
                <td><a href="action/update_availability.php?mid=<?= $data['motorcycle_id'] ?>" class="btn btn-primary btn-sm">Confirm Return</a></td>
              <?php } ?>
              <?php if ($data["payment_status"] != "Pending" && $data["status"] != "Confirmed") { ?>
                <td><a href="action/update_status.php?id=<?= $data['booking_id'] ?>&mid=<?= $data['motorcycle_id'] ?>" class="btn btn-success btn-sm">Confirm</a></td>
              <?php }; ?>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <?php include '../components/footer.php' ?>

  <!-- <script>
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
  </script> -->