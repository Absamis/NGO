<?php 
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "foundation");
$conn=mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
if($conn){
	//echo "Database connected";
}else{
	echo "Error Occured". mysqli_connect_error();
}
?>