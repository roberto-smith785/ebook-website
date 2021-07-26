<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="main.css" type="text/css" rel="stylesheet">
    <base href="">
    <link rel="script" type="text/js" href="main.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="web_content_wrap" id="top">
        <header>
            
            <div class="site_header">
                <div class="logo">
                    <a href="home">
                    <img src="images/logo.png" sizes="400X600" alt="ebook website logo">
                    </a>
                </div>
                <div class="main_nav">
                    <nav>
                        <li class="<?php if($page=='home'){ echo "active_link";}?>">
                            <a href="home"><i class="fa fa-home"></i>&nbsp;Home</a></li>
                        <li class="catelogue_cat <?php if($page=='catalogue'){ echo "active_link";}?>">&nbsp;
                            <a href="catalogue" ><i class="fa fa-list"></i>&nbsp;Catalogue</a>
                        <section class="categories">
                            <li><a class="nav_category cat_1">Informatics</a></li>
                            <li><a class="nav_category cat_2">Networking</a></li>
                            <li><a class="nav_category cat_3">Programming</a></li>
                            <li><a class="nav_category cat_4">Security</a></li>
                            <li><a class="nav_category cat_5">Others</a></li>
                        </section>
                            </li>
                        <li class="<?php if($page=='proverbs'){ echo "active_link";}?>">&nbsp;
                            <a href="proverbs"><i class="fa fa-quote-right"></i>&nbsp;Proverbs</a></li>
                    </nav>
                </div>
            </div>
            <hr>
            
            
            
