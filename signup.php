<?php
$db_server = 'localhost';
$db_name = 'internship';
$db_user = 'root';
$db_password = '';
$error_message = '';
try {
    $dbh = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_password);
} catch (PDOException $e) {
    die('Impossible de se connecter à la base de données, veuillez vérifier les données de connexion !: ' . $e->getMessage());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account_type = isset($_POST["account_type"]) ? htmlspecialchars($_POST["account_type"]) : "";
    $email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : "";
    $first_name = isset($_POST["fst"]) ? htmlspecialchars($_POST["fst"]) : "";
    $last_name = isset($_POST["lst"]) ? htmlspecialchars($_POST["lst"]) : "";
    if ($account_type === "student") {

    }


}

?>