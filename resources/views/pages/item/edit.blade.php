<form class="form" id="itemTypeEditForm">
	<input type="hidden" name="itemTypeId" value="{{$itemTypeId}}">
    <div class="form-group row">
        <label  class="col-3 col-form-label text-right" for="itemTypeName">* @lang('lang.name')</label>
        <div class="col-9">
            <input class="form-control form-control-sm" type="text" id="itemTypeName" required name="itemTypeName" value="{{$itemTypeName}}"/>
        </div>
    </div>
</form>