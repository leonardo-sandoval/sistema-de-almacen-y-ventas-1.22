<?php 
	
	require_once "clases/Conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();

	$sql="SELECT * from usuarios where email='admin'";
	$result=mysqli_query($conexion,$sql);
	$validar=0;
	if(mysqli_num_rows($result) > 0){
		$validar=1;
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Sistema de ventas </title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="js/funciones.js"></script>
	
<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">

<link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">
<link rel="stylesheet" type="text/css" href="css/menu.css">

<script src="librerias/jquery-3.2.1.min.js"></script>
<script src="librerias/alertifyjs/alertify.js"></script>
<script src="librerias/bootstrap/js/bootstrap.js"></script>
<script src="librerias/select2/js/select2.js"></script>
<script src="js/funciones.js"></script>
</head>
<body style="background-color: #4E5E8C">
	<br><br><br>
	<div class="container-fluid  ">
		<div class="row ">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel panel-heading">Sistema de ventas y almacen</div>
					<div class="panel panel-body">
						<p>
							<img src="img/logoinicio.jpg"  height="95"class="img-fluid" alt="Responsive image">
						</p>
						<form id="frmLogin">
							<label>|Usuario</label>
							<input type="text" class="form-control input-sm" name="usuario" id="usuario">
							<label>|Contraseña</label>
							<input type="password" name="password" id="password" class="form-control input-sm">
							<p></p>
							<span class="btn btn-primary btn-sm" id="entrarSistema">Ingreso</span>
							<?php  if(!$validar): ?>
							<a href="registro.php" class="btn btn-success btn-sm">Registrar</a>
							<?php endif; ?>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){

		vacios=validarFormVacio('frmLogin');

			if(vacios > 0){
				alert("Debes llenar todos los campos!!");
				return false;
			}

		datos=$('#frmLogin').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"procesos/regLogin/login.php",
			success:function(r){

				if(r==1){
					window.location="vistas/inicio.php";
				}else{
					alert("No se pudo acceder :(");
				}
			}
		});
	});
	});
</script>