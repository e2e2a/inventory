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
} else {
    include_once '../templates/orders/order-create-template.php';
}
?>

