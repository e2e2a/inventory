<?php
include '../php/config.php';
if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postal_code = $_POST['postal_code'];
    $country = $_POST['country'];
    
    $stmt = $con->prepare("INSERT INTO customers(first_name,last_name,email,phone,address,street,city,state,postal_code,country) values(:first_name,:last_name,:email,:phone,:address,:street,:city,:state,:postal_code,:country)");
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':street', $street);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':state', $state);
    $stmt->bindParam(':postal_code', $postal_code);
    $stmt->bindParam(':country', $country);
    if($stmt->execute()){
        echo '<script>alert("INFORMATION SAVE!")</script>';
    }else{
        echo '<script>alert("FAILED TO SAVE!")</script>';
    }
} else {
    include_once '../templates/customers/customer-create-template.php';
}
?>

