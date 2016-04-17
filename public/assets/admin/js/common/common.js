//点击导航菜单将url存入cookie
$('.sidebar-menu').on('click', 'a', function () {
    var url = $(this).data('url');
    if (url) {
        eraseCookie('cur_url');
        createCookie('cur_url', url);
        window.location.href = url;
    }
});
//导航选中
var url_pathname = readCookie('cur_url') ? readCookie('cur_url') : '/admin/home/index';
var $curr_a = $(".sidebar-menu a[data-url='"+url_pathname+"']");
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