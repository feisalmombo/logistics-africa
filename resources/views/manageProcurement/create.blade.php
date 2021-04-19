@extends('layouts.app')

@section('title', 'Add Procurement')

@section('content')
<br>

<div class="row">
    <section class="content">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Create procurement<a href="{{ url('/kind/procurements') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<section class="container col-sm-offset-3">
						<div class="container-page">
							<div class="col-sm-6">
								<form role="form"  action="{{ url('/kind/procurements') }}" method="POST" enctype="multipart/form-data">

									{{ csrf_field() }}

									<div class="col-lg-12 center-block">
                                        <br>
                                        <div class="form-group">
											<label>Kind Procurement Name</label>
											<input class="form-control" name="procurement_name" id="procurement_name" required="required">
                                        </div>

										<div class="form-group">
											<button type="submit" class="btn btn-primary">
												Save
											</button>
										</div>
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
@endsection
