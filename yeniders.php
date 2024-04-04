<?php
include("baglan.php");



if(isset($_POST['kayıt']))
   {
       $arrayemail = $_POST['cscf'];
       $mail =  $arrayemail['country'];
       $explode=explode('@',$mail);

       $not= $_POST["not"];
       $student_no = $_POST["student_no"];
    
       $cookie=mysqli_query($conn,"Select * from dersler where ders= '$explode[0]'");

       $data = $cookie->fetch_all(MYSQLI_ASSOC);

       foreach($data as $row):
        $kredi=$row["kredi"];
        $ders= $row["ders"];
        $dönem= $row["dönem"];
       endforeach;



       $calistir=mysqli_query($conn,"INSERT INTO `notes`(`student_no`, `ders`, `dönem`, `note`, `kredi`) VALUES ('$student_no','$ders','$dönem','$not','$kredi')");
       header("location:notlar.php?student_no= $student_no");      
        
       
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
			<br><br><br><br>
			<form class="form-horizontal card card-block w-50 mx-auto bg-light" action="yeniders.php" method="POST">
            

                <?php
                include("baglan.php");
                $student_no = $_GET["student_no"];
                $result = mysqli_query($conn,"Select * From students where student_no= '$student_no'");
                while($row = mysqli_fetch_array($result)){
                ?>
                <div class="w-50 mx-auto"><h2>Merhaba <?php echo $row["name"] ?></h2></div>

                <div class="form-group">
			    	<label for="student_no" class="col-sm-4 control-label"></label>
			    	<div class="col-sm-10">
			      		<input type="hidden" name="student_no" class="form-control" id="student_no" value="<?php echo $row["student_no"]?>">
			    	</div>
			  	</div>
    
                <?php } ?>
                
                
                <div class="form-group"> 
                <label for="ders" class="col-sm-4 control-label">Ders</label>
			    	<div class="col-sm-10">              
                <select id="itemType_id" name="cscf[country]" class="input-xlarge">
                    
                    <?php
                        include("baglan.php");
                        $result = mysqli_query($conn,"Select * From dersler");
                        while($row = mysqli_fetch_array($result)){
                        ?>
                        <option value="<?php echo $row['ders']; ?> " > <?php echo $row['ders']; ?> </option>
        
                        <?php } ?>
                        <input type="hidden" name="dönem" class="form-control" id="dönem" value="<?php echo $row["dönem"]?>">
        
                        </select>
                        </div>
                </div>

                <div class="form-group">
			    	<label for="not" class="col-sm-4 control-label">Not</label>
			    	<div class="col-sm-10">
			      	<input type="text" name="not" class="form-control" id="not" required>
			    	</div>
                </div>

                  <div class="form-group">
			    	<div class="col-sm-offset-2 col-sm-10">
			      		<button type="submit" name="kayıt" class="btn btn-primary">Kayıt</button>
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