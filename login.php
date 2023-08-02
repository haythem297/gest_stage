<?php
session_start();
if(isset($_SESSION['user']))
    header('Location:index.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <div class="container">
        <div class="formHold">
            <div class="logoh">
                <img src="./img/login.jpg" class="img-responsive">
            </div>
            <div class="frmlogin">
                <form id="frmlogin">
                    <div class="form-group">
                        <input type="text" id="username" name="username" placeholder=" ">
                        <label for="username">Nom d'utlisateur</label>
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" name="password" placeholder=" ">
                        <label for="password">Mot de passe</label>
                    </div>
                    <div class="form-group">
                        <div class="msg"></div>
                    </div>
                    <div class="form-group">
                        <a href="subscribe.php">Inscription</a>
                    </div>
                    <div class="form-group">
                        <button id="btn-submit" class="btn-primary">Se connecter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/login.js"></script>
</body>
</html>