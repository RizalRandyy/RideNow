<?php
$currentPage = 'read_booking.php'; // Menggunakan read booking agar sidebarnya aktif
$title = 'Edit Booking';
include '../components/head.php';

include '../connection.php';

$query = "SELECT 
    bookings.*, 
    motorcycles.name AS motorcycle_name,
    booking_confirmations.amount, 
    booking_confirmations.refund AS refund
  FROM bookings
  LEFT JOIN motorcycles 
    ON bookings.motorcycle_id = motorcycles.motorcycle_id
  LEFT JOIN booking_confirmations 
    ON bookings.booking_id = booking_confirmations.booking_id
  WHERE bookings.booking_id = '$_GET[id]';
";

$customer = mysqli_query($db_connection, $query);

$data = mysqli_fetch_assoc($customer);

?>

<div class="container">
  <div class="card">
    <div class="card-body">
      <form action="action/update_booking.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
          <label for="customer_name" class="form-label">Customer Name</label>
          <input type="text" name="customer_name" required class="form-control" value="<?= $data['customer_name'] ?>">
        </div>

        <div class="form-group">
          <label for="phone_number" class="form-label">Phone</label>
          <input type="number" name="phone_number" required class="form-control" value="<?= $data['phone_number'] ?>">
        </div>

        <div class="form-group">
          <label for="motorcycle_id" class="form-label">Motorcycle Name</label>
          <input type="text" name="motorcycle_id" disabled class="form-control" value="<?= $data['motorcycle_name'] ?>">
        </div>

        <div class="form-group">
          <label for="start_date" class="form-label">Start Date</label>
          <input type="date" name="start_date" disabled class="form-control" value="<?= $data['start_date'] ?>">
        </div>

        <div class="form-group">
          <label for="duration" class="form-label">Duration</label>
          <input type="number" name="duration" disabled class="form-control" value="<?= $data['duration'] ?>">
        </div>

        <div class="form-group">
          <label for="type" class="form-label">Return Method</label>
          <select name="return_method" class="form-select" disabled>
            <option value="" selected disabled>Choose</option>
            <option value="Dikantor" <?= ($data['return_method'] == 'Dikantor') ? 'selected' : ''; ?>>Dikantor</option>
            <option value="Dirumah" <?= ($data['return_method'] == 'Dirumah') ? 'selected' : ''; ?>>Dirumah</option>
          </select>
        </div>

        <div class="form-group">
          <div class="form-group">
            <label for="total_due" class="form-label">Total Price</label>
            <input type="text"
              id="total_due_display"
              disabled
              class="form-control"
              value="<?= "Rp. " . number_format($data['total_price'], 2, ",", "."); ?>">
            <input type="hidden"
              id="total_due"
              data-value="<?= $data['total_price'] ?>">
          </div>

          <div class="form-group">
            <label for="total_paid" class="form-label">Total Money Paid</label>
            <input type="number"
              id="total_paid"
              name="amount"
              required
              class="form-control"
              value="<?= $data['amount'] ?: ''; ?>"
              placeholder="Enter total money paid">
          </div>

          <div class="form-group">
            <label for="change" class="form-label">Change</label>
            <input type="text"
              id="change"
              readonly
              class="form-control"
              placeholder="Change will appear here">
            <input type="hidden"
              id="change"
              name="refund"
              value="<?= $data['refund']; ?>">
          </div>

          <div class="form-group" style="display:flex; justify-content:flex-end;">
            <input type="submit" name="save" value="Save" class="btn btn-success mx-3" style="cursor: pointer;">
            <input type="reset" name="reset" value="Reset" class="btn btn-danger" style="cursor: pointer;">
            <input type="hidden" name="booking_id" value="<?= $data['booking_id'] ?>">
            <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
          </div>

          <script>
            // Ambil elemen input
            const totalPaidInput = document.getElementById('total_paid');
            const totalDueHidden = document.getElementById('total_due');
            const changeInput = document.getElementById('change');

            // Fungsi untuk menghitung kembalian
            function calculateChange() {
              const totalPaid = parseFloat(totalPaidInput.value) || 0;
              const totalDue = parseFloat(totalDueHidden.dataset.value) || 0;
              const change = totalPaid - totalDue;

              // Tampilkan hasil kembalian dalam format desimal
              const formattedChange = change >= 0 ? change.toFixed(2) : '0.00';

              // Tampilkan nilai formattedChange ke input form (hidden input dan display input)
              changeInput.value = change >= 0 ? formattedChange : 'Insufficient amount';
              document.querySelector('input[name="refund"]').value = formattedChange;
            }

            // Event listener untuk input
            totalPaidInput.addEventListener('input', calculateChange);
          </script>


          <?php include '../components/footer.php' ?>