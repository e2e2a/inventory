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