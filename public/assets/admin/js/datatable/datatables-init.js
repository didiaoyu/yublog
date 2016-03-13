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
                "ajax": "/admin/user/userlist",
                columns: [
                    { data: 'id', bSearchable: false, bSortable: false},
                    { data: 'name'},
                    { data: 'email'},
                    { data: 'created_at'},
                    { data: 'updated_at'},
                    // sDefaultContent 如果这一列不需要填充数据用这个属性，值可以不写，起占位作用
                    { "sDefaultContent": '编辑  删除', mRender: function(data){}}
                ]
            });

            /*$("tfoot input").keyup(function () {
                /!* Filter on the column (the index) of this element *!/
                oTable.fnFilter(this.value, $("tfoot input").index(this));
            });*/

        }
    }
}();
