<?php
require ("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account_type = isset($_POST["account_type"]) ? htmlspecialchars($_POST["account_type"]) : "";
    $email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : "";
    $first_name = isset($_POST["fst"]) ? htmlspecialchars($_POST["fst"]) : "";
    $last_name = isset($_POST["lst"]) ? htmlspecialchars($_POST["lst"]) : "";
    if ($account_type === "student") {

    }


}

?>