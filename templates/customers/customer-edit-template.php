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