<?php
require_once 'loginController.php'
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Log Uballers</title>
    <link rel="stylesheet" href="Public/CSS/style.css">
</head>
<body>
    <div id="log-form">
        <div id="cnx_banner">
            <form action="loginController.php" method="post">
                <div class="input-banner">
                    <div class="login-banner">
                        <label for="emailCnx" class="label-login">Email</label>
                        <input type="email" class="emailCnx" id="emailCnx" name="emailCnx" required>
                    </div>
                    <div class="login-banner">
                        <label for="passwordCnx" class="label-login">Mot de passe</label>
                        <input type="password" class="emailCnx" id="passwordCnx" name="passwordCnx" required>
                        <a href="#" class="info-compte"><small class="info-compte">Informations de compte oubliées?</small></a>
                    </div>
                    <div class="login-banner">
                        <input type="submit" id="btn-cnx" name="cnx"  value="Connexion">
                        <?php
                        if( !empty($_SESSION["flashCnx"] )){
                            echo $_SESSION["flashCnx"];
                        }
                        unset($_SESSION['flashCnx']);
                        ?>
                    </div>
                </div>

            </form>
        </div>
        <div class="flash">
        <?php
        if( !empty($_SESSION["flashReg"] )){
            echo $_SESSION["flashReg"];
        }
        unset($_SESSION['flashReg']);
        ?>
        </div>
        <div class="flashOK">
            <?php
            if( !empty($_SESSION["flashRegOK"] )){
                echo $_SESSION["flashRegOK"];
            }
            unset($_SESSION['flashRegOK']);
            ?>
        </div>
        <div id="register_body">
            <form action="loginController.php" method="post">
                <div id="title_register">
                    <h2>Inscription</h2>
                    <p>C'est gratuit (et ça le restera toujours)</p>

                </div>
                <div id="register-section">
                    <div class="identity">
                        <div class="identity-input">
                            <label for="firstNameRegister"></label>
                            <input type="text" class="input-identity" name="firstNameRegister" id="firstNameRegister" placeholder="Prénom" required >
                        </div>
                        <div class="identity-input">
                            <label for="nameRegister"></label>
                            <input type="text" class="input-identity" name="nameRegister" id="nameRegister" placeholder="Nom" required>
                        </div>
                    </div>

                    <div class="">
                        <label for="emailRegister1"></label>
                        <input type="email" class="input-register" name="emailRegister1" id="emailRegister1" placeholder="Email" required>
                    </div>
                    <div class="">
                        <label for="emailRegister2"></label>
                        <input type="email" class="input-register" name="emailRegister2" id="emailRegister2" placeholder="Confirmer email" required>
                    </div>
                    <div class="">
                        <label for="passwordRegister"></label>
                        <input type="password" class="input-register" name="passwordRegister" id="passwordRegister"  placeholder="Nouveau mot de passe" required>
                    </div>

                    <div class="dateBirth">
                        <label for="dateRegister">Date de naissance</label>
                        <input type="date" class="input-register" id="dateRegister" name="dateRegister" required>
                        <a href="#" id="dateBirthHelp"><small  class="">Pourquoi indiquer ma date de naissance?</small></a>
                    </div>

                    <div class="radio">
                        <input class="" type="radio" name="sexRegister" id="sexRegister" value="0" checked >
                        <label for="sexRegister">Femme</label>
                        <input class="" type="radio" name="sexRegister" id="sexRegister" value="1">
                        <label for="sexRegister">Homme</label>
                    </div>
                 </div>


                <div class="conditions">
                    <p>En cliquant sur inscription, vous acceptez nos Conditions et indiquez que vous avez lu notre Politique d'utilisation des données, y compris notre utilisation des cookies. Vous pourrez recevoir des notifications par texto de la part de Uballers et pouvez vous désabonner à tout moment.</p>
                </div>

                <div class="div_btn-register">

                    <input type="submit" class="btn-register" name="inscription" value="Inscription">
                </div>
            </form>
        </div>
    </div>
</body>
</html>