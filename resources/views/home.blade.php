@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- Main content -->

@if(Auth::user()->hasRole('developer') ||
Auth::user()->hasRole('manager') ||
Auth::user()->hasRole('administrator'))
<!-- Main content -->
<section class="content">
    <h1>
        <strong>Dashboard</strong>
    </h1>
  <!-- Info boxes -->
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
    <a href="" style="color: black">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Users</span>
          <span class="info-box-number">{{ $usersCount[0]->usersCount }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </a>
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
    <a href=""  style="color: black">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-product-hunt"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Projects</span>
          <span class="info-box-number">{{ $projectsCount[0]->projectsCount }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </a>
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
    <a href=""  style="color: black">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-adjust"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Procurement Kind</span>
          <span class="info-box-number">{{ $procurementsCount[0]->procurementsCount }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </a>
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
    <a href=""  style="color: black">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-money"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Budget Expenditure</span>
          <span class="info-box-number">{{ $expendituresCount[0]->expendituresCount }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </a>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  {{--  row  --}}
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
    <a href=""  style="color: black">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-hdd-o"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Permissions</span>
            <span class="info-box-number">{{ $permissionsCount[0]->permissionsCount }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </a>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
    <a href="{{ url('/institution/types') }}"  style="color: black">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-university"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Roles</span>
          <span class="info-box-number">{{ $rolesCount[0]->rolesCount }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </a>
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>
    <div class="col-md-3 col-sm-6 col-xs-12">
    <a href=""  style="color: black">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-bar-chart"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Insurance Monitoring</span>
          <span class="info-box-number">{{ $insurancemonitoringsCount[0]->insurancemonitoringsCount }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </a>
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <a href=""  style="color: black">
        <span class="info-box-icon bg-yellow"><i class="fa fa-book"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Vehicle Log Sheet</span>
          <span class="info-box-number">{{ $vehiclelogsCount[0]->vehiclelogsCount }}</span>
        </div>
        <!-- /.info-box-content -->
        </a>
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  {{--  row  --}}

    {{--  Another row --}}
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="#"  style="color: black">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-clock-o"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Maintenance Monitoring</span>
                <span class="info-box-number">{{ $maintenancemonitoringsCount[0]->maintenancemonitoringsCount }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="#"  style="color: black">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-info-circle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Procurement Requests</span>
              <span class="info-box-number">{{ $procurementrequestsCount[0]->procurementrequestsCount }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </a>
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="#"  style="color: black">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-safari"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Purchase Orders</span>
              <span class="info-box-number">{{ $purchaseordersCount[0]->purchaseordersCount }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </a>
        </div>
    </div>
    {{--  Another row  --}}
  <!-- /.row -->

  <!-- Main row -->
  <!-- /.row -->
</section>
<!-- /.content -->
@endif
@endsection
