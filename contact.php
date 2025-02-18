<?php include('Includes/header.php');
include ("connection.php");

?>
<div class="container-fluid p-5 bg-light">
	<h1 class="text-center theme-text-dark fw-bold display-5">Contact Us</h1>
</div>
<div class="container">
	<div class="row my-5">
		<div class="col-lg-6">
			<h3 class="my-3">Contact Form</h3>
			<div class="card">
				<div class="card-body">
					
				<form method="POST" action="#">
					<div class="mb-3">
					    <label class="form-label">Name</label>
					    <input type="text" class="form-control" name="name" required>

					</div>
					<div class="mb-3">
					    <label class="form-label">Email</label>
					    <input type="email" class="form-control" name="email" required>
					    
					</div>

					<div class="mb-3">
					    <label class="form-label">Subject</label>
					    <input type="text" class="form-control" name="subject" required>
					    
					</div>
					<div class="mb-3">
					    <label class="form-label">Message</label>
					    <textarea class="form-control" type="text" name="message" required></textarea>
					    
					</div>
					    
					  
					   
					  
					  <button type="submit" name="submit" class="btn theme-button-light text-light">Submit</button>
					</form>
				</div>
				
			</div>
			
		</div>
		<div class="col-lg-6">
			<h3 class="my-3">Contact Information</h3>
			<div class="card theme-border-light	">

	          <div class="card-body">
	          	
	            <h5 class="card-title">MPANJA PVT. LTD.</h5>
	            <p class="card-text"><i class="fa-solid fa-phone"></i> 7029574899</p>
	            <p class="card-text"><i class="fa-solid fa-envelope"></i> milanpanja731@gmail.com</p>
	            
	            
	            
	             <p class="card-text"><i class="fa-solid fa-location-dot"></i> Balpai,Sabang, Paschim Medinipur, West Bengal, India</p>
	            
	            
	          </div>
	        </div>
	        <div class="my-3 theme-border-light	">
	        	<iframe src="https://www.google.com/maps/place/Balpai,+West+Bengal/@22.5034569,86.7351414,227600m/data=!3m1!1e3!4m14!1m7!3m6!1s0x391a83e26053e787:0x348d58059a12db59!2sSamsung+Experience+Store+-+SAS+Teleshop+Pvt.+Ltd.+-+Hambran+Road!8m2!3d30.9166846!4d75.8081948!16s%2Fg%2F11dxdjdchw!3m5!1s0x3a02c9e0b37e2a4f:0x4f5bdb8320957751!8m2!3d22.2153234!4d87.6334451!16s%2Fg%2F12hlwwl3r?hl=en&entry=ttu&g_ep=EgoyMDI1MDIwNS4xIKXMDSoASAFQAw%3D%3D" width="540" height="240" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	    	</div>
		</div>

	</div>

</div>

<?php include('Includes/footer.php'); ?>

<?php 
include('connection.php');


if(isset($_POST['submit']))
{
   
	$name=$_POST['name'];
    $email=$_POST['email'];
	$subject=$_POST['subject'];
    $message=$_POST['message'];
    
    

   




    $sql="SELECT * FROM contact_form WHERE email='$email'";
    $result=mysqli_query($conn,$sql);
    $count_email=mysqli_num_rows($result);

    if($count_email==0)
    {
         $sql="INSERT INTO `contact_form`(name,email,subject,message)VALUES
         ('$name','$email','$subject','$message')";
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
  
}

?>
