<?php
include("baglan.php");


if(isset($_POST["kayıt"])){

    $student_no = $_POST["student_no"];
    $name= $_POST["name"];
    $surname = $_POST["surname"];
    
    
    $calistir=mysqli_query($conn,"INSERT INTO `students`(`student_no`, `name`, `surname`) VALUES ('$student_no','$name','$surname')");
    header("location:öğrenciler.php");
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style/css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body class="container">
	<div class="row" style="height: 100%">
		<div class="col-sm-12 my-auto" >
			<div class="w-50 mx-auto"><h2>Yeni Öğrenci Kaydet</h2></div>
			<form class="form-horizontal card card-block w-50 mx-auto bg-light" action="yeniöğrenci.php" method="POST">

            <div class="form-group">
			    	<label for="student_no" class="col-sm-4 control-label">Öğrenci No</label>
			    	<div class="col-sm-10">
			      		<input type="text" name="student_no" class="form-control" id="student_no" placeholder="Öğrenci No" required>
			    	</div>
			  	</div>

            <div class="form-group">
			    	<label for="name" class="col-sm-4 control-label">Ad</label>
			    	<div class="col-sm-10">
			      		<input type="text" name="name" class="form-control" id="name" placeholder="Ad" required>
			    	</div>
			  	</div>

                  <div class="form-group">
			    	<label for="surname" class="col-sm-4 control-label">Soyad</label>
			    	<div class="col-sm-10">
			      		<input type="text" name="surname" class="form-control" id="surname" placeholder="Soyad" required>
			    	</div>
			  	</div>

			  	<div class="form-group">
			    	<div class="col-sm-offset-2 col-sm-10">
			      		<button type="submit" name="kayıt" class="btn btn-primary">Kaydet</button>
			    	</div>
			  	</div>

			</form>
		</div>
	</div>
	
</body>
</html>

<style>

html,
body {
	height: 100%;
}

body {
	margin: 0;
	background: linear-gradient(45deg, #49a09d, #5f2c82);
	font-family: sans-serif;
	font-weight: 100;
}

.container {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
}

</style>