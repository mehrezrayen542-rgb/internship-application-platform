<?php
require("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    #verification que l'email existe :
    $stmt = mysqli_prepare($c, "SELECT email FROM users WHERE email=?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        echo "L'email existe déjà dans la base de données.";
    } else {
        echo "L'email n'existe pas.";
    }
    
    $account_type = $_POST["account_type"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($account_type == "student") {
        $first_name = $_POST["fst"];
        $last_name = $_POST["lst"];
        $university = $_POST["university"];
        $lvl = $_POST["lvl"];
        $study = $_POST["study"];

        #verifier que lemail existe deja

        $stmt = mysqli_prepare($c, "INSERT INTO users (email, password, role) VALUES (?, ?, ?)");

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sss", $email, $hashed_password, $account_type);

        if (mysqli_stmt_execute($stmt)) {
            echo "Nouveau enregistrement créé avec succès";
        } else {
            error_log("Erreur d'insertion: " . mysqli_stmt_error($stmt));
            echo "Une erreur est survenue lors de la création du compte";
        }

        mysqli_stmt_close($stmt);
        mysqli_close($c);
    } else {
        $campany_name = $_POST["campany_name"];
        $campany_website = $_POST["campany_website"];
        $company_size = $_POST["company_size"];
        #verifier que lemail existe deja
    }


}
?>