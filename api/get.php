<?php 

//Define param banco
$con = mysqli_connect('localhost','igor','0321grade','api_db');
//muda charset
$con->set_charset("utf8");



//localhost/?discipline=adm202&professor=adriano


$discipline = $_GET['discipline'];
$professor = $_GET['professor'];

echo $discipline;
echo $professor;



$result = mysqli_query($con, "INSERT INTO `products` (`name`, `description`, `price`, `category_id`, `created`, `modified`) VALUES ('$discipline' , '$professor', '9417', '3' , '2014-06-01 01:12:26', '2014-05-31 17:12:26')");
if($con->query($result) === TRUE) {
	echo "Foi";
}

?>