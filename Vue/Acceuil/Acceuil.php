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
	<div class="container_search col-md-12">
		<div style="width:50%;margin:auto;margin-top:300px;">
			 <div class="col-sm-12">          
			 	<form class="form-inline pull-right" method="post" action="/">            
			 		<input type="text" style="width:400px;height:50px;font-size:1.3em;margin-left: -20%;" name="critere" class="input-sm form-control" placeholder="Recherche">   
			 		<button type="submit" style="height: 50px;;margin-left: -7%;" class="btn btn-primary btnxs"><span class="glyphicon glyphicon-search"></span> Valider</button>             
			 		       
			 	</form> 
	    </div>
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