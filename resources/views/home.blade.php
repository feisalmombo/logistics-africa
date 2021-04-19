@extends('layouts.app')

@section('title', 'Home')

@section('content')

@if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('staff'))
<section class="content-header">
    <h1 style="font-family:Titillium Web, sans-serif">
    Welcome To Logistics Africa Dashboard
  </h1>
</section>
@endif

<!-- Main content -->
<section class="content">
    <div class="row">

        @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('staff'))
        <div class="col-lg-4">
            <a href="#">
            <div class="info-box">
            <!-- Apply any bg-* class to to the icon to color it -->
            <span class="info-box-icon bg-light-blue"><i class="fa fa-user"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Users</span>
              <span class="info-box-number">{{ $usersCount[0]->usersCount }}</span>
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
          </a>
        </div>
        @endif

         @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('staff'))
        <div class="col-lg-4">
            <a href="#">
            <div class="info-box">
            <!-- Apply any bg-* class to to the icon to color it -->
            <span class="info-box-icon bg-light-blue"><i class="fa fa-square"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Projects</span>
              <span class="info-box-number">{{ $projectsCount[0]->projectsCount }}</span>
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
         </a>
        </div>

        <div class="col-lg-4">
            <a href="#">
            <div class="info-box">
            <!-- Apply any bg-* class to to the icon to color it -->
            <span class="info-box-icon bg-blue"><i class="fa fa-indent"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Kind of procurement</span>
              <span class="info-box-number">{{ $procurementsCount[0]->procurementsCount }}</span> 
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
           </a>
        </div>
        @endif 


      @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('staff'))
     <div class="col-lg-4">
         <a href="#">
         <div class="info-box">
         <!-- Apply any bg-* class to to the icon to color it -->
         <span class="info-box-icon bg-light-blue"><i class="fa fa-user-plus"></i></span>
         <div class="info-box-content">
           <span class="info-box-text">Budget Expenditure</span>
           <span class="info-box-number">{{ $expendituresCount[0]->expendituresCount }}</span> 
         </div><!-- /.info-box-content -->
       </div><!-- /.info-box -->
      </a>
     </div>

      <div class="col-lg-4">
         <a href="#">
         <div class="info-box">
         <!-- Apply any bg-* class to to the icon to color it -->
         <span class="info-box-icon bg-blue"><i class="fa fa-lock"></i></span>
         <div class="info-box-content">
           <span class="info-box-text">Permissions</span>
           <span class="info-box-number">{{ $permissionsCount[0]->permissionsCount }}</span> 
         </div><!-- /.info-box-content -->
       </div><!-- /.info-box -->
        </a>
      </div>

      <div class="col-lg-4">
         <a href="#">
         <div class="info-box">
         <!-- Apply any bg-* class to to the icon to color it -->
         <span class="info-box-icon bg-blue"><i class="fa fa-comment"></i></span>
         <div class="info-box-content">
           <span class="info-box-text">Roles</span>
           <span class="info-box-number">{{ $rolesCount[0]->rolesCount }}</span> 
         </div><!-- /.info-box-content -->
       </div><!-- /.info-box -->
        </a>
      </div>
    @endif 

</section>

@endsection
