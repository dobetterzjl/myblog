require(['jquery','scrollfix'],function ($) {
    $('.prot-li').on('click',function () {
        $(this).addClass('clickStyle').siblings().removeClass('clickStyle');
    });
    $('.prot-one .img').hover(function () {
        $(this).children('.shade').show() ;
    },function () {
        $(this).children('.shade').hide();
    });
    $('.prot-li').on('click',function () {
        $(this).addClass('clickStyle').siblings().removeClass('clickStyle');
        var cateId = $(this).attr('data-id');
        var $blogList = $('#prot-obj');
        $.get('welcome/get_blog',{cateId:cateId},function (data) {
            $blogList.empty();
            var html='';
            for(var i=0; i<data.length;i++){
                var blog =data[i];
                html+='<li class="prot-one"><a href="welcome/view_blog?blogId='+blog.blog_id+'"> <div class="img"> <img src="'+blog.big_img+'" class="image"> <div class="shade"> <h4>标题：'+ blog.title+'</h4> <small>访问量：'+blog.clicked+'</small> <br/> <i class="fa fa-search fa-lg"></i> </div> </div> </li>';
            }
            $blogList.append(html);
        },'json');
    });
    $('.scroll').on('click',function (event) {
        event.preventDefault();
        $('html,body').animate({
            scrollTop:$(this.hash).offset().top
        },1200);
    });

});

