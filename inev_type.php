<?php
session_start();
$con=new mysqli("localhost","root","","car_rental");
$type_data = mysqli_query($con,"SELECT distinct car_type FROM car");

echo "<option>select</option>";
while ($row = mysqli_fetch_array($type_data))
{
	
	echo "<option>" .$row['car_type']."</option>";
}
echo "<option>other</option>";
mysqli_close($con);
?>