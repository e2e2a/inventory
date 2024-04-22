<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="../public/css/style.css?v=<?php echo time(); ?>">
    <title>Home Page</title>
</head>


<body>
    <div class="nav">
        <div class="logo">
            <p><a href="user-home.php">Logo</a></p>
        </div>
        <div class="right-links">
            <?php 
            
            $id = $_SESSION['id'];
            
            $stmt = $con->prepare("SELECT * From users where Id=:id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
                $res_Uname = $results['username'];
                $res_Email = $results['email'];
                $res_Age = $results['age'];
                $res_id = $results['id'];
            echo "<a href='user-edit.php?'>$res_Email </a>";
            ?>




            <a href="user-logout.php"><button class="btn">Log Out</button></a>
        </div>
    </div>
    <main>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Hello <b><?php echo $res_Uname ?></b>, Welcome!</p>
                </div>
                <div class="box">
                    <p>Your email is <b><?php echo $res_Email ?></b></p>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <p>And you are <b><?php echo $res_Age ?> years old </b></p>
                </div>
            </div>
            <div class="link">
                <a href="#"><button type="button" class="btn">order</button></a>
                <a href="#"><button type="button" class="btn">Suppliers</button></a>
                <a href="#"><button type="button" class="btn">Customers</button></a>
            </div>
        </div>
    </main>
</body>

</html>