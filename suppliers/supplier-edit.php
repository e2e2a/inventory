<?php
include '../php/config.php';
$id = isset($_GET['suppliersId']) ? ($_GET['suppliersId']): null;



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
    $stmt = $con->prepare("UPDATE suppliers SET supplier_name=:supplier_name,contact_name=:contact_name,contact_title=:contact_title,address=:address,street=:street,city=:city,state=:state,postal_code=:postal_code,country=:country,phone=:phone,email=:email,website=:website where id=:id");
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
    $stmt->bindParam(':id', $id);
    if($stmt->execute()){
        echo "<script>alert('DETAILS UPDATED!'); </script>";
    } else {
        echo "<script>alert('UPDATE FAILED!'); </script>";
    }
}else{
    

$stmt = $con->prepare('SELECT * FROM suppliers where id=:id');
$stmt->bindParam(':id', $id);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
    $res_supplier_name = $result['supplier_name'];
    $res_contact_name = $result['contact_name'];
    $res_contact_title = $result['contact_title'];
    $res_address = $result['address'];
    $res_street = $result['street'];
    $res_city = $result['city'];
    $res_state = $result['state'];
    $res_postal_code = $result['postal_code'];
    $res_country = $result['country'];
    $res_phone = $result['phone'];
    $res_email = $result['email'];
    $res_website = $result['website'];
    include_once '../templates/suppliers/supplier-edit-template.php';

}
?>


