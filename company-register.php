<?php include('Includes/header.php'); 
include ("connection.php");
?>






	<div class="container">
		<div class="row justify-content-center my-5">
			<div class="col-lg-5">
				
				<div class="card">
					<div class="card-header">
						<h3 class="text-center">Company Register</h3>
					</div>
					
					<div class="card-body">
 
						<form method="POST" action="" enctype="multipart/form-data">
						

						Email
						<input type="email" class="form-control form-control-md mb-3" placeholder="Email" name="email" required>

						
                        Password
						<input type="password" class="form-control form-control-md mb-3" placeholder="Password" name="password" required>
						
						

						  <button type="submit" name="submit" class="btn theme-button-light text-light form-control">Signup</button>

						  <p class="text-center mt-3">Already have an account? <a href="company-login.php">Login</a></p>

						</form>


					</div>
				</div>
			</div>
		</div>
	</div>

<?php include('Includes/footer.php'); ?>


<?php 
include('connection.php');


if(isset($_POST['submit']))
{
    
	
    $email=$_POST['email'];

    $password=$_POST['password'];
    
    

    




    $sql="SELECT * FROM ss_company2 WHERE email='$email'";
    $result=mysqli_query($conn,$sql);
    $count_email=mysqli_num_rows($result);

    if($count_email==0)
    {
         $sql="INSERT INTO `ss_company2`(email,password)VALUES
         ('$email','$password')";
         $result=mysqli_query($conn,$sql);
         if($result)
        {
           echo "<script> alert('Data Save Successfully')</script>";
        } 
        else
        {
            echo "<script> alert('Failed to insert Data')</script>";
        }   
    }
    else
    {
        if($count_email>0)
        {
            echo '<script>
            
            alert("Email already Exista !");
            </script>';
        }
    }
    if($result==TRUE)
    {
        $to="milanpanja731@gmail.com";
        $sub="mmm";
        $mes="sksk";
        $heder="From:milanpanja731@gmail.com";
        $mail= mail($to,$sub,$mes,$heder);
        if($mail==TRUE)
        {
            echo "mail send";
        }
    }
    
}

?>
