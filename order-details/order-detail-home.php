<?php
include '../php/config.php';
$stmt = $con->prepare("SELECT * FROM order_details");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
if(isset($_POST['search'])){
    $order_id = $_POST['order_id'];
    $stmt = $con->prepare("SELECT * FROM order_details where order_id Like :order_id");
    $stmt->bindParam(':order_id', $order_id);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
if(isset($_POST['delete'])){
    $id = $_POST['delete'];
    $stmt = $con->prepare('DELETE FROM order_details where id=:id');
    $stmt->bindParam(':id', $id);
    if($stmt->execute()){
        echo "<script>alert('ORDER DETAILS DELETED!'); </script>";
        echo "<script>setTimeout(function(){
            window.location.href = 'home.php' ;
         }, 25); 
         </script>";
         exit;
    } else{
        echo "<script>alert('FAILED TO DELETE!'); </script>";
    }
}
if(isset($_POST['edit'])){
    $id = $_POST['edit'];
    header('location: order_detail-edit.php?order_detailsId=' . $id);
} else {
    include_once '../templates/order-details/order-detail-index-template.php';
}
?>
