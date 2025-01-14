<?php

if (isset($_POST['save'])) { // cek variable POST from FORM
    include "../../connection.php"; //call connection php mysql

    // sql query INSERT INTO VALUES
    $query = "INSERT INTO bookings (customer_name, phone_number, motorcycle_id, start_date, duration, return_method, total_price) VALUES ('$_POST[customer_name]', '$_POST[phone_number]', '$_POST[motorcycle_id]', '$_POST[start_date]', '$_POST[duration]', '$_POST[return_method]', '$_POST[total_price]')";
    // run query
    $create = mysqli_query($db_connection, $query);

    if ($create) {
        // echo "<p> Pet added successfully! </p>";
        echo "<script>alert('Booking added Successfully!')</script>";
    } else {
        // echo "<p> Pet added Failed! </p>";
        echo "<script>alert('Booking add Failed!')</script>";
    }
}
?>
<!-- <p><a href="../index.php">Kembali</a></p> -->
<script>
    window.location.replace("../../index.php");
</script>