<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Order Page</title>
</head>
<body>
    <div class="form-container">
        <div class="order-form">
            <form action="#" method="post">
                <h1>CREATE ORDER</h1>
                <input type="number" name="customer_id" id="customer_id" placeholder="Customer Id" required/>
                <input type="number" name="supplier_id" id="supplier_id" placeholder="Supplie Id" required/>
                <input type="text" name="shipping_address" id="shipping_address" placeholder="Shipping Address" required/>
                <input type="number" name="total_amount" id="total_amount" placeholder="Total Amount" required/>
                <input type="text" name="order_status" id="order_status" placeholder="Order Status" required/>
                <button type="submit" name="submit">Submit</button>
                <p>Go to <a href="home.php">homepage</a></p>
            </form>
        </div>
    </div>
</body>
</html>