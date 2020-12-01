<?php

//get the selected option that was sent in jQuery's ajax call.  This can be used to filter your query
$selectedOption = $_POST['selectedOption'];


//connect to mysql and select a db
session_start();
	include("common/connection.php");

//select data from the db
$query="SELECT Category_id,Category_name FROM category_product";
$result=mysqli_query($query, $conn) or die(mysql_error());

//create an array to contain people selected from your DB.
$people = array();
while ($resultsArray=mysql_fetch_array($result))
{
    array_push($people, array("Category_id"=>$resultsArray['Category_id'], "Category_name"=>$resultsArray['Category_name']));
}

echo json_encode($people);

?>