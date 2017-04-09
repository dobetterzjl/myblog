require(['jquery','scrollfix'],function ($) {
    $(function(){
        var $clicknum=0;
        $('#btn-more').on('click',function () {
            $(this).hide();
            var that = this;
            $clicknum+=6;
            $.get('welcome/get_more',{
                clickNum:$clicknum
            },function(data) {
                console.log(data);
                var html='';
                    for(var i=0;i<data.length;i++){
                        html+=`<li>
                        <img src="`+data[i].img+`">
                        <p class="desc">`+data[i].content+` </p>
                        <p class="info">
                            <a class="read" href="welcome/view_blog?blogId=`+data[i].blog_id+`">READ</a>
                        </p>
                    </li>`;
                    }
                    $('#blog-list ul').append(html);
                    $(that).show();

            },'json')
        });
    });
});
