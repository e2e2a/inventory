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
                <input type="number" name="order_id" id="order_id" placeholder="Order Id" required/>
                <input type="number" name="product_id" id="product_id" placeholder="Product Id" required/>
                <input type="number" name="quantity" id="quantity" placeholder="Quantity" required/>
                <input type="number" name="total_amount" id="total_amount" placeholder="Total Amount" required/>
                <button type="submit" name="submit">Submit</button>
                <p>Go to <a href="home.php">homepage</a></p>
            </form>
        </div>
    </div>
</body>
</html>