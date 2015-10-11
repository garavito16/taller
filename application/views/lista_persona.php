<div class="container">
	<fieldset class="col-sm-12" >
	    <legend>Listado :</legend>
		<div class="table-responsive">
			<table data-toggle="table" class="table table-bordered table-striped table-hover m-tabla tabla-web" fixed-tabla>
				<thead>
					<tr>
						<th style="text-align: center;">Nombre</th>
						<th style="text-align: center;">Apellidos</th>
						<th style="text-align: center;">Dni</th>
						<th style="text-align: center;" colspan="2">Operaciones</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($data as $valor) : ?>
					<tr >
						<td><?php  echo $valor->nombres;?></td>
						<td><?php  echo $valor->apellidos;?></td>
						<td><?php  echo $valor->dni;?></td>
						<td width="20"><?php echo form_open('cpersona/buscarPersona'); ?>
							<input type="hidden" name="id" value="<?php echo $valor->id?>">
							<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Modificar</button>
							<?php echo form_close(); ?>
						</td>
						<td width="20">
							<?php echo form_open('cpersona/eliminarPersona'); ?>
							<input type="hidden" name="id" value="<?php echo $valor->id?>">
							<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp;Eliminar</button>
							<?php echo form_close(); ?>
						</td>
					</tr>
				<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</fieldset>
</div>



