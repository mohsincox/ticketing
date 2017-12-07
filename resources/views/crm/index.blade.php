@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-sm-12">
	        <h3 style="margin-top: 0px;">
	            <i class="fa fa-list-ul"></i>
	            List of <mark>CRM</mark>
	        </h3>
	        <div class="panel panel-primary">
	            <div class="panel-heading">
	                <h3 class="panel-title text-center"><i class="fa fa-list-ul"></i> List of <code><b>CRM</b></code></h3>
	            </div>
	            <div class="panel-body">
	            	<div class="table-responsive">
		                <table id="myTable" class="table table-bordered table-striped table-hover">
		                    <thead>
		                        <tr class="success">
		                            <th>SL</th>
		                            <th>Agent</th> 
		                            <th style="width: 120px;">Created At</th> 
		                            <th>Customer No</th>  
		                            <th>Name</th>  
		                            <th>Genger</th>  
		                            <th>Caller Type</th>  
		                            <th>Address</th>  
		                            <th>Division</th>  
		                            <th>Category</th>  
		                            <th>Product</th>  
									<th class="text-right">Price</th>
		                            <th>Service Source</th>  
		                            <th>Code</th>  
		                            <th>Verbatim</th>  
		                            <th>Remarks</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    <?php
		                        $i = 0;
		                    ?>
		                    @foreach($crms as $crm)
		                        <tr>
		                            <td>{{ ++$i }}</td>
		                            <td><strong>{{ $crm->agent }}</strong></td>
		                            <td><strong>{{ $crm->created_at }}</strong></td>
		                            <td><strong>{{ $crm->phone_number }}</strong></td>
		                            <td><strong>{{ $crm->name }}</strong></td>
		                            <td><strong>{{ $crm->gender }}</strong></td>
		                            <td><strong>{{ $crm->type_of_caller }}</strong></td>
		                            <td><strong>{{ $crm->address }}</strong></td>
		                            <td><strong>{{ $crm->division }}</strong></td>
		                            @if(isset($crm->category->name))
		                            	<td><strong>{{ $crm->category->name }}</strong></td>
		                            @else
		                            	<td><strong></strong></td>
		                            @endif
		                            @if(isset($crm->product->name))
		                            	<td><strong>{{ $crm->product->name }}</strong></td>
		                            @else
		                            	<td><strong></strong></td>
		                            @endif
									@if(isset($crm->product->sku_price))
		                            	<td class="text-right"><strong>{{ number_format($crm->product->sku_price, 2) }}</strong></td>
		                            @else
		                            	<td><strong></strong></td>
		                            @endif
		                            <td><strong>{{ $crm->service_source }}</strong></td>
		                            <td><strong>{{ $crm->product_batch_code }}</strong></td>
		                            <td><strong>{{ $crm->verbatim }}</strong></td>
		                            <td><strong>{{ $crm->remarks }}</strong></td>
		                        </tr>
		                    @endforeach
		                    </tbody>
		                </table>
	            	</div>
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