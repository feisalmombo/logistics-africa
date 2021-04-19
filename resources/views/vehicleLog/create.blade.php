@extends('layouts.app')

@section('title', 'Vehicle log sheet')

@section('content')
<br>

<div class="row">
    <section class="content">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Create vehicle log sheet<a href="{{ url('/vehicle/log/sheets') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<section class="container">
						<div class="container-page">
							<div class="col-md-12">

                                <form role="form"  action="{{ url('/vehicle/log/sheets') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
									<div class="box box-default">
									<!-- /.box-header -->
									<div class="box-body">
										<div class="row">
										<div class="col-md-6">
											<div class="form-group">
											<label>Month/Year: </label>
												<input type="text" class="form-control" name="month_year" id="month_year" required="required">
											</div>

											<div class="form-group">
											<label>Vehicle Registration Number: </label>
												<input type="text" class="form-control" name="vehicle_registration_number" id="vehicle_registration_number" required="required">
											</div>

											<div class="form-group">
											<label>Date: </label>
												<input type="date" class="form-control" name="date" id="date" required="required">
											</div>

											<div class="form-group">
											<label>Description: </label>
												<textarea class="form-control my-editor" rows="10" id="description" name="description" required="required"></textarea>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
											<label>Fuel Cost: </label>
												<input type="number" class="form-control" name="fuel_cost" id="fuel_cost" required="required">
											</div>

											<div class="form-group">
											<label>Fuel Litres: </label>
												<input type="text" class="form-control" name="fuel_litres" id="fuel_litres" required="required">
											</div>

											<div class="form-group">
											<label>Maintenance Cost: </label>
												<input type="number" class="form-control" name="maintenance_cost" id="maintenance_cost" required="required">
											</div>

											<div class="form-group">
											<label>Maintenance Invoice: </label>
												<input type="text" class="form-control" name="maintenance_invoice" id="maintenance_invoice" required="required">
											</div>

											<div class="form-group">
											<label>Driver Signature: Files (png,gif,jpeg,jpg,txt,pdf,doc)</label>
												<input type="file" class="form-control" name="driver_signature" id="driver_signature" required="required">
											</div>

											<div class="btn-group">
												<input class="btn btn-primary" type="submit" value="Save">
											</div>
										</div>
										</div>
									</div>
									<!-- /.box-body -->
									</div>
                                </form>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</div>
</section>


{{-- <script>
    jQuery(document).ready(function() {

        jQuery(function() {
            jQuery('#datetimepicker1').datetimepicker( {
                defaultDate:'now',  // defaults to today
                format: 'YYYY-MM-DD hh:mm:ss',  // YEAR-MONTH-DAY hour:minute:seconds
                minDate:new Date()  // Disable previous dates, minimum is todays date
            });
        });
    });
</script> --}}
@endsection
