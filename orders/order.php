<?php
include '../php/config.php';
if(isset($_POST['submit'])){
    $customer_id = $_POST['customer_id'];
    $supplier_id = $_POST['supplier_id'];
    $shipping_address = $_POST['shipping_address'];
    $total_amount = $_POST['total_amount'];
    $order_status = $_POST['order_status'];
    $stmt = $con->prepare("INSERT INTO orders(customer_id,supplier_id,shipping_address,total_amount,order_status) values(:customer_id,:supplier_id,:shipping_address,:total_amount,:order_status)");
    $stmt->bindParam(':customer_id', $customer_id);
    $stmt->bindParam(':supplier_id', $supplier_id);
    $stmt->bindParam(':shipping_address', $shipping_address);
    $stmt->bindParam(':total_amount', $total_amount);
    $stmt->bindParam(':order_status', $order_status);
    if($stmt->execute()){
        echo '<script>alert("ORDER SAVE!")</script>';
    }else{
        echo '<script>alert("ORDER FAILED!")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Order Page</title>
</head>
<body>
    <div class="form-container">
        <div class="order-form">
            <form action="#" method="post">
                <h1>CREATE ORDER</h1>
                <input type="number" name="customer_id" id="customer_id" placeholder="Customer Id" required/>
                <input type="number" name="supplier_id" id="supplier_id" placeholder="Supplie Id" required/>
                <input type="text" name="shipping_address" id="shipping_address" placeholder="Shipping Address" required/>
                <input type="number" name="total_amount" id="total_amount" placeholder="Total Amount" required/>
                <input type="text" name="order_status" id="order_status" placeholder="Order Status" required/>
                <button type="submit" name="submit">Submit</button>
                <p>Go to <a href="home.php">homepage</a></p>
            </form>
        </div>
    </div>
</body>
</html>