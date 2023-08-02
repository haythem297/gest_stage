<?php
include('init.php');
if (isset($_GET['logout'])) {
	session_destroy();
	header('LOCATION:login.php');
}
$uri = ltrim($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_URI'][0]);
if (strpos($uri, '?') !== false)
	$uri = strstr($uri, '?', true);
$title = '';
switch ($uri) {
	case '':
		$title = 'Accueil';
		break;
	case 'index.php':
		$title = 'Accueil';
		break;
	case 'gest_trainees.php':
		$title = 'Gestion de Stagiaires';
		break;
	case 'new_trainee.php':
		$title = 'Nouveau Stagiaire';
		break;
	case 'edit_trainee.php':
		$title = 'Modifier Stagiaire';
		break;
	case 'gest_type_stage.php':
		$title = 'Gestion des Types de Stage';
		break;
	case 'gest_ajout_type_stage.php':
		$title = 'Ajout Types de Stage';
		break;
	case 'gest_update_type_stage.php':
		$title = 'Modifier Type de Stage';
		break;
	case 'gest_scolar_establishments.php':
		$title = 'Gestion des établissements scolaires';
		break;
	case 'gest_new_scolar_establishment.php':
		$title = 'Nouvel établissement scolaire';
		break;
	case 'edit_scolar_establishment.php':
		$title = 'Modifier établissement scolaire';
		break;
	case 'gest_attribution_trainee.php':
		$title = 'Gestion des Attributions des stages';
		break;
	case 'attribution_affect_trainee.php':
		$title = 'Attribution de Stage';
		break;
	case 'attendance_tracking.php':
		$title = 'Suivi des présences';
		break;
	case 'moncompte.php':
		$title = 'Mon compte';
		break;
	case 'configurations.php':
		$title = 'Configurations';
		break;
	case 'new_certif_template.php';
	    $title = 'Nouveau modèle d\'attestation de stage';
	    break;
	case 'edit-certificate-template.php';
	    $title = 'Modifier Modèle d\'attestation de stage';
	    break;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<title><?= $title; ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/jquery-ui.min.css">
	<link rel="stylesheet" href="css/portal.css">
	<link rel="stylesheet" href="css/all.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jdenticon@3.1.1/dist/jdenticon.min.js" async
        integrity="sha384-l0/0sn63N3mskDgRYJZA6Mogihu0VY3CusdLMiwpJ9LFPklOARUcOiWEIGGmFELx" crossorigin="anonymous">
</script>

</head>

<body class="app">
	<header class="app-header fixed-top">
		<div class="app-header-inner">
			<div class="container-fluid py-2">
				<div class="app-header-content">
					<div class="row justify-content-between align-items-center">
						<div class="col-auto">
							<a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
								<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img">
									<title>Menu</title>
									<path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
								</svg>
							</a>
						</div>
						<div class="app-utilities col-auto">
							<div class="app-utility-item app-user-dropdown dropdown">
								<a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
								<svg data-jdenticon-value='<?= $_SESSION['user']['fname'] . ' ' . $_SESSION['user']['lname'] ?>' width="40" height="40"></svg>
								 <?= $_SESSION['user']['fname'] . ' ' . $_SESSION['user']['lname'] ?></a>
								<ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
									<li><a class="dropdown-item" href="moncompte.php">Mon Compte</a></li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li><a class="dropdown-item" href="?logout">Déconnexion</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="app-sidepanel" class="app-sidepanel">
			<div id="sidepanel-drop" class="sidepanel-drop"></div>
			<div class="sidepanel-inner d-flex flex-column">
				<a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
				<div class="app-branding">
					<a class="app-logo" href="index.php"><span class="logo-text">Gestion Stages<img src="cpg.png" alt="Girl in a jacket" width="70" height="70"></span></a>
				</div>
				<nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
					<ul class="app-menu list-unstyled accordion" id="menu-accordion">
						<li class="nav-item">
							<a class="nav-link<?php if (($uri == 'index.php')||($uri == '')) echo ' active'; ?>" href="index.php">
								<span class="nav-icon">
									<i class="fad fa-home-alt"></i>
								</span>
								<span class="nav-link-text">Accueil</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if (($uri == 'gest_trainees.php') || ($uri == 'new_trainee.php') || ($uri == 'edit_trainee.php')|| ($uri == 'attendance_tracking.php')) echo ' active'; ?>" href="gest_trainees.php">
								<span class="nav-icon">
									<i class="fad fa-user-graduate"></i>
								</span>
								<span class="nav-link-text">Gestion des Stagiaires</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if (($uri == 'gest_type_stage.php') || ($uri == 'gest_ajout_type_stage.php') || ($uri == 'gest_update_type_stage.php')) echo ' active'; ?>" href="gest_type_stage.php">
								<span class="nav-icon">
									<i class="fas fa-clipboard-list-check"></i>
								</span>
								<span class="nav-link-text">Gestion des Types de Stage</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if (($uri == 'gest_scolar_establishments.php') || ($uri == 'gest_new_scolar_establishment.php') || ($uri == 'edit_scolar_establishment.php')) echo ' active'; ?>" href="gest_scolar_establishments.php">
								<span class="nav-icon">
									<i class="fad fa-building"></i>
								</span>
								<span class="nav-link-text">Gestion des Etablissements</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if (($uri == 'gest_attribution_trainee.php')||($uri=='attribution_affect_trainee.php')) echo ' active'; ?>" href="gest_attribution_trainee.php">
								<span class="nav-icon">
									<i class="fas fa-clipboard-user"></i>
								</span>
								<span class="nav-link-text">Attributions Stages</span>
							</a>
						</li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (($uri == 'configurations.php')||($uri=='new_certif_template.php')||($uri=='edit-certificate-template.php')) echo ' active'; ?>" href="configurations.php">
                                <span class="nav-icon">
                                    <i class="fad fa-cog"></i>
                                </span>
                                <span class="nav-link-text">Configurations</span>
                            </a>
                        </li>
					</ul>
				</nav>
			</div>
		</div>
	</header>