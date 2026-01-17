<?php
require ("connection.php");
$email=$_POST["email"];
$password=$_POST["password"];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$req="SELECT * from users where email='$email' and password='$hashed_password'";
$res= mysqli_query($c,$req);
if (mysqli_num_rows($res)==1){
    header("Location: index.php");
    exit;
}
else{
    die ('le mot de passe est incorrect'); 
}
?>