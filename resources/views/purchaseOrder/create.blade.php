@extends('layouts.app')

@section('title', 'Purchase Order')

@section('content')
<br>

<div class="row">
    <section class="content">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Create procurement request<a href="{{ url('/purchase/orders') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<section class="container">
						<div class="container-page">
							<div class="col-md-12">

                                <form role="form"  action="{{ url('/purchase/orders') }}" method="POST" enctype="multipart/form-data">
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
											<label>To: </label>
												<input type="text" class="form-control" name="to" id="to" required="required">
											</div>

											<div class="form-group">
                                                <label>Reference number: </label>
												<input type="text" class="form-control" name="reference_number" id="reference_number" required="required">
                                            </div>

											<div class="form-group">
											<label>Code: </label>
												<input type="text" class="form-control" name="code" id="code" required="required">
											</div>

                                            <div class="form-group">
                                                <label>Description of items: </label>
												<textarea class="form-control my-editor" rows="10" id="decription_items" name="decription_items" required="required"></textarea>
                                            </div>

											<div class="form-group">
											<label>Quantity: </label>
												<input type="number" class="form-control" name="quantity" id="quantity" required="required">
											</div>

											<div class="form-group">
											<label>Unit price: </label>
                                             <input type="number" class="form-control" name="unit_price" id="unit_price" required="required">
											</div>

                                            <div class="form-group">
                                                <label>Amount: </label>
                                                 <input type="number" class="form-control" name="amount" id="amount" required="required">
                                            </div>

                                            <div class="form-group">
                                                <label>Invoice To: </label>
                                                 <input type="text" class="form-control" name="invoice_to" id="invoice_to" required="required">
                                            </div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
											<label>Tin Number: </label>
												<input type="text" class="form-control" name="tin_number" id="tin_number" required="required">
											</div>

                                            <div class="form-group">
                                                <label>Invoice address: </label>
                                                    <input type="text" class="form-control" name="invoice_address" id="invoice_address" required="required">
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
											<label>Delivery date: </label>
												<input type="date" class="form-control" name="delivery_date" id="delivery_date" required="required">
											</div>

                                            <div class="form-group">
                                                <label>Delivery address: </label>
                                                    <input type="text" class="form-control" name="delivery_address" id="delivery_address" required="required">
                                            </div>

                                            <div class="form-group">
                                                <label>Terms Delivery: </label>
                                                    <input type="text" class="form-control" name="terms_delivery" id="terms_delivery" required="required">
                                            </div>

                                            <div class="form-group">
                                                <label>Terms Payment: </label>
                                                    <input type="number" class="form-control" name="terms_payment" id="terms_payment" required="required">
                                            </div>

											<div class="form-group">
											<label>Signature attachment: </label>
												<input type="file" class="form-control" name="signature_attachments" id="signature_attachments" required="required">
											</div>

                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control"  required="required" name="status" id="status">
                                                    <option value="">-- Select status --</option>
                                                    <option value="Accept">Accept</option>
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
