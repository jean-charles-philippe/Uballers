<?php
session_start();
require_once 'loginModel.php';
global $pdo;


$emailCnx = filter_input(INPUT_POST, 'emailCnx', FILTER_VALIDATE_EMAIL);
$passwordCnx = filter_input(INPUT_POST, 'passwordCnx', FILTER_SANITIZE_STRING);
$cnx = filter_input(INPUT_POST, 'cnx', FILTER_SANITIZE_STRING);

if ($cnx == "Connexion"){
        $user = getLogin($emailCnx);
    if ( $user!=false &&  password_verify($passwordCnx, $user["password"])){
        session_start();
        $_SESSION["email"]=$emailCnx;
        header("Location: accueil.php");
    }else {
        $_SESSION['flashCnx']="Identifiant ou mot de passe incorect";
        header("Location: index.php");
    }
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
        setRegister($firstNameRegister, $nameRegister, $emailRegister2,$passwordRegisterHashed,$dateRegister,$sexRegister);
        $_SESSION['flashRegOK']="Inscription réussie! Veuillez maintenant vous connectez!";
        header("Location: index.php");
    }else $_SESSION['flashReg']="Echec de l'inscription!";
    header("Location: index.php");
}

