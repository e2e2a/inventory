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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../orders/style.css">
    <title>Create Page</title>
</head>
<body>
    <div class="form-container">
        <div class="order-form">
            <form action="" method="post">
                <h1>CREATE ORDER</h1>
                <input type="text" name="first_name" id="first_name" placeholder="First Name" required/>
                <input type="text" name="last_name" id="last_name" placeholder="Last Name" required/>
                <input type="email" name="email" id="email" placeholder="Email" required/>
                <input type="number" name="phone" id="phone" placeholder="Phone" required/>
                <input type="text" name="address" id="address" placeholder="Address" required/>
                <input type="text" name="street" id="street" placeholder="Street" required/>
                <input type="text" name="city" id="city" placeholder="City" required/>
                <input type="text" name="state" id="state" placeholder="State" required/>
                <input type="text" name="postal_code" id="postal_code" placeholder="Postal Code" required/>
                <input type="text" name="country" id="country" placeholder="Country" required/>
                <button type="submit" name="submit">Submit</button>
                <p>Go to <a href="home.php">homepage</a></p>
            </form>
        </div>
    </div>
</body>
</html>