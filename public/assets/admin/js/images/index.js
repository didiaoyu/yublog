var UserListDataTable = function () {
    return {
        init: function () {
            var oTable = $('#searchable').dataTable({
                "ajax": "/admin/images/index",
                columns: [
                    { data: 'content_id', title: 'ID', bSearchable: false, bSortable: false},
                    { data: 'cate_id', title: '分类'},
                    { data: 'img_url', title: '封面', class: 'cover_image'},
                    { data: 'title', title: '标题'},
                    { data: 'need_score', title: '所需积分'},
                    { data: 'click_times', title: '浏览量'},
                    { data: 'if_open', title: '是否公开'},
                    { data: null, title: '操作'}
                ],
                fnRowCallback: function(nRow, aData, iDisplayIndex) {
                    $('.cover_image', nRow).html('<img src="'+aData.img_url+'" />');
                    $('td:eq(-1)', nRow).html('<span class="btn btn-link action-edit" data-href="/admin/images/edit?content_id='+ aData.content_id +'">编辑</span>  ' +
                        '<span class="btn btn-link action-del" data-href="/admin/images/delete?content_id='+ aData.content_id +'">删除</span>');
                }
            });
        }
    }
}();
UserListDataTable.init();