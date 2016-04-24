var UserListDataTable = function () {
    return {
        init: function () {
            $('#searchable').dataTable({
                "ajax": "/admin/tags/index",
                columns: [
                    { data: 'id', title: 'ID', bSearchable: false, bSortable: false},
                    { data: 'name', title: '标签名'},
                    { data: 'created_at', title: '创建时间'},
                    { data: 'updated_at', title: '更新时间'},
                    { data: null, title: '操作'}
                ],
                fnRowCallback: function(nRow, aData, iDisplayIndex) {
                    $('td:eq(-1)', nRow).html('<span class="btn btn-link action-del" data-href="/admin/tags/delete?id='+ aData.id +'">删除</span>');
                }
            });
        }
    }
}();
UserListDataTable.init();