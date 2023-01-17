<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<div class="container">
	<div class="row">
		<div class="col-2"></div>
		<div class="col-8">
			<div class="card">
				<div class="card-body">
					<h4>
						Login:
					</h4>
					
					<?php
						$classes = array('class' =>"form-control");	

						echo form_open('index/login', $classes);
						echo form_label('Usuário:', 'usuario');
						echo form_input(array('name' => 'user', 'class' => 'form-control', 'type' => 'text'), set_value('user'));
						echo form_label('Senha:', 'Senha');
						echo form_input(array('name' => 'senha', 'class' => 'form-control', 'type' => 'password'));
						echo "<div class='text-center' style='padding-top:3%'>";
						echo form_submit(array('autocomplete'=> 'false', 'name' => 'enviar', 'class' => 'btn btn-success', 'type' => 'submit'), 'Entrar');
						echo "</div>";
						echo form_close();
					?>
				</div>
				<?php 
					if(isset($error)){
						echo "Não foi possível realizar o login, tente novamente;";
					}
				?>
			</div>
		</div>
		<div class="col-2"></div>
	</div>


	</div>



</div>

</body>
</html>
