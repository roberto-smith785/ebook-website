
            <footer>
                <div class="footer_main_content">
                <div class="contacts">
                    <h4>Contact US ON</h4><br>
                    <ul class="footer_list_container">
                    <li><a href="https:www.instagram.com/design_with_rob"><i class="fa fa-instagram" alt=""></i>&nbsp; design_with_rob@instagram.com</a></li>
                    <li><a href="mailto:robertosmith785@gmail.com"><i class="fa fa-envelope" alt=""></i>&nbsp; robertosmith785@gmail.com</a></li>
                    <li><a href="tel:+264812060783"><i class="fa fa-phone" alt=""></i>&nbsp; +264 81 206 0783</a></li>
                    </ul>
                </div>
                <div class="site_map">
                <h4>Links</h4><br>
                    <ul class="footer_list_container">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="catalogue.php">Catalogue</a>
                                <ul class="footer_list_container">
                                <li><a class="category">Informatics</a></li>
                                <li><a class="category">Networking</a></li>
                                <li><a class="category">Programming</a></li>
                                <li><a class="category">Security</a></li>
                                <li><a class="category">Others</a></li>
                                </ul>
                        </li>
                        <li><a href="proverbs.php">Proverbs</a></li>
                    <ul>
                    
                </div>
                <div class="services">
                    <h4>Services offered</h4><br>
                    <ul class="footer_list_container">
                        <li>Academic writing assistence</li>
                        <li>Logo design</li>
                        <li>Web development</li>
                        <li>Information technology consultancy</li>
                    </ul>
                </div>
                </div>
                <div class="footer_copyright">
                <p> Copyright &copy; 2021 ebook</p>
                </div>
                
            </footer>
        </main>
        <span id="date"><?php echo date('F j Y, H:i:s');?></span>
        <span>
            <button type="submit" id="comment_block">
                Request a book
            </button>

            <form id="comment_form" action="user_request.php" method="get" >
                <span>All the fields marked <span id="required"></span> are required</span><br>
                <div>
                    <label for="book_title" id="required">Book Title</label>
                    <input type="text" name="book_title" id="book_title" required autofocus />
                </div>
                <div>
                    <label for="author_name" id="required">Author(s)</label>
                    <input type="text" name="author_name" id="author_name" required />
                </div>
                <div>
                    <label for="publish_info">Year</label>
                    <input type="number" min="1970" max="2021" name="year" id="publish_info" required />
                </div>

                <div>
                    <label for="publish_info">Edition</label>
                    <input type="number" min="0" max="10" name="edition" id="publish_info" />
                </div>

                <div>
                    <p>Enter your email below to get notified when the requested book is available</p><br>
                    <label for="user_email" id="required">Email</label>
                    <input type="email" name="user_email" id="user_email" required/>
                </div>
                <div class="form_btn">
                    <button type="submit" id="submit_form" name="submit">SUBMIT</button>
                    <button type="cancel" id="form_cancel" name="cancel">CANCEL</button>
                </div>
            </form>

            </span>

            
        <script src="main.js"></script>
</body>

</html>