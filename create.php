<?php 

use App\Supports\Validate;
use App\Controllers\StudentController;


 require_once "vendor/autoload.php";

 $student= new StudentController;

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Add new student</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php 

			$msg ='';

            if(isset($_POST['add_student'])){
                    // Get all value from fields //
                    $name = $_POST ['name'];
                    $email = $_POST ['email'];
                    $cell = $_POST ['cell'];
                    $age = $_POST ['age'];
                    $location = $_POST ['location'];
				
                    
            // get validitation //
                    if(empty($name)|| empty($email)|| empty($cell)||empty($age)|| empty($location)){
                       $msg =Validate::msgShow(" All fields are Require");
                    }elseif(Validate::email($email)==false){
							$msg= Validate::msgShow("Invaild Email",'warning');
					}else{
						$photo=Validate::upload_file($_FILES['photo'], 'assets/media/img/');

						$student->dataSent($name, $email, $cell, $age, $location, $photo);
						$msg= Validate::msgShow("Data stable", "success");

					}
            }
    
    
    
    
    
    
    
    
    
    
    ?>
	
	<div class="wrap ">
		<a class="btn btn-sm btn-primary" href="index.php">All students</a>
		<br>
		<br>
		<div class="card shadow">
			<div class="card-body">
				<h2>Add new student</h2>
                <?php validate::msgshower($msg);?>
				
			
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control"  type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control"  type="text">
					</div>
					<div class="form-group">
						<label for="">Age</label>
						<input name="age" class="form-control"  type="text">
					</div>
					<div class="form-group">
						<label for="">location</label>
						<select class="form-control" name="location" id="">
						<option value="">-select-</option>
							<option value="Mirpur">Mirpur</option>
							<option value="Jatrabari">Jatrabari</option>
							<option value="Dhanmondhi">Dhanmondhi</option>
							<option value="Uttora">Uttora</option>
							<option value="Motijhil">Motijhil</option>
							<option value="Sahbagh">Sahbagh</option>
						</select>
					</div>	
				<div class="form-group">
						<label for="">photo</label>
						<input name="photo" class=""  type="file">
					</div>
					<div class="form-group">
						<input name="add_student" class="btn btn-primary" type="submit" value="Sign Up">
					</div>
				</form>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
	<br>

<!-- JS FILES  -->
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
</body>

</html>