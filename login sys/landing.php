<?PHP
require 'header.php';

// Start the session
// session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css">
    <script src="https://kit.fontawesome.com/99a50a653e.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <title>Web site under maintaince | our site </title>
</head>

<body class=".body">

    <main class="center">
        <?php
        if (isset($_SESSION['userId'])) {
            echo '
        <div>
        <h1 id="2"> <i class="far fa-meh"></i> 
        <P> you are logged in !</p> <br>
        Our site is  under maintaince</h1>
    </div>
    
        
        
        
        
        ';
        } else {
            echo '<P> you are not logged in yet !</p> <br>';
        } ?>




    </main>
    <?php
    require 'footer.php';

    ?>

</body>

</html>