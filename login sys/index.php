<?PHP
require 'header.php';

// Start the session
// session_start();
?>


<main class="center">
    <?php
        if (isset($_SESSION['userId'])) {
        echo '<P> you are logged in !</p> <br>';
    } else {
        echo '<P> you are not logged in yet !</p> <br>';
    } ?>




</main>
<?php
require 'footer.php';

?>