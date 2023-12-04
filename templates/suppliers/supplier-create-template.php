<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../orders/style.css">
    <title>Create Page</title>
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
                <input type="text" name="supplier_name" id="supplier_name" placeholder="Supplier Name" required/>
                <input type="text" name="contact_name" id="contact_name" placeholder="Contact Name" required/>
                <input type="text" name="contact_title" id="contact_title" placeholder="Contact Title" required/>
                <input type="text" name="address" id="address" placeholder="Address" required/>
                <input type="text" name="street" id="street" placeholder="Street" required/>
                <input type="text" name="city" id="city" placeholder="City" required/>
                <input type="text" name="state" id="state" placeholder="State" required/>
                <input type="text" name="postal_code" id="postal_code" placeholder="Postal Code" required/>
                <input type="text" name="country" id="country" placeholder="Country" required/>
                <input type="number" name="phone" id="phone" placeholder="Phone" required/>
                <input type="email" name="email" id="email" placeholder="Email" required/>
                <input type="text" name="website" id="website" placeholder="Website" required/>
                <button type="submit" name="submit">Submit</button>
                <p>Go to <a href="supplier-home.php">homepage</a></p>
            </form>
        </div>
    </div>
</body>
</html>