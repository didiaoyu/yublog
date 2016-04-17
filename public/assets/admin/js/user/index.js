var UserListDataTable = function () {
    return {
        init: function () {
            var oTable = $('#searchable').dataTable({
                "sDom": "Tflt<'row DTTTFooter'<'col-sm-6'i><'col-sm-6'p>>",
                "ordering": false, //[1, 'asc']
                "aLengthMenu": [
                   [10, 15, 20, 50],
                   [10, 15, 20, 50]
                ],
                "iDisplayLength": 10,
                oLanguage: {
                    "sLengthMenu" : "_MENU_", //每页显示 _MENU_ 条记录
                    "sZeroRecords" : "对不起，没有匹配的数据",
                    "sInfo" : "第 _START_ - _END_ 条 / 共 _TOTAL_ 条数据",
                    "sInfoEmpty" : "没有匹配的数据",
                    "sInfoFiltered" : "(数据表中共 _MAX_ 条记录)",
                    "sProcessing" : "正在加载中...",
                    "sSearch" : "", //全文搜索：
                    "oPaginate" : {
                        "sFirst" : "第一页",
                        "sPrevious" : " 上一页 ",
                        "sNext" : " 下一页 ",
                        "sLast" : " 最后一页 "
                    }
                },
                "processing": true,
                "serverSide": true,
                "ajax": "/admin/user/index",
                columns: [
                    { data: 'id', title: 'ID', bSearchable: false, bSortable: false},
                    { data: 'name', title: '用户名'},
                    { data: 'email', title: '邮箱'},
                    { data: 'created_at', title: '创建时间'},
                    { data: 'updated_at', title: '更新时间'},
                    { data: null, title: '操作'}
                ],
                fnRowCallback: function(nRow, aData, iDisplayIndex) {
                    $('td:eq(-1)', nRow).html('<span class="btn btn-link action-edit" data-href="/admin/user/edit?id='+ aData.id +'">编辑</span>  ' +
                        '<span class="btn btn-link action-del" data-href="/admin/user/delete?id='+ aData.id +'">删除</span>');
                }
            });
        }
    }
}();
UserListDataTable.init();