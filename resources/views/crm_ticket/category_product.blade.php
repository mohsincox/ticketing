<div class="form-group top-14px">
	<label class="control-label col-sm-6" for="">SKU/Price:</label>
	<div class="col-sm-6 input-group input-group-sm">
		<select class="form-control" id="" name="sku_product_id">
			<option value="">--Select--</option>
			@foreach($products as $product)
				<option value="{{ $product->id }}">{{ 'SKU Name: '.$product->name.' SKU Price: '.$product->sku_price }}</option>
			@endforeach
		</select>
	</div>
</div>