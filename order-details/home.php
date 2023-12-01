<?php
include '../php/config.php';
$stmt = $con->prepare("SELECT * FROM order_details");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
if(isset($_POST['search'])){
    $order_id = $_POST['order_id'];
    $stmt = $con->prepare("SELECT * FROM order_details where order_id Like :order_id");
    $stmt->bindParam(':order_id', $order_id);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
if(isset($_POST['delete'])){
    $id = $_POST['delete'];
    $stmt = $con->prepare('DELETE FROM order_details where id=:id');
    $stmt->bindParam(':id', $id);
    if($stmt->execute()){
        echo "<script>alert('ORDER DETAILS DELETED!'); </script>";
        echo "<script>setTimeout(function(){
            window.location.href = 'home.php' ;
         }, 25); 
         </script>";
         exit;
    } else{
        echo "<script>alert('FAILED TO DELETE!'); </script>";
    }
}
if(isset($_POST['edit'])){
    $id = $_POST['edit'];
    header('location: edit.php?order_detailsId=' . $id);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../orders/style.css">
    <title>Home Page</title>
</head>
<style>
    
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
                    <input type="number" name="order_id" id="order_id">
                    <button type="submit" name="search">search</button>
                </form>
            </div>
            <?php
            if($results > 0){
                echo "<table>";
                echo "<tr>
                    <th>Id</th>
                    <th>Order Id</th>
                    <th>Product Id</th>
                    <th>Quantity</th>
                    <th>Total Amount</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>";
            
            foreach($results as $row){
                echo "<tr>";
                echo "<td>". $row['id'] ."</td>";
                echo "<td>". $row['order_id'] ."</td>";
                echo "<td>". $row['product_id'] ."</td>";
                echo "<td>". $row['quantity'] ."</td>";
                echo "<td>". $row['total_amount'] ."</td>";
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