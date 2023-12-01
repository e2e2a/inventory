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
}
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
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../orders/style.css">
    <title>Edit Page</title>
</head>
<style>
    .order-form{
        margin:50px;
    }
</style>
<body>
    <div class="form-container">
        <div class="order-form">
            <form action="" method="post">
                <h1>CREATE ORDER</h1>
                <input type="text" name="supplier_name" id="supplier_name" placeholder="Supplier Name" value="<?php echo $res_supplier_name ?>" required/>
                <input type="text" name="contact_name" id="contact_name" placeholder="Contact Name" value="<?php echo $res_contact_name ?>" required/>
                <input type="text" name="contact_title" id="contact_title" placeholder="Contact Title" value="<?php echo $res_contact_title ?>" required/>
                <input type="text" name="address" id="address" placeholder="Address" value="<?php echo $res_address ?>" required/>
                <input type="text" name="street" id="street" placeholder="Street" value="<?php echo $res_street ?>" required/>
                <input type="text" name="city" id="city" placeholder="City" value="<?php echo $res_city ?>" required/>
                <input type="text" name="state" id="state" placeholder="State" value="<?php echo $res_state ?>" required/>
                <input type="text" name="postal_code" id="postal_code" placeholder="Postal Code" value="<?php echo $res_postal_code ?>" required/>
                <input type="text" name="country" id="country" placeholder="Country" value="<?php echo $res_country ?>" required/>
                <input type="number" name="phone" id="phone" placeholder="Phone" value="<?php echo $res_phone ?>" required/>
                <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $res_email ?>" required/>
                <input type="text" name="website" id="website" placeholder="Website" value="<?php echo $res_website ?>" required/>
                <button type="submit" name="submit">Submit</button>
                <p>Go to <a href="home.php">homepage</a></p>
            </form>
        </div>
    </div>
</body>
</html>