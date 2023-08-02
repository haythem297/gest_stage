<?php
include('includes/header.php');
$db->select('scolar_establishment', '*');
$establishments = $db->getResult();
$db->select('scolar_establishment_types', '*');
$types = $db->getResult();
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
                                    <h4 class="app-card-title">Nouveau stagiaire</h4>
                                </div>
                            </div>
                        </div>
                        <div class="app-card-body p-3 p-lg-4">
                            <form id="new-trainee">
                                <div class="row">
                                    <div class="col-md-6">
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
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-2">
                                    <button id="btn-save-new-trainee" class="btn btn-add">Enregistrer</button>
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