<?php
	include('Includes/header.php');
	include('../connection.php');
	session_start();
error_reporting(0);
include('../connection.php');
session_start();


if(!isset($_SESSION['COMPANY_ID'])){
  header('location:company-login.php');
  die();
}
include('../connection.php');

$user = $_SESSION['COMPANY_EMAIL'];
$que = mysqli_query($conn, "SELECT * FROM ss_company2 WHERE email='$user'");
$row = mysqli_fetch_array($que);
$id = $row['company_id'];


// Fetch jobs from database
$query = mysqli_query($conn, "SELECT * FROM ss_company_job WHERE jobp_id='$id'");

if (!$query) {
    die("Job Query Failed: " . mysqli_error($conn));
}



?>
<?php
require '../connection.php';

// Handle delete request
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $stmt = $conn->prepare("DELETE FROM ss_company_job WHERE job_id = ?");
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        echo "<script>alert('Job Deleted Successfully');</script>";
    } else {
        echo "<script>alert('Error Deleting Job');</script>";
    }
}

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
						      <th scope="col">ID</th>
						      <th scope="col">Job Title</th>
						      <th scope="col">Posted Date</th>
						      <th scope="col">Status</th>
						      <th scope="col">Action</th>
						    </tr>
						  </thead>
						  <tbody>
						  <?php 
						 
						      if (mysqli_num_rows($query) > 0) {
							 while ($row1 =mysqli_fetch_array($query)) { ?>
							 


						    <tr>
						      <th scope="row"><?php echo $row1['job_id'];?></th>
						      <td><?php echo $row1["job_title"]; ?></td>
						      <td><?php echo $row1["date"]; ?></td>
						      <td><span class="badge text-bg-warning">Pending</span></td>

						      <td>
						      	<a href="edit.php?j_id=<?php echo $row1["job_id"];?>" class="btn btn-info"><i class="fa-solid fa-wrench"></i></a>

						      	<a href="manage-jobs.php?delete_id=<?php echo $row1['job_id']; ?>" onclick="return confirm('Are you sure you want to delete this job?');" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>

						      	<a href="view.php?j_id=<?php echo $row1["job_id"];?>" class="btn btn-secondary"><i class="fa-solid fa-eye"></i></a>
						      </td>
						    </tr>

						  <?php 
                                }
							}else { 
                                echo "<tr><td colspan='5' class='text-center'>No jobs found</td></tr>";
							}
                            ?>
                          </tbody>
						</table>
				</div>
			</div>
		</div>
	</div>

</div>


<?php
	include('Includes/footer.php');
?>
    
	