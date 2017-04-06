<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>文章详情</title>
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" href="<?php echo site_url();?>css/style.css">
    <link rel="stylesheet" href="<?php echo site_url();?>css/blog_detail.css">
    <link rel="stylesheet" href="<?php echo site_url();?>css/font-awesome.min.css">
    <meta name ="viewport" content="width=device-width,initial-scale=1">
    <script>
        window.AddEventListener("load",function(){
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
        <h3><span class="comment-num">3</span>Responses</h3>
        <ul class="comment-list">
            <li class="comment">
                <div class="comment-info">
                    <span class="username">Admin</span>
                    <span class="post-date">2016-1</span>
                </div>
                <p class="content">xcc zcc zcx</p>
            </li>
        </ul>

        <div class="comment-form">
            <h3>leave a comment</h3>
            <form action="" method="post">
                <p><input type="text" class="text-box" placeholder="Name" id="username" name="username"></p>
                <p><input type="email" class="text-box" placeholder="Email" id="email" name="email"></p>
                <p><input type="tel" class="text-box" placeholder="Telephone Number" id="phone" name="phone"></p>
                <p><textarea name="message" class="text-box" id="message" cols="30" rows="10"></textarea></p>
                <p ><input type="submit" value="Send"></p>
            </form>

        </div>
    </div>
</div>
</body>
</html>