@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-sm-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">Change Name & Role</div>

				<div class="panel-body">
					{!! Form::model($user, ['url' => "user/$user->id", 'method' => 'put', 'class' => 'form-horizontal']) !!}
						<div class="form-group required {{ $errors->has('name') ? 'has-error' : ''}}">
						    {!! Form::label('Name', 'Name', ['class' => 'col-xs-3 col-sm-3 control-label']) !!}
						    <div class="col-xs-9 col-sm-9">
						    	<div class="col-xs-12 col-sm-12">
							        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Namr', 'autocomplete' => 'off']) !!}
							        <span class="text-danger">
									    {{ $errors->first('name') }}
								    </span>
								</div>
						    </div>
						</div>

						<div class="form-group required {{ $errors->has('role') ? 'has-error' : '' }}">
						    {!! Form::label('role', 'Select Role', ['class' => 'control-label col-sm-3 col-xs-3']) !!}
						    <div class="col-xs-9 col-sm-9">
						    	<div class="col-xs-12 col-sm-12">
							        {!! Form::select('role', $roleList, null, ['class' => 'form-control', 'placeholder' => 'Select Role', 'required' => 'required']) !!}
							        <span class="text-danger">
							            {{ $errors->first('role') }}
							        </span>
						        </div>
						    </div>
						</div>

						<div class="form-group {{ $errors->has('phone_number') ? 'has-error' : ''}}">
						    {!! Form::label('Phone Number', 'Phone Number', ['class' => 'col-xs-3 col-sm-3 control-label']) !!}
						    <div class="col-xs-9 col-sm-9">
						    	<div class="col-xs-12 col-sm-12">
							        {!! Form::text('phone_number', null, ['class' => 'form-control', 'placeholder' => 'Phone Number', 'autocomplete' => 'off']) !!}
							        <span class="text-danger">
									    {{ $errors->first('phone_number') }}
								    </span>
								</div>
						    </div>
						</div>

						<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
						    {!! Form::label('Address', 'Address', ['class' => 'col-xs-3 col-sm-3 control-label']) !!}
						    <div class="col-xs-9 col-sm-9">
						    	<div class="col-xs-12 col-sm-12">
							        {!! Form::text('address', null, ['class' => 'form-control numeric-field', 'placeholder' => 'Address', 'autocomplete' => 'off']) !!}
							        <span class="text-danger">
									    {{ $errors->first('address') }}
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