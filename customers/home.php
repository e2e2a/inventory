<?php
include '../php/config.php';
$stmt = $con->prepare('SELECT*FROM customers');
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
if(isset($_POST['search'])){
    $first_name = $_POST['first_name'];
    $stmt = $con->prepare("SELECT * FROM customers where first_name Like :first_name");
    $stmt->bindParam(':first_name', $first_name);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
if(isset($_POST['delete'])){
    $id = $_POST['delete'];
    $stmt = $con->prepare('DELETE FROM customers Where id=:id');
    $stmt->bindParam(':id', $id);
    if($stmt->execute()){
        echo "<script>alert('Customer Deleted!')</script>";
        echo "<script>setTimeout(function(){
            window.location.href = 'home.php';
        }, 5);</script>";
    }else{
        echo "<script>alert('Delete Failed!')</script>";
    }
}
if(isset($_POST['edit'])){
    $id = $_POST['edit'];
    header('location: edit.php?customersId='. $id );
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
                    <input type="text" name="first_name" id="first_name">
                    <button type="submit" name="search">search</button>
                </form>
            </div>

            <?php
            if($results > 0){
                echo "<table>";
                echo "<tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>address</th>
                    <th>Street</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Postal Code</th>
                    <th>Country</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>";
            
            foreach($results as $row){
                echo "<tr>";
                echo "<td>". $row['id'] ."</td>";
                echo "<td>". $row['first_name'] ."</td>";
                echo "<td>". $row['last_name'] ."</td>";
                echo "<td>". $row['email'] ."</td>";
                echo "<td>". $row['phone'] ."</td>";
                echo "<td>". $row['address'] ."</td>";
                echo "<td>". $row['street'] ."</td>";
                echo "<td>". $row['city'] ."</td>";
                echo "<td>". $row['state'] ."</td>";
                echo "<td>". $row['postal_code'] ."</td>";
                echo "<td>". $row['country'] ."</td>";
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