<?php
    include("../php/config.php");

// Get user ID from the URL parameters
$id = isset($_GET['userId']) ? $_GET['userId'] : null;

// Redirect to home.php if the user ID is not provided
if (empty($id)) {
    header("Location: register.php");
}
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $age = $_POST['age'];


    
    //prepare
    $stmt = $con->prepare("UPDATE users SET Username=:username, Email=:email, Age=:age WHERE Id=:id");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(0 != ($results)){
        echo "<div class='message'
        <p>Profile has been Updated!</p>
        </div> <br>";
        echo "<a href='home.php'><button class='btn'>Go Home</button></a>";
    }
    

    //unfinish task to delete users//


} else {
    
    $stmt = $con->prepare('SELECT * FROM users WHERE Id=:id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
        //create variable for the user information
        $res_Uname = $results['username'];
        $res_Email = $results['email'];
        $res_Age = $results['age'];
        $res_Uname = $results['username'];
    include_once '../templates/users/user-edit-list-template.php';
}
?>

