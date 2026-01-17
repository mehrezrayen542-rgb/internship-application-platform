<?php
require ("connection.php");
$name=$_POST["name"];
$mdp=$_POST["mdp"];
$req="SELECT * from users where email='$name' and password='$mdp'";
$res= mysqli_query($c,$req);
if (mysqli_num_rows($res)==1){
    header("Location: index.php");
    exit;
}
else{
    die ('le mot de passe est incorrect'); 
}
?>