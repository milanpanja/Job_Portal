<?php
	include('Includes/header.php');
	include('../connection.php');
	if(!isset($_SESSION['COMPANY_ID'])){
		header('location:company-login.php');
		die();
		
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
					<h3>Profile Management</h3>
				</div>
				<div class="card-body">
					<form method="POST" action="#" enctype="multipart/form-data">
					  <table class="table table-bordered">
					  	<tr>
					  		<th>Company Logo</th>
					  		<td>
					  			<input type="file"  name="logo" class="form-control">
					  		</td>
					  	</tr>

					  	<tr>
					  		<th>Company Name</th>
					  		<td>
					  			<input type="text"  name="companyname" class="form-control" placeholder="Company Name">
					  		</td>
					  	</tr>
					  	<tr>
					  		<th>Email</th>
					  		<td>
					  			<input type="email"  name="email" class="form-control" placeholder="Email">
					  		</td>
					  	</tr>
					  	<tr>
					  		<th>Contact No.</th>
					  		<td>
					  			<input type="tel"  name="contact" class="form-control" placeholder="Contact No.">
					  		</td>
					  	</tr>

					  	<tr>
					  		<th>City</th>
					  		<td>
					  			<input type="text"  name="city" class="form-control" placeholder="Ludhiana">
					  		</td>
					  	</tr>

					  	<tr>
					  		<th>State</th>
					  		<td>
					  			<input type="text"  name="state" class="form-control" placeholder="Punjab">
					  		</td>
					  	</tr>

					  	<tr>
					  		<th>Country</th>
					  		<td>
					  			<input type="text"  name="country" class="form-control" placeholder="India">
					  		</td>
					  	</tr>

					  	<tr>
					  		<th>Address</th>
					  		<td>
					  			<input class="form-control" name="address" ">
					  		</td>
					  	</tr>

					  	<tr>
					  		<th>About Company</th>
					  		<td>
					  			<input class="form-control" name="about_company" >
					  		</td>
					  	</tr>

					  	<tr>
					  		<th colspan="2"><input type="submit" name="submit" class="btn btn-secondary form-control" value="Submit"></th>
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

$user=$_SESSION['COMPANY_EMAIL'];
$que=mysqli_query($conn,"SELECT * FROM ss_company2 WHERE email='$user'");
$row=mysqli_fetch_array($que);
$id=$row['company_id'];



include('../connection.php');
if(isset($_POST['submit'])){
	$company_logo=$_FILES['logo']['name'];
	$companyname=$_POST['companyname'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$country=$_POST['country'];
	$address=$_POST['address'];
	$about=$_POST['about_company'];
	





	//profil Image

	$tmp=explode(".",$company_logo);
    $newfilename=round(microtime(true)).'.'.end($tmp);
    $upload="../uploads/company/".$newfilename;
    move_uploaded_file($_FILES['logo']["tmp_name"],$upload);

$sql="SELECT * FROM ss_company2_data WHERE email='$email'";
$result=mysqli_query($conn,$sql);
$count_email=mysqli_num_rows($result);

if($count_email==0)
{
	 $sql="INSERT INTO `ss_company2_data`(companyLogo,companyName,email,contact,city,state,country,address,aboutCompany,pt_id)VALUES
	 ('$newfilename','$companyname','$email','$contact','$city','$state','$country','$address','$about','$id')";
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




    