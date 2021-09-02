<?php
    $connect = mysqli_connect("localhost","root","","ebook") or die("Error: ".mysqli_error($connect));

if(isset($_GET['submit'])){
    $title = $_GET['book_title'];
    $author = $_GET['author_name'];
    $year = $_GET['year'];
    $edition = $_GET['edition'];
    $email = $_GET['user_email'];

    $sql= "SELECT * FROM book WHERE TITLE='$title' AND AUTHOR='$author'";
    $results=mysqli_query($connect,$sql) or die("Error: ".mysqli_error($connect));
    $row_count = mysqli_num_rows($result);
    if($row_count>0){
        echo "The requested book is available already";
    }else{
        $sql = "INSERT INTO book_request(U_AUTHOR,U_TITLE,U_YEAR,U_EDITION,REQUEST_BY) values ('$author','$title','$year','$edition','$email')";
        if(!mysqli_query($connect,$sql)){
            header("location:index.php?request failed");
        }else{
            header("location:index.php?request successful");
        }
    
    }
}

?>