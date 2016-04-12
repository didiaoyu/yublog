//导航选中
var url_pathname = window.location.pathname;
var $curr_a = $(".sidebar-menu a[href='"+url_pathname+"']");
var $parent_li = $curr_a.parent('li');
$parent_li.addClass('active');
if ($parent_li.parent('ul').hasClass('submenu')) {
    $parent_li.parent().parent().addClass('open');
}

//公用 编辑按钮 点击事件
$('.page-content').on('click', '.action-edit', function () {
    window.location.href = $(this).data('href');
});

//公用 删除按钮 点击事件
$('.page-content').on('click', '.action-del', function () {
    var that = $(this);
    layer.confirm('确定删除吗?', function () {
        window.location.href = that.data('href');
    });
});