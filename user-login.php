<?php include('Includes/header.php');
include ("connection.php");
?>
	<div class="container">
		<div class="row justify-content-center my-5">
			<div class="col-lg-5">
				<div class="card">
					<div class="card-header">
						<h3 class="text-center">User Login</h3>
					</div>
					<div class="card-body">
						<form action="" method="POST">
						
						<input type="email" class="form-control form-control-lg mb-3" placeholder="Email" name="email">

						
						
						<input type="password" class="form-control form-control-lg mb-3" placeholder="Password" name="password">
						
						

						  <input type="submit" name="login" class="btn theme-button-light text-light form-control form-control-lg" value="Login">

						  <p class="text-center mt-3"><a href="user_forgotten_password.php" >Forgotten password?</a></p>

						  <p class="text-center mt-3">Don't have an account? <a href="user-register.php">Sign Up</a></p>

						  </form>
					</div>
				</div>
			</div>
		</div>
	</div>


<?php include('Includes/footer.php'); ?>


<?php
include ('connection.php');

if(isset($_POST['login'])){
    $user=$_POST['email'];
    $pass=$_POST['password'];
	
    $query="SELECT * FROM ss_user WHERE email='$user' && password='$pass' ";
    $result=mysqli_query($conn,$query);
    $total=mysqli_num_rows($result);
    if($total == 1){

		$row=mysqli_fetch_assoc($result);
		$_SESSION['USER_ID']=$row['user_id'];
		$_SESSION['USER_EMAIL']=$row['email'];
        echo'<script>window.location.href = "User/profile-management.php"</script>';
    }else{
        echo'<script>alert("Wrong email or password!");</script>';
    }
}

       
?>