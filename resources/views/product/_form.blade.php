@if(isset($product))
    {!! Form::model($product, ['url' => "sku-product/$product->id", 'method' => 'put', 'class' => 'form-horizontal']) !!}
@else
    {!! Form::open(['url' => 'sku-product', 'method' => 'post', 'class' => 'form-horizontal']) !!}
@endif
<div class="form-group required {{ $errors->has('category_id') ? 'has-error' : '' }}">
    {!! Form::label('category_id', 'Select Category', ['class' => 'control-label col-sm-3 col-xs-3']) !!}
    <div class="col-xs-9 col-sm-9">
    	<div class="col-xs-12 col-sm-12">
	        {!! Form::select('category_id', $categoryList, null, ['class' => 'form-control', 'placeholder' => 'Select Category']) !!}
	        <span class="text-danger">
	            {{ $errors->first('category_id') }}
	        </span>
        </div>
    </div>
</div>

<div class="required form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'SKU Product Name', ['class' => 'col-xs-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
    	<div class="col-xs-12 col-sm-12">
	        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter SKU Product Name', 'autocomplete' => 'off']) !!}
	        <span class="text-danger">
			    {{ $errors->first('name') }}
		    </span>
		</div>
    </div>
</div>


<div class="required form-group {{ $errors->has('sku_price') ? 'has-error' : ''}}">
    {!! Form::label('sku_price', 'SKU Price', ['class' => 'col-xs-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
    	<div class="col-xs-12 col-sm-12">
	        {!! Form::text('sku_price', null, ['class' => 'form-control', 'placeholder' => 'Enter Room Rate', 'autocomplete' => 'off']) !!}
	        <span class="text-danger">
			    {{ $errors->first('sku_price') }}
		    </span>
		</div>
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'SKU Product Description', ['class' => 'col-xs-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
    	<div class="col-xs-12 col-sm-12">
	        {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Enter SKU Product Description', 'autocomplete' => 'off']) !!}
	        <span class="text-danger">
			    {{ $errors->first('description') }}
		    </span>
		</div>
    </div>
</div>

<div class="form-group">
    <div class="col-xs-12 col-sm-12">
        {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) !!}
    </div>
</div>
{!! Form::close() !!}