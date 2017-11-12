@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading">User and Role</div>

				<div class="panel-body">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr class="success">
								<th>SL</th>
								<th>Name</th>
								<th>Email</th>
								<th>Role</th>
								<th>Phone Number</th>
								<th>Address</th>
								@can('ticket_admin-access')
								<th>Edit</th>
                    			@endcan
							</tr>
						</thead>
						<tbody>
						@foreach($users as $user)
							<?php
								if ($user->role == 'super_admin') {
									$role = "Super Admin";
								} else if ($user->role == 'ticket_admin') {
									$role = "Ticket Admin";
								} else {
									$role = "User";
								}
							?>	
							<tr>
								<td>{{ $user->id }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $role }}</td>
								<td>{{ $user->phone_number }}</td>
								<td>{{ $user->address }}</td>
								@can('ticket_admin-access')
								<td><a href='{{"user/$user->id/edit"}}' class="btn btn-success btn-sm">Change Role</a></td>
								@endcan
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