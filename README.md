# myblog
> 这是一个个人博客系统，用PHP的CI框架搭建，数据库用mysql，前台页面支持响应式，而且响应式有自己手动完成，没有利用bootstrap框架中自带的class，引入bootstrap主要是为了利用其字体图标以及滚动条类，将header封装成一个文件,需要时引用，header实现点击某个导航时可以有动画的滚动到那个模块，并且采用固定顶部方式，并将这些方法封装成模块，需要时利用require.js进行加载，后台中实现文章的查看详情，ajax对文章进行分类，以及文章列表等常见功能，在后台管理系统中，实现文章管理，主要对文章的增删查等操作

难点：
ajax实现分页功能：由于想要实现类似于图片懒加载，即当点击第二页时仍然能看到第一页内容，点击第三页能看到1,2页内容的效果
采用一个按钮，点击进行加载更多。
具体实现：点击按钮时，发送ajax请求，设置一个标志位isEnd=false,在数据库中查询出总条数，根据总条数以及每页需要显示的个数计算出总页数，每点击一次按钮，页数+1，同时页数在ajax中传到controller里，然后在controller中判断，如果当前页数=总页数，isEnd=true，再传到js中，进行弹框通知用户没有更多了，相应的将加载更多按钮隐藏
部分js代码：
```
loadData: function (option, callback) {
                    var param = $.extend({page: this.pageNo}, option);
                    this.$loading.show();
                    $.get('product/get_products', param, function (data) {
                        for(var i=0; i<data.products.length; i++){
                            var products = data.products;
                            var product = new Product(products[i].prod_id, products[i].prod_name, products[i].prod_price, products[i].prod_img);
                            var productHtml = template('product-tpl', product);
                            var $product = $(productHtml);
                            $product.data('item-data', product);
                            this.$productList.append($product);
                        }
                        this.$loading.hide();
                        this.$loadMore.show();
                        this.isLoaded = true;
                        this.isEnd = data.isEnd;
                        callback && callback();
                    }.bind(this), 'json');
                },
                loadMore: function () {
                    var _this = this;
                    if(this.isEnd){
                        alert('没有数据了!');
                        return;
                    }
                    if(this.isLoaded){//如果isLoaded为true代表已经加载完，可以再次进行加载
                        this.pageNo++;
                        this.isLoaded = false;
                        this.loadData({
                            cateId: navComp.categoryId,
                            tagId: navComp.tagId
                        });
                    }

                },
```

项目中踩到的坑，以及是怎么填坑的：
1. 
```
<ul>
<li></li>
<li></li>
</ul>
```
ul 中嵌套li 时，li float:left/right 如果想要li在ul中利用text-align:center居中，则不好使，使用margin 或padding不能自适应
解决方法：li不设置浮动，设置display：inline-block

2.
```
<ul>
  <li><img/></li>
  <li><img/></li>
  <li><img/></li>
  .....
 </ul>
```
设置li宽高，以及将img设置width：100%；height：100%；则图片可以在各个分辨率下按比例缩放

3.自己利用css3 @media screen and (max-width:768px){}这种格式写响应式时，一定要注意选择器的权重值>=上一个截点的权重值 and和 (max-width:768px)之间一定要加空格！

4.ajax实现文章评论时，将用户文本框输入内容插入到数据库，在插入时没有文章ID概念，导致数据库字段不全，再次查询输出时无法显示此评论
    解决方案：在页面文件中添加一个隐藏文本框，其value为此文章ID，后在ajax中取到此值，传值，将其放入数据库字段中
    
5.利用ajax 加载更多 按钮 实现文章列表显示时，当文章已经没有文章时仍然会发送请求，以及用户不小心点击多次时由于网速等外界原因，文章显示无法达到预期效果
    解决方法：在ajax中判断，如果此次偏移量+一次偏移量>总条数则隐藏按钮，显示文本没有更多了，而且在点击事件中添加，首先一点击按钮隐藏，当ajax数据返回，DOM结构生成完毕再进行按钮显示
    
6.select文本框筛选分类时由于每次页面刷新，不能将选中状态添加到已选中元素上，每次都是默认选中的那个
    解决方案：在页面头取到当前URI，cate_id 所在段数，在select中添加selected属性，利用三目运算符，如果当前selectedID= 页面头中取到的ID则添加selected，否则为‘’；
