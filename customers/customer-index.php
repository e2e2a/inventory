<?php
include '../php/config.php';
$stmt = $con->prepare('SELECT*FROM customers');
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
if(isset($_POST['search'])){
    $first_name = $_POST['first_name'];
    $stmt = $con->prepare("SELECT * FROM customers where first_name Like :first_name");
    $stmt->bindParam(':first_name', $first_name);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
if(isset($_POST['delete'])){
    $id = $_POST['delete'];
    $stmt = $con->prepare('DELETE FROM customers Where id=:id');
    $stmt->bindParam(':id', $id);
    if($stmt->execute()){
        echo "<script>alert('Customer Deleted!')</script>";
        echo "<script>setTimeout(function(){
            window.location.href = 'home.php';
        }, 5);</script>";
    }else{
        echo "<script>alert('Delete Failed!')</script>";
    }
}
if(isset($_POST['edit'])){
    $id = $_POST['edit'];
    header('location: customer-edit.php?customersId='. $id );
} else {
    include_once '../templates/customers/customer-index-template.php';
}
?>


