<?php
$hn = 'localhost';
$db = 'gangaj49_koh';
$un = 'gangaj49_koh';
$pw = 'ginger+77'; 

#DB Connection:
 $conn = new mysqli($hn, $un, $pw, $db);
 if ($conn->connect_error) die($conn->connect_error);
  
#Functions:
require_once ('function.php');
 

#Section setup:

/*if(isset($_GET['page']))
	$pageid = $_GET['page'];
else 
	$pageid = 1;
	

$page = data_page($conn, $pageid);*/

$aboutrow = about_data($conn);
$newsrow = news_data($conn);
$reviewsrow = reviews_data($conn);
$blogrow = blog_data($conn);
$reciperow = recipe_data($conn);
$foodiqrow = foodiq_data($conn);
$eventsrow = events_data($conn); 


//$result->close();
//$conn->close();
  
?>