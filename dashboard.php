<?php
  include 'config.php';
  if(!isset($_COOKIE['auth']))
  {
       if(!isset($_SESSION['auth']))
       {
          echo"<script>alert('Login to continue');
                      window.location='index.php';</script>";
       }
  }
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <?php include 'includes/head.php';?>
 </head>
 <body>
      <?php include 'includes/navbar.php';?>

      <div class="container view-contact mt-3"> 
         <h1 class ="text-center">
          WELCOME, <?php echo $_COOKIE['useremail'];?>!</h1>
     </div> 
      
      <a class="btn btn-primary" href="add_contact.php"
      data-bs-toggle="tooltip" data-bs-placement="right" title="Add new contact">
      <img src="https://img.icons8.com/office/16/000000/add-contact-to-company.png"/>
      </a>
    <hr>
    
    <div class="row">
         <?php
         
         {
              $sql="SELECT * FROM  contacts WHERE userid='$data'";
              $result=$conn->query($sql);
          }
          if(result=num->rows=0)
          {
               while($row=$result->fetch_assoc())
          
    <div class="col-md-3">
    <div class="card">
      <img <?php  echo $row['profile_img']?>src="https://img.icons8.com/office/16/000000/add-contact-to-company.png" class ="card-img-top" alt="user image" >
      <div class="card-body">
         <h5  class="card-title">Name:</h5>
         <h5  class="card-title">Mobille number:</h5>
         <p  class="card-title">Email:</p>
        <div class ="d-flex justify-content-between">
             <a href ="editcontact.php" class="btn-btn-primary"
              data-bs-toggle="tooltip" data-bs-placement="right" title="Edit new contact">
            <img src="https://img.icons8.com/office/16/000000/add-contact-to-company.png"/>
            </a>
         </div>
         <div  class ="d-flex justify-content-between">
         <a href ="delete_contact.php" class="btm-btn-primary"
          data-bs-toggle="tooltip" data-bs-placement="right" title="delete contact">
         <img src="https://img.icons8.com/office/16/000000/add-contact-to-company.png"/>
         </a> 
  </div>
  </div>
  </div>
  </div>
  </div>  }
  else{
       echo"<h3 class='text danger' >NO contact found</h3>"
  }  
           ?> <?php include 'includes/script.php'?>      
    </body>
    </html>
