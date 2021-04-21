@extends('layouts.app')

@section('title', 'Procurement Request')

@section('content')
<br>

<div class="row">
    <section class="content">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Create procurement request<a href="{{ url('/procurement/requests') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<section class="container">
						<div class="container-page">
							<div class="col-md-12">

                                <form role="form"  action="{{ url('/procurement/requests') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
									<div class="box box-default">
									<!-- /.box-header -->
									<div class="box-body">
										<div class="row">
										<div class="col-md-6">
											<div class="form-group">
											<label>Request Number: </label>
												<input type="text" class="form-control" name="request_number" id="request_number" required="required">
											</div>

											<div class="form-group">
                                                <label>Project Name: </label>
                                                <select class="form-control select2" style="width: 100%;" required="required" id="project_id" name="project_id">
                                                    <option value="#">--- select project name ---</option>
                                                    @foreach ( $projects as $project)
                                                        <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

											<div class="form-group">
											<label>Date of Request: </label>
												<input type="date" class="form-control" name="date_request" id="date_request" required="required">
											</div>

                                            <div class="form-group">
                                                <label>Procurement Kind: </label>
                                                <select class="form-control select2" style="width: 100%;" required="required" id="kind_procurement_id" name="kind_procurement_id">
                                                    <option value="#">--- select procurement kind ---</option>
                                                    @foreach ( $procurements as $procurements)
                                                        <option value="{{ $procurements->id }}">{{ $procurements->kind_procurement_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

											<div class="form-group">
											<label>Budget Line: </label>
												<input type="text" class="form-control" name="budget_line" id="budget_line" required="required">
											</div>

											<div class="form-group">
											<label>Description of item: </label>
												<textarea class="form-control my-editor" rows="10" id="decription_items" name="decription_items" required="required"></textarea>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
											<label>Quantity: </label>
												<input type="number" class="form-control" name="quantity" id="quantity" required="required">
											</div>

                                            <div class="form-group">
                                                <label>Budget Expenditure: </label>
                                                <select class="form-control select2" style="width: 100%;" required="required" id="budget_expenditure_id" name="budget_expenditure_id">
                                                    <option value="#">--- select procurement kind ---</option>
                                                    @foreach ( $expenditures as $expenditure)
                                                        <option value="{{ $expenditure->id }}">{{ $expenditure->budget_expenditure_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

											<div class="form-group">
											<label>Delivery within: </label>
												<input type="text" class="form-control" name="delivery_within" id="delivery_within" required="required">
											</div>

											<div class="form-group">
											<label>Signature attachment: </label>
												<input type="file" class="form-control" name="administrator_signature_attachments" id="administrator_signature_attachments" required="required">
											</div>

                                            <div class="form-group">
                                                <label>Check By</label>
                                                <select class="form-control"  required="required" name="checked_status" id="checked_status">
                                                    <option value="">-- Select status --</option>
                                                    <option value="Checked">Checked</option>
                                                </select>
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
