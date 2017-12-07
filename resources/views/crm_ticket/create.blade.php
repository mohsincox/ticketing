<!DOCTYPE html>
<html lang="en">
<head>
	<title>DANO</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">
		.navbar-nav > li > a, .navbar-brand {
			padding-top:5px !important; padding-bottom:0 !important;
			height: 30px;
		}
		.navbar {min-height:30px !important;}

		/*.navbar-xs { min-height:28px; height: 28px; }
		.navbar-xs .navbar-brand{ padding: 0px 12px;font-size: 16px;line-height: 28px; }
		.navbar-xs .navbar-nav > li > a {  padding-top: 0px; padding-bottom: 0px; line-height: 28px; }*/
		.top-5px{margin-top: -5px;}
		.top-10px{margin-top: -10px;}
		.top-11px{margin-top: -11px;}
		.top-12px{margin-top: -12px;}
		.top-13px{margin-top: -13px;}
		.top-14px{margin-top: -14px;}
		.top-15px{margin-top: -15px;}
		.top-20px{margin-top: -20px;}
		.asteriskField{color: red;}
		.panel {margin-bottom: 0px;}
		.panel-body {padding-bottom: 0px;}
		.alert {padding: 0px; margin-bottom: 0px;}
		.table-condensed>tbody>tr>td, .table-condensed>tbody>tr>th, .table-condensed>tfoot>tr>td, .table-condensed>tfoot>tr>th, .table-condensed>thead>tr>td, .table-condensed>thead>tr>th {
    			padding: 0px;
			}
		.table {margin-bottom: 0px;}
	</style>
</head>
<body>
	<!-- <nav class="navbar navbar-inverse navbar-xs" style="margin-bottom: 0px;">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#" style="color: #FFFFFF">WebSiteName</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#">Page 1</a></li>
				<li><a href="#">Page 2</a></li>
				<li><a href="#">Page 3</a></li>
			</ul>
			<button class="btn navbar-btn btn-xs" style="margin-top: 4px; margin-bottom: 0px;">Button 1</button>
			<button class="btn btn-default navbar-btn btn-xs" style="margin-top: 4px; margin-bottom: 0px;">Button 2</button>
			<button class="btn btn-primary navbar-btn btn-xs" style="margin-top: 4px; margin-bottom: 0px;">Button 3</button>
			<button class="btn btn-success navbar-btn btn-xs" style="margin-top: 4px; margin-bottom: 0px;">Button 4</button>
			<button class="btn btn-info navbar-btn btn-xs" style="margin-top: 4px; margin-bottom: 0px;">Button 5</button>
			<button class="btn btn-warning navbar-btn btn-xs" style="margin-top: 4px; margin-bottom: 0px;">Button 6</button>
			<button class="btn btn-danger navbar-btn btn-xs" style="margin-top: 4px; margin-bottom: 0px;">Button 7</button>
			
		</div>
	</nav> -->
	
	<?php
		function validatePhone($number) {

		$number=preg_replace('/\D/', '',  $number);    						//  Deleting Non Numeric Characters
		if(substr($number, 0, 1) == "+" ) $number=substr($number, 1);		//  Deleting + if in First Position
		if(substr($number, 0, 2) == "88") $number=substr($number, 2);		//  Deleting 8 if in First Two Position
		if(substr($number, 0, 2) == "00") $number=substr($number, 2);		//  Deleting 0 if in First Two Position
		if(substr($number, 0, 1) == "0" ) $number=substr($number, 1);		//  Deleting 0 if in First Position


		if(strlen($number)<=5 || strlen($number)>11) return "NO";
		else return $number;
		}

		$agent = isset($agentCon) ? $agentCon : 'Call Center';
		$phone_number = isset($phoneNumberCon) ? validatePhone($phoneNumberCon) : 'No Phone Number';
	?>
  
	<div class="container-fluid">

        @include('flash::message')
   
		<div class="col-sm-12">
		
			<div class="col-sm-6" style="padding-left: 0px;">
				<div class="panel panel-primary" style="margin-bottom: 0px;">
					<div class="panel-heading text-center" style="padding: 2px 15px;">
						DANO CRM <code><?php echo 'Agent: '.$agent; ?></code> & <code> <?php echo 'Phone No: '.$phone_number; ?></code>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" method="post" action="{{ url('crm-ticket/crm-store') }}">
							{{ csrf_field() }}
							<input type="hidden" class="form-control" id="" placeholder="" name="agent" value="<?php echo $agent; ?>">
							<input type="hidden" class="form-control" id="" placeholder="" name="phone_number" value="<?php echo $phone_number; ?>">
							<div class="form-group top-14px">
								<label class="control-label col-sm-6" for="">Name:</label>
								<div class="col-sm-6 input-group input-group-sm">
									<input type="text" class="form-control" id="" placeholder="Name of the Caller" name="name" autocomplete="off" value="<?php if(isset($crmLastRecord->name)){echo $crmLastRecord->name;} ?>">
								</div>
							</div>

							<div class="form-group top-14px">
								<label class="control-label col-sm-6" for="">Gender:</label>
								<div class="col-sm-6 input-group input-group-sm">
									<select class="form-control" id="" name="gender">
										<option value="">--Select--</option>
										<option value="Male" <?php if(isset($crmLastRecord->gender)){ if($crmLastRecord->gender == "Male"){ ?> selected="selected" <?php } }?> >Male</option>
										<option value="Female" <?php if(isset($crmLastRecord->gender)){ if($crmLastRecord->gender == "Female"){ ?> selected="selected" <?php } }?> >Female</option>
									</select>
								</div>
							</div>

							<div class="form-group top-14px">
								<label class="control-label col-sm-6" for="">Type of Caller:</label>
								<div class="col-sm-6 input-group input-group-sm">
									<select class="form-control" id="" name="type_of_caller">
										<option value="">--Select--</option>
										<option value="Consumer" <?php if(isset($crmLastRecord->type_of_caller)){ if($crmLastRecord->type_of_caller == "Consumer"){ ?> selected="selected" <?php } }?> >Consumer</option>
										<option value="Retailer" <?php if(isset($crmLastRecord->type_of_caller)){ if($crmLastRecord->type_of_caller == "Retailer"){ ?> selected="selected" <?php } }?> >Retailer</option>
										<option value="Official" <?php if(isset($crmLastRecord->type_of_caller)){ if($crmLastRecord->type_of_caller == "Official"){ ?> selected="selected" <?php } }?> >Official</option>
										<option value="Dealer" <?php if(isset($crmLastRecord->type_of_caller)){ if($crmLastRecord->type_of_caller == "Dealer"){ ?> selected="selected" <?php } }?> >Dealer</option>
									</select>
								</div>
							</div>
					 
							<div class="form-group top-14px">
								<label class="control-label col-sm-6" for="">Address:</label>
								<div class="col-sm-6 input-group input-group-sm">          
									<input type="text" class="form-control" id="" placeholder="Address" name="address" autocomplete="off" value="<?php if(isset($crmLastRecord->address)){echo $crmLastRecord->address;} ?>">
								</div>
							</div>

							<div class="form-group top-14px">
								<label class="control-label col-sm-6" for="">Division:</label>
								<div class="col-sm-6 input-group input-group-sm">
									<select class="form-control" id="" name="division">
										<option value="">--Select--</option>
										<option value="Barisal" <?php if(isset($crmLastRecord->division)){ if($crmLastRecord->division == "Barisal"){ ?> selected="selected" <?php } }?> >Barisal</option>
										<option value="Chittagong" <?php if(isset($crmLastRecord->division)){ if($crmLastRecord->division == "Chittagong"){ ?> selected="selected" <?php } }?> >Chittagong</option>
										<option value="Dhaka" <?php if(isset($crmLastRecord->division)){ if($crmLastRecord->division == "Dhaka"){ ?> selected="selected" <?php } }?> >Dhaka</option>
										<option value="Khulna" <?php if(isset($crmLastRecord->division)){ if($crmLastRecord->division == "Khulna"){ ?> selected="selected" <?php } }?> >Khulna</option>
										<option value="Mymensingh" <?php if(isset($crmLastRecord->division)){ if($crmLastRecord->division == "Mymensingh"){ ?> selected="selected" <?php } }?> >Mymensingh</option>
										<option value="Rajshahi" <?php if(isset($crmLastRecord->division)){ if($crmLastRecord->division == "Rajshahi"){ ?> selected="selected" <?php } }?> >Rajshahi</option>
										<option value="Rangpur" <?php if(isset($crmLastRecord->division)){ if($crmLastRecord->division == "Rangpur"){ ?> selected="selected" <?php } }?> >Rangpur</option>
										<option value="Sylhet" <?php if(isset($crmLastRecord->division)){ if($crmLastRecord->division == "Sylhet"){ ?> selected="selected" <?php } }?> >Sylhet</option>
										<!-- <option value="Barisal">Barisal</option>
										<option value="Chittagong">Chittagong</option>
									  	<option value="Dhaka">Dhaka</option>
									  	<option value="Khulna">Khulna</option>
									  	<option value="Mymensingh">Mymensingh</option>
									  	<option value="Rajshahi">Rajshahi</option>
									  	<option value="Rangpur">Rangpur</option>
									  	<option value="Sylhet">Sylhet</option> -->
									</select>
								</div>
							</div>

							<div class="form-group top-14px">
								<label class="control-label col-sm-6" for="">Category:</label>
								<div class="col-sm-6 input-group input-group-sm">
									{!! Form::select('category_id', $categoryList, null, ['class' => 'form-control', 'placeholder' => 'Select Category', 'id' => 'catid']) !!}
								</div>
							</div>

							<span id="category_product_show"></span>
							
							<div class="form-group top-14px">
								<label class="control-label col-sm-6" for="">Service Source:</label>
								<div class="col-sm-6 input-group input-group-sm">
									<select class="form-control" id="" name="service_source">
										<option value="">--Select--</option>
										<option value="Facebook">Facebook</option>
										<option value="TV Comm">TV Comm</option>
										<option value="Newspaper">Newspaper</option>
										<option value="Dangler">Dangler</option>
										<option value="Other">Other</option>
									</select>
								</div>
							</div>

							<div class="form-group top-14px">
								<label class="control-label col-sm-6" for="">Batch Code/Product:</label>
								<div class="col-sm-6 input-group input-group-sm">          
									<input type="text" class="form-control" id="" placeholder="Batch Code / Product" name="product_batch_code" autocomplete="off">
								</div>
							</div>

							<div class="form-group top-14px">
								<label class="control-label col-sm-6" for="">Verbatim:</label>
								<div class="col-sm-6 input-group input-group-sm">          
									<input type="text" class="form-control" id="" placeholder="Verbatim" name="verbatim" autocomplete="off">
								</div>
							</div>
					
							<div class="form-group top-14px">
								<label class="control-label col-sm-6" for="">Remarks:</label>
								<div class="col-sm-6 input-group input-group-sm">
									<select class="form-control" id="" name="remarks">
										<option value="">--Select--</option>
										<option value="Busy">Busy</option>
										<option value="No Answer">No Answer</option>
										<option value="Not Intersted">Not Intersted</option>
										<option value="Successfull">Successfull</option>
										<option value="Switched Off">Switched Off</option>
										<option value="Call Back">Call Back</option>
									</select>
								</div>
							</div>

							<div class="form-group">        
								<div class="col-sm-offset-0 col-sm-12">
									<!-- <button type="submit" name="submit" class="btn btn-primary btn-xs btn-block" onclick="return confirm('Are you sure you want to create new record?');">Submit</button> -->
									<button type="button"  class="btn btn-primary btn-xs btn-block" data-toggle="modal" data-target="#myModalCRM">Submit</button>
								</div>
							</div>

							<div class="modal fade" id="myModalCRM" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header bg-primary">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Confirmation Message</h4>
										</div>
										<div class="modal-body">
											<h3>Do you want to <b><mark>CRM</mark> save</b>?</h3>
										</div>
										<div class="modal-footer bg-success">
											<button type="submit" name="submit"  class="btn btn-primary btn-block">Yes</button>
											<!-- <button type="button" class="btn btn-danger" data-dismiss="modal">No</button> -->
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				@if(count($crmRecords))
				<div class="col-sm-12" style="padding-right: 0px; padding-left: 0px;">
					<table class="table table-bordered table-condensed">
					    <thead>
					      	<tr>
						        <th>Category</th>
						        <th>SKU Product</th>
						        <th>B.Code/Product</th>
						        <th>Verbatim</th>
					      	</tr>
					    </thead>
					    <tbody>
					    	@foreach($crmRecords as $crm)
							    <tr>
							    	@if(isset($crm->category->name))
							        	<td>{{ $crm->category->name }}</td>
							        @else
							        	<td></td>
							        @endif
							        @if(isset($crm->product->name))
							        	<td>{{ $crm->product->name }}</td>
							        @else
							        	<td></td>
							        @endif
							        <td>{{ $crm->product_batch_code }}</td>
							        <td>{{ $crm->verbatim }}</td>
							    </tr>
						    @endforeach
					    </tbody>
					  </table>
				</div>
				@endif
			</div>
			
	
			<div class="col-sm-6" style="padding-left: 0px;">
				<div class="panel panel-danger">
					<div class="panel-heading text-center" style="padding: 2px 15px;">
						<mark>iTraker</mark> <code><?php echo 'Phone No: '.$phone_number; ?></code> & <code><?php echo 'Agent: '.$agent; ?></code>
					</div>
					<div class="panel-body">
						<form id="ticketForm" class="form-horizontal" method="post" action="{{ url('crm-ticket/ticket-store') }}">
							{{ csrf_field() }}
							<input type="hidden" class="form-control" id="" placeholder="" name="agent" value="<?php echo $agent; ?>">
							<input type="hidden" class="form-control" id="" placeholder="" name="risen_from" value="Call Center">
							<input type="hidden" class="form-control" id="" placeholder="" name="ticket_status_id" value="1">
							<!-- <input type="hidden" class="form-control" id="" placeholder="" name="phone_number" value="<?php echo $phone_number; ?>"> -->
				  
				  			<div class="form-group top-14px">
								<label class="control-label col-sm-6" for="">Ticket Type/Title:
									<span class="asteriskField">*</span>
								</label>
								<div class="col-sm-6 input-group input-group-sm">
									{!! Form::select('ticket_type_id', $ticketTypeList, null, ['class' => 'form-control', 'placeholder' => 'Select Ticket Type', 'required' => 'required']) !!}
								</div>
							</div>

							<div class="form-group top-14px">
								<label class="control-label col-sm-6" for="">To:
									<span class="asteriskField">*</span>
								</label>
								<div class="col-sm-6 input-group input-group-sm">
									{!! Form::select('user_id', $userList, null, ['class' => 'form-control', 'placeholder' => 'Select assign to', 'required' => 'required']) !!}
								</div>
							</div>
				  
							<!-- <div class="form-group top-14px">
								<label class="control-label col-sm-6" for="">Ticket Status:
									<span class="asteriskField">*</span>
								</label>
								<div class="col-sm-6 input-group input-group-sm">
									{!! Form::select('ticket_status_id', $ticketStatusList, null, ['class' => 'form-control', 'placeholder' => 'Select Ticket Status', 'required' => 'required']) !!}
								</div>
							</div> -->

							<div class="form-group top-14px">
								<label class="control-label col-sm-6" for="">Customer Name:</label>
								<div class="col-sm-6 input-group input-group-sm">
									<input type="text" class="form-control" id="" placeholder="Customer Name" name="customer_name" value="<?php if(isset($crmLastRecord->name)){echo $crmLastRecord->name;} ?>">
								</div>
							</div>

							<div class="form-group top-14px">
								<label class="control-label col-sm-6" for="">Customer Mobile No:
									<span class="asteriskField">*</span>
								</label>
								<div class="col-sm-6 input-group input-group-sm">
									<input type="text" class="form-control readonly" id="" placeholder="Customer Mobile Number" name="customer_phone_number" value="<?php if(isset($crmLastRecord->phone_number)){echo $crmLastRecord->phone_number;} ?>" required="required">
								</div>
							</div>

							
				  
							<div class="form-group top-14px">
								<label class="control-label col-sm-6" for="">Customer Address:</label>
								<div class="col-sm-6 input-group input-group-sm">          
									<input type="text" class="form-control" id="" placeholder="Customer Address" name="customer_address" autocomplete="off" value="<?php if(isset($crmLastRecord->address)){echo $crmLastRecord->address;} ?>">
								</div>
							</div>

							<div class="form-group top-14px">
								<label class="control-label col-sm-6" for="">Division:</label>
								<div class="col-sm-6 input-group input-group-sm">          
									<input type="text" class="form-control" id="" placeholder="Division" name="division" autocomplete="off" value="<?php if(isset($crmLastRecord->division)){echo $crmLastRecord->division;} ?>">
								</div>
							</div>

							<div class="form-group top-14px">
								<label class="control-label col-sm-6" for="">Batch Code/Product:</label>
								<div class="col-sm-6 input-group input-group-sm">          
									<input type="text" class="form-control" id="" placeholder="Batch Code / Product" name="product_batch_code" autocomplete="off" value="<?php if(isset($crmLastRecord->product_batch_code)){echo $crmLastRecord->product_batch_code;} ?>">
								</div>
							</div>
				  
							<div class="form-group top-14px">
								<label class="control-label col-sm-6" for="">Description:</label>
								<div class="col-sm-6 input-group">
									<textarea class="form-control" rows="2" id="" placeholder="Description" name="description"></textarea>
								</div>
							</div>

							<div class="form-group">        
								<div class="col-sm-offset-0 col-sm-12">
									<!-- <button type="submit" name="submit" class="btn btn-primary btn-xs btn-block" onclick="return confirm('Are you sure you want to create new record?');">Submit</button> -->
									<button type="button"  class="btn btn-success btn-xs btn-block" data-toggle="modal" data-target="#myModaliTraker">Submit</button>
								</div>
							</div>

							<div class="modal fade" id="myModaliTraker" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header bg-info">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Confirmation Message</h4>
										</div>
										<div class="modal-body">
											<h3>Do you want to <b><mark>iTraker</mark> save</b>?</h3>
										</div>
										<div class="modal-footer bg-info">
											<button type="submit" name="submit"  class="btn btn-success btn-block submitBtnTicket">Yes</button>
											<!-- <button type="button" class="btn btn-danger" data-dismiss="modal">No</button> -->
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>


				<div class="col-sm-12 col-xs-12" style="padding-right: 0px;padding-left: 0px;">
					@if(isset($ticketLastRecord))
						<center><p class=""><span class="">Update Ticket</span></p></center>
						<center><form class="form-inline" method="post" action="{{ url('crm-ticket/ticket-update') }}">
							{{ csrf_field() }}
							<input type="hidden" class="form-control" id="" placeholder="" name="ticket_id" value="<?php echo $ticketLastRecord->id; ?>">
						    <div class="form-group">
						      	<label>Type<span class="asteriskField">*</span></label>
						      	{!! Form::select('ticket_type_id', $ticketTypeList, $ticketLastRecord->ticket_type_id, ['class' => 'form-control input-sm', 'style' => 'padding: 0px 0px;', 'placeholder' => 'Select', 'required' => 'required']) !!}
						    </div>
						    <div class="form-group">
						      	<label>Status<span class="asteriskField">*</span></label>
						      	{!! Form::select('ticket_status_id', $ticketStatusList, $ticketLastRecord->ticket_status_id, ['class' => 'form-control input-sm', 'style' => 'padding: 0px 0px;', 'placeholder' => 'Select', 'required' => 'required']) !!}
						    </div>
					    	<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalTicketUpdate">Update</button>

					    	<div class="modal fade" id="myModalTicketUpdate" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header bg-info">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Confirmation Message</h4>
										</div>
										<div class="modal-body">
											<h3>Do you want to <b><mark>Update</mark> ticket</b>?</h3>
										</div>
										<div class="modal-footer bg-info">
											<button type="submit" name="submit"  class="btn btn-success btn-block">Yes</button>
											<!-- <button type="button" class="btn btn-danger" data-dismiss="modal">No</button> -->
										</div>
									</div>
								</div>
							</div>
					  	</form></center>
					  @endif
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid" style="padding-right: 0px; padding-left: 0px;">
		<div style="background: #43474d;">
			<center><p style="font-family: 'Open Sans', serif; font-size: 12px; margin-top: 0px;"><span style="color: #FFFFFF">© 2015. MY Outsourcing Limited. Developed by</span> <a href="#" style="color: red;">MY Outsoursing Limited.</a> <span style="color: #FFFFFF">All Rights Reserved.</span></p></center>
		</div>
	</div>

	<script>
	    $(".readonly").keydown(function(e){
	        e.preventDefault();
	    });

	    $(document).ready(function(){
		    $("#catid").change(function(){
		        //alert("The text has been changed.");
		        var categoryId = $("#catid").val();
		        var url = '{{ url("/crm-ticket/category-product-show")}}';
		        $.get(url+'?category_id='+categoryId, function (data) {
	            	$('#category_product_show').html(data);
	        	});
		    });
		});

		$(document).ready(function () {
		    $("#ticketForm").submit(function () {
		        $(".submitBtnTicket").attr("disabled", true);
		        return true;
		    });
		});
	</script>

</body>
</html>
