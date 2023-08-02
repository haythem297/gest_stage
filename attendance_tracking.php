<?php
include('includes/header.php');
$db->select('trainees as t','t.*,ai.date_start,ai.date_end','JOIN attribution_internship as ai ON ai.id_trainee=t.id','t.id='.$db->escapeString($_GET['id']));
if($db->numRows()==0)
    header('Location:index.php');
$res = $db->getResult()[0];
$begin = new DateTime($res['date_start']);
$end = new DateTime($res['date_end']);
$interval = DateInterval::createFromDateString('1 day');
$period = new DatePeriod($begin, $interval, $end);
$db->select('attendance','date,state',null,'id_trainee='.$db->escapeString($_GET['id']));
$attendance = $db->getResult();
$presances = 0;
$absences = 0;
foreach ($attendance as $a){
    if($a['state']=='p')
        $presances++;
    else
        $absences++;
}
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
                                    <h4 class="app-card-title">Suivi des présences de <?=$res['fname'].' '.$res['lname'];?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="app-card-body p-3 p-lg-4">
                            <div class="row">
                                <div class="col"><b>Duré:</b> de <?=date('d-m-Y',strtotime($res['date_start']))?> à <?=date('d-m-Y',strtotime($res['date_end']))?></div>
                                <div class="col"><b>Jours ouvrables:</b> <?=sizeof($attendance)?></div>
                                <div class="col"><b>Présence(s):</b> <?=$presances?></div>
                                <div class="col"><b>Absence(s):</b> <?=$absences?></div>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 15%">Date/Jour</th>
                                        <th style="width: 12.14%">Lundi</th>
                                        <th style="width: 12.14%">Mardi</th>
                                        <th style="width: 12.14%">Mercredi</th>
                                        <th style="width: 12.14%">Jeudi</th>
                                        <th style="width: 12.14%">Vendredi</th>
                                        <th style="width: 12.14%">Samedi</th>
                                        <th style="width: 12.14%">Dimanche</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $today = date('Y-m-d');
                                function check_attendance($date,$tbl){
                                    $state = 'n';
                                    foreach ($tbl as $t){
                                        if($t['date']==$date){
                                            $state = $t['state'];
                                        }
                                    }
                                    switch ($state){
                                        case 'p':
                                            $state = 'present';
                                            break;
                                        case 'a':
                                            $state = 'absent';
                                            break;
                                        default:
                                            $state = 'nc';
                                            break;
                                    }
                                    return $state;
                                }
                                foreach ($period as $dt) {
                                    if($dt->format("Y-m-d")<= $today){
                                        switch ($dt->format("D")){
                                            case 'Mon':
                                                echo '<tr><td>'.$dt->format("d-m-Y").'</td><td class="'.check_attendance($dt->format("Y-m-d"),$attendance).'"></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
                                                break;
                                            case 'Tue':
                                                echo '<tr><td>'.$dt->format("d-m-Y").'</td><td></td><td class="'.check_attendance($dt->format("Y-m-d"),$attendance).'"></td><td></td><td></td><td></td><td></td><td></td></tr>';
                                                break;
                                            case 'Wed':
                                                echo '<tr><td>'.$dt->format("d-m-Y").'</td><td></td><td></td><td class="'.check_attendance($dt->format("Y-m-d"),$attendance).'"></td><td></td><td></td><td></td><td></td></tr>';
                                                break;
                                            case 'Thu':
                                                echo '<tr><td>'.$dt->format("d-m-Y").'</td><td></td><td></td><td></td><td class="'.check_attendance($dt->format("Y-m-d"),$attendance).'"></td><td></td><td></td><td></td></tr>';
                                                break;
                                            case 'Fri':
                                                echo '<tr><td>'.$dt->format("d-m-Y").'</td><td></td><td></td><td></td><td></td><td class="'.check_attendance($dt->format("Y-m-d"),$attendance).'"></td><td></td><td></td></tr>';
                                                break;
                                            case 'Sat':
                                                echo '<tr><td>'.$dt->format("d-m-Y").'</td><td></td><td></td><td></td><td></td><td></td><td class="nc"></td><td></td></tr>';
                                                break;
                                            case 'Sun':
                                                echo '<tr><td>'.$dt->format("d-m-Y").'</td><td></td><td></td><td></td><td></td><td></td><td></td><td class="nc"></td></tr>';
                                                break;
                                        }
                                    }
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
<script src="js/gest_trainees.js"></script>
</body>
</html>
