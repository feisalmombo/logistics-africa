@extends('layouts.app')

@section('title', 'Procurement Requests')

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
    @if(count($procurementrequests)>0)
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Request Number</th>
                <th>Description of items</th>
                <th>Budget Line</th>
                <th>Quantity</th>
                <th>Project Name</th>
                <th>Kind Procurement</th>
                <th>Delivery within</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
        </thead>
        <tbody>
            @foreach($procurementrequests as $key=>$procurementrequest)
            <tr class="odd gradeX">
            <td>{{$key + 1 }}</td>
            <td>{{$procurementrequest->request_number}}</td>
            <td>{{$procurementrequest->decription_items}}</td>
            <td>{{$procurementrequest->budget_line}}</td>
            <td>{{$procurementrequest->quantity}}</td>
            <td>{{$procurementrequest->project_name}}</td>
            <td>{{$procurementrequest->kind_procurement_name}}</td>
            <td>{{$procurementrequest->delivery_within}}</td>
            </td>
            <td>Show</td>
            <td>Edit</td>
            <td>Delete</td>
            </tr>
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
@endsection
