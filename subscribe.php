<?php
session_start();
if (isset($_SESSION['user']))
    header('Location:index.php');

include 'includes/Database.php';

$db = new Database();
$db->select('scolar_establishment', '*');
$establishments = $db->getResult();
$db->select('scolar_establishment_types', '*');
$types = $db->getResult();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
<div class="container">
    <div class="formHold subscribe">
        <div class="logoh">
            <img src="./img/login.jpg" class="img-responsive">
        </div>
        <div class="frmsubscribe">
            <form id="frmsubscribe">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" id="fname" name="fname" placeholder=" ">
                                    <label for="fname">Prénom</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" id="lname" name="lname" placeholder=" ">
                                    <label for="lname">Nom</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="number" id="cin" name="cin" placeholder=" ">
                                    <label for="cin">Numéro CIN</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <div class="element">
                                        <input type="radio" id="male" name="gender" class="radio" value="0"><label for="male">Homme</label>
                                    </div>
                                    <div class="element">
                                        <input type="radio" id="female" name="gender" class="radio" value="1"><label for="female">Femme</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" id="email" name="email" placeholder=" ">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="number" id="tel" name="tel" placeholder=" ">
                                    <label for="tel">GSM</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">

                                        <select name="institut" id="institut">
                                            <option value=""></option>
                                            <?php
                                            for ($i = 0; $i < sizeof($establishments); $i++) {
                                                echo "<option value='" . $establishments[$i]['id'] . "'>" . $establishments[$i]['name'] . "</option>";
                                            }
                                            ?>
                                        </select>

                                    <label for="institut">Institut</label>
                                </div>
                            </div>
                            <div class="col flex">
                                <div class="form-group flex-child">
                                                    <span>
                                                        <span>
                                                            Institut inexistant
                                                        </span>
                                                        <input type="checkbox" class="chk" id="estab_not_in_list">
                                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col hidden">
                                <div class="form-group">
                                    <input type="text" id="institute" name="institute" placeholder=" ">
                                    <label for="institute">Institut</label>
                                </div>
                            </div>
                            <div class="col hidden">
                                <div class="form-group">
                                    <select name="type" id="type">
                                        <option value=""></option>
                                        <?php
                                        for ($i = 0; $i < sizeof($types); $i++) {
                                            echo '<option value="' . $types[$i]['id'] . '">' . $types[$i]['type'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <label for="type">Type Institut</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col hidden">
                                <div class="form-group">
                                    <input type="number" id="tel1" name="tel1" placeholder=" ">
                                    <label for="tel1">Tel 1 Institut</label>
                                </div>
                            </div>
                            <div class="col hidden">
                                <div class="form-group">
                                    <input type="number" id="tel2" name="tel2" placeholder=" ">
                                    <label for="tel2">Tel 2 Institut</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col hidden">
                                <div class="form-group">
                                    <input type="number" id="fax" name="fax" placeholder=" ">
                                    <label for="fax">Fax Institut</label>
                                </div>
                            </div>
                            <div class="col hidden">
                                <div class="form-group">
                                    <input type="text" id="email_ins" name="email_ins" placeholder=" ">
                                    <label for="email_ins">Email Institut</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col hidden">
                                <div class="form-group">
                                    <textarea id="adress" name="adress" placeholder=" "></textarea>
                                    <label for="adress">Addresse Institut</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" id="username" name="username" placeholder=" ">
                                    <label for="username">Nom d'utlisateur</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="password" id="password" name="password" placeholder=" ">
                                    <label for="password">Mot de passe</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="password" id="r_password" name="r_password" placeholder=" ">
                                    <label for="r_password">Retapper Mot de passe</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="msg"></div>
                        </div>
                        <div class="row">
            <div class="col-md-2">
                <button id="btn-save-new-trainee" class="btn btn-add">Enregistrer</button>
            </div>
        </div>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
</div>
<script src="./js/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/subscribe.js"></script>

</body>
</html>