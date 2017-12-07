@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	    <div class="col-sm-12">
	        <h3 style="margin-top: 0px;">
	            <i class="fa fa-list-ul"></i>
	            List of <mark>Categories</mark>
	            
		            <a href="{{ url('category/create') }}" class="btn btn-primary pull-right">
		                <i class="fa fa-plus"></i> Create <code><b>Category</b></code>
		            </a>
				
	        </h3>
	        <div class="panel panel-info">
	            <div class="panel-heading">
	                <h3 class="panel-title text-center"><i class="fa fa-list-ul"></i> List of <code><b>Category</b></code></h3>
	            </div>
	            <div class="panel-body">
	                <table id="myTable" class="table table-bordered table-striped table-hover">
	                    <thead>
	                        <tr class="success">
	                            <th>SL</th>
	                            <th>Category Name</th>
	                           
	                            	<th>Edit</th>
	                            
	                        </tr>
	                    </thead>
	                    <tbody>
	                    <?php
	                        $i = 0;
	                    ?>
	                    @foreach($categories as $category)
	                        <tr>
	                            <td>{{ ++$i }}</td>
	                            <td><strong>{{ $category->name }}</strong></td>
	                            
	                            	<td>{!! Html::link("category/$category->id/edit",' Edit', ['class' => 'fa fa-edit btn btn-primary btn-xs']) !!}</td>
	                            
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