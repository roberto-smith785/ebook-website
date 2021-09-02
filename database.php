<?php
$connect = mysqli_connect("localhost","root","");
if(!$connect){//if connection to server fails
    die("Connection failed: ".mysqli_connect_error());
}

$select_database = mysqli_select_db($connect,"ebook");//select to see if database already exists
if(!$select_database){
    $sql_create_db = "CREATE DATABASE ebook";//sql query to create a db
    if(mysqli_query($connect,$sql_create_db)){
        //if creation of database is successful
        echo "Database created successfully<br>";

        //create table after database is created
        $use_database = mysqli_select_db($connect,"ebook") or die("Error selecting database : ".mysqli_error($connect));
        if($use_database){
            //if the database selection is successful
            $sql_table = "CREATE TABLE IF NOT EXISTS category(
                CAT_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                CAT_NAME VARCHAR(50) NOT NULL
            );";
            $sql_table .= "CREATE TABLE IF NOT EXISTS book(
                ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                AUTHOR VARCHAR(100) NOT NULL,
                TITLE VARCHAR(100) NOT NULL,
                YEAR_PUBLISHED YEAR(4) NOT NULL,
                BOOK_EDITION INT NULL,
                CAT_ID INT NOT NULL,
                FOREIGN KEY (CAT_ID) REFERENCES category(CAT_ID) ON DELETE CASCADE ON UPDATE CASCADE,
                BOOK_SIZE BIGINT,
                FILE_TYPE VARCHAR(50) NULL,
                FILE_DATA VARCHAR(255) NOT NULL
            );";
            $sql_table .="CREATE TABLE IF NOT EXISTS book_request(
                ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                U_AUTHOR VARCHAR(100) NOT NULL,
                U_TITLE VARCHAR(100) NOT NULL,
                U_YEAR YEAR(4) NULL,
                U_EDITION INT NULL,
                REQUEST_BY VARCHAR(50) NOT NULL
            );";
            $sql_table .= "CREATE TABLE IF NOT EXISTS proverb(
                ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                TITLE TEXT NOT NULL,
                QUOTE MEDIUMTEXT NOT NULL
            )";

            //create and check if tables were created sucessfully
            if(!mysqli_multi_query($connect,$sql_table)){
                //if the tables creation fails
                die("Error creating tables : ".mysqli_error($connect));
            }else{
                header("location:categories.php");
            }
        }
    }else{
        //if creation of database fails
        die("Database 'ebook' creation failed : ".mysqli_error($connect));
    }
}else{
    header("location:categories.php") or die("Database already exist : ".mysqli_error($connect));
}

//close the Connection
mysqli_close($connect);


?>