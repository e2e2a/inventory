<?php
include '../php/config.php';
$stmt = $con->prepare('SELECT*FROM orders');
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
if(isset($_POST['search'])){
    $customer_id = $_POST['customer_id'];
    $stmt = $con->prepare("SELECT * FROM orders where customer_id Like :customer_id");
    $stmt->bindParam(':customer_id', $customer_id);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
if(isset($_POST['delete'])){
    $id = $_POST['delete'];
    $stmt = $con->prepare('DELETE FROM orders Where id=:id');
    $stmt->bindParam(':id', $id);
    if($stmt->execute()){
        echo "<script>alert('Order Deleted!')</script>";
        echo "<script>setTimeout(function(){
            window.location.href = 'home.php';
        }, 5);</script>";
    }else{
        echo "<script>alert('Delete Failed!')</script>";
    }
}
if(isset($_POST['edit'])){
    $id = $_POST['edit'];
    header('location: order-edit.php?orderId='. $id );
} else {
    include_once '../templates/orders/order-home-template.php';
}
?>


