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
}else{
$stmt = $con->prepare('SELECT * FROM order_details where id=:id');
$stmt->bindParam(':id', $id);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
    $res_order_id = $result['order_id'];
    $res_product_id = $result['product_id'];
    $res_quantity = $result['quantity'];
    $res_total_amount = $result['total_amount'];
    include_once '../templates/order-details/order_detail-edit-template.php';

}
?>


