<?php
include('includes/header.php');
$db = new Database();
$id = $db->escapeString($_GET['id']);

$db->select('trainees', '*', null, 'id=' . $id);
$res = $db->getResult()[0];


?>
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Gestion des Stagiares</h1>
            <div class="row g-12 mb-12">
                <div class="col-12 col-lg-12">
                    <div class="app-card app-card-chart h-100 shadow-sm">
                        <div class="app-card-header p-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <h4 class="app-card-title">Modifier Stagiaire</h4>
                                </div>
                            </div>
                        </div>
                        <div class="app-card-body p-3 p-lg-4">
                            <form id="edit-trainee">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="hidden" id="id" name="id" value="<?= $id ?>">
                                                    <input type="text" id="fname" name="fname" value="<?= $res['fname'] ?>" placeholder=" ">
                                                    <label for="fname">Prénom</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" id="lname" name="lname" value="<?= $res['lname'] ?>" placeholder=" ">
                                                    <label for="lname">Nom</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <input type="number" id="cin" name="cin" value="<?= $res['cin'] ?>" placeholder=" ">
                                                    <label for="cin">Numéro CIN</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="element">
                                                        <input type="radio" id="male" name="gender" class="radio" value="0" <?php if ($res['gender'] == 0) echo 'checked'; ?>><label for="male">Homme</label>
                                                    </div>
                                                    <div class="element">
                                                        <input type="radio" id="female" name="gender" class="radio" value="1" <?php if ($res['gender'] == 1) echo 'checked'; ?>><label for="female">Femme</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <input type="text" id="email" name="email" value="<?= $res['email'] ?>" placeholder=" ">
                                                    <label for="email">Email</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <input type="number" id="tel" name="tel" value="<?= $res['tel'] ?>" placeholder=" ">
                                                    <label for="tel">GSM</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <input type="text" id="institute" name="institute" value="<?= $res['institute'] ?>" placeholder=" ">
                                                    <label for="institute">Institut</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <input type="text" id="username" name="username" value="<?= $res['username'] ?>" placeholder=" ">
                                                    <label for="username">Nom d'utlisateur</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <input type="password" id="password" name="password" placeholder=" ">
                                                    <label for="password">Nouvelle mot de passe</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="msg"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-2">
                                    <button id="btn-save-update-trainee" class="btn btn-add" value='OK'>Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="plugins/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/app.js"></script>
<script src="js/gest_trainees.js"></script>
</body>
</html>