<?php
include('includes/header.php');
?>
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Configurations</h1>
            <div class="row g-12 mb-12">
                <div class="col-12 col-lg-12">
                    <div class="app-card app-card-chart h-100 shadow-sm">
                        <div class="app-card-header p-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <h4 class="app-card-title">Liste des Modèles d'attestation de stage</h4>
                                </div>
                            </div>
                        </div>
                        <div class="app-card-body p-3 p-lg-4">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Titre</th>
                                    <th>Date de création</th>
                                    <th>Etat</th>
                                    <th style="width:75px;"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $db->select('certificates_templates', '*');
                                $res = $db->getResult();
                                for ($i = 0; $i < sizeof($res); $i++) {
                                    $btndelete = '';
                                    if (sizeof($res) > 1)
                                        $btndelete = '<span data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer" class="icon delete" data-id="' . $res[$i]['id'] . '"><i class="fas fa-trash"></i></span>';
                                    $state = ($res[$i]['state'] == 0) ? "Inactif" : "Active";
                                    $btnactivate = '';
                                    if ((sizeof($res) > 1) && ($res[$i]['state'] != '1')) {
                                        $btnactivate = '<span data-bs-toggle="tooltip" data-bs-placement="top" title="Mettre par défaut" class="icon activate" data-id="' . $res[$i]['id'] . '"><i class="fas fa-file-check"></i></span>';
                                    }
                                    echo '<tr><td>' . $res[$i]['id'] . '</td><td>' . str_replace("\&#039;", "'", $res[$i]['title']) . '</td><td>' . date('d-m-Y', strtotime($res[$i]['pubdate'])) . '</td><td>' . $state . '</td><td>' . $btnactivate . '<span data-bs-toggle="tooltip" data-bs-placement="top" title="Modifier le contenue" class="icon edit edittemplate" data-id="' . $res[$i]['id'] . '"><i class="fa fa-edit"></i></span>' . $btndelete . '</td></tr>';
                                }
                                ?>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-2">
                                    <button id="btn-new-certif" class="btn btn-add">Ajouter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-12 mb-12">
                <div class="col-12 col-lg-12">
                    <div class="app-card app-card-chart h-100 shadow-sm">
                        <div class="app-card-header p-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <h4 class="app-card-title">Configuration divisionnaire</h4>
                                </div>
                            </div>
                        </div>
                        <div class="app-card-body p-3 p-lg-4">
                            <form id="new-divisionnaire">
                                <?php
                                $db->select('config_certificate','*');
                                $count_config = $db->numRows();
                                if($count_config>0){
                                    $res_config = $db->getResult()[0];
                                }
                                ?>
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <?php
                                                    if($count_config>0){ ?>
                                                        <input type="text" id="fname" name="fname" value="<?=$res_config['div_fname'];?>" placeholder=" ">
                                                    <?php }else{?>
                                                        <input type="text" id="fname" name="fname" placeholder=" ">
                                                    <?php } ?>
                                                    <label for="fname">Prénom</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <?php
                                                    if($count_config>0){ ?>
                                                        <input type="text" id="lname" name="lname" value="<?=$res_config['div_lname'];?>" placeholder=" ">
                                                    <?php }else{?>
                                                        <input type="text" id="lname" name="lname" placeholder=" ">
                                                    <?php } ?>
                                                    <label for="lname">Nom</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <?php
                                                    if($count_config>0){ ?>
                                                        <input type="text" id="function" name="function" value="<?=$res_config['div_post'];?>" placeholder=" ">
                                                    <?php }else{?>
                                                        <input type="text" id="function" name="function" placeholder=" ">
                                                    <?php } ?>
                                                    <label for="function">Fonction</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="msg"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-2">
                                    <button id="btn-save-divisionnaire-certif" class="btn btn-add">Enregistrer</button>
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
<script src="js/new_certificate_template.js"></script>
</body>
</html>