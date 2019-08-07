<!DOCTYPE html>
<html lang="en">

 <head>
	<title>Document</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
.custom-form {
	display: flex;
	max-width: 700px;
	margin: 0 auto;
	justify-content: space-between;
	align-items: flex-end;
}
.custom-form * {
	min-width: 170px;
}
.cform-group select {
	width: 100%;
}
@media (max-width: 670px){
	.custom-form {
		flex-direction: column;
		align-items: center;
	}	
	.custom-form *{
		margin:5px auto;
	}
}
</style>
</head> 


<?php
	$servername = "localhost";
	$username = "mkras_rigakis";
	$password = '8sa#DSWcE!y3d9$f';
	$dbname = "mkrasaki297535_rigakisptixiaki";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "SELECT alias
			FROM client_info
			WHERE ip_addr IN(
				SELECT DISTINCT ip_addr_client
				FROM connectio_info
				GROUP BY ip_addr_client)";
?>

<body>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 style="text-align: center;margin-bottom: 60px">Network <span>Charts</span></h1>
			<form class="custom-form" action="test5.php" method="GET">
				<div class="cform-group">	
					<label for="client">Client</label>			
					<select id="client" class="form-control" name="client">
						<?php 
							$sql = mysqli_query($conn, $sql);
							while ($row = $sql->fetch_assoc()){
							?>
								<option value="<?php echo $row['alias']; ?>"><?php echo $row['alias']; ?></option>
								<?php
							// close while loop 
							}
						?>
					</select>
				</div>
				<div class="cform-group">				
					<label for="endServer">End Server</label>
					<select class="form-control" id="endServer" name="endserver">
					    <option value="www.google.com">www.google.com</option>
					    <option value="www.mit.edu">www.mit.edu</option>
					    <option value="www.grnet.gr">www.grnet.gr</option>
					    <option value="www.bbc.co.uk">www.bbc.co.uk</option>
					    <option value="www.ucla.edu">www.ucla.edu</option>
					    <option value="www.caida.org">www.caida.org</option>
					    <option value="www.japan.go.jp">www.japan.go.jp</option>
					    <option value="www.anu.edu.au">www.anu.edu.au</option>
					    <option value="www.inspire.edu.gr">www.inspire.edu.gr</option>
					    <option value="www.youtube.com">www.youtube.com</option>
					</select>
				</div>
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>