/**
 * Created by lixy on 2016/4/24.
 * 对jquery datatable 进行默认设置
 */
$.extend(true, $.fn.dataTable.defaults, {
    "searching": true,
    "aLengthMenu": [
        [10, 15, 20, 50],
        [10, 15, 20, 50]
    ],
    "sDom": "Tflt<'row DTTTFooter'<'col-sm-6'i><'col-sm-6'p>>",
    "ordering": false, //[1, 'asc']
    "iDisplayLength": 10,
    language: {
        "sEmptyTable":   	"没有匹配的数据",
        "sInfo":         	"第 _START_ - _END_ 条 / 共 _TOTAL_ 条数据",
        "sInfoEmpty":    	"没有匹配的数据",
        "sInfoFiltered": 	"(搜索到 _MAX_ 条数据)",
        "sInfoPostFix":  	"",
        "sInfoThousands":  ".",
        "sLengthMenu":   	"_MENU_", //每页显示 _MENU_ 条记录
        "sLoadingRecords": "正在加载中...",
        "sProcessing":   	"正在加载中...",
        "sSearch":       	"",
        "sZeroRecords":  	"对不起，没有匹配的数据",
        "oPaginate": {
            "sFirst":    	"第一页",
            "sPrevious": 	"上一页",
            "sNext":     	"下一页",
            "sLast":     	"最后一页"
        },
        "oAria": {
            "sSortAscending":  ": 选择按升序进行排序的列",
            "sSortDescending": ": 启用列降序排序"
        }
    },
    "processing": true,
    "serverSide": true
});