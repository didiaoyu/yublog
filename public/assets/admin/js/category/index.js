var UserListDataTable = function () {
    return {
        init: function () {
            var baseUrl = '/admin/category/';
            $('#searchable').dataTable({
                "ajax": baseUrl + "index",
                columns: [
                    { data: 'id', title: 'ID', bSearchable: false, bSortable: false},
                    { data: 'name', title: '栏目名称'},
                    { data: 'alias', title: '栏目别名'},
                    { data: 'order', title: '排序'},
                    { data: 'created_at', title: '创建时间'},
                    { data: 'updated_at', title: '更新时间'},
                    { data: null, title: '操作'}
                ],
                fnRowCallback: function(nRow, aData, iDisplayIndex) {
                    $('td:eq(-1)', nRow).html('<span class="btn btn-link action-edit" data-href="'+baseUrl+'edit?id='+ aData.id +'">编辑</span>  ' +
                        '<span class="btn btn-link action-del" data-href="'+baseUrl+'delete?id='+ aData.id +'">删除</span>');
                }
            });
        }
    }
}();
UserListDataTable.init();