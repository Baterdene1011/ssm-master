<div class="" id="commonSelectableGridWrap">
    <table class="table table-bordered table-hover" id="commonSelectableGrid">
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

<script type="text/javascript">
    var commonSelectableGridVar;

    $.fn.dataTable.Api.register('column().title()', function() {
        return $(this.header()).text().trim();
    });

    commonSelectableGridFn();
    function commonSelectableGridFn() {
        commonSelectableGridVar = $('#commonSelectableGrid').DataTable({
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
                var rowFilter = $('<tr class="datatable-filter"></tr>').appendTo($(commonSelectableGridVar.table().header()));

                this.api().columns().every(function() {
                    var column = this;
                    var input = $(`<div class="input-icon"><input type="text" class="form-control form-control-sm form-filter datatable-input datatable-column-filter" data-col-index="` + column.index() + `"/><span><i class="flaticon2-search-1 icon-nm text-dark-50"></i></span></div>`);
                    $(input).appendTo($('<th>').appendTo(rowFilter));
                });              
            }               
        });

        $('#commonSelectableGridWrap').on('keydown', '.datatable-column-filter', function(e){
            var keyCode = (e.keyCode ? e.keyCode : e.which),
                $this = $(this);

            if (keyCode === 13) {
                commonSelectableGridVar.column($this.data('col-index'))
                    .search($this.val())
                    .draw();
            }
        });          
        
        $('#commonSelectableGrid tbody').on('click', 'tr', function () {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            } else {
                commonSelectableGridVar.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });                          
    };        
</script>