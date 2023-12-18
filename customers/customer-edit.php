<?php
include '../php/config.php';
$id = isset($_GET['customersId']) ? ($_GET['customersId']): null;



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
    $stmt = $con->prepare("UPDATE customers SET first_name=:first_name,last_name=:last_name,email=:email,phone=:phone,address=:address,street=:street,city=:city,state=:state,postal_code=:postal_code,country=:country where id=:id");
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
    $stmt->bindParam(':id', $id);
    if($stmt->execute()){
        echo "<script>alert('INFORMATION UPDATED!'); </script>";
    } else {
        echo "<script>alert('UPDATE FAILED!'); </script>";
    }
} else {
$stmt = $con->prepare('SELECT * FROM customers where id=:id');
$stmt->bindParam(':id', $id);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
    $res_first_name = $result['first_name'];
    $res_last_name = $result['last_name'];
    $res_email = $result['email'];
    $res_phone = $result['phone'];
    $res_address = $result['address'];
    $res_street = $result['street'];
    $res_city = $result['city'];
    $res_state = $result['state'];
    $res_postal_code = $result['postal_code'];
    $res_country = $result['country'];
    include_once '../templates/customers/customer-edit-template.php';

}
?>


