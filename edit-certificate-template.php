<?php
include('includes/header.php');
$db->select('certificates_templates', '*',null,'id='.$db->escapeString($_GET['id']));
$count = $db->numRows();
if($count==0)
    header('Location:configurations.php');
$template = $db->getResult()[0];
$certif_content = htmlspecialchars_decode($template['template_content']);
$certif_content = str_replace('\"','"',$certif_content);
$certif_content = str_replace("\&#039;","'",$certif_content);
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
                                    <h4 class="app-card-title">Modifier modèle d'attestation de stage</h4>
                                </div>
                            </div>
                        </div>
                        <div class="app-card-body p-3 p-lg-4">
                            <form id="edit-certif">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="hidden" name="id_template" id="id_template" value="<?=$template['id'];?>" />
                                                <div class="form-group">
                                                    <input type="text" id="title" name="title" value="<?=str_replace("\&#039;","'",$template['title'])?>" placeholder=" ">
                                                    <label for="title">Titre du modèle</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="custom" for="content">Contenue</label>
                                            <textarea name="content" id="content" placeholder=""><?=$certif_content?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="msg"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-2">
                                    <button id="btn-save-edit-certif" class="btn btn-add">Enregistrer</button>
                                    <button id="btn-preview-certif" class="btn btn-warning">Aperçu</button>
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
<script src="plugins/tinymce/tinymce.min.js"></script>
<script src="plugins/tinymce/langs/fr_FR.js"></script>
<script src="js/printthis.js"></script>
<link rel="stylesheet" href="css/print.min.css">
<script src="js/tinymce_config.js"></script>
<script src="js/gest_certificate_templates.js"></script>
</body>
</html>