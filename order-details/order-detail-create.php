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
} else {
    include_once '../templates/order-details/order-detail-create-template.php';
}
?>

