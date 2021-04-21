@extends('layouts.app')

@section('title', 'Payment Voucher')

@section('content')
<br>

<div class="row">
    <section class="content">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Create payment voucher<a href="{{ url('/payment/vouchers') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<section class="container">
						<div class="container-page">
							<div class="col-md-12">

                                <form role="form"  action="{{ url('/payment/vouchers') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
									<div class="box box-default">
									<!-- /.box-header -->
									<div class="box-body">
										<div class="row">
										<div class="col-md-6">
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
											<label>Country office: </label>
												<input type="text" class="form-control" name="country_office" id="country_office" required="required">
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
                                                <label>Date: </label>
												{{-- <textarea class="form-control my-editor" rows="10" id="date" name="date" required="required"></textarea> --}}
												<input type="date" class="form-control" name="date" id="date" required="required">
                                            </div>

											<div class="form-group">
											<label>Beneficiary name: </label>
												<input type="text" class="form-control" name="beneficiary_name" id="beneficiary_name" required="required">
											</div>

											<div class="form-group">
											<label>Beneficiary address: </label>
                                             <input type="text" class="form-control" name="beneficiary_address" id="beneficiary_address" required="required">
											</div>

                                            <div class="form-group">
                                                <label>Cash payment: </label>
                                                 <input type="number" class="form-control" name="cash_payment" id="cash_payment" required="required">
                                            </div>

                                            <div class="form-group">
                                                <label>Amount in words: </label>
                                                 <input type="text" class="form-control" name="amount_words" id="amount_words" required="required">
                                            </div>

                                            <div class="form-group">
                                                <label>Cheque number: </label>
                                                    <input type="text" class="form-control" name="cheque_number" id="cheque_number" required="required">
                                            </div>
										</div>

										<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Bank name: </label>
                                                 <input type="text" class="form-control" name="bank_name" id="bank_name" required="required">
                                            </div>

											<div class="form-group">
											<label>Quantity: </label>
												<input type="number" class="form-control" name="quantity" id="quantity" required="required">
											</div>

                                            <div class="form-group">
                                                <label>Description: </label>
												<textarea class="form-control my-editor" rows="10" id="description" name="description" required="required"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Rate: </label>
                                                    <input type="text" class="form-control" name="rate" id="rate" required="required">
                                            </div>

                                            <div class="form-group">
                                                <label>Profoma invoice amount: </label>
                                                    <input type="number" class="form-control" name="profoma_invoice_amount" id="profoma_invoice_amount" required="required">
                                            </div>

											<div class="form-group">
											<label>Signature attachment: </label>
												<input type="file" class="form-control" name="signature_attachments" id="signature_attachments" required="required">
											</div>

                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control"  required="required" name="approved_status" id="approved_status">
                                                    <option value="">-- Select status --</option>
                                                    <option value="Approved">Approved</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Payee Signature: </label>
                                                    <input type="file" class="form-control" name="payee_signature" id="payee_signature" required="required">
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
