<ul class="nav nav-tabs nav-tabs-line">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1">
            <span class="nav-icon"><i class="flaticon-list"></i></span>
            <span class="nav-text">@lang('lang.list')</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2">
            <span class="nav-icon"><i class="flaticon-black"></i></span>
            <span class="nav-text">@lang('lang.chosen') <span class="label label-success ml-2 chosen-counter d-none"></span></span>
        </a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade show active" id="kt_tab_pane_1">
        <div class="" id="commonMultipleSelectableGridWrap">
            <table class="table table-bordered table-hover" id="commonMultipleSelectableGrid">
                <thead>
                <tr>
                    @foreach($gridOptions['propColumns'] as $val)
                        <th>{{ $val['title'] }}</th>
                    @endforeach            
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane fade" id="kt_tab_pane_2">
        <div class="" id="commonMultipleSelectableChosenGridWrap">
            <a href="javascript:;" class="btn btn-secondary btn-sm mt-4 disabled removebtn-multiple-selectablegrid">@lang('lang.deletebtn')</a>
            <table class="table table-bordered table-hover" id="commonMultipleSelectableChosenGrid">
                <thead>
                <tr>
                    <th></th>
                    @foreach($gridOptions['propColumns'] as $val)
                        <th>{{ $val['title'] }}</th>
                    @endforeach            
                </th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>        
    </div>
</div>

<script type="text/javascript">
    var commonMultipleSelectableGridVar,
        globalChosenVar = [];
    var commonMultipleSelectableChosenGridVar;

    $.fn.dataTable.Api.register('column().title()', function() {
        return $(this.header()).text().trim();
    });

    $('.nav-tabs a').on('shown.bs.tab', function(event){
        if (event.target.hash === '#kt_tab_pane_2') {
            var columnsObj = {!! json_encode($gridOptions['columns']) !!},
            columnsObjTemp = [];

            columnsObjTemp.push({
                data: 'itemId',
                className: 'text-center',
                render: function ( data, type, row ) {
                    return '<input type="checkbox" class="selectedCheckbox">';
                }
            });
            for (var i = 0; i < columnsObj.length; i++) {
                columnsObjTemp.push(columnsObj[i]);
            }
            commonMultipleSelectableChosenGridVar = $('#commonMultipleSelectableChosenGrid').DataTable({
                responsive: true,
                processing: false,
                serverSide: false,          
                scrollY: '300px',
                fixedHeader: {{ config('app.datatable.fixedHeader') }},    
                dom: `<'row'<'col-sm-12'tr>>
                    <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,                
                lengthMenu: {{ config('app.datatable.listPages') }},
                pageLength: {{ config('app.datatable.listSelectedPages') }},                  
                data: globalChosenVar,
                columns: columnsObjTemp,
                stateSave: true,
                bDestroy: true,
                language: @lang('ext.datatable')       
            });            
        }
    });    

    commonSelectableGridFn();
    function commonSelectableGridFn() {
        commonMultipleSelectableGridVar = $('#commonMultipleSelectableGrid').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,          
            scrollY: '300px',
            fixedHeader: {{ config('app.datatable.fixedHeader') }},    
            dom: `<'row'<'col-sm-12'tr>>
                <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,                
            lengthMenu: {{ config('app.datatable.listPages') }},
            pageLength: {{ config('app.datatable.listSelectedPages') }},                  
            ajax: {
                url: "{{ $gridOptions['url'] }}",
                type: 'POST',
                "data": function ( d ) {
                    return $.extend({}, d, {
                        "endpoint": "{{ $gridOptions['endpoint'] }}"
                    });               
                } 
            },
            columns: {!! json_encode($gridOptions['columns']) !!},
            order: {!! json_encode($gridOptions['order']) !!},
            columnDefs: [
            ],
            language: @lang('ext.datatable'),
            initComplete: function() {
                var thisTable = this;
                var rowFilter = $('<tr class="datatable-filter"></tr>').appendTo($(commonMultipleSelectableGridVar.table().header()));

                this.api().columns().every(function() {
                    var column = this;
                    var input = $(`<div class="input-icon"><input type="text" class="form-control form-control-sm form-filter datatable-input datatable-column-filter" data-col-index="` + column.index() + `"/><span><i class="flaticon2-search-1 icon-nm text-dark-50"></i></span></div>`);
                    $(input).appendTo($('<th>').appendTo(rowFilter));
                });              
            }               
        });

        $('#commonMultipleSelectableGridWrap').on('keydown', '.datatable-column-filter', function(e){
            var keyCode = (e.keyCode ? e.keyCode : e.which),
                $this = $(this);

            if (keyCode === 13) {
                commonMultipleSelectableGridVar.column($this.data('col-index'))
                    .search($this.val())
                    .draw();
            }
        });          
        
        $('#commonMultipleSelectableGrid tbody').on('click', 'tr', function () {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            } else {
                commonMultipleSelectableGridVar.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });                          
    };           
</script>