<div class="form-group">
    {{ Form::label('category_id', 'Category', ['class' => 'control-label']) }}
{{--        {{ Form::text('category_id', null, (['class' => 'form-control'])) }}--}}
        {{ Form::select('category_id', $data['categories'],null, ['class' => 'form-control']) }}
    @if($errors->has('category_id'))
        <label class="text text-danger"> {{$errors->first('category_id')}}</label>
    @endif
</div>
<div class="form-group">
    {{ Form::label('subcategory_id', 'Sub-Category', ['class' => 'control-label']) }}
        {{ Form::select('subcategory_id', [],null, ['class' => 'form-control']) }}

@if($errors->has('subcategory_id'))
        <label class="text text-danger"> {{$errors->first('subcategory_id')}}</label>
    @endif
</div>
<div class="form-group">
        {{ Form::label('name', null, ['class' => 'control-label']) }}
        {{ Form::text('name', null, (['class' => 'form-control'])) }}
        @if($errors->has('name'))
                <label class="text text-danger"> {{$errors->first('name')}}</label>
        @endif
</div>
<div class="form-group">
        {{ Form::label('slug', null, ['class' => 'control-label']) }}
        {{ Form::text('slug', null, (['class' => 'form-control','readonly'=>'readonly'])) }}
        @if($errors->has('slug'))
                <label class="text text-danger"> {{$errors->first('slug')}}</label>
        @endif
</div>
<div class="form-group">
        {{ Form::label('price', null, ['class' => 'control-label']) }}
        {{ Form::number('price', null, (['class' => 'form-control'])) }}
        @if($errors->has('price'))
                <label class="text text-danger"> {{$errors->first('price')}}</label>
        @endif
</div>
<div class="form-group">
    {{ Form::label('discount', null, ['class' => 'control-label']) }}
    {{ Form::number('discount', null, (['class' => 'form-control'])) }}
    @if($errors->has('discount'))
        <label class="text text-danger"> {{$errors->first('discount')}}</label>
    @endif
</div>
<div class="form-group">
    {{ Form::label('quantity', null, ['class' => 'control-label']) }}
    {{ Form::number('quantity', null, (['class' => 'form-control'])) }}
    @if($errors->has('quantity'))
        <label class="text text-danger"> {{$errors->first('quantity')}}</label>
    @endif
</div>
<div class="form-group">
        {{ Form::label('short_description', null, ['class' => 'control-label']) }}
        {{ Form::textarea('short_description', null, (['class' => 'form-control'])) }}
        @if($errors->has('short_description'))
                <label class="text text-danger"> {{$errors->first('short_description')}}</label>
        @endif
</div>
<div class="form-group">
        {{ Form::label('description', null, ['class' => 'control-label']) }}
        {{ Form::textarea('description', null, (['class' => 'form-control'])) }}
        @if($errors->has('description'))
                <label class="text text-danger"> {{$errors->first('description')}}</label>
        @endif
</div>
<div class="form-group">
    {{ Form::label('slider_key', null, ['class' => 'control-label']) }}
    {{ Form::radio('slider_key', '1')}} Active
    {{ Form::radio('slider_key', '0',true)}} Deactive
</div>
<div class="form-group">
    {{ Form::label('feature_key', null, ['class' => 'control-label']) }}
    {{ Form::radio('feature_key', '1')}} Active
    {{ Form::radio('feature_key', '0',true)}} Deactive
</div>
<div class="form-group">
    {{ Form::label('discount_key', null, ['class' => 'control-label']) }}
    {{ Form::radio('discount_key', '1')}} Active
    {{ Form::radio('discount_key', '0',true)}} Deactive
</div>
<div class="form-group">
    {{ Form::label('status', null, ['class' => 'control-label']) }}
    {{ Form::radio('status', '1')}} Active
    {{ Form::radio('status', '0',true)}} Deactive
</div>



