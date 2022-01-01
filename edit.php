<?php

use App\Supports\Validate;
use App\Controllers\StudentController;


include_once "vendor/autoload.php";

$updated= new StudentController;

if(isset($_GET['edit_id'])){
        $edit_id =$_GET['edit_id'];

       $data = $updated->Editeddata($edit_id);

}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo  $data->name; ?></title>
   
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
       
    
        
// get validitation //
        if(empty($name)|| empty($email)|| empty($cell)||empty($age)){
           $msg =Validate::msgShow(" All fields are Require");
        }elseif(Validate::email($email)==false){
                $msg= Validate::msgShow("Invaild Email",'warning');
        }else{
            $photo=Validate::upload_file($_FILES['photo'], 'assets/media/img/');

            $student->dataSender($name, $email, $cell, $age, $photo);
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
				<h2>Change your data info</h2>
                <?php 
                    if(isset($msg)){
                        echo $msg;
                    }
                ?>
				
			
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" value="<?php echo  $data->name; ?>" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" value="<?php echo  $data->email; ?>" class="form-control"  type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" value="<?php echo  $data->cell; ?>" class="form-control"  type="text">
					</div>
					<div class="form-group">
						<label for="">Age</label>
						<input name="age" value="<?php echo  $data->age; ?>" class="form-control"  type="text">
					</div>
					<div class="form-group">
				<div class="form-group">
						<label for="">photo</label>
						<input value="photo" class=""  type="file">
					</div>
					<div class="form-group">
                    <input name="add_student" class="btn btn-primary" type="submit" value="Updated data">
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