<?php
include('includes/header.php');
$db->select('users', '*', NULL, 'id ='.$_SESSION['user']['id'] );
$info = $db->getResult()[0];
?>
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Mon compte</h1>
            <div class="row g-12 mb-12">
                <div class="col-12 col-lg-12">
                    <div class="app-card app-card-chart h-100 shadow-sm">
                        <div class="app-card-body p-3 p-lg-4">
                            <form id="frmmoncompte">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" id="fname" name="fname" placeholder=" "
                                                           value="<?= $info['fname'] ?>" disabled>
                                                    <label for="fname">Prénom</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" id="lname" name="lname" placeholder=" "
                                                           value="<?= $info['lname'] ?>" disabled>
                                                    <label for="lname">Nom</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <input type="text" id="email" name="email" placeholder=" "
                                                           value="<?= $info['email'] ?>">
                                                    <label for="email">Email</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
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
                                                <input type="text" id="username" name="username" placeholder=" "
                                                       value="<?= $info['username'] ?>" disabled>
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
                                                <input type="password" id="r_password" name="r_password"
                                                       placeholder=" ">
                                                <label for="r_password">Retapper Mot de passe</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="msg"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <button id="btn-save-update" name="btn-save-update" class="btn btn-add">
                                                Enregistrer
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
<script src="js/moncompte.js"></script>
</body>

</html>