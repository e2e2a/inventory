<?php
include '../php/config.php';
if(isset($_POST['submit'])){
    $order_id = $_POST['order_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $total_amount = $_POST['total_amount'];
    
    $stmt = $con->prepare("INSERT INTO order_details(order_id,product_id,quantity,total_amount) values(:order_id,:product_id,:quantity,:total_amount)");
    $stmt->bindParam(':order_id', $order_id);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':total_amount', $total_amount);
    if($stmt->execute()){
        echo '<script>alert("ORDER DETAILS SAVE!")</script>';
    }else{
        echo '<script>alert("ORDER DETAILS FAILED!")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../orders/style.css">
    <title>Create Page</title>
</head>
<body>
    <div class="form-container">
        <div class="order-form">
            <form action="" method="post">
                <h1>CREATE ORDER</h1>
                <input type="number" name="order_id" id="order_id" placeholder="Order Id" required/>
                <input type="number" name="product_id" id="product_id" placeholder="Product Id" required/>
                <input type="number" name="quantity" id="quantity" placeholder="Quantity" required/>
                <input type="number" name="total_amount" id="total_amount" placeholder="Total Amount" required/>
                <button type="submit" name="submit">Submit</button>
                <p>Go to <a href="home.php">homepage</a></p>
            </form>
        </div>
    </div>
</body>
</html>