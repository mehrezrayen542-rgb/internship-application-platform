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
    $account_type = $_POST["account_type"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($account_type == "student") {
        $first_name = $_POST["fst"];
        $last_name = $_POST["lst"];
        $university = $_POST["university"];
        $lvl = $_POST["lvl"];
        $study = $_POST["study"];

    } else {
        $campany_name = $_POST["campany_name"];
        $campany_website = $_POST["campany_website"];
        $company_size = $_POST["company_size"];
    }
    #verifier que lemail existe deja

}
?>