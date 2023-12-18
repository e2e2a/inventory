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
                <p>Go to <a href="supplier-home.php">homepage</a></p>
            </form>
        </div>
    </div>
</body>
</html>