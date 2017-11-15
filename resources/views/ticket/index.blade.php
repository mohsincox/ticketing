@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	    <div class="col-sm-12">
	        <h3 style="margin-top: 0px;">
	            <i class="fa fa-list-ul"></i>
	            List of <mark>Tickets</mark>
	            @can('ticket_admin-access')
		            <!-- <a href="{{ url('ticket/create') }}" class="btn btn-primary pull-right">
		                <i class="fa fa-plus"></i> Create <code><b>Ticket</b></code>
		            </a> -->
				@endcan
	        </h3>
	        <div class="panel panel-info">
	            <div class="panel-heading">
	                <h3 class="panel-title text-center"><i class="fa fa-list-ul"></i> List of <code><b>Tickets</b></code></h3>
	            </div>
	            <div class="panel-body">
	                <table id="myTable" class="table table-bordered table-striped table-hover">
	                    <thead>
	                        <tr class="success">
	                            <th>SL</th>
	                            <th>Assign to</th>
	                            <th>Customer Name</th>
	                            <th>Phone No.</th>
	                            <th>Address</th>
	                            <th>Division</th>
	                            <th>Ticket Type</th>
	                            <th>Ticket Status</th>
	                            <th>Agent</th>
	                            <th>Created At</th>
	                            <th>Edit</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    <?php
	                        $i = 0;
	                    ?>
	                    @foreach($tickets as $ticket)
	                        <tr>
	                            <td>{{ ++$i }}</td>
	                            <td>{{ $ticket->user->name }}</td>
	                            <td>{{ $ticket->customer_name }}</td>
	                            <td>{{ $ticket->customer_phone_number }}</td>
	                            <td>{{ $ticket->customer_address }}</td>
	                            <td>{{ $ticket->division }}</td>
	                            <td>{{ $ticket->ticketType->name }}</td>
	                            <td>{{ $ticket->ticketStatus->name }}</td>
	                            <td>{{ $ticket->agent }}</td>
	                            <td>{{ $ticket->created_at }}</td>
	                            <td>{!! Html::link("ticket/$ticket->id/edit",' Edit', ['class' => 'fa fa-edit btn btn-primary btn-xs']) !!}</td>
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