<?php
include '../php/config.php';
session_start();
if(isset($_POST['submit'])){
    
    $supplier_name = $_POST['supplier_name'];
    $contact_name = $_POST['contact_name'];
    $contact_title = $_POST['contact_title'];
    $address = $_POST['address'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postal_code = $_POST['postal_code'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    
    $stmt = $con->prepare("INSERT INTO suppliers(supplier_name,contact_name,contact_title,address,street,city,state,postal_code,country,phone,email,website) values(:supplier_name,:contact_name,:contact_title,:address,:street,:city,:state,:postal_code,:country,:phone,:email,:website)");
    $stmt->bindParam(':supplier_name', $supplier_name);
    $stmt->bindParam(':contact_name', $contact_name);
    $stmt->bindParam(':contact_title', $contact_title);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':street', $street);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':state', $state);
    $stmt->bindParam(':postal_code', $postal_code);
    $stmt->bindParam(':country', $country);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':website', $website);

    $log = [];
    if($stmt->execute()){
        $log = ['type' => 'info', 'message' => 'Supplier saved successfully'];
        $_SESSION['log'][] = $log; // push the new log to session
       // get the id of the data that just got inserted
       $id = $con->lastInsertId();
       header('Location: /suppliers/supplier.php?suppliersId=' . $id);
       exit();
    } else {
        $log = ['type' => 'error', 'message' => 'Failed to save supplier data'];
        $_SESSION['log'][] = $log; // push the new log to session
    }
} else {
    include_once '../templates/suppliers/supplier-create-template.php';
}
?>