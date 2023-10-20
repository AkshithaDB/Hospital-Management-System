<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRIHER</title>
      <!-- font awesome cdn link  -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
      <!-- custom css file link  -->
      <link rel="stylesheet" href="style.css">
  
</head>
<style>
    .dropdown { 
      display: inline-block; 
      position: relative; 
  } 
    button {
      background-color:  var(--red);
      border: none;
      color: white;
      padding-left: 10px;
      padding-right: 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 20px;
}
    .dropdown-content {
      display: none;
      position: absolute;
      width: 100%;
      overflow: auto;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  }
    .dropdown:hover .dropdown-content {
      display: block;
      background: black;
  }
    .dropdown-content a {
      display: block;
      color: #000000;
      padding: 2px;
      text-decoration: none;
  }
    .dropdown-content a:hover {
      color: #FFFFFF;
      background-color: #00A4BD;
  }

</style>
<body>
    <!-- header section starts  -->
<header>
    <div class="header-1">
        <a href="" class="logo"><img src="Images/logo.png"></a>
        <h3 class="call"> <i class="fas fa-phone"></i> call now : 044-45928500</h3>
    </div>

    <div class="header-2">
        <nav class="navbar">
            <ul>
                <li><a class="active" href="Index.html">Home</a></li>
                <li><a href="about.html">About us </a></li>
                <li>
                    <div class="dropdown">
                    <button>Speciality</button>
                    <div class="dropdown-content">
                    <a href="https://www.sriramachandra.edu.in/medical/specialities/cardiovascular-and-thoracic-surgery/about-the-department/">Cardiology</a>
                    <a href="https://www.sriramachandra.edu.in/medical/specialities/nephrology/about-the-department/">Nephrology</a>
                    <a href="https://www.sriramachandra.edu.in/medical/specialities/neurology/about-the-department/">Neurology</a>
                    <a href="https://www.sriramachandra.edu.in/medical/specialities/ophthalmology/about-the-department/">Ophthalmology</a>
                    <a href="https://www.sriramachandra.edu.in/medical/specialities/radiology-and-imaging-sciences/about-the-department/">Radialogy</a>
                    
                    </div>
                  </div></li>
                <li><a href="http://localhost/SRIHER/register.php">Prescription</a></li>
            </ul>
        </nav>
        <div class="share">
        <a href="location.html"><img src="Images/map.png" style="width: 12%;"alt=""></a>
        <a href="mailto:t.karthika@gmail.com"><img src="images/gmail.png" style="width: 12%" alt=""></a>
        <a href="https://www.facebook.com/SRIHER.Official"><img src="Images/facebook.png" alt=""></a>
        <a href="https://www.instagram.com/sriher.official"><img src="Images/instagram.png" alt=""></a>
        <a href="#" ><img src="Images/twitter.png" alt=""></a>
        </div>
    </div>
</header>
<!-- header section ends  -->
<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist'; 
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }elseif($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email, password, image) VALUES('$name', '$email', '$pass', '$image')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:login.php');
         }else{
            $message[] = 'registeration failed!';
         }
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>DOCTOR'S REGISTRATION</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="text" name="name" placeholder="enter username" class="box" required>
      <input type="email" name="email" placeholder="enter email" class="box" required>
      <input type="password" name="password" placeholder="enter password" class="box" required>
      <input type="password" name="cpassword" placeholder="confirm password" class="box" required>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" name="submit" value="register now" class="btn">
      <p>already have an account? <a href="login.php">login now</a></p>
   </form>

</div>

</body>
</html>