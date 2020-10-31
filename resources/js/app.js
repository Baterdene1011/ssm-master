"use strict";
var lookupAutoCompleteRequest = null
var systemTransCode = 'mn';
var scaleNumber = 2;

window.OApp = function() {
    var CommonSelectableGrid = function(element, functionName) {
        var dialogName = 'dialog-common-selectable-grid',
            webUrl = $(element).closest('.input-group').data('url'),
            endpoint = $(element).closest('.input-group').data('endpoint');

        if (!$("#" + dialogName).length) {
            $('<div id="' + dialogName + '"></div>').appendTo('body');
        }

        $.ajax({
            type: "POST",
            url: webUrl,
            data: {'endpoint' : endpoint},
            dataType: 'json',
            success: function(data) {        
                var $dialog = $('#' + dialogName);
                $dialog.empty().append(data.html);
                
                $dialog.dialog({
                    cache: false,
                    resizable: false,
                    bgiframe: true,
                    autoOpen: false,
                    title: data.title,
                    width: 1100,
                    height: 'auto',
                    modal: true,
                    open: function() {
                    },
                    close: function() {
                        $dialog.empty().dialog('destroy').remove();
                    },
                    buttons: [{
                        text: data.close,
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
                $('#commonSelectableGrid tbody').on('dblclick', 'tr', function () {
                    if ($(this).hasClass('selected')) {
                        $(this).removeClass('selected');
                    } else {
                        commonSelectableGridVar.$('tr.selected').removeClass('selected');
                        $(this).addClass('selected');
                    }
                    var selectedRow = commonSelectableGridVar.row('.selected').data();
                    window[functionName](element, selectedRow);
                    $dialog.dialog('close');
                });                      
            }
        });          
    }    
    var CommonMultipleSelectableGrid = function(element, functionName) {
        var dialogName = 'dialog-common-selectable-grid',
            webUrl = $(element).data('url'),
            idField = $(element).data('id'),
            endpoint = $(element).data('endpoint');

        if (!$("#" + dialogName).length) {
            $('<div id="' + dialogName + '"></div>').appendTo('body');
        }

        $.ajax({
            type: "POST",
            url: webUrl,
            data: {'endpoint' : endpoint},
            dataType: 'json',
            success: function(data) {        
                var $dialog = $('#' + dialogName);
                $dialog.empty().append(data.html);
                
                $dialog.dialog({
                    cache: false,
                    resizable: false,
                    bgiframe: true,
                    autoOpen: false,
                    title: data.title,
                    width: 1100,
                    height: 'auto',
                    modal: true,
                    open: function() {
                    },
                    close: function() {
                        $dialog.empty().dialog('destroy').remove();
                    },
                    buttons: [{
                        text: data.choose,
                        class: 'btn btn-success btn-sm',
                        click: function() {                            
                            window[functionName](element, globalChosenVar);
                            $dialog.dialog('close');
                        }
                    },{
                        text: data.close,
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
                
                $('#commonMultipleSelectableGrid tbody').on('dblclick', 'tr', function () {
                    if ($(this).hasClass('selected')) {
                        $(this).removeClass('selected');
                    } else {
                        $(this).addClass('selected');
                    }

                    var selectedRow = commonMultipleSelectableGridVar.row('.selected').data();
                    var isAdded = false, rowId = selectedRow[idField]; 
                    
                    for (var key in globalChosenVar) {
                        var chosenRow = globalChosenVar[key], 
                            childId = chosenRow[idField];

                        if (rowId == childId) {
                            isAdded = true;
                            break;
                        } 
                    }
                    
                    if (!isAdded) {
                        globalChosenVar.push(selectedRow);
                        $('.chosen-counter').removeClass('d-none').text(globalChosenVar.length);
                    }                    
                });               

                $('#commonMultipleSelectableChosenGridWrap').on('change', '.selectedCheckbox', function () {
                    var $tr = $(this).closest('tr');
                    if ($tr.hasClass('selected')) {
                        $tr.removeClass('selected');
                    } else {
                        $tr.addClass('selected');
                    }
            
                    var selectedRow = commonMultipleSelectableGridVar.row('.selected').data();
                    if (selectedRow) {
                        $('.removebtn-multiple-selectablegrid').removeClass('disabled');
                    }
                });      
            
                $('#commonMultipleSelectableChosenGridWrap').on('click', '.removebtn-multiple-selectablegrid', function () {
                    var $tr = $(this).closest('tr');
                    if ($tr.hasClass('selected')) {
                        $tr.removeClass('selected');
                    } else {
                        $tr.addClass('selected');
                    }
            
                    var selectedRow = commonMultipleSelectableGridVar.rows('.selected').data();
                    if (selectedRow) {
                        $('.removebtn-multiple-selectablegrid').removeClass('disabled');
                    }
                    var rowId = selectedRow[idField]; 
                    
                    for (var key in globalChosenVar) {
                        var chosenRow = globalChosenVar[key], 
                            childId = chosenRow[idField];
            
                        if (rowId == childId) {
                            globalChosenVar.splice(key, 1);
                            break;
                        } 
                    }
                    
                    if (!globalChosenVar.length) {
                        $('.chosen-counter').addClass('d-none').text('0');
                        $('.removebtn-multiple-selectablegrid').addClass('disabled');
                    }
                });                          
            }
        });          
    }    
    var AutoCompletePopup = function(elem, type) {
        var _this = elem;
        var _parent = _this.closest("div.input-group");
        var params = '';
        var isHoverSelect = false;

        // if (typeof bpElem.attr("data-criteria-param") !== 'undefined') {
        //     var paramsPathArr = bpElem.attr("data-criteria-param").split("|");
        //     for (var i = 0; i < paramsPathArr.length; i++) {
        //         var fieldPathArr = paramsPathArr[i].split("@");
        //         var fieldPath = fieldPathArr[0];
        //         var inputPath = fieldPathArr[1];
        //         var fieldValue = '';

        //         if ($("[data-path='"+fieldPath+"']", mainSelector).length > 0) {
        //             fieldValue = getBpRowParamNum(mainSelector, elem, fieldPath);
        //         } else {
        //             fieldValue = fieldPath;
        //         }

        //         params += inputPath + "=" + fieldValue + "&";
        //     }
        // }

        _this.autocomplete({
            minLength: 1,
            maxShowItems: 30,
            delay: 500,
            highlightClass: "lookup-ac-highlight", 
            appendTo: "body",
            position: {my : "left top", at: "left bottom", collision: "flip flip"}, 
            autoSelect: false,
            source: function(request, response) {

                if (lookupAutoCompleteRequest != null) {
                    lookupAutoCompleteRequest.abort();
                    lookupAutoCompleteRequest = null;
                }

                lookupAutoCompleteRequest = $.ajax({
                    type: 'post',
                    url: '/autoCompletePopup',
                    dataType: 'json',
                    data: {
                        endPoint: _parent.data('endpoint'),
                        q: request.term, 
                        type: type, 
                        id: _parent.data('id'),
                        code: _parent.data('code'),
                        name: _parent.data('name'),
                        filter: encodeURIComponent(params) 
                    },
                    success: function(data) {
                        if (type == 'code') {
                            response($.map(data, function(item) {
                                var code = item.split("|");
                                return {
                                    value: code[1], 
                                    label: code[1],
                                    name: code[2], 
                                    id: code[0]
                                };
                            }));
                        } else {
                            response($.map(data, function(item) {
                                var code = item.split("|");
                                return {
                                    value: code[2], 
                                    label: code[1],
                                    name: code[2], 
                                    id: code[0]
                                };
                            }));
                        }
                    }
                });
            },
            focus: function(event, ui) {
                if (typeof event.keyCode === 'undefined' || event.keyCode == 0) {
                    isHoverSelect = false;
                } else {
                    if (event.keyCode == 38 || event.keyCode == 40) {
                        isHoverSelect = true;
                    }
                }
                return false;
            },
            open: function() {
                $(this).autocomplete('widget').zIndex(99999999999999);
                return false;
            },
            close: function() {
                $(this).autocomplete("option","appendTo","body"); 
            }, 
            select: function(event, ui) {
                var origEvent = event;
    
                if (isHoverSelect || event.originalEvent.originalEvent.type == 'click') {
                    if (type === 'code') {
                        _parent.find("input.showCodeField").val(ui.item.label);
                    } else {
                        _parent.find("input.showNameField").val(ui.item.name);
                    }
                } else {
                    if (type === 'code') {
                        if (ui.item.label === _this.val()) {
                            _parent.find("input.showCodeField").val(ui.item.label);
                            _parent.find("input.showNameField").val(ui.item.name);
                            _parent.find("input[type='hidden']").val(ui.item.id);
                        } else {
                            _parent.find("input.showCodeField").val(_this.val());
                            event.preventDefault();
                        }
                    } else {
                        if (ui.item.name === _this.val()) {
                            _parent.find("input.showCodeField").val(ui.item.label);
                            _parent.find("input.showNameField").val(ui.item.name);
                        } else {
                            _parent.find("input.showNameField").val(_this.val());
                            event.preventDefault();
                        }
                    }
                }
    
                while (origEvent.originalEvent !== undefined) {
                    origEvent = origEvent.originalEvent;
                }
    
                if (origEvent.type === 'click') {
                    var e = jQuery.Event("keydown");
                    e.keyCode = e.which = 13;
                    _this.trigger(e);
                }
            }
        }).autocomplete("instance")._renderItem = function(ul, item) {
            ul.addClass('popup-ac-render');

            if (type === 'code') {
                var re = new RegExp("(" + this.term + ")", "gi"),
                    cls = this.options.highlightClass,
                    template = "<span class='" + cls + "'>$1</span>",
                    label = item.label.replace(re, template);

                return $('<li>').append('<div class="lookup-ac-render-code">'+label+'</div><div class="lookup-ac-render-name">'+item.name+'</div>').appendTo(ul);
            } else {
                var re = new RegExp("(" + this.term + ")", "gi"),
                    cls = this.options.highlightClass,
                    template = "<span class='" + cls + "'>$1</span>",
                    name = item.name.replace(re, template);

                return $('<li>').append('<div class="lookup-ac-render-code">'+item.label+'</div><div class="lookup-ac-render-name">'+name+'</div>').appendTo(ul);
            }
        };
    }    
    var InitTextEditor = function(element) {
        return new Quill(element, {
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, false]
                    }],
                    ['bold', 'italic', 'underline', { list: 'ordered' }, { list: 'bullet' }],
                    ['link', 'image', 'blockquote', 'code-block']
                ]
            },
            placeholder: '',
            theme: 'snow' // or 'bubble'
        });          
    }
    var InitDatePicker = function(element) {
        element = (typeof element === 'undefined') ? $(document.body) : element;
        var $el = element.find('input.dateInit');

        $el.inputmask("9999-99-99", {
            "placeholder": "____-__-__",
        });        
        $el.datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayBtn: 'linked',
            todayHighlight: true, 
            language: systemTransCode,
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'                
            }
        });
    }
    var InitNumberInput = function(element) {
        var $element = (typeof element === 'undefined') ? $(document.body) : element;
        var $el = $element.find('.numberInit');
        var len = $el.length, i = 0;
        
        for (i; i < len; i++) {
            var $this = $($el[i]);

            var minValue = '-999999999999999999999999999999.999999999999999999999999999999';
            var maxValue = '999999999999999999999999999999.999999999999999999999999999999';

            if (typeof $this.attr('data-v-min') !== 'undefined' && $this.attr('data-v-min') != '') {
                minValue = $this.attr('data-v-min');
            }
            if (typeof $this.attr('data-v-max') !== 'undefined' && $this.attr('data-v-max') != '') {
                maxValue = $this.attr('data-v-max');
            }

            $this.autoNumeric('init', { aPad: true, vMin: minValue, vMax: maxValue });

            if (typeof $this.attr('data-mdec') !== 'undefined' && $this.attr('data-mdec') != '') {
                var setOption = JSON.parse('{"mDec": ' + $this.attr('data-mdec').toString().split('.')[0] + '}');
                $this.autoNumeric('update', setOption);
            } else {
                var setOption = JSON.parse('{"mDec": 2}');
                $this.autoNumeric('update', setOption);
            }
        }
    }    
    var InitLongInput = function(element) {
        var $element = (typeof element === 'undefined') ? $(document.body) : element;
        $element.find('.longInit').autoNumeric('init', { aPad: true, vMin: 0, vMax: 999999999999999999999999999999 });
    }    
    var NumberRound = function(number, scale) {
        scale = typeof scale === 'undefined' ? scaleNumber : scale;
        return Number(Math.round(number+'e'+scale)+'e-'+scale);
    }
    return {
        CommonSelectableGrid: function(element, functionName) {
            CommonSelectableGrid(element, functionName);
        },        
        CommonMultipleSelectableGrid: function(element, functionName) {
            CommonMultipleSelectableGrid(element, functionName);
        },        
        InitTextEditor: function(element) {
            return InitTextEditor(element);
        },        
        AutoCompletePopup: function(elem, type) {
            AutoCompletePopup(elem, type);
        },
        InitNumberInput: function(element) {
            InitNumberInput(element);
        },        
        InitDatePicker: function(element) {
            InitDatePicker(element);
        },        
        NumberRound: function(number, scale) {
            return NumberRound(number, scale);
        },
        InitLongInput: function(number) {
            return InitLongInput(number);
        }
    }
}();