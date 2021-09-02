<?php
$connect = mysqli_connect("localhost","root","","ebook") or die("Error: ".mysqli_error($connect));
//insert the categories into the database
$sql_insert = "INSERT INTO category(CAT_ID, CAT_NAME) VALUES ('1', 'Informatics');";
$sql_insert .= "INSERT INTO category(CAT_ID, CAT_NAME) VALUES ('2', 'Networking');";
$sql_insert .= "INSERT INTO category(CAT_ID, CAT_NAME) VALUES ('3', 'Programming');";
$sql_insert .= "INSERT INTO category(CAT_ID, CAT_NAME) VALUES ('4', 'Security');";
$sql_insert .= "INSERT INTO category(CAT_ID, CAT_NAME) VALUES ('5', 'Others')";

if(!mysqli_multi_query($connect, $sql_insert)){
    die("Error inserting data: ".mysqli_error($connect));
}else{
    header("location:index.php");
}

?>