<?PHP
require 'header.php';
//include 'includes/signnup.sc.php';
?>

<main class="center">
    <?php
    if (isset($_SESSION['userId'])) {
        echo ' <P> you are logged in already  !</p> <br>
    
    ';
    } else {
        echo '
        Signup <br id="gap">
        <form action="includes/signnup.sc.php" method="post" id="gap">
            <input type="text" name="userlid" id="" placeholder="username" id="gap"><br>
            <input type="email" name="mailid" id="" placeholder="email " id="gap"><br>
            <input type="password" name="userpwd" placeholder="Password" id="gap"><br>
            <input type="password" name="re-userpwd" placeholder="repeat Password" id="gap"><br>
            <button type="submit" name="sisub">Signup</button>
              
    
        </form>';
    } ?>

</main>
<?php
require 'footer.php';

?>