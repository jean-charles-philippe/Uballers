<?php

function getLogin($email){
    try {
        $chaineCnx = 'mysql:host=localhost;dbname=uballers';
        $pdo = new PDO($chaineCnx, 'root', '', [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        $msg = 'ERREUR PDO dans ' . $e->getFile() . ' : ' . $e->getLine() . ' : ' . $e->getMessage();
        die($msg);
    }

    $prep = $pdo->prepare('SELECT * FROM users WHERE email= :email');
    $prep->bindValue('email', $email);
    $prep->execute();
    $user = $prep->fetch();

    return $user;
}

function setRegister($firstNameRegister, $nameRegister, $emailRegister2,$passwordRegisterHashed,$dateRegister,$sexRegister){
    try {
        $chaineCnx = 'mysql:host=localhost;dbname=uballers';
        $pdo = new PDO($chaineCnx, 'root', '', [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        $msg = 'ERREUR PDO dans ' . $e->getFile() . ' : ' . $e->getLine() . ' : ' . $e->getMessage();
        die($msg);
    }

    $prep = $pdo->prepare('INSERT INTO users (firstName, name, email, password, birthDate, sex ) VALUES (:firstNameRegister, :nameRegister, :emailRegister2, :passwordRegister, :dateRegister, :sexRegister )');
    $prep->bindParam(':firstNameRegister', $firstNameRegister);
    $prep->bindParam(':nameRegister', $nameRegister);
    $prep->bindParam(':emailRegister2', $emailRegister2);
    $prep->bindParam(':passwordRegister', $passwordRegisterHashed);
    $prep->bindParam(':dateRegister', $dateRegister);
    $prep->bindParam(':sexRegister', $sexRegister);
    $prep->execute();

}


