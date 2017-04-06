$(function(){
  $('.prot-li').on('click',function () {
      $(this).addClass('clickStyle').siblings().removeClass('clickStyle');
  });
    $('.prot-one img').hover(function () {
       $(this).siblings('.shade').show() ;
    },function () {
        $(this).siblings('.shade').hide();
    });
});
