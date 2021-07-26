<?php
        $connect = mysqli_connect("localhost","root","","ebook") or die("Error : ".mysqli_connect_error());
        if(isset($_POST["upload_file"])){
            $author = $_POST["author"];
            $book_title  = $_POST["book_title"];
            $year  = $_POST["year"];
            $edition  = $_POST["edition"];
            $it=$_FILES['upload_file'];
            $file_name = $_FILES["upload_file"]["name"];
            $category = $_POST["select_category"];
            echo "this is the upload : ".(print_r($_FILES["upload_file"]));
            if($edition<=0){
                $edition=null;
            }
            
            //destination of the file on the server
            $destination = 'uploads/'.$file;

            //get file extension
            $extension = pathinfo($file_name, PATHINFO_EXTENSION);

            //file properties from uploaded file
            $file = $_FILES["upload_file"]["tmp_name"];
            $file_size = $_FILES["upload_file"]["size"];
            $file_error = $_FILES["upload_file"]["error"];
            $file_type = $_FILES["upload_file"]["type"];
            
            if(in_array($extension,['html','pdf','txt','docx','doc'])){//check if file extension is of the allowed type
                echo "the file extension is : ".$extension."<br>";
                echo "the category is : ".$category."<br>";
                echo "destination is : ".$destination."<br>";
                echo "file is : ".$file."<br>";
                echo "the file error is : ".$file_error."The error is".(mysqli_error($connect))."<br>";
                if($file_error === 0){
                    //move the uploaded(temporary) file to the specified destination
                    if(move_uploaded_file($file,$destination)){
                        $sql = "INSERT INTO BOOK(AUTHOR,TITLE,YEAR_PUBLISHED,BOOK_EDITION,CAT_ID,BOOK_SIZE,FILE_TYPE,FILE_DATA) VALUES('$author','$book_title','$year','$edition','$category','$file_size','$extension','$file_name')";
                        if(mysqli_query($connect,$sql)){
                            echo "data inserted successfully";
                            header('location:admin.php?data inserted successfully');
                        }else{
                            die("failed to insert data ".mysqli_error($connect));
                        }
                    }else{
                        die("failed to move file ".mysqli_error($connect));
                    }
                }else{
                     die("Error uploading file! ".mysqli_error($connect));
                }
            }else{
                echo "You can't upload files of this type!<br>";
            }
        
        }else if(isset($_POST["upload_proverb"])){
            $title = $_POST["p_title"];
            $text = $_POST["p_text"];

            if($title !==""){
                if($text !==""){
                    $sql = "INSERT INTO proverb(TITLE,QUOTE) values ('$title','$text')";
                    if(!mysqli_query($connect,$sql)){
                        header("location:admin.php?failed to upload proverb");
                    }else{
                        header("location:admin.php?proverb upload successful");
                    }
                }else{
                    header("location:admin.php?proverb text empty");
                }
            }else{
                header("location:admin.php?proverb title empty");
            }
        }else{
            header("location:admin.php?failed");
        }
    ?>