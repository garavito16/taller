<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
	<link href="<?=base_url()?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<div class="container">

	<div class="form-horizontal">
		<div class="row">

			<div class="col-sm-12">

				<h2>Taller N°1 Jhonny Pacheco :</h2><hr/>
					<br/>
					<?php $atributos = array('class' => 'form-horizontal', 'id' => 'persona'); ?>
					<?php echo form_open("cpersona/$curl",$atributos); ?>
					<?php if(isset($mensaje))echo "<h3>".$mensaje."</h3>"; ?>
					<div class="form-group has-error">
						<label class="col-sm-2 control-label">Nombres :</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="nombres" placeholder="ingrese Nombres" value="<?php echo set_value('nombres',@$listados[0]->nombres); ?>">
							<?php echo '<font color="red">'.form_error('nombres').'</font> ' ?>
						</div>
					</div>
					<div class="form-group has-error">
						<label class="col-sm-2 control-label">Apellidos :</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="apellidos" value="<?php echo set_value('apellidos',@$listados[0]->apellidos); ?>" placeholder="ingrese Apellidos">
							<?php echo '<font color="red">'.form_error('apellidos').'</font> ' ?>
						</div>
					</div>
					<div class="form-group has-error">
						<label class="col-sm-2 control-label">Dni :</label> 
						<div class="col-sm-6">
							<input type="text" class="form-control" name="dni" value="<?php echo set_value('dni',@$listados[0]->dni); ?>" placeholder="ingrese Dni">
							<?php echo '<font color="red">'.form_error('dni').'</font> ' ?>
						</div>
					</div>
					<div class="form-group has-error">
						<label class="col-sm-2 control-label">Correo :</label>
						<div class="col-sm-6">
							<input type="email" class="form-control" name="email" value="<?php echo set_value('email',@$listados[0]->email); ?>" placeholder="hola@gmail.com">
							<?php echo '<font color="red">'.form_error('email').'</font> ' ?>
						</div>
					</div>
						<input type="hidden" class="form-control" name="id" value="<?php echo set_value('id',@$listados[0]->id); ?>">
					<div class="form-group">
						<button class="btn btn-success col-sm-offset-3 col-sm-4" type="submit"><span class="glyphicon glyphicon-floppy-saved"></span>&nbsp;Guardar</button>
					</div>
					<?php echo form_close(); ?>

			</div>

		</div>

	</div>

</div>
	<script src="<?php echo base_url();?>js/jquery.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>