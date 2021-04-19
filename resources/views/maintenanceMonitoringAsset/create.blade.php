@extends('layouts.app')

@section('title', 'Maintenance monitoring asset')

@section('content')
<br>

<div class="row">
    <section class="content">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Create maintenance monitoring asset<a href="{{ url('/maintenance/monitoring/assets') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<section class="container">
						<div class="container-page">
							<div class="col-md-12">

                                <form role="form"  action="{{ url('/maintenance/monitoring/assets') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
									<div class="box box-default">
									<!-- /.box-header -->
									<div class="box-body">
										<div class="row">
										<div class="col-md-6">
											<div class="form-group">
											<label>Date: </label>
												<input type="date" class="form-control" name="date" id="date" required="required">
											</div>

											<div class="form-group">
											<label>Asset ID: </label>
												<input type="text" class="form-control" name="asset_id" id="asset_id" required="required">
											</div>

											<div class="form-group">
											<label>Description of Asset: </label>
												<textarea class="form-control my-editor" rows="10" id="description_asset" name="description_asset" required="required"></textarea>
											</div>

											<div class="form-group">
											<label>State of used: </label>
												<input type="text" class="form-control" name="state_use" id="state_use" required="required">
											</div>

											<div class="form-group">
											<label>Cost centre: </label>
												<input type="number" class="form-control" name="cost_centre" id="cost_centre" required="required">
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
											<label>Location: </label>
												<input type="text" class="form-control" name="location" id="location" required="required">
											</div>

											<div class="form-group">
											<label>Summary ordinary maintenance: </label>
												<input type="text" class="form-control" name="summary_ordinary_maintenance" id="summary_ordinary_maintenance" required="required">
											</div>

											<div class="form-group">
											<label>Summary extraordinary maintenance: </label>
												<input type="text" class="form-control" name="summary_extraordinary_maintenance" id="summary_extraordinary_maintenance" required="required">
											</div>

											<div class="form-group">
											<label>Cost: </label>
												<input type="number" class="form-control" name="cost" id="cost" required="required">
											</div>

											<div class="form-group">
											<label>Supplier of service: </label>
												<input type="text" class="form-control" name="supplier_service" id="supplier_service" required="required">
											</div>

											<div class="form-group">
											<label>Supplier invoice: </label>
												<input type="text" class="form-control" name="supplier_invoice" id="supplier_invoice" required="required">
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
