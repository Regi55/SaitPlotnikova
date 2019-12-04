<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" >
<title>Журналы</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<link rel="shortcut icon" type="x-icon">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<meta charset="UTF-8">
</head>
 
<body style="background-image:url(images/fon.jpg)" width="100%" >

	<div id="header">
	<h1>Современные журналы</h1>
	</div>
		 
	<div id="mainmenu">
	    <ul>
		  <li><a href="home.php" >Главная</a></li>
          <li><a href="home1.php" >Добавить информацию</a></li>
	      <li><a href="home2.php">Просмотр сведений</a></li>
	    </ul>
	</div>
	
	<div class="fo">
	<form name='myForm' id="f1">
 
   <span class="input-group-addon">Поиск</span>
				<input type="text" name="search_text" id="search_text"  class="form-control" />
   </div>
  
</form>
<div id="result"></div>
						
			<script>
				$(document).ready(function(){
				load_data();

				function load_data(query) {
					$.ajax({
							url:"ayax.php",
							method:"POST",
							data:{query:query},
							success:function(data){
									$('#result').html(data);
							}
					});
				}
				$('#search_text').keyup(function(){
					var search = $(this).val();
					if(search != ''){
							load_data(search);
					}
				else {
					load_data();
				}
				});
				});
			</script>

</body>
</html>