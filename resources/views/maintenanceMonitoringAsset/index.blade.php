@extends('layouts.app')

@section('title', 'Maintenance monitoring asset')

@section('content')
<br>
<div class="row">
<section class="content">
<div class="col-lg-12">
@include('msgs.success')
<div class="panel panel-default">
<div class="panel-heading">
    List of maintenance monitoring assets
    <a href="{{ url('/maintenance/monitoring/assets/create') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-plus"></i>&nbsp;Add maintenance monitoring</a>
</div>
<div class="panel-body table-responsive">
    @if(count($maintenances)>0)
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Date</th>
                <th>Asset ID</th>
                <th>Description of asset</th>
                <th>State of used</th>
                <th>Cost centre</th>
                <th>Location</th>
                {{-- <th>Summary ordinary maintenance</th>
                <th>Summary extraordinary maintenance</th> --}}
                <th>cost</th>
                {{-- <th>Supplier of service</th>
                <th>Supplier invoice</th> --}}
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Duration</th>

            </tr>
        </thead>
        <tbody>
            @foreach($maintenances as $key=>$maintenance)
            <tr class="odd gradeX">
            <td>{{$key + 1 }}</td>
            <td>{{$maintenance->date}}</td>
            <td>{{$maintenance->asset_id}}</td>
            <td>{{$maintenance->description_asset}}</td>
            <td>{{$maintenance->state_use}}</td>
            <td>{{$maintenance->cost_centre}}</td>
            <td>{{$maintenance->location}}</td>
            {{-- <td>{{$maintenance->summary_ordinary_maintenance}}</td>
            <td>{{$maintenance->summary_extraordinary_maintenance}}</td> --}}
            <td>{{$maintenance->cost}}</td>
            {{-- <td>{{$maintenance->supplier_service}}</td>
            <td>{{$maintenance->supplier_invoice}}</td> --}}
            </td>
            <td>Show</td>
            <td>Edit</td>
            <td>
                <a href='#{{ $maintenance->id }}' data-toggle="modal" type="button" class="btn btn-danger"><i class="fa fa-trash" arial-hidden="true"></i></a>
                <div class="modal fade" id="{{ $maintenance->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><strong>Delete</strong></h4>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete Supplier services? <h9 style="color: blue;">{{ $maintenance->supplier_service }}</h9>
                            </div>
                            <form action="/maintenance/monitoring/assets/{{ $maintenance->id }}" method="POST" role="form">

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
            <td>{{ \Carbon\Carbon::parse($maintenance->created_at)->diffForHumans() }}</td> 
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>No Maintenance monitoring asset found</strong>
    </div>
    @endif
</div>
</div>
</div>
</div>
</section>
@endsection
