<?php  
         session_start();
         $nameErr = $passErr = "";
         $name = $pass ="";
      
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["username"])) {
               $nameErr = "Name is required";

          
            }else {
               $name = @$_POST["username"];
               
            }
            if (empty($_POST["password"])) {
                $passErr = "Password is required";
             }else {
                $pass = md5(@$_POST["password"]);
                
             }
            }

            
            if((isset($_POST['submit']))) {
               
            //    if($nameErr == "" && $passErr == "") { 
                   // {
                     $conn = mysqli_connect("localhost","root","","ipl") or die(mysqli_connect_error());
                     $query = "SELECT * FROM admin WHERE auser=? AND apass=?";
                     $stmt=$conn->prepare($query);
                   $stmt->bind_param("ss",$name,$pass);
                     $stmt->execute();
                     $results=$stmt->get_result();
  	if (mysqli_num_rows($results) == 1) {

      $_SESSION['auser']=$name;
          echo "<script type='text/javascript'>
          alert('LOGIN Successfully');
          window.location='ahome.html';
        </script>";
        }   
    else{
        echo "Username or password is invalid.";
    }
                    }
                  //}          
            ?>