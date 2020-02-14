<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <nav>

        <ul>
            <li> <a href="#">
                    <img src="images/logo.png" alt="oiu logo">
                </a></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">Portflio</a></li>
            <li><a href="#">About Us</a></li>
            <?php
            if(isset($_SESSION['userId'])){
                echo  '<li><a href="userstb.php">Admin Dashboard</a></li>';
            }
            ?>
        </ul>
        <div>
            <?php
            if (isset($_SESSION['userId'])) {
                echo '<form action="includes/logout.php" method="POST">
               <button type="submit" name="outsub"  id="logout">logout</button>
               </form>';
            } else {
                echo '
                <a href="signup.php" class="righty">Sign Up here |</a>
                <form action="includes/login.php" method="POST">
                    <button type="submit" name="insub" class="righty" id="login"> login </button>
                    <input type="password" name="Upwd" placeholder="Password" class="righty" id="login">
                    <input type="text" name="Umailid" placeholder="Username or Email" class="righty" id="login">
                </form>';
            } ?>


        </div>
    </nav>

</body>

</html>