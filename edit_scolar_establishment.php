<?php
include('includes/header.php');
$db->select('scolar_establishment_types','*');
$types = $db->getResult();
$db->select('scolar_establishment','*',null,'id='.$db->escapeString($_GET['id']));
if($db->numRows()==0)
    header('location:index.php');
$res = $db->getResult()[0];
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
									<h4 class="app-card-title">Modifier établissement scolaire</h4>
								</div>
							</div>
						</div>
						<div class="app-card-body p-3 p-lg-4">
                            <form id="update-scolar-establishment">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="hidden" name="id" value="<?=$res['id'];?>">
                                                    <input type="text" id="name" name="name" value="<?=$res['name'];?>" placeholder=" ">
                                                    <label for="name">Nom</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select name="type" id="type">
                                                        <option value=""></option>
                                                        <?php
                                                        for($i=0;$i<sizeof($types);$i++){
                                                            $selected = "";
                                                            if($types[$i]['id']==$res['type'])
                                                                $selected = " selected";
                                                            echo '<option value="'.$types[$i]['id'].'"'.$selected.'>'.$types[$i]['type'].'</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="type">Type</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="number" id="tel1" name="tel1" value="<?=$res['tel1'];?>" placeholder=" ">
                                                    <label for="tel1">Tel 1</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="number" id="tel2" name="tel2" value="<?=$res['tel2'];?>" placeholder=" ">
                                                    <label for="tel2">Tel 2</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="number" id="fax" name="fax" value="<?=$res['fax'];?>" placeholder=" ">
                                                    <label for="fax">Fax</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" id="email" name="email" value="<?=$res['email'];?>" placeholder=" ">
                                                    <label for="email">Email</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea id="adress" name="adress" placeholder=" "><?=$res['adress'];?></textarea>
                                                    <label for="adress">Addresse</label>
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
                                    <button id="btn-save-update-scolar-establishment" class="btn btn-add">Enregistrer</button>
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