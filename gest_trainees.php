<?php
include('includes/header.php');

?>
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Gestion des Stagiaires</h1>
            <div class="row g-12 mb-12">
                <div class="col-12 col-lg-12">
                    <div class="app-card app-card-chart h-100 shadow-sm">
                        <div class="app-card-header p-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <h4 class="app-card-title">Demandes d'inscription</h4>
                                </div>
                            </div>
                        </div>
                        <div class="app-card-body p-3 p-lg-4">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Prénom</th>
                                    <th>Nom</th>
                                    <th>Genre</th>
                                    <th>CIN</th>
                                    <th>Institut</th>
                                    <th>Tel</th>
                                    <th>Email</th>
                                    <th>Nom d'utilisateur</th>
                                    <th style="width:55px;"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $db->select('trainees', 'trainees.*,se.name as ins_name', 'JOIN scolar_establishment se ON se.id=trainees.institute', 'trainees.account_state=0');
                                $res = $db->getResult();
                                for ($i = 0; $i < sizeof($res); $i++) {
                                    $gender = ($res[$i]['gender'] == 0) ? 'Homme' : 'Femme';
                                    echo "<tr><td>" . $res[$i]['id'] . "</td><td>" . $res[$i]['fname'] . "</td><td>" . $res[$i]['lname'] . "</td><td>" . $gender . "</td><td>" . $res[$i]['cin'] . "</td><td>" . $res[$i]['ins_name'] . "</td><td>" . $res[$i]['tel'] . "</td><td>" . $res[$i]['email'] . "</td><td>" . $res[$i]['username'] . '</td><td><span data-bs-toggle="tooltip" data-bs-placement="top" title="Accepter" class="icon activate" data-id="' . $res[$i]['id'] . '"><i class="far fa-check-square"></i></span></td></tr>';
                                }
                                ?>
                                </tbody>
                            </table>
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
                                    <h4 class="app-card-title">Stagiaires En cours de stage</h4>
                                </div>
                            </div>
                        </div>
                        <div class="app-card-body p-3 p-lg-4">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Prénom</th>
                                    <th>Nom</th>
                                    <th>CIN</th>
                                    <th>Institut</th>
                                    <th>Tel</th>
                                    <th>Nom d'utilisateur</th>
                                    <th>Date début Stage</th>
                                    <th>Date fin Stage</th>
                                    <th style="width: 50px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $db->select('trainees as t', 't.*,se.name as ins_name,ai.id as id_stage,ai.date_start,ai.date_end', 'JOIN scolar_establishment as se ON se.id=t.institute JOIN attribution_internship as ai ON ai.id_trainee=t.id', '(t.account_state=1)AND(DATE(NOW()) BETWEEN ai.date_start AND ai.date_end)');
                                $res = $db->getResult();
                                for ($i = 0; $i < sizeof($res); $i++) {
                                    $gender = ($res[$i]['gender'] == 0) ? 'Homme' : 'Femme';
                                    echo "<tr><td>" . $res[$i]['id'] . "</td><td>" . $res[$i]['fname'] . "</td><td>" . $res[$i]['lname'] . "</td><td>" . $res[$i]['cin'] . "</td><td>" . $res[$i]['ins_name'] . "</td><td>" . $res[$i]['tel'] . "</td><td>" . $res[$i]['username'] . '</td><td>' . date('d-m-Y', strtotime($res[$i]['date_start'])) . '</td><td>' . date('d-m-Y', strtotime($res[$i]['date_end'])) . '</td><td><span data-bs-toggle="tooltip" data-bs-placement="top" title="Suivi des présences" class="icon edit track-attendance" data-id="' . $res[$i]['id'] . '"><i class="fas fa-calendar-day"></i></span><span data-bs-toggle="tooltip" data-bs-placement="top" title="Imprimer Attestation" class="icon edit print-certificate" data-id-trainee="' . $res[$i]['id'] . '" data-id-stage="' . $res[$i]['id_stage'] . '"><i class="fas fa-print"></i></span></td></tr>';
                                }
                                ?>
                                </tbody>
                            </table>
                            <button id="btn-new-trainee" class="btn btn-add">Ajouter</button>
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
                                    <h4 class="app-card-title">Liste des Stages terminés</h4>
                                </div>
                            </div>
                        </div>
                        <div class="app-card-body p-3 p-lg-4">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Prénom</th>
                                    <th>Nom</th>
                                    <th>CIN</th>
                                    <th>Institut</th>
                                    <th>Tel</th>
                                    <th>Date début Stage</th>
                                    <th>Date fin Stage</th>
                                    <th style="width: 50px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $db->select('attribution_internship as ai','t.*,se.name as ins_name,ai.id as id_stage, ai.date_start,ai.date_end','JOIN trainees as t ON t.id=ai.id_trainee JOIN scolar_establishment as se ON se.id=t.institute','(DATE(NOW())>ai.date_end)');
                                $res = $db->getResult();
                                for ($i = 0; $i < sizeof($res); $i++) {
                                    $gender = ($res[$i]['gender'] == 0) ? 'Homme' : 'Femme';
                                    echo '<tr><td>' . $res[$i]['id'] . '</td><td>' . $res[$i]['fname'] . '</td><td>' . $res[$i]['lname'] . '</td><td>' . $res[$i]['cin'] . '</td><td>' . $res[$i]['ins_name'] . '</td><td>' . $res[$i]['tel'] . '</td><td>' . date('d-m-Y', strtotime($res[$i]['date_start'])) . '</td><td>' . date('d-m-Y', strtotime($res[$i]['date_end'])) . '</td><td><span data-bs-toggle="tooltip" data-bs-placement="top" title="Imprimer Attestation" class="icon edit print-certificate" data-id-trainee="' . $res[$i]['id'] . '" data-id-stage="' . $res[$i]['id_stage'] . '"><i class="fas fa-print"></i></span></td></tr>';
                                }
                                ?>
                                </tbody>
                            </table>
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
<script src="js/printthis.js"></script>
<link rel="stylesheet" href="css/print.min.css">
<script src="js/gest_trainees.js"></script>
</body>
</html>