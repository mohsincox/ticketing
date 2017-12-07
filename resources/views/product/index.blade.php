@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	    <div class="col-sm-12">
	        <h3 style="margin-top: 0px;">
	            <i class="fa fa-list-ul"></i>
	            List of <mark>SKU Product</mark>

	            <a href="{{ url('sku-product/create') }}" class="btn btn-primary pull-right">
	                <i class="fa fa-plus"></i> Create <code><b>SKU Product</b></code>
	            </a>
	        </h3>
	        <div class="panel panel-info">
	            <div class="panel-heading">
	                <h3 class="panel-title text-center"><i class="fa fa-list-ul"></i> List of <code><b>SKU Products</b></code></h3>
	            </div>
	            <div class="panel-body">
	                <table id="myTable" class="table table-striped table-bordered table-hover">
	                    <thead>
	                        <tr class="success">
	                            <th>SL</th>
	                            <th>SKU Product Name</th>
	                            <th>Category Name</th>
	                            <th class="text-right">SKU Price</th>
	                            <th>Description</th>
	                            <th>Edit</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    <?php
	                        $i = 0;
	                    ?>
	                    @foreach($products as $product)
	                        <tr>
	                            <td>{{ ++$i }}</td>
	                            <td><strong>{{ $product->name }}</strong></td>
	                            <td><strong>{{ $product->category->name }}</strong></td>
	                            <td class="text-right"><strong>{{ number_format($product->sku_price, 2) }}</strong></td>
	                            <td><strong>{{ $product->description }}</strong></td>
	                            <td>{!! Html::link("sku-product/$product->id/edit",' Edit', ['class' => 'fa fa-edit btn btn-primary btn-xs']) !!}</td>  
	                        </tr>
	                    @endforeach
	                    </tbody>
	                </table>
	            </div>
	        </div>
	    </div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
</script>
@endsection