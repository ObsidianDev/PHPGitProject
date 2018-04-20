
<!DOCTYPE html>
<html>
<head>
	<title>User Area</title>
	<?php
		include_once('../Controllers/MainController.php');
	?>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</head>
<body>
	<!-- user area, page that a user who's successfully authenticated sees after the login -->
	<h1 style="text-align: center;">User Area</h1>


	<br>
	<br>

	<table class="table table-bordered" border="1" style="margin: 0 auto;width: 30%">

		<thead>
			<tr style="text-align: center;">
		    	<th>Name</th>
		    	<th>Rank</th>
			</tr>
	    </thead>	
	    <?php
	    	echo $outTabe; //variable generated in the constructor that retrieves the table's content according to user rank
	    ?>	
    </table>
    <br>
    <br>
    <div align="center">
		<form method="post">
			<button  type="submit" name="sessDest">Logout</button>
		</form>
	</div>
</body>
</html>