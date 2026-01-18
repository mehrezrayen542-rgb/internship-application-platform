<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require "connection.php";
if (!isset($_SESSION)) {
    session_start();
}
function create_account_student($email, $password, $first_name, $last_name, $university, $lvl, $study)
{
    global $c;
    create_user($email, $password, "student");
    $stmt = mysqli_prepare($c, "INSERT INTO students (email, first_name, last_name, university, level) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssss", $email, $first_name, $last_name, $university, $lvl);
    mysqli_stmt_execute($stmt);

    create_session_id($email);

}
function create_account_company($email, $password, $company_name, $company_adress, $company_website, $company_size)
{

    global $c;
    create_user($email, $password, "company");
    $stmt = mysqli_prepare($c, "INSERT INTO users (email, company_name, address, website, company_size) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $email, $company_name, $company_address, $company_website, $company_size);
    mysqli_stmt_execute($stmt);

    create_session_id($email);
}

function create_user($email, $password, $account_type)
{
    global $c;
    $stmt = mysqli_prepare($c, "INSERT INTO users (email, password, role) VALUES (?, ?, ?)");
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sss", $email, $hashed_password, $account_type);
    mysqli_stmt_execute($stmt);
}

function create_session_id($email)
{#recuperation de l'id et creation de la variable de session user_id
    global $c;
    $stmt = mysqli_prepare($c, "SELECT id FROM users WHERE email=?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $user_id = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($c);
    $_SESSION["id"] = $user_id;

}

?>