<?php
include('includes/header.php');
?>
<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<h1 class="app-page-title">Gestion des établissements scolaires</h1>
			<div class="row g-12 mb-12">
				<div class="col-12 col-lg-12">
					<div class="app-card app-card-chart h-100 shadow-sm">
						<div class="app-card-header p-3">
							<div class="row justify-content-between align-items-center">
								<div class="col-auto">
									<h4 class="app-card-title">Liste des établissements</h4>
								</div>
							</div>
						</div>
						<div class="app-card-body p-3 p-lg-4">
							<table class="table">
								<thead>
									<tr>
										<th>Id</th>
										<th>Type</th>
										<th>Nom</th>
										<th>Tel 1</th>
										<th>Tel 2</th>
										<th>Fax</th>
										<th>Email</th>
										<th>Adresse</th>
										<th style="width:55px;"></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$db->select('scolar_establishment', 'scolar_establishment.*,se.type as t','JOIN scolar_establishment_types se ON se.id=scolar_establishment.type');
									$res = $db->getResult();
									for ($i = 0; $i < sizeof($res); $i++) {
										echo "<tr><td>" . $res[$i]['id'] . "</td><td>" . $res[$i]['t'] . "</td><td>" . $res[$i]['name'] . "</td><td>" . $res[$i]['tel1'] . "</td><td>" . $res[$i]['tel2'] . "</td><td>" . $res[$i]['fax'] . "</td><td>" . $res[$i]['email'] . "</td><td>" . $res[$i]['adress'] . "</td><td><span data-bs-toggle='tooltip' data-bs-placement='top' title='Modifier' class='icon edit' data-id='" . $res[$i]['id'] . "'><i class='fa fa-edit'></i></span><span data-bs-toggle='tooltip' data-bs-placement='top' title='Supprimer' class='icon delete delete-establishment' data-id='" . $res[$i]['id'] . "'><i class='fa fa-trash'></i></span></td></tr>";
									}
									?>
								</tbody>
							</table>
							<div class="row">
								<div class="col-md-2">
									<button id="btn-new-scolar-establishment" class="btn btn-add">Ajouter</button>
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
<script src="js/gest_scolar_establishments.js"></script>
</body>
</html>