<?php
include('includes/header.php');
$db->select('internship_types', '*', null, 'id=' . $db->escapeString($_GET['id']));
$res = $db->getResult()[0];
?>
<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<h1 class="app-page-title">Gestion des Types de Stage</h1>
			<div class="row g-12 mb-12">
				<div class="col-12 col-lg-12">
					<div class="app-card app-card-chart h-100 shadow-sm">
						<div class="app-card-header p-3">
							<div class="row justify-content-between align-items-center">
								<div class="col-auto">
									<h4 class="app-card-title">Modifier Type de Stage</h4>
								</div>
							</div>
						</div>
						<div class="app-card-body p-3 p-lg-4">
							<form id="frmtypestage">
								<div class="row">
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="hidden" name="id" value="<?=$res['id'];?>">
													<input type="text" id="type_de_stage" name="type_de_stage" value="<?=$res['type'];?>" placeholder=" ">
													<label for="type_de_stage">Type de stage</label>
												</div>
												<div class="form-group">
													<div class="msg"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
							<div class="row">
								<div class="col-md-2">
									<button id="btn-save-update-type-stage" class="btn btn-add">Enregistrer</button>
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