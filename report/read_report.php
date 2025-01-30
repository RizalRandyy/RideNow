<?php
$currentPage = 'read_report.php';
$title = 'Report';
include '../components/head.php';

$months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

$year = date('Y');
?>


<div class="container">

  <form>
    <select name="month" class="select" required>
      <option value="" selected disabled <?= isset($_GET['month']) ? 'selected disabled' : '' ?>>
        Month
      </option>
      <?php
      for ($m = 1; $m <= 12; $m++) {
        $isSelected = isset($_GET['month']) && $_GET['month'] == $m;
      ?>
        <option value="<?= $m ?>" <?= $isSelected ? 'selected' : '' ?>>
          <?= $months[$m - 1] ?>
        </option>
      <?php
      }
      ?>
    </select>

    <select name="year" class="select" required>
      <option value="" <?= isset($_GET['year']) ? "selected disabled" : ""; ?>>
        Year
      </option>
      <?php for ($y = 0; $y <= 2; $y++) {
        $isSelected = isset($_GET['year']) && $_GET['year'] == $year - $y;
      ?>
        <option value="<?= $year - $y ?>" <?= $isSelected ? 'selected' : '' ?>><?= $year - $y ?></option>
      <?php } ?>
    </select>
    
    <input type="submit" value="View Report" class="btn btn-success">

    <?php if (isset($_GET['month']) && isset($_GET['year'])) { ?>
      <div class="report-period">
        <h4>Report Period: <?= $months[$_GET['month'] - 1] ?> - <?= $_GET['year'] ?></h4>
      </div>
    <?php } ?>
  </form>

  <div class="card">
    <div class="table-wrapper">

      <?php if (isset($_GET['year'])) {
        include '../connection.php';

        $query = "SELECT booking_confirmations.*,
            bookings.start_date AS start_date,
            bookings.customer_name AS name,
            bookings.total_price AS total_price,
            users.username AS admin_name
          FROM booking_confirmations
            LEFT JOIN bookings
              ON booking_confirmations.booking_id = bookings.booking_id
              LEFT JOIN 
    users ON booking_confirmations.user_id = users.user_id
               WHERE MONTH(start_date)='$_GET[month]' AND YEAR(start_date)='$_GET[year]'";
        $report = mysqli_query($db_connection, $query);
      ?>

        <table class="table">
          <thead>
            <tr>
              <th>Booking Date</th>
              <th>Customer Name</th>
              <th>Admin Name</th>
              <th>Payment Date</th>
              <th>Total Price</th>
              <th>Amount</th>
              <th>Refund</th>
            </tr>
            <?php
            if (mysqli_num_rows($report) > 0) {
              $i = 1;
              $total = 0;
              foreach ($report as $data) :
                $total += $data['total_price'];
            ?>
          </thead>
          <tbody>
            <tr>
              <td><a href="../booking/edit_booking.php?id=<?= $data['booking_id'] ?>" style="text-decoration: underline; color: black;" class="btn btn-primary btn-sm"><?= date('d F Y', strtotime($data['start_date'])) ?></a></td>
              <td><?= $data['name'] ?></td>
              <td><?= $data['admin_name'] ?></td>
              <td><?= date('d F Y', strtotime($data['payment_date'])) ?></td>
              <td><?= "Rp. " . number_format($data['total_price'], 2, ",", "."); ?></td>
              <td><?= "Rp. " . number_format($data['amount'], 2, ",", "."); ?></td>
              <td><?= "Rp. " . number_format($data['refund'], 2, ",", "."); ?></td>
            </tr>
          <?php endforeach ?>
          <tr>
            <td>Total <?= "Rp. " . number_format($total, 2, ",", "."); ?></td>
          </tr>
        <?php } else { ?>
          <tr>
            <td colspan="6" align="center">No record found!</td>
          </tr>
          </tbody>
        <?php } ?>
        </table>
      <?php } ?>
    </div>
  </div>
</div>

<?php include '../components/footer.php' ?>