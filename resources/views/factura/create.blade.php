@extends('layouts.app')
@section('content')  

@section('x_content')

    <div class="x_panel">
	    <div class="x_title"> 
			<h2>Nueva Factura de Compras</h2>
			<div class="clearfix"></div>
	    </div>
		<div class="x_content">
		<form class="form-horizontal" role="form" method="POST" action="{{ url('/factura/') }}">
			{{ csrf_field() }}
			<ul class="list-unstyled timeline">
				<li>
					<div class="block ">
						<div class="tags">
							<a href="" class="tag">
								<span>Paso 1</span>
							</a>
						</div>	
						<div class="block_content">
								<h4>Espacio exclusivo para el Asistente de Gestión Administrativa</h4><br>
								<input type="hidden" id="empre_id" name="empre_id" value="{{ $configuracion->id }}" />
								<input type="hidden" id="cantproductos" name="cantproductos" value="1"/>
							<div class="x_content">
								<div class="panel-default">
									<div class="x_panel panel-heading ">
										<div class="form-horizontal  form-label-left">
											<div class="col-md-2 	col-sm-6 col-xs-12">
												 <label for="single_cal2">Fecha</label>
												<input type="text" class="form-control input-sm  has-feedback-left " id="single_cal2" placeholder="First Name" aria-describedby="inputSuccess2Status2">
												
											</div>
											<div class="col-md-3 col-sm-6 col-xs-12">
												<label for="raz_soc">Empresa</label>
												<input class="form-control input-sm " id="raz_soc" name="raz_soc" type="text" readonly value="{{ $configuracion->raz_soc }}"/>
											</div>
											<div class="col-md-2 col-sm-6 col-xs-12">
												<label for="ex1">Nit. Empresa</label>
												<input class="form-control input-sm " id="num_doc" name="num_doc" type="text" readonly value="{{ $configuracion->num_doc }}" />
											</div>
									
											<div class="col-md-3 col-sm-6 col-xs-12">
												<label for="nom_rea">Realizado</label>
												<input class="form-control input-sm " id="nom_rea" name="nom_rea" type="text" value="{{ Auth::user()->nom_usr . ' ' . Auth::user()->ape_usr }}" readonly />
											
											</div>
											<div class="col-md-2 col-sm-6 col-xs-12">
												<label for="no_fact">No. Factura</label>
												<input class="form-control input-sm  " id="no_fact" name="no_fact" type="text">
												@if ($errors->has('no_fact'))
													<span class="help-block">
														<strong>{{ $errors->first('no_fact') }}</strong>
													</span>
												@endif
											</div>
										</div>
									</div>
									
								</div>
							
							</div>
							<div class="x_content">
								<div class="x_panel ">
									<div class=" row ">	
										<div class=" col-sm-3 col-xs-6 ">
											<div class="form-group">
												<label for="prov_id">Proveedor (*)</label>
												<select id="prov_id" class="form-control input-sm  " name="prov_id" onchange="cambio_proveedores();cargarproductosdeproveedor(); " required>
														<option value="" selected>Seleccionar</option>
														@if(!$proveedores->isEmpty())
															@foreach($proveedores as $proveedor)
																<option value="{{ $proveedor->id}}">{{ $proveedor->raz_soc}} </option>
															@endforeach
														@endif
												</select>
											</div>
										</div>
										
										<div class=" col-sm-3 col-xs-6">
											<div class="form-group">
												<label for="nit_prov">Nit. Proveedor</label>
												<input class="form-control input-sm " id="nit_prov" type="text" name="nit_prov" readonly style="background:rgba(247, 247, 247, 0.57);">
											</div>
										</div>
										
										<div class="col-sm-3 col-xs-6">
											<div class="form-group">
												<label for="direccion_prov">Dirección</label>
												<input class="form-control input-sm  " id="direccion_prov" name="direccion_prov" type="text" readonly style="background:rgba(247, 247, 247, 0.57);">
											</div>	
										</div>
										<div class="col-sm-3 col-xs-6">
											<div class="form-group">
												<label for="ciudad_prov">Ciudad</label>
												<input class="form-control input-sm " id="ciudad_prov" name="ciudad_prov" type="text" readonly style="background:rgba(247, 247, 247, 0.57);">
											</div>
										</div>
										<div class="col-sm-3 col-xs-6">
											<div class="form-group">
												<label for="telefono_prov">Teléfono</label>
												<input class="form-control input-sm " id="telefono_prov" name="telefono_prov" type="text" readonly style="background:rgba(247, 247, 247, 0.57);">
											</div>
										</div>
								
										<div class="col-sm-3 col-xs-6">
											<div class="form-group">
												<label for="mail_prov">E-mail</label>
												<input class="form-control input-sm " id="mail_prov" name="mail_prov" type="text" readonly style="background:rgba(247, 247, 247, 0.57);">
											</div>
										</div>
										<div class="col-sm-3 col-xs-6">
											<label for="cnp_fact">Concepto (*)</label>
											<input class="form-control input-sm " value="FACTURA DE COMPRA " id="cnp_fact" name="cnp_fact" type="text" required>
											@if ($errors->has('cnp_fact'))
												<span class="help-block">
													<strong>{{ $errors->first('cnp_fact') }}</strong>
												</span>
											@endif
										</div>
										<div class="col-sm-3 col-xs-6">
											<div class="form-group">
												<label for="comp_fact">Comprado por (*)</label>
												<input class="form-control input-sm " id="comp_fact" required  name="comp_fact" type="text">
												@if ($errors->has('comp_fact'))
													<span class="help-block">
														<strong>{{ $errors->first('comp_fact') }}</strong>
													</span>
												@endif
											</div>
										</div>
										<div class="col-sm-3 col-xs-6">
											<div class="form-group">
												<label for="form_pag">Forma de pago (*)</label>
												<select class="form-control input-sm  " id="form_pag" name="form_pag" required>
													<option value="" selected>Seleccionar</option>
													<option value="CONTADO">CONTADO</option>
													<option value="CREDITO">CREDITO</option>
												</select>
												@if ($errors->has('form_pag'))
													<span class="help-block">
														<strong>{{ $errors->first('form_pag') }}</strong>
													</span>
												@endif
											</div>
										</div>
								
										<div class="col-sm-3 col-xs-6">
											<div class="form-group">
												<label for="dia_cred">Dias de credito</label>
												<input class="form-control input-sm " id="dia_cred" name="dia_cred"  placeholder="(Dias)" type="text" >
												@if ($errors->has('dia_cred'))
													<span class="help-block">
														<strong>{{ $errors->first('dia_cred') }}</strong>
													</span>
												@endif
											</div>
										</div>
										<div class="col-sm-3 col-xs-6">
											<div class="form-group">
												<label for="tim_entr">Tiempo de entrega (*)</label>
												<input class="form-control input-sm  " id="tim_entr" name="tim_entr" placeholder="(Dias)" type="text" required>
												@if ($errors->has('tim_entr'))
													<span class="help-block">
														<strong>{{ $errors->first('tim_entr') }}</strong>
													</span>
												@endif
											</div>
										</div>
										<div class="col-sm-3 col-xs-6">
											<div class="form-group">
												<label for="otr_fact">Otro</label>
												<input class="form-control input-sm " id="otr_fact" name="otr_fact" type="text" />
												@if ($errors->has('otr_fact'))
													<span class="help-block">
														<strong>{{ $errors->first('otr_fact') }}</strong>
													</span>
												@endif
											</div>
										</div>
										
									</div>		
								</div>		
							</div>											
						</div>
																			
								<div class="panel-heading ">
							<div class=" row ">	
								<div class="col-xs-3"><br/>
										<label for="doc_ocp">Documento OCP</label>
										<select class="form-control " id="doc_ocp" name="doc_ocp">
											<option value="" selected>Seleccionar</option>											
										</select>
								</div>
								<div class="col-xs-4"><br/>
									<h4><h4/><br>
									<button type="button" class="btn btn-primary fa fa-download" onclick="cargarproductosseleccionados({{$productos}});" />
								</div>
							</div>
						</div>
						<div class="panel-body ">	
							<div class="panel panel-default">
								<div class="panel-heading text-center">
									<span><strong><span class="glyphicon glyphicon-th-list"> </span> Productos</strong></span>
									 <button type="button" class="btn btn-success btn-xs left "data-toggle="modal" data-target=".registro" >Registro OCP</button>
									<a  href="/factura/create" class="btn btn-default  btn-xs right" role="button"><i class="glyphicon glyphicon-refresh " aria-hidden="true"></i></a>
								</div>
								<div class="table-responsive">
									<table class="table table-bordered table-hover" id="education_fields">
										<thead>
											<tr >
												<th>#</th>
												<th>Producto</th>
												<th>Unidad</th>
												<th>Cantidad</th>
												<th>IVA. Unt (%)</th>
												<th>Val. Unitario</th>
												<th>Val. Total</th>
												<th><a></a></th>	
								
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													1
													<input type="hidden" id="ordencompra1" name="ordencompra1" value="0"/>
												</td>								
												<td class="nopadding" >
														<select id="producto1" class="form-control " name="producto1" onchange="cambio_productos(1);" required>
															<option value="" selected>Seleccionar</option>
															@if(!$productos->isEmpty())
																@foreach($productos as $producto)
																	<option value="{{ $producto->id}}">{{ $producto->des_prd}} </option>
																@endforeach
															@endif
														</select>
														@if ($errors->has('producto1'))
															<span class="help-block">
																<strong>{{ $errors->first('producto1') }}</strong>
															</span>
														@endif
												</td>
												<td class="nopadding" >
														<select class="form-control  " id="unidad1" name="unidad1" required>
															<option value="" selected>Seleccionar</option>
														</select>
														@if ($errors->has('unidad1'))
															<span class="help-block">
																<strong>{{ $errors->first('unidad1') }}</strong>
															</span>
														@endif
												</td>
								
												<td class="nopadding" >
														<input type="number" class="form-control  " id="cantidad1" name="cantidad1" placeholder="" onchange="calculo_iva_valor(1);" required />
												
												</td>
												<td class="nopadding" >
														<input type="number" class="form-control  " id="ivaunitario1" name="ivaunitario1" value= "19" placeholder="" onchange="calculo_iva_valor(1);" />
												
												</td>
												<td class="nopadding" >
														<input type="number" class="form-control  " id="valorunitario1" name="valorunitario1"  placeholder="" onchange="calculo_iva_valor(1);" required />
												
												</td>
												<td class="nopadding" >
														<input type="text" class="form-control  " id="valortotal1" name="valortotal1" placeholder="" readonly required />
											
												</td>
												
											
												
												<td class="nopadding">
													<div class="input-group-btn">
														<button class="btn btn-sm btn-primary glyphicon glyphicon-plus btn-xs" type="button"  onclick="education_fields({{$productos}});"> <span  aria-hidden="true"></span> </button>
													</div>
												</td>
											</tr>
										</tbody>
							  
									</table>
								</div>
						
							</div>
							<small>Pulse + para agregar otro producto /  Pulse - para eliminar un producto.</small>
						
							<div class="panel-default ">
								<div class="row ">
									<div class="col-xs-9 "><br />
										<label for="obv_fact">Obeservaciones</label><br/>
										<div class="col-md-9 col-sm-9 col-xs-12">
										  <textarea id="obv_fact"  name="obv_fact" class="form-control col-md-7 col-xs-12"></textarea>
										@if ($errors->has('obv_fact'))
											<span class="help-block">
												<strong>{{ $errors->first('obv_fact') }}</strong>
											</span>
										@endif
										</div>
									</div>
									<div class="col-xs-3">
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-4 col-xs-12" align="right" for="subt_fact">SUBTOTAL </label>
											<div class="col-md-8 col-sm-8 col-xs-12  right">
											  <input type="text" id="subt_fact" name="subt_fact"  required="required" class="form-control col-md-7 col-xs-12 "  readonly  style="background:rgba(247, 247, 247, 0.57);">
												@if ($errors->has('subt_fact'))
													<span class="help-block">
														<strong>{{ $errors->first('subt_fact') }}</strong>
													</span>
												@endif
											</div>
										</div>
									
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-4 col-xs-12 " align="right" for="iva_fact"><br/>IVA</label>
											<div class="col-md-8 col-sm-8 col-xs-12  right">
											  <input type="text" id="iva_fact" name="iva_fact"  required="required" class="form-control col-md-7 col-xs-12"  readonly  style="background:rgba(247, 247, 247, 0.57);">
												@if ($errors->has('iva_fact'))
													<span class="help-block">
														<strong>{{ $errors->first('iva_fact') }}</strong>
													</span>
												@endif
											</div>
										</div>
								
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-4 col-xs-12" align="right" for="tol_fact"><br/>TOTAL</label>
											<div class="col-md-8 col-sm-8 col-xs-12  right">
											  <input type="text" id="tol_fact" name="tol_fact"   required="required" class="form-control col-md-7 col-xs-12"  readonly  style="background:rgba(247, 247, 247, 0.57);">
											  @if ($errors->has('tol_fact'))
													<span class="help-block">
														<strong>{{ $errors->first('tol_fact') }}</strong>
													</span>
												@endif
											
											</div>
										</div>
									</div>
								</div>
								
							</div>
							
						</div>
						
						
					</div>
					
				</li>
				
			</ul>
			<div class="form-group right ">	
																	
				<button type="reset"class="btn btn-danger">Borrar</button>
				<input type="submit" class="btn btn-success" value="Guardar"></input>
			</div>
		</form>
        </div>
		
		<!-- registro modal -->		  

		  <div class="modal fade registro" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
					  </button>
					  <h4 class="modal-title" id="myModalLabel2">Registro Consolidado | Orden de Compras  </h4>
					</div>
					<div class="modal-body">
						<div class="table-responsive">
							<table class="table table-bordered table-hover" id="rqs" name="rqs" >
								<thead>
									<tr>
										<th> Código  </th>
										<th> Fecha </th>
										<th> Asunto </th>
										<th> Solicitante</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
		    </div>
			</div>
		  
		<!-- /modals -->

	</div>		
@stop
	<script>
		var producto = 1;
		var primer_producto_cargado = false;
		function education_fields(productos) {
			producto++;
			var objTo = document.getElementById('education_fields')
			var divtest = document.createElement("tbody");
			divtest.setAttribute("class", "form-group tr removeproducto"+producto);
			var rdiv = 'removeproducto'+producto;
			var text = '<tr><td id="ver_num_producto'+(producto)+'">'+
				(producto)+
				'<input type="hidden" id="ordencompra'+(producto)+'" name="ordencompra'+(producto)+'" value="0"/>'+
				'</td>'+
				//Productos
				'<td class="nopadding" >'+
				'<select class="form-control  " id="producto'+(producto)+'" name="producto'+(producto)+'" onchange="cambio_productos('+(producto)+');">'+
				'<option value="" selected>Seleccionar</option>';
				$.each(productos, function(index, element) {
						text = text + '<option value="'+ element.id +'">' + element.des_prd + '</option>';
					});
				text = text +
				'</select></td>'+
				//Unidades
				'<td class="nopadding" >'+
					'<select class="form-control  " id="unidad'+(producto)+'" name="unidad'+(producto)+'"><option value="">Seleccionar</option></select>'+
				'</td>'+
				//Cantidad
				'<td class="nopadding" >'+
					'<div class="form-group"><input type="text" class="form-control  " id="cantidad'+(producto)+'" name="cantidad'+(producto)+'" onchange="calculo_iva_valor('+(producto)+');" required /></div>'+
				'</td>'+	
				//IVA
				'<td class="nopadding" >'+
					'<div class="form-group"><input type="number" class="form-control  " value="19" id="ivaunitario'+(producto)+'" name="ivaunitario'+(producto)+'" onchange="calculo_iva_valor('+(producto)+');" required /></div>'+
				'</td>'+
				//Valor Unitario
				'<td class="nopadding" >'+
					'<div class="form-group"><input type="number" class="form-control  " id="valorunitario'+(producto)+'" name="valorunitario'+(producto)+'" onchange="calculo_iva_valor('+(producto)+');" required /></div>'+
				'</td>'+
				//Valor Total
				'<td class="nopadding" >'+
					'<div class="form-group"><input type="number" class="form-control  " id="valortotal'+(producto)+'" name="valortotal'+(producto)+'" readonly required /></div>'+
				'</td>'+
				
				//Botones
				 '<td class="nopadding" >'+
					'<div class="input-group-btn"><button id="button_eliminar'+(producto)+'" class="btn btn-sm btn-danger glyphicon glyphicon-minus btn-xs" type="button" onclick="remove_education_fields('+ producto +');">'+
						'<span aria-hidden="true"></span>'+
					'</button></div>'+
				'</td></tr>';
			divtest.innerHTML = text;
			objTo.appendChild(divtest)
			$("#cantproductos").val(producto);  
		}
		function remove_education_fields(rid) {
			$('.removeproducto'+rid).remove();
			for(i = rid + 1; i<=producto;i++){
				
				$(".removeproducto"+i).addClass("removeproducto"+(i-1)).removeClass("removeproducto"+(i));
				
				document.getElementById("producto"+i).setAttribute("name", "producto" + (i-1));
				document.getElementById("producto"+i).setAttribute("onchange", "cambio_productos(" + (i-1) + ");");
				document.getElementById("producto"+i).setAttribute("id", "producto" + (i-1));
				
				$("#ver_num_producto"+i).html("<input type='hidden' id='ordencompra"+(i-1)+"' name='ordencompra"+(i-1)+"' value='"+document.getElementById("ordencompra"+(i)).value+"'/>" +(i-1));
				document.getElementById("ver_num_producto"+i).setAttribute("id", "ver_num_producto" + (i-1));
				
				document.getElementById("unidad"+i).setAttribute("name", "unidad" + (i-1));
				document.getElementById("unidad"+i).setAttribute("id", "unidad" + (i-1));
				
				document.getElementById("cantidad"+i).setAttribute("name", "cantidad" + (i-1));
				document.getElementById("cantidad"+i).setAttribute("id", "cantidad" + (i-1));
				
				document.getElementById("ivaunitario"+i).setAttribute("name", "ivaunitario" + (i-1));
				document.getElementById("ivaunitario"+i).setAttribute("onchange", "calculo_iva_valor(" + (i-1) + ");");
				document.getElementById("ivaunitario"+i).setAttribute("id", "ivaunitario" + (i-1));
				
				document.getElementById("valorunitario"+i).setAttribute("name", "valorunitario" + (i-1));
				document.getElementById("valorunitario"+i).setAttribute("onchange", "calculo_iva_valor(" + (i-1) + ");");
				document.getElementById("valorunitario"+i).setAttribute("id", "valorunitario" + (i-1));
				
				document.getElementById("valortotal"+i).setAttribute("name", "valortotal" + (i-1));
				document.getElementById("valortotal"+i).setAttribute("onchange", "calculo_iva_valor(" + (i-1) + ");");
				document.getElementById("valortotal"+i).setAttribute("id", "valortotal" + (i-1));
				
				document.getElementById("button_eliminar"+i).setAttribute("onclick", "remove_education_fields(" + (i-1) + ");");
				document.getElementById("button_eliminar"+i).setAttribute("id", "button_eliminar" + (i-1));
				
				//alert(i);
			}
			producto--;
			$("#cantproductos").val(producto);  
			for(i = 1; i <= producto; i++){
				calculo_iva_valor(i);
			}
		}
	   
	// proveedor
		function cambio_proveedores() {
		   $.get("{{ url('ordencompra/cargarproveedor')}}", 
				{
					option: $('#prov_id').val(),
				}, 
				function(data) {
					$('#nit_prov').val(data.num_doc);
					$('#direccion_prov').val(data.dir_prov);
					$('#ciudad_prov').val(data.ciu_prov);
					$('#telefono_prov').val(data.tel_fij);
					$('#mail_prov').val(data.dir_mail);
			});
	   }
	
	// Producto
	function cambio_productos(rid) {
		   $.get("{{ url('requisicion/cargarunidadesproducto')}}", 
				{
					option: $('#producto'+rid).val(),
					
				}, 
				function(data) {
					var model = $('#unidad'+rid);
					model.empty();
					model.append("<option value='' selected>Seleccionar</option>");
						$.each(data, function(index, element) {
							model.append("<option value='"+ element.id +"'>" + element.des_und + "</option>");
					});
			});
		if(rid == 1)
			primer_producto_cargado = true;
		$('#ordencompra'+rid).val(0);
	}
	
	function cargarproductosdeproveedor() {
		   $.get("{{ url('factura/cargarproveedorocp')}}", 
				{
					option: $('#prov_id').val(),
					
				}, 
				function(data) {
					var model = $('#doc_ocp');
					model.empty();
					model.append("<option value='' selected>Seleccionar</option>");
					model.append("<option value='0'>Todos</option>");
						$.each(data, function(index, element) {
							model.append("<option value='"+ element.id +"'> Orden de Compra #" + element.id + "</option>");
					});
			});
	   }
	
	function cargarproductosseleccionados(productos) {
		   $.get("{{ url('factura/cargarproductosocp')}}", 
				{
					option: $('#doc_ocp').val(),
					prov: $('#prov_id').val(),
				}, 
				function(data) {
					$.each(data, function(index, element) {
						if(producto == 1 && !primer_producto_cargado){
							$('#producto1').val(element.producto.id);
							$('#cantidad1').val(element.cant_prd_fact);
							$('#ordencompra1').val(element.id);
							$('#ivaunitario1').val(element.iva_unt_fact);
							$('#valorunitario1').val(element.val_unt_fact);
							$('#valortotal1').val(element.val_tol_fact);
							
							$.get("{{ url('requisicion/cargarunidadesproducto')}}", 
								{
									option: $('#producto1').val(),
									
								}, 
								function(data) {
									var model = $('#unidad1');
									model.empty();
									model.append("<option value='' selected>Seleccionar</option>");
										$.each(data, function(index, element2) {
											var text_append="<option value='"+ element2.id +"'";
											if(element.unidad_solicitada_factura.id == element2.id){
												text_append = text_append + " selected ";
											}
											text_append = text_append + ">" + element2.des_und + "</option>"
											model.append(text_append);
										});
								});
							primer_producto_cargado = true;
							calculo_iva_valor(1);
						}
						else{
							producto++;
							var objTo = document.getElementById('education_fields')
							var divtest = document.createElement("tbody");
							divtest.setAttribute("class", "form-group tr removeproducto"+producto);
							var rdiv = 'removeproducto'+producto;
							var text = '<tr><td id="ver_num_producto'+(producto)+'">'+ (producto) +
							'<input type="hidden" id="ordencompra'+(producto)+'" name="ordencompra'+(producto)+'" />'+
							'</td>'+
							//Productos
							'<td class="nopadding" >'+
							'<select class="form-control" id="producto'+(producto)+'" name="producto'+(producto)+'" onchange="cambio_productos('+(producto)+');" required>'+
							'<option value="" selected>Seleccionar</option>';
							$.each(productos, function(index, element) {
									text = text + '<option value="'+ element.id +'">' + element.des_prd + '</option>';
								});
							text = text +
							'</select></td>'+
							//Unidades
							'<td class="nopadding" >'+
								'<select class="form-control" id="unidad'+(producto)+'" name="unidad'+(producto)+'" required><option value="">Seleccionar</option></select>'+
							'</td>'+
							//Cantidad
							'<td class="nopadding" >'+
								'<div class="form-group"><input type="number" class="form-control" id="cantidad'+(producto)+'" name="cantidad'+(producto)+'" onchange="calculo_iva_valor('+(producto)+');" required /></div>'+
							'</td>'+	
							//IVA
							'<td class="nopadding" >'+
								'<div class="form-group"><input type="number" class="form-control" value="19" id="ivaunitario'+(producto)+'" name="ivaunitario'+(producto)+'" onchange="calculo_iva_valor('+(producto)+');" required /></div>'+
							'</td>'+
							//Valor Unitario
							'<td class="nopadding" >'+
								'<div class="form-group"><input type="number" class="form-control" id="valorunitario'+(producto)+'" name="valorunitario'+(producto)+'" onchange="calculo_iva_valor('+(producto)+');" required /></div>'+
							'</td>'+
							//Valor Total
							'<td class="nopadding" >'+
								'<div class="form-group"><input type="text" class="form-control" id="valortotal'+(producto)+'" name="valortotal'+(producto)+'" readonly required /></div>'+
							'</td>'+
							//Botones
							'<td class="nopadding" >'+
								'<div class="input-group-btn"><button id="button_eliminar'+(producto)+'" class="btn btn-sm btn-danger glyphicon glyphicon-minus btn-xs" type="button" onclick="remove_education_fields('+ producto +');">'+
									'<span aria-hidden="true"></span>'+
								'</button></div>'+
							'</td></tr>';
							divtest.innerHTML = text;
							objTo.appendChild(divtest);
							$("#cantproductos").val(producto);  
							$('#producto'+producto).val(element.producto.id);
							$('#cantidad'+producto).val(element.cant_prd_fact);
							$('#ivaunitario'+producto).val(element.iva_unt_fact);
							$('#valorunitario'+producto).val(element.val_unt_fact);
							$('#valortotal'+producto).val(element.val_tol_fact);
							$('#ordencompra'+producto).val(element.id);
							var model = $('#unidad'+producto);
							model.empty();
							model.append("<option value='' selected>Seleccionar</option>");
								$.each(element.producto.unidades, function(index, element2) {
									var text_append="<option value='"+ element2.id + "'>" + element2.des_und + "</option>"
									model.append(text_append);
								});
							$('#unidad'+producto).val(element.unidad_solicitada_factura.id);
							calculo_iva_valor(producto);
						}
					});
				});
			}

		function calculo_iva_valor(rid) {
			var iva_und = $('#ivaunitario'+rid).val();
			if (!iva_und || iva_und == ""){
				iva_und = 0;
			}
			var val_und = $('#valorunitario'+rid).val();
			if (!val_und || val_und == ""){
				val_und = 0;
			}
			var cnt = $('#cantidad'+rid).val();
			if (!cnt || cnt == ""){
				cnt = 1;
				$('#cantidad'+rid).val(cnt);
			}
			var val_tot = parseFloat(cnt) * (parseFloat(val_und) + parseFloat(val_und * (iva_und/100)));
			$('#valortotal'+rid).val(val_tot);
			var subt_ocp = 0;
			var iva_ocp = 0;
			var tol_ocp = 0;
			for(i = 1; i <= producto; i++){
				iva_und = $('#ivaunitario'+i).val();
				if (!iva_und || iva_und == ""){
					iva_und = 0;
				}
				val_und = $('#valorunitario'+i).val();
				if (!val_und || val_und == ""){
					val_und = 0;
				}
				cnt = $('#cantidad'+i).val();
				if (!cnt || cnt == ""){
					cnt = 0;
				}
				val_tot = $('#valortotal'+i).val();
				if (!val_tot || val_tot == ""){
					val_tot = 0;
				}
				subt_ocp = parseFloat(subt_ocp) + (parseFloat(cnt) * parseFloat(val_und));
				iva_ocp = parseFloat(iva_ocp) + (parseFloat(cnt) * parseFloat(val_und * (parseFloat(iva_und)/100)));
				tol_ocp = parseFloat(tol_ocp) + parseFloat(val_tot);
			}
			$('#subt_fact').val(subt_ocp);
			$('#iva_fact').val(iva_ocp);
			$('#tol_fact').val(tol_ocp);
			
		}		
	</script> 
@stop
