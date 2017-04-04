# myblog
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
