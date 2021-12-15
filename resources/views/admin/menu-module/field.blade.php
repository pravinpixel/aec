<div class="form-group">
    <label for="module_name">@lang('menu_module.module_name')</label>
    {!! Form::text('module_name', null, ['class'=> 'form-control', 'placeholder' => trans('menu_module.enter_module_name')]) !!}
</div>

<div class="form-group">
    <label for="parent_name">@lang('menu_module.parent_name')</label>
    {!! Form::text('parent_name', null, ['class'=> 'form-control', 'placeholder' => trans('menu_module.enter_parent_name')]) !!}
</div>

<div class="form-group">
    <label for="icon">@lang('menu_module.icon')</label>
    {!! Form::text('icon', null, ['class'=> 'form-control', 'placeholder' => trans('menu_module.enter_icon')]) !!}
</div>

<div class="form-group">
    <label for="order_id">@lang('menu_module.order_id')</label>
    {!! Form::text('order_id', null, ['class'=> 'form-control', 'placeholder' => trans('menu_module.enter_order_id')]) !!}
</div>

<div class="form-group form-check">
    @if(isset($result->is_active) && $result->is_active == 1)
        {!!  Form::checkbox('is_active', 1,true, ['class' => 'form-check-input']) !!}
    @else
        {!!  Form::checkbox('is_active', 1,false, ['class' => 'form-check-input']) !!}
    @endif
    <label class="form-check-label" for="is_active">@lang('menu_module.is_active')</label>
</div>

<button type="submit" class="btn btn-primary">@lang('global.save')</button>
{{-- item_ref,item_id,item_name,cover_image,item_description,no_of_page,loan_days,category_id,subcategory_id,genre_id,type_id,is_need_approval,is_active,status,is_issued,checkout_by,date_of_return,deleted_at --}}