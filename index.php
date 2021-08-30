<?php
    include 'config.php';
    if(isset($_COOKIE['auth']))
    {
        echo"<script>
              window.location='dashboard.php' 
            </script>";
    }

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $email=$_POST['useremail'];
    $pass=$_POST['userpassword'];
    $saveme=$_POST['saveme'];

    $pass=md($pass);
    
    $sql="SELECT* from auth WHERE email='$email' AND password='$pass'";
    $result=$conn->query($sql);

    if($result->num_rows>0)
    {
        while($row=$result->fetch_assoc())
          {
              if($row['pass']==$pass)
              {
                  $_SESSION['auth']=$row;
                  if(!empty($_POST['saveme']))
                  {
                      setcookie('auth', $row['email'], time()+(86400*30));
                  }
                  echo"<script>alert('LOGIN SUCESSFULLY!');
                        window.location='dashboard.php';</script>";
              }
              else
              {
                  echo"<script>alert('password is incorrect !')</script>";             }
              }
         }
    }
    else
    {
        echo"<script>alert('Account does not exist!')</script>";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/head.php';?>
</head>
<body>
    <?php include 'includes/navbar.php';?>
  <div class="container mt-5">
  <h2  class="text-primary text-center">Login here!</h2>                 
    <form class="signup-form"action="<?php echo $_SERVER['PHP_SELF'] ?>" method ="POST" enctype="multipart/form-data">
        <div class ="mb-3">
         <label  class="form-label">Email<sup class="text-danger">*</sup></label>
         <Input type ="email" name ="usermail" class="form-control"  placeholder="name@example.com" required>
   </div>
   <div class ="mb-3 mt-3">
         <label class="form-label">Password<sup class="text-danger">*</sup></label>
         <Input type ="password" class ="form-control"  name="userpassword" placeholder="Password" required>
   </div>
    <div class="form-check mb-3">
        <input class ="form -check-input" name="saveme" type="checkbox" id="flexCheckDefault">
        <label class ="form-check-label" for="flex check default">Remember me</label>
  </div>
        <div class="row">
         <div class="col-md-6">
         <button input class="btn btn-success d-inline" name="submit" type="Submit">Login</button>
         </div>
        <div class ="col-md-6 text-right">
        <a href="signup.php">New user? Create an Account </a>
</div>
</div>
</form>
</div>
    <?php include 'includes/script.php'; ?>
</body>
</html>
    
