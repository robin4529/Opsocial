<?php 

use App\Controllers\StudentController;


require_once "vendor/autoload.php";

$stu = new StudentController;

if( isset( $_GET['id'])){
        $id = $_GET['id'];

         $data = $stu->Singeldata( $id);

        
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo  $data->name; ?></title>
    <!---------link css files here------->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/style.css">
	
    
</head>
<body>
<div class="container">
        <div class="row mt-5">
            <div class="col-md-8 offset-2">
            <a class="btn btn-primary" href="index.php">Back</a>
            <br>
           
                <div class="card">
                    <div class="card-body">
            <img style="width:300px; height: 300px; border-radius: 50%; display:block; margin:auto" 
            class="img img-fluid" src="assets/media/img/<?php echo  $data->photo; ?>" alt="">
                        <br>
                        <table class="table table-striped">
                            <thead class="table-dark">
                               
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td><?php echo  $data->name; ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo  $data->email; ?></td>
                                </tr>
                                <tr>
                                    <td>Cell</td>
                                    <td><?php echo  $data->cell; ?></td>
                                </tr>
                                <tr>
                                    <td>Age</td>
                                    <td><?php echo  $data->age; ?></td>
                                </tr>
                                <tr>
                                    <td>location</td>
                                    <td><?php echo  $data->location; ?></td>
                                </tr>
                            </tbody>
                        </table>
                     


	<!-- JS FILES  -->
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
</body>
</html>