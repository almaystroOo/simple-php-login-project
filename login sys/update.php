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
            $row = mysqli_fetch_array($result);
            // $row['idUsers'] = $ro[1];
            // $row['uidUser'] = $ro[2];
            // $row['emailUser'] = $ro[3];
            echo ' <div class="center">
            Signup <br id="gap">'.
          "  <form action='includes/update.php?user_id={$row['idUsers']}' method='post' id='gap'>" .
                "<input type='text' name='userlid'  value='{$row['uidUser']}' id='gap'><br>" .
                "<input type='email' name='mailid'  value='{$row['emailUser'] }' id='gap'><br>" .
                '<input type="password" name="userpwd" placeholder="Password" id="gap"><br>' .
                ' <input type="password" name="re-userpwd" placeholder="repeat Password" id="gap"><br>' .
                '  <button type="submit" name="sisub">Update</button>
                  
        
            </form>
            </div>
            ';
            //         while ($row = mysqli_fetch_array($result)) {


            //             echo  "<tr>
            //     <td>{$row['idUsers']}</td>
            //     <td>{$row['uidUser']}</td>
            //     <td>{$row['emailUser']}</td>
            // " . "<td> <a href='includes/delete.php?user_id={$row['idUsers']}'><span>Delete</span></a> </td>";
            //         }
        }
        mysqli_close($conn);
    } else {

        echo '<h1 class="center"> Error : you should go back to Admin Dashboard </h1>';
    }

    ?>


</body>


</html>