{{-- @extends('layouts.app')

@section('title', 'Update Procurement Requests')

@section('content')
<br>
<div class="row">
<section class="content">
<div class="col-lg-12">
@include('msgs.success')
<div class="panel panel-default">
<div class="panel-heading">
    List of procurement requests
    <a href="{{ url('/procurement/requests/create') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-plus"></i>&nbsp;Add procurement request</a>
</div>
<div class="panel-body table-responsive">
    @if(count($notifications)>0)
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Request Number</th>
                <th>Description of items</th>
                <th>Budget Line</th>
                <th>Quantity</th>
                <th>Project Name</th>
                <th>Status</th>
                <th>Kind Procurement</th>
                <th>Delivery within</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
        </thead>
        <tbody>
            @foreach($notifications as $key=>$notification)
            @if($notification->checked_status ==='Checked')
            <tr class="odd gradeX" style="background-color: #c3e6cb;">
            <td>{{$key + 1 }}</td>
            <td>{{$notification->request_number}}</td>
            <td>{{$notification->decription_items}}</td>
            <td>{{$notification->budget_line}}</td>
            <td>{{$notification->quantity}}</td>
            <td>{{$notification->project_name}}</td>
            <td>{{$notification->checked_status }}</td>
            <td>{{$notification->kind_procurement_name}}</td>
            <td>{{$notification->delivery_within}}</td>
            </td>
            <td>Show</td>
            <td>Edit</td>
            <td>Delete</td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    @else
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>No Procurement request found</strong>
    </div>
    @endif
</div>
</div>
</div>
</div>
</section>
@endsection --}}



@extends('layouts.app')

@section('title', 'Not Attended Status')

@section('content')
<br>
<section class="content">
    <div class="row">
       <div class="col-lg-12">
        {{-- @include('msgs.success') --}}

        <div id="alert-info"></div>

        <div class="panel panel-default">
         <div class="panel-heading">
            Approve information
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="">
               <div class="">

                <div class="panel-body">
                    @if(count($notifications)>0)
                    @foreach($notifications as $notification)
                    <!-- Tab panes -->
                    <div class="">
                        <div class="" id="incident">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4>User Information:</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <span class="col-lg-2">First Name : </span>
                                        <span class="col-lg-10">{{ $notification->first_name }}</span>
                                    </div>

                                    <div class="row">
                                        <span class="col-lg-2">Last Name : </span>
                                        <span class="col-lg-10">{{ $notification->last_name}}</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>No Customer found</strong>
                    </div>
                    @endif
                    <!-- /.panel-body -->
                </div>
                <h4><strong>Procurement Requets Information</strong></h4>

                <div class="panel-body">
                    <div id="cive">
                        @if(count($notifications) > 0)

                        <table name="locationsTable"  class="table-responsive table-condensed table-striped " cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Status</th>
                                    <th>Goods Description</th>
                                    <th>Weight</th>
                                    <th>Number of Packages</th>
                                    <th>Trip duration</th>
                                    <th>Duration</th>
                                    <th>Download</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($notifications as $key=>$notification)

                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $notification->status }}</td>
                                    <td>{{ $notification->goods_description }}</td>
                                    <td>{{ $notification->weight }}</td>
                                    <td>{{ $notification->number_of_packages }}</td>
                                    <td>{{ $notification->cargotype }}</td>
                                    <td>{{ $notification->origin_point }}</td>
                                    <td>{{ $notification->origin_point }}</td>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>

                        @else
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>No Procurement request Found</strong>
                        </div>
                        @endif
                    </div>
                </div>



                <!-- Attend Requests-->
                <div class="container-page">
                    <div class="col-sm-12">

                     <!-- This is the part of form  -->

                     <form role="form" action=""  method="POST">
                        <div id="repeater">

                            <!-- Repeater Items -->
                            <div class="items" data-group="vehicles">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <label data-name="repItemlabel"></label>
                                    </div>
                                    <div class="panel-body">
                                        <div class="container-fluid pull-left">
                                            <section class="container center-block">
                                                <div class="container-page">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Choose Plate/Horse No: </label>
                                                                <select class="form-control" required="required" name="vId" data-name="vehicleId" id="vehicleId">
                                                                    <option value="">--Choose--</option>
                                                                    {{-- @foreach($vehicles as $key=>$vehicle)
                                                                    <option value="{{json_encode($vehicles[$key])}}">{{ $vehicle['plate_horse_number'] }}</option>
                                                                    @endforeach --}}
                                                                </select>

                                                            </div>
                                                            <div data-name = "driver_div" class="form-group selDiv" id  = "driverSelectId">
                                                            </div>
                                                            <div data-name = "trailer_div" class="form-group selDiv" id  = "TrailerSelectId">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Description: </label><br>
                                                                <textarea class="form-control" required="required" name="attend_description" data-name="attend_description" id="attend_description"  rows="5" placeholder="Please Enter your attended description"></textarea>

                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>

                    <div class="form-group" style="padding-top:25px">
                        <button type="submit" name="submitvehiclenot" id="submitvehiclenot" class="btn btn-primary center-block">
                         Send
                     </button>
                 </div>

             </div>
         </div>
         <!-- Attend Requests-->


     </div>
     {{-- @endforeach --}}

 </div>

 <!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-6 -->
</div>
<!-- /.col-lg-6 -->
</div>
</section>
@endsection
