<?php
	include('Includes/header.php');




	include('../connection.php');
	if(!isset($_SESSION['USER_ID'])){
		header('location:user-login.php');
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
					  		<th>Profile Image</th>
					  		<td>
					  			<input type="file"  name="profileimage" class="form-control" >
					  		</td>
					  	</tr>
					  	<tr>
					  		<th>Full Name</th>
					  		<td>
					  			<input type="text"  name="fullname" class="form-control" placeholder="Full Name">
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
					  		<th>Upload Resume</th>
					  		<td>
					  			<input type="file"   name="image" class="form-control">
					  		</td>
					  	</tr>

					  	<tr>
					  		<th>About Me</th>
					  		<td>
					  			<input class="form-control" name="aboutme" >
					  		</td>
					  	</tr>

					  	<tr>
					  		<th colspan="2"><input type="submit" name="submit" class="btn btn-secondary form-control" values="Submit"></th>
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

$user=$_SESSION['USER_EMAIL'];
$que=mysqli_query($conn,"SELECT * FROM ss_user WHERE email='$user'");
$row=mysqli_fetch_array($que);
$id=$row['user_id'];







include('../connection.php');
if(isset($_POST['submit'])){
	$profileImg=$_FILES['profileimage']['name'];
	$fullname=$_POST['fullname'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$resum=$_FILES['image']['name'];
	$about=$_POST['aboutme'];

	//profil Image
	$tmp1=explode(".",$profileImg);
    $newfilename1=round(microtime(true)).'.'.end($tmp1);
    $upload1="../uploads/user/image/".$newfilename1;
    move_uploaded_file($_FILES['profileimage']["tmp_name"],$upload1);
  
     // Resume 
	$tmp=explode(".",$resum);
    $newfilename=round(microtime(true)).'.'.end($tmp);
    $upload="../uploads/user/pdf/".$newfilename;
    move_uploaded_file($_FILES['image']["tmp_name"],$upload);

$sql="SELECT * FROM ss_user_data WHERE email='$email'";
$result=mysqli_query($conn,$sql);
$count_email=mysqli_num_rows($result);

if($count_email==0)
{
	 $sql="INSERT INTO `ss_user_data`(profileimage,full_name,email,contact,image,aboutme,post_id)VALUES
	 ('$newfilename1','$fullname','$email','$contact','$newfilename','$about','$id')";
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










}



?>
    