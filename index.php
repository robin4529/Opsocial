<?php 

use App\Controllers\StudentController;

require_once "vendor/autoload.php";

$student= new StudentController;

if (isset($_GET['delete_id'])) {
	$delete_id= $_GET['delete_id'];
	$student->delete_id($delete_id);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php project</title>
    <!---------link css files here------->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/style.css">
	
    
</head>
<body>
<div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
            <a href="create.php" class="btn btn-primary">Add Student</a>
                <div class="card">
                    <div class="card-body">
                        <h3>All Students Data</h3>
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Sl No</th>
									
									<th>Name</th>
									<th>Email</th>
									<th>Cell</th>
									<th>location</th>
									<th>Age</th>
									<th>Photo</th>
									<th>Action</th>
										
                                  
                                </tr>
                            </thead>
                            <tbody>
							<?php 
									$data= $student->get_data();
								
								while( $d = $data->fetch_object()) :

							
								$i = 1;	   
							?>
                            
                            
                                <tr>
                                    <td> <?php echo  $i;$i++; ?> </td>
									<td><?php echo $d->name;  ?> </td>
								<td><?php echo $d->email;  ?>  </td>
								<td> <?php echo $d->cell; ?> </td>
								<td> <?php echo $d->location ; ?> </td>
								<td> <?php echo $d->age; ?> </td>
                                  
                                    <td>
                                        <img style="width:80px; height:80px;" class="img-fluid"  src="assets/media/img/<?php  echo $d->photo;  ?> " alt=""></td>
									<td>
                                        <a class="btn btn-sm btn-info" href="singel.php?id=<?php  echo $d->id;  ?>">View</a>
							            <a class="btn btn-sm btn-warning" href="edit.php?edit_id=<?php echo $d->id; ?>">Edit</a>
							            <a class="btn btn-sm btn-danger" href="?delete_id=<?php echo $d->id; ?>">Delect</a>
                                    </td>
                                </tr>
								<?php endwhile; ?>
                                
                            </tbody>
                        </table>
                    </div>
                       
                </div>
            </div>
        </div>
    </div>


	<!-- JS FILES  -->
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
</body>
</html>