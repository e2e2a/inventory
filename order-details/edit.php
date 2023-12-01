<?php
include '../php/config.php';
$id = isset($_GET['order_detailsId']) ? ($_GET['order_detailsId']): null;



if(isset($_POST['submit'])){
    $order_id = $_POST['order_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $total_amount = $_POST['total_amount'];
    $stmt = $con->prepare("UPDATE order_details SET order_id=:order_id,product_id=:product_id,quantity=:quantity,total_amount=:total_amount where id=:id");
    $stmt->bindParam(':order_id', $order_id);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':total_amount', $total_amount);
    $stmt->bindParam(':id', $id);
    if($stmt->execute()){
        echo "<script>alert('DETAILS UPDATED!'); </script>";
    } else {
        echo "<script>alert('UPDATE FAILED!'); </script>";
    }
}
$stmt = $con->prepare('SELECT * FROM order_details where id=:id');
$stmt->bindParam(':id', $id);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
    $res_order_id = $result['order_id'];
    $res_product_id = $result['product_id'];
    $res_quantity = $result['quantity'];
    $res_total_amount = $result['total_amount'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../orders/style.css">
    <title>Edit Page</title>
</head>
<body>
    <div class="form-container">
        <div class="order-form">
            <form action="" method="post">
                <h1>CREATE ORDER</h1>
                <input type="number" name="order_id" id="order_id" placeholder="Order Id" value="<?php echo $res_order_id ?>" required/>
                <input type="number" name="product_id" id="product_id" placeholder="Product Id" value="<?php echo $res_product_id ?>" required/>
                <input type="text" name="quantity" id="quantity" placeholder="Quantity" value="<?php echo $res_quantity ?>" required/>
                <input type="number" name="total_amount" id="total_amount" placeholder="Total Amount" value="<?php echo $res_total_amount ?>" required/>
                <button type="submit" name="submit">Submit</button>
                <p>Go to <a href="home.php">homepage</a></p>
            </form>
        </div>
    </div>
</body>
</html>