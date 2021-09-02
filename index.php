<?php
    $page='home';
    require_once "requires/header.php";
    $connect = mysqli_connect("localhost","root","","ebook") or die("Error cconneccting to database: ".mysqli_connect_error());
?>
<title>eBook</title>
            <div class="site_header_article">
                <h1>Download free pdf books</h1>
                <article>
                    <h2>e-book</h2>
                    <p>/ˈiːbʊk/</p>
                    <p>an electronic version of a printed book that can be read on a computer or a specifically designed handheld device.</p>
                </article>
            </div>
            <div class="search_bar">
                        <input type="search" name="search_book" id="search_book" placeholder="Enter book title">
                        <div class="sort_by">
                            <div>
                                <p id="sort_div_title">Sort by : </p>
                                <div>
                                    <input type="radio" name="sort_by" class="radio_sort Author" id="author_sort" checked>
                                    <label for="author_sort" class="sort_label" >Author</label>
                                    <br>
                                    <input type="radio" name="sort_by" class="radio_sort Title" id="title_sort">
                                    <label for="title_sort" class="sort_label">Title</label>
                                    <br>
                                    <input type="radio" name="sort_by" class="radio_sort Year" id="year_sort">
                                    <label for="year_sort" class="sort_label">Year</label>
                                    <br>
                                    <input type="radio" name="sort_by" class="radio_sort Edition" id="edition_sort">
                                    <label for="edition_sort" class="sort_label">Edition</label>
                                    <br>
                                    <input type="radio" name="sort_by" class="radio_sort Size" id="size_sort">
                                    <label for="size_sort" class="sort_label">Size</label>
                                </div>
                            </div>
                            <div>
                                <p id="sort_order">Order by : </p>
                                <div>
                                    <input type="radio" name="order_by" class="radio_order ASC" id="asc_order" checked>
                                    <label for="asc_order" class="order_label" >ASC</label>
                                    <br>
                                    <input type="radio" name="order_by" class="radio_order DESC" id="desc_order">
                                    <label for="desc_order" class="order_label">DESC</label>
                                </div>     
                            </div>
                        </div>
                    </div>
        </header>
        <main id="home_main">
            <div class="main_content_wrap">
            <table id="book_homepage" style="border-collapse:collapse;">
                    <thead>
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
            <?php
                $sql = "SELECT * FROM book ORDER BY YEAR_PUBLISHED DESC";
                $result = mysqli_query($connect,$sql);
                $row_count = mysqli_num_rows($result);
                if($row_count>0){
                    while($row=mysqli_fetch_array($result)){
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
                                $print_size = number_format($size,2,"."," ")." bytes";
                            break;
                            case $size <=2097152:
                                $print_size = number_format(($size/1024),2,"."," ")." kb";
                            break;
                            case $size > 2097152:
                                $print_size = number_format(($size/1048576),2,"."," ")." mb";
                            break;
                        }
                        echo "
                        <tr>
                        <td>".$author."</td>
                        <td class='title'>".$title."</td>
                        <td>".$year."</td>
                        <td>".$edition."</td>
                        <td>".$print_size."</td>
                        <td>".$file_type."</td>
                        <td><a href='downloads.php?file_id=".$file_id."'><i class='fa fa-download'></i>Download</a></td>
                        </tr>";
                       
                    }
                }else{
                    echo "<tr><td colspan='7' style='text-align:center'>No results found</td></tr>";
                }
                mysqli_close($connect);
            ?>
            </tbody>
            </table>
            <script src="table.js" async></script>
            </div>
    <?php
        require_once "requires/footer.php";
    ?>
