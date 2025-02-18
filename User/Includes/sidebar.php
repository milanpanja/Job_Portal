<?php
include('../connection.php'); 


include('../connection.php');
error_reporting(0);
session_start();

$query="SELECT * FROM ss_user ";
//$data=mysqli_query($conn,$query);

//$total=mysqli_num_rows($data);
//$result=mysqli_fetch_assoc($data);
$result=$conn->query($query);
$row=$result->fetch_assoc();




?>

<div class="col-lg-3 p-0">
			<div class="sidebar bg-warning-subtle ">
				<div class="navbar mx-3">
					<ul class="navbar-nav mt-1">
				        <li class="nav-item">
				          <a class="nav-link active" aria-current="page" href="index.php"><h5><i class="fa-solid fa-gauge"></i> Dashboard</h5></a>
				        </li>
				        <li class="nav-item">
				          <a class="nav-link active" href="../index.php"><i class="fa-solid fa-paper-plane"></i> Browse Jobs</a>
				        </li>

				        <li class="nav-item">
				          <a class="nav-link active" href="applied-jobs.php"><i class="fa-solid fa-clipboard"></i> Applied Jobs</a>
				        </li>

				        <li class="nav-item">
				          <a class="nav-link active" href="saved-jobs.php"><i class="fa-solid fa-bookmark"></i> Saved Jobs</a>
				        </li>

				        <li class="nav-item">
				          <a class="nav-link active" href="profile-management.php"><i class="fa-solid fa-gear"></i> Profile Management</a>
				        </li>
						<li class="nav-item">
				          <a class="nav-link active" href="profile.php?id=<?php echo $row["user_id"];?> </a>"><i class="fa-solid fa-user"></i>Profile</a>
				        </li>
				      </ul>
				</div>
			</div>
		</div>