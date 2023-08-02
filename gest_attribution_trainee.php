<?php
include('includes/header.php');
$db->select('scolar_establishment_types','*');
$types = $db->getResult();
?>
<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<h1 class="app-page-title">Gestion des Attributions des stages</h1>
			<div class="row g-12 mb-12">
				<div class="col-12 col-lg-12">
					<div class="app-card app-card-chart h-100 shadow-sm">
						<div class="app-card-header p-3">
							<div class="row justify-content-between align-items-center">
								<div class="col-auto">
									<h4 class="app-card-title">Liste des Stagiaires Non Affectés</h4>
								</div>
							</div>
						</div>
						<div class="app-card-body p-3 p-lg-4">
                             <table class="table">
								<thead>
									<tr>
										<th>Id</th>
										<th>CIN</th>
										<th>Nom</th>
                                        <th>Prénom</th>
										<th>Tel</th>
										<th style="width:55px;"></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$db->select("attribution_internship as ai",'t.*','RIGHT JOIN trainees as t  ON t.id = ai.id_trainee',"((ai.id_trainee IS NULL) OR (ai.date_end < DATE(NOW())))AND(t.account_state=1)");
									$res = $db->getResult();
									for ($i = 0; $i < sizeof($res); $i++) {
										echo "<tr><td>" . $res[$i]['id'] . "</td><td>" . $res[$i]['cin'] . "</td><td>" . $res[$i]['fname'] . "</td><td>" . $res[$i]['lname'] . "</td><td>" . $res[$i]['tel'] ."</td><td><span data-bs-toggle='tooltip' data-bs-placement='top' title='Attribuer' class='icon affect' data-id='" . $res[$i]['id'] . "'><i class='fa fa-edit'></i></span>";
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
                                    <h4 class="app-card-title">Liste des Stagiaires Affectés</h4>
                                </div>
                            </div>
                        </div>
                        <div class="app-card-body p-3 p-lg-4">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>CIN</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Tel</th>
                                    <th>Date Début Stage</th>
                                    <th>Date Fin Stage</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $db->select("trainees as t",'t.*,ai.date_start,ai.date_end','RIGHT JOIN attribution_internship as ai  ON ai.id_trainee = t.id');
                                $res = $db->getResult();
                                for ($i = 0; $i < sizeof($res); $i++) {
                                    echo "<tr><td>" . $res[$i]['id'] . "</td><td>" . $res[$i]['cin'] . "</td><td>" . $res[$i]['fname'] . "</td><td>" . $res[$i]['lname'] . "</td><td>" . $res[$i]['tel'] ."</td><td>".date('d-m-Y',strtotime($res[$i]['date_start']))."</td><td>".date('d-m-Y',strtotime($res[$i]['date_end']))."</td>";
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
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery-ui.local.fr.js"></script>
<script src="js/affect_internship.js"></script>
</body>
</html>
