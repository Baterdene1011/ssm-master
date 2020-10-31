{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="card card-custom" id="windowId_{{ $windowId }}">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <a href="javascript:;" id="add_item_type_btn" class="btn btn-primary btn-sm">
                    <i class="flaticon-plus"></i> Нэмэх
                </a>            
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                <div class="dropdown dropdown-inline">
                    <button type="button" class="btn btn-light-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"/>
                                <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"/>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>Export
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

            <!--begin::Search Form-->
            <div class="mt-2 mb-5 mt-lg-5 mb-lg-10">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="row align-items-center">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query"/>
                                    <span><i class="flaticon2-search-1 text-muted"></i></span>
                                </div>
                            </div>

                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                    <select class="form-control" id="kt_datatable_search_status">
                                        <option value="">All</option>
                                        <option value="1">Pending</option>
                                        <option value="2">Delivered</option>
                                        <option value="3">Canceled</option>
                                        <option value="4">Success</option>
                                        <option value="5">Info</option>
                                        <option value="6">Danger</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
                                    <select class="form-control" id="kt_datatable_search_type">
                                        <option value="">All</option>
                                        <option value="1">Online</option>
                                        <option value="2">Retail</option>
                                        <option value="3">Direct</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                        <a href="#" class="btn btn-light-primary px-6 btn-sm">
                            Хайх
                        </a>
                    </div>
                </div>
            </div>
            <!--end::Search Form-->

            <table class="table table-bordered table-hover" id="item_type_table">
                <thead>
                <tr>
                    <th>@lang('lang.itemtypename')</th>
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
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        $('#windowId_{{ $windowId }}').on('click', '#add_item_type_btn', function(){
            var dialogName = 'dialog-item-type';

            if (!$("#" + dialogName).length) {
                $('<div id="' + dialogName + '"></div>').appendTo('body');
            }
            $.ajax({
                type: "POST",
                url: '/item-type/create',
                dataType: 'html',
                success: function(data) {
                    var $dialog = $('#' + dialogName);
                    $dialog.empty().append(data);
                    
                    $dialog.dialog({
                        cache: false,
                        resizable: false,
                        bgiframe: true,
                        autoOpen: false,
                        title: '@lang('lang.dialogitemtypename')',
                        width: 600,
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
                                $('#itemTypeForm').validate({errorClass: "is-invalid", errorPlacement: function () {}});                                
                                if ($('#itemTypeForm').valid()) {
                                    KTApp.blockPage({
                                        overlayColor: '#000000',
                                        state: 'primary',
                                        message: '@lang('lang.waitingtext')'
                                    });                               
                                    setTimeout(function() {
                                            KTApp.unblockPage();
                                    }, 4000);    
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
        $.fn.dataTable.Api.register('column().title()', function() {
            return $(this.header()).text().trim();
        });

        itemTypeTable{{ $windowId }}();

        function itemTypeTable{{ $windowId }}() {
            var table = $('#item_type_table', '#windowId_{{ $windowId }}').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,          
                fixedHeader: {{ config('app.datatable.fixedHeader') }},    
                dom: `<'row'<'col-sm-12'tr>>
			        <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,                
                lengthMenu: {{ config('app.datatable.listPages') }},
                pageLength: {{ config('app.datatable.listSelectedPages') }},                  
                ajax: {
                    url: '{{ route('itemtype') }}',
                    type: 'POST'
                },
                columns: [
                    {data: 'item_type_name', type: 'bbb'}
                ],
                order: [[ 0, "asc" ]],
                columnDefs: [
                ],
                language: @lang('ext.datatable'),
                initComplete: function() {
                    var thisTable = this;
                    var rowFilter = $('<tr class="datatable-filter"></tr>').appendTo($(table.table().header()));

                    this.api().columns().every(function() {
                        var column = this;
                        var input;

                        switch (column.title()) {
                            case '@lang('lang.itemtypename')':
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
                    table.column($this.data('col-index'))
                        .search($this.val())
                        .draw();
                }
            });              
        };        
    </script>
@endsection
