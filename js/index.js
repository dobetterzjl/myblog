$(function(){
  $('.prot-li').on('click',function () {
      $(this).addClass('clickStyle').siblings().removeClass('clickStyle');
  });
    $('.prot-one img').hover(function () {
       $(this).siblings('.shadow').show() ;
    },function () {
        $(this).siblings('.shadow').hide();
    });
});
