var UserListDataTable = function () {
    return {
        init: function () {
            var oTable = $('#searchable').dataTable({
                "ajax": "/admin/articles/index",
                columns: [
                    { data: 'id', title: 'ID', bSearchable: false, bSortable: false},
                    { data: 'title', title: '标题'},
                    { data: 'view_count', title: '浏览量'},
                    { data: 'tags', title: '标签'},
                    { data: 'created_at', title: '创建时间'},
                    { data: 'updated_at', title: '更新时间'},
                    { data: null, title: '操作'}
                ],
                fnRowCallback: function(nRow, aData, iDisplayIndex) {
                    $('td:eq(-1)', nRow).html('<span class="btn btn-link action-edit" data-href="/admin/articles/edit?id='+ aData.id +'">编辑</span>  ' +
                        '<span class="btn btn-link action-del" data-href="/admin/articles/delete?id='+ aData.id +'">删除</span>');
                }
            });
        }
    }
}();
UserListDataTable.init();