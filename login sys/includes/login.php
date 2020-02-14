<?php
require 'dbh.inc.php';
if (isset($_POST['insub'])) {
    $email = $_POST['Umailid'];
    //$pass=$_POST['userpwd'];
    $password = $_POST['Upwd'];

    if (empty($password) || empty($email)) {
        header("location: ../index.php?error=emptyfields&uid=" . $username . "&mail=" . $email);
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE uidUser='$email' OR emailUser='$email'";
        if (!mysqli_query($conn, $sql)) {
            header("location: ../index.php?error=sqlerror&" . $id);
            exit();
        }
        if ($result = mysqli_query($conn, $sql)) {
            $ro = mysqli_fetch_assoc($result);
        }if ($ro['idUsers'] < 0) {
            header("location: ../index.php?incorrecr&user&password=" . $email);
           
        } 
        else {
            // $stmt = mysqli_stmt_init($conn);
            // if (!mysqli_stmt_prepare($stmt, $sql)) {
            //     header("location: ../signup.php?error=sqlerror&" . $id);
            //     exit();
            // } else {
            //     //$hash = md5($password);
            //     $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
            //     mysqli_stmt_bind_param($stmt, "sssi", $username, $email, $hashedpwd,$id);
            //     mysqli_stmt_execute($stmt);
            //     header("location: ../signup.php?updated=success&user=" . $id . "&resultcheck=" . $resultCheck . "get=" . $get);
            //     exit();




            // mysqli_stmt_close($stmt);
            // mysqli_close($conn);

            $sql = "SELECT * FROM users WHERE uidUser=? OR emailUser=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../index.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "ss", $email, $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($row = mysqli_fetch_assoc($result)) {
                    //$hasedpass = md5($password);

                    $pwdCheck = password_verify($password, $row['pwdUser']);

                    if ($pwdCheck == false) {
                        header("location: ../index.php?error=wrong&password");
                        exit();
                    } elseif ($pwdCheck == true) {
                        session_start();
                        $_SESSION['userId'] = $row['pwdUser'];
                        $_SESSION['userUid'] = $row['uidUser'];
                        header("location: ../landing.php?success=logedin&userId=" . $ro['idUsers']);
                        exit();
                    }
                }
            }
        }
    }
} else {
    header("location: ../index.php");
    exit();
}
