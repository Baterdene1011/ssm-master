<div id="windowId_{{ $windowId }}">
    <form class="form" id="itemForm" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label class="col-lg-2 col-form-label text-right">@lang('lang.borluulaltajiltan'):</label>
            <div class="col-lg-4">
                <div class="input-daterange input-group" data-url="/salesEmployeeSelectableGrid" data-endpoint="salesEmployee" data-id="salesEmployeeId" data-code="code" data-name="name">
                    <input type="hidden" name="salesEmployeeId">
                    <input type="text" class="form-control form-control-sm showCodeField">
                    <div class="input-group-append custom-group-append-style" onclick="OApp.CommonSelectableGrid(this, 'setSelectableData')">
                        <span class="input-group-text">
                            <i class="flaticon-search"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control form-control-sm showNameField">
                </div>
            </div>
            <label for="orderNumber" class="col-lg-2 col-form-label text-right">@lang('lang.zahialgiindugaar'):</label>
            <div class="col-lg-4">
                <input readonly class="form-control form-control-sm" type="text" id="orderNumber" name="orderNumber" />
            </div>
        </div> 
        <div class="form-group row">
            <label class="col-lg-2 col-form-label text-right">@lang('lang.route'):</label>
            <div class="col-lg-4">
                <div class="input-daterange input-group" data-url="/routeSelectableGrid" data-endpoint="route" data-id="routeId" data-code="code" data-name="name">
                    <input type="hidden" name="employeeId">
                    <input type="text" class="form-control form-control-sm showCodeField">
                    <div class="input-group-append custom-group-append-style" onclick="OApp.CommonSelectableGrid(this, 'setSelectableData')">
                        <span class="input-group-text">
                            <i class="flaticon-search"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control form-control-sm showNameField">
                </div>
            </div>
            <label class="col-lg-2 col-form-label text-right">@lang('lang.zahialgiinognoo'):</label>
            <div class="col-lg-4">
                <div class="input-group date">
                    <input type="text" class="form-control form-control-sm dateInit">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="la la-calendar"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div> 
        <div class="form-group row">
            <label class="col-lg-2 col-form-label text-right">@lang('lang.hariltsagch'):</label>
            <div class="col-lg-4">
                <div class="input-daterange input-group" data-url="/routeSelectableGrid" data-endpoint="route" data-id="routeId" data-code="code" data-name="name">
                    <input type="hidden" name="employeeId">
                    <input type="text" class="form-control form-control-sm showCodeField">
                    <div class="input-group-append custom-group-append-style" onclick="OApp.CommonSelectableGrid(this, 'setSelectableData')">
                        <span class="input-group-text">
                            <i class="flaticon-search"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control form-control-sm showNameField">
                </div>
            </div>
            <label class="col-lg-2 col-form-label text-right">@lang('lang.hurgeltiinognoo'):</label>
            <div class="col-lg-4">
                <div class="input-group date">
                    <input type="text" class="form-control form-control-sm dateInit">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="la la-calendar"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div> 
        <div class="form-group row">
            <label class="col-lg-2 col-form-label text-right">@lang('lang.uniintorol'):</label>
            <div class="col-lg-4">
                <div class="input-daterange input-group" data-url="/routeSelectableGrid" data-endpoint="route" data-id="routeId" data-code="code" data-name="name">
                    <input type="hidden" name="employeeId">
                    <input type="text" class="form-control form-control-sm showCodeField">
                    <div class="input-group-append custom-group-append-style" onclick="OApp.CommonSelectableGrid(this, 'setSelectableData')">
                        <span class="input-group-text">
                            <i class="flaticon-search"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control form-control-sm showNameField">
                </div>
            </div>
            <label class="col-lg-2 col-form-label text-right">@lang('lang.tolboriinhelber'):</label>
            <div class="col-lg-4">
                <div class="input-daterange input-group" data-url="/routeSelectableGrid" data-endpoint="route" data-id="routeId" data-code="code" data-name="name">
                    <input type="hidden" name="employeeId">
                    <input type="text" class="form-control form-control-sm showCodeField">
                    <div class="input-group-append custom-group-append-style" onclick="OApp.CommonSelectableGrid(this, 'setSelectableData')">
                        <span class="input-group-text">
                            <i class="flaticon-search"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control form-control-sm showNameField">
                </div>
            </div>
        </div> 
        <div class="form-group row">
            <label for="isVat" class="col-lg-2 col-form-label text-right">@lang('lang.isvat'):</label>
            <div class="col-lg-4">
                <label class="checkbox">
                    <input type="checkbox" id="isVat" name="isVat">
                    <span></span>
                </label>
            </div>
        </div> 
        <div>
            <a href="javascript:;" data-url="/itemSelectableGrid" data-endpoint="item/searchitem" data-id="itemId" data-code="code" data-name="name" onclick="OApp.CommonMultipleSelectableGrid(this, 'setMultilpleSelectableItemData')" class="btn btn-primary btn-sm mb-3 add_row_item_btn">
                <i class="flaticon-plus"></i> @lang('lang.addbtn')
            </a>           
        </div>
        <div class="order-detail-mini table-responsive">
            <table class="table table-bordered order-detail-table">
                <thead>
                    <tr>
                        <th>@lang('lang.baraaniicode')</th>
                        <th>@lang('lang.baraaniiner')</th>
                        <th>@lang('lang.baraaniibarcode')</th>
                        <th>@lang('lang.hemjihnegj')</th>
                        <th>@lang('lang.jin')</th>
                        <th>@lang('lang.hairtsagdahitoo')</th>
                        <th>@lang('lang.hairtsagniitoo')</th>
                        <th>@lang('lang.tooshirkheg')</th>
                        <th>@lang('lang.une')</th>                        
                        <th>@lang('lang.bonuseseh')</th>
                        <th>@lang('lang.niitune')</th>
                        <th>@lang('lang.hyamdraliinhuwi')</th>
                        <th>@lang('lang.hyamdraliindune')</th>
                        <th class="vatColumn d-none">@lang('lang.noatguiune')</th>
                        <th class="vatColumn d-none">@lang('lang.noat')</th>
                        <th>@lang('lang.tolohdun')</th>
                    </tr>
                </thead>        
                <tbody>
                </tbody>
            </table>    
        </div>
    </form>
</div>
<script type="text/javascript">
    $.fn.hasExtension = function(exts) {
        return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test($(this).val().toLowerCase());
    };        

    $('#upload-image-preview').magnificPopup({
        delegate: 'a.show-image',
        type: 'image',
        gallery:{enabled:true}
    });           

    $('#windowId_{{ $windowId }}').on('click', 'input[name="isVat"]', function(){
        var $this, 
            $tableTrs = $('#windowId_{{ $windowId }}').find('.order-detail-table > tbody > tr'),
            $thisCheck = $('#windowId_{{ $windowId }}').find('input[name="isVat"]'),
            $tr;
        var price,
            noVat,
            unitVat,
            totalVat,
            noVat2,
            unitVat2,
            qty;

        if ($thisCheck.is(":checked")) {
            $('.vatColumn', '#windowId_{{ $windowId }}').removeClass('d-none');
        } else {
            $('.vatColumn', '#windowId_{{ $windowId }}').addClass('d-none');
        }

        $tableTrs.each(function() {
            $this = $(this);
            $tr = $this;
            price = $tr.find('input[data-name="amount"]').autoNumeric('get');
            qty = $tr.find('input[name="qty[]"]').autoNumeric('get');

            if ($thisCheck.is(":checked")) {
                totalVat = price * qty;
                noVat = OApp.NumberRound(totalVat / 1.1);
                unitVat = OApp.NumberRound(price - noVat);
                noVat2 = OApp.NumberRound(totalVat / 1.1, 5);
                unitVat2 = OApp.NumberRound(price - noVat2, 5);
            } else {
                unitVat = 0;
                unitVat2 = 0;
                noVat = 0;
                noVat2 = 0;
                totalVat = price * qty;   
            }
            $tr.find('input[data-name="noVat"]').autoNumeric('set', noVat);
            $tr.find('input[data-name="vat"]').autoNumeric('set', unitVat);        
            $tr.find('input[name="noVat[]"]').val(noVat2);
            $tr.find('input[name="vat[]"]').val(unitVat2);        
            $tr.find('input[data-name="payAmount"]').autoNumeric('set', totalVat);
            $tr.find('input[name="payAmount[]"]').val(totalVat);
            $tr.find('input[data-name="totalAmount"]').autoNumeric('set', totalVat);
            $tr.find('input[name="totalAmount[]"]').val(totalVat);
        })
    });    

    $('#windowId_{{ $windowId }}').on('change', 'input[name="qty[]"]', function(){
        var $this = $(this), $tr = $this.closest('.tr-zone');
        var $thisCheck = $('#windowId_{{ $windowId }}').find('input[name="isVat"]');
        var price,
            noVat,
            unitVat,
            totalVat,
            noVat2,
            unitVat2,
            qty;                    
        price = $tr.find('input[data-name="amount"]').autoNumeric('get');
        qty = $tr.find('input[name="qty[]"]').autoNumeric('get');

        if ($thisCheck.is(":checked")) {
            totalVat = price * qty;
            noVat = OApp.NumberRound(totalVat / 1.1);
            unitVat = OApp.NumberRound(price - noVat);
            noVat2 = OApp.NumberRound(totalVat / 1.1, 5);
            unitVat2 = OApp.NumberRound(price - noVat2, 5);
        } else {
            unitVat = 0;
            unitVat2 = 0;
            noVat = 0;
            noVat2 = 0;
            totalVat = price * qty;   
        }
        $tr.find('input[data-name="noVat"]').autoNumeric('set', noVat);
        $tr.find('input[data-name="vat"]').autoNumeric('set', unitVat);        
        $tr.find('input[name="noVat[]"]').val(noVat2);
        $tr.find('input[name="vat[]"]').val(unitVat2);        
        $tr.find('input[data-name="payAmount"]').autoNumeric('set', totalVat);
        $tr.find('input[name="payAmount[]"]').val(totalVat);
        $tr.find('input[data-name="totalAmount"]').autoNumeric('set', totalVat);
        $tr.find('input[name="totalAmount[]"]').val(totalVat);
    });    

    $('#windowId_{{ $windowId }}').on('change', 'input[name="saleAmount[]"]', function(){
        var $this = $(this), $tr = $this.closest('.tr-zone');
        var amount = Number($tr.find('input[data-name="amount"]').autoNumeric('get')) - Number($this.autoNumeric('get'));

        $tr.find('input[data-name="amount"]').autoNumeric('set', amount);
        $tr.find('input[name="amount[]"]').val(amount);
        $tr.find('input[name="qty[]"]').trigger('change');
    });    

    $('#windowId_{{ $windowId }}').on('change', 'input[name="salePercent[]"]', function(){
        var $this = $(this), $tr = $this.closest('.tr-zone');
        var amount = Number($tr.find('input[data-name="amount"]').autoNumeric('get'));
        var salePercent = Number($this.autoNumeric('get'));
        var salePrice = salePercent * amount / 100; 

        $tr.find('input[data-name="amount"]').autoNumeric('set', OApp.NumberRound(amount - salePrice));
        $tr.find('input[name="amount[]"]').val(OApp.NumberRound(amount - salePrice, 5));
        $tr.find('input[name="qty[]"]').trigger('change');
    });    

    function onChangeEventPhoto(input) {
        if ($(input).hasExtension(['png', 'gif', 'jpeg', 'pjpeg', 'jpg', 'x-png', 'bmp'])) {

            KTApp.blockPage({
                overlayColor: '#000000',
                state: 'primary',
                message: '@lang('lang.waitingtext')'
            }); 

            $(input).closest("form").ajaxSubmit({
                type: 'post',
                url: '{{ route('convertItemPhoto') }}',
                dataType: 'json',
                beforeSend: function () {
                },
                success: function (data) {
                    if (data.status === 'success') {
                        var li = '';
                        var imageData = data.imageData;
                        $.each(imageData, function (i, r) {
                            li += '<div class="col-lg-4 mt-6">'+
                                '<div class="card card-custom overlay">'+
                                    '<div class="card-body p-0">'+
                                        '<div class="overlay-wrapper">'+
                                        '<img class="w-100 rounded" src="data:' + r.mimeType + ';base64,' + r.thumbBase64Data + '" alt="Item Photo"/>'+
                                        '</div>'+
                                        '<div class="overlay-layer">'+
                                            "<a href='data:" + r.mimeType + ";base64," + r.origBase64Data + "' class='btn btn-sm btn-primary show-image btn-shadow'>@lang('lang.showbtn')</a>"+
                                            "<a href='javascript:;' onclick=\"eventRemovePhoto(this)\" class='btn btn-sm btn-light-primary btn-shadow ml-2'>@lang('lang.deletebtn')</a>"+
                                        '</div>'+
                                    '</div>'+
                                '</div>';
                            li += '<input type="hidden" name="event_photo_orig_data[]" value="' + r.origBase64Data + '"/>';
                            li += '<input type="hidden" name="event_photo_thumb_data[]" value="' + r.thumbBase64Data + '"/>';
                            li += '<input type="hidden" name="event_photo_extension[]" value="' + r.extension + '"/>'+
                            '</div>';
                        });
                        $('#upload-image-preview').append(li);
                        KTApp.unblockPage();
                    }
                }
            });
        } else {
            alert('Зурган файл сонгоно уу.');
            $(input).val('');
        }
    }        
    function eventRemovePhoto(elem) {
        $(elem).closest('.col-lg-4').remove();
    }        
    function setSelectableData(elem, selectedRow) {
        var $parentObj = $(elem).closest('.input-group');
        $parentObj.find('input[type="hidden"]').val(selectedRow[$parentObj.data('id')]);
        $parentObj.find('.showCodeField').val(selectedRow[$parentObj.data('code')]);
        $parentObj.find('.showNameField').val(selectedRow[$parentObj.data('name')]);        
    }
    function setMultilpleSelectableItemData(elem, selectedRow) {
        var rowHtml = '';
        for(var i = 0; i < selectedRow.length; i++) {
            rowHtml += '<tr class="tr-zone">';
            rowHtml += '<td><input class="form-control form-control-sm" disabled type="text" value="'+selectedRow[i]['itemCode']+'" />'+
                        '<input type="hidden" name="salesPrice[]" value="1000" />'+
                    '</td>';
            rowHtml += '<td><input class="form-control form-control-sm" disabled type="text" value="'+selectedRow[i]['itemName']+'" /></td>';
            rowHtml += '<td><input class="form-control form-control-sm" disabled type="text" value="'+(selectedRow[i]['barcode'] ? selectedRow[i]['barcode'] : '')+'" /></td>';
            rowHtml += '<td><input class="form-control form-control-sm" disabled type="text" value="'+selectedRow[i]['measureName']+'" /></td>';
            rowHtml += '<td><input disabled class="form-control form-control-sm" type="text" placeholder="@lang('lang.jin')" name="weight[]" value="" /></td>';
            rowHtml += '<td><input disabled class="form-control form-control-sm" type="text" placeholder="@lang('lang.hairtsagdahitoo')" name="boxInsideNumber[]" value="2" /></td>';
            rowHtml += '<td><input class="form-control form-control-sm" type="text" placeholder="@lang('lang.hairtsagniitoo')" name="boxNumber[]" /></td>';
            rowHtml += '<td><input class="form-control form-control-sm text-right longInit" placeholder="@lang('lang.tooshirkheg')" type="text" name="qty[]" value="1" /></td>';            
            rowHtml += '<td><span class="decimalInput"><input class="form-control form-control-sm text-right numberInit" type="text" palceholder="@lang('lang.une')" data-name="amount" value="1000" /><input type="hidden" name="amount[]" value="1000" /></span></td>';
            rowHtml += '<td><input class="form-control form-control-sm" type="text" placeholder="@lang('lang.bonuseseh')" name="isBonus[]" /></td>';
            rowHtml += '<td><span class="decimalInput"><input class="form-control form-control-sm text-right numberInit" type="text" placeholder="@lang('lang.niitune')" data-name="totalAmount" /><input type="hidden" name="totalAmount[]" /></span></td>';
            rowHtml += '<td><input class="form-control form-control-sm text-right longInit" type="text" placeholder="@lang('lang.hyamdraliinhuwi')" name="salePercent[]" /></td>';
            rowHtml += '<td><input class="form-control form-control-sm text-right numberInit" type="text" placeholder="@lang('lang.hyamdraliindune')" name="saleAmount[]" /></td>';
            rowHtml += '<td class="vatColumn d-none"><span class="decimalInput"><input class="form-control form-control-sm text-right numberInit" placeholder="@lang('lang.noatguiune')" data-name="noVat" type="text" /><input type="hidden" name="noVat[]" /></span></td>';
            rowHtml += '<td class="vatColumn d-none">'+
                    '<span class="decimalInput">'+
                        '<input class="form-control form-control-sm text-right numberInit" type="text" placeholder="@lang('lang.noat')" data-name="vat" />'+
                        '<input type="hidden" name="vat[]" />'+
                    '</span>'+
                '</td>';
            rowHtml += '<td>'+
                    '<span class="decimalInput">'+
                        '<input class="form-control form-control-sm text-right numberInit" type="text" placeholder="@lang('lang.tolohdun')" data-name="payAmount" />'+
                        '<input type="hidden" name="payAmount[]" />'+
                    '</span>'+
                '</td>';
            rowHtml += '</tr>';
        }
        $('.order-detail-table', '#windowId_{{ $windowId }}').append(rowHtml);
        OApp.InitNumberInput($('#windowId_{{ $windowId }} .order-detail-table'));                     
        OApp.InitLongInput($('#windowId_{{ $windowId }} .order-detail-table'));        
    }

    $("body").on("keydown", 'input.showCodeField:not(disabled, readonly)', function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var _this = $(this);
        if (code === 13) {
            if (_this.data("ui-autocomplete")) {
                _this.autocomplete("destroy");
            }
            return false;
        } else {
            if (!_this.data("ui-autocomplete")) {
                OApp.AutoCompletePopup(_this, 'code');
            }
        }
    });    

    $("body").on("keydown", 'input.showNameField:not(disabled, readonly)', function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var _this = $(this);
        if (code === 13) {
            if (_this.data("ui-autocomplete")) {
                _this.autocomplete("destroy");
            }
            return false;
        } else {
            if (!_this.data("ui-autocomplete")) {
                OApp.AutoCompletePopup(_this, 'name');
            }
        }
    });    

    function saleItemDate(elem) {
        var dialogNameSale = 'dialog-sale-item-date';

        if (!$("#" + dialogNameSale).length) {
            $('<div id="' + dialogNameSale + '"></div>').appendTo('body');
        }
        var $dialogSale = $('#' + dialogNameSale);
        $dialogSale.empty().append('<div class="form-group row">'+
                '<label class="col-5 col-form-label text-right" for="itemPrice">@lang('lang.startdate')</label>'+
                '<div class="col-7">'+
                    '<div class="input-group date">'+
                        '<input type="text" class="form-control form-control-sm dateInit" value="'+$(elem).parent().find('input[name="saleItemPriceStartDate"]').val()+'">'+
                        '<div class="input-group-append">'+
                            '<span class="input-group-text">'+
                                '<i class="la la-calendar"></i>'+
                            '</span>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'+
            '<div class="form-group row">'+
                '<label class="col-5 col-form-label text-right" for="itemPrice">@lang('lang.enddate')</label>'+
                '<div class="col-7">'+
                    '<div class="input-group date">'+
                        '<input type="text" class="form-control form-control-sm dateInit" value="'+$(elem).parent().find('input[name="saleItemPriceEndDate"]').val()+'">'+
                        '<div class="input-group-append">'+
                            '<span class="input-group-text">'+
                                '<i class="la la-calendar"></i>'+
                            '</span>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'
        );

        $dialogSale.dialog({
            cache: false,
            resizable: false,
            bgiframe: true,
            autoOpen: false,
            title: '@lang('lang.saleitemprice')',
            width: 300,
            height: 'auto',
            modal: false,
            open: function() {
                $("input").blur();
            },
            close: function() {
                $dialogSale.empty().dialog('destroy').remove();
            },
            buttons: [{
                text: '@lang('lang.insertBtn')',
                class: 'btn btn-success btn-sm',
                click: function() {         
                    var getSaleStartDate = $dialogSale.find('input:first').val();
                    var getSaleEndDate = $dialogSale.find('input:last').val();
                    if (getSaleStartDate == '' || getSaleEndDate == '') {
                        toastr.warning("@lang('lang.require')");
                        return;
                    }
                    $(elem).parent().find('input[name="saleItemPriceStartDate"]').val(getSaleStartDate);
                    $(elem).parent().find('input[name="saleItemPriceEndDate"]').val(getSaleEndDate);
                    $(elem).html('(' + getSaleStartDate + ', ' + getSaleEndDate + ') <span onclick="removeSaleItemDate(this)">' + "@lang('lang.deletebtn')" + '</span>');
                    $dialogSale.dialog('close');
                }
            },{
                text: '@lang('lang.closebtn')',
                class: 'btn btn-light-primary btn-sm',
                click: function() {                            
                    $dialogSale.dialog('close');
                }
            }]
        }).dialogExtend({
            "closable": true,
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
        $dialogSale.dialog('open');    
        OApp.InitDatePicker($dialogSale);
    }

    function removeSaleItemDate(elem) {
        $(elem).parent().parent().find('input[name="saleItemPriceStartDate"]').val('');
        $(elem).parent().parent().find('input[name="saleItemPriceEndDate"]').val('');
        $(elem).parent().html("@lang('lang.datesaleitemprice')");
    }
</script>