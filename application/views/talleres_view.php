<?php $this->load->view('header');?>
<body role="document">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">          
          <a class="navbar-brand" href="#">Bootstrap theme</a>
        </div>        
      </div>
    </nav>

    <div class="container theme-showcase" role="main">
		<div class="row">
			<div class="col-lg-12">          
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Listado de <?php echo $page;?></h3>
					</div>
					<div class="panel-body">
						<?php $this->load->view('talleres_form');?>						
						<div class="row">
							<div class="col-md-1"></div>
							<div class="col-lg-12" id="listado">         
								<?php $this->load->view('talleres_list');?>						
							</div>        
							<div class="col-md-1"></div>
						</div>
					</div>
				</div>
			</div>        
		</div>		
		<div class="row">
			<div style="text-align:center; padding-top:40px;"><img src="<?php echo base_url(); ?>assets/images/logoblanco.png"></div>
		</div>
    </div> <!-- /container -->    
<?php $this->load->view('footer');?>
</body>
<?php $this->load->view('load_scripts');?>
<script>
$(document).ready(function(){
	var select_estado = $("#select_estado");
	var select_ciudad = $("#select_ciudad");

	select_estado.change(function(){
		var id=select_estado.val();
		$.ajax({
			url: '<?php echo base_url(); ?>talleres/get_ciudades',
			type: "POST",		
			data: {'estado' : select_estado.val()},
			beforeSend:function(){
				console.log('Cargando');
	            $(".select_ciudad").html('<option value="">--Cargando--</option>');
	        },
			success: function(response){ 
				//console.log(response);
				$("#select_ciudad").html(response);
			},	
			error: function(request, error) {
	          console.log("Request: " + JSON.stringify(request));
	          console.log("Error: " + JSON.stringify(error));
	       }
		});
	});

	select_ciudad.change(function(){
		var id=select_estado.val();
		$.ajax({
			url: '<?php echo base_url(); ?>talleres/get_municipios',
			type: "POST",		
			data: {
				'estado' : select_estado.val(),
				'ciudad' : select_ciudad.val()
			},
			beforeSend:function(){
				console.log('Cargando');
	            $(".select_municipio").html('<option value="">--Cargando--</option>');
	        },
			success: function(response){ 
				//console.log(response);
				$("#select_municipio").html(response);
			},	
			error: function(request, error) {
	          console.log("Request: " + JSON.stringify(request));
	          console.log("Error: " + JSON.stringify(error));
	       }
		});
	});

	 $('#example').DataTable({
	 	order: [[ 2, "asc" ],[ 3, "asc" ],[ 4, "asc" ]],
	 	columnDefs: [{ "width": "15%", "targets": 0 },
 						{ "width": "25%", "targets": 1 },
 						{ "width": "10%", "targets": 5 }
	 	]
	 });
});
</script>
</html>
