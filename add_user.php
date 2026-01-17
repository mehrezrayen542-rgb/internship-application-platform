<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION)) {
    session_start();
}

require("connection.php");

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $account_type = $_POST["account_type"];

    if ($account_type == "student") {#gestion profil student
        #recuperation données student
        $email = $_POST["email_st"];
        $password = $_POST["password_st"];
        $first_name = $_POST["fst"];
        $last_name = $_POST["lst"];
        $university = $_POST["university"];
        $lvl = $_POST["lvl"];
        $study = $_POST["study"];

        #verification que l'email existe :

        $stmt = mysqli_prepare($c, "SELECT email FROM users WHERE email=?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            $error = "email linked to another account.";
        } else {#si elle n'existe pas inserer une nouvelle ligne
            $stmt = mysqli_prepare($c, "INSERT INTO users (email, password, role) VALUES (?, ?, ?)");
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "sss", $email, $hashed_password, $account_type);
        }

    } else {#gestion profil company

        #recuperation données company
        $email = $_POST["email_cp"];
        $password = $_POST["password_cp"];
        $company_name = $_POST["company_name"];
        $company_website = $_POST["company_website"];
        $company_size = $_POST["company_size"];


        #verification que l'email existe :

        $stmt = mysqli_prepare($c, "SELECT email FROM users WHERE email=?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            $error = "email linked to another account.";
        } else {#si elle n'existe pas inserer une nouvelle ligne
            $stmt = mysqli_prepare($c, "INSERT INTO users (email, password, role) VALUES (?, ?, ?)");
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "sss", $email, $hashed_password, $account_type);


            #recuperation de l'id et creation de la variable de session user_id

            $stmt = mysqli_prepare($c, "SELECT id FROM users WHERE email=?");
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $user_id = mysqli_stmt_get_result($stmt);

            $_SESSION["id"] = $user_id;

        }

        $stmt = mysqli_prepare($c, "SELECT email FROM users WHERE email=?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($c);
        header("Location: index.html");
        exit();


    }

}
?>