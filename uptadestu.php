<?php
session_start();
include("baglan.php");



if(isset($_POST["güncelle"])){
    
    $stu_id = $_POST["id"];
    $student_no= $_POST["stu_no"];
    $name= $_POST["name"];
    $surname= $_POST["surname"];
    
    $not= "UPDATE `students` SET student_no='$student_no', name='$name', surname='$surname' where id= '$stu_id'";
  
    $result = mysqli_query($conn,$not);
    header('location:öğrenciler.php');
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
	<div class="container">
	<div class="row" style="height: 100%">
		<div class="col-sm-12 my-auto" >
			<div class="w-50 mx-auto"><h2>Öğrenci Bilgilerini Güncelle</h2></div>
			<form class="form-horizontal card card-block w-50 mx-auto bg-light" action="uptadestu.php" method="POST">
                <?php
                include("baglan.php");
                $id = $_GET["id"];
                $result = mysqli_query($conn,"Select * From students where id= '$id'");
                while($row = mysqli_fetch_array($result)){
                ?>

            <div class="form-group">
			    	<label for="student_no" class="col-sm-4 control-label"></label>
			    	<div class="col-sm-10">
			      		<input type="hidden" name="id" class="form-control" id="id" value="<?php echo $row["id"]?>">
			    	</div>
			  	</div>
                

            <div class="form-group">
			    	<label for="student_no" class="col-sm-4 control-label">Öğrenci No</label>
			    	<div class="col-sm-10">
			      		<input type="text" name="stu_no" class="form-control" id="stu_no" value="<?php echo $row["student_no"]?>">
			    	</div>
			  	</div>

            <div class="form-group">
			    	<label for="name" class="col-sm-4 control-label">Ad</label>
			    	<div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="<?php echo $row["name"]?>" id="name" ></div>
                        
			    	<label for="surname" class="col-sm-4 control-label">Soyad</label>
			    	<div class="col-sm-10">
			      		<input type="text" name="surname" class="form-control" id="surname" value="<?php echo $row["surname"]?>">
			    	</div>
			  	</div>
                <?php } ?>

			  	<div class="form-group">
			    	<div class="col-sm-offset-2 col-sm-10">
			      		<button type="submit" name="güncelle" class="btn btn-primary">Güncelle</button>
			    	</div>
			  	</div>

			</form>
		</div>
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