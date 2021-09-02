<?php 
    $connect = mysqli_connect("localhost","root","","ebook") or die("Error cconneccting to database: ".mysqli_connect_error());
    
    $sql1 = "Select count(*) from book_request";
    $result1= mysqli_query($connect,$sql1) or die("Error : ".mysqli_connect_error($connect));
    $row_requests = mysqli_fetch_array($result1);
    
    $sql2= "Select count(*) from book";
    $result2= mysqli_query($connect,$sql2) or die("Error : ".mysqli_connect_error($connect));
    $row_books= mysqli_fetch_array($result2);

    $sql2= "Select count(*) from proverb";
    $result2= mysqli_query($connect,$sql2) or die("Error : ".mysqli_connect_error($connect));
    $row_proverbs= mysqli_fetch_array($result2);

    $query= "SELECT * FROM `category`";
    $result= mysqli_query($connect,$query);
    $options = "";
    while($row = mysqli_fetch_array($result)){
        $row_id=$row["CAT_ID"];
        $row_name=$row["CAT_NAME"];
        $options = $options."<option class='opt_class' value='{$row_id}'>".$row_name."</option>";
    }

    $sql3 ="SELECT * FROM book_request";
    $result3=mysqli_query($connect,$sql3) or die("Error: ".mysqli_error($connect));
    $row_count=mysqli_num_rows($result3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eBook | ADMIN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="admin.css">
    <link href="process_data.js">
    <script src="../jquery-3.6.0.min.js"></script>
</head>
<body>
<main>
    <div class="nav-wrap">

        <div class="logo_container">
            <img src="../images/logo.png" alt="ebook logo">
        </div>

        <li class="nav active">
        <button class="nav_btn" id="home">
            <span class="icon"><i class="fa fa-home"></i></span>
            <span class="title">Home</span>
        </button>
        </li>
        <li class="nav">
        <button class="nav_btn" id="view-request">
            <span class="icon"><i class="fa fa-eye"></i></span>
            <span class="title">View Request</span>
        </button>
        </li>
        <li class="nav">
        <button class="nav_btn" id="add-books">
            <span class="icon"><i class="fa fa-book"></i></span>
            <span class="title">Add Books</span>
        </button>
        </li>
        <li class="nav">
        <button class="nav_btn" id="add-proverb">
            <span class="icon"><i class="fa fa-quote-right"></i></span>
            <span class="title">Add Proverb</span>
        </button>
        </li>  
        <li class="nav">
        <button class="nav_btn" id="user-view">
            <span class="icon"><i class="fa fa-user"></i></span>
            <span class="title">User view</span>
        </button>

        </li>

        
    </div>
    
    <div class="content-wrap">
    <div class="content_head">
        <div class="notify">
            <p><i>bell</i><sup><span class="notify_ct"></span><sup></p>
        </div>
</div>
    <!--Home Div-->
    <div class="home content-div" style="display:block">
        <header>OVERVIEW</header>
    <div class="home_sections">
        <section class="dash access">
            <span ><i class="fa fa-clock-o"></i></span>
            <span class="title"><p>Website accessed last</p></span>
            <span class="value">17-12-2021 21:25</span>
        </section>
        <section class="dash request">
            <span ><i class="fa fa-clock-o"></i></span>
            <span class="title"><p>Book request</p></span>
            <span class="value"><?php echo $row_requests["count(*)"]; ?></span>
        </section>
        <section class="dash book">
            <span ><i class="fa fa-clock-o"></i></span>
            <span class="title"><p>Books</p></span>
            <span class="value"><?php echo $row_books["count(*)"]; ?></span>
        </section>
        <section class="dash proverb">
            <span ><i class="fa fa-clock-o"></i></span>
            <span class="title"><p>Proverbs</p></span>
            <span class="value"><?php echo $row_proverbs["count(*)"];  ?></span>
        </section>
    </div>
    </div>
    <!--Home div -->

    <!--View user request-->
    <div class="view-request content-div">
        <table  id="request_table">
            <tr id="t_head">
                <th>Author</th>
                <th>Title</th>
                <th>Year</th>
                <th>Edition</th>
                <th>REQUESTED BY</th>
            </tr>
            <?php
                if($row_count>0){
                    while($row = mysqli_fetch_array($result3)){
                        $author= $row['U_AUTHOR'];
                        $title= $row['U_TITLE'];
                        $year= $row['U_YEAR'];
                        $edition= $row['U_EDITION'];
                        $request= $row['REQUEST_BY'];

                        echo "<tr>
                        <td>".$author."</td>
                        <td>".$title."</td>
                        <td>".$year."</td>
                        <td>".$edition."</td>
                        <td><a href='mailto:".$request."'>".$request."</a></td>
                        </tr>
                        ";
                    }
                }else{
                    echo "</tr><td colspan='5' style='text-align:center'>No request made</td></tr>";
                }
            ?>
        </table>
    </div>
    <!--View user request div end -->

    <!--Add book div -->
    <div class="add-books content-div">
    <form action="process_data.php" method="post" enctype="multipart/form-data" id="form">
        <label for="author">Author(s)</label>
        <input type="text" name="author" id="" placeholder="" autofocus><br>
        <label for="title">Title</label>
        <input type="text" name="book_title" id="title" placeholder=""><br>
        <label for="year">Year</label>
        <input type="number" name="year" id="year" min="1600" max="2021" maxlength="4" placeholder=""><br>
        <label for="edt">Edition</label>
        <input type="number" name="edition" id="edt" min="0" max="10" placeholder=""><br>
        <input type="file" name="upload_file" id="upload_file" placeholder="File"><br>
        <select name="select_category" id="select_category" placeholder="select one">
                <option class="opt_class" value="#" selected disabled>--Select category--</p>
                <?php echo $options; ?>
        </select>
        <br>

        <div class="btn">
            <button type="submit" name="upload_file">UPLOAD</button>
            <button type="reset" name="reset">RESET</button>
        </div>
    </form>
    </div>
    <!--Add book div end -->

    <!-- Add proverb div -->
    <div class="add-proverbs content-div">
        <form method="post" action="process_data.php" id="form">
            <label for="p_title">Title</label>
            <input type="text" name="p_title" id="p_title"><br>
            <label for="p_text">Text</label>
            <textarea type="text" name="p_text" id="p_text" cols="25" rows="8"></textarea><br>

            <div class="btn">
                <button type="submit" name="upload_proverb">SUBMIT</button>
                <button type="reset" name="reset">CANCEL</button>
            </div>
        </form>
    </div>
    <!--Add proverb div end-->

    </div>
</main>
    <script src="admin.js"></script>
</body>
</html>