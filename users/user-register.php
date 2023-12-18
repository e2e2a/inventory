<?php

include("php/config.php");
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    
    //verifying the unique email
    
    $stmt = $con->prepare("SELECT Email From users WHERE Email=:a");
    $stmt->bindParam(':a', $email);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $num_rows = count($results);
    if($num_rows !=0) {
        echo "<div class='message'>
                <p>This email is used, Try another One please!</p>
                </div> <br>";
        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
    } else {
        $sql = "INSERT INTO users(Username,Email,Age,Password) VALUES(:username,:email,:age,:password)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':password', $password);
        if($stmt->execute()) {
            echo "<div class='message'
                <p>Registration Success!</p>
                </div> <br>";
            echo "<a href='index.php'><button class='btn'>Login Now!</button></a>";
        } else {
            echo "<div class='message'
                <p>Registration Failed!</p>
                </div> <br>";
        }
    }
} else {
    include_once '../templates/users/user-register-template.php';
}