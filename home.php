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
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">

   <div class="profile">
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
        
      ?>
      <h3><?php echo $fetch['name']; ?></h3>
      <a href="update_profile.php" class="btn">update profile</a>
      <a href="dashboard/dashboard.html" class="btn"> Add prescription</a>
      <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
      <p>new <a href="login.php">login</a> or <a href="register.php">register</a></p>
   </div>

</div>

</body>
</html>