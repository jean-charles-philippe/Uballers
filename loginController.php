<?php
session_start();
require_once 'cnx.php';
global $pdo;


$emailCnx = filter_input(INPUT_POST, 'emailCnx', FILTER_VALIDATE_EMAIL);
$passwordCnx = filter_input(INPUT_POST, 'passwordCnx', FILTER_SANITIZE_STRING);
$cnx = filter_input(INPUT_POST, 'cnx', FILTER_SANITIZE_STRING);

if ($cnx == "Connexion"){
    $prep = $pdo->prepare('SELECT * FROM users WHERE email= :email');
    $prep->bindValue('email', $emailCnx);
    $prep->execute();
    $user = $prep->fetch();

    if (password_verify($passwordCnx, $user["password"])){
        session_start();
        $_SESSION["email"]=$emailCnx;
        header("Location: accueil.php");
    }else $connexionError = "ON";
}

$firstNameRegister = filter_input(INPUT_POST, 'firstNameRegister', FILTER_SANITIZE_STRING);
$nameRegister = filter_input(INPUT_POST, 'nameRegister', FILTER_SANITIZE_STRING);
$emailRegister1 = filter_input(INPUT_POST, 'emailRegister1', FILTER_VALIDATE_EMAIL);
$emailRegister2 = filter_input(INPUT_POST, 'emailRegister2', FILTER_VALIDATE_EMAIL);
$passwordRegister = filter_input(INPUT_POST, 'passwordRegister', FILTER_SANITIZE_STRING);
$passwordRegisterHashed = password_hash($passwordRegister, PASSWORD_DEFAULT);
$dateRegister = filter_input(INPUT_POST, 'dateRegister', FILTER_SANITIZE_STRING);
$sexRegister = filter_input(INPUT_POST, 'sexRegister', FILTER_SANITIZE_NUMBER_INT);
$inscription = filter_input(INPUT_POST, 'inscription', FILTER_SANITIZE_STRING);



if ($inscription == "Inscription"){
    if ($emailRegister1==$emailRegister2) {
        $prep = $pdo->prepare('INSERT INTO users (firstName, name, email, password, birthDate, sex ) VALUES (:firstNameRegister, :nameRegister, :emailRegister2, :passwordRegister, :dateRegister, :sexRegister )');
        $prep->bindParam(':firstNameRegister', $firstNameRegister);
        $prep->bindParam(':nameRegister', $nameRegister);
        $prep->bindParam(':emailRegister2', $emailRegister2);
        $prep->bindParam(':passwordRegister', $passwordRegisterHashed);
        $prep->bindParam(':dateRegister', $dateRegister);
        $prep->bindParam(':sexRegister', $sexRegister);
        $prep->execute();
    }else $inscriptionError = "ON";
}

