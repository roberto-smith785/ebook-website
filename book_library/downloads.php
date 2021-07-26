<?php
    $connect = mysqli_connect("localhost","root","","ebook") or die("Error connecting to database: ".mysqli_connect_error());
    if(isset($_GET['file_id'])){
        $id = $_GET['file_id'];

        //fetch file to download from database
        $sql = "SELECT * FROM book WHERE ID='$id'";
        $result = mysqli_query($connect,$sql);
        $file = mysqli_fetch_assoc($result) or die("Error: ".mysqli_connect_error($connect));
        
        $filepath = 'uploads/'.$file['FILE_DATA'];
echo "file path is : ".$filepath."<br>";
        if(file_exists($filepath)){
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($filepath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: '.filesize('uploads/'.$file['FILE_DATA']));
            readfile('uploads/'.$file['FILE_DATA']);
        }else{
            die("404 - File not found!");
        }
    }

?>