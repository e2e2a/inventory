<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit Page</title>
</head>
<body>
    <div class="form-container">
        <div class="order-form">
            <form action="" method="post">
                <h1>CREATE ORDER</h1>
                <input type="number" name="customer_id" id="customer_id" placeholder="Customer Id" value="<?php echo $res_customer_id ?>" required/>
                <input type="number" name="supplier_id" id="supplier_id" placeholder="Supplie Id" value="<?php echo $res_supplier_id ?>" required/>
                <input type="text" name="shipping_address" id="shipping_address" placeholder="Shipping Address" value="<?php echo $res_shipping_address ?>" required/>
                <input type="number" name="total_amount" id="total_amount" placeholder="Total Amount" value="<?php echo $res_total_amount ?>" required/>
                <input type="text" name="order_status" id="order_status" placeholder="Order Status" value="<?php echo $res_order_status ?>" required/>
                <button type="submit" name="submit">Submit</button>
                <p>Go to <a href="home.php">homepage</a></p>
            </form>
        </div>
    </div>
</body>
</html>