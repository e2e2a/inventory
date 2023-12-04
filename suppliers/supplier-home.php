<?php
include '../php/config.php';
$stmt = $con->prepare("SELECT * FROM suppliers");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
if(isset($_POST['search'])){
    $supplier_name = $_POST['supplier_name'];
    $stmt = $con->prepare("SELECT * FROM suppliers where supplier_name Like :supplier_name");
    $stmt->bindParam(':supplier_name', $supplier_name);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
if(isset($_POST['delete'])){
    $id = $_POST['delete'];
    $stmt = $con->prepare('DELETE FROM suppliers where id=:id');
    $stmt->bindParam(':id', $id);
    if($stmt->execute()){
        echo "<script>alert('SUPPLY DELETED!'); </script>";
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
    header('location: supplier-edit.php?suppliersId=' . $id);
}
else{
    include_once '../templates/suppliers/supplier-home-template.php';
}
?>
