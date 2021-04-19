@extends('layouts.app')

@section('title', 'Vehicle Log sheets')

@section('content')
<br>
<div class="row">
<section class="content">
<div class="col-lg-12">
@include('msgs.success')
<div class="panel panel-default">
<div class="panel-heading">
    List of vehicle log sheets
    <a href="{{ url('/vehicle/log/sheets/create') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-plus"></i>&nbsp;Add Vehicle log sheet</a>
</div>
<div class="panel-body table-responsive">
    @if(count($vehicles)>0)
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Month/Year</th>
                <th>Vehicle Registration number</th>
                <th>Date</th>
                <th>Description</th>
                {{-- <th>Fuel Cost</th>
                <th>Fuel Litres</th>
                <th>Maintenance Cost</th>
                <th>Maintenance Invoice</th> --}}
                <th>Driver Signature</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Duration</th>

            </tr>
        </thead>
        <tbody>

            @foreach($vehicles as $key=>$vehicle)
            <tr class="odd gradeX">
            <td>{{$key + 1 }}</td>
            <td>{{$vehicle->month_year}}</td>
            <td>{{$vehicle->vehicle_registration_number}}</td>
            <td>{{$vehicle->date}}</td>
            <td>{{$vehicle->description}}</td>
            {{-- <td>{{$vehicle->fuel_cost}}</td>
            <td>{{$vehicle->fuel_litres}}</td>
            <td>{{$vehicle->maintenance_cost}}</td>
            <td>{{$vehicle->maintenance_invoice}}</td> --}}
            <td><a href="{{ Storage::url($vehicle->driver_signature) }}" target="_blank" type="button" class="btn btn-danger"><i class="fa fa-download" arial-hidden="true"></i></a>
            </td>
            <td>Show</td>
            <td>Edit</td>
            <td>
                <a href='#{{ $vehicle->id }}' data-toggle="modal" type="button" class="btn btn-danger"><i class="fa fa-trash" arial-hidden="true"></i></a>
                <div class="modal fade" id="{{ $vehicle->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><strong>Delete</strong></h4>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete Vehicle registration number? <h9 style="color: blue;">{{ $vehicle->vehicle_registration_number }}</h9>
                            </div>
                            <form action="/vehicle/log/sheets/{{ $vehicle->id }}" method="POST" role="form">

                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">NO</button>

                                    <button type="submit" class="btn btn-danger">Yes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
            <td>{{ \Carbon\Carbon::parse($vehicle->created_at)->diffForHumans() }}</td> 
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>No Vehicle log sheet found</strong>
    </div>
    @endif
</div>
</div>
</div>
</div>
</section>
@endsection
