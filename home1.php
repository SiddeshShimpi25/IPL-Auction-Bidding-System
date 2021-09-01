<?php 
session_start();
if(!isset($_SESSION['user'])){
?>
<script>
  alert("You are not logged in!.");
  window.location='login.html';
</script>
<?php 
}
?>

<html>
   <head></head> 
<link rel="stylesheet" href="home1.css">
<body>
    
<div class="wrapper">
  
  <div class="top_navbar">
    <div class="hamburger">
        <div class="one"></div>
        <div class="two"></div>
        <div class="three"></div>
     </div>
    <div class="top_menu">
      <div class="logo">
         IPL Auction
      </div>
      <ul>
        <li><a href="#">
          <i class="fas fa-search"></i>
          </a></li>
        <li><a href="#">
          <i class="fas fa-bell"></i>
          </a></li>
        <li><a href="#">
          <i class="fas fa-user"></i>
          </a></li>
      </ul>
    </div>
  </div>
  
  <div class="sidebar">
      <ul>
        <li><a href="#">
          <span class="icon"><i class="fas fa-book"></i></span>
          <span class="title">Your Details</span>
          </a></li>
        <li><a href="#">
          <span class="icon"><i class="fas fa-file-video"></i></span>
          <span class="title">Balance</span>
          </a></li>
        <li><a href="#">
          <span class="icon"><i class="fas fa-volleyball-ball"></i></span>
          <span class="title">Players Acquired</span>
          </a></li>
        <li><a href="#">
          <span class="icon"><i class="fas fa-blog"></i></span>
          <span class="title" onclick="window.location.href='About.html'">About Us</span>
          </a></li>
        <li><a href="#">
          <span class="icon"><i class="fas fa-leaf"></i></span>
          <span class="title" onclick="window.location.href='contact.html'">Contact Us</span>
          </a></li>
          <li><a href="#">
            <span class="icon"><i class="fas fa-leaf"></i></span>
            <span class="title" onclick="window.location.href='sessiond.php'">Log Out</span>
            </a></li>
    </ul>
  </div>
 
  
  
  </div>
</div>
<div class='center'>

    <p class="awesome">BIDDING IS OPEN FROM 9 AM TO 5PM!</p>
  
  </div>



<button class="btn" onclick="window.location.href='bidding.php'">CLICK HERE TO BID ON YOUR FAVOURITE PLAYER!</button>
</body>
</html>