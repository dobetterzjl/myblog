window.onscroll = function() {
    var iScrollTop = document.documentElement.scrollTop ||
        document.body.scrollTop;
    if (iScrollTop >= 50) {//50为滚动条想要的高度
        var oTitle = document.getElementById('header');
        oTitle.style.position = "fixed"
        oTitle.style.left = 0;
        oTitle.style.top = 0;
    }
    else {
        var oTitle = document.getElementById('header');
        oTitle.style.position = "static";
    }
};
