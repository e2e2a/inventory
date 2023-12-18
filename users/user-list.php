<?php
    session_start();
    include("../php/config.php");
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

    header("Location: user-edit-list.php?userId=" . $editId);
}
else {
    include_once '../templates/users/user-list-template.php';
}
?>





