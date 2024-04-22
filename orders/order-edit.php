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
} else {
    include_once '../templates/orders/order-edit-template.php';
}
?>

