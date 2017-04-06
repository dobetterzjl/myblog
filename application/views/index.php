<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>首页</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
    <header class="banner">
        <div class="container">
            <div class="b-part b-part1">
                <img src="img/1.jpg" alt=" "/>
                <h2>张建丽</h2>
                <h3>Web Designer</h3>
            </div>
            <div class="b-part b-part2">
                <h3>Contact</h3>
                <h4><a href="mailto:info@example.com">1737289219@qq.com</a></h4>
                <h4 class="agile">15776805420</h4>
                <h4>哈尔滨</h4>
            </div>
            <div class="b-part b-part3">
                <h3>Follow</h3>
                <a href="#" class="icon"><i class="icon-3x icon-github" ></i></a>
                <a href="#" class="icon"><i class="icon-camera-retro"></i> </a>
                <a href="#" class="icon"> <i class="icon-github-alt"></i> </a>
                <a href="#" class="icon"><i class="icon-pencil"></i></a>
            </div>
            <div class="b-part b-part4">
                <h3>Visit</h3>
                <i class="fa fa-behance" aria-hidden="true"></i>
                <h4>Follow my behance portfolio</h4>
            </div>
            <div class="clearfix"></div>
        </div>
        </div>
    </header>
    <div id="about">
        <div class="container">
                <h3>ABOUT ME</h3>
                <span class="liner"></span>
                <img src="img/1.jpg">
                <p class="introduce">
                    张建丽：黑龙江大学，计算机科学技术学院，物联网工程专业2014级学生，
                    从大二开始接触前端并利用课余时间学习前端，能熟练使用html，CSS进行各种网页布局
                    利用原生js或jQuery完成网页各种交互，了解jQuery原理，并自己编写过简单的jQuery库
                    熟悉h5,css3，熟悉bootstrap，并能自己手写响应式，了解浏览器兼容性问题，服务器端语言
                    了解nodejs,php以及它的CI框架，并用CI框架搭建过两个项目，了解mysql
                </p>
                <p class="evaluation">
                    自我评价：能借助各种工具进行英文文档阅读，
                    乐于接受新知识，对前端领域有很强的探索精神
                    学习能力，责任感较强，能承受压力及时完成任务，做事耐心细致；
                    本人性格较为沉稳，上进心强，有较强的责任心和良好的团队合作精神。
                </p>
        </div>
    </div>
    <div id="skills">
        <div class="container">
            <h2>MY SKILLS</h2>
            <span class="liner"></span>
            <div class="skill-left ">
                <div class="s2">
                    <p class="name">HTML/CSS</p>
                    <div class="progress line">
                        <div class="progress-bar progress-bar-info" style="width:90%"></div>
                    </div>
                </div>
                <div class="s2">
                    <p class="name">html5/css3</p>
                    <div class="progress line">
                        <div class="progress-bar progress-bar-info" style="width:80%"></div>
                    </div>
                </div>
                <div class="s2">
                    <p class="name">JavaScript</p>
                    <div class="progress line">
                        <div class="progress-bar progress-bar-info" style="width:75%"></div>
                    </div>
                </div>
                <div class="s2">
                    <p class="name">jQuery</p>
                    <div class="progress line">
                        <div class="progress-bar progress-bar-info" style="width:70%"></div>
                    </div>
                </div>
            </div>
            <div class="skill-right ">
                <div class="s2">
                    <p class="name">NodeJS</p>
                    <div class="progress line">
                        <div class="progress-bar progress-bar-info" style="width:50%"></div>
                    </div>
                </div>
                <div class="s2">
                    <p class="name">PHP</p>
                    <div class="progress line">
                        <div class="progress-bar progress-bar-info" style="width:65%"></div>
                    </div>
                </div>
                <div class="s2">
                    <p class="name">BootStrap</p>
                    <div class="progress line">
                        <div class="progress-bar progress-bar-info" style="width:80%"></div>
                    </div>
                </div>
                <div class="s2">
                    <p class="name">ReactJs</p>
                    <div class="progress line">
                        <div class="progress-bar progress-bar-info" style="width:60%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="protfolia">
        <div class="container">
            <h2>MY PROTFOLIA</h2>
            <span class="liner"></span>
            <ul class="prot-list">
                <li class="prot-li clickStyle"><a>ALL</a></li>
                <?php
                    foreach ($categories as $category){
                ?>
<!--                <li class="prot-li"><a>--><?php //echo $category->cate_name;?><!--</a></li>-->
                <li class="prot-li" data-id="<?php echo $category->cate_id;?>"><?php echo $category->cate_name;?></li>
                <?php
                    }
                ?>
            </ul>
                <ul id="prot-obj">
                    <?php
                        foreach ($blogs as $blog) {
                            ?>
                            <li class="prot-one">
                                <a href="welcome/view_blog?blogId=<?php echo $blog->blog_id;?>">
                                    <div class="img">
                                        <img src="<?php echo $blog->big_img;?>" class="image">
                                        <div class="shade">
                                            <h4>标题：<?php echo $blog->title;?></h4>
                                            <small>访问量：<?php echo $blog->clicked;?></small>
                                            <br/>
                                            <i class="fa fa-search fa-lg"></i>
                                        </div>

                                    </div>
<!--                                </a>-->
<!--                                <img src="--><?php //echo $blog->img?><!--"/>-->
<!--                                <div class="shade">-->
<!--                                    <h4>标题：--><?php //echo $blog->title;?><!--</h4>-->
<!--                                    <small>访问量：--><?php //echo $blog->clicked;?><!--</small>-->
<!--                                    <br/>-->
<!--                                    <i class="fa fa-search fa-lg"></i>-->
<!--                                </div>-->
                            </li>
                            <?php
                        }
                    ?>
                </ul>
            </div>
    </div>
    <div id="contect">
        <div class="container">
            <h2>Contact</h2>
            <span class="liner"></span>
            <div class="contect-message">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <h4>黑龙江大学</h4>
                    <h4>哈尔滨市，南岗区学府路74号</h4>
            </div>
            <div class="contect-message">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <h4><a href="mailto:info@example.com">1737289219@qq.com</a></h4>
                <h4><a href="mailto:info@example.com">hljuzjl@163.com</a></h4>
            </div>
            <div class="contect-message">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <h4>+18044261158</h4>
                <h4>+17365481278</h4>
            </div>
            <form action="#" method="post" class="mess-form">
                <input type="text" name="name" class="name" placeholder="Your Name" required>
                <input type="text" name="email" class="email" placeholder="Your Email" required>
                <textarea  name="your message" placeholder="Your Message"  required></textarea>
                <input type="submit" value="Send Message">
            </form>
        </div>
    </div>
    <footer id="footer">
        <div class="container"></div>
    </footer>
<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/index.js"></script>
</body>
</html>