<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>文章详情</title>
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    <link rel="stylesheet" type="text/css"  href="css/blog_list.css">
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
    <?php include 'header.php'?>
    <div id="blog-list">
        <div class="container">
            <ul>
                <?php foreach ($blogs as $blog){
                    ?>
                    <li>
                        <img src="<?php echo $blog->img;?>">
                        <p class="desc"><?php echo $blog->content;?> </p>
                        <p class="info">
                            <a class="read" href="welcome/view_blog?blogId=<?php echo $blog->blog_id;?>">READ</a>
                        </p>
                    </li>
                <?php
                }?>
            </ul>
            <div id="more">
                <button id="btn-more">加载更多。。。</button>
            </div>
        </div>
    </div>
<script src="js/require.js" data-main="js/blog_list"></script>
</body>
</html>