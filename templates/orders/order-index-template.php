<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home Page</title>
</head>
<style>
    table{
        text-align:center;
    }
</style>
<body>
    <header class="header">
        <div class="logo">
            <h1><span>L</span>O<span>G</span>O</h1>
        </div>
        <div class="list">
            <a href="#">HOME</a>
            <a href="#">HOME</a>
            <a href="#">HOME</a>
            <a href="#">HOME</a>
        </div>
    </header>

    <div class="main">
        <div class="top">
            <div class="order">
                <h1>Hello, Friend!</h1>
                <a href="create.php">Order Now!</a>
            </div>
        </div>

        <div class="table">
            <hr />
            <h2>Orders Table</h2>
            <hr />
            <div class="search_input">
                <form action="" method="post">
                    <label for="search">Seach:</label>
                    <input type="number" name="customer_id" id="customer_id">
                    <button type="submit" name="search">search</button>
                </form>
            </div>

            <?php
            if($results > 0){
                echo "<table>";
                echo "<tr>
                    <th>Id</th>
                    <th>Customer Id</th>
                    <th>supplier Id</th>
                    <th>Shipping Address</th>
                    <th>Total Amount</th>
                    <th>Order Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>";
            
            foreach($results as $row){
                echo "<tr>";
                echo "<td>". $row['id'] ."</td>";
                echo "<td>". $row['customer_id'] ."</td>";
                echo "<td>". $row['supplier_id'] ."</td>";
                echo "<td>". $row['shipping_address'] ."</td>";
                echo "<td>". $row['total_amount'] ."</td>";
                echo "<td>". $row['order_status'] ."</td>";
                echo "<td>". $row['created_at'] ."</td>";
                echo "<td>". $row['updated_at'] ."</td>";
                echo "<td>
                    <form action='' method='post'>
                        <button type='submit' name='edit' value='". $row['id'] ."'>Edit</button>
                        <button type='submit' name='delete' value='". $row['id'] ."'>Delete</button>
                    </form>
                </td>";
                echo "</tr>";
            }
            echo "</table>";
        }
            ?>

            
                
            </table>
        </div>
    </div>

</body>

</html>