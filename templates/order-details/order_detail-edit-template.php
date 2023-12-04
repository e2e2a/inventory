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
                <input type="number" name="order_id" id="order_id" placeholder="Order Id" value="<?php echo $res_order_id ?>" required/>
                <input type="number" name="product_id" id="product_id" placeholder="Product Id" value="<?php echo $res_product_id ?>" required/>
                <input type="text" name="quantity" id="quantity" placeholder="Quantity" value="<?php echo $res_quantity ?>" required/>
                <input type="number" name="total_amount" id="total_amount" placeholder="Total Amount" value="<?php echo $res_total_amount ?>" required/>
                <button type="submit" name="submit">Submit</button>
                <p>Go to <a href="home.php">homepage</a></p>
            </form>
        </div>
    </div>
</body>
</html>