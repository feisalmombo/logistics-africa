@extends('layouts.app')

@section('title', 'Add User')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Add user</h1>
</div>

<div class="row">
    <section class="content">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Create user<a href="{{ url('/view-users') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<section class="container col-sm-offset-3">
						<div class="container-page">
							<div class="col-sm-6">
								<form role="form"  action="{{ url('/settings/manage_users/permissions') }}" method="POST">
									{{ csrf_field() }}
									<div class="col-lg-12 center-block">
										<h2 style="text-align: center;">Create Permission Form</h2>
										<div class="form-group">
											<label>Name: </label>
											<input class="form-control" name="name" required="required"  placeholder="eg: Edit Cost">
										</div>
                                        <div class="form-group">
											<label>Slug: </label>
											<input class="form-control" name="slug" required="required"  placeholder="eg: edit">
										</div>



										<div class="form-group">
											<button type="submit" class="btn btn-primary center-block">
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
