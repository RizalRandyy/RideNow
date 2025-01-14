<?php
include "../connection.php"; // Call your connection file

$id = $_GET['id'];
$query = "SELECT * FROM motorcycles WHERE motorcycle_id = $id";
$result = mysqli_query($db_connection, $query);
$motorcycle = mysqli_fetch_assoc($result);
$price_per_day = $motorcycle['price_per_day'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/index.css">
    <title>Detail Motor</title>
    <script>
        function calculateTotalPrice() {
            const duration = document.getElementById('duration').value;
            const basePrice = <?php echo $price_per_day; ?>;
            let totalPrice = duration * basePrice;
            document.getElementById('total_price').value = totalPrice;
            updateTotalPrice();
        }

        function updateTotalPrice() {
            const returnMethod = document.getElementById('return_method').value;
            const totalPriceInput = document.getElementById('total_price');
            let totalPrice = parseFloat(totalPriceInput.value) || 0;

            if (returnMethod === 'Dirumah') {
                totalPrice += 5000;
            } else if (returnMethod === 'Dikantor') {
                totalPrice = parseFloat(document.getElementById('duration').value) * <?php echo $price_per_day; ?>;
            }

            totalPriceInput.value = totalPrice;
        }
    </script>
</head>

<body>
    <!-- Nav Main -->
    <div class="nav-main">
        <div class="nav2">
            <h1 class="logo2">RideNow</h1>
            <ul class="menu-items2">
                <li>Home</li>
                <li>List</li>
                <li>About</li>
            </ul>
        </div>
        <img src="../public/assets/uploads/images/motorcycles/h2r1.png" alt="">
    </div>

    <!-- Form Booking -->
    <div class="bgform">
        <div class="judul-form">RIDENOW</div>
        <div class="list-form">
            <div class="left-form">
                <div class="motor-picture"><img src="../public/assets/uploads/images/motorcycles/<?php echo $motorcycle['photo']; ?>" alt="">
                    <div class="merk-motor"><?php echo $motorcycle['name']; ?></div>
                    <div class="description"><?php echo $motorcycle['description']; ?></div>
                </div>
            </div>
            <form method="post" action="action/create_booking.php">
                <div class="right-form">
                    <div class="title-form">
                        <h1>Silahkan Isi Data Diri Anda</h1>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Name" name="customer_name" required>
                    </div>
                    <div class="input-box">
                        <input type="number" placeholder="Phone Number" name="phone_number" required>
                    </div>
                    <div class="input-box"> <input type="hidden" name="motorcycle_id" value="<?php echo htmlspecialchars($id); ?>" /> </div>
                    <div class="input-box">
                    <p><input placeholder="Start Date" type="text" name="start_date" required id="datepicker" onfocus="(this.type='date')" onblur="(this.type='text')" /></p>                    </div>
                    <div class="input-box">
                        <p><input id="duration" placeholder="Durasi (dalam hari)" type="number" name="duration" required oninput="calculateTotalPrice()" /></p>
                    </div>
                    <div class="input-box">
                        <select name="return_method" id="return_method" required onchange="updateTotalPrice()">
                            <option selected disabled>Metode Pengembalian</option>
                            <option value="Dikantor">Dikantor</option>
                            <option value="Dirumah">Dirumah</option>
                        </select>
                    </div>
                    <div class="input-box"> <input type="text" placeholder="Total Price" name="total_price" id="total_price" readonly required> </div>
                    <button type="submit" name="save" value="SAVE">
                        Submit
                        <i class="fa-solid fa-check"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>