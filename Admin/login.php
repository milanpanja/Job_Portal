<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel - Skill Seekers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>Assets/Css/style.css">

  </head>
  <body>
    
    <div class="container">
      <div class="row justify-content-center my-5">
        <div class="col-lg-5">
          <div class="card">
            <div class="card-header bg-dark text-light">
              <h3 class="text-center">Admin Login</h3>
            </div>
            <div class="card-body">

              <label class="form-label"><i class="fa-solid fa-envelope"></i> Email address</label>
              <input type="email" class="form-control form-control-lg mb-3" placeholder="Email" >

              
              <label class="form-label"><i class="fa-solid fa-lock"></i>Paassword</label>
              <input type="password" class="form-control form-control-lg mb-3" placeholder="Password" >
              
              

                <button type="submit" class="btn btn-dark form-control form-control-lg">Login</button>

                


            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>