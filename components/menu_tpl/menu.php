<li>
    <a href="">
        <?= $category['name'] ?>
        <?php if(isset($category['childs'])): ?>
        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
        <?php endif; ?>

    </a>
            <?php if(isset($category['childs'])): ?>
                <ul>
                    <?= $this->getMenuHtml($category['childs']) ?>
                </ul>
            <?php endif; ?>
</li>



<!--ul>li*5>a {Item $} + TAB-->
<!--<ul>-->
<!--    <li><a href="">Item 1</a></li>-->
<!--    <li><a href="">Item 2</a></li>-->
<!--    <li><a href="">Item 3</a></li>-->
<!--    <li><a href="">Item 4</a></li>-->
<!--    <li><a href="">Item 5</a></li>-->
<!--</ul>-->

<!--MAGIC-->
<!--#page>div.logo+ul#navigation>li*5>a{Item $}-->
<!--<div id="page">-->
<!--    <div class="logo"></div>-->
<!--    <ul id="navigation">-->
<!--        <li><a href="">Item 1</a></li>-->
<!--        <li><a href="">Item 2</a></li>-->
<!--        <li><a href="">Item 3</a></li>-->
<!--        <li><a href="">Item 4</a></li>-->
<!--        <li><a href="">Item 5</a></li>-->
<!--    </ul>-->
<!--</div>-->

