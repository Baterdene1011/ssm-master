{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="card card-custom" id="windowId_{{ $windowId }}">
        <div class="col-lg-12">
            <form class="form item-criteria-form" style="display: none;">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label>Full Name:</label>
                            <input type="email" class="form-control" placeholder="Enter full name"/>
                        </div>
                        <div class="col-lg-4">
                            <label>Email:</label>
                            <input type="email" class="form-control" placeholder="Enter email"/>
                        </div>
                        <div class="col-lg-4">
                            <label>Email:</label>
                            <input type="email" class="form-control" placeholder="Enter email"/>
                        </div>
                    </div>
                </div>
                <div class="card-footer p-0 bt-0">
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-8 text-right">
                            <button type="reset" class="btn btn-sm btn-primary mr-2">@lang('lang.searchbtn')</button>
                            <button type="reset" class="btn btn-sm btn-secondary">@lang('lang.clearbtn')</button>
                        </div>
                    </div>
                </div>
            </form>        
        </div>
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <a href="javascript:;" class="btn btn-primary btn-sm filter_toggle_btn">
                    <i class="flaticon-search"></i> @lang('lang.filterbtn')
                </a>            
                <a href="javascript:;" id="add_item_btn" class="btn btn-primary btn-sm ml-2">
                    <i class="flaticon-plus"></i> @lang('lang.addbtn')
                </a>            
                <a href="javascript:;" id="edit_item_type_btn" class="btn btn-success btn-sm ml-2">
                    <i class="flaticon-edit"></i> @lang('lang.editbtn')
                </a>            
                <a href="javascript:;" id="delete_item_type_btn" class="btn btn-secondary btn-sm ml-2">
                    <i class="flaticon-delete" style="color:#F64E60"></i> @lang('lang.deletebtn')
                </a>            
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                <div class="dropdown dropdown-inline">
                    <button type="button" class="btn btn-light-primary btn-sm dropdown-toggle" title="@lang('lang.export')" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="flaticon-file-2"></i>
                    </button>
                    <!--begin::Dropdown Menu-->
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <!--begin::Navigation-->
                        <ul class="navi flex-column navi-hover py-2">
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-excel-o"></i>
                                    </span>
                                    <span class="navi-text">Excel</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-pdf-o"></i>
                                    </span>
                                    <span class="navi-text">PDF</span>
                                </a>
                            </li>
                        </ul>
                        <!--end::Navigation-->
                    </div>
                    <!--end::Dropdown Menu-->
                </div>              
                <!--end::Button-->
            </div>
        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover" id="item_table">
                <thead>
                <tr>
                    <th>@lang('lang.itemname')</th>
                    <th>@lang('lang.itemlisttypename')</th>
                    <th>@lang('lang.itemlistprice')</th>
                    <th>@lang('lang.itemnlistdate')</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

        </div>

    </div>

@endsection

{{-- Styles Section --}}
@section('styles')    
@endsection


{{-- Scripts Section --}}
@section('scripts')    
    <script src="{{ asset('plugins/custom2/tinymce/tinymce.min.js') }}" type="text/javascript"></script>    

    <script type="text/javascript">
        var table{{ $windowId }};
        var textEditor;

        $('#windowId_{{ $windowId }}').on('click', '.filter_toggle_btn', function(){
            $('#windowId_{{ $windowId }}').find('.item-criteria-form').slideToggle();
        });
        $('#windowId_{{ $windowId }}').on('click', '#add_item_btn', function(){
            var dialogName = 'dialog-item';

            if (!$("#" + dialogName).length) {
                $('<div id="' + dialogName + '"></div>').appendTo('body');
            }
            KTApp.blockPage({
                overlayColor: '#000000',
                state: 'primary',
                message: '@lang('lang.waitingtext')'
            });              
            $.ajax({
                type: "POST",
                url: '{{ route('itemCreateForm') }}',
                dataType: 'html',
                success: function(data) {
                    var $dialog = $('#' + dialogName);
                    $dialog.empty().append(data);
                    
                    $dialog.dialog({
                        cache: false,
                        resizable: false,
                        bgiframe: true,
                        autoOpen: false,
                        title: '@lang('lang.item')',
                        width: 1200,
                        height: "auto",
                        modal: true,
                        open: function() {
                        },
                        close: function() {
                            $dialog.empty().dialog('destroy').remove();
                        },
                        buttons: [{
                            text: '@lang('lang.savebtn')',
                            class: 'btn btn-success btn-sm',
                            click: function() {
                                var $selForm = $('#itemForm');
                                $selForm.validate({errorClass: "is-invalid", errorPlacement: function () {}});                                
                                if ($selForm.valid()) {
                                    KTApp.blockPage({
                                        overlayColor: '#000000',
                                        state: 'primary',
                                        message: '@lang('lang.waitingtext')'
                                    });                    
                                    $selForm.ajaxSubmit({
                                        type: "POST",
                                        url: '{{ route('itemSave') }}',
                                        dataType: 'json',
                                        success: function(data) {
                                            if (data.status === 'success') {
                                                toastr.success("@lang('lang.successmsg')");                                                 
                                                $dialog.dialog('close');
                                                table{{ $windowId }}.ajax.reload( null, false );
                                            } else {
                                                toastr.warning(data.message); 
                                            }
                                            KTApp.unblockPage();
                                        }
                                    });
                                }                       
                            }
                        },{
                            text: '@lang('lang.closebtn')',
                            class: 'btn btn-light-primary btn-sm',
                            click: function() {                            
                                $dialog.dialog('close');
                            }
                        }]
                    }).dialogExtend({
                        "closable": true,
                        "maximizable": true,
                        "minimizable": true,
                        "collapsable": true,
                        "dblclick": "maximize",
                        "minimizeLocation": "left",
                        "icons": {
                            "close": "ui-icon-circle-close",
                            "maximize": "ui-icon-extlink",
                            "minimize": "ui-icon-minus",
                            "collapse": "ui-icon-triangle-1-s",
                            "restore": "ui-icon-newwin"
                        }
                    });
                    $dialog.dialog('open');
                    $dialog.dialogExtend("maximize");
                }
            }).done(function() {
                KTApp.unblockPage();
                KTApp.initTooltips();
                OApp.InitDatePicker($('#' + dialogName));
                $('.select2').select2();
                OApp.InitNumberInput($('#' + dialogName));                     
                OApp.InitLongInput($('#' + dialogName));
            });
        });

        $('#windowId_{{ $windowId }}').on('click', '#edit_item_type_btn', function(){
            var selectedRow = table{{ $windowId }}.row('.selected').data();
            if (!selectedRow) {
                toastr.info("@lang('lang.requiredRow')");
                return;
            }
            var dialogName = 'dialog-item-type-edit';

            if (!$("#" + dialogName).length) {
                $('<div id="' + dialogName + '"></div>').appendTo('body');
            }
            $.ajax({
                type: "POST",
                url: '{{ route('itemTypeEditForm') }}',
                data: selectedRow,
                dataType: 'html',
                success: function(data) {
                    var $dialog = $('#' + dialogName);
                    $dialog.empty().append(data);
                    
                    $dialog.dialog({
                        cache: false,
                        resizable: false,
                        bgiframe: true,
                        autoOpen: false,
                        title: '@lang('lang.dialogitemtypenameedit')',
                        width: 500,
                        height: "auto",
                        modal: true,
                        open: function() {
                        },
                        close: function() {
                            $dialog.empty().dialog('destroy').remove();
                        },
                        buttons: [{
                            text: '@lang('lang.savebtn')',
                            class: 'btn btn-success btn-sm',
                            click: function() {
                                var $selForm = $('#itemTypeEditForm');
                                $selForm.validate({errorClass: "is-invalid", errorPlacement: function () {}});                                
                                if ($selForm.valid()) {
                                    KTApp.blockPage({
                                        overlayColor: '#000000',
                                        state: 'primary',
                                        message: '@lang('lang.waitingtext')'
                                    });                    
                                    $.ajax({
                                        type: "POST",
                                        url: '{{ route('itemTypeUpdate') }}',
                                        data: $selForm.serialize(),
                                        dataType: 'json',
                                        success: function(data) {
                                            if (data.status === 'success') {
                                                toastr.success("@lang('lang.successmsg')");                                                 
                                                $dialog.dialog('close');
                                                table{{ $windowId }}.ajax.reload( null, false );
                                            } else {
                                                toastr.warning(data.message); 
                                            }
                                            KTApp.unblockPage();
                                        }
                                    });
                                }                       
                            }
                        },{
                            text: '@lang('lang.closebtn')',
                            class: 'btn btn-light-primary btn-sm',
                            click: function() {                            
                                $dialog.dialog('close');
                            }
                        }]
                    }).dialogExtend({
                        "closable": true,
                        "maximizable": true,
                        "minimizable": true,
                        "collapsable": true,
                        "dblclick": "maximize",
                        "minimizeLocation": "left",
                        "icons": {
                            "close": "ui-icon-circle-close",
                            "maximize": "ui-icon-extlink",
                            "minimize": "ui-icon-minus",
                            "collapse": "ui-icon-triangle-1-s",
                            "restore": "ui-icon-newwin"
                        }
                    });
                    $dialog.dialog('open');
                }
            });            
        });

        $('#windowId_{{ $windowId }}').on('click', '#delete_item_type_btn', function(){
            var selectedRow = table{{ $windowId }}.row('.selected').data();
            if (!selectedRow) {
                toastr.info("@lang('lang.requiredRow')");
                return;
            }
            var dialogName = 'dialog-item-type-delete';

            if (!$("#" + dialogName).length) {
                $('<div id="' + dialogName + '"></div>').appendTo('body');
            }
            var $dialog = $('#' + dialogName);
            $dialog.empty().append('@lang('lang.warningMsg')');
            
            $dialog.dialog({
                cache: false,
                resizable: false,
                bgiframe: true,
                autoOpen: false,
                title: '@lang('lang.warning')',
                width: 300,
                height: 120,
                modal: true,
                open: function() {
                },
                close: function() {
                    $dialog.empty().dialog('destroy').remove();
                },
                buttons: [{
                    text: '@lang('lang.yesBtn')',
                    class: 'btn btn-success btn-sm',
                    click: function() {
                        KTApp.blockPage({
                            overlayColor: '#000000',
                            state: 'primary',
                            message: '@lang('lang.waitingtext')'
                        });                    
                        $.ajax({
                            type: "POST",
                            url: '{{ route('itemTypeDelete') }}',
                            data: selectedRow,
                            dataType: 'json',
                            success: function(data) {
                                if (data.status === 'success') {
                                    toastr.success("@lang('lang.successmsg')");                                                 
                                    $dialog.dialog('close');
                                    table{{ $windowId }}.ajax.reload( null, false );
                                } else {
                                    toastr.warning(data.message); 
                                }
                                KTApp.unblockPage();
                            }
                        });               
                    }
                },{
                    text: '@lang('lang.noBtn')',
                    class: 'btn btn-light-primary btn-sm',
                    click: function() {                            
                        $dialog.dialog('close');
                    }
                }]
            }).dialogExtend({
                "closable": false,
                "maximizable": false,
                "minimizable": false,
                "collapsable": false,
                "dblclick": "maximize",
                "minimizeLocation": "left",
                "icons": {
                    "close": "ui-icon-circle-close",
                    "maximize": "ui-icon-extlink",
                    "minimize": "ui-icon-minus",
                    "collapse": "ui-icon-triangle-1-s",
                    "restore": "ui-icon-newwin"
                }
            });
            $dialog.dialog('open');           
        });

        $.fn.dataTable.Api.register('column().title()', function() {
            return $(this.header()).text().trim();
        });

        itemTable{{ $windowId }}();

        function itemTable{{ $windowId }}() {
            table{{ $windowId }} = $('#item_table', '#windowId_{{ $windowId }}').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,          
                fixedHeader: {{ config('app.datatable.fixedHeader') }},    
                dom: `<'row'<'col-sm-12'tr>>
			        <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,                
                lengthMenu: {{ config('app.datatable.listPages') }},
                pageLength: {{ config('app.datatable.listSelectedPages') }},                  
                ajax: {
                    url: '{{ route('itemdata') }}',
                    type: 'POST'
                },
                columns: [
                    {data: 'item_name'},
                    {data: 'item_type_name'},
                    {data: 'price', render: $.fn.dataTable.render.number(',', '.', 2, '')},
                    {data: 'created_date'}
                ],
                order: [[ 3, "desc" ]],
                columnDefs: [
                ],
                language: @lang('ext.datatable'),
                initComplete: function() {
                    var thisTable = this;
                    var rowFilter = $('<tr class="datatable-filter"></tr>').appendTo($(table{{ $windowId }}.table().header()));

                    this.api().columns().every(function() {
                        var column = this;
                        var input;

                        switch (column.title()) {
                            case '@lang('lang.itemname')':
                            case '@lang('lang.itemlisttypename')':
                            case '@lang('lang.itemnlistdate')':
                            case '@lang('lang.itemlistprice')':
                                input = $(`<div class="input-icon"><input type="text" class="form-control form-control-sm form-filter datatable-input datatable-column-filter" data-col-index="` + column.index() + `"/><span><i class="flaticon2-search-1 icon-nm text-dark-50"></i></span></div>`);
                                break;
                        }
                        if (column.title() !== 'Actions') {
                            $(input).appendTo($('<th>').appendTo(rowFilter));
                        }
                    });              
                }               
            });

            $('#windowId_{{ $windowId }}').on('keydown', '.datatable-column-filter', function(e){
                var keyCode = (e.keyCode ? e.keyCode : e.which),
                    $this = $(this);

                if (keyCode === 13) {
                    table{{ $windowId }}.column($this.data('col-index'))
                        .search($this.val())
                        .draw();
                }
            });          
            
            $('#item_table tbody', '#windowId_{{ $windowId }}').on( 'click', 'tr', function () {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                } else {
                    table{{ $windowId }}.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });            
        };        

    </script>
@endsection
