<?php
require 'dbh.inc.php';
if (isset($_GET['user_id'])) {
    $id = $_GET['user_id'];
}
if (isset($_POST['sisub'])) {

    $username = $_POST['userlid'];
    $email = $_POST['mailid'];
    //$pass=$_POST['userpwd'];
    $password = $_POST['userpwd'];
    $passwordReapet = $_POST['re-userpwd'];


    if ($password !== $passwordReapet) {
        header("location: ../signup.php?error=passwordcheck&mail=" . $email);
        exit();
    } elseif (empty($username) || empty($email)) {
        header("location: ../signup.php?error=emptyfields&uid=" . $username . "&mail=" . $email);
        exit();
    } elseif (empty($password) || empty($passwordReapet)) {
        header("location: ../signup.php?error=emptypassfields");
        exit();
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("location: ../signup.php?error=invalidusername");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("location: ../signup.php?error=invalidmailuid");
        exit();
    } else {
        // $email = $_REQUEST['deletesub'];
        // $sql = "SELECT  uidUser FROM  users WHERE uidUser=?";
        // $stmt = mysqli_stmt_init($conn);
        // if (!mysqli_stmt_prepare($stmt, $sql)) {
        //     header("location: userstb.php?error=sqlerror&" . $id);
        //     exit();
        // } else {
        //     $result = "";
        //     //$hash = md5($password);
        //     //$hashedpwd = password_hash($password, PASSWORD_DEFAULT);
        //     mysqli_stmt_bind_param($stmt, "s", $username);
        //     mysqli_stmt_execute($stmt);
        //     $row =  mysqli_fetch_array($stmt);
        //     //  mysqli_stmt_store_result($stmt);
        //     mysqli_stmt_bind_result($stmt, $result);

        //     //mysqli_stmt_fetch($stmt);
        //     $resultCheck = $row['idUsers'];
        //     // echo $resultCheck;
        //     if ($row['idUsers'] > 0) {
        //         header("location : ../signup.php?error=emailtaken&email=" . $username);
        //         exit();
        //     } else {
                // $sql = "SELECT emailUser FROM  users WHERE emailUser=?";
                // $stmt = mysqli_stmt_init($conn);
                // mysqli_stmt_prepare($stmt, $sql);
                // if (!mysqli_stmt_prepare($stmt, $sql)) {
                //      header("location : ../signup.php?error=sqlerror&" . $email);
                //      exit();
                // } else {
                // mysqli_stmt_bind_param($stmt, "s", $email);
                // mysqli_stmt_execute($stmt);
                // $result = mysqli_stmt_get_result($stmt);

             //   $sql = "INSERT INTO users (uidUser,emailUser,pwdUser) VALUES (?,?,?)";
             $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
               $sql = "UPDATE users
                    SET uidUser ='$username', emailUser='$email', pwdUser='$hashedpwd'
                    WHERE idUsers = '$id'";
                   if(!mysqli_query($conn,$sql)){
                    header("location: ../signup.php?error=sqlerror&" . $id);
                        exit();
                    } else {
                        header("location: ../userstb.php?user_id=". $id);
                        exit();
                    }
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
                }
            
        
      
    // mysqli_stmt_close($stmt);
    mysqli_close($conn);
         } else {
    header("location: ../userstb.ph");
    exit();
}
