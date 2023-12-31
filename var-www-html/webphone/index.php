<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Aula Phone</title>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Icon -->
		<!-- <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"> -->

		<!-- CSS lib -->
		<link rel="stylesheet" href="library/fontawesome-free-5.13.0/css/all.min.css">
		<link rel="stylesheet" href="library/bootstrap-4.5.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/custom.css">

		<!-- JS lib -->
		<script src="library/jquery-3.5.1.min.js"></script>
		<script src="library/jssip-3.5.1.min.js"></script>
		<script src="library/popper.min.js"></script>
		<script src="library/bootstrap-4.5.0/js/bootstrap.min.js"></script>
		<script src="library/sweetalert-2.1.2.min.js"></script>
		<script src="library/easytimer.min.js"></script>
		
	</head>
	<body>
		<div class="container-fluid text-center">
			<!-- setings -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Configuraciones</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Servidor</span>
								</div>
								<input type="text" id="host" class="form-control" value=<?php echo $_GET['server']; ?> />
							</div>
							<div class="input-group mt-3">
								<div class="input-group-prepend" >
									<span class="input-group-text">Puerto</span>
								</div>
								<input type="number" id="port" class="form-control" value=<?php echo $_GET['port']; ?> />
							</div>
							<div class="input-group mt-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Extension</span>
								</div>
								<input type="number" id="user" class="form-control" value=<?php echo $_GET['exten']; ?> />
							</div>
							<div class="input-group mt-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Contraseña</span>
								</div>
								<input type="password" id="secret" class="form-control" value=<?php echo $_GET['secret']; ?> />
							</div>
							<div class="input-group mt-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Usuario</span>
								</div>
								<input type="text" id="userName" class="form-control" value=<?php echo $_GET['user']; ?> />
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-outline-success mt-1" data-dismiss="modal" aria-label="Close">Guardar</button>
						</div>
					</div>
				</div>
			</div>
			<!-- form -->
			<div class="card mt-3 phoneform">
				<!-- sensors -->
				<div class="card-header">
					<div class="row">
						<div class="col-4">
							<button id="status" class="btn btn-outline-danger btn-sm btn-block">Unregistered</button>
						</div>
						<div class="col-4">
							<button id="duration" class="btn btn-outline-secondary btn-sm btn-block" disabled="">00:00:00</button>
						</div>
						<div class="col-4">
							<!-- <button class="btn btn-outline-success btn-sm btn-block" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-ellipsis-v"></i></button> -->
						</div>
					</div>
				</div>
				<div class="card-body">
					<!-- field number -->
					<div class="row">
						<div class="col">
							<input type="text" id="number" class="form-control" placeholder="Número a marcar..." />
						</div>
					</div>
					<!-- numbers -->
					<div class="row mt-2">
						<div class="col-4"><button id="call" class="btn btn-outline-success btn-block"><i class="fas fa-phone-alt"></i></button></div>
						<div class="col-4"><button id="clear" class="btn btn-outline-secondary btn-block"><i class="fas fa-eraser"></i></button></div>
						<div class="col-4"><button id="hangup" class="btn btn-outline-danger btn-block"><i class="fas fa-phone-slash"></i></button></div>
					</div>
					<div class="row mt-2">
						<div class="col-4"><button name="key" value="1" class="btn btn-outline-primary btn-block">1</button></div>
						<div class="col-4"><button name="key" value="2" class="btn btn-outline-primary btn-block">2</button></div>
						<div class="col-4"><button name="key" value="3" class="btn btn-outline-primary btn-block">3</button></div>
					</div>
					<div class="row mt-2">
						<div class="col-4"><button name="key" value="4" class="btn btn-outline-primary btn-block">4</button></div>
						<div class="col-4"><button name="key" value="5" class="btn btn-outline-primary btn-block">5</button></div>
						<div class="col-4"><button name="key" value="6" class="btn btn-outline-primary btn-block">6</button></div>
					</div>
					<div class="row mt-2">
						<div class="col-4"><button name="key" value="7" class="btn btn-outline-primary btn-block">7</button></div>
						<div class="col-4"><button name="key" value="8" class="btn btn-outline-primary btn-block">8</button></div>
						<div class="col-4"><button name="key" value="9" class="btn btn-outline-primary btn-block">9</button></div>
					</div>
					<div class="row mt-2">
						<div class="col-4"><button name="key" value="*" class="btn btn-outline-primary btn-block">*</button></div>
						<div class="col-4"><button name="key" value="0" class="btn btn-outline-primary btn-block">0</button></div>
						<div class="col-4"><button name="key" value="#" class="btn btn-outline-primary btn-block">#</button></div>
					</div>
					<div class="row mt-2">
						<div class="col-4"><button id="mute" class="btn btn-outline-primary btn-block">Mute</button></div>
						<div class="col-4"><button id="transfer" class="btn btn-outline-primary btn-block">Transferencia</button></div>
						<div class="col-4"><button id="hold" class="btn btn-outline-primary btn-block">Hold</button></div>
					</div>
				</div>
				<!-- volume sound -->
				<div class="card-footer">
					<div class="row mt-3">
						<div id="icon" class="col-1">
							<i class="fas fa-volume-up"></i>
						</div>
						<div class="col">
							<input type="range" id="volume" class="custom-range" min="0" max="1" step="0.01" value="0.5" />
						</div>
					</div>
				</div>
			</div>
			<!-- audio -->
			<audio id="localVoice" src="" preload="none" muted autoplay></audio>
			<audio id="remoteVoice" src="" preload="none" autoplay></audio>
			<audio id="songs" src="" preload="none" autoplay></audio>
		</div>
		<!-- CUSTOM JS -->
		<script src="js/custom.js"></script>
	</body>
</html>