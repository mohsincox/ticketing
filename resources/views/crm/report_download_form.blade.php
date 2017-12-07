@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	    <div class="col-sm-offset-2 col-sm-8">
	        <div class="panel panel-primary">
	            <div class="panel-heading">
	                <h3 class="panel-title text-center"><i class="fa fa-download"></i> Inbound Call Report Download Form</h3>
	            </div>
	            <div class="panel-body">
	            	<center>
	            		<form class="form-inline" method="get" action="{{ url('crm/download-report')}}">
							<div class="form-group">
							  	<label class="control-label requiredField" for="date">
									Start Date
									<span class="asteriskField">
									  *
									</span>
							  	</label>
							  	<div class="input-group">
									<input class="form-control" id="datepicker" name="start_date" placeholder="YYYY-MM-DD" type="text" required="" autocomplete="off" />
							  	</div>
						  	</div>
						  	<div class="form-group">
							  	<label class="control-label requiredField" for="date">
									End Date
									<span class="asteriskField">
									  *
									</span>
							  	</label>
							  	<div class="input-group">
									<input class="form-control" id="datepicker1" name="end_date" placeholder="YYYY-MM-DD" type="text" required="" autocomplete="off" />
							  	</div>
						  	</div>

			              	<div class="form-group">
			                	<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#downloadModal">Download</button>
			              	</div>

			              	<div class="modal fade" id="downloadModal" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header bg-primary">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Confirmation Message</h4>
										</div>
										<div class="modal-body">
											<h3>Do you want to <b><mark>download</mark> report</b>?</h3>
										</div>
										<div class="modal-footer bg-success">
											<button type="submit" name="submit"  class="btn btn-primary">Yes</button>
											<button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</center>  
	            </div>
	        </div>
	    </div>
	</div>
</div>
@endsection

@section('style')
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<style>.asteriskField{color: red;}</style>
@endsection

@section('script')
	<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	 <script>
		$( function() {
			$( "#datepicker" ).datepicker({ changeMonth: true, changeYear: true });
			$( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
			$( "#datepicker1" ).datepicker({ changeMonth: true, changeYear: true });
			$( "#datepicker1" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
		} );
	 </script>
@endsection