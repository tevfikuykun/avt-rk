<?php
session_start();
include("baglan.php");


if(isset($_POST["delete"])){


  $not_id= mysqli_real_escape_string( $conn, $_POST["id_to_delete"] );
  
  $delete= "DELETE FROM notes where id = '$not_id'";
  $result = mysqli_query($conn,$delete);
  header("location:öğrenciler.php");
  
}

if(isset($_GET['student_no'])){
  $stu_no = mysqli_real_escape_string($conn, $_GET['student_no']);
}


$not= "select * from notes where student_no= $stu_no";

$result = mysqli_query($conn,$not);
$data = $result->fetch_all(MYSQLI_ASSOC);

$toplamkredi=0;
$toplamnot=0;

?>
<!DOCTYPE html>
<html>

<div class="container">
	<table>
		<thead>
  <tr>
    <th>Öğrenci No</th>
    <th>Ders</th>
    <th>Dönem</th>
    <th>Not</th>
    <th>Kredi</th>
    <th>Güncelle</th>
    <th>Sil</th>
  </tr>
  </thead>
		<tbody>
  <?php foreach($data as $row): ?>
  <tr>
    <td><?= htmlspecialchars($row['student_no']) ?></td>
    <td><?= htmlspecialchars($row['ders']) ?></td>
    <td><?= htmlspecialchars($row['dönem']) ?></td>
    <td><?= htmlspecialchars($row['note']) ?></td>
    <?php $toplamkredi=$toplamkredi+ $row['kredi']; ?>
    <td><?= htmlspecialchars($row['kredi']) ?></td>
    <?php 
    $notes=$row['kredi']*$row['note']; 
    $toplamnot=$toplamnot+$notes;
    ?>
    <td><a href="uptadenotes.php?id=<?php echo $row['id'];?>">Güncelle</a></td>
    <form class="form-horizontal card card-block w-50 mx-auto bg-light" action="notlar.php" method="POST">
    <input type="hidden" name="id_to_delete" class="form-control" id="id_to_delete" value="<?php echo $row['id'];?>">
      <td><input type="submit" name="delete" class="form-control" id="delete" value="Sil"></a></td>
    </form>
  </tr>
  <?php endforeach ?>
  <div class="row">
	 		<div class="col-md-10 mx-auto">
	 			<div class="row">
			 		<div class="col-md-2">
			 			<a href="öğrenciler.php" class="btn btn-primary btn-lg active float-right" role="button" aria-pressed="true">Geri Dön</a>
			 		</div>	
           <div class="col-md-2">
			 			<a href="yeniders.php?student_no=<?php echo $row['student_no'];?>" class="btn btn-primary btn-lg active float-right" role="button" aria-pressed="true">Yeni Not Ekle</a>
			 		</div>	
	 			</div>
	 			
	 		</div>
	 	</div> 
         </tbody>
	</table>
<br><br>

<table>
	<thead>
  <tr>
    <th>Not Ortalaması</th>
    <td><?php

    $ort = $toplamnot/$toplamkredi;
      
    if($ort>=84.5 && $ort<=100)
        echo("  " .$ort ."- Notunuz 'AA'");
    else if($ort>=69.5 && $ort<84.5)
        echo("  " .$ort ."- Notunuz 'BB'");
    else if($ort>=59.5 && $ort<69.5)
        echo("  " .$ort ."- Notunuz 'CC'");
    else if($ort>=49.5 && $ort<59.5)
        printf("  " .$ort ."- Notunuz 'DD'");
    else
	echo("  " .$ort ."- Notunuz 'FF'");
?></td>
  </tr>
  </thead>
</table>


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

table {
	width: 800px;
	border-collapse: collapse;
	overflow: hidden;
	box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

th,
td {
	padding: 15px;
	background-color: rgba(255,255,255,0.2);
	color: #fff;
}

th {
	text-align: left;
}

thead {
	th {
		background-color: #55608f;
	}
}

tbody {
	tr {
		&:hover {
			background-color: rgba(255,255,255,0.3);
		}
	}
	td {
		position: relative;
		&:hover {
			&:before {
				content: "";
				position: absolute;
				left: 0;
				right: 0;
				top: -9999px;
				bottom: -9999px;
				background-color: rgba(255,255,255,0.2);
				z-index: -1;
			}
		}
	}
}

</style>