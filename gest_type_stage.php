<?php
include('includes/header.php');
?>
<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<h1 class="app-page-title">Gestion des Types de Stage </h1>
			<div class="row g-12 mb-12">
				<div class="col-12 col-lg-12">
					<div class="app-card app-card-chart h-100 shadow-sm">
						<div class="app-card-header p-3">
							<div class="row justify-content-between align-items-center">
								<div class="col-auto">
									<h4 class="app-card-title">Liste des Types de stage</h4>
								</div>
							</div>
						</div>
						<div class="app-card-body p-3 p-lg-4">
							<table class="table">
								<thead>
									<tr>
										<th>Id</th>
										<th>Type de stage</th>
										<th style="width:55px;"></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$db->select('internship_types','*');
									$res = $db->getResult();
									for ($i = 0; $i < sizeof($res); $i++) {
										echo '<tr><td>'.$res[$i]['id'].'</td><td>'.$res[$i]['type'].'</td><td><span data-bs-toggle="tooltip" data-bs-placement="top" title="Modifier" class="icon edit" data-id="' . $res[$i]['id'] . '"><i class="fa fa-edit"></i></span><span data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer" class="icon delete delete-type-stage" data-id="' . $res[$i]['id'] . '"><i class="fa fa-trash"></i></span></td></tr>';
									}
									?>
								</tbody>
							</table>
							<div class="row">
								<div class="col-md-2">
									<button id="btn-ajout-type-stage" class="btn btn-add">Ajouter</button>
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
<script src="js/gest_internships_types.js"></script>
</body>
</html>