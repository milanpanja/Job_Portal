<?php
session_start();
	include('Includes/header.php');
	
	include('../connection.php');
	if(!isset($_SESSION['COMPANY_ID'])){
		header('location:company-login.php');
		die();

	}	
$user = $_SESSION['COMPANY_EMAIL'];
$que = mysqli_query($conn, "SELECT * FROM ss_company2 WHERE email='$user'");

if ($que && mysqli_num_rows($que) > 0) {
    $row = mysqli_fetch_array($que);
    $id = $row['company_id'];
    $email=$row['email'];
	
} else {
    die("Error fetching company data: " . mysqli_error($conn));
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
					<h3>Post a Job</h3>
				</div>
				<div class="card-body">
					<form method="POST" action="#">
					  <table class="table table-bordered">
					  <tr>
					  		<th>Company Name</th>
					  		<td>
					  			<input type="text"  name="company_name" class="form-control" placeholder="Company Name" Required>
					  		</td>
					  	</tr>
						 

					  	<tr>
					  		<th>Job Title</th>
					  		<td>
					  			<input type="text"  name="title" class="form-control" placeholder="Job Title" Required>
					  		</td>
					  	</tr>
					  	<tr>
					  		<th>Job Description</th>
					  		<td>
					  		<input class="form-control" name="description" placeholder="Job Description" Required>
					  	</td>
					  	</tr>
					  	<tr>
					  		<th>Job Type</th>
					  		<td>
					  			<select class="form-select" name="job-type" Required >
								  <option value="not select">Open this select menu</option>
								  <option value="Full Time">Full Time</option>
								  <option value="Part Time">Part Time</option>
								  <option value="Internship">Internship</option>
								</select>
					  		</td>
					  	</tr>

					  	<tr>
					  		<th>Required Skills</th>
					  		<td>
					  			<input class="form-control" name="re-skills" placeholder="Enter Required Skills" Required>
					  		</td>
					  	</tr>

					  	<tr>
					  		<th>Salary Range <small>(Per Month)</small>		</th>
					  		<td>
					  			<input type="text"  name="salary" class="form-control" placeholder="Salary Range" Required>
					  		</td>
					  	</tr>

					  	<tr>
					  		<th>Location</th>
					  		<td>
					  			<input type="text"  name="location" class="form-control" placeholder="Enter Location" Required>
					  		</td>
					  	</tr>

					  	<tr>
					  		<th>Application Deadline</th>
					  		<td>
					  			<select class="form-select" name="applli-dedline" Required>
								  <option value="not select">Open this select menu</option>
								  <option value="1 week">1 week</option>
								  <option value="2 week">2 week</option>
								  <option value="3 week">3 week</option>
								  <option value="1 month">1 month</option>
								</select>
					  		</td>
					  	</tr>

						  <tr>
					  		<th>Date</th>
					  		<td>
					  			<input type="date"  name="date" class="form-control"  Required>
					  		</td>
					  	</tr>

					  	<tr>
					  		<th colspan="2"><input type="submit" name="job-post" class="btn btn-secondary form-control" value="Post Job"></th>
					  	</tr>
					  </table>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>


<?php
	include('Includes/footer.php');
?>
    
<?php 
include('../connection.php');





if (isset($_POST['job-post'])) {
	include('../connection.php'); 
    $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $job_type = mysqli_real_escape_string($conn, $_POST['job-type']);
    $re_skills = mysqli_real_escape_string($conn, $_POST['re-skills']);
    $salary = mysqli_real_escape_string($conn, $_POST['salary']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $appli_deadline = mysqli_real_escape_string($conn, $_POST['applli-dedline']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);



    $sql = "INSERT INTO ss_company_job 
            (company_name, job_title, job_description, job_type, required_skills, salary_range, location, application_dedline, date, jobp_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
		$stmt = mysqli_prepare($conn, $sql);
		mysqli_stmt_bind_param($stmt, "sssssssssi", $company_name, $title, $description, $job_type, $re_skills, $salary, $location, $appli_deadline, $date, $id);
    
	


		if (mysqli_stmt_execute($stmt)) {
			echo "<script>alert('Job posted successfully!');</script>";
		} else {
			echo "<script>alert('Failed to post job.');</script>";
		}
	
		mysqli_stmt_close($stmt);
	}
?>