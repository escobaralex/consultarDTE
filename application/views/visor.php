<!DOCTYPE html>
<html lang="es" class="no-js">
	<head>
		<title>Consulta de Boletas Electrónicas</title>		
		<meta charset="utf-8" />	
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="Portal Boletas" name="description" />
		<meta content="VCG-Lock S.A." name="author" />
		<link rel="stylesheet" href="<?= site_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?= site_url() ?>assets/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?= site_url() ?>assets/plugins/animate.css/animate.min.css">
		<link rel="stylesheet" href="<?= site_url() ?>assets/plugins/iCheck/skins/all.css">
		<link rel="stylesheet" href="<?= site_url() ?>assets/css/styles.css">
		<link rel="stylesheet" href="<?= site_url() ?>assets/css/styles-responsive.css">
	</head>	
	<body class="login">		
		
	<embed src="manual.pdf" width="500" height="375">

		<script src="<?= site_url() ?>assets/plugins/jQuery/jquery-2.1.1.min.js"></script>		
		<script src="<?= site_url() ?>assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
		<script src="<?= site_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?= site_url() ?>assets/plugins/iCheck/jquery.icheck.min.js"></script>
		<script src="<?= site_url() ?>assets/plugins/jquery.transit/jquery.transit.js"></script>
		<script src="<?= site_url() ?>assets/js/main.js"></script>
		<script src="<?= site_url() ?>assets/js/login.js"></script>		
		
		<script>
		$(document).ready(function() {
			Main.init();
			Login.init();
	  	});
		  	
		</script>
		<style type="text/css">
			
			.form-group
			{
				margin: 15px;
			}
			.form-group label
			{
				font-weight: bold;
			}
		</style>
	</body>
</html>