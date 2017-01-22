<!DOCTYPE html>
<html lang="es" class="no-js">
	<head>
		<title>Portal Consulta Boletas</title>		
		<meta charset="utf-8" />	
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta content="Portal Consulta Boletas" name="description" />
		<link rel="SHORTCUT ICON" type="image/x-icon" href="<?= site_url() ?>assets/images/favicon.ico"/>
		<link rel="icon" type="image/x-icon" href="<?= site_url() ?>assets/images/favicon.ico" />
		<meta content="SysGestión." name="AER" />
		<link rel="stylesheet" href="<?= site_url() ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?= site_url() ?>assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?= site_url() ?>assets/css/animate.min.css">
		<link rel="stylesheet" href="<?= site_url() ?>assets/css/all.css">
		<link rel="stylesheet" href="<?= site_url() ?>assets/css/styles.css">
		<link rel="stylesheet" href="<?= site_url() ?>assets/css/styles-responsive.css">
		<link rel="stylesheet" href="<?= site_url() ?>assets/css/themes/jquery-ui.css">		
	</head>	
	<body class="login">				
		<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
			<div class="box-login" style="top:-16px">
				<img src="<?= site_url() ?>assets/images/logo_header.png" width="200px">						
				<center><h3>Consulta de Boletas Electrónicas</h3></center>
						
				<form class="form-horizontal" style="margin-top:26px" action="<?= base_url() ?>index.php/visor" method="POST">
					<div class="form-group">
						<label for="txtRut" class="col-sm-4 control-label">Rut Emisor</label>
						<div class="col-sm-7">
							<input type="text" maxlength="10" class="form-control form-vcg requerido rut" id="txtRut" name="txtRut" value="<?= $rut ?>" placeholder="ej: 55555555-5"/>
						</div>
					</div>
					<div class="form-group">
						<label for="ddlTipoDTE" class="col-sm-4 control-label">Tipo de Documento</label>
						<div class="col-sm-7">
							<select name="ddlTipoDTE" class="form-control" id="ddlTipoDTE">
								<option value="39">Boleta Electrónica</option>
								<option value="41">Boleta no Afecta o Exenta Electrónica</option>
							</select>	
						</div>
					</div>
					<div class="form-group">
						<label for="txtFolio" class="col-sm-4 control-label">Folio Boleta</label>
						<div class="col-sm-7">
							<input type="text" maxlength="20" class="form-control form-vcg num requerido" id="txtFolio" name="txtFolio" value="<?= $folio ?>" placeholder="N° de folio"/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtFchEmis" class="col-sm-4 control-label datepicker">Fecha Emisión</label>
						<div class="col-sm-7">
							<input type="text" maxlength="10" class="form-control form-vcg date requerido" id="txtFchEmis" name="txtEmi" value="<?= $emision ?>" placeholder="ej: 10-01-2015">
						</div>
					</div>						
					<div class="form-group">
						<label for="txtMtoTotal" class="col-sm-4 control-label">Monto Total 
						</label>
						<div class="col-sm-7">
							<input type="text" maxlength="14" class="form-vcg num requerido form-control" id="txtMto" name="txtMto" value="<?= $monto ?>" placeholder="Monto Total Boleta"/>
						</div>
					</div>					
					<div class="form-group">
						<label name="txtMsg" id="txtMsg" class="col-sm-8 control-label lbl">							  
							<?= $mensaje ?>
						</label>
					</div>
					<div class="form-group">
					<label class="col-sm-4 control-label"></label>
	    				<div class="col-sm-7">							  
							<button type="button" class="btn btn-primary pull-right" 
							style="margin-top:-10px; width:140px; background-color:rgba(29, 65, 130, 1); border-color:rgba(34, 44, 94, 0.7)" 
							onclick="valida();">Buscar</button>
						</div>
					</div>
					<div style="display: none">
						<span></span>
						<input name="pdf" type="text" id="urlPDF" value="<?= $pdf ?>">
						<button type="submit" id="btnSubmit">o</button>
					</div>
				</form>		
				<div style="border-top: solid 1px rgba(0, 0, 0, 0.1) !important">				
				<div class="copyright">
					<a href="http://www.sysgestion.cl/productos/sysgestion-erp/modulo-facturacion-electronica/" style=""> Factura Electrónica </a>
					<a href="http://www.sysgestion.cl/productos/sysgestion-erp/" style="margin-left:15px"> Sysgestión ERP </a>
					<a href="http://www.sysgestion.cl/productos/sysgestion-pyme/" style="margin-left:15px"> Sysgestión Pyme </a>
					<a href="http://www.sysgestion.cl/productos/sysgestion-business/" style="margin-left:15px"> Sysgestión Business </a>
					<a href="http://www.sysgestion.cl/productos/sysgestion-pos/" style="margin-left:15px"> Sysgestión POS </a>					
				</div>
				<div class="copyright" >Huérfanos 1373, Of. 909 Santiago Centro, Chile  |  (+56 2) 673 47 20  |  ventas@sysgestion.cl</div>
				</div>
				<div class="copyright">
						2015 © SysGestión Ltda.
				</div>				
			</div>							
		</div>	
		
		<script src="<?= site_url() ?>assets/js/jquery-2.1.1.min.js"></script>		
		<script src="<?= site_url() ?>assets/js/jquery-ui-1.10.2.custom.min.js"></script>
		<script src="<?= site_url() ?>assets/js/bootstrap.min.js"></script>
		<script src="<?= site_url() ?>assets/js/jquery.icheck.min.js"></script>
		<script src="<?= site_url() ?>assets/js/jquery.validate.min.js"></script>	
		<script src="<?= site_url() ?>assets/js/main.js"></script>
		<script src="<?= site_url() ?>assets/js/login.js"></script>
		<script src="<?= site_url() ?>assets/js/jsMain.js"></script>		
		 <script src="<?= site_url() ?>assets/js/jquery-1.10.2.js"></script>
  		<script src="<?= site_url() ?>assets/js/jquery-ui.js"></script>
		<script>
		function valida(){
			var folio = document.getElementById('txtFolio');
			var fecha = document.getElementById('txtFchEmis');
			var monto = document.getElementById('txtMto');
			var rut = document.getElementById('txtRut');
			if(folio.value.length == 0 || 
				fecha.value.length == 0 ||
				monto.value.length == 0 ||
				rut.value.length == 0){
					alert("Complete todos los datos");
					if(folio.value.length == 0)
						folio.style.borderColor='red';
					else
						folio.style.borderColor='#ccc';
					if(fecha.value.length == 0)
						fecha.style.borderColor='red';
					else
						fecha.style.borderColor='#ccc';
					if(monto.value.length == 0)
						monto.style.borderColor='red';
					else
						monto.style.borderColor='#ccc';
					if(rut.value.length == 0)
						rut.style.borderColor='red';
					else
						rut.style.borderColor='#ccc';
			}
			else{
				if(!ValidaFormatoRut(rut.value)){
					rut.style.borderColor='red';
					alert('Rut emisor invalido.');
				}else{
					$('#btnSubmit').click();
				}
			}
		}
		
		function openPDF(){
			var url = document.getElementById('urlPDF').value;
			if(url.length > 1){
				var win = window.open(url,'_blank')//, 'width=800,height=600,scrollbars=yes,status=sÃ­,resizable=yes,screenx=0,screeny=0');
				win.focus();
			}
		}  
			
		$(document).ready(function() {
			_.init();
			$("#txtFchEmis").datepicker({
				dateFormat : 'dd-mm-yy', 
                showAnim : 'slideDown',
                changeMonth: true, 
                changeYear: true, 
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sabado'],
                dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
                dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
                weekHeader: 'Sm' ,
                firstDay: 1                 
			});
			var indice = '<?= $tipodte?>';
			$("#txtFchEmis").keypress(function (){ return false; });
			$("#txtFchEmis").keydown(function (){ return false; });
			if(indice != ''){
				if(indice == '39'){
					document.getElementById("ddlTipoDTE").selectedIndex = '0';
				}
				if(indice == '41'){
					document.getElementById("ddlTipoDTE").selectedIndex = '1';
				}
			}
			//openPDF();
			
			$('#ui-datepicker-div').focusout(function(){
				var fchEmis = document.getElementById('txtFchEmis');
				if(fchEmis.value.lenght == 0){
					fchEmis.style.borderColor = "red";
				}else{
					fchEmis.style.borderColor = "#ccc";
				}
			});

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
			.form-group label.lbl
			{
				font-weight:normal;
				color:red;
				text-align:left;
				margin-left:15px
			}
		</style>
	</body>
</html>

