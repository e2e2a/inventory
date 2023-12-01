<?php
include ('../php/config.php');
$id = isset($_GET['orderId']) ? ($_GET['orderId']): null;
$stmt=$con->prepare("SELECT * FROM orders where id=:id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
    $res_customer_id = $result['customer_id'];
    $res_supplier_id = $result['supplier_id'];
    $res_shipping_address = $result['shipping_address'];
    $res_total_amount = $result['total_amount'];
    $res_order_status = $result['order_status'];
    
if(isset($_POST['submit'])){
    $customer_id = $_POST['customer_id'];
    $supplier_id = $_POST['supplier_id'];
    $shipping_address = $_POST['shipping_address'];
    $total_amount = $_POST['total_amount'];
    $order_status = $_POST['order_status'];

    $stmt = $con->prepare("UPDATE orders SET customer_id=:customer_id,supplier_id=:supplier_id,shipping_address=:shipping_address,total_amount=:total_amount,order_status=:order_status WHERE id=:id");
    $stmt->bindParam(':customer_id', $customer_id);
    $stmt->bindParam(':supplier_id', $supplier_id);
    $stmt->bindParam(':shipping_address', $shipping_address);
    $stmt->bindParam(':total_amount', $total_amount);
    $stmt->bindParam(':order_status', $order_status);
    $stmt->bindParam(':id', $id);
    if($stmt->execute()){
        echo '<script>alert("Order Updated!")</script>';
    }else{
        echo '<script>alert("Update Failed!")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit Page</title>
</head>
<body>
    <div class="form-container">
        <div class="order-form">
            <form action="" method="post">
                <h1>CREATE ORDER</h1>
                <input type="number" name="customer_id" id="customer_id" placeholder="Customer Id" value="<?php echo $res_customer_id ?>" required/>
                <input type="number" name="supplier_id" id="supplier_id" placeholder="Supplie Id" value="<?php echo $res_supplier_id ?>" required/>
                <input type="text" name="shipping_address" id="shipping_address" placeholder="Shipping Address" value="<?php echo $res_shipping_address ?>" required/>
                <input type="number" name="total_amount" id="total_amount" placeholder="Total Amount" value="<?php echo $res_total_amount ?>" required/>
                <input type="text" name="order_status" id="order_status" placeholder="Order Status" value="<?php echo $res_order_status ?>" required/>
                <button type="submit" name="submit">Submit</button>
                <p>Go to <a href="home.php">homepage</a></p>
            </form>
        </div>
    </div>
</body>
</html>