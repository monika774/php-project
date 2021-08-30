 <?php                     
    
    include'config.php';

    if(!isset($_COOKIE['auth']))
     {
         if(!isset($_SESSION['auth']))
         {
             echo"<script> 
                   alert ('Login to continue');
                   window.location='index.php';</script>";
         }
     }

     $dir ='image/upload/users/';
     if($_SERVER['REQUEST_METHOD']=='POST')
     {
       $name=$_POST['username'];
       $contact=$_POST['usercontact'];
       $email=$_POST['useremail'];
       $pass=$_POST['useraddress'];

       if(isset($_COOKIE['auth']))
       {
              $userid=$_COOKIE['auth'];
       }
       else
       {
              $userid=$_SESSION['auth']['email'];
       }

       $sql1="SELECT 'email' from contacts  WHERE email= '$email' ";

       $result=$conn->query($sql1);    

       if($result->num_rows<=0)

     {
                      
          $path=$dir.$_FILES["profile_img"]['name'];

          if(file_exists($path))
          {
                 echo"<script>
                      alert('This image already in use');
                      </script>";
          }
          else
          {
                     move_uploaded_file($_FILES['profille_img']['tmp_name'],$path);

                     $sql="INSERT INTO contacts(fullname, email,contact,address, profile_img,userid,created) VALUES
                                         ('$name','$email', '$contact','$address','$path','$userid',now())";

                     if($conn->query($sql))
                    {
                       echo"<script>
                             alert('Data saved sucessfully');
                             </script>";
                    }
                   else
                   {
                        echo $sql ."ERROR :" .$conn->error;
                   }
           }
       }
       else
       {
              echo"<script>
                   alert('This mail is in use');
                   </script>";
       }
}
?>    
 <?php include 'includes/head.php';?>
    </head>
   
    <body>
              <?php include 'includes/navbar.php';?>
   
     <div class="container mt-3 add-contact-form">
     <h2  class="text-primary mt-3 mb-3 text center"> Add contact </h2>                 
       <!-- Content here -->
       <a class ="add-contact-btn border-primary p-3" href="dashboard.php"`
                  data-bs-toggle ="tooltip"  data-bs-plaement="right"  title="View All Contacts">
                  <img src="https://img.icons8.com/office/16/000000/add-contact-to-company.png"/>
       </a>
       <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method ="POST" enctype="multipart/form-data">
            <div class ="mb - 3">
            <label  class="form-label">Profile Image <sup class ="text danger">*<sup></label>
            <Input type ="file name" name="user_img" class ="form-control"  placeholder="name@example.com" required>
            </div>
             <div class ="mb - 3">
            <label class="form-label">Mobile no</label>
            <Input type ="tel" name="usermobile" class ="form-control"  placeholder="XXXXXXXXXXX">
            </div>
            <div class ="mb - 3">
            <label class="form-label">Email address</label>
            <Input type ="email"  name="useremail" class ="form-control" placeholder="name@example.com" required>
            </div>
            <div class ="mb - 3">
            <label  class="form-label">Your address<sup class="text-danger">*</sup></label>
            <textarea  class ="form-control" name ="useraddress" rows="3">s</textarea>
            </div>
            <div class="col-md-6">
            <button input class="btn btn-sucess" type="submit" name="Submit"> Add Contact</button>
            </div>
       </form> 
           <?php include 'includes/script.php';?>
   </body>
   </html>
              
