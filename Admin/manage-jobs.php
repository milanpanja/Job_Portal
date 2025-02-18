<?php
	include('Includes/header.php');
	include('../connection.php');
error_reporting(0);

$query="SELECT * FROM ss_company_job ORDER BY job_id ";
//$data=mysqli_query($conn,$query);

//$total=mysqli_num_rows($data);
//$result=mysqli_fetch_assoc($data);
$result=$conn->query($query);




?>


<div class="container-fluid">
	<div class="row">
		<?php
			include('Includes/sidebar.php');
		?>

		<div class="col-lg-8">
			<div class="card my-5">
				<div class="card-header text-center bg-secondary text-light">
					<h3>Manage Jobs</h3>
				</div>
				<div class="card-body">
					<table class="table table-bordered table-hover">
						  <thead>
						    <tr>
						      <th scope="col">Id</th>
						      <th scope="col">Job Title</th>
						      <th scope="col">Company Name</th>
						      <th scope="col">Posted date</th>
						      <th scope="col">Status</th>
						      <th scope="col">Action</th>
						    </tr>
						  </thead>

						  <?php while($row=$result->fetch_assoc()){ ?>
						  <tbody>
						    <tr>
						      <th scope="row"><?php echo $row["job_id"];?></th>
						      <td><?php echo $row["job_title"];?></td>
						      <td><?php echo $row["company_name"];?></td>
						      <td><?php echo $row["date"];?></td>
						      <td><span class="badge text-bg-success">Approved</span></td>

						      <td>
						      	<a href="#" class="btn btn-success"><i class="fa-solid fa-square-check"></i></a>

						      	<a href="delete.php" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
						      </td>
						    </tr>
						   
						    
						  </tbody>
						  <?php }?> 
						</table>
				</div>
			</div>
		</div>
	</div>

</div>


<?php
	include('Includes/footer.php');
?>
    