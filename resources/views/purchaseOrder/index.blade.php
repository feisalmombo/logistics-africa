@extends('layouts.app')

@section('title', 'Purchase Orders')

@section('content')
<br>
<div class="row">
<section class="content">
<div class="col-lg-12">
@include('msgs.success')
<div class="panel panel-default">
<div class="panel-heading">
    List of purchase orders
    <a href="{{ url('/purchase/orders/create') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-plus"></i>&nbsp;Add Purchase Order</a>
</div>
<div class="panel-body table-responsive">
    @if(count($purchases)>0)
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Reference number</th>
                <th>Code</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Amount</th>
                <th>Tin number</th>
                <th>Project name</th>
                <th>Invoice address</th>
                <th>Delivery address</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Duration</th>

            </tr>
        </thead>
        <tbody>

            @foreach($purchases as $key=>$purchase)
            <tr class="odd gradeX">
            <td>{{$key + 1 }}</td>
            <td>{{$purchase->reference_number}}</td>
            <td>{{$purchase->code}}</td>
            <td>{{$purchase->quantity}}</td>
            <td>{{$purchase->unit_price}}</td>
            <td>{{$purchase->amount}}</td>
            <td>{{$purchase->tin_number}}</td>
            <td>{{$purchase->project_name}}</td>
            <td>{{$purchase->invoice_address}}</td>
            <td>{{$purchase->delivery_address}}</td>
            <td>Show</td>
            <td>Edit</td>
            <td>Delete</td>
            <td>{{ \Carbon\Carbon::parse($purchase->created_at)->diffForHumans() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>No Purchase order found</strong>
    </div>
    @endif
</div>
</div>
</div>
</div>
</section>
@endsection
