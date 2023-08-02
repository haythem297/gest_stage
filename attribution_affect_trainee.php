<?php
include('includes/header.php');
$db->select('internship_types','*');
$types = $db->getResult();
?>
<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<h1 class="app-page-title">Attributions des stages</h1>
			<div class="row g-12 mb-12">
				<div class="col-12 col-lg-12">
					<div class="app-card app-card-chart h-100 shadow-sm">
						<div class="app-card-header p-3">
							<div class="row justify-content-between align-items-center">
								<div class="col-auto">
									<h4 class="app-card-title">Attribution de stage</h4>
								</div>
							</div>
						</div>
						<div class="app-card-body p-3 p-lg-4">
							<form id="frmaffectstage">
								<div class="row">
									<div class="col-md-8">
										<div class="row">
											<div class="col-md-6">
												<input type="hidden" name="id" value="<?= $_GET['id']; ?>">
												<div class="form-group">
													<input type="text" id="date_debut" class="dtpicker" name="date_debut" placeholder=" ">
													<label for="type_de_stage">date debut</label>
												</div>
												<div class="form-group">
													<input type="text" id="date_fin" class="dtpicker" name="date_fin" placeholder=" ">
													<label for="type_de_stage">date fin</label>
												</div>
                                                <div class="form-group">
                                                    <select name="type_de_stage" id="type_de_stage">
                                                        <?php for($i=0;$i<sizeof($types);$i++){?>
                                                            <option value="<?=$types[$i]['id'];?>"><?=$types[$i]['type'];?></option>
                                                        <?php } ?>
                                                    </select>
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
									<button id="btn-affect-trainee" class="btn btn-add">Enregistrer</button>
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
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery-ui.local.fr.js"></script>
<script src="js/affect_internship.js"></script>
</body>
</html>