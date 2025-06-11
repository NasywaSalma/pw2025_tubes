<?php
include '../koneksi.php';
require 'function.php';
$country = query("SELECT * FROM checkoutcountry");

$vehicle_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name1      = $_POST['first_name'];
    $name2      = $_POST['last_name'];
    $license    = $_POST['draving_license'];
    $address0   = $_POST['address0'];
    $address1   = $_POST['address1'];
    $city       = $_POST['town_city'];
    $zip        = $_POST['pastcode_zip'];
    $country    = $_POST['country_state'];
    $email      = $_POST['email'];
    $phone      = $_POST['phone'];
    $note       = $_POST['note'];
    $date       = date('Y-m-d H:i:s');

    $sql = "INSERT INTO orders 
    (vehicle_id, first_name, last_name, draving_license, address0, address1, `town/city`, `pastcode/zip`, `country/state`, email, phone, note, order_date)
    VALUES 
    ('$vehicle_id', '$name1', '$name2', '$license', '$address0', '$address1', '$city', '$zip', '$country', '$email', '$phone', '$note', '$date')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Pesanan berhasil dikirim!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Checkout Only</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    :root {
      --yellow: #fdd835;
      --light-yellow: #fff9c4;
      --black: #000;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background: #fff;
      color: #333;
    }

    .checkout-container {
      padding: 2rem;
      max-width: 1200px;
      margin: auto;
    }

    .checkout-container h2 {
      font-size: 36px;
      margin-bottom: 10px;
    }

    .login-note {
      margin-bottom: 2rem;
    }

    .checkout-content {
      display: flex;
      gap: 2rem;
      flex-wrap: wrap;
    }

    .billing-form, .cart-summary {
      flex: 1;
      min-width: 300px;
    }

    .billing-form h3 {
      margin-bottom: 1rem;
    }

    .billing-form label,
    .cart-summary p,
    .cart-summary label {
      display: block;
      margin: 1rem 0 0.5rem;
    }

    .billing-form input,
    .billing-form select,
    .billing-form textarea {
      width: 100%;
      padding: 0.5rem;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .billing-form .btn {
       width: 100%;
      padding: 1rem;
      background: var(--black);
      color: white;
      border: none;
      margin-top: 1rem;
      cursor: pointer;
      font-weight: bold;
      border-radius: 4px; 
    }

    .billing-form .row {
      display: flex;
      gap: 1rem;
    }

    .options {
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
      margin-top: 1rem;
    }

    .cart-summary {
      border: 1px solid #ddd;
      padding: 1rem;
      border-radius: 4px;
    }

    .cart-summary span,
    .cart-summary strong {
      float: right;
    }

    .cart-summary img {
      width: 100%;
      padding: 1rem;
      border: none;
      margin-top: 1rem;
      cursor: pointer;
      font-weight: bold;
      border-radius: 4px;
      display: block;
    }

    a {
      color: var(--yellow);
      text-decoration: none;
    }
  </style>
</head>
<body>

  <main class="checkout-container">
    <h2>Lamborgini Revuelto <?= $vehicle_id ?> </h2>
    <p class="login-note">Customer</p>

    <div class="checkout-content">
      <!-- Billing Info -->
    <form class="billing-form" method="POST" action="">
    <h3>Billing Info</h3>

    <label>Country
        <select name="country_state">
            <?php foreach ($country as $mhs): ?>
                <option value="<?= htmlspecialchars($mhs['country']); ?>">
                    <?= htmlspecialchars($mhs['country']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>

    <div class="row">
        <label>First Name
            <input type="text" name="first_name" required>
        </label>
        <label>Last Name
            <input type="text" name="last_name" required>
        </label>
    </div>

    <label>payment
         <select name="payment">
                <option value="">Pilih Metode Pembayaran</option>
                <option name="draving_license" required>Direct Bank Transfer</option>
                <option name="draving_license" required> Cheque Payment</option>
                <option name="draving_license" required> cash</option>
            
        </select>       
    </label>

    <label>Address
        <input type="text" name="address0" placeholder="Street address" required>
    </label>
    <label>
        <input type="text" name="address1" placeholder="Apartment, suite, etc. (optional)">
    </label>

    <div class="row">
        <label>Town / City
            <input type="text" name="town_city" required>
        </label>
        <label>Postcode / Zip
            <input type="text" name="pastcode_zip" required>
        </label>
    </div>

    <div class="row">
        <label>State / Country
            <input type="text" name="country_state">
        </label>
        <label>Email Address
            <input type="email" name="email" required>
        </label>
    </div>

    <label>Phone
        <input type="text" name="phone" required>
    </label>

    <div class="options">
        <label><input type="checkbox"> Create an account?</label>
        <label><input type="checkbox"> Ship to a different address?</label>
    </div>

    <label>Order Notes
        <textarea name="note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
    </label>

    <input type="hidden" name="order_date" value="<?= date('Y-m-d H:i:s'); ?>">

    <button type="submit" class="btn">Place Order</button>
</form>


      <div class="cart-summary">
        <h3>Cart Totals</h3>
        <p>Cart Subtotal: <span>$67,000</span></p>
        <p>Shipping and Handling: <span>Free Shipping</span></p>
        <p>Order Total: <strong>$67,000</strong></p>

        <h4>Payment Method</h4>
        <label><input type="radio" name="payment"> Direct Bank Transfer</label>
        <label><input type="radio" name="payment"> Cheque Payment</label>
        <label><input type="radio" name="payment"> PayPal</label>

        <label><input type="checkbox"> I have read and accept the Terms & Conditions</label>
        <img src="../../img/3.jpg" alt="">
      </div>
    </div>
  </main>
  

</body>
</html>