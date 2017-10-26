<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Webo-facto | Moteur de recherche</title>
	<link rel="stylesheet" type="text/css" href="Assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="Assets/css/jquery.autocomplete.css">
	<link rel="stylesheet" href="Assets/bootstrap/css/bootstrap-select.min.css">
</head>
<body>
	<div class="row" style="margin-top : 15px;">
		<div class="col-sm-1"></div>
		<div class="container_search" style="text-align: left;">
			<div class="col-sm-11 left">          
				 	<form class="form-inline " method="post" action="/">            
				 		<input type="text" style="width:500px;height:50px;font-size: 1.3em;" name="critere" id="input_recherche" class="input-sm form-control" placeholder="Recherche">            
				 		<button type="submit" style="height: 50px;" class="btn btn-primary btnxs"><span class="glyphicon glyphicon-search"></span> Valider</button>          
				 	</form> 
		    </div>
    	</div>
    </div>
    <hr>
    <div class="row" style="margin-top: 15px;">
    	<div class="col-sm-1"></div>
    	<div class="col-sm-10 form-group container_resultat" >
    		<div style="width:90%;margin:center;margin-top:20px;color:black;font-size: 1.4em;">
    		<?php if(count($resultat)>0){
    			echo "Résultats pour le mots clé \"".$critere."\"";
    		?>

    			 <table class="table table-striped">
	    		 <tbody>
	    		 	<ul>
	    		 	<?php 
	    				foreach ($resultat as $res) {
	    			?>
	    				 <tr>
	       					 <td class="ligne_result"><li><a href="<?php echo $res["lien"];?>" target="_blank"><?php echo $res["title"];?></a></li></td>
	       				 </tr>
	    			<?php
	    				}
	    			?>
	    			</ul>
	    		 </tbody>
	    		 </table>
    		<?php } else
    			{
    				echo "Aucun résultat trouvé pour le mots clé \"".$critere."\"";
    			}
    		?>
    		
    	</div>
		<div class="col-sm-1"></div>	
    </div>
	<script src="Assets/js/jquery-3.2.1.min.js"></script>
	<script src="Assets/js/jquery.autocomplete.js"></script>
	<script src="Assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="Assets/bootstrap/js/bootstrap-select.min.js"></script>
	<script>
		$.ajax({
			  method: "POST",
			  url: "index.php?action=getCritereAutocomplete",
			   success : function(result, status){
			   		result = JSON.parse(result);
			   		$(function() {
					  $("input").autocomplete({
					    source:[result]
					  }); 
					});
               },

               error : function(result, status, err){
               }
			});
	</script>
</body>
</html>