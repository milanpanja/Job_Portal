<?php include('Includes/header.php');
session_start();
include('connection.php'); 

session_start();
if (!isset($_SESSION['USER_ID'])) {
    echo "<script>alert('Please log in to access this page.'); window.location.href='user-login.php';</script>";
    exit();
}


include('connection.php');
error_reporting(0);

$query="SELECT * FROM ss_company_job ORDER BY job_id DESC";
//$data=mysqli_query($conn,$query);

//$total=mysqli_num_rows($data);
//$result=mysqli_fetch_assoc($data);
$result=$conn->query($query);
$row=$result->fetch_assoc();



?>


<div class="container">
	<div class="row my-3">

		<div class="col-lg-8 ">
			<h3 class="my-3">Job Details</h3>
			<div class="card theme-border-light">

<?php 
include("connection.php");
if (isset($_GET['id'])) {
  $id = intval($_GET['id']);
  $stmt = $conn->prepare("SELECT * FROM ss_company_job WHERE job_id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $results = $stmt->get_result();

  if ($result->num_rows > 0) {
      $rows = $results->fetch_assoc();
  } else {
      echo "User not found.";
      exit();
  }

  $stmt->close();
} else {
  echo "Invalid Request";
  exit();
}

$conn->close();




      
?>



            
            <div class="card-body">
              <h5 class="card-title"><?php echo $rows["job_title"]; ?></h5>
              <a href="#" class="text-decoration-none"><?php echo $rows["company_name"]; ?></a>
              
              <p class="card-text"> <h5>Requirements and skills</h5></p>
              <p class="card-text"><i class="fa-solid fa-fill-drip"></i> <?php echo $rows["required_skills"]; ?>
              </p>
              <p class="card-text"><i class="fa-solid fa-money-bill"></i> <?php echo $rows["salary_range"];?> | month</p>
              <p class="card-text"><i class="fa-solid fa-calendar-days"></i> Type <?php echo $rows["job_type"]; ?>
              </p>
              <p class="card-text"><i class="fa-solid fa-clock"></i> <?php echo $rows["date"]; ?>
              </p>
               <p class="card-text"><i class="fa-solid fa-location-dot"></i> <?php echo $rows["location"]; ?>
               </p>

               <form method="POST" action="appliedJob.php">

              <button type="submit" name="apply" class="btn theme-button-light text-light"><i class="fa-solid fa-arrow-right-to-bracket"></i> Apply Now</button>
               </form>
              <a href="#" class="btn theme-button-dark text-light" title="Save-Job"><i class="fa-regular fa-bookmark"></i></a>

              

            </div>
          </div>
		</div>
		<div class="col-lg-4 ">
			<h3 class="my-3">Related jobs</h3>
      
     
      <?php
          for ($i=0; $i <2 ; $i++) { 
          
            

          ?>
           
         <div class="card theme-border-light mb-4">
        
            
        <div class="card-body">
          <h5 class="card-title"><a href="job-details.php" class="text-decoration-none"><?php echo $row["job_title"]; ?></a></h5>
          <a href="#" class="text-decoration-none"><?php echo $row["company_name"];?></a>
          <p class="card-text"><i class="fa-solid fa-location-dot"></i> <?php echo $row["location"]; ?></p>
          <p class="card-text"></i><?php echo $row["date"]; ?></p>
          <a href="#" class="btn theme-button-light text-light"><i class="fa-solid fa-eye"></i> View Details</a>
        </div>
        
      </div>

  <?php }?> 
      
     
     
			

		</div>
	</div>

</div>
<?php include('Includes/footer.php'); ?>

