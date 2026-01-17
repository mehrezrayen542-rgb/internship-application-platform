<?php
require ("connection.php");
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