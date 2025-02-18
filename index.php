<?php include('Includes/header.php');
include('connection.php'); 


include('connection.php');
error_reporting(0);

$query="SELECT * FROM ss_company_job ORDER BY job_id DESC";
//$data=mysqli_query($conn,$query);

//$total=mysqli_num_rows($data);
//$result=mysqli_fetch_assoc($data);
$result=$conn->query($query);




?>



    <div class="container">
      
      <div class="row justify-content-center">
          <div class="col-md-8 mt-4">
              <div class="input-group ">
                <input type="text" class="form-control form-control-lg" placeholder="Job Title, Keywords, Company" >
                <input type="text" class="form-control form-control-lg" placeholder="Location" >
                
                <button class="btn theme-button-dark text-light" type="button" >Search</button>
              </div>
          </div>
      </div>

      <div class="row mt-5 gy-4">
        <h3>Recent Jobs</h3>
        <?php while($row=$result->fetch_assoc()){ ?>

        <div class="col-md-4 col-sm-12">
          <div class="card theme-border-light">

          

            
            <div class="card-body">
              <h5 class="card-title"><a href="job-details.php?id=<?php echo $row["job_id"];?>" class="text-decoration-none"><?php echo $row["job_title"]; ?></a></h5>
              <a href="company-details.php" class="text-decoration-none"><?php echo $row["company_name"];?></a>
              <p class="card-text"><i class="fa-solid fa-location-dot"></i><?php echo $row["location"]; ?></p>
              <p class="card-text"><i class="fa-solid fa-clock"></i> <?php echo $row["date"]; ?></p>
              <a href="job-details.php?id=<?php echo $row["job_id"];?>" class="btn theme-button-light text-light"><i class="fa-solid fa-eye"></i> View Details</a>
            </div>
            
          </div>
        </div>
        
      
        <?php }?> 
      </div>


<!-- Pagination Start Here -->
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center my-4">
          <li class="page-item disabled">
            <a class="page-link">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>

    </div>

<?php include('Includes/footer.php'); ?>

