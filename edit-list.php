<?php
    include("php/config.php");

// Get user ID from the URL parameters
$id = isset($_GET['userId']) ? $_GET['userId'] : null;

// Redirect to home.php if the user ID is not provided
if (empty($id)) {
    header("Location: register.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Edit Profile</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a></p>
        </div>
        <div class="right-links">
            <a href="#">Change Profile</a>
            <a href="logout.php"><button class="btn">Log Out</button></a>
        </div>
    </div>
    <div class="container">
        <div class="box form-box">
            <?php 
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
                    $res_Uname = $results['Username'];
                    $res_Email = $results['Email'];
                    $res_Age = $results['Age'];
                    $res_Uname = $results['Username'];

                
            
            ?>


            <header>Change Profile</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $res_Uname; ?>" required>
                </div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="<?php echo $res_Email; ?>" required>
                </div>
                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" value="<?php echo $res_Age; ?>" required>
                </div>
                
                <div class="field">
                    <input type="submit" name="submit" class="btn" id="submit" value="Update" required>
                </div>

                <div class="field">
                    <input type="submit" name="delete" class="btn" id="delete" value="Delete" required>
                </div>
            </form>
        </div>

        <?php } ?>

    </div>
</body>
</html>