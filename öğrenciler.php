<?php



include("baglan.php");

$result = mysqli_query($conn,"SELECT * FROM students");
$data = $result->fetch_all(MYSQLI_ASSOC);

if(isset($_POST["delete"])){

  $student_id= mysqli_real_escape_string( $conn, $_POST["id_to_delete"] );
  
  $not= "DELETE FROM students where id = '$student_id'";
  $result = mysqli_query($conn,$not);
  header("location:öğrenciler.php");
  
}

?>

<!DOCTYPE html>
<html>
<div class="row">
	 		<div class="col-md-10 mx-auto">
	 			<div class="row">
			 		<div class="col-md-2">
                        <a href="logout.php" class="close"></a>                        
			 		</div>	


           <div class="col-md-2">
			 			<a href="yeniöğrenci.php" class="yeniöğrenci"></a>
			 		</div>	
	 			</div>
	 			
	 		</div>
	 	</div> 

<div class="container">
	<table>
		<thead>
			<tr>
            <th>Öğrenci No</th>
            <th>İsim</th>
            <th>Soyisim</th>
            <th>Notları Görüntüle</th>
            <th>Güncelle</th>
            <th>Sil</th>
    
			</tr>
		</thead>
		<tbody>
        <?php foreach($data as $row): ?>
  <tr>
    <td><?= htmlspecialchars($row['student_no']) ?></td>
    <td><?= htmlspecialchars($row['name']) ?></td>
    <td><?= htmlspecialchars($row['surname']) ?></td>
    <td><a href="notlar.php?student_no=<?php echo $row['student_no'];?>">Notları Görüntüle</a></td>
    <td><a href="uptadestu.php?id=<?php echo $row['id'];?>">Güncelle</a></td>

    <form class="form-horizontal card card-block w-50 mx-auto bg-light" action="öğrenciler.php" method="POST">
    <input type="hidden" name="id_to_delete" class="form-control" id="id_to_delete" value="<?php echo $row['id'];?>">
      <td><input type="submit" name="delete" class="btn btn-danger btn-sm" id="delete" value="Sil"></a></td>
    </form>
    
    
      
  </tr>
  <?php endforeach ?>
		</tbody>
	</table>
</div>

<style>


.close {
  position: absolute;
  right: 388px;
  top: 132px;
  width: 32px;
  height: 32px;
  opacity: 0.6;
}
.close:hover {
  opacity: 1;
}
.close:before, .close:after {
  position: absolute;
  left: 15px;
  content: ' ';
  height: 33px;
  width: 4px;
  background-color: red;
}
.close:before {
  transform: rotate(45deg);
}
.close:after {
  transform: rotate(-45deg);
}

.yeniöğrenci {
  position: absolute;
  right: 438px;
  top: 132px;
  width: 32px;
  height: 32px;
  opacity: 0.6;
}
.yeniöğrenci:hover {
  opacity: 1;
}
.yeniöğrenci:before, .yeniöğrenci:after {
  position: absolute;
  left: 15px;
  content: ' ';
  height: 33px;
  width: 4px;
  background-color: black;
}
.yeniöğrenci:before {
  transform: rotate(90deg);
}
.yeniöğrenci:after {
  transform: rotate(0deg);
}
    

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