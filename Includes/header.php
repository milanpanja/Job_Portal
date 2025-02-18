<?php
  $baseurl='http://localhost/Job-Portal/';
?>
<?php session_start();

?>





<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Portal - Skill Seekers</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="Assets/Css/style.css">

    <nav class="navbar navbar-expand-lg theme-background-dark sticky-top">
      <div class="container">
        <a class="navbar-brand text-light" href="index.php"><h2>SkillSeekers</h2></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link text-light" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="contact.php">Contact Us</a>
            </li>
          </ul>
        </div>
        

        <div class="dropdown mx-2">
          <a class="btn theme-button-light text-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-user"></i> User
          </a>
         <?php  session_start(); // Start session to track user login

            if (isset($_SESSION['USER_ID'])) { ?> 

          <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="User/profile.php"><i class="fa-solid fa-user"></i>Profile</a></li>
            <li><a class="dropdown-item" href="user-logout.php" ><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>

         
           </ul>

      
            <?php } else { ?>

          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="user-register.php">Register</a></li>
            <li><a class="dropdown-item" href="user-login.php">Login</a></li>


           
          </ul>
          <?php } ?>
        </div>

        <div class="dropdown">
          <a class="btn theme-button-light text-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-user-plus"></i> Company
          </a>

          <?php  session_start(); // Start session to track user login

            if (isset($_SESSION['COMPANY_ID'])) { ?> 

            <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="Company/profile.php"><i class="fa-solid fa-user"></i>Profile</a></li>
            <li><a class="dropdown-item" href="company-logout.php" ><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>

         
           </ul>


           <?php } else { ?>

          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="company-register.php">Register</a></li>
            <li><a class="dropdown-item" href="company-login.php">Login</a></li>
           
          </ul>
          <?php } ?>
        </div>

        



                

      </div>
    </nav>

  </head>
  <body class="theme-background-light">
    