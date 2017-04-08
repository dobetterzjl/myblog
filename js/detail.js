require(['jquery','scrollfix'],function ($) {
    $('#btn-send').on('click',function () {
        var $username = $('#username');
        var $email = $('#email');
        var $phone = $('#phone');
        var $message = $('#message');
        var $hid = $('#hide_id')
        $.get('welcome/save_comment',{
            blogHid:$hid.val(),
            username:$username.val(),
            email:$email.val(),
            phone:$phone.val(),
            message:$message.val()
        },function (data) {
            if(data=="success"){
                alert('评论成功');
                var html = '';
                var now = new Date();
                var comum = $('.comment-num');
                html+=`<li class="comment">
                    <div class="comment-info">
                        <span class="username">`+$username.val()+`</span>
                        <span class="post-date">`+now.toLocaleDateString()+`</span>
                    </div>
                    <p class="content">`+$message.val()+`</p>
                </li>`;
                $('.comment-list').prepend(html);
                comum.text(parseInt(comum.text())+1);
            }else{
                alert("评论失败");
            }
        },'text');
    }); 
});
    

