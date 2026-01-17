<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


require("connection.php");
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
            header("Location: signup.html");
            exit();
        } else {#si elle n'existe pas inserer une nouvelle ligne
            $stmt = mysqli_prepare($c, "INSERT INTO users (email, password, role) VALUES (?, ?, ?)");
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "sss", $email, $hashed_password, $account_type);

            mysqli_stmt_close($stmt);
            mysqli_close($c);
            header("Location: signin.html");
            exit();
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
            header("Location: signup.html");
            exit();
        } else {#si elle n'existe pas inserer une nouvelle ligne
            $stmt = mysqli_prepare($c, "INSERT INTO users (email, password, role) VALUES (?, ?, ?)");
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "sss", $email, $hashed_password, $account_type);

            mysqli_stmt_close($stmt);
            mysqli_close($c);
            header("Location: signin.html");
            exit();
        }

    }

}
?>