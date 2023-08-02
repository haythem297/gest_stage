<?php
include('includes/header.php');
$db->select('attendance', 'date,state', NULL, 'date = DATE(NOW())');
$attendance = $db->getResult();
$presances = 0;
$absences = 0;
foreach ($attendance as $a) {
    if ($a['state'] == 'p')
        $presances++;
    else
        $absences++;
}
?>
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <?php
            $db->select('trainees as t', 'DISTINCT t.id,t.fname,t.lname,t.cin,t.tel,t.username,ai.date_start,ai.date_end', 'JOIN attribution_internship as ai ON ai.id_trainee=t.id LEFT JOIN attendance as att ON att.id_trainee=t.id', '(DATE(NOW()) BETWEEN ai.date_start AND ai.date_end) AND t.id NOT IN (SELECT id_trainee FROM attendance WHERE date = DATE(NOW()))');
            $count = $db->numRows();
            if ($count > 0) {
                ?>
                <div class="row g-12 mb-12">
                    <div class="col-md-12 col-lg-12">
                        <div class="app-card shadow-sm">
                            <div class="app-card-header p-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <h4 class="app-card-title">Pointage de <?= date('d-m-Y'); ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="app-card-body p-3 p-lg-4">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Prénom</th>
                                        <th>Nom</th>
                                        <th>CIN</th>
                                        <th>Tel</th>
                                        <th>Nom d'utilisateur</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $res = $db->getResult();
                                    for ($i = 0; $i < sizeof($res); $i++) {
                                        echo "<tr><td><input type='checkbox' class='chk' data-id='" . $res[$i]['id'] . "'/></td><td>" . $res[$i]['fname'] . "</td><td>" . $res[$i]['lname'] . "</td><td>" . $res[$i]['cin'] . "</td><td>" . $res[$i]['tel'] . "</td><td>" . $res[$i]['username'] . '</td></tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-2">
                                        <button id="btn-save-attendance" class="btn btn-add">Soumettre</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else {
                $db->select('scolar_establishment', '*', null, '1=1');
                $etablissements = $db->numRows();
                $db->select('trainees', '*', null, 'account_state=0');
                $inscriptions = $db->numRows();
                //select COUNT(*) from attribution_internship WHERE DATE(NOW()) BETWEEN date_start AND date_end
                $db->select('attribution_internship', '*', null, 'DATE(now()) BETWEEN date_start AND date_end');
                $trainees = $db->numRows();
                $db->select('attendance', '*', null, ' state = "p" AND date = DATE(now())');
                $en_cours = $db->numRows();
                ?>
                <div class="row g-4 mb-4">
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Inscription(s)</h4>
                                <div class="stats-figure"><?= $inscriptions ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Stagiaire(s)</h4>
                                <div class="stats-figure"><?= $trainees ?></div>
                                <div class="stats-meta">En cours de Stage</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Stagiare(s) Présent(s)</h4>
                                <div class="stats-figure"><?= $en_cours ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">établissement(s)</h4>
                                <div class="stats-figure"><?= $etablissements ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="container">
                <h2 class="text-center">stagiaire statistique</h2>
                <canvas id="barChart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="plugins/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.js"></script>
<script src="js/app.js"></script>
<script src="js/attendance.js"></script>
</body>
</html>