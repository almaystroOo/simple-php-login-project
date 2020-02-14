<?php
require 'includes/dbh.inc.php';

require 'header.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
    <style>
        .centwer {
            text-align: center;
            /* margin-right: width/2; */
            margin-top: height/3;
            margin-bottom: width/2;
        }

        .tab {
            margin-left: auto;
            margin-right: auto;
        }

        .spa {
            color: red;
            text-decoration: currentColor;
            font-style: italic;
        }

        .col {
            width: auto;
        }
    </style>
</head>

<body>

    <?php
    if (isset($_GET['rowid'])) {
        $id = $_GET['rowid'];
        echo '<h2 class="center"> row number '
            . $id . ' deleted successfuly ! </h2>';
    }
    if (isset($_GET['user_id'])) {
        $up = $_GET['user_id'];
        echo '<h2 class="center"> row number '
            . $up . ' updated  successfuly ! </h2>';
    }
    if (isset($_SESSION['userId'])) {
        $query = "SELECT * FROM users ";

        if ($result = mysqli_query($conn, $query)) {
            echo '<span>

             <h2 class="center">Users Datasheet</h2>
         </span>
         <table class="tab">
             <tr>
                 <th>user ID</th>
                 <th>Username </th>
                 <th>User E-mail</th>
                 <th class="col">Actions  <br> </th>
                 
     
             </tr>';
            /* fetch associative array */
            while ($row = mysqli_fetch_array($result)) {
                // session_start();
                // $_SESSION['deletesub'] =  $row['emailUser'];

                //   
                $IDU = $row['idUsers'];
                // $decrypt = password_($pass);
                //         $pass = $row['idUsers'];
                echo  "<tr>
                <td>{$row['idUsers']}</td>
                <td>{$row['uidUser']}</td>
                <td>{$row['emailUser']}</td>
            " . "<td> <a href='delete.php?user_id={$row['idUsers']}'><span id='spa'>Delete</span></a>  " .
                    "<a href='update.php?user_id={$row['idUsers']}'><span id='spa'>Update</span></a> </td> ";
                //     "<form method='get' action='delete.php?user_id={$row['idUsers']}'>
                //     <button type='submit'>UPDATE</button>
                // </form></td>
                //     //  
                //     <td> <form action="delete.php" method="POST">
                //     <input  />
                //     <button type="submit" name="deletesub">delete</button>
                // </form> </td> </tr>';
                //      $_SESSION['deletesub'] =  $row['emailUser'];

                // echo $_SESSION['deletesub'];
                /* free result set */
                // $_SESSION['deletesub']->free();
            }
        } else {
            echo '<p class="center"> you are not authorized to view this page !</p>';
        }
    }
    ?>


    </table>
    <button type=""></button>
</body>

</html>
<?php
require 'footer.php';
?>