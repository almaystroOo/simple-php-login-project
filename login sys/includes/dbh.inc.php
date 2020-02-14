<?php 
$servername ="localhost";
$dbname ="loginsys";
$dbusername="root";
$dbpwd="";

$conn = mysqli_connect($servername,$dbusername,$dbpwd,$dbname);

if($conn){
    //echo("connected succefuly !");

}else{
    die("error :".mysqli_connect_error());
}

