<?php
	$message='';
	$error='';
	if(isset($_POST["submit"])){
		if(empty($_POST['name'])){
			$error="Name filed is required";
		}
		elseif (empty($_POST['city'])) {
			$error="City filed is required";	
		}
		elseif (empty($_POST['color'])) {
			$error="Color filed is required";
		}
		else {
			if(file_exists('data.json')){
				$current_data=file_get_contents('data.json');
				$array_data=json_decode($current_data,true);
				$extra_data=array(
					"name"=>$_POST['name'],
					"city"=>$_POST['city'],
					"color"=>$_POST['color']
				);
				$array_data[]=$extra_data;
				$final_data=json_encode($array_data);
				if(file_put_contents('data.json', $final_data)){
					$message="data submited successfully";
				}
			}
			else {
				$error="JSON file doesn't exist";
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>JSON Tutorial</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-lg-4"></div>
			<div class="col-sm-4 col-lg-4">
				<br><br><br><br><br>
				<h2>JSON Data Store</h2>
				<div class="text-danger">
					<?php
						if(isset($error)){
							echo $error;
						}
					?>	
				</div>
				<div class="text-success">
					<?php
						if(isset($message)){
							echo $message;
						}
					?>	
				</div>
				<form action="" method="post">  
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" placeholder="Name..." name="name">
					</div>
					<div class="form-group">
						<label>City</label>
						<input type="text" class="form-control" placeholder="City..." name="city">
					</div>
					<div class="form-group">
						<label>Color</label>
						<input type="text" class="form-control" placeholder="color..." name="color">
					</div>
					<button type="submit" class="btn btn-primary" name="submit">Submit</button>
				</form>
			</div>
			<div class="col-sm-4 col-lg-4"></div>
		</div>
	</div>
</body>
</html>