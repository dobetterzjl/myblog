<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>文章详情</title>
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    <link rel="stylesheet" type="text/css"  href="css/blog_detail.css">
    <link rel="stylesheet" type="text/css"  href="css/font-awesome.min.css">
    <meta name ="viewport" content="width=device-width,initial-scale=1">
    <script>
        window.addEventListener("load",function(){
            setTimeout(hideURLbar,0);
        },false);
        function hideURLbar(){
            window.scrollTo(0,1);
        }
    </script>
</head>
<body>
<div id = "artical-content">
    <div class="wrapper">
        <h3 class="title"><?php echo $blog->title;?></h3>
        <img src="<?php echo $blog->img;?>" class="img" alt="">
        <p class="content"><?php echo $blog->content;?> </p>
        <ul class="artical-info">
            <li><i class="fa fa-calendar"></i><?php echo $blog->post_date;?></li>
            <li><i class="fa fa-list"></i><?php echo $blog->cate_name;?></li>
            <li><i class="fa fa-eye-open"></i><?php echo $blog->clicked;?></li>
        </ul>
    </div>
</div>
<div id="artical-comment">
    <div class="wrapper">
        <h3><span class="comment-num"><?php echo count($blog->comments)?></span>Responses</h3>
        <ul class="comment-list">
            <?php 
                    foreach($blog->comments as $comment){
                ?>
                <li class="comment">
                    <div class="comment-info">
                        <span class="username"><?php echo $comment->username;?></span>
                        <span class="post-date"><?php echo $comment->post_date;?></span>
                    </div>
                    <p class="content"><?php echo $comment->message;?></p>
                </li>
                <?php
            }
            ?>
        </ul>

        <div class="comment-form">
            <h3>leave a comment</h3>
            <form>
                <p><input type="hidden" id="hide_id" value="<?php echo $blog->blog_id;?>"></p>
                <p><input type="text" class="text-box" placeholder="Name" id="username" name="username"></p>
                <p><input type="email" class="text-box" placeholder="Email" id="email" name="email"></p>
                <p><input type="tel" class="text-box" placeholder="Telephone Number" id="phone" name="phone"></p>
                <p><textarea name="message" class="text-box" id="message" cols="30" rows="10"></textarea></p>
                <p ><input type="button" value="Send" id="btn-send"></p>
            </form>

        </div>
    </div>
</div>
</body>
<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/detail.js"></script>
</html>