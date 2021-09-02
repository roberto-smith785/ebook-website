<?php
    $page='catalogue';
    require_once "requires/header.php";
    //require "requires/functions.php";
    $connect = mysqli_connect("localhost","root","","ebook") or die("Failed to connect : ".mysqli_connect_error());
?>
<title>Catalogue | eBook</title>
            <div class="site_header_article">
                <article>    
                <h2>catalogue</h2>
                <p>/ˈkat(ə)lɒɡ/</p>
                <p>a complete list of items, typically one in alphabetical or other systematic order.</p>
                </article>
            </div>
        </header>
        <main id="catalogue_main">
            <div class="catalogue_content_wrap">
            <div class="catalogue_categories">
                <li class="cat_nav active">
                    <button class="cat_btn" id="informatics">
                        <span class="btn_icon">icon</span>
                        <span class="btn_title">Infromatics</span>
                    </button>
                </li>
                <li  class="cat_nav">
                    <button class="cat_btn" id="networking">
                        <span class="btn_icon">icon</span>
                        <span class="btn_title">Networking</span>
                    </button>
                </li>
                <li class="cat_nav">
                    <button class="cat_btn" id="programming">
                        <span class="btn_icon">icon</span>
                        <span class="btn_title">Programming</span>
                    </button>
                </li>
                <li class="cat_nav">
                    <button class="cat_btn" id="security">
                        <span class="btn_icon">icon</span>
                        <span class="btn_title">Security</span>
                    </button>
                </li>
                <li class="cat_nav">
                    <button class="cat_btn" id="others">
                        <span class="btn_icon">icon</span>
                        <span class="btn_title">Others</span>
                    </button>
                </li>

            </div>

            <div class="catalogue_tables_container">
            <table  id="catalogue_table">
                <thead>
                                <tr>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Year</th>
                                    <th>Edition</th>
                                    <th>SIZE</th>
                                    <th>TYPE</th>
                                    <th>DOWNLOAD</th>
                                </tr>
                </thead>
                <tbody>
                <div id="informatics">
                    <?php 
                        $sql = "SELECT ID, AUTHOR, TITLE, YEAR_PUBLISHED,BOOK_EDITION,BOOK_SIZE,FILE_TYPE FROM book WHERE CAT_ID='1' ORDER BY TITLE ASC";
                        $result = mysqli_query($connect,$sql) or die("Error in querying database ".mysqli_errno($connect));
                        $row_count = mysqli_num_rows($result);

                        if($row_count>0){
                            while($row = mysqli_fetch_array($result)){
                                $author=$row['AUTHOR'];
                                $title = $row['TITLE'];
                                $year = $row['YEAR_PUBLISHED'];
                                $edition = $row['BOOK_EDITION'];
                                $size = $row['BOOK_SIZE'];
                                $file_type = $row['FILE_TYPE'];
                                $file_id = $row['ID'];
                                $print_size=0;
                                switch($size){
                                    case $size < 1024:
                                        $print_size = number_format($size,1,"."," ")." bytes";
                                    break;
                                    case $size <=2097152:
                                        $print_size = number_format(($size/1024),1,"."," ")." kb";
                                    break;
                                    case $size > 2097152:
                                        $print_size = number_format(($size/1048576),1,"."," ")." mb";
                                    break;
                                }

                                echo"
                                <tr class='catagory_results' id='informatics'>
                                <td>".$author."</td>
                                <td>".$title."</td>
                                <td>".$year."</td>
                                <td>".$edition."</td>
                                <td>".$print_size."</td>
                                <td>".$file_type."</td>
                                <td><a href='downloads.php?file_id=".$file_id."'><i class='fa fa-download'></i>Download</a></td>
                                </tr>";
                            }
                            }else{
                                echo "<tr class='catagory_results' id='informatics'><td colspan='7' style='text-align:center'>No results found</td></tr>";
                            }
                        
                    ?>
                </div>

                <div id="networking" >
                    <?php 
                        $sql = "SELECT ID, AUTHOR, TITLE, YEAR_PUBLISHED,BOOK_EDITION,BOOK_SIZE,FILE_TYPE FROM book WHERE CAT_ID='2' ORDER BY TITLE ASC";
                        $result = mysqli_query($connect,$sql) or die("Error in querying database ".mysqli_errno($connect));
                        $row_count = mysqli_num_rows($result);
                        if($row_count>0){
                            while($row = mysqli_fetch_array($result)){
                                $author=$row['AUTHOR'];
                                $title = $row['TITLE'];
                                $year = $row['YEAR_PUBLISHED'];
                                $edition = $row['BOOK_EDITION'];
                                $size = $row['BOOK_SIZE'];
                                $file_type = $row['FILE_TYPE'];
                                $file_id = $row['ID'];
                                $print_size=0;
                                switch($size){
                                    case $size < 1024:
                                        $print_size = number_format($size,1,"."," ")." bytes";
                                    break;
                                    case $size <=2097152:
                                        $print_size = number_format(($size/1024),1,"."," ")." kb";
                                    break;
                                    case $size > 2097152:
                                        $print_size = number_format(($size/1048576),1,"."," ")." mb";
                                    break;
                                }
                                echo"
                                <tr class='catagory_results' style='display:none' id='networking'>
                                <td>".$author."</td>
                                <td>".$title."</td>
                                <td>".$year."</td>
                                <td>".$edition."</td>
                                <td>".$print_size."</td>
                                <td>".$file_type."</td>
                                <td><a href='downloads.php?file_id=".$file_id."'><i class='fa fa-download'></i>Download</a></td>
                                </tr>";
                            }
                        }else{
                            echo "<tr class='catagory_results' style='display:none' id='networking'><td colspan='7' style='text-align:center;' id='networking'>No records found</td></tr>";
                        }
                    ?>
                </div>

                <div id="programming">
                    <?php 
                        $sql = "SELECT ID, AUTHOR, TITLE, YEAR_PUBLISHED,BOOK_EDITION,BOOK_SIZE,FILE_TYPE FROM book WHERE CAT_ID='3' ORDER BY TITLE ASC";
                        $result = mysqli_query($connect,$sql) or die("Error in querying database ".mysqli_errno($connect));
                        $row_count = mysqli_num_rows($result);

                        if($row_count>0){
                            while($row = mysqli_fetch_array($result)){
                                $author=$row['AUTHOR'];
                                $title = $row['TITLE'];
                                $year = $row['YEAR_PUBLISHED'];
                                $edition = $row['BOOK_EDITION'];
                                $size = $row['BOOK_SIZE'];
                                $file_type = $row['FILE_TYPE'];
                                $file_id = $row['ID'];
                                $print_size=0;
                                switch($size){
                                    case $size < 1024:
                                        $print_size = number_format($size,1,"."," ")." bytes";
                                    break;
                                    case $size <=2097152:
                                        $print_size = number_format(($size/1024),1,"."," ")." kb";
                                    break;
                                    case $size > 2097152:
                                        $print_size = number_format(($size/1048576),1,"."," ")." mb";
                                    break;
                                }
                                echo"
                                <tr class='catagory_results' style='display:none' id='programming'>
                                <td>".$author."</td>
                                <td>".$title."</td>
                                <td>".$year."</td>
                                <td>".$edition."</td>
                                <td>".$print_size."</td>
                                <td>".$file_type."</td>
                                <td><a href='downloads.php?file_id=".$file_id."'><i class='fa fa-download'></i>Download</a></td>
                                </tr>";
                            }
                        }else{
                            echo "<tr class='catagory_results' style='display:none' id='programming'><td colspan='7' style='text-align:center;' id='programming'>No records found</td></tr>";
                        }
                    ?>
                </div>

                <div id="security">
                    <?php 
                        $sql = "SELECT ID, AUTHOR, TITLE, YEAR_PUBLISHED,BOOK_EDITION,BOOK_SIZE,FILE_TYPE FROM book WHERE CAT_ID='4' ORDER BY TITLE ASC";
                        $result = mysqli_query($connect,$sql) or die("Error in querying database ".mysqli_errno($connect));
                        $row_count = mysqli_num_rows($result);

                        if($row_count>0){
                            while($row = mysqli_fetch_array($result)){
                                $author=$row['AUTHOR'];
                                $title = $row['TITLE'];
                                $year = $row['YEAR_PUBLISHED'];
                                $edition = $row['BOOK_EDITION'];
                                $size = $row['BOOK_SIZE'];
                                $file_type = $row['FILE_TYPE'];
                                $file_id = $row['ID'];
                                $print_size=0;
                                switch($size){
                                    case $size < 1024:
                                        $print_size = number_format($size,1,"."," ")." bytes";
                                    break;
                                    case $size <=2097152:
                                        $print_size = number_format(($size/1024),1,"."," ")." kb";
                                    break;
                                    case $size > 2097152:
                                        $print_size = number_format(($size/1048576),1,"."," ")." mb";
                                    break;
                                }
                                echo"
                                <tr class='catagory_results' style='display:none' id='security'>
                                <td>".$author."</td>
                                <td>".$title."</td>
                                <td>".$year."</td>
                                <td>".$edition."</td>
                                <td>".$print_size."</td>
                                <td>".$file_type."</td>
                                <td><a href='downloads.php?file_id=".$file_id."'><i class='fa fa-download'></i>Download</a></td>
                                </tr>";
                            }
                        }else{
                            echo "<tr class='catagory_results' style='display:none' id='security'><td colspan='7' style='text-align:center;' id='security'>No records found</td></tr>";
                        }
                    ?>
                </div>

                <div id="others">
                    <?php 
                        $sql = "SELECT ID, AUTHOR, TITLE, YEAR_PUBLISHED,BOOK_EDITION,BOOK_SIZE,FILE_TYPE FROM book WHERE CAT_ID='5' ORDER BY TITLE ASC";
                        $result = mysqli_query($connect,$sql) or die("Error in querying database ".mysqli_errno($connect));
                        $row_count = mysqli_num_rows($result);

                        if($row_count>0){
                            while($row = mysqli_fetch_array($result)){
                                $author=$row['AUTHOR'];
                                $title = $row['TITLE'];
                                $year = $row['YEAR_PUBLISHED'];
                                $edition = $row['BOOK_EDITION'];
                                $size = $row['BOOK_SIZE'];
                                $file_type = $row['FILE_TYPE'];
                                $file_id = $row['ID'];
                                $print_size=0;
                                switch($size){
                                    case $size < 1024:
                                        $print_size = number_format($size,1,"."," ")." bytes";
                                    break;
                                    case $size <=2097152:
                                        $print_size = number_format(($size/1024),1,"."," ")." kb";
                                    break;
                                    case $size > 2097152:
                                        $print_size = number_format(($size/1048576),1,"."," ")." mb";
                                    break;
                                }
                                echo"
                                <tr class='catagory_results' style='display:none' id='others'>
                                    <td>".$author."</td>
                                    <td>".$title."</td>
                                    <td>".$year."</td>
                                    <td>".$edition."</td>
                                    <td>".$print_size."</td>
                                    <td>".$file_type."</td>
                                    <td><a href='downloads.php?file_id=".$file_id."'><i class='fa fa-download'></i>Download</a></td>
                                </tr>";
                            }
                        }else{
                            echo "<tr class='catagory_results' style='display:none' id='others'><td colspan='7' style='text-align:center;' id='others'>No records found</td></tr>";
                        }
                    ?>    
                </div>
                    </tbody>
                </table>    
            </div>    
            </div>

<?php
    mysqli_close($connect);
    require_once "requires/footer.php";
?>
