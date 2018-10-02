@extends('layouts.app')
@section('content')  
@section('pagetitle')
  <h3>Formato de configuración</h3>  
@stop
@section('x_search')
	<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
						
		<div class="input-group">
		<input type="text" class="form-control" placeholder="Search for...">
		<span class="input-group-btn">
				  <button class="btn btn-default" type="button">Go!</button> 
			  </span>
		</div>
	</div>
	
@stop

@section('x_content')

    <div class="x_panel">
	    <div class="x_title">
			<h2>Nueva Empresa</h2> &nbsp&nbsp&nbsp
						
			
			<button type="button" class="btn btn-warning " data-toggle="modal" data-target=".responsable">Responsable</button>
		
			<ul class="nav navbar-right panel_toolbox">
			
			  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			  </li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
				<ul class="dropdown-menu" role="menu">
				  <li><a href="#">Settings 1</a>
				  </li>
				  <li><a href="#">Settings 2</a>
				  </li>
				</ul>
			  </li>
			  <li><a class="close-link"><i class="fa fa-close"></i></a>
			  </li>
			</ul>
			<div class="clearfix"></div>
	    </div>
		<div class="x_content">
			<form class="form-horizontal form-label-left" novalidate>

				<p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a></p>
			  
				<span class="section">Información de la Empresa</span>

				
				<div class="item form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tipo. Persona<span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					
						<select id="tipo_identidad" class="form-control col-md-7 col-xs-12" data-validate-length-range="7" data-validate-words="2" name="name" placeholder=" ejemplo" required="required">
							<option value="volvo " selected>Seleccionar</option>
							<option>E.I.R.L</option>
							<option>S.C</option>
							<option>S.A</option>
							<option>S.R.L</option>
							<option>S.A.C</option>
							<option>Fundación</option>
							<option>Asociación</option>
							<option>Unipersonal</option>
							<option>Persona natural</option>
						</select>
					
					</div>
				</div>
				<div class="item form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Razón social<span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					  <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
					</div>
				</div>
				<div class="item form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tipo. Documento<span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					
						<select id="tipo_identidad" class="form-control col-md-7 col-xs-12" data-validate-length-range="7" data-validate-words="2" name="name" placeholder=" ejemplo" required="required">
							<option value="volvo " selected>Seleccionar</option>
							<option>NIT</option>
							<option>RUT</option>
						</select>
					
					</div>
				</div>
				
				<div class="item form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">No. Documento <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					  <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
					</div>
				</div>
				<div class="item form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telefono fijo <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					  <input type="tel" id="telephone" name="phone" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
					</div>
				</div>
				<div class="item form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telefono celular </label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					  <input type="tel" id="telephone" name="phone" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
					</div>
				</div>
				<div class="item form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					  <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
					</div>
				</div>
				<div class="item form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Dirección <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					  <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
					</div>
				</div>
				<div class="item form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Barrio</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					  <input id="occupation" type="text" name="occupation" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12">
					</div>
				</div>
				<div class="item form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Ciudad</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					  <input id="occupation" type="text" name="occupation" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12">
					</div>
				</div>
				<div class="item form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Pais </label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					  <input id="occupation" type="text" name="occupation" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12">
					</div>
				</div>
				
				
				<div class="ln_solid"></div>
				<div class="form-group">
					<div class="col-md-6 col-md-offset-3">
					  <button type="submit" class="btn btn-primary">Cancelar</button>
					  <button id="send" type="submit" class="btn btn-success">Guardar</button>
					</div>
				</div>
			</form>
        </div>
		
		  <!-- Productos modal -->		  

		  <div class="modal fade responsable" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-sm">
			  <div class="modal-content">

				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
				  </button>
				  <h4 class="modal-title" id="myModalLabel2">Nuevo Responsable </h4>
				</div>
				<div class="modal-body">
				
					<label for="">Responsable</label>
					<div class="form-group input-sm">
						<input class="form-control input-sm" id="inputsm" placeholder="Nombre completo" type="text">
					</div>
					
					<label for="">Seleccionar Asunto</label>
					<div class="form-group input-sm">
						<select id="tipo_identidad" class="form-control col-md-7 col-xs-12" data-validate-length-range="7" data-validate-words="2" name="name" placeholder=" ejemplo" required="required">
							<option value="volvo " selected>Seleccionar</option>
							<option>COMPRA PRODUCTOS</option>
							<option>COMPRA INTERNA </option>
							<option>OTROS</option>
						</select>
					</div>
				</div>
				<div class="modal-footer"><!--
				  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
				  <button type="submit" class="btn btn-danger">Deshacer</button>
				  <button type="button" class="btn btn-primary">Guardar</button>
				</div>

			  </div>
			</div>
		  </div>
		  <!-- /modals -->
	</div>		
@stop
        <!-- /page content -->
		<!--
		<script type="text/javascript">
			$(document).ready(function(){
				function onFinishCallback(){
				$('#wizard').smartWizard('showMessage','Finish Clicked');
			} 
			});
			
			
		</script>
		-->
@stop
<!--6581128-->
<!--229392650-->