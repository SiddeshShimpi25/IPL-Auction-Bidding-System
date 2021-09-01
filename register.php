<?php 
$nameErr = $unameErr = $emailErr = $passErr = "";  
$name = $uname = $email = "";  
$city=@$_POST['selectcity'];
$aadhar=@$_POST['aadhar'];
$password=md5(@$_POST['password']);
$password2=md5(@$_POST['cpassword']);


if ($_SERVER["REQUEST_METHOD"] == "POST") {  
if (empty($_POST['fname'])||
    empty($_POST['aadhar']) ||
    empty($_POST['uname'])||
    empty($_POST['email'])||
    empty($_POST['password']) ||
    empty($_POST['cpassword']))
    {
    die('Please fill all required fields!');
    
}
if (empty($_POST["fname"])) {  
    $nameErr = "Name is required";  
} else {  
   $name =$_POST["fname"];  
   
       // check if name only contains letters and whitespace  
       if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
           $nameErr = "Only alphabets and white space are allowed";  
       }  
} 

if (empty($_POST["uname"])) {  
    $nameErr = " UserName is required";  
} else {  
   $name = ($_POST['fname']);  
   
       // check if name only contains letters and whitespace  
       if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
           $nameErr = "Only alphabets and white space are allowed";  
       }  
}

/*if ($password !== $password2) {
    $passErr = " Password should be same";  
} 
*/

error_reporting(0);
$conn = mysqli_connect("localhost","root","","ipl") or die(mysqli_connect_error()); 



$email = $_POST ["email"];
$username=$_POST["uname"];  
$fname=$_POST['fname'];

$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
if (!preg_match ($pattern, $email) ){ 
    
    $ErrMsg = "Email is not valid.";  
    echo "<script type='text/javascript'>
    alert('Invalid Email Id.');
    </script>";  
} else {  
    
    //echo "Your valid email address is: " .$email;  
} 
}

    if(isset($_POST['b1'])) {       

            $sql_u = "SELECT * FROM user WHERE username='$username'";
            $sql_e = "SELECT * FROM user WHERE email='$email'";
            $sql_a = "SELECT * FROM user WHERE adharno='$aadhar'";
            $res_u = mysqli_query($conn, $sql_u);
            $res_e = mysqli_query($conn, $sql_e);
            $res_a = mysqli_query($conn, $sql_a);

  	if (mysqli_num_rows($res_u) > 0) {
  	        echo "<script type='text/javascript'>
            alert('Username already exists.');
            window.location.href='register.html';
            </script>"; 	
      }
      else if(mysqli_num_rows($res_e) > 0){
        echo "<script type='text/javascript'>
        alert('Email already exists.');
        window.location.href='register.html';
        </script>";	
      }
      else if (mysqli_num_rows($res_a) > 0){
        echo "<script type='text/javascript'>
        alert('Adhar number already exists.');
        window.location.href='register.html';
        </script>";
      }
      else
      {
           $query = "INSERT INTO user (email,username,fname,adharno,tname,pass) 
      	    	     VALUES ('$email', '$username','$fname ','$aadhar','$city','$password')";
           $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
            echo "<script type='text/javascript'>
            alert('Registered Successfully');
            window.location.href='login.html';
           </script>";
        }
           
       }
 
    

 ?>