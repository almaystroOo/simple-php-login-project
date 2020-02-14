<?php
require "includes/dbh.inc.php";
require 'header.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .center {
            text-align: center;
            margin-left: width/2;
            margin-top: height/2;
        }

        .tab {
            margin-left: auto;
            margin-right: auto;
        }

        span {
            color: red;
            text-decoration: currentColor;
            font-style: italic;
        }
    </style>
    <title>Document</title>

</head>

<body>
    <?php
    if (isset($_GET['user_id'])) {
        $id = $_GET['user_id'];
        $sql = "SELECT  * FROM  users WHERE idUsers=$id";
        if ($result = mysqli_query($conn, $sql)) {
            // $stmt = mysqli_stmt_init($conn);
            // if (!mysqli_stmt_prepare($stmt, $sql)) {
            //     header("location: userstb.php?error=sqlerror&" . $email);
            //     exit();
            // } else {
            echo '<span>

        <h2 class="center">Are you sure you want to <span> delete </span> this row ?!</h2>
    </span>
    <table class="tab">
        <tr>
            <th>user ID</th>
            <th>Username </th>
            <th>User E-mail</th>
            <th>Actions </th>

        </tr>';
            while ($row = mysqli_fetch_array($result)) {


                echo  "<tr>
        <td>{$row['idUsers']}</td>
        <td>{$row['uidUser']}</td>
        <td>{$row['emailUser']}</td>
    " . "<td> <a href='includes/delete.php?user_id={$row['idUsers']}'><span>Delete</span></a> </td>";
            }
        }
        mysqli_close($conn);
    }else{

    echo '<h1 class="center"> Error : you should go back to Admin Dashboard </h1>';

    }

    ?>


</body>


</html>