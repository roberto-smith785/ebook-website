<?php
    $page='home';
    require_once "requires/header.php";
    $connect = mysqli_connect("localhost","root","","ebook") or die("Error cconneccting to database: ".mysqli_connect_error());
    $query= "SELECT * FROM `category`";

    $result= mysqli_query($connect,$query);

    $options = "";

    while($row = mysqli_fetch_array($result)){
        $row_id=$row["CAT_ID"];
        $row_name=$row["CAT_NAME"];
        $options = $options."<option class='opt_class' value='{$row_id}'>".$row_name."</option>";
    }

?>
<main class="admin_page" style="width:100%; display:inline-flex; min-height:100vh; margin-top:0;">
<div class="side_bar" style="width:15%; height:minmax(100vh,auto); background-color:gray;">
    <button>Show Side Bar</button>
    <div>
        <div class="add_book">
            <h2>Book</h2>
        </div>
        <div class="add_category">
            <h2>Category</h2>
        </div>
        <div class="add_proverb">
            <h2>Proverb</h2>
        </div>

    </div>
</div>
    
    <div class="main_section" style="width:85%; background-color:pink">
    <h1><centre>WELCOME ADMIN</centre></h1>
    <form action="process_data.php" method="post" enctype="multipart/form-data" traget="_self" id="form">
        <input type="text" name="author" id="" placeholder="Author"><br>
        <input type="text" name="book_title" id="" placeholder="Book Title"><br>
        <input type="text" name="year" id="" placeholder="Year"><br>
        <input type="text" name="edition" id="" placeholder="Edition"><br>
        <input type="file" name="upload_file" id="upload_file" placeholder="File"><br>
        <select name="select_category" id="select_category" placeholder="select one">
                <option class="opt_class" value="#" selected disabled>--Select category--</p>
                <?php echo $options; ?>
                <option class="opt_class" value="null">Not in the list</option>
        </select>
        
        <br>
        <p>Create new category:</p>
        <input type="radio" name="new_category" id="yes">
        <label for="yes">YES</label>
        <input type="radio" name="new_category" id="no">
        <label for="no">NO</label>
        <br>
        <button type="submit" name="upload_file">UPLOAD</button>
    </form>
    <script src="process_data.js"></script>
</div>

</main>

<?php
    mysqli_close($connect);
    require_once "requires/footer.php";
?>
