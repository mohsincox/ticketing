@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-sm-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title text-center"><i class="fa fa-pencil"></i> Update <code><b>Ticket Status</b></code> in created Ticket</h3>
				</div>
				<div class="panel-body">
					{!! Form::model($ticket, ['url' => "ticket/$ticket->id", 'method' => 'put', 'class' => 'form-horizontal']) !!}
					<div class="required form-group {{ $errors->has('ticket_status_id') ? 'has-error' : ''}}">
					    {!! Form::label('ticket_status_id', 'Ticket Status', ['class' => 'col-xs-3 col-sm-3 control-label']) !!}
					    <div class="col-xs-9 col-sm-9">
					    	<div class="col-xs-12 col-sm-12">
						        {!! Form::select('ticket_status_id', $ticketStatusList, null, ['class' => 'form-control', 'placeholder' => 'Select Ticket Status']) !!}
						        <span class="text-danger">
								    {{ $errors->first('ticket_status_id') }}
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


				</div>
			</div>
		</div>
	</div>	
</div>	
@endsection