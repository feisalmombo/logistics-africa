@extends('layouts.app')

@section('title', 'Insurance monitorings')

@section('content')
<br>

<div class="row">
    <section class="content">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Create insurance monitorings<a href="{{ url('/insurance/monitorings') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<section class="container">
						<div class="container-page">
							<div class="col-md-12">

                                <form role="form"  action="{{ url('/insurance/monitorings') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
									<div class="box box-default">
									<!-- /.box-header -->
									<div class="box-body">
										<div class="row">
										<div class="col-md-6">
											<div class="form-group">
											<label>Plate number: </label>
												<input type="text" class="form-control" name="plate_number" id="plate_number" required="required">
											</div>

											<div class="form-group">
											<label>start date: </label>
												<input type="date" class="form-control" name="start_date" id="start_date" required="required">
											</div>

											<div class="form-group">
											<label>Expire date: </label>
												<input type="date" class="form-control" name="expire_date" id="expire_date" required="required">
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
											<label>Cost: </label>
												<input type="number" class="form-control" name="cost" id="cost" required="required">
											</div>

											<div class="form-group">
											<label>Project: </label>
											<select class="form-control select2" style="width: 100%;" required="required" id="project_id" name="project_id">
												<option value="#">--- select project name ---</option>
												@foreach ( $projects as $project)
													<option value="{{ $project->id }}">{{ $project->project_name }}</option>
												@endforeach
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
