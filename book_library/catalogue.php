<?php
    $page='catalogue';
    require_once "requires/header.php";
    //require "requires/functions.php";
    $connect = mysqli_connect("localhost","root","","ebook") or die("Failed to connect : ".mysqli_connect_error());
?>
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
                <input type="radio" value="INFORMATICS" class="category_btn" name="category_btn" id="informatics" checked>
                <label class="category_btn_label" for="informatics">INFORMATICS</label>

                <input type="radio" value="NETWORKING" class="category_btn" name="category_btn" id="networking">
                <label class="category_btn_label" for="networking">NETWORKING</label>

                <input type="radio" value="PROGRAMMING" class="category_btn" name="category_btn" id="programming">
                <label class="category_btn_label" for="programming">PROGRAMMING</label>

                <input type="radio" value="SECURITY" class="category_btn" name="category_btn" id="security">
                <label class="category_btn_label" for="security">SECURITY</label>

                <input type="radio" value="OTHERS" class="category_btn" name="category_btn" id="others">
                <label class="category_btn_label" for="others">OTHERS</label>

            </div>

            <div class="catalogue_tables_container">
            <table  id="catalogue_table">
                                <tr>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Year</th>
                                    <th>Edition</th>
                                    <th>SIZE</th>
                                    <th>TYPE</th>
                                    <th>DOWNLOAD</th>
                                </tr>
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
                                <td><a href='downloads.php?file_id=".$file_id."'>Click Here</a></td>
                                </tr>";
                            }
                            }else{
                                echo "<tr><td colspan='7' style='text-align:center'>No results found</td></tr>";
                            }
                        
                    ?>
                </div>

                <div id="networking" >
                    <?php 
                        $sql = "SELECT ID, AUTHOR, TITLE, YEAR_PUBLISHED,BOOK_EDITION,BOOK_SIZE,FILE_TYPE FROM book WHERE CAT_ID='2' ORDER BY TITLE ASC";
                        $result = mysqli_query($connect,$sql) or die("Error in querying database ".mysqli_errno($connect));
                        $row_count = mysqli_num_rows($result);
                            echo "The rows are ".$row_count;
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
                                <td><a href='downloads.php?file_id=".$file_id."'>Click Here</a></td>
                                </tr>";
                            }
                        }else{
                            echo "<tr><td id='no_results'>No records found</td></tr>";
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
                                <td><a href='downloads.php?file_id=".$file_id."'>Click Here</a></td>
                                </tr>";
                            }
                        }else{
                            echo "<tr><td id='no_results'>No records found</td></tr>";
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
                                <td><a href='downloads.php?file_id=".$file_id."'>Click Here</a></td>
                                </tr>";
                            }
                        }else{
                            echo "<tr><td id='security'>No records found</td></tr>";
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
                                    <td><a href='downloads.php?file_id=".$file_id."'>Click Here</a></td>
                                </tr>";
                            }
                        }else{
                            echo "<tr><td id='others'>No records found</td></tr>";
                        }
                    ?>    
                </div>

                </table>    
            </div>    
            </div>

<?php
    mysqli_close($connect);
    require_once "requires/footer.php";
?>
