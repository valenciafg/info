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
//jQuery(document).ready(function() {
/*$(document).on("change", ".subtype-select", function(){
            if ($(this).val() !== ''){
                $.ajax({
                    url: '<?php echo base_url(); ?>inventory/get_content',
                    type: 'POST',
                    data: {
                        'main_cat': 'office',
                        'data': $(this).val()
                    },
                    beforeSend:function(){
                         $(".clasification-select").html('<option value="">--Cargando--</option>');
                    },
                    success: function(data) {
                        console.log(data);
                        $(".clasification-select").html(data);                        
                    },
                    error: function(request, error){
                        alert("Request: " + JSON.stringify(request));
                    }
                });
            }
        });*/
	var select_estado = $("#select_estado");
	select_estado.change(function(){
	//$(document).on("change", "#select_estado", function(){
		var id=select_estado.val();
		$.ajax({
			url: '<?php echo base_url(); ?>index.php/talleres/get_ciudades',
			type: "POST",		
			//async:true,
			dataType: 'json',  
         	//cache:false,
			data: {'estado' : select_estado.val()},
			/*beforeSend:function(){
				console.log('Cargando');
	             $(".select_ciudad").html('<option value="">--Cargando--</option>');
	        },*/
			success: function(response){ 
				//console.log('asdadas');
				console.log(response);
				//alert(data);
				//$(".select_ciudad").html(data);
				//$(".select_ciudad").html('<option>-selectxxxssssx-</option>');
			},
			//error: function(){
			
			error: function(xhr, status, error) {
		        /*if (status === 'parsererror') {
		                console.log("resptext__" + xhr.responseText)
	            }*/
	          console.log("status: " +status);
	          console.log("error: " +error);
	       }
		});
	});
});
</script>
</html>
