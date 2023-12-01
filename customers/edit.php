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
}
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
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../orders/style.css">
    <title>Edit Page</title>
</head>
<body>
    <div class="form-container">
        <div class="order-form">
            <form action="" method="post">
                <h1>CREATE ORDER</h1>
                <input type="text" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $res_first_name ?>" required/>
                <input type="text" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $res_last_name ?>" required/>
                <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $res_email ?>" required/>
                <input type="number" name="phone" id="phone" placeholder="Phone" value="<?php echo $res_phone ?>" required/>
                <input type="text" name="address" id="address" placeholder="Address" value="<?php echo $res_address ?>" required/>
                <input type="text" name="street" id="street" placeholder="Street" value="<?php echo $res_street ?>" required/>
                <input type="text" name="city" id="city" placeholder="City" value="<?php echo $res_city ?>" required/>
                <input type="text" name="state" id="state" placeholder="State" value="<?php echo $res_state ?>" required/>
                <input type="text" name="postal_code" id="postal_code" placeholder="Postal Code" value="<?php echo $res_postal_code ?>" required/>
                <input type="text" name="country" id="country" placeholder="Country" value="<?php echo $res_country ?>" required/>
                <button type="submit" name="submit">Submit</button>
                <p>Go to <a href="home.php">homepage</a></p>
            </form>
        </div>
    </div>
</body>
</html>