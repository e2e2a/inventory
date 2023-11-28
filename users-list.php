<?php
    session_start();
    include("php/config.php");
$sql = "SELECT*FROM users";
$stmt = $con->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

 // Handle delete request
if (isset($_POST['delete'])) {
    $deleteId = $_POST['delete'];

    // Perform delete query
    //DELETE FROM {your database table} WHERE {column name} = {expected column value}
    //DELETE FROM users WHERE expired=yes
    //DELETE FROM users WHERE inactive=true
    //DELETE FROM users WHERE inactive=true and expired="yes"
    
    $stmt = $con->prepare("DELETE FROM users WHERE Id=:deleteId");
    $stmt->bindParam(':deleteId', $deleteId);
    if ($stmt->execute()){
            echo '<script>alert("Record deleted successfully.");</script>';
            echo '<script>
                    setTimeout(function(){
                        window.location.href = "users-list.php";
                    }, 250); // Delay of 250 milliseconds (0.25 second)
                </script>';
            exit;
        } else {
            echo "Error deleting record: " . $con->error;
        }
   
    
    
        
}
if (isset($_POST['edit'])) {
    $editId = $_POST['edit'];

    header("Location: edit-list.php?userId=" . $editId);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
    </style>

</head>

<body>
    <h2>Users List</h2>
    <?php
    if($result > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Age</th><th>Actions</th></tr>";
        foreach ($result as $row){
            echo "<tr>";
            echo "<td>". $row["Id"] . "</td>";
            echo "<td>". $row["Username"] . "</td>";
            echo "<td>". $row["Email"] . "</td>";
            echo "<td>". $row["Age"] . "</td>";
            echo "<td>
                    <form method='post'>
                        <button type='submit' name='edit' value='" . $row["Id"] . "'>Edit</button>
                        <button type='submit' name='delete' value='" . $row["Id"] . "'>Delete</button>
                        
                    </form>
                  </td>";
            
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No Users Found";
    }

    ?>

</body>

</html>

