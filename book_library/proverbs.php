<?php
    $page='proverbs';
    require_once "requires/header.php";
    $connect = mysqli_connect("localhost", "root","","ebook") or die("Error creating database connection : ".mysqli_connect_error());
?>
            <div class="site_header_article">
                <article>
                    <h2>proverb</h2>
                    <p>/ˈprɒvəːb/</p>
                    <p>a short, well-known pithy saying, stating a general truth or piece of advice.</p>
                </article>
            </div>
        </header>
        <main id="proverbs_main">
            <div class="proverbs_content_wrap">
            
            <?php
                $sql = "SELECT TITLE,QUOTE from proverb";
                $result = mysqli_query($connect,$sql) or die("Error fetching items : ".mysqli_connect_error());

                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_array($result)){
                        $title = $row['TITLE'];
                        $quote = $row['QUOTE'];

                        echo '<div class="proverb_wrap">
                                    <p id="proverb_title"><b>'.$title.'</b><p>
                                    <br>
                                    <p id="proverb_quote"><em>"'.$quote.'"</em><p>
                            </div>
                        ';
                    }
                    
                }
                mysqli_close($connect);
            ?>
            </div>

<?php
    require_once "requires/footer.php";
?>