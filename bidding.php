<?php
session_start();
$user=$_SESSION['user'];
$i=1;
$conn = mysqli_connect("localhost","root","","ipl") or die(mysqli_connect_error());
$t = "SELECT * from user where username='$user'";
$teamb = mysqli_query($conn, $t);
while($row = mysqli_fetch_array($teamb)){
        $team = $row['tname'];
}

$sql = "SELECT * from player where id=$i";
$result = mysqli_query($conn, $sql);
$stats=array();
while($row = mysqli_fetch_array($result))
    {
        $output=$row;
}
echo "<body>";
echo "<link rel='stylesheet' href='bidding1.css'>";
echo "<table border=1 class= 'center'>";
echo "<tr>";
echo "<td>"."Player Name"."</td>";
echo "<td>"."Base price"."</td>";
echo "<td>"."Current  bid"."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>".$output['name']."</td>";
echo "<td>".$output['bprice']."</td>";
echo "<td>".$output['cbid']."</td>";
echo "</tr>";
echo "</table>";
echo "</body>";
if(isset($_POST['bid'])){
        $bid=$_POST['bvalue'];
        if ($bid<$output['bprice'] or $bid<$output['cbid']){
                echo "<script type='text/javascript'>
                alert('Bidding value should be greater than the base value and current bid.');
                </script>";
        }
        else{
                $s = "UPDATE player SET tname='$team', cbid=$bid where id =1" ;
                $res = mysqli_query($conn, $s);
                echo "<script type='text/javascript'>
                alert('Your bid is placed successfully!');
                </script>";
        }
}
?>
<html>
<link rel='stylesheet' href='bidding1.css'>
<form action="bidding.php" method="POST">
<input type="number" placeholder="Enter bid" name="bvalue" id="num">
<input type="submit"  id="num" name="bid" value="bid">
</form>
</html>