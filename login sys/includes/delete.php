<?php
require 'dbh.inc.php';


if (isset($_GET['user_id'])) {
    $id = $_GET['user_id'];
    $sql = "DELETE FROM  users WHERE idUsers=$id";
    if (!$result = mysqli_query($conn, $sql)) {
        echo
            header("location: ../userstb.php?sqlerror&" . $id);
        exit();
    } else {
        header("location: ../userstb.php?rowid=" . $id);
        exit();
    }
}
